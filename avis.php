
<?php
header('Content-Type: application/json');

$apiKey = getenv('GOOGLE_API_KEY');
if (!$apiKey) {
    http_response_code(500);
    echo json_encode(['error' => 'Clé API non définie.']);
    exit;
}

$placeId = 'ChIJP3Sa8ziLthUR9mUT5O_f4P8';
$url = "https://maps.googleapis.com/maps/api/place/details/json?place_id={$placeId}&fields=name,rating,reviews&key={$apiKey}";

$response = file_get_contents($url);

if ($response === FALSE) {
    http_response_code(500);
    echo json_encode(['error' => 'Erreur lors de la récupération des données depuis l’API Google.']);
    exit;
}

$data = json_decode($response, true);

if (isset($data['result']['reviews'])) {
    $reviews = $data['result']['reviews'];
    echo json_encode($reviews);
} else {
    echo json_encode(['message' => 'Aucun avis trouvé.']);
}
?>
