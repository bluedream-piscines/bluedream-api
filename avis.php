<?php
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
