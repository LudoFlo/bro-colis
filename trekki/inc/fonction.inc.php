<?php

//fonctions utilisateur pour differencier le simple membre ded l'admin 
function membreEstConnecte(){

	if(!isset($_SESSION['membre'])){ // si la session n'est pas créer c'est qu'il s'agit d'un simple visiteur 
		return false; 
	}else{
		return true; 
	}
}

function adminEstConnecte(){
	if(membreEstConnecte() && $_SESSION['membre']['statut'] == 1){ //l'administrateur est un mambre connecté + la valeur de son statut est égal à 1
		return true;
	}else{
		return false;
	}
}