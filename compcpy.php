<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

require_once 'includes/config.php';
$username = $_SESSION['username'];
$query = "SELECT code, created_at FROM codes WHERE username = ? ORDER BY created_at DESC LIMIT 1"; 
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$last_saved_code = '';
$last_saved_time = '';
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $last_saved_code = $row['code']; 
    $last_saved_time = $row['created_at']; 
}
$stmt->close();
?>
<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8" />
  <link rel="icon" href="images/logo.webp">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Compilator C++ și Python</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f0f2f5;
      padding: 40px;
      max-width: 800px;
      margin: auto;
      color: #333;
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
    }

    label {
      font-weight: 600;
      margin-top: 15px;
      display: block;
    }

    input, select, textarea, button {
      width: 100%;
      padding: 12px;
      margin-top: 8px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
    }

    textarea {
      font-family: 'Courier New', monospace;
      height: 200px;
    }

    
nav button, .dropbtn {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 5px;
  font-size: 14px;
  height: 32px;
  width: 140px;
  background: #000;   
  color: #fff;        
  border-radius: 8px;
  border: 1px solid transparent;
  cursor: pointer;
  transition: all 0.3s ease;
  padding: 10px 20px; 
}

nav button:hover, .dropbtn:hover {
  background: #000;                 
  color: #fff;                      
  border-color: #dedede;            
  transform: translateY(-4px);      
  box-shadow: 0 8px 24px rgba(0, 255, 0, 0.5); 
}


nav button i, .dropbtn i {
  font-size: 16px;
}



    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      top: 36px;  
      left: 0;
      background-color: #fff;
      min-width: 180px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      border-radius: 8px;
      border: 1px solid #e8e8e8;
      z-index: 10000;
      padding: 8px 0;
    }

    .dropdown-content a {
      color: #606060;
      padding: 8px 16px;
      text-decoration: none;
      display: block;
      font-size: 14px;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .dropdown-content a:hover {
      background-color: #f0f0f0;
      color: #000;
    }

    .dropdown-content.show {
      display: block;
    }

    #run_output {
      background: #1e1e1e;
      color: #00ff00;
      padding: 20px;
      margin-top: 30px;
      border-radius: 8px;
      white-space: pre-wrap;
      font-family: monospace;
      min-height: 100px;
    }

    #saved_output {
      background: #f0f0f0;
      color: #333;
      padding: 20px;
      margin-top: 30px;
      border-radius: 8px;
      white-space: pre-wrap;
      font-family: monospace;
      min-height: 100px;
      border: 1px solid #ccc;
    }

    #saved_time {
      font-size: 14px;
      color: #777;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <nav>
    <div class="logo">
      <img src="images/logo.webp" alt="SkillForge logo" />
      <a href="acasa.php">SkillForge</a>
    </div>
    <div class="nav-links">
      <a href="acasa.php">Acasă</a>
      <a href="#">Proiecte</a>
      <div class="dropdown">
        <button class="dropbtn" id="dropdownBtn">
          Compilere <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content" id="dropdownContent">
          <a href="compiler.html">Compiler HTML & CSS & JS</a>
          <a href="compiler.php">Compiler C++ & Python</a>
        </div>
      </div>
    </div>
    <a href="includes/logout.php"><button id="navLogoutBtn">Deconectare</button></a>
  </nav>

  <h2>Compilator C++ și Python</h2>

  <label for="username">Username:</label>
  <input type="text" id="username" value="<?php echo $_SESSION['username']; ?>" readonly>

  <label for="language">Limbaj:</label>
  <select id="language">
    <option value="cpp">C++</option>
    <option value="python3">Python</option>
  </select>

  <label for="code">Cod sursă:</label>
  <textarea id="code"><?php echo htmlspecialchars($last_saved_code); ?></textarea>

  <button onclick="runCode()">Rulare cod</button>
  <button onclick="saveCode()">Salvează cod</button>

  <h3>Rezultatul rulării codului:</h3>
  <pre id="run_output">...</pre>

  <h3>Codul salvat:</h3>
  <pre id="saved_output">...</pre>

  <?php if ($last_saved_time): ?>
    <p id="saved_time">Ultimul cod salvat pe: <?php echo $last_saved_time; ?></p>
  <?php endif; ?>

<script>
  async function runCode() {
    const language = document.getElementById('language').value;
    const code = document.getElementById('code').value;

    try {
      const res = await fetch('includes/run_code.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ language, code })
      });

      const data = await res.json();
      document.getElementById('run_output').textContent = data.output || 'Fără rezultat';
    } catch (err) {
      document.getElementById('run_output').textContent = 'Eroare la rulare';
    }
  }

  async function saveCode() {
    const language = document.getElementById('language').value;
    const code = document.getElementById('code').value;

    if (!code.trim()) {
      alert("Codul nu poate fi gol!");
      return;
    }

    try {
      const res = await fetch('includes/save_code.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ language, code })
      });

      const data = await res.json();

      if (data.status === 'success') {
        document.getElementById('saved_output').textContent = data.code;
        document.getElementById('saved_time').textContent = 'Ultimul cod salvat pe: ' + data.created_at;
        alert('Codul a fost salvat cu succes!');
      } else {
        alert('Eroare la salvare: ' + data.message);
      }
    } catch (err) {
      alert('Eroare la salvare');
    }
  }
</script>
<script src="js/script.js"></script>

</body>
</html>
