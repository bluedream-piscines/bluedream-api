<?php
// Pas de saut de ligne, pas d'espace, PAS UN SEUL caractère avant le <?php ci-dessus !!

// Forcer désactivation de toute sortie avant headers
ob_start();

header('Content-Type: application/json');

$headers = getallheaders();
$apiKey = $headers['X-API-Key'] ?? null;
$validApiKey = getenv('API_KEY');

if (!$apiKey || $apiKey !== $validApiKey) {
    http_response_code(401);
    echo json_encode(["error" => "Clé API non définie ou invalide."]);
    exit;
}

echo json_encode(["message" => "API OK ✅"]);
ob_end_flush();
