<?php

/**
 * @package Core
 * @category Mapper
 */

/**
 * 
 */

class Core_Model_Mapper_TblUserV6 extends Core_Model_DbTable_Db
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
            $this->setDbTable("Core_Model_DbTable_TblUserV6");
        }
        return $this->_dbTable;
    }
    
    /**
     * 
     * @param Core_Model_TblUserV6 $tblUserV6
     * @return type
     */
    public function save(Core_Model_TblUserV6 $tblUserV6)
    {
	    
        $data = array(
	    "user_id"           => $tblUserV6->getUserid() ,
            "user_active"       => $tblUserV6->getUseractive() ,
            "user_privileges"     => 0 ,
            "user_lastname"     => $tblUserV6->getUserlastname() ,
            "user_firstname"    => $tblUserV6->getUserfirstname() ,
            "username"          => $tblUserV6->getUsername() ,
            "user_password"     => $tblUserV6->getUserpassword() ,
            "user_session_time" => $tblUserV6->getUsersessiontime() ,
            "user_session_page" => $tblUserV6->getUsersessionpage() ,
            "user_level"        => $tblUserV6->getUserlevel() ,
            "user_timezone"     => $tblUserV6->getUsertimezone() ,
            "user_lang"         => $tblUserV6->getUserlang() ,
            "user_emailtime"    => $tblUserV6->getUseremailtime() ,
            "user_viewemail"    => $tblUserV6->getUserviewemail() ,
            "user_notify"       => $tblUserV6->getUsernotify() ,
            "user_rank"         => $tblUserV6->getUserrank() ,
            "user_avatar"       => $tblUserV6->getUseravatar() ,
            "user_avatar_type"  => $tblUserV6->getUseravatartype() ,
            "user_email"        => $tblUserV6->getUseremail() ,
            "user_website"      => $tblUserV6->getUserwebsite() ,
            "user_from"         => $tblUserV6->getUserfrom() ,
            "user_occ"          => $tblUserV6->getUserocc() ,
            "user_interests"    => $tblUserV6->getUserinterests() ,
            "user_actkey"       => $tblUserV6->getUseractkey() ,
            "user_newpasswd"    => $tblUserV6->getUsernewpasswd() ,
            "user_lastlogon"    => $tblUserV6->getUserlastlogon() ,
            "user_ip"           => $tblUserV6->getUserip() ,
        );
        
        
        
        $id = (int)$data["user_id"];

        //if (null === ($id = $tbl_Affectation_Servi->getIdInternaute()  )) {
        if($id === 0){
            unset($data["user_id"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("user_id = ?" => $id));
        }
    }
    
    /**
     * 
     * @param type $id
     * @param Core_Model_TblUserV6 $tblUserV6
     * @return type
     */
    public function find($id, Core_Model_TblUserV6 $tblUserV6)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tblUserV6->setUserid(self::unescape($row->user_id));
        $tblUserV6->setUseractive(self::unescape($row->user_active));
        $tblUserV6->setUserlastname(self::unescape($row->user_lastname));
        $tblUserV6->setUserfirstname(self::unescape($row->user_firstname));
        $tblUserV6->setUsername(self::unescape($row->username));
        $tblUserV6->setUserpassword(self::unescape($row->user_password));
        $tblUserV6->setUsersessiontime(self::unescape($row->user_session_time));
        $tblUserV6->setUsersessionpage(self::unescape($row->user_session_page));
        $tblUserV6->setUserlevel(self::unescape($row->user_level));
        $tblUserV6->setUsertimezone(self::unescape($row->user_timezone));
        $tblUserV6->setUserlang(self::unescape($row->user_lang));
        $tblUserV6->setUseremailtime(self::unescape($row->user_emailtime));
        $tblUserV6->setUserviewemail(self::unescape($row->user_viewemail));
        $tblUserV6->setUsernotify(self::unescape($row->user_notify));
        $tblUserV6->setUserrank(self::unescape($row->user_rank));
        $tblUserV6->setUseravatar(self::unescape($row->user_avatar));
        $tblUserV6->setUseravatartype(self::unescape($row->user_avatar_type));
        $tblUserV6->setUseremail(self::unescape($row->user_email));
        $tblUserV6->setUserwebsite(self::unescape($row->user_website));
        $tblUserV6->setUserfrom(self::unescape($row->user_from));
        $tblUserV6->setUserocc(self::unescape($row->user_occ));
        $tblUserV6->setUserinterests(self::unescape($row->user_interests));
        $tblUserV6->setUseractkey(self::unescape($row->user_actkey));
        $tblUserV6->setUsernewpasswd(self::unescape($row->user_newpasswd));
        $tblUserV6->setUserlastlogon(self::unescape($row->user_lastlogon));
        $tblUserV6->setUserip(self::unescape($row->user_ip));
        $tblUserV6->setUserprivileges((int)self::unescape($row->user_privileges));
	return $tblUserV6;
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
            $entry = new Core_Model_TblUserV6(); 
	    $entry->setUserid(self::unescape($row->user_id));
            $entry->setUseractive(self::unescape($row->user_active));
            $entry->setUserlastname(self::unescape($row->user_lastname));
            $entry->setUserfirstname(self::unescape($row->user_firstname));
            $entry->setUsername(self::unescape($row->username));
            $entry->setUserpassword(self::unescape($row->user_password));
            $entry->setUsersessiontime(self::unescape($row->user_session_time));
            $entry->setUsersessionpage(self::unescape($row->user_session_page));
            $entry->setUserlevel(self::unescape($row->user_level));
            $entry->setUsertimezone(self::unescape($row->user_timezone));
            $entry->setUserlang(self::unescape($row->user_lang));
            $entry->setUseremailtime(self::unescape($row->user_emailtime));
            $entry->setUserviewemail(self::unescape($row->user_viewemail));
            $entry->setUsernotify(self::unescape($row->user_notify));
            $entry->setUserrank(self::unescape($row->user_rank));
            $entry->setUseravatar(self::unescape($row->user_avatar));
            $entry->setUseravatartype(self::unescape($row->user_avatar_type));
            $entry->setUseremail(self::unescape($row->user_email));
            $entry->setUserwebsite(self::unescape($row->user_website));
            $entry->setUserfrom(self::unescape($row->user_from));
            $entry->setUserocc(self::unescape($row->user_occ));
            $entry->setUserinterests(self::unescape($row->user_interests));
            $entry->setUseractkey(self::unescape($row->user_actkey));
            $entry->setUsernewpasswd(self::unescape($row->user_newpasswd));
            $entry->setUserlastlogon(self::unescape($row->user_lastlogon));
            $entry->setUserip(self::unescape($row->user_ip));
            $entry->setUserprivileges((int)self::unescape($row->user_privileges));
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
        $where   = $dbTable->getAdapter()->quoteInto("user_id = ?", $id);
        return $dbTable->delete($where);
    }
}