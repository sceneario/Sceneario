<?php

/**
 * @package Core
 * @category Model
 */

/**
 * 
 */

class Core_Model_TblUserV6 
{
     /*
     * @var type $_userid
    */
    private $_userid;
    
     /*
     * @var type $_userid
    */
    private $_userprivileges;

    
    /*
     * @var type $_useractive
    */
    private $_useractive;
    
    /*
     * @var type $_userlastname
    */
    private $_userlastname;
    
    /*
     * @var type $_userfirstname
    */
    private $_userfirstname;
    
    /*
     * @var type $_username
    */
    private $_username;
    
    /*
     * @var type $_userpassword
    */
    private $_userpassword;
    
    /*
     * @var type $_usersessiontime
    */
    private $_usersessiontime;
    
    /*
     * @var type $_usersessionpage
    */
    private $_usersessionpage;
    
    /*
     * @var type $_userlevel
    */
    private $_userlevel;
    
    /*
     * @var type $_usertimezone
    */
    private $_usertimezone;
    
    /*
     * @var type $_userlang
    */
    private $_userlang;
    
    /*
     * @var type $_useremailtime
    */
    private $_useremailtime;
    
    /*
     * @var type $_userviewemail
    */
    private $_userviewemail;
    
    /*
     * @var type $_usernotify
    */
    private $_usernotify;
    
    /*
     * @var type $_userrank
    */
    private $_userrank;
    
    /*
     * @var type $_useravatar
    */
    private $_useravatar;
    
    /*
     * @var type $_useravatartype
    */
    private $_useravatartype;
    
    /*
     * @var type $_useremail
    */
    private $_useremail;
    
    /*
     * @var type $_userwebsite
    */
    private $_userwebsite;
    
    /*
     * @var type $_userfrom
    */
    private $_userfrom;
    
    /*
     * @var type $_userocc
    */
    private $_userocc;
    
    /*
     * @var type $_userinterests
    */
    private $_userinterests;
    
    /*
     * @var type $_useractkey
    */
    private $_useractkey;
    
    /*
     * @var type $_usernewpasswd
    */
    private $_usernewpasswd;
    
    /*
     * @var type $_userlastlogon
    */
    private $_userlastlogon;
    
    /*
     * @var type $_userip
    */
    private $_userip;
	/**
     * @return the $_userid
     */
    public function getUserid ()
    {
        return $this->_userid;
    }

	/**
     * @param field_type $_userid
     */
    public function setUserid ($_userid)
    {
        $this->_userid = $_userid;
        return $this;
    }

	/**
     * @return the $_useractive
     */
    public function getUseractive ()
    {
        return $this->_useractive;
    }

	/**
     * @param field_type $_useractive
     */
    public function setUseractive ($_useractive)
    {
        $this->_useractive = $_useractive;
        return $this;
    }

	/**
     * @return the $_userlastname
     */
    public function getUserlastname ()
    {
        return $this->_userlastname;
    }

	/**
     * @param field_type $_userlastname
     */
    public function setUserlastname ($_userlastname)
    {
        $this->_userlastname = $_userlastname;
        return $this;
    }

	/**
     * @return the $_userfirstname
     */
    public function getUserfirstname ()
    {
        return $this->_userfirstname;
    }

	/**
     * @param field_type $_userfirstname
     */
    public function setUserfirstname ($_userfirstname)
    {
        $this->_userfirstname = $_userfirstname;
        return $this;
    }
    
    
    /**
     * @return the $_userprivileges
     */
    public function getUserprivileges ()
    {
        return $this->_userprivileges;
    }

	/**
     * @param field_type $_userfirstname
     */
    public function setUserprivileges($_userprivileges)
    {
        $this->_userprivileges = $_userprivileges;
        return $this;
    }
    

	/**
     * @return the $_username
     */
    public function getUsername ()
    {
        return $this->_username;
    }

	/**
     * @param field_type $_username
     */
    public function setUsername ($_username)
    {
        $this->_username = $_username;
        return $this;
    }

	/**
     * @return the $_userpassword
     */
    public function getUserpassword ()
    {
        return $this->_userpassword;
    }

	/**
     * @param field_type $_userpassword
     */
    public function setUserpassword ($_userpassword)
    {
        $this->_userpassword = $_userpassword;
        return $this;
    }

	/**
     * @return the $_usersessiontime
     */
    public function getUsersessiontime ()
    {
        return $this->_usersessiontime;
    }

	/**
     * @param field_type $_usersessiontime
     */
    public function setUsersessiontime ($_usersessiontime)
    {
        $this->_usersessiontime = $_usersessiontime;
        return $this;
    }

	/**
     * @return the $_usersessionpage
     */
    public function getUsersessionpage ()
    {
        return $this->_usersessionpage;
    }

	/**
     * @param field_type $_usersessionpage
     */
    public function setUsersessionpage ($_usersessionpage)
    {
        $this->_usersessionpage = $_usersessionpage;
        return $this;
    }

	/**
     * @return the $_userlevel
     */
    public function getUserlevel ()
    {
        return $this->_userlevel;
    }

	/**
     * @param field_type $_userlevel
     */
    public function setUserlevel ($_userlevel)
    {
        $this->_userlevel = $_userlevel;
        return $this;
    }

