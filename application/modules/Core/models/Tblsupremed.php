<?php 

/*
 * SCENEARIO.COM
 * Table des scenar Supreme Dimension
 * @desc CLASSE : Core_Model_Tblsupremed
 * @desc TABLE  : tbl_SupremeD
 * @file Tblsupremed.php
 * @desc PK     : idSupremeD
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblsupremed
{

	/* 
	 * @var string - type SQL : varchar $_idSupremeD
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idSupremeD ; 

	/* 
	 * @var string - type SQL : varchar $_titreSupremeD
	 * @desc __A_SPECIFIER__
	 */ 
	private $_titreSupremeD ; 

	/* 
	 * @var string - type SQL : text $_titreSommaire
	 * @desc __A_SPECIFIER__
	 */ 
	private $_titreSommaire ; 

	/* 
	 * @var string - type SQL : date $_dateSupremeD
	 * @desc __A_SPECIFIER__
	 */ 
	private $_dateSupremeD ; 

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
	 * @var string - type SQL : text $_resumeSommaire
	 * @desc __A_SPECIFIER__
	 */ 
	private $_resumeSommaire ; 

	/* 
	 * @var string - type SQL : char $_lienAlbum
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienAlbum ; 

	/* 
	 * @var string - type SQL : char $_lienAlbumJava
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienAlbumJava ; 

	/* 
	 * @var string - type SQL : char $_lienAuteur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienAuteur ; 

	/* 
	 * @var string - type SQL : char $_lienAuteurJava
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienAuteurJava ; 

	/* 
	 * @var string - type SQL : char $_lienConcours
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienConcours ; 

	/* 
	 * @var string - type SQL : char $_lienConcoursJava
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienConcoursJava ; 

	/* 
	 * @var string - type SQL : char $_lienInterview
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienInterview ; 

	/* 
	 * @var string - type SQL : char $_lienInterviewJava
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienInterviewJava ; 

	/* 
	 * @var string - type SQL : char $_lienCroquis
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienCroquis ; 

	/* 
	 * @var string - type SQL : char $_lienCroquisJava
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienCroquisJava ; 

	/* 
	 * @var string - type SQL : char $_lienWork
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienWork ; 

	/* 
	 * @var string - type SQL : char $_lienWorkJava
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienWorkJava ; 

	/* 
	 * @var string - type SQL : char $_lienPreview
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienPreview ; 

	/* 
	 * @var string - type SQL : char $_lienPreviewJava
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienPreviewJava ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idSupremeD
	 * @var string $idSupremeD
	 */ 
	public function setIdSupremeD($idSupremeD)
	{
		$this->_idSupremeD = $idSupremeD ;
		return $this;

	}
	public function getIdSupremeD()
	{
		return $this->_idSupremeD ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_titreSupremeD
	 * @var string $titreSupremeD
	 */ 
	public function setTitreSupremeD($titreSupremeD)
	{
		$this->_titreSupremeD = $titreSupremeD ;
		return $this;

	}
	public function getTitreSupremeD()
	{
		return $this->_titreSupremeD ;
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
	 * @desc SETTER AND GETTER FOR $_dateSupremeD
	 * @var string $dateSupremeD
	 */ 
	public function setDateSupremeD($dateSupremeD)
	{
		$this->_dateSupremeD = $dateSupremeD ;
		return $this;

	}
	public function getDateSupremeD()
	{
		return $this->_dateSupremeD ;
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
	 * @var string $lienAlbumJava
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
	 * @var string $lienAuteurJava
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
	 * @var string $lienConcoursJava
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
	 * @var string $lienInterviewJava
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
	 * @var string $lienCroquisJava
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
	 * @var string $lienWorkJava
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
	 * @var string $lienPreviewJava
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
}
