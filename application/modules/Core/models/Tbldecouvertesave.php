<?php 

/*
 * SCENEARIO.COM
 * Table des dossiers découverte
 * @desc CLASSE : Core_Model_Tbldecouvertesave
 * @desc TABLE  : tbl_Decouverte_save
 * @file Tbldecouvertesave.php
 * @desc PK     : idDecouverte
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tbldecouvertesave
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
	 * @var string - type SQL : varchar $_lienAlbum
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienAlbum ; 

	/* 
	 * @var int - type SQL : tinyint $_lienAlbumJava
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienAlbumJava ; 

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
	 * @var string - type SQL : varchar $_lienAuteur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienAuteur ; 

	/* 
	 * @var int - type SQL : tinyint $_lienAuteurJava
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienAuteurJava ; 

	/* 
	 * @var string - type SQL : varchar $_lienConcours
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienConcours ; 

	/* 
	 * @var int - type SQL : tinyint $_lienConcoursJava
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienConcoursJava ; 

	/* 
	 * @var string - type SQL : varchar $_lienInterview
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienInterview ; 

	/* 
	 * @var int - type SQL : tinyint $_lienInterviewJava
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienInterviewJava ; 

	/* 
	 * @var string - type SQL : varchar $_lienCroquis
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienCroquis ; 

	/* 
	 * @var int - type SQL : tinyint $_lienCroquisJava
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienCroquisJava ; 

	/* 
	 * @var string - type SQL : varchar $_lienWork
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienWork ; 

	/* 
	 * @var int - type SQL : tinyint $_lienWorkJava
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienWorkJava ; 

	/* 
	 * @var string - type SQL : varchar $_lienPreview
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienPreview ; 

	/* 
	 * @var int - type SQL : tinyint $_lienPreviewJava
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienPreviewJava ; 

	/* 
	 * @var string - type SQL : char $_enligne
	 * @desc __A_SPECIFIER__
	 */ 
	private $_enligne ; 

	/* 
	 * @var string - type SQL : text $_textAuteur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_textAuteur ; 

	/* 
	 * @var int - type SQL : tinyint $_logoSoleil
	 * @desc __A_SPECIFIER__
	 */ 
	private $_logoSoleil ; 

	/* 
	 * @var int - type SQL : int $_type
	 * @desc __A_SPECIFIER__
	 */ 
	private $_type ; 


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
	 * @desc SETTER AND GETTER FOR $_lienAlbum
	 * @var string $lienAlbum
	 */ 
	public function setLienAlbum($lienAlbum)
	{
		$this->_lienAlbum = $lienAlbum ;
		return $this;

	}
	public function getLienAlbum()
	{
		return $this->_lienAlbum ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_lienAlbumJava
	 * @var int $lienAlbumJava
	 */ 
	public function setLienAlbumJava($lienAlbumJava)
	{
		$this->_lienAlbumJava = $lienAlbumJava ;
		return $this;

	}
	public function getLienAlbumJava()
	{
		return $this->_lienAlbumJava ;
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
	 * @desc SETTER AND GETTER FOR $_lienAuteur
	 * @var string $lienAuteur
	 */ 
	public function setLienAuteur($lienAuteur)
	{
		$this->_lienAuteur = $lienAuteur ;
		return $this;

	}
	public function getLienAuteur()
	{
		return $this->_lienAuteur ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_lienAuteurJava
	 * @var int $lienAuteurJava
	 */ 
	public function setLienAuteurJava($lienAuteurJava)
	{
		$this->_lienAuteurJava = $lienAuteurJava ;
		return $this;

	}
	public function getLienAuteurJava()
	{
		return $this->_lienAuteurJava ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_lienConcours
	 * @var string $lienConcours
	 */ 
	public function setLienConcours($lienConcours)
	{
		$this->_lienConcours = $lienConcours ;
		return $this;

	}
	public function getLienConcours()
	{
		return $this->_lienConcours ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_lienConcoursJava
	 * @var int $lienConcoursJava
	 */ 
	public function setLienConcoursJava($lienConcoursJava)
	{
		$this->_lienConcoursJava = $lienConcoursJava ;
		return $this;

	}
	public function getLienConcoursJava()
	{
		return $this->_lienConcoursJava ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_lienInterview
	 * @var string $lienInterview
	 */ 
	public function setLienInterview($lienInterview)
	{
		$this->_lienInterview = $lienInterview ;
		return $this;

	}
	public function getLienInterview()
	{
		return $this->_lienInterview ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_lienInterviewJava
	 * @var int $lienInterviewJava
	 */ 
	public function setLienInterviewJava($lienInterviewJava)
	{
		$this->_lienInterviewJava = $lienInterviewJava ;
		return $this;

	}
	public function getLienInterviewJava()
	{
		return $this->_lienInterviewJava ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_lienCroquis
	 * @var string $lienCroquis
	 */ 
	public function setLienCroquis($lienCroquis)
	{
		$this->_lienCroquis = $lienCroquis ;
		return $this;

	}
	public function getLienCroquis()
	{
		return $this->_lienCroquis ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_lienCroquisJava
	 * @var int $lienCroquisJava
	 */ 
	public function setLienCroquisJava($lienCroquisJava)
	{
		$this->_lienCroquisJava = $lienCroquisJava ;
		return $this;

	}
	public function getLienCroquisJava()
	{
		return $this->_lienCroquisJava ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_lienWork
	 * @var string $lienWork
	 */ 
	public function setLienWork($lienWork)
	{
		$this->_lienWork = $lienWork ;
		return $this;

	}
	public function getLienWork()
	{
		return $this->_lienWork ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_lienWorkJava
	 * @var int $lienWorkJava
	 */ 
	public function setLienWorkJava($lienWorkJava)
	{
		$this->_lienWorkJava = $lienWorkJava ;
		return $this;

	}
	public function getLienWorkJava()
	{
		return $this->_lienWorkJava ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_lienPreview
	 * @var string $lienPreview
	 */ 
	public function setLienPreview($lienPreview)
	{
		$this->_lienPreview = $lienPreview ;
		return $this;

	}
	public function getLienPreview()
	{
		return $this->_lienPreview ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_lienPreviewJava
	 * @var int $lienPreviewJava
	 */ 
	public function setLienPreviewJava($lienPreviewJava)
	{
		$this->_lienPreviewJava = $lienPreviewJava ;
		return $this;

	}
	public function getLienPreviewJava()
	{
		return $this->_lienPreviewJava ;
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
	 * @desc SETTER AND GETTER FOR $_textAuteur
	 * @var string $textAuteur
	 */ 
	public function setTextAuteur($textAuteur)
	{
		$this->_textAuteur = $textAuteur ;
		return $this;

	}
	public function getTextAuteur()
	{
		return $this->_textAuteur ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_logoSoleil
	 * @var int $logoSoleil
	 */ 
	public function setLogoSoleil($logoSoleil)
	{
		$this->_logoSoleil = $logoSoleil ;
		return $this;

	}
	public function getLogoSoleil()
	{
		return $this->_logoSoleil ;
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
}
