function AgregarDigito(digito) {
    // 1. Referencia a mi objeto HTML
    let display = document.getElementById("display");
    display.value+=digito;
}

function AgregarOperador(operador) {
    let display = document.getElementById("display");
    display.value+=operador;
}

function CalcularResultado() {
    let display = document.getElementById("display");
    //Función eval: evalua las expresiones y realiza las operaciones
    let resultado = eval(display.value);
    display.value = resultado;
}

function CalcularPotencia() {
    let display = document.getElementById("display");
    let base = eval(display.value);
    let exponente = npotencia.value;
    //Función pow, del paquete Math, utiliza una base y un exponente, para una potencia
    display.value= Math.pow(base,exponente);
}

function CalcularFactorial() {
    let display = document.getElementById("display");
    let numero = eval(display.value);
    let resultado = 1;
    for (let i = 1; i <= numero; i++) {
        resultado = resultado * i        
    }
    display.value = resultado;
}

function Borrar() {
    let display = document.getElementById("display");
    display.value='';
}

function CalcularRaiz() {
    let display = document.getElementById("display");
    let numero = eval(display.value);
    let resultado = Math.sqrt(numero);
    display.value = resultado;
}

function CalcularLn() {
    let display = document.getElementById("display");
    let numero = eval(display.value);
    let resultado = Math.log(numero);
    display.value = resultado;
}

function CalcularLog() {
    let display = document.getElementById("display");
    let numero = eval(display.value);
    let resultado = Math.log10(numero);
    display.value = resultado;
}

function CalcularPorcentaje() {
    let display = document.getElementById("display");
    let numero = eval(display.value);
    let resultado = numero/100;
    display.value = resultado;
}