<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Core_Model_Mapper_TblUserBdthequeV6
{
      protected $_dbTable;

    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception("Invalid table data gateway provided");
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable("Core_Model_DbTable_TblUserBdthequeV6");
        }
        return $this->_dbTable;
    }
    
    /**
     * 
     * @param Core_Model_TblUserV6 $tblUserV6
     * @return type
     */
    public function save(Core_Model_TblUserBdthequeV6 $tblUserBdthequeV6)
    {
	    
        $data = array(
	        "user_id"        => $tblUserBdthequeV6->getUserid() ,
            "album_id"       => $tblUserBdthequeV6->getAlbumid() ,
            "type"           => $tblUserBdthequeV6->getType() ,    
        );
 
        $id = @(int)$data["id"];

        if($id === 0){
            unset($data["id"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("id = ?" => $id));
        }
    }
    
    /**
     * 
     * @param type $id
     * @param Core_Model_TblUserV6 $tblUserV6
     * @return type
     */
    public function find($id, Core_Model_TblUserBdthequeV6 $tblUserBdthequeV6)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
        $tblUserBdthequeV6->setId(self::unescape($row->id));
	$tblUserBdthequeV6->setUserid(self::unescape($row->user_id));
        $tblUserBdthequeV6->setAlbumid(self::unescape($row->album_id));
        $tblUserBdthequeV6->setType(self::unescape($row->type));
	return $tblUserBdthequeV6;
    }
    
    /**
     * 
     * @param type $limit
     * @param type $where
     * @param type $order
     * @return \Core_Model_TblUserV6
     */
    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
                                            ->where($where["clause"], $where["params"])
                                            ->order($order) //"idInternaute DESC"
                                            ->limit($limit,0));
         
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_TblUserBdthequeV6(); 
            $entry->setId(self::unescape($row->id));
	    $entry->setUserid(self::unescape($row->user_id));
            $entry->setAlbumid(self::unescape($row->album_id));
            $entry->setType(self::unescape($row->type));
            
            $entries[] = $entry;
        }
        return $entries;
    }
    
    /**
     * 
     * @param type $str
     * @return type
     */
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("id = ?", $id);
        return $dbTable->delete($where);
    }
    
    /**
     * Vérifie l'existence en base de données d'une correspondance 
     * user_id / album_id / type
     * @param type $data
     */
    public function albumNotExist($data, $flag = true)
    {   
        $rows = $this->fetchAll(null, 
                array('clause' => 'user_id = ? AND album_id = ' . $data->bdid_to_add . ' AND type = "' . $data->type . '"'   , 
                      'params' => $data->user_id 
                     ) , null);
        
        if($flag){
            if(count($rows) == 0){
                return true; 
            }
        }else{
            return $rows;
        }
        return false;
    }
    
    public function getBdthequeAlbumCount($userId , $type)
    {
        $rows = $this->fetchAll(null, 
                array('clause' => 'user_id = ?  AND type = "' . $type . '"'   , 
                      'params' => $userId 
                     ) , null);
        
        return count($rows);
    }
}