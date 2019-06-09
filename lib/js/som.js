    var som_partida = document.getElementById('som_partida');
	var som_derrota = document.getElementById('som_derrota');
	var som_vitoria = document.getElementById('som_vitoria');
	var som_espera = document.getElementById('som_espera');
    var som_relogio = document.getElementById('som_relogio');
    var som_alerta_erro = document.getElementById('som_alerta_erro');
    var som_alerta_acerto = document.getElementById('som_alerta_acerto');
    var som_corvo = document.getElementById('som_corvo');
    var som_sangue = document.getElementById('som_sangue');
    var som_moeda = document.getElementById('som_moeda');
	som_partida.loop = true;
	som_derrota.loop = true;
	som_vitoria.loop = true;
	som_espera.loop = true;

    function som_alerta_erro_play(){
        som_alerta_erro.currentTime = 0;
        som_alerta_erro.play();
    } 
    function som_alerta_erro_stop(){
        som_alerta_erro.pause();
        som_alerta_erro.currentTime = 0;
    } 
    function som_alerta_acerto_play(){
        som_alerta_acerto.currentTime = 0;
        som_alerta_acerto.volume=0.5;
        som_alerta_acerto.play();
    }
    function som_alerta_acerto_stop(){               
        som_alerta_acerto.pause();
        som_alerta_acerto.currentTime = 0;
    } 
    function som_corvo_play(){
        som_corvo.currentTime = 0;
        som_corvo.play();
    } 
    function som_corvo_stop(){
        som_corvo.pause();
        som_corvo.currentTime = 0;
    } 
    function som_sangue_play(){
        som_sangue.currentTime = 0;
        som_sangue.play();
    } 

    function som_moeda_play(){
        som_moeda.currentTime = 0;
        som_moeda.play();
    } 

    function som_relogio_play(){
        som_relogio.currentTime = 0;
        som_relogio.volume=0.3;
        som_relogio.play();
    }    
 
    function som_relogio_stop(){
        som_relogio.pause();
        som_relogio.currentTime = 0;
    }
 
    function som_partida_play(){
        som_partida.play();
    }    
 
    function som_partida_stop(){
        som_partida.pause();
        som_partida.currentTime = 0;
    }

    function tempo_som_partida(){
        return som_partida.currentTime;
    }
	
	function som_espera_play(){
        som_espera.play();
    }    
 
    function som_espera_stop(){
        som_espera.pause();
        som_espera.currentTime = 0;
    }

	
	function som_vitoria_play(){
        som_vitoria.play();
    }    
 
    function som_vitoria_stop(){
        som_vitoria.pause();
        som_vitoria.currentTime = 0;
    }
	
	function som_derrota_play(){
        som_derrota.play();
    }    
 
    function som_derrota_stop(){
        som_derrota.pause();
        som_derrota.currentTime = 0;
    }
	
	/*
	function pause(){
        som_forca.pause();
    }
 
    function aumentar_volume(){
        if( audio.volume < 1)  audio.volume += 0.1;
    }
 
    function diminuir_volume(){
        if( audio.volume > 0)  audio.volume -= 0.1;
    }
         
    function mute(){
        if( audio.muted ){
            audio.muted = false;
        }else{
            audio.muted = true;
        }
    }*/
