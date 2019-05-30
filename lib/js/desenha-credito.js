function DesenhaCredito(credito){

	var b = document.getElementById('creditos');
	b.innerHTML = '';
	var p = document.createElement('span');
	p.setAttribute('class','row');
        
    var texto = document.createTextNode('Você possui '+credito+'  ');
    p.appendChild(texto);
       	var img = document.createElement('img');
            img.setAttribute('alt','coin');
            img.setAttribute('src','img/coin.png');
            img.setAttribute('height','24px');
            img.setAttribute('width','24px');
    p.appendChild(img);
    b.appendChild(p);
}