<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblalbum
 * @desc TABLE  : tbl_Album
 * @file Tblalbum.php
 * @desc PK     : idAlbum
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblalbum
{

	/* 
	 * @var int - type SQL : int $_idAlbum
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idAlbum ; 

	/* 
	 * @var string - type SQL : varchar $_titre
	 * @desc __A_SPECIFIER__
	 */ 
	private $_titre ; 

	/* 
	 * @var string - type SQL : varchar $_collection
	 * @desc __A_SPECIFIER__
	 */ 
	private $_collection ; 

	/* 
	 * @var string - type SQL : varchar $_sousTitre
	 * @desc __A_SPECIFIER__
	 */ 
	private $_sousTitre ; 

	/* 
	 * @var string - type SQL : varchar $_tome
	 * @desc __A_SPECIFIER__
	 */ 
	private $_tome ; 

	/* 
	 * @var string - type SQL : varchar $_couverture
	 * @desc __A_SPECIFIER__
	 */ 
	private $_couverture ; 

	/* 
	 * @var string - type SQL : text $_droits
	 * @desc __A_SPECIFIER__
	 */ 
	private $_droits ; 

	/* 
	 * @var string - type SQL : char $_enligne
	 * @desc __A_SPECIFIER__
	 */ 
	private $_enligne ; 

	/* 
	 * @var string - type SQL : char $_nouveaute
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nouveaute ; 

	/* 
	 * @var int - type SQL : int $_FKidEditeur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_FKidEditeur ; 

	/* 
	 * @var string - type SQL : date $_datecreation
	 * @desc __A_SPECIFIER__
	 */ 
	private $_datecreation ; 

	/* 
	 * @var int - type SQL : int $_idCollection
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idCollection ; 

	/* 
	 * @var string - type SQL : varchar $_lienBDNet
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienBDNet ; 

	/* 
	 * @var string - type SQL : varchar $_lienAmazon
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienAmazon ; 

	/* 
	 * @var int - type SQL : smallint $_idCouv
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idCouv ; 

	/* 
	 * @var string - type SQL : varchar $_isbn
	 * @desc __A_SPECIFIER__
	 */ 
	private $_isbn ; 

	/* 
	 * @var string - type SQL : varchar $_extrait
	 * @desc __A_SPECIFIER__
	 */ 
	private $_extrait ; 

	/* 
	 * @var int - type SQL : int $_idSerie
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idSerie ; 

	/* 
	 * @var int - type SQL : timestamp $_date
	 * @desc __A_SPECIFIER__
	 */ 
	private $_date ; 

	/* 
	 * @var int - type SQL : int $_idUnivers
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idUnivers ; 

	/* 
	 * @var int - type SQL : tinyint $_presse
	 * @desc __A_SPECIFIER__
	 */ 
	private $_presse ; 

	/* 
	 * @var int - type SQL : mediumint $_topic_id
	 * @desc __A_SPECIFIER__
	 */ 
	private $_topic_id ; 

	/* 
	 * @var int - type SQL : smallint $_nbpages
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nbpages ; 

	/* 
	 * @var int - type SQL : int $_visites
	 * @desc __A_SPECIFIER__
	 */ 
	private $_visites ; 

	/* 
	 * @var int - type SQL : int $_visitesSemaine
	 * @desc __A_SPECIFIER__
	 */ 
	private $_visitesSemaine ; 

	/* 
	 * @var int - type SQL : tinyint $_recommande
	 * @desc __A_SPECIFIER__
	 */ 
	private $_recommande ; 

	/* 
	 * @var string - type SQL : varchar $_bandeAnnonce
	 * @desc __A_SPECIFIER__
	 */ 
	private $_bandeAnnonce ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idAlbum
	 * @var int $idAlbum
	 */ 
	public function setIdAlbum($idAlbum)
	{
		$this->_idAlbum = $idAlbum ;
		return $this;

	}
	public function getIdAlbum()
	{
		return $this->_idAlbum ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_titre
	 * @var string $titre
	 */ 
	public function setTitre($titre)
	{
		$this->_titre = $titre ;
		return $this;

	}
	public function getTitre()
	{
		return $this->_titre ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_collection
	 * @var string $collection
	 */ 
	public function setCollection($collection)
	{
		$this->_collection = $collection ;
		return $this;

	}
	public function getCollection()
	{
		return $this->_collection ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_sousTitre
	 * @var string $sousTitre
	 */ 
	public function setSousTitre($sousTitre)
	{
		$this->_sousTitre = $sousTitre ;
		return $this;

	}
	public function getSousTitre()
	{
		return $this->_sousTitre ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_tome
	 * @var string $tome
	 */ 
	public function setTome($tome)
	{
		$this->_tome = $tome ;
		return $this;

	}
	public function getTome()
	{
		return $this->_tome ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_couverture
	 * @var string $couverture
	 */ 
	public function setCouverture($couverture)
	{
		$this->_couverture = $couverture ;
		return $this;

	}
	public function getCouverture()
	{
		return $this->_couverture ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_droits
	 * @var string $droits
	 */ 
	public function setDroits($droits)
	{
		$this->_droits = $droits ;
		return $this;

	}
	public function getDroits()
	{
		return $this->_droits ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_enligne
	 * @var string $enligne
	 */ 
	public function setEnligne($enligne)
	{
		$this->_enligne = $enligne ;
		return $this;

	}
	public function getEnligne()
	{
		return $this->_enligne ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_nouveaute
	 * @var string $nouveaute
	 */ 
	public function setNouveaute($nouveaute)
	{
		$this->_nouveaute = $nouveaute ;
		return $this;

	}
	public function getNouveaute()
	{
		return $this->_nouveaute ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_FKidEditeur
	 * @var int $FKidEditeur
	 */ 
	public function setFKidEditeur($FKidEditeur)
	{
		$this->_FKidEditeur = $FKidEditeur ;
		return $this;

	}
	public function getFKidEditeur()
	{
		return $this->_FKidEditeur ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_datecreation
	 * @var string $datecreation
	 */ 
	public function setDatecreation($datecreation)
	{
		$this->_datecreation = $datecreation ;
		return $this;

	}
	public function getDatecreation()
	{
		return $this->_datecreation ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_idCollection
	 * @var int $idCollection
	 */ 
	public function setIdCollection($idCollection)
	{
		$this->_idCollection = $idCollection ;
		return $this;

	}
	public function getIdCollection()
	{
		return $this->_idCollection ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_lienBDNet
	 * @var string $lienBDNet
	 */ 
	public function setLienBDNet($lienBDNet)
	{
		$this->_lienBDNet = $lienBDNet ;
		return $this;

	}
	public function getLienBDNet()
	{
		return $this->_lienBDNet ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_lienAmazon
	 * @var string $lienAmazon
	 */ 
	public function setLienAmazon($lienAmazon)
	{
		$this->_lienAmazon = $lienAmazon ;
		return $this;

	}
	public function getLienAmazon()
	{
		return $this->_lienAmazon ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_idCouv
	 * @var int $idCouv
	 */ 
	public function setIdCouv($idCouv)
	{
		$this->_idCouv = $idCouv ;
		return $this;

	}
	public function getIdCouv()
	{
		return $this->_idCouv ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_isbn
	 * @var string $isbn
	 */ 
	public function setIsbn($isbn)
	{
		$this->_isbn = $isbn ;
		return $this;

	}
	public function getIsbn()
	{
		return $this->_isbn ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_extrait
	 * @var string $extrait
	 */ 
	public function setExtrait($extrait)
	{
		$this->_extrait = $extrait ;
		return $this;

	}
	public function getExtrait()
	{
		return $this->_extrait ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_idSerie
	 * @var int $idSerie
	 */ 
	public function setIdSerie($idSerie)
	{
		$this->_idSerie = $idSerie ;
		return $this;

	}
	public function getIdSerie()
	{
		return $this->_idSerie ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_date
	 * @var int $date
	 */ 
	public function setDate($date)
	{
		$this->_date = $date ;
		return $this;

	}
	public function getDate()
	{
		return $this->_date ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_idUnivers
	 * @var int $idUnivers
	 */ 
	public function setIdUnivers($idUnivers)
	{
		$this->_idUnivers = $idUnivers ;
		return $this;

	}
	public function getIdUnivers()
	{
		return $this->_idUnivers ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_presse
	 * @var int $presse
	 */ 
	public function setPresse($presse)
	{
		$this->_presse = $presse ;
		return $this;

	}
	public function getPresse()
	{
		return $this->_presse ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_topic_id
	 * @var int $topic_id
	 */ 
	public function setTopic_id($topic_id)
	{
		$this->_topic_id = $topic_id ;
		return $this;

	}
	public function getTopic_id()
	{
		return $this->_topic_id ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_nbpages
	 * @var int $nbpages
	 */ 
	public function setNbpages($nbpages)
	{
		$this->_nbpages = $nbpages ;
		return $this;

	}
	public function getNbpages()
	{
		return $this->_nbpages ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_visites
	 * @var int $visites
	 */ 
	public function setVisites($visites)
	{
		$this->_visites = $visites ;
		return $this;

	}
	public function getVisites()
	{
		return $this->_visites ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_visitesSemaine
	 * @var int $visitesSemaine
	 */ 
	public function setVisitesSemaine($visitesSemaine)
	{
		$this->_visitesSemaine = $visitesSemaine ;
		return $this;

	}
	public function getVisitesSemaine()
	{
		return $this->_visitesSemaine ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_recommande
	 * @var int $recommande
	 */ 
	public function setRecommande($recommande)
	{
		$this->_recommande = $recommande ;
		return $this;

	}
	public function getRecommande()
	{
		return $this->_recommande ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_bandeAnnonce
	 * @var string $bandeAnnonce
	 */ 
	public function setBandeAnnonce($bandeAnnonce)
	{
		$this->_bandeAnnonce = $bandeAnnonce ;
		return $this;

	}
	public function getBandeAnnonce()
	{
		return $this->_bandeAnnonce ;
	}
}
