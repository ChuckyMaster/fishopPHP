<?php 
    $colin = [
      "nom"=>"Colin",
      "description"=>"c'est un poisson gentil mais arrogant",
      "prix"=>43,
      "image"=>"img/colin.png",
      "eau" => "douce"
  ];
  $carpe = [
    "nom"=>"Carpe",
    "description"=>"c'est un poisson tender mais débile",
    "prix"=>32,
    "image"=>"img/carpe.png",
    "eau" => "douce"
  ];
  
  $cabillaud = [
    "nom"=>"Cabillaud",
    "description"=>"c'est un poisson pilier du rayon surgelés",
    "prix"=>43,
    "image"=>"img/cabillaud.png",
    "eau" => "mer"
  ];

  $thon = [
    "nom"=>"Thon",
    "description"=>"C'est bon le thon en boite",
    "prix"=> 150,
    "image"=>"img/thon.png",
    "eau" => "mer"
  ];

  $saumon = [

    "nom"=>"Saumon",
    "description"=>"Pour faire des sushis",
    "prix"=>78,
    "image"=>"img/saumon.png",
    "eau" => "mer"
  ];
  
  $poissons = [$colin, $carpe, $cabillaud, $thon, $saumon];
  
  $poissons = [
  
    [
    "nom"=>"Colin",
    "description"=>"c'est un poisson gentil mais arrogant",
    "prix"=>43,
    "image"=>"img/colin.png",
    "eau" => "douce",
    "protege"=> false

    ],
    [
      "nom"=>"Carpe",
    "description"=>"c'est un poisson tender mais débile",
    "prix"=>32,
    "image"=>"img/carpe.png",
    "eau" => "mer",
    "protege"=> false

    ],[ 
      "nom"=>"Cabillaud",
    "description"=>"c'est un poisson pilier du rayon surgelés",
    "prix"=>43,
    "image"=>"img/cabillaud.png",
    "eau" => "douce",
    "protege"=> false
    ],
    ["nom"=>"Thon",
    "description"=>"Le thon de la mer",
    "prix"=>80,
    "image"=>"img/thon.png",
    "eau" => "mer",
    "protege"=> false
  ],
    [
      "nom"=>"Saumon",
    "description"=>"Pour faire des sushis",
    "prix"=>78,
    "image"=>"img/saumon.png",
    "eau" => "mer",
    "protege"=> false
    ],
    ["nom"=>"Dauphin",
    "description"=>"dauphin",
    "prix"=>78,
    "image"=>"img/saumon.png",
    "eau" => "mer",
    "protege"=> true
  ], 
  ["nom"=>"Requin Marteau",
  "description"=>"c'est un requin marteau",
  "prix"=>65,
  "image"=>"img/saumon.png",
  "eau" => "mer",
  "protege"=> true
]
    
  
  ];


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



$mer = '';
$douce = '';
$type = '';

  if (isset($_GET['type'])) {
   $type = $_GET['type'];

  }

$contenuDeMaPage="";
$waterFish = '';
$isLoggedIn= false;



foreach($poissons as $poisson) {
 

  $cardPoisson =  "<div class='card col-2 gap-2' style='width: 18rem'>
  <img
    src='{$poisson['image']}'
    class='card-img-top'
    alt='...'
  />
  <div class='card-body text-center'>
    <h5 class='card-title #nom'>{$poisson["nom"]}</h5>
    <p class='card-text #description'>
     {$poisson["description"]}
    <p classe='eau'>  {$waterFish} </p> 
    <p class='prix'>{$poisson["prix"]} </p>
    <p>  </p>
    <a href='#' class='btn btn-primary'>buy</a>
    
  </div>
</div>";
    if (  
  
                  (!$type || $type ==  $poisson["eau"]) 

                  &&
                  (!$poisson['protege'] || !$isLoggedIn) 
        )    
         { 
          $contenuDeMaPage.=$cardPoisson;
                                          
        } 




};






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
            $isLoggedIn =true;
            print_r($isLoggedIn);
            $modeFormulaire = false;
            
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

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width= , initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href=" https://bootswatch.com/5/minty/bootstrap.min.css"
    />
    <link rel="stylesheet" href="style.css">
    <title>FISH PASSION</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Super Fish Shop</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarColor02"
          aria-controls="navbarColor02"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="#"
                >Home
                <span class="visually-hidden">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Promo</a>
            </li>
            <li>   <form method='post' >
