<?php 
   

   session_start();
   require_once "authentification.php";
   require_once "poissons.php";




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
              <a class="nav-link active" href=""
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
            <li>     <?php if(!$isLoggedIn){?>
                <form action="" method="post">
                    <input type="text" name="username" id="">
                    <input type="password" name="password" id="">
                    <button type="submit" class="btn btn-success">Log in</button>
                   
                      <span style="color:white" ><?= $messageErreur ?></span>
                     <?php }else{?>

                        <span style="color:white;font-weight:bolder">
                     Bonjour <?= $_SESSION['username'] ?> !
                      </span>
                        <form method="post">
                          <button class="btn btn-danger" type="submit" name="logout">Log out</button>
                        </form>
                  <?php } ?>

                </form> </li>
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
    <p> <?=  var_dump($isLoggedIn)?></p>
    <p> <?=  var_dump($_SESSION)?></p>

    <!-- DEBUT CONTAINER -->
    <div class="container  gap-5">
      <h1> Cards Temoin</h1>
      <!-- DEBUT CARDS ROW -->
      <div class="cards row gap-5">
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
