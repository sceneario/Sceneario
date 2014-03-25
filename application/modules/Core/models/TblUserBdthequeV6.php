<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class Core_Model_TblUserBdthequeV6 
{
    private $_id;
    private $_userId;
    private $_albumId;
    private $_type;
    
    public function setId($id)
    {
        $this->_id = $id ;
        return $this;
    }
    
    public function getId()
    {
        return $this->_id;
    }
    
    public function setUserid($userId)
    {
        $this->_userId = $userId ;
        return $this;
    }
    
    public function getUserid()
    {
        return $this->_userId;
    }
    
    //
    public function setAlbumid($albumId)
    {
        $this->_albumId = $albumId ;
        return $this;
    }
    
    public function getAlbumid()
    {
        return $this->_albumId;
    }
    
    //
    public function setType($type)
    {
        $this->_type = $type ;
        return $this;
    }
    
    public function getType()
    {
        return $this->_type;
    }
}
