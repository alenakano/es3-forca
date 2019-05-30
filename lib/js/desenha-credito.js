function DesenhaCredito(credito){

	var b = document.getElementById('creditos');
	b.innerHTML = '';
	var p = document.createElement('span');
	p.setAttribute('class','row');
        
    var texto = document.createTextNode('Você possui '+credito);
    p.appendChild(texto);
   
    b.appendChild(p);
}