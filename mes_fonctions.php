<?php

/* Refaire du Z en plus simple */
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
	// Si la page appelée existe dans pages/ alors on renvoie sur le sommaire
	if($s = find_in_path("pages/" . $fond . ".html")){
		$sommaire = str_replace(".html","",find_in_path("sommaire.html"));
		$squelette = $sommaire ;
	}
	//////////

	return array($squelette, $ext, $ext, "$squelette.$ext");
}

// convertir un tableau (ou plusieurs) HTML sur une page web en tsv.
// [(#VAL{https://www.challenges.fr/classements/fortune/}|table2tsv)]


function table2tsv($url, $ecrire_fichier = false){
	
	// recuperer la page
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_COOKIESESSION, true);
	$page = curl_exec($curl);
	curl_close($curl);

	// titre de la page
	$titre = textebrut(extraire_balise($page, "title"));
	// trouver des tableaux HTML
	$tables = extraire_balises($page, "table");

	// convertir en tsv
	foreach($tables as $t){
		$d = preg_replace("/\R/","", $t);
		$d = preg_replace("/<t(d|h)[^>]*>/i","	", $d);
		$d = preg_replace("/<tr>/i", "\n", $d);
		$d = supprimer_tags($d);
		$d = preg_replace("/ +/", " ", $d);
		$d = preg_replace("/^ *	 */im", "", $d);
		$d = trim($d);
	}

	$data .= $d ."\n\n" . "Source" ."\t" . $titre . "\t" . $url ."\n" ;

	return $data ;


}