	/**
     * @return the $_usertimezone
     */
    public function getUsertimezone ()
    {
        return $this->_usertimezone;
    }

	/**
     * @param field_type $_usertimezone
     */
    public function setUsertimezone ($_usertimezone)
    {
        $this->_usertimezone = $_usertimezone;
        return $this;
    }

	/**
     * @return the $_userlang
     */
    public function getUserlang ()
    {
        return $this->_userlang;
    }

	/**
     * @param field_type $_userlang
     */
    public function setUserlang ($_userlang)
    {
        $this->_userlang = $_userlang;
        return $this;
    }

	/**
     * @return the $_useremailtime
     */
    public function getUseremailtime ()
    {
        return $this->_useremailtime;
    }

	/**
     * @param field_type $_useremailtime
     */
    public function setUseremailtime ($_useremailtime)
    {
        $this->_useremailtime = $_useremailtime;
        return $this;
    }

	/**
     * @return the $_userviewemail
     */
    public function getUserviewemail ()
    {
        return $this->_userviewemail;
    }

	/**
     * @param field_type $_userviewemail
     */
    public function setUserviewemail ($_userviewemail)
    {
        $this->_userviewemail = $_userviewemail;
        return $this;
    }

	/**
     * @return the $_usernotify
     */
    public function getUsernotify ()
    {
        return $this->_usernotify;
    }

	/**
     * @param field_type $_usernotify
     */
    public function setUsernotify ($_usernotify)
    {
        $this->_usernotify = $_usernotify;
        return $this;
    }

	/**
     * @return the $_userrank
     */
    public function getUserrank ()
    {
        return $this->_userrank;
    }

	/**
     * @param field_type $_userrank
     */
    public function setUserrank ($_userrank)
    {
        $this->_userrank = $_userrank;
        return $this;
    }

	/**
     * @return the $_useravatar
     */
    public function getUseravatar ()
    {
        return $this->_useravatar;
    }

	/**
     * @param field_type $_useravatar
     */
    public function setUseravatar ($_useravatar)
    {
        $this->_useravatar = $_useravatar;
        return $this;
    }

	/**
     * @return the $_useravatartype
     */
    public function getUseravatartype ()
    {
        return $this->_useravatartype;
    }

	/**
     * @param field_type $_useravatartype
     */
    public function setUseravatartype ($_useravatartype)
    {
        $this->_useravatartype = $_useravatartype;
        return $this;
    }

	/**
     * @return the $_useremail
     */
    public function getUseremail ()
    {
        return $this->_useremail;
    }

	/**
     * @param field_type $_useremail
     */
    public function setUseremail ($_useremail)
    {
        $this->_useremail = $_useremail;
        return $this;
    }

	/**
     * @return the $_userwebsite
     */
    public function getUserwebsite ()
    {
        return $this->_userwebsite;
    }

	/**
     * @param field_type $_userwebsite
     */
    public function setUserwebsite ($_userwebsite)
    {
        $this->_userwebsite = $_userwebsite;
        return $this;
    }

	/**
     * @return the $_userfrom
     */
    public function getUserfrom ()
    {
        return $this->_userfrom;
    }

	/**
     * @param field_type $_userfrom
     */
    public function setUserfrom ($_userfrom)
    {
        $this->_userfrom = $_userfrom;
        return $this;
    }

	/**
     * @return the $_userocc
     */
    public function getUserocc ()
    {
        return $this->_userocc;
    }

	/**
     * @param field_type $_userocc
     */
    public function setUserocc ($_userocc)
    {
        $this->_userocc = $_userocc;
        return $this;
    }

	/**
     * @return the $_userinterests
     */
    public function getUserinterests ()
    {
        return $this->_userinterests;
    }

	/**
     * @param field_type $_userinterests
     */
    public function setUserinterests ($_userinterests)
    {
        $this->_userinterests = $_userinterests;
        return $this;
    }

	/**
     * @return the $_useractkey
     */
    public function getUseractkey ()
    {
        return $this->_useractkey;
    }

	/**
     * @param field_type $_useractkey
     */
    public function setUseractkey ($_useractkey)
    {
        $this->_useractkey = $_useractkey;
        return $this;
    }

	/**
     * @return the $_usernewpasswd
     */
    public function getUsernewpasswd ()
    {
        return $this->_usernewpasswd;
    }

	/**
     * @param field_type $_usernewpasswd
     */
    public function setUsernewpasswd ($_usernewpasswd)
    {
        $this->_usernewpasswd = $_usernewpasswd;
        return $this;
    }

	/**
     * @return the $_userlastlogon
     */
    public function getUserlastlogon ()
    {
        return $this->_userlastlogon;
    }

	/**
     * @param field_type $_userlastlogon
     */
    public function setUserlastlogon ($_userlastlogon)
    {
        $this->_userlastlogon = $_userlastlogon;
        return $this;
    }

	/**
     * @return the $_userip
     */
    public function getUserip ()
    {
        return $this->_userip;
    }

	/**
     * @param field_type $_userip
     */
    public function setUserip ($_userip)
    {
        $this->_userip = $_userip;
        return $this;
    }
}