import { saveColor, getPreviousColor } from './api.js';
import { generateRandomColor } from './color.js';

var btn = document.querySelector('.rhombus'); // Seleccionar el elemento del rombo
let currentColor = await getPreviousColor(); // Obtener el color anterior 

// Función para inicializar el color del rombo al cargar la página
export async function initializeRhombusColor() {
    currentColor = await getPreviousColor();
    btn.style.backgroundColor = currentColor; // Asignar el anterior color del rombo al cargar la página
}

// Función para cambiar el color del rombo al hacer clic
async function changeColorRhombus() {
    var newColor = generateRandomColor(); // Llamar a la función para generar un nuevo color aleatorio
    btn.style.backgroundColor = newColor; // Cambiar el color del rombo al nuevo color generado

    const result = await saveColor(currentColor, newColor); // Llamar a la función para guardar el nuevo color en el servidor, pasando el color anterior y el nuevo color 
    currentColor = newColor;

    if (!result || result.status !== "success") {
        btn.style.backgroundColor = await getPreviousColor(); // Si hubo un error, volver al color anterior
    }
}

// Función para exportar y configurar el evento de clic en el rombo
export function changeRhombusColor() {
    btn.addEventListener("click", changeColorRhombus);
}