<?php 
include 'includes/init.inc.php';

use Controleurs\MessageControleur;
$send = new MessageControleur();
$send->ajouterUser();


use Controleurs\ContentControleur;
$coordonne = new ContentControleur();
$phone = $coordonne->afficheCa(1);
$mail = $coordonne->afficheCa(2);
$presentation = $coordonne->afficheCa(3);
$adresse = $coordonne->afficheCa(4);
$like = $coordonne->afficheCa(5);




use Controleurs\ProjetControleur;
$projet = new ProjetControleur();
$projetjs = $projet->listeUser("projet", "javascript");
$projetphp = $projet->listeUser("projet", "php");

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="shortcut icon" type="image/png" href="pxArt__1_-removebg.png"/>
    <title>Portfolio</title>
</head>
<body>
<?php if(isset($erreurs)) : ?>
    <?php foreach($erreurs as $champ => $message): ?>
        <div class="alert alert-danger"><?= $champ ?> : <?= $message ?></div>
    <?php endforeach ?>
<?php endif ?>

    <script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/836/three.min.js'></script>
    <script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/836/simplex-noise.min.js'></script><script  src="./sand.js"></script>
    <div class="nav-container">
        <img src="logo-final.png" alt="logo" class="logo">
      <div class="nav-item" id="nav-item-1">Home</div>
      <div class="nav-item" id="nav-item-2">About</div>
      <div class="nav-item" id="nav-item-3">Contact</div>
    </div>
    <div class="content-container">
      <div class="content-item show-1 c-i-in" id="content-item-1">
        <img src="gallery.png" alt="LE mot gallery écrit avec la poliec meuga" class="img-in ap" id="gallery">
        <hr class="hr-in" id="hr-gallery">
        <div class="cont-in" id="lang">
          <div class="no" id="js">Javascript↗</div>
          <div class="no" id="php">PHP↗</div>
          <div class="no" id="html">HTML/CSS↗</div>
        </div>
        <div class="page" id="jspage">
            <button class="close">X</button>
            <div class="petit-fils">
                <?php foreach($projetjs as $p): ?>
                    <div class="titrejs"><?= $p->getTitre() ?></div>
                <?php endforeach;  ?>
            </div>
            <div class="hr-vertical"></div>
            <?php foreach($projetjs as $p): ?>
                <div class="petit-fils projetjs no-ap">
                    <img class="img-projet" src="data:image/jpeg;base64,<?php echo base64_encode($p->getPhoto()); ?>" alt="Ma superbe image" class="img-thumbnail">
                    <p><?= $p->getDescription() ?></p>
                </div>
            <?php endforeach;  ?>
        </div>
        <div class="page" id="phppage">
            <button class="close">X</button>
            <div class="petit-fils">
                <?php foreach($projetphp as $p): ?>
                    <p><?= $p->getTitre() ?></p>
                <?php endforeach;  ?>
            </div>
        </div>
        <div class="page" id="htmlpage">
            <button class="close">X</button>
            <div class="petit-fils">
            </div>
        </div>
      </div>
      <div class="content-item" id="content-item-2">Contenu 2</div>
      <div class="content-item c-i-in" id="content-item-3">
        <div class="fils">
          <div class="petit-fils" id="pf1">
            <img src="contact.png" alt="une photo ou est écrit contact" class="img-in no-ap" id="contact">
          </div>
          <div class="no-barre"id="hr-1" ></div>
          <div class="petit-fils" id="coordonne">
            <div class="no"> ☎ <?php echo $phone ?></div>
            <div class="no email-center"><p class="email-logo">✉   </p> <?php echo $mail ?></div>
            <div class="no"><img src="position.png" alt="adresse" class="i2">  <?php echo $adresse ?></div>
          </div>
        </div>
        <hr class="hr-in" id="hr-best">
        <div class="fils">
          <form class="petit-fils" enctype="multipart/form-data" method="post">
            <label for="nom"></label>
            <input type="text" name="nom" id="nom" required placeholder="Nom :">
            <hr class="hr-contact">

            <label for="email"></label>
            <input type="email" name="email" id="email" placeholder="Email :"required >
            <hr class="hr-contact">

            <label for="content"></label>
            <textarea name="content" id="content" placeholder="Contenu :"></textarea>
            <hr class="hr-contact">
            <button type="submit" id="submit">Envoyer</button>
        
          </form>
          <div class="petit-fils " id="reseau">
            <a href="https://github.com/matHieuTML" target="_blank">
              <img src="icons8-github-512.png" class="i" alt="">
            </a>
            <a href="https://www.linkedin.com/in/mathieu-gaucher-bb2503263/"target="_blank">
              <img src="linkein.png" class="i" alt="">
            </a>
            <a href="https://www.instagram.com/mathieugaucher/" target="_blank">
              <img src="icons8-instagram-500.png"class="i" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
