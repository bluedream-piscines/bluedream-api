<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = json_decode(file_get_contents('php://input'), true);
    $apiKey = isset($json['cle']) ? $json['cle'] : null;

    if ($apiKey === 'BLUEDREAM-API-SECRET') {
        echo json_encode([
            ['auteur' => 'Marie', 'avis' => 'Super prestation !', 'note' => 5],
            ['auteur' => 'Luc', 'avis' => 'Très satisfait du service.', 'note' => 4.5],
        ]);
    } else {
        echo json_encode(['error' => 'Clé API non définie ou invalide.']);
    }
} else {
    echo json_encode(['error' => 'Méthode non autorisée.']);
}
