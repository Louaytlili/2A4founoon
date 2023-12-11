
<?php
// Importations bécessaires
include 'C:\xampp\htdocs\FOUNOON\Controller\UserC.php';
include 'C:\xampp\htdocs\FOUNOON\Model\User.php';

$error = "";
$user = null;
$userC = new UserC();

if (
    isset($_POST["username"]) &&
    isset($_POST["email"]) &&
    isset($_POST["password"])
    ) {
      if (
        !empty($_POST['username']) &&
        !empty($_POST["email"]) &&
        !empty($_POST["password"])
        ) 
        {
          $user = new User(
            null,
            $_POST['username'],
            $_POST['email'],
            password_hash($_POST['password'],PASSWORD_DEFAULT),
            date("Y-m-d"),  
            0,
            NULL
          );

          try {
            // Add the user to the database
            $userC->addUser($user);
            $error = "<center><strong><h3>Registration validated! Thank you for joining us.</h3></strong></center>";
          } 
          catch (Exception $e) {
            $error = "<center><strong><h3>Error: " . $e->getMessage() . "</h3></strong></center>";
          }
         } else{
          $error = "";
         }
      }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Founoon Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
  </head>

  <body>

    <div id="error">
        <?php echo $error; ?>
    </div>
    <div class="container" id="container">
      <div class="form-container sign-up">
        <form action= "" method="post"  onsubmit="return verif_Up()">
          <h1>Create Account</h1>
          <span> use your email for registration</span>
          <input type="text"  placeholder="Username" id="user/up" onfocus="F1U()" name="username" />
          <input type="email" placeholder="Email" id="email" name="email" onfocus="F2U()"/>
          <input type="password"placeholder="Password" id="psd/up" onfocus="F3U()" name="password" />
          <button type="submit">Sign Up</button>
        </form>
      </div>

      <div class="form-container sign-in">
        <form action="validate.php" method="post" onsubmit="return verif_In()">
          <h1>Sign in</h1>
          <span>or use your account</span>
          <input type="text" placeholder="Username" id="user/in" name="username" onfocus="F1I()"/>
          <input type="password" placeholder="Password" id="psd/in" name="password"  onfocus="F2I()"/>
          <!--<pre><input type="checkbox" name="remember" value="1" id="remember"><label for="remember">Remember Me.</label></pre>-->
          <a href="forgot.pass.php" id="lien">Forgot your password?</a>
          <button type="submit" name="signin">Sign In</button>
        </form>
      </div>

      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>Welcome Back!</h1>
            <p>
              To keep connected with us please login with your personal info
            </p>
            <button id="signIn">Sign In</button>
          </div>

          <div class="overlay-panel overlay-right">
            <h1>New here?</h1>
            <p>Sign up and discover great amount of new opportunities!</p>
            <button id="signUp">Sign Up</button>
          </div>
        </div>
      </div>
    </div>

    <script>
      const signUpButton = document.getElementById("signUp");
      const signInButton = document.getElementById("signIn");
      const container = document.getElementById("container");

      signUpButton.addEventListener("click", () => {
        container.classList.add("right-panel-active");
      });

      signInButton.addEventListener("click", () => {
        container.classList.remove("right-panel-active");
      });

      var a = console.log.bind(document);
      a(3 * 4);
      a("Hello!");
      a(true);

      /* FONCTION VERIF SIGN UP*/
      function verif_Up(){
        let user =document.getElementById('user/up').value;
        let email =document.getElementById('email').value;
        let password=document.getElementById('psd/up').value;
        /*controle saisie username et pass*/
        let validationError = validateUsername(user);
        let validationError2 = validatePassword(password);
        if (validationError) {
          document.getElementById('user/up').value = validationError;
          document.getElementById('user/up').style.color = 'red';
          return false;
        }
       if (email=='')
        {
          document.getElementById('email').value='Invalid Email!';
          document.getElementById('email').style.color='red';
          return false;
        }
        if (validationError2) {
          document.getElementById('psd/up').type = 'text';
          document.getElementById('psd/up').value = validationError2;
          document.getElementById('psd/up').style.color = 'red';
          return false;
        }
      }

      /*fonction validate username*/
      const validateUsername = (username) => {
        if (username.length ==0) {
         return "Invalid Username!";
        }
        if (username.length < 8) {
         return "Username must be at least 8 characters!";
        }
        if (/[^a-zA-Z0-9]/.test(username)) {
         return "Username can't contain alphanumeric characters!";
        }
        if (!/\d/.test(username)) {
         return "Username must contain at least one number!";
        }
        return "";
      };

      /*fonction validate password*/
      const validatePassword = (password) => {
        if (password.length ==0) {
         return "Invalid Password!";
        }
        if (password.length < 8) {
         return "Password must be at least 8 characters!";
        }
        if (/[^a-zA-Z0-9]/.test(password)) {
         return "Password can't contain alphanumeric characters!";
        }
        return "";
      };


      function F1U(){                                         /* fonction ki todkhol lzone*/
        document.getElementById('user/up').value='';
        document.getElementById('user/up').style.color='black';
      }

      function F2U(){                                           /* fonction ki todkhol lzone*/
        document.getElementById('email').value='';
        document.getElementById('email').style.color='black';
      }

      function F3U(){                                         /* fonction ki todkhol lzone*/
        document.getElementById('psd/up').value='';
        document.getElementById('psd/up').style.color='black';
        document.getElementById('psd/up').type = 'password';
      }

      /* FONCTION VERIF SIGN IN*/
      function verif_In(){
        let user =document.getElementById('user/in').value;
        let password=document.getElementById('psd/in').value;
        if (user=='')
        {
          document.getElementById('user/in').value='Invalid Name!';
          document.getElementById('user/in').style.color='red';
          return false;
        }
       if (password=='')
        {
          document.getElementById('psd/in').value='Invalid Password!';
          document.getElementById('psd/in').style.color='red';
          return false;                               /*bech yokood fi blasa li feha lghalta*/
        }
      }

      function F1I(){                                         /* fonction ki todkhol lzone*/
        document.getElementById('user/in').value='';
        document.getElementById('user/in').style.color='black';
        document.getElementById('error').innerHTML='';     //error li tokhroj ml fouk "registrattion valid " tetenaha ki je click al zone 
      }

      function F2I(){                                           /* fonction ki todkhol lzone*/
        document.getElementById('psd/in').value='';
        document.getElementById('psd/in').style.color='black';
      }

    </script>
  </body>
  
</html>