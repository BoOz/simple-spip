<?php

/* Refaire du Z  */
// http://doc.spip.org/@public_styliser_dist
include_spip("public/styliser");
function public_styliser($fond, $contexte, $lang='', $connect='', $ext='html') {

	// s'assurer que le fond et licite
	// car il peut etre construit a partir d'une variable d'environnement
	if (strpos($fond,"../")!==false OR strncmp($fond,'/',1)==0)
		$fond = "404";
  
	// Choisir entre $fond-dist.html, $fond=7.html, etc?
	$id_rubrique = 0;
	// Chercher le fond qui va servir de squelette
	if ($r = quete_rubrique_fond($contexte))
		list($id_rubrique, $lang) = $r;

	// trouver un squelette du nom demande
	// ne rien dire si on ne trouve pas, 
	// c'est l'appelant qui sait comment gerer la situation
	$base = find_in_path("$fond.$ext");
	
	// supprimer le ".html" pour pouvoir affiner par id_rubrique ou par langue
	$squelette = substr($base, 0, - strlen(".$ext"));

	// pipeline styliser
	$squelette = pipeline('styliser', array(
		'args' => array(
			'id_rubrique' => $id_rubrique,
			'ext' => $ext,
			'fond' => $fond,
			'lang' => $lang,
			'contexte' => $contexte, // le style d'un objet peut dependre de lui meme
			'connect' => $connect
		),
		'data' => $squelette,
	));
	
	
	// Modif //
	// var_dump($fond);
	// Si la page appelée existe dans contenu/ alors on renvoie sur le sommaire
	if($s = find_in_path("contenu/" . $fond . ".html")){
		$sommaire = str_replace(".html","",find_in_path("sommaire.html"));
		$squelette = $sommaire ;
	}
	//////////

	return array($squelette, $ext, $ext, "$squelette.$ext");
}

/**/