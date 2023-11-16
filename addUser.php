<?php
// Importations bécessaires
include 'C:\xampp\htdocs\FOUNOON\Controller\UserC.php';
include 'C:\xampp\htdocs\FOUNOON\Model\User.php';

$error = "";

// create client
$user = null;

// create an instance of the controller
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
    ) {
        $user = new User(
            null,
            $_POST['username'],
            $_POST['email'],
            $_POST['password']
        );

        $userC->addUser($user);
        header('Location:listUsers.php');
    } else
        $error = "Missing information";
}


?>
<!--<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> User </title>
</head>

<body>
    <a href="listUsers.php">Back to list </a>
    <hr>

    <div id="error">
        <?php// echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="username">Username :</label></td>
                <td>
                    <input type="text" id="username" name="username" />
                    <span id="erreurUsername" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="email">Email :</label></td>
                <td>
                    <input type="text" id="email" name="email" />
                    <span id="erreurEmail" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="password">Password :</label></td>
                <td>
                    <input type="text" id="password" name="password" />
                    <span id="erreurPassword" style="color: red"></span>
                </td>
            </tr>


            <td>
                <input type="submit" value="Save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </table>

    </form>
</body>

</html>
-->
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
  <a href="listUsers.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>
    <div class="container" id="container">
      <div class="form-container sign-up">
        <form action="" method="post"  onsubmit="return verif_Up()">
          <h1>Create Account</h1>
          <span>or use your email for registration</span>
          <input type="text"  placeholder="Username" id="user/up" onfocus="F1U()" name="username" />
          <input type="email" placeholder="Email" id="email" name="email" onfocus="F2U()"/>
          <input type="password"placeholder="Password" id="psd/up" onfocus="F3U()" name="password" />
          <button type="submit">Sign Up</button>
        </form>
      </div>

      <div class="form-container sign-in">
        <form action="#" method="post" onsubmit="return verif_In()">
          <h1>Sign in</h1>
          <span>or use your account</span>
          <input type="text" placeholder="Username" id="user/in" onfocus="F1I()"/>
          <input type="password" placeholder="Password" id="psd/in"  onfocus="F2I()"/>
          <a href="#">Forgot your password?</a>
          <button type="submit">Sign In</button>
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
        let email =document.getElementById('mail').value;
        let password=document.getElementById('psd/up').value;
        if (user=='')
        {
          document.getElementById('user/up').value='Invalid Username!';
          document.getElementById('user/up').style.color='red';
          return false;
        }
       if (email=='')
        {
          document.getElementById('mail').value='Invalid Email!';
          document.getElementById('mail').style.color='red';
          return false;
        }
       if (password=='')
        {
          document.getElementById('psd/up').value='Invalid Password!';
          document.getElementById('psd/up').style.color='red';
          return false;                               /*bech yokood fi blasa li feha lghalta*/
        }
      }

      function F1U(){                                         /* fonction ki todkhol lzone*/
        document.getElementById('user/up').value='';
        document.getElementById('user/up').style.color='black';
      }

      function F2U(){                                           /* fonction ki todkhol lzone*/
        document.getElementById('mail').value='';
        document.getElementById('mail').style.color='black';
      }

      function F3U(){                                         /* fonction ki todkhol lzone*/
        document.getElementById('psd/up').value='';
        document.getElementById('psd/up').style.color='black';
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
      }

      function F2I(){                                           /* fonction ki todkhol lzone*/
        document.getElementById('psd/in').value='';
        document.getElementById('psd/in').style.color='black';
      }

    </script>
  </body>
  
</html>