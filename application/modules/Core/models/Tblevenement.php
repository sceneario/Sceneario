<?php

/*
 * IdEvt	TitreEvt	LienEvt	ImageEvt
 */
 
 class Core_Model_Tblevenement
{

	/* 
	 * @var string - type SQL : string $_idEvt
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idEvt ; 

	/* 
	 * @var string - type SQL : text $_titreEvt
	 * @desc __A_SPECIFIER__
	 */ 
	private $_titreEvt ;
	
    /* 
	 * @var string - type SQL : text $_imageEvt
	 * @desc __A_SPECIFIER__
	 */  
	private $_lienEvt ;
	
    /* 
	 * @var string - type SQL : text $_imageEvt
	 * @desc __A_SPECIFIER__
	 */ 
	private $_imageEvt ;
	/**
     * @return the $_idEvt
     */
    public function getIdEvt ()
    {
        return $this->_idEvt;
    }

	/**
     * @param field_type $_idEvt
     */
    public function setIdEvt ($_idEvt)
    {
        $this->_idEvt = $_idEvt;
        return $this;
    }

	/**
     * @return the $_titreEvt
     */
    public function getTitreEvt ()
    {
        return $this->_titreEvt;
    }

	/**
     * @param field_type $_titreEvt
     */
    public function setTitreEvt ($_titreEvt)
    {
        $this->_titreEvt = $_titreEvt;
        return $this;
    }

	/**
     * @return the $_lienEvt
     */
    public function getLienEvt ()
    {
        return $this->_lienEvt;
    }

	/**
     * @param field_type $_lienEvt
     */
    public function setLienEvt ($_lienEvt)
    {
        $this->_lienEvt = $_lienEvt;
        return $this;
    }

	/**
     * @return the $_imageEvt
     */
    public function getImageEvt ()
    {
        return $this->_imageEvt;
    }

	/**
     * @param field_type $_imageEvt
     */
    public function setImageEvt ($_imageEvt)
    {
        $this->_imageEvt = $_imageEvt;
        return $this;
    }
}
