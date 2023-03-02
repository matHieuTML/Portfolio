<?php
// Démarrage de la session

session_start();
// Vérification de la présence d'une variable de session indiquant que l'utilisateur est en mode admin
if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
  // Si l'utilisateur n'est pas en mode admin, on vérifie si un formulaire de connexion a été soumis
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['username'] === 'admin' && $_POST['password'] === 'password') {
    // Si le formulaire de connexion a été correctement rempli, on passe l'utilisateur en mode admin
    $_SESSION['admin'] = true;
  } else {
    // Sinon, on affiche un formulaire de connexion
    ?>
    <form method="post">
      <label for="username">Nom d'utilisateur :</label>
      <input type="text" name="username" id="username" required>
      <br>
      <label for="password">Mot de passe :</label>
      <input type="password" name="password" id="password" required>
      <br>
      <input type="submit" value="Se connecter">
    </form>
    <?php
    // On arrête l'exécution du script ici
    exit;
  }
}

// Si l'utilisateur est en mode admin, on affiche les éléments de la page d'administration


include "includes/init.inc.php";
$methode =     $_GET["methode"] ?? "liste";
$controleur =  $_GET["controleur"] ?? "message";
$id =          $_GET["id"] ?? null;

$nomClasse = "Controleurs\\" . ucfirst($controleur) . "Controleur";
/* j'instancie un objet Controleur de manière dynamique ($nomClasse peut avoir n'importe quel
     nom de classe Controleur) */
$controleur = new $nomClasse;
$controleur->$methode($id);