<?php 

/*
 * SCENEARIO.COM
 * Table des dossiers découverte
 * @desc CLASSE : Core_Model_Tbldecouverte
 * @desc TABLE  : tbl_Decouverte
 * @file Tbldecouverte.php
 * @desc PK     : idDecouverte
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tbldecouverte
{

	/* 
	 * @var string - type SQL : varchar $_idDecouverte
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idDecouverte ; 

	/* 
	 * @var string - type SQL : varchar $_titreDecouverte
	 * @desc __A_SPECIFIER__
	 */ 
	private $_titreDecouverte ; 

	/* 
	 * @var string - type SQL : text $_titreSommaire
	 * @desc __A_SPECIFIER__
	 */ 
	private $_titreSommaire ; 

	/* 
	 * @var string - type SQL : date $_dateDecouverte
	 * @desc __A_SPECIFIER__
	 */ 
	private $_dateDecouverte ; 

	/* 
	 * @var string - type SQL : text $_resumeSommaire
	 * @desc __A_SPECIFIER__
	 */ 
	private $_resumeSommaire ; 

	/* 
	 * @var int - type SQL : int $_idAlbum
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idAlbum ; 

	/* 
	 * @var string - type SQL : varchar $_idAuteurs
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idAuteurs ; 

	/* 
	 * @var string - type SQL : varchar $_idConcours
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idConcours ; 

	/* 
	 * @var string - type SQL : varchar $_idInterviews
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idInterviews ; 

	/* 
	 * @var string - type SQL : varchar $_idPreviews
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idPreviews ; 

	/* 
	 * @var string - type SQL : varchar $_idWorks
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idWorks ; 

	/* 
	 * @var string - type SQL : varchar $_idGaleries
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idGaleries ; 

	/* 
	 * @var string - type SQL : varchar $_idExpos
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idExpos ; 

	/* 
	 * @var string - type SQL : char $_enligne
	 * @desc __A_SPECIFIER__
	 */ 
	private $_enligne ; 

	/* 
	 * @var int - type SQL : int $_type
	 * @desc __A_SPECIFIER__
	 */ 
	private $_type ; 

	/* 
	 * @var string - type SQL : varchar $_typeDecouverte
	 * @desc __A_SPECIFIER__
	 */ 
	private $_typeDecouverte ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idDecouverte
	 * @var string $idDecouverte
	 */ 
	public function setIdDecouverte($idDecouverte)
	{
		$this->_idDecouverte = $idDecouverte ;
		return $this;

	}
	public function getIdDecouverte()
	{
		return $this->_idDecouverte ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_titreDecouverte
	 * @var string $titreDecouverte
	 */ 
	public function setTitreDecouverte($titreDecouverte)
	{
		$this->_titreDecouverte = $titreDecouverte ;
		return $this;

	}
	public function getTitreDecouverte()
	{
		return $this->_titreDecouverte ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_titreSommaire
	 * @var string $titreSommaire
	 */ 
	public function setTitreSommaire($titreSommaire)
	{
		$this->_titreSommaire = $titreSommaire ;
		return $this;

	}
	public function getTitreSommaire()
	{
		return $this->_titreSommaire ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_dateDecouverte
	 * @var string $dateDecouverte
	 */ 
	public function setDateDecouverte($dateDecouverte)
	{
		$this->_dateDecouverte = $dateDecouverte ;
		return $this;

	}
	public function getDateDecouverte()
	{
		return $this->_dateDecouverte ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_resumeSommaire
	 * @var string $resumeSommaire
	 */ 
	public function setResumeSommaire($resumeSommaire)
	{
		$this->_resumeSommaire = $resumeSommaire ;
		return $this;

	}
	public function getResumeSommaire()
	{
		return $this->_resumeSommaire ;
	}

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
	 * @desc SETTER AND GETTER FOR $_idAuteurs
	 * @var string $idAuteurs
	 */ 
	public function setIdAuteurs($idAuteurs)
	{
		$this->_idAuteurs = $idAuteurs ;
		return $this;

	}
	public function getIdAuteurs()
	{
		return $this->_idAuteurs ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_idConcours
	 * @var string $idConcours
	 */ 
	public function setIdConcours($idConcours)
	{
		$this->_idConcours = $idConcours ;
		return $this;

	}
	public function getIdConcours()
	{
		return $this->_idConcours ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_idInterviews
	 * @var string $idInterviews
	 */ 
	public function setIdInterviews($idInterviews)
	{
		$this->_idInterviews = $idInterviews ;
		return $this;

	}
	public function getIdInterviews()
	{
		return $this->_idInterviews ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_idPreviews
	 * @var string $idPreviews
	 */ 
	public function setIdPreviews($idPreviews)
	{
		$this->_idPreviews = $idPreviews ;
		return $this;

	}
	public function getIdPreviews()
	{
		return $this->_idPreviews ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_idWorks
	 * @var string $idWorks
	 */ 
	public function setIdWorks($idWorks)
	{
		$this->_idWorks = $idWorks ;
		return $this;

	}
	public function getIdWorks()
	{
		return $this->_idWorks ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_idGaleries
	 * @var string $idGaleries
	 */ 
	public function setIdGaleries($idGaleries)
	{
		$this->_idGaleries = $idGaleries ;
		return $this;

	}
	public function getIdGaleries()
	{
		return $this->_idGaleries ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_idExpos
	 * @var string $idExpos
	 */ 
	public function setIdExpos($idExpos)
	{
		$this->_idExpos = $idExpos ;
		return $this;

	}
	public function getIdExpos()
	{
		return $this->_idExpos ;
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
	 * @desc SETTER AND GETTER FOR $_type
	 * @var int $type
	 */ 
	public function setType($type)
	{
		$this->_type = $type ;
		return $this;

	}
	public function getType()
	{
		return $this->_type ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_typeDecouverte
	 * @var string $typeDecouverte
	 */ 
	public function setTypeDecouverte($typeDecouverte)
	{
		$this->_typeDecouverte = $typeDecouverte ;
		return $this;

	}
	public function getTypeDecouverte()
	{
		return $this->_typeDecouverte ;
	}
}
