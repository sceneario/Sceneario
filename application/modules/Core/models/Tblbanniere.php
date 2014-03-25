<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblbanniere
 * @desc TABLE  : tbl_Banniere
 * @file Tblbanniere.php
 * @desc PK     : nomBanniere
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblbanniere
{

	/* 
	 * @var string - type SQL : varchar $_nomBanniere
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nomBanniere ; 

	/* 
	 * @var string - type SQL : varchar $_commentaire
	 * @desc __A_SPECIFIER__
	 */ 
	private $_commentaire ; 

	/* 
	 * @var string - type SQL : text $_codeBanniere
	 * @desc __A_SPECIFIER__
	 */ 
	private $_codeBanniere ; 

	/* 
	 * @var string - type SQL : char $_T_actif
	 * @desc __A_SPECIFIER__
	 */ 
	private $_T_actif ; 

	/* 
	 * @var int - type SQL : tinyint $_plage_min
	 * @desc __A_SPECIFIER__
	 */ 
	private $_plage_min ; 

	/* 
	 * @var int - type SQL : tinyint $_plage_max
	 * @desc __A_SPECIFIER__
	 */ 
	private $_plage_max ; 

	/* 
	 * @var int - type SQL : int $_nb_affichages_site
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nb_affichages_site ; 

	/* 
	 * @var int - type SQL : int $_nb_affichages_forum
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nb_affichages_forum ; 

	/* 
	 * @var int - type SQL : int $_nb_affichages_jeu
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nb_affichages_jeu ; 

	/* 
	 * @var string - type SQL : char $_type_affichage
	 * @desc __A_SPECIFIER__
	 */ 
	private $_type_affichage ; 

	/* 
	 * @var string - type SQL : char $_T_Stat_Clic
	 * @desc __A_SPECIFIER__
	 */ 
	private $_T_Stat_Clic ; 

	/* 
	 * @var int - type SQL : int $_nb_clics
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nb_clics ; 

	/* 
	 * @var string - type SQL : varchar $_url_redirect
	 * @desc __A_SPECIFIER__
	 */ 
	private $_url_redirect ; 

	/* 
	 * @var int - type SQL : tinyint $_format
	 * @desc __A_SPECIFIER__
	 */ 
	private $_format ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_nomBanniere
	 * @var string $nomBanniere
	 */ 
	public function setNomBanniere($nomBanniere)
	{
		$this->_nomBanniere = $nomBanniere ;
		return $this;

	}
	public function getNomBanniere()
	{
		return $this->_nomBanniere ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_commentaire
	 * @var string $commentaire
	 */ 
	public function setCommentaire($commentaire)
	{
		$this->_commentaire = $commentaire ;
		return $this;

	}
	public function getCommentaire()
	{
		return $this->_commentaire ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_codeBanniere
	 * @var string $codeBanniere
	 */ 
	public function setCodeBanniere($codeBanniere)
	{
		$this->_codeBanniere = $codeBanniere ;
		return $this;

	}
	public function getCodeBanniere()
	{
		return $this->_codeBanniere ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_T_actif
	 * @var string $T_actif
	 */ 
	public function setT_actif($T_actif)
	{
		$this->_T_actif = $T_actif ;
		return $this;

	}
	public function getT_actif()
	{
		return $this->_T_actif ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_plage_min
	 * @var int $plage_min
	 */ 
	public function setPlage_min($plage_min)
	{
		$this->_plage_min = $plage_min ;
		return $this;

	}
	public function getPlage_min()
	{
		return $this->_plage_min ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_plage_max
	 * @var int $plage_max
	 */ 
	public function setPlage_max($plage_max)
	{
		$this->_plage_max = $plage_max ;
		return $this;

	}
	public function getPlage_max()
	{
		return $this->_plage_max ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_nb_affichages_site
	 * @var int $nb_affichages_site
	 */ 
	public function setNb_affichages_site($nb_affichages_site)
	{
		$this->_nb_affichages_site = $nb_affichages_site ;
		return $this;

	}
	public function getNb_affichages_site()
	{
		return $this->_nb_affichages_site ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_nb_affichages_forum
	 * @var int $nb_affichages_forum
	 */ 
	public function setNb_affichages_forum($nb_affichages_forum)
	{
		$this->_nb_affichages_forum = $nb_affichages_forum ;
		return $this;

	}
	public function getNb_affichages_forum()
	{
		return $this->_nb_affichages_forum ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_nb_affichages_jeu
	 * @var int $nb_affichages_jeu
	 */ 
	public function setNb_affichages_jeu($nb_affichages_jeu)
	{
		$this->_nb_affichages_jeu = $nb_affichages_jeu ;
		return $this;

	}
	public function getNb_affichages_jeu()
	{
		return $this->_nb_affichages_jeu ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_type_affichage
	 * @var string $type_affichage
	 */ 
	public function setType_affichage($type_affichage)
	{
		$this->_type_affichage = $type_affichage ;
		return $this;

	}
	public function getType_affichage()
	{
		return $this->_type_affichage ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_T_Stat_Clic
	 * @var string $T_Stat_Clic
	 */ 
	public function setT_Stat_Clic($T_Stat_Clic)
	{
		$this->_T_Stat_Clic = $T_Stat_Clic ;
		return $this;

	}
	public function getT_Stat_Clic()
	{
		return $this->_T_Stat_Clic ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_nb_clics
	 * @var int $nb_clics
	 */ 
	public function setNb_clics($nb_clics)
	{
		$this->_nb_clics = $nb_clics ;
		return $this;

	}
	public function getNb_clics()
	{
		return $this->_nb_clics ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_url_redirect
	 * @var string $url_redirect
	 */ 
	public function setUrl_redirect($url_redirect)
	{
		$this->_url_redirect = $url_redirect ;
		return $this;

	}
	public function getUrl_redirect()
	{
		return $this->_url_redirect ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_format
	 * @var int $format
	 */ 
	public function setFormat($format)
	{
		$this->_format = $format ;
		return $this;

	}
	public function getFormat()
	{
		return $this->_format ;
	}
}
