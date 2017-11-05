//Kolumne mit id verstecken, wenn man auf den Namen clickt
function hideCol(id) { 
         var col = document.getElementById(id);
		 if(col.style.visibility == 'collapse'){
			 col.style.visibility = 'visible';
		 }
		 else{
			 col.style.visibility = 'collapse';
		 }
}

//Sortieren von Eintraegen in der Tabelle (false - alphabetisch absteigend, true - alphabetisch aufsteigend)
function sort(id,bool){
	var table = document.getElementById(id);
	var rows = table.rows;
	var names = [];
	var l = rows.length;
	for(var i = 1; i<l; i++){
		names.push(rows[i].cells[1].innerHTML);
	}
	
	//Sortieren von Namen
	names.sort(); 
	if(bool != false){
		var reverse = names.reverse();
		names = reverse;
	}

	for(var q = 0; q < l-1; q++){
		name = names[q];
		var name2 = '';
		var j = 0;	
		
		while(j < l && name != name2){
			j++;
			name2 = rows[j].cells[1].innerHTML;
			console.log(name2);
		}
		//Hinzufuegen einer Zeile zum richtigen Platz
		rows[0].parentNode.insertBefore(rows[j], rows[0].nextSibling);
	}	
}

//Ausblenden vom nav_vertical
function showMenu() {
	var nav_vertical = document.getElementById('nav_vertical'); 
	if(nav_vertical.style.visibility != 'visible'){
		nav_vertical.style.visibility = 'visible';
		nav_vertical.style.display = 'block';
	}else{
		nav_vertical.style.visibility = 'collapse';
		nav_vertical.style.display = 'none';
	}
	
}
