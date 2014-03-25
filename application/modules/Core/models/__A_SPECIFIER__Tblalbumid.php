<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblalbumid
 * @desc TABLE  : tbl_Album_id
 * @file Tblalbumid.php
 * @desc PK     : __A_SPECIFIER__
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblalbumid
{

	/* 
	 * @var TABLE - type SQL : TABLE $_TE
	 * @desc __A_SPECIFIER__
	 */ 
	private $_TE ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_TE
	 * @var TABLE $TE
	 */ 
	public function setTE($TE)
	{
		$this->_TE = $TE ;
		return $this;

	}
	public function getTE()
	{
		return $this->_TE ;
	}
}
