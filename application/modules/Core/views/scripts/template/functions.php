<?php
/* -----------------------------------------
* FONCTIONS DE ROUTINES
* Author : Grégory Bellencontre
-------------------------------------------- */


/* -----------------------------------------
* TESTE SI LES MAGIC QUOTES SONT ACTIVÉES
* ------------------------------------------
* @param	/
* @return 	true ou false
-------------------------------------------- */

$mq = get_magic_quotes_gpc();

/* -----------------------------------------
* DÉFINIE LA ZONE HORAIRE UTILISÉE
* ------------------------------------------
* @param	/
* @return 	TimeZone
-------------------------------------------- */

function setTimeZone() {
	return new DateTimeZone('Europe/Paris');
}

/* -----------------------------------------
* TESTE SI IL S'AGIT D'INTERNET EXPLORER OU NON
* ------------------------------------------
* @param	/
* @return 	true ou false
-------------------------------------------- */

function isIE() {
    if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
        return true;
    else
        return false;
}

/* -----------------------------------------
* TESTE SI IL S'AGIT D'INTERNET EXPLORER ET 
* QUE SA VERSION EST INFÉRIEURE À LA 9
* ------------------------------------------
* @param	/
* @return 	true ou false
-------------------------------------------- */

function isLtIE9() {
	if (strstr($_SERVER['HTTP_USER_AGENT'], '; MSIE 5') ) {
		return true;
	} 
	elseif (strstr($_SERVER['HTTP_USER_AGENT'], '; MSIE 6') ) {
		return true;
	} 
	elseif (strstr($_SERVER['HTTP_USER_AGENT'], '; MSIE 7') ) {
		return true;
	} 
	elseif (strstr($_SERVER['HTTP_USER_AGENT'], '; MSIE 8' ) ) {
		return true;
	} 
	else {
		return false;
	}
}

/* -----------------------------------------
* TESTE SI IL S'AGIT D'INTERNET EXPLORER ET 
* QUE SA VERSION EST INFÉRIEURE OU ÉGALE À
* IE6
* ------------------------------------------
* @param	/
* @return 	true ou false
-------------------------------------------- */

function isLteIE6() {
	if (strstr($_SERVER['HTTP_USER_AGENT'], '; MSIE 5') ) {
		return true;
	}
	elseif (strstr($_SERVER['HTTP_USER_AGENT'], '; MSIE 6') ) {
		return true;
	}
	else {
		return false;
	}
}

/* -----------------------------------------
* TESTE SI GOOGLE CHROME FRAME EST INSTALLÉ
* ------------------------------------------
* @param	/
* @return 	true ou false
-------------------------------------------- */

function gcfEnabled() {
	if (stristr($_SERVER['HTTP_USER_AGENT'], 'chromeframe') ) {
		return true;
	}
	else {
		return false;
	}
}

?>