<?php
// header doit être le tout premier à s’exécuter
header('Content-Type:application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['cle']) || $data['cle'] !== 'BLUEDREAM-API-SECRET') {
    echo json_encode(["error" => "Clé API non définie ou incorrecte."]);
    exit;
}

// Réponse simulée OK
echo json_encode(["message" => "API valide, accès autorisé."]);