<div class='form-group'> 
<input type='text' name='username' placeholder='username'>


</div>
<div class='form-group'>
<input type='text' name='password'  placeholder='password'>


</div>
<div class='form-group'> 
    <button class='btn btn-secondary' type='submit' > Go go !  </button>
</div>
</form></li>
          </ul>
          <form class="d-flex">
            <input
              class="form-control me-sm-2"
              type="text"
              placeholder="Search"
            />
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">
              Search
            </button>
          </form>
        </div>
      </div>
    </nav>

    <!-- 
    --------------------------------------------FIN NAV--------------------------------------------------------- -->




  







    <p> <?= $messageErreur ?>  </p>

    <!-- DEBUT CONTAINER -->
    <div class="container  gap-5">
      <h1> Cards Temoin</h1>
      <!-- DEBUT CARDS ROW -->
      <div class="cards row gap-5 m-5">
        <!-- debut card -->
        <div class="card col gap-2" style="width: 18rem">
          <img
            src="https://www.rustica.fr/images/carpe-koi-l760-h550.jpg"
            class="card-img-top"
            alt="..."
          />
          <div class="card-body text-center">
            <h5 class="card-title #nom">Koï lulu</h5>
            <p class="card-text #description">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Neque
              distinctio repellendus est quisquam iste autem.
            </p>
            <p class="prix">150€</p>
            <a href="#" class="btn btn-primary">buy</a>
          </div>
        </div>
        <!-- fin card -->


>
        <!-- debut card -->
        <div class="card col-2 gap-2" style="width: 18rem">
          <img
            src="https://www.rustica.fr/images/carpe-koi-l760-h550.jpg"
            class="card-img-top"
            alt="..."
          />
          <div class="card-body text-center">
            <h5 class="card-title #nom">Koï lulu</h5>
            <p class="card-text #description">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Neque
              distinctio repellendus est quisquam iste autem.
            </p>
            <p class="prix">150€</p>
            <a href="#" class="btn btn-primary">buy</a>
          </div>
        </div>
        <!-- fin card -->
        <!-- debut card -->
        <div class="card col-2" style="width: 18rem">
          <img
            src="https://www.rustica.fr/images/carpe-koi-l760-h550.jpg"
            class="card-img-top"
            alt="..."
          />
          <div class="card-body text-center">
            <h5 class="card-title #nom">Koï lulu</h5>
            <p class="card-text #description">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Neque
              distinctio repellendus est quisquam iste autem.
            </p>
            <p class="prix">150€</p>
            <a href="#" class="btn btn-primary">buy</a>
          </div>
        </div>
        <!-- fin card -->
      </div>

      <!-- 
      FIN CARDS ROW -->
    </div>

    <!-- FIN CONTAINER  -->
    <!-- DEBUT CONTAINER -->
    <div class="container gap-5">

    <form>  
    <button class="btn btn-primary" method="get" type="submit" name="type"  value="mer" >Mer</button>
    <button class="btn btn-secondary" method="get" name="type"  type="submit" value="douce">Douce</button>
    <button class="btn btn-danger" type="submit" method="get" value="">Tous</button> </form>
  
      <!-- DEBUT CARDS ROW -->
      <div class="cards row gap-5 m-5">
        <!-- debut card -->
        

        <?=  $contenueDeLaPage ?>

            <?php echo $contenuDeMaPage ?>

        <!-- fin card -->
      </div>

      <!-- 
        FIN CARDS ROW -->
    </div>

    <!-- FIN CONTAINER  -->
  </body>
</html>
