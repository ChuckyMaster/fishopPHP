<?php 
$isLoggedIn = false;


if(isset($_POST['logout'])) {
    unset($_SESSION['isConect']);
    $isLoggedIn = false;
    
    };
    

if(
    isset($_SESSION['isConect']) && $_SESSION['isConect']
     
    ) {
        $isLoggedIn = true;
    } 
;




$users = [ 
    [
    "username" => "chafouin",
    "password" => "d7464fad27734f64ffcb6abb3a3422c6"
],
[
    "username" => "pangolinSalé",
    "password" => "45438c0309d68f4925928d1cac6832e8"
],
[
    "username" => "Marabout",
    "password" => "47c1303565fe2d98ff49977c1414a010"
]];

// SALT PART
$salt="vroomvroom457";
$saltsalted = md5($salt);


// $loginField = "<form method='post' >
// <div class='form-group'> 

// <input type='text' name='username' placeholder='username'>
// </div>
// <div class='form-group'>
// <input type='text' name='password'  placeholder='password'>
// </div>
// <div class='form-group'> 
//     <button class='btn btn-secondary' type='submit' > Go go !  </button>
// </div>
// </form>";

$utilisateurInconnu = "Utilisateur Inconnu";
$mdpErrone = "mot de passe érroné";
$champsVides= "veuillez renseigner tous les champs";

$messageErreur = "";
$user = "";
$pwd = "";
$modeFormulaire = true;

$contenueDeLaPage = "";


if(isset($_POST['username']) && isset($_POST['password'])) 
{ 
  $pwdInput = $_POST['password'];
  $userInput = $_POST['username'];
};


if(!empty($userInput) && !empty($pwdInput)) {
  $userexist = false;
  $mdp;

  foreach($users as $user) {

    if($userInput == $user['username']) {
      $userexist = true;
      
      echo "USER EXIST";
      $mdp = $user['password'];
      
      
      //$mdpSalted = md5($mdp.$saltsalted);
      
    }
    
  };

    if($userexist){
        if($mdp == md5($pwdInput.$saltsalted)) {
            echo "good pwd";
            echo "<hr>";
            
        
            $modeFormulaire = false;
            $isLoggedIn = true;
            $_SESSION['isConect'] = true;
            $_SESSION['username'] = $_POST['username'];

            // if($isLoggedIn) {
            //     $loginField = " <form method='post' class=m-2> YOU ARE CONNECT BRO <br> 
            // <button class='btn btn-primary m-2 name='logout' type='submit'> 
            // LOG OUT</button> </form> ";
            //  };

            
            
          } 
          else { 
            $messageErreur = $mdpErrone;
          }
   
    } else { 

      $messageErreur = $utilisateurInconnu;
  }

} else  {
$messageErreur = $champsVides;
};



?>