<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblalbumprov
 * @desc TABLE  : tbl_Album_Prov
 * @file Tblalbumprov.php
 * @desc PK     : idAlbum
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblalbumprov
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
	 * @var string - type SQL : date $_datecreation
	 * @desc __A_SPECIFIER__
	 */ 
	private $_datecreation ; 

	/* 
	 * @var string - type SQL : text $_histoire
	 * @desc __A_SPECIFIER__
	 */ 
	private $_histoire ; 

	/* 
	 * @var string - type SQL : text $_histoire2
	 * @desc __A_SPECIFIER__
	 */ 
	private $_histoire2 ; 

	/* 
	 * @var string - type SQL : text $_critique
	 * @desc __A_SPECIFIER__
	 */ 
	private $_critique ; 

	/* 
	 * @var string - type SQL : varchar $_pseudo
	 * @desc __A_SPECIFIER__
	 */ 
	private $_pseudo ; 

	/* 
	 * @var string - type SQL : text $_dessinateur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_dessinateur ; 

	/* 
	 * @var string - type SQL : text $_scenariste
	 * @desc __A_SPECIFIER__
	 */ 
	private $_scenariste ; 

	/* 
	 * @var string - type SQL : text $_coloriste
	 * @desc __A_SPECIFIER__
	 */ 
	private $_coloriste ; 

	/* 
	 * @var string - type SQL : char $_coupdecoeur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_coupdecoeur ; 

	/* 
	 * @var string - type SQL : char $_valide
	 * @desc __A_SPECIFIER__
	 */ 
	private $_valide ; 

	/* 
	 * @var string - type SQL : text $_editeur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_editeur ; 

	/* 
	 * @var string - type SQL : varchar $_collection_ed
	 * @desc __A_SPECIFIER__
	 */ 
	private $_collection_ed ; 

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
	 * @var int - type SQL : smallint $_idInternaute
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idInternaute ; 

	/* 
	 * @var int - type SQL : int $_idSerie
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idSerie ; 

	/* 
	 * @var int - type SQL : tinyint $_idType
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idType ; 

	/* 
	 * @var int - type SQL : int $_idCollection
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idCollection ; 

	/* 
	 * @var string - type SQL : varchar $_motsclef
	 * @desc __A_SPECIFIER__
	 */ 
	private $_motsclef ; 

	/* 
	 * @var int - type SQL : int $_idUnivers
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idUnivers ; 

	/* 
	 * @var string - type SQL : varchar $_univers
	 * @desc __A_SPECIFIER__
	 */ 
	private $_univers ; 

	/* 
	 * @var int - type SQL : tinyint $_presse
	 * @desc __A_SPECIFIER__
	 */ 
	private $_presse ; 

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
	 * @desc SETTER AND GETTER FOR $_histoire
	 * @var string $histoire
	 */ 
	public function setHistoire($histoire)
	{
		$this->_histoire = $histoire ;
		return $this;

	}
	public function getHistoire()
	{
		return $this->_histoire ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_histoire2
	 * @var string $histoire2
	 */ 
	public function setHistoire2($histoire2)
	{
		$this->_histoire2 = $histoire2 ;
		return $this;

	}
	public function getHistoire2()
	{
		return $this->_histoire2 ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_critique
	 * @var string $critique
	 */ 
	public function setCritique($critique)
	{
		$this->_critique = $critique ;
		return $this;

	}
	public function getCritique()
	{
		return $this->_critique ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_pseudo
	 * @var string $pseudo
	 */ 
	public function setPseudo($pseudo)
	{
		$this->_pseudo = $pseudo ;
		return $this;

	}
	public function getPseudo()
	{
		return $this->_pseudo ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_dessinateur
	 * @var string $dessinateur
	 */ 
	public function setDessinateur($dessinateur)
	{
		$this->_dessinateur = $dessinateur ;
		return $this;

	}
	public function getDessinateur()
	{
		return $this->_dessinateur ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_scenariste
	 * @var string $scenariste
	 */ 
	public function setScenariste($scenariste)
	{
		$this->_scenariste = $scenariste ;
		return $this;

	}
	public function getScenariste()
	{
		return $this->_scenariste ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_coloriste
	 * @var string $coloriste
	 */ 
	public function setColoriste($coloriste)
	{
		$this->_coloriste = $coloriste ;
		return $this;

	}
	public function getColoriste()
	{
		return $this->_coloriste ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_coupdecoeur
	 * @var string $coupdecoeur
	 */ 
	public function setCoupdecoeur($coupdecoeur)
	{
		$this->_coupdecoeur = $coupdecoeur ;
		return $this;

	}
	public function getCoupdecoeur()
	{
		return $this->_coupdecoeur ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_valide
	 * @var string $valide
	 */ 
	public function setValide($valide)
	{
		$this->_valide = $valide ;
		return $this;

	}
	public function getValide()
	{
		return $this->_valide ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_editeur
	 * @var string $editeur
	 */ 
	public function setEditeur($editeur)
	{
		$this->_editeur = $editeur ;
		return $this;

	}
	public function getEditeur()
	{
		return $this->_editeur ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_collection_ed
	 * @var string $collection_ed
	 */ 
	public function setCollection_ed($collection_ed)
	{
		$this->_collection_ed = $collection_ed ;
		return $this;

	}
	public function getCollection_ed()
	{
		return $this->_collection_ed ;
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
	 * @desc SETTER AND GETTER FOR $_idInternaute
	 * @var int $idInternaute
	 */ 
	public function setIdInternaute($idInternaute)
	{
		$this->_idInternaute = $idInternaute ;
		return $this;

	}
	public function getIdInternaute()
	{
		return $this->_idInternaute ;
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
	 * @desc SETTER AND GETTER FOR $_idType
	 * @var int $idType
	 */ 
	public function setIdType($idType)
	{
		$this->_idType = $idType ;
		return $this;

	}
	public function getIdType()
	{
		return $this->_idType ;
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
	 * @desc SETTER AND GETTER FOR $_motsclef
	 * @var string $motsclef
	 */ 
	public function setMotsclef($motsclef)
	{
		$this->_motsclef = $motsclef ;
		return $this;

	}
	public function getMotsclef()
	{
		return $this->_motsclef ;
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
	 * @desc SETTER AND GETTER FOR $_univers
	 * @var string $univers
	 */ 
	public function setUnivers($univers)
	{
		$this->_univers = $univers ;
		return $this;

	}
	public function getUnivers()
	{
		return $this->_univers ;
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
