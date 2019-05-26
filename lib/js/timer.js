let inicio;
let contagemRegressiva;

function startTimer(duration, display) {
    let start = Date.now(),
        diff,
        minutes,
        seconds;

    function timer() {
        // get the number of seconds that have elapsed since 
        // startTimer() was called
        diff = duration - (((Date.now() - start) / 1000) | 0);

        seconds = (diff % 60) | 0;
        
        seconds = seconds < 10 ? "00:0" + seconds : seconds;

        display.textContent = seconds; 

        //Para adicionarmos 
        if (diff <= 0) {
            display.textContent = "00:00";
            if (diff === 0) {
                VerificarLetra('');
            }
            clearInterval(contagemRegressiva);
            inicio = false;
        }
    };

    timer();
    inicio = true;
    contagemRegressiva = setInterval(timer, 1000) ;
}

function iniciar() {
    const tempoTimer = 5,
    display = document.querySelector('#time');
    inicio? reiniciar(tempoTimer, display) : startTimer(tempoTimer, display);
}

function reiniciar(tempoTimer, display) {
    clearInterval(contagemRegressiva);
    startTimer(tempoTimer, display);
}

window.onload = function () {

};