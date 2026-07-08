<?php
include_once 'databaseConnect.php';

header("Content-Type: application/json; charset=utf-8"); // Indicar que la respuesta es JSON
header("Access-Control-Allow-Methods: POST"); // Permitir solo el método POST

// Comprobar que el método de la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);

    echo json_encode([
        "status" => "error",
        "message" => "Metodo no permitido."
    ]);
    exit;
}

$input = json_decode(file_get_contents("php://input"), true); // Obtener y decodificar el JSON recibido

// Validar que se han recibido los datos necesarios
if (!$input) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Los datos recibidos no son válidos."]);
    exit;
}

// Obtener los valores del JSON recibido
$previousColor = $input['previousColor'];
$newColor = $input['newColor'];

// Preparar la consulta SQL para insertar el registro en la base de datos
$sql = "INSERT INTO logs_rhombus (previous_color, new_color, change_history) VALUES (?, ?, NOW())";
$stmt = $conn->prepare($sql);

// Verificar que la consulta se ha preparado correctamente
if ($stmt) {
    $stmt->bind_param("ss", $previousColor, $newColor); // ss = dos parámetros de tipo string

    // Ejecutar la consulta y comprobar si hubo errores
    if ($stmt->execute()) {
        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "Color guardado correctamente."]);
    } else {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Error al ejecutar la consulta: " . $stmt->error]);
    }

    $stmt->close(); 
} else {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Error al preparar la consulta: " . $conn->error]);
}

$conn->close(); // Cerrar la conexión con la base de datos