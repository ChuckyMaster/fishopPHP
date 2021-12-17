
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
    "image"=>"img/dauphin.png",
    "eau" => "mer",
    "protege"=> true
  ], 
  ["nom"=>"Requin Marteau",
  "description"=>"c'est un requin marteau",
  "prix"=>65,
  "image"=>"img/requin.png",
  "eau" => "mer",
  "protege"=> true
]
    
  
  ];


  



$mer = '';
$douce = '';
$type = '';


  if (isset($_GET['type'])) {
   $type = $_GET['type'];

  }

$contenuDeMaPage="";
$waterFish = '';
//////$isLoggedIn= false;



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
                  (!$poisson['protege'] || $isLoggedIn) 
        )    
         { 
          $contenuDeMaPage.=$cardPoisson;
                                          
        } 
};


?>