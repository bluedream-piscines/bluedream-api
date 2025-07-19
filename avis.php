<?php
header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['cle']) || $input['cle'] !== 'BLUEDREAM-API-SECRET') {
    echo json_encode(['error' => 'Clé API non définie.']);
    exit;
}

echo json_encode([
    ['auteur' => 'Marie', 'avis' => 'Super prestation !', 'note' => 5],
    ['auteur' => 'Luc', 'avis' => 'Très satisfait du service.', 'note' => 4.5]
]);
