<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblstatistiques
 * @desc TABLE  : tbl_statistiques
 * @file Tblstatistiques.php
 * @desc PK     : __A_SPECIFIER__
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblstatistiques
{

	/* 
	 * @var string - type SQL : datetime $_date
	 * @desc __A_SPECIFIER__
	 */ 
	private $_date ; 

	/* 
	 * @var string - type SQL : varchar $_pageIn
	 * @desc __A_SPECIFIER__
	 */ 
	private $_pageIn ; 

	/* 
	 * @var string - type SQL : varchar $_pageOut
	 * @desc __A_SPECIFIER__
	 */ 
	private $_pageOut ; 

	/* 
	 * @var string - type SQL : varchar $_session
	 * @desc __A_SPECIFIER__
	 */ 
	private $_session ; 

	/* 
	 * @var string - type SQL : varchar $_client
	 * @desc __A_SPECIFIER__
	 */ 
	private $_client ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_date
	 * @var string $date
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
	 * @desc SETTER AND GETTER FOR $_pageIn
	 * @var string $pageIn
	 */ 
	public function setPageIn($pageIn)
	{
		$this->_pageIn = $pageIn ;
		return $this;

	}
	public function getPageIn()
	{
		return $this->_pageIn ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_pageOut
	 * @var string $pageOut
	 */ 
	public function setPageOut($pageOut)
	{
		$this->_pageOut = $pageOut ;
		return $this;

	}
	public function getPageOut()
	{
		return $this->_pageOut ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_session
	 * @var string $session
	 */ 
	public function setSession($session)
	{
		$this->_session = $session ;
		return $this;

	}
	public function getSession()
	{
		return $this->_session ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_client
	 * @var string $client
	 */ 
	public function setClient($client)
	{
		$this->_client = $client ;
		return $this;

	}
	public function getClient()
	{
		return $this->_client ;
	}
}
