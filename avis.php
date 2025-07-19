header('Content-Type: application/json');

// Accepter la clé depuis les headers ou l'URL
$headers = getallheaders();
$apiKey = $headers['X-API-Key'] ?? $_GET['api_key'] ?? null;

$validApiKey = getenv('API_KEY');

if (!$apiKey || $apiKey !== $validApiKey) {
    http_response_code(401);
    echo json_encode(["error" => "Clé API non définie ou invalide."]);
    exit;
}

echo json_encode(["message" => "API OK ✅"]);

