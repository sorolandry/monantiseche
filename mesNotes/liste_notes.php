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
// Récupération des notes depuis la base de données
$notes = getNotes();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-XH643PJhO+5s2gSW4158dB7975F7406640843C7791a7f746434078987725688762321f0a1" crossorigin="anonymous">

    <meta charset="UTF-8">
    <title>Liste des notes</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
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
    <table>
        <thead>
            <tr>
                <th>Nom de la conférence</th>
                <th>Date d'ajout</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notes as $note) : ?>
                <tr>
                    <td><a href="note.php?id=<?php echo $note['id']; ?>"><?php echo $note['nom_conference']; ?></a></td>
                    <td><?php echo $note['date_ajout']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
