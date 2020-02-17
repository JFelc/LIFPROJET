<?php
// index.php fait office de controleur frontal
session_start(); // démarre ou reprend une session
//require('include/constantes.php'); // vous pouvez inclure directement ce fichier de constantes (sans le if ... else précédent)
//require('include/includes.php'); // inclut le fichier avec fonctions (notamment celles du modele)
require('include/routes.php'); // fichiers de routes

if(isset($_GET['page'])) 
{
	$nomPage = $_GET['page'];
	
    if(isset($routes[$nomPage])) 
    {
		$controleur = $routes[$nomPage]['controleur'];
		$vue = $routes[$nomPage]['vue'];
		include('controleurs/' . $controleur . '.php');
		include('vue/' . $vue . '.php');
	}
	else {
		include('static/Accueil.php');
	}
}
else {
	include('static/Accueil.php');
}

?>
