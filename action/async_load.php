<?php

/***************************************************************************\
 *  SPIP, Systeme de publication pour l'internet                           *
 *                                                                         *
 *  Copyright (c) 2001-2016                                                *
 *  Arnaud Martin, Antoine Pitrou, Philippe Riviere, Emmanuel Saint-James  *
 *                                                                         *
 *  Ce programme est un logiciel libre distribue sous licence GNU/GPL.     *
 *  Pour plus de details voir le fichier COPYING.txt ou l'aide en ligne.   *
\***************************************************************************/

if (!defined('_ECRIRE_INC_VERSION')) return;

// http://doc.spip.org/@action_iconifier_dist
function action_async_load_dist()
{
	$async_fond= _request("async_fond");
	$param= _request("param");
	//var_dump($async_fond) ;
	//var_dump($param) ;
	
	$index = 0 ;
	$param = explode(",",$param) ;
	foreach($param as $p){
		if($index % 2 == 0)
			$contexte[$p] = $param[$index+1] ;
		$index++;
	}
	include_spip("inc/utils");
	$code = recuperer_fond($async_fond, $contexte);
	
	echo $code ;

	//die("hoho");

	return 1 ;

}
