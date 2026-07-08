<?php
include_once 'databaseConnect.php';

header("Access-Control-Allow-Origin: *"); 
header("Content-Type: application/json; charset=UTF-8"); 
header("Access-Control-Allow-Methods: GET"); 

// Peticion GET para obtener el color anterior
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        // Obtener el color anterior de la base de datos
        $stmt = $conn->prepare("SELECT new_color FROM logs_rhombus ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        $result = $stmt->get_result();

        // Si se encuentra un color anterior, devolverlo, si no, devolver un color predeterminado
        if ($result && $result->num_rows > 0) {
            $colorData = $result->fetch_assoc();
            http_response_code(200); // Devolver código de estado 200 OK
            echo json_encode(["previousColor" => $colorData['new_color']]); // Devolver el color anterior en formato JSON
        } else {
            // Si no se encuentra un color anterior, devolver un color predeterminado 
            echo json_encode(["previousColor" => "#FF0000"]);
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(["error" => "Internal Server Error: " . $e->getMessage()]);
    }
}
