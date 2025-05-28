<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Înregistrare - SkillForge</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">

        <?php 
         
         include("includes/config.php");
         if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

         

         $verify_query = mysqli_query($conn,"SELECT Email FROM users WHERE Email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>Acest e-mail este folosit deja, încearcă altul te rugăm!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Înapoi</button>";
         }
         else{

            mysqli_query($conn,"INSERT INTO users(Username,Email,Password) VALUES('$username','$email','$password')") or die("A apărut o eroare");

            echo "<div class='message'>
                      <p>Înregistrat cu succes!</p>
                  </div> <br>";
            echo "<a href='index.php'><button class='btn'>Autentifică-te acum</button>";
         

         }

         }else{
         
        ?>

            <header>Înregistrează-te</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Nume de utilizator</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Parolă</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Deja ești membru pe site-ul nostru? <a href="index.php">Autentifică-te acum</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>