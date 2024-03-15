<?php

function enregistrerNote($nom_conference, $nom_paneliste, $notes, $couleur) {
    global $pdo;

    try {
        $date_ajout = date('Y-m-d H:i:s');
        $sql = "INSERT INTO mininote (nom_conference, nom_paneliste, notes, couleur, date_ajout) VALUES (:nom_conference, :nom_paneliste, :notes, :couleur, :date_ajout)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nom_conference' => $nom_conference,
            ':nom_paneliste' => $nom_paneliste,
            ':notes' => $notes,
            ':couleur' => $couleur,
            ':date_ajout' => $date_ajout,
        ]);

        return $pdo->lastInsertId();
    } catch (PDOException $e) {
        echo "Erreur lors de l'enregistrement de la note : " . $e->getMessage();
        exit;
    }
}

function getNotes() {
    global $pdo;

    try {
        $sql = "SELECT * FROM mininote";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des notes : " . $e->getMessage();
        exit;
    }
}

function getNote($id) {
    global $pdo;

    try {
        $sql = "SELECT * FROM mininote WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération de la note : " . $e->getMessage();
        exit;
    }
}
