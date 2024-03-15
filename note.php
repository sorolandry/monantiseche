<?php

include 'fonctions.php';
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
// Récupération de la note depuis la base de données
$id = $_GET['id'];
$note = getNote($id);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-XH643PJhO+5s2gSW4158dB7975F7406640843C7791a7f746434078987725688762321f0a1" crossorigin="anonymous">

    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title><?php echo $note['nom_conference']; ?></title>
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
    <section class="note">
    <h1><?php echo $note['nom_conference']; ?></h1>
    <p>
        <strong>Panéliste :</strong> <?php echo $note['nom_paneliste']; ?><br>
        <strong>Notes :</strong> <?php echo $note['notes']; ?>
    </p>
    </section>
</body>
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
            &copy 2024 | TestSimplon by Soro Penatiby Landry tous droits reservés
        </p>
    </footer>
    </div>
</html>
