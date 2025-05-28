<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="css/index.css">
    <title>Autentificare - SkillForge</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">
            <?php 
             
              include("includes/config.php");
              if(isset($_POST['submit'])){
                $username = mysqli_real_escape_string($conn,$_POST['username']);
                $password = mysqli_real_escape_string($conn,$_POST['password']);

                $result = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND Password='$password' ") or die("A apărut o eroare");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['valid'] = $row['email'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['id'] = $row['Id'];
                }else{
                    echo "<div class='message'>
                      <p>Numele de utilizator sau parola este greșită</p>
                       </div> <br>";
                   echo "<a href='index.php'><button class='btn'>Înapoi</button>";
         
                }
                if(isset($_SESSION['valid'])){
                    header("Location: acasa.php");
                }
              }else{

            
            ?>
            <header>Autentifică-te</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Nume de utilizator</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Parolă</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Nu ai cont? <a href="register.php">Înregistrează-te acum</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>