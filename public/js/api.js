// Función para enviar el color al servidor.
export async function saveColor(previousColor, newColor) {
    try {
        // Enviar una solicitud POST al servidor con los colores anteriores y nuevos
        const response = await fetch('/save-color.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ previousColor: previousColor, newColor: newColor }) // Convertir los colores a JSON para enviarlos al servidor
        })
        return await response.json(); // Devolver la respuesta del servidor como JSON
    } catch (error) {
        console.error('Error saving color:', error);
        return null;
    }
}

// Función para obtener el color anterior del servidor.
export async function getPreviousColor() {
    let previousColor; // Variable para guardar el color anterior

    try {
        const response = await fetch('/get-color.php'); // Solicitud GET al servidor para obtener el color anterior
        const data = await response.json();
        previousColor = data.previousColor; // Asignar el color anterior obtenido a la variable previousColor
    } catch (error) {
        console.error('Error fetching previous color:', error);
    }

    return previousColor; // Devolver el color anterior obtenido del servidor
}
