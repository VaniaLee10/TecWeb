//Son mis funciones requeridas para la calculadora básica
//PHP con name      JavaScript con id


function Suma() {
    let N1 = document.getElementById("numero_1").value;
    let N2 = document.getElementById("numero_2").value;
    let Suma = parseInt(N1) + parseInt(N2);
    //alert("Valor de N1: "+N1+"     Valor de N2: "+N2);
    alert("La suma es: "+Suma);
}

function Resta() {
    let N1 = document.getElementById("numero_1").value;
    let N2 = document.getElementById("numero_2").value;
    let Resta = N1 - N2;
    //alert("Valor de N1: "+N1+"     Valor de N: "+N2);
    alert("La resta es: "+Resta);
}

function Multiplicacion() {
    let N1 = document.getElementById("numero_1").value;
    let N2 = document.getElementById("numero_2").value;
    let Multiplicacion = N1 * N2;
    //alert("Valor de N1: "+N1+"     Valor de N2: "+N2);
    alert("La multiplicacion es: "+Multiplicacion);
}

function Division() {
    let N1 = document.getElementById("numero_1").value;
    let N2 = document.getElementById("numero_2").value;
    let Division = N1 / N2;
    //alert("Valor de N1: "+N1+"     Valor de N2: "+N2);
    alert("La division es: "+Division);
}