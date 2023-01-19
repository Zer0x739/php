<?php
// Přijetí dat z HTTP požadavku
$data = json_decode(file_get_contents('php://input'), true);
// Zpracování dat
$password = generate_password($data);
// Odeslání hesla
echo json_encode(['password' => $password]);
function generate_password($data) {
    // Získání požadavku na délku hesla z dat
    $length = $data['length'];
    // Inicializace proměnných pro heslo
    $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $lowercase = 'abcdefghijklmnopqrstuvwxyz';
    $numbers = '0123456789';
    $symbols = '!@#$%^&*()_+-=[]{}|;:\'",.<>/?';
    $password = '';
    // Sestavení řetězce znaků, ze kterých se bude heslo generovat
    $chars = $uppercase . $lowercase . $numbers . $symbols;
    // Generování hesla
    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[rand(0, strlen($chars) - 1)];
    }
    return $password;
}