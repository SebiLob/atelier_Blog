<?php

if (
	empty($_POST['nom']) || 
	empty($_POST['prenom']) || 
	empty($_POST['age']) || 
	empty($_POST['langue'])
	){
	echo "Merci de remplir tous les champs";
}

else{
	include_once 'modele/connexion_bdd.php';

	$nom = htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
	$age = htmlspecialchars($_POST['age']);
	$langue = htmlspecialchars($_POST['langue']);

	$query = $bdd->prepare('INSERT INTO eleve (nom, prenom, age, langage) VALUES (?, ?, ?, ?)');
	$query->execute(array(
		$nom,
		$prenom,
		$age,
		$langue
		));
	$query->CloseCursor();
}

header('Location: index.php');