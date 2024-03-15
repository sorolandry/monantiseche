<?php

include 'fonctions.php';
    //Connexion à la base de donné
    $host = 'localhost';
$dbname = 'antisechebd';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit;
}

// Traitement du formulaire
if (isset($_POST['submit'])) {
    $nom_conference = $_POST['nom_conference'];
    $nom_paneliste = $_POST['nom_paneliste'];
    $notes = $_POST['notes'];
    $couleur = $_POST['couleur'];

    // Enregistrement de la note dans la base de données
    $id_note = enregistrerNote($nom_conference, $nom_paneliste, $notes, $couleur);

    // Redirection vers la page de liste des notes
    header('Location: liste_notes.php');

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-XH643PJhO+5s2gSW4158dB7975F7406640843C7791a7f746434078987725688762321f0a1" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta name="description" content="Mon Antiseche, soro penatiby landry, test simplon cloud computing, fabrique du numérique, noté votre désir afin de les voirs après enregistrement, aide pour les note en conference">
    <title>Prendre des notes pendant une conférence</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="font-awesome.min.css">
</head>
<body>
    <div class="tener">
    <header>
        <nav>
            <div class="logo">Mon Antiseche</div>
            <ul class="nav-list">
                <li class="item"><a href="index.php">Redaction</a></li>
                <li class="item"><a href="liste_notes.php">Mes Notes</a></li>
            </ul>
        </nav>
    </header>
    <section>
    <div class="contener">
<div class="gauche">
            <h1>NOTES</h1>
        </div>
<div class="droite">
    <div class="card-form">
    <h1>NOTES</h1>
        <form action="index.php" method="post">
            <label for="nom_conference"></label>
            <input type="text" placeholder="Titre / Occasion" name="nom_conference" id="nom_conference">

            <label for="nom_paneliste"></label>
            <input type="text" placeholder="Type / nom de matière..." name="nom_paneliste" id="nom_paneliste">

            <label for="notes"></label>
            <textarea name="notes" id="notes" placeholder="Resumé"></textarea>

            <label for="couleur"></label>
            <input type="color" name="couleur" id="couleur">
            <input type="submit" name="submit" value="Enregistrer" class="btn">
        </form>
        </div>
    </div>
    </div>
    </section>
    <footer>
        <div class="telm">
        <div class="logo">Mon Antiseche</div>
        <div class="nav">
            <h2>Navigation</h2>
            <ul class="fo">
                <li class="item"><a href="index.php">Redaction</a></li>
                <li class="item"><a href="liste_notes.php">Mes Notes</a></li>
            </ul>
        </div>
        <div class="contact">
            <h2>A propos</h2>
            <p>Cocody, Abidjan, côte d'ivoire</p>
            <p>+225 0700169566</p>
            <p>soropenatibylandry@gmail.com</p>
        </div>
        <div class="social_icon">
            <h2>Sociaux</h2>
            <ul>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
        </div>
        </div>
        <p class="copyright_text">
            &copy 2024 | TestSimplon by Soro Penatiby Landry tous droits réservés
        </p>
    </footer>
    </div>
</body>
</html>
