<?php 

/*
 * SCENEARIO.COM
 * Table des infos membres
 * @desc CLASSE : Core_Model_Tblmemberinfo
 * @desc TABLE  : tbl_Member_Info
 * @file Tblmemberinfo.php
 * @desc PK     : user_id
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblmemberinfo
{

	/* 
	 * @var int - type SQL : mediumint $_user_id
	 * @desc __A_SPECIFIER__
	 */ 
	private $_user_id ; 

	/* 
	 * @var int - type SQL : tinyint $_mail_info
	 * @desc __A_SPECIFIER__
	 */ 
	private $_mail_info ; 

	/* 
	 * @var string - type SQL : varchar $_titre_mail
	 * @desc __A_SPECIFIER__
	 */ 
	private $_titre_mail ; 

	/* 
	 * @var int - type SQL : tinyint $_periodicite
	 * @desc __A_SPECIFIER__
	 */ 
	private $_periodicite ; 

	/* 
	 * @var int - type SQL : tinyint $_info_parution
	 * @desc __A_SPECIFIER__
	 */ 
	private $_info_parution ; 

	/* 
	 * @var int - type SQL : tinyint $_info_ligne
	 * @desc __A_SPECIFIER__
	 */ 
	private $_info_ligne ; 

	/* 
	 * @var int - type SQL : tinyint $_info_news
	 * @desc __A_SPECIFIER__
	 */ 
	private $_info_news ; 

	/* 
	 * @var string - type SQL : date $_next_mail
	 * @desc __A_SPECIFIER__
	 */ 
	private $_next_mail ; 

	/* 
	 * @var string - type SQL : date $_last_mail
	 * @desc __A_SPECIFIER__
	 */ 
	private $_last_mail ; 

	/* 
	 * @var int - type SQL : tinyint $_info_ligne_editeur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_info_ligne_editeur ; 

	/* 
	 * @var int - type SQL : tinyint $_info_ligne_auteur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_info_ligne_auteur ; 

	/* 
	 * @var int - type SQL : tinyint $_info_paru_motcle
	 * @desc __A_SPECIFIER__
	 */ 
	private $_info_paru_motcle ; 

	/* 
	 * @var int - type SQL : tinyint $_info_ligne_motcle
	 * @desc __A_SPECIFIER__
	 */ 
	private $_info_ligne_motcle ; 

	/* 
	 * @var int - type SQL : tinyint $_info_paru_editeur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_info_paru_editeur ; 

	/* 
	 * @var int - type SQL : tinyint $_espace_ludique
	 * @desc __A_SPECIFIER__
	 */ 
	private $_espace_ludique ; 

	/* 
	 * @var int - type SQL : tinyint $_nb_auteurs_visus
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nb_auteurs_visus ; 

	/* 
	 * @var int - type SQL : tinyint $_bd_publique
	 * @desc __A_SPECIFIER__
	 */ 
	private $_bd_publique ; 

	/* 
	 * @var int - type SQL : tinyint $_nb_couv_visus
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nb_couv_visus ; 

	/* 
	 * @var int - type SQL : tinyint $_type_page
	 * @desc __A_SPECIFIER__
	 */ 
	private $_type_page ; 

	/* 
	 * @var string - type SQL : varchar $_theme
	 * @desc __A_SPECIFIER__
	 */ 
	private $_theme ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_user_id
	 * @var int $user_id
	 */ 
	public function setUser_id($user_id)
	{
		$this->_user_id = $user_id ;
		return $this;

	}
	public function getUser_id()
	{
		return $this->_user_id ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_mail_info
	 * @var int $mail_info
	 */ 
	public function setMail_info($mail_info)
	{
		$this->_mail_info = $mail_info ;
		return $this;

	}
	public function getMail_info()
	{
		return $this->_mail_info ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_titre_mail
	 * @var string $titre_mail
	 */ 
	public function setTitre_mail($titre_mail)
	{
		$this->_titre_mail = $titre_mail ;
		return $this;

	}
	public function getTitre_mail()
	{
		return $this->_titre_mail ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_periodicite
	 * @var int $periodicite
	 */ 
	public function setPeriodicite($periodicite)
	{
		$this->_periodicite = $periodicite ;
		return $this;

	}
	public function getPeriodicite()
	{
		return $this->_periodicite ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_info_parution
	 * @var int $info_parution
	 */ 
	public function setInfo_parution($info_parution)
	{
		$this->_info_parution = $info_parution ;
		return $this;

	}
	public function getInfo_parution()
	{
		return $this->_info_parution ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_info_ligne
	 * @var int $info_ligne
	 */ 
	public function setInfo_ligne($info_ligne)
	{
		$this->_info_ligne = $info_ligne ;
		return $this;

	}
	public function getInfo_ligne()
	{
		return $this->_info_ligne ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_info_news
	 * @var int $info_news
	 */ 
	public function setInfo_news($info_news)
	{
		$this->_info_news = $info_news ;
		return $this;

	}
	public function getInfo_news()
	{
		return $this->_info_news ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_next_mail
	 * @var string $next_mail
	 */ 
	public function setNext_mail($next_mail)
	{
		$this->_next_mail = $next_mail ;
		return $this;

	}
	public function getNext_mail()
	{
		return $this->_next_mail ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_last_mail
	 * @var string $last_mail
	 */ 
	public function setLast_mail($last_mail)
	{
		$this->_last_mail = $last_mail ;
		return $this;

	}
	public function getLast_mail()
	{
		return $this->_last_mail ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_info_ligne_editeur
	 * @var int $info_ligne_editeur
	 */ 
	public function setInfo_ligne_editeur($info_ligne_editeur)
	{
		$this->_info_ligne_editeur = $info_ligne_editeur ;
		return $this;

	}
	public function getInfo_ligne_editeur()
	{
		return $this->_info_ligne_editeur ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_info_ligne_auteur
	 * @var int $info_ligne_auteur
	 */ 
	public function setInfo_ligne_auteur($info_ligne_auteur)
	{
		$this->_info_ligne_auteur = $info_ligne_auteur ;
		return $this;

	}
	public function getInfo_ligne_auteur()
	{
		return $this->_info_ligne_auteur ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_info_paru_motcle
	 * @var int $info_paru_motcle
	 */ 
	public function setInfo_paru_motcle($info_paru_motcle)
	{
		$this->_info_paru_motcle = $info_paru_motcle ;
		return $this;

	}
	public function getInfo_paru_motcle()
	{
		return $this->_info_paru_motcle ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_info_ligne_motcle
	 * @var int $info_ligne_motcle
	 */ 
	public function setInfo_ligne_motcle($info_ligne_motcle)
	{
		$this->_info_ligne_motcle = $info_ligne_motcle ;
		return $this;

	}
	public function getInfo_ligne_motcle()
	{
		return $this->_info_ligne_motcle ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_info_paru_editeur
	 * @var int $info_paru_editeur
	 */ 
	public function setInfo_paru_editeur($info_paru_editeur)
	{
		$this->_info_paru_editeur = $info_paru_editeur ;
		return $this;

	}
	public function getInfo_paru_editeur()
	{
		return $this->_info_paru_editeur ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_espace_ludique
	 * @var int $espace_ludique
	 */ 
	public function setEspace_ludique($espace_ludique)
	{
		$this->_espace_ludique = $espace_ludique ;
		return $this;

	}
	public function getEspace_ludique()
	{
		return $this->_espace_ludique ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_nb_auteurs_visus
	 * @var int $nb_auteurs_visus
	 */ 
	public function setNb_auteurs_visus($nb_auteurs_visus)
	{
		$this->_nb_auteurs_visus = $nb_auteurs_visus ;
		return $this;

	}
	public function getNb_auteurs_visus()
	{
		return $this->_nb_auteurs_visus ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_bd_publique
	 * @var int $bd_publique
	 */ 
	public function setBd_publique($bd_publique)
	{
		$this->_bd_publique = $bd_publique ;
		return $this;

	}
	public function getBd_publique()
	{
		return $this->_bd_publique ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_nb_couv_visus
	 * @var int $nb_couv_visus
	 */ 
	public function setNb_couv_visus($nb_couv_visus)
	{
		$this->_nb_couv_visus = $nb_couv_visus ;
		return $this;

	}
	public function getNb_couv_visus()
	{
		return $this->_nb_couv_visus ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_type_page
	 * @var int $type_page
	 */ 
	public function setType_page($type_page)
	{
		$this->_type_page = $type_page ;
		return $this;

	}
	public function getType_page()
	{
		return $this->_type_page ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_theme
	 * @var string $theme
	 */ 
	public function setTheme($theme)
	{
		$this->_theme = $theme ;
		return $this;

	}
	public function getTheme()
	{
		return $this->_theme ;
	}
}
