<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblreponsessondage
 * @desc TABLE  : tbl_Reponses_Sondage
 * @file Tblreponsessondage.php
 * @desc PK     : idReponse
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblreponsessondage
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
            $this->setDbTable("Core_Model_DbTable_Tblreponsessondage");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblreponsessondage $tbl_Reponses_Sondage)
    {
	    
        $data = array(
		"idReponse"	=> $tbl_Reponses_Sondage->getIdReponse() ,
		"dateReponse"	=> $tbl_Reponses_Sondage->getDateReponse() ,
		"chx1"	=> $tbl_Reponses_Sondage->getChx1() ,
		"chx2"	=> $tbl_Reponses_Sondage->getChx2() ,
		"chx3"	=> $tbl_Reponses_Sondage->getChx3() ,
		"chx4"	=> $tbl_Reponses_Sondage->getChx4() ,
		"chx5"	=> $tbl_Reponses_Sondage->getChx5() ,
		"chx6"	=> $tbl_Reponses_Sondage->getChx6() ,
		"chx7"	=> $tbl_Reponses_Sondage->getChx7() ,
		"chx8"	=> $tbl_Reponses_Sondage->getChx8() ,
		"chx9"	=> $tbl_Reponses_Sondage->getChx9() ,
		"chx10"	=> $tbl_Reponses_Sondage->getChx10() ,
		"chx11"	=> $tbl_Reponses_Sondage->getChx11() ,
		"chk1"	=> $tbl_Reponses_Sondage->getChk1() ,
		"chk2"	=> $tbl_Reponses_Sondage->getChk2() ,
		"chk3"	=> $tbl_Reponses_Sondage->getChk3() ,
		"chk4"	=> $tbl_Reponses_Sondage->getChk4() ,
		"chk5"	=> $tbl_Reponses_Sondage->getChk5() ,
		"chk6"	=> $tbl_Reponses_Sondage->getChk6() ,
		"chk7"	=> $tbl_Reponses_Sondage->getChk7() ,
		"chk8"	=> $tbl_Reponses_Sondage->getChk8() ,
		"chk9"	=> $tbl_Reponses_Sondage->getChk9() ,
		"chk10"	=> $tbl_Reponses_Sondage->getChk10() ,
		"chk11"	=> $tbl_Reponses_Sondage->getChk11() ,
		"chk12"	=> $tbl_Reponses_Sondage->getChk12() ,
		"chk13"	=> $tbl_Reponses_Sondage->getChk13() ,
		"chk14"	=> $tbl_Reponses_Sondage->getChk14() ,
		"chk15"	=> $tbl_Reponses_Sondage->getChk15() ,
		"chk16"	=> $tbl_Reponses_Sondage->getChk16() ,
		"chk17"	=> $tbl_Reponses_Sondage->getChk17() ,
		"chk18"	=> $tbl_Reponses_Sondage->getChk18() ,
		"chk19"	=> $tbl_Reponses_Sondage->getChk19() ,
		"chk20"	=> $tbl_Reponses_Sondage->getChk20() ,
		"chk21"	=> $tbl_Reponses_Sondage->getChk21() ,
		"chk22"	=> $tbl_Reponses_Sondage->getChk22() ,
		"chk23"	=> $tbl_Reponses_Sondage->getChk23() ,
		"chk24"	=> $tbl_Reponses_Sondage->getChk24() ,
		"chk25"	=> $tbl_Reponses_Sondage->getChk25() ,
		"chk26"	=> $tbl_Reponses_Sondage->getChk26() ,
		"chk27"	=> $tbl_Reponses_Sondage->getChk27() ,
		"chk28"	=> $tbl_Reponses_Sondage->getChk28() ,
		"chk29"	=> $tbl_Reponses_Sondage->getChk29() ,
		"chk30"	=> $tbl_Reponses_Sondage->getChk30() ,
		"chk31"	=> $tbl_Reponses_Sondage->getChk31() ,
		"chk32"	=> $tbl_Reponses_Sondage->getChk32() ,
		"chk33"	=> $tbl_Reponses_Sondage->getChk33() ,
		"chk34"	=> $tbl_Reponses_Sondage->getChk34() ,
		"chk35"	=> $tbl_Reponses_Sondage->getChk35() ,
		"chk36"	=> $tbl_Reponses_Sondage->getChk36() ,
		"chk37"	=> $tbl_Reponses_Sondage->getChk37() ,
		"chk38"	=> $tbl_Reponses_Sondage->getChk38() ,
		"chk39"	=> $tbl_Reponses_Sondage->getChk39() ,
		"chk40"	=> $tbl_Reponses_Sondage->getChk40() ,
		"chk41"	=> $tbl_Reponses_Sondage->getChk41() ,
		"chk42"	=> $tbl_Reponses_Sondage->getChk42() ,
		"chk43"	=> $tbl_Reponses_Sondage->getChk43() ,
		"chk44"	=> $tbl_Reponses_Sondage->getChk44() ,
		"chk45"	=> $tbl_Reponses_Sondage->getChk45() ,
		"chk46"	=> $tbl_Reponses_Sondage->getChk46() ,
		"chk47"	=> $tbl_Reponses_Sondage->getChk47() ,
		"chk48"	=> $tbl_Reponses_Sondage->getChk48() ,
		"txtlong1"	=> $tbl_Reponses_Sondage->getTxtlong1() ,
		"txtcourt1"	=> $tbl_Reponses_Sondage->getTxtcourt1() ,
		"txtcourt2"	=> $tbl_Reponses_Sondage->getTxtcourt2() ,
		"txtcourt3"	=> $tbl_Reponses_Sondage->getTxtcourt3() ,
		"txtcourt4"	=> $tbl_Reponses_Sondage->getTxtcourt4() ,
		"txtcourt5"	=> $tbl_Reponses_Sondage->getTxtcourt5() ,
		"txtlong2"	=> $tbl_Reponses_Sondage->getTxtlong2() ,
		"txtlong3"	=> $tbl_Reponses_Sondage->getTxtlong3() ,
		"adrIp"	=> $tbl_Reponses_Sondage->getAdrIp() ,
		"nomIp"	=> $tbl_Reponses_Sondage->getNomIp() ,
		"txtcourt6"	=> $tbl_Reponses_Sondage->getTxtcourt6() ,
		"chx12"	=> $tbl_Reponses_Sondage->getChx12() ,
        );
        $id = (int)$data["idReponse"];

        //if (null === ($id = $tbl_Reponses_Sondage->getIdReponse()  )) {
        if($id === 0){
            unset($data["idReponse"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idReponse = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblreponsessondage $tbl_Reponses_Sondage)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Reponses_Sondage->setIdReponse(self::unescape($row->idReponse));
	$tbl_Reponses_Sondage->setDateReponse(self::unescape($row->dateReponse));
	$tbl_Reponses_Sondage->setChx1(self::unescape($row->chx1));
	$tbl_Reponses_Sondage->setChx2(self::unescape($row->chx2));
	$tbl_Reponses_Sondage->setChx3(self::unescape($row->chx3));
	$tbl_Reponses_Sondage->setChx4(self::unescape($row->chx4));
	$tbl_Reponses_Sondage->setChx5(self::unescape($row->chx5));
	$tbl_Reponses_Sondage->setChx6(self::unescape($row->chx6));
	$tbl_Reponses_Sondage->setChx7(self::unescape($row->chx7));
	$tbl_Reponses_Sondage->setChx8(self::unescape($row->chx8));
	$tbl_Reponses_Sondage->setChx9(self::unescape($row->chx9));
	$tbl_Reponses_Sondage->setChx10(self::unescape($row->chx10));
	$tbl_Reponses_Sondage->setChx11(self::unescape($row->chx11));
	$tbl_Reponses_Sondage->setChk1(self::unescape($row->chk1));
	$tbl_Reponses_Sondage->setChk2(self::unescape($row->chk2));
	$tbl_Reponses_Sondage->setChk3(self::unescape($row->chk3));
	$tbl_Reponses_Sondage->setChk4(self::unescape($row->chk4));
	$tbl_Reponses_Sondage->setChk5(self::unescape($row->chk5));
	$tbl_Reponses_Sondage->setChk6(self::unescape($row->chk6));
	$tbl_Reponses_Sondage->setChk7(self::unescape($row->chk7));
	$tbl_Reponses_Sondage->setChk8(self::unescape($row->chk8));
	$tbl_Reponses_Sondage->setChk9(self::unescape($row->chk9));
	$tbl_Reponses_Sondage->setChk10(self::unescape($row->chk10));
	$tbl_Reponses_Sondage->setChk11(self::unescape($row->chk11));
	$tbl_Reponses_Sondage->setChk12(self::unescape($row->chk12));
	$tbl_Reponses_Sondage->setChk13(self::unescape($row->chk13));
	$tbl_Reponses_Sondage->setChk14(self::unescape($row->chk14));
	$tbl_Reponses_Sondage->setChk15(self::unescape($row->chk15));
	$tbl_Reponses_Sondage->setChk16(self::unescape($row->chk16));
	$tbl_Reponses_Sondage->setChk17(self::unescape($row->chk17));
	$tbl_Reponses_Sondage->setChk18(self::unescape($row->chk18));
	$tbl_Reponses_Sondage->setChk19(self::unescape($row->chk19));
	$tbl_Reponses_Sondage->setChk20(self::unescape($row->chk20));
	$tbl_Reponses_Sondage->setChk21(self::unescape($row->chk21));
	$tbl_Reponses_Sondage->setChk22(self::unescape($row->chk22));
	$tbl_Reponses_Sondage->setChk23(self::unescape($row->chk23));
	$tbl_Reponses_Sondage->setChk24(self::unescape($row->chk24));
	$tbl_Reponses_Sondage->setChk25(self::unescape($row->chk25));
	$tbl_Reponses_Sondage->setChk26(self::unescape($row->chk26));
	$tbl_Reponses_Sondage->setChk27(self::unescape($row->chk27));
	$tbl_Reponses_Sondage->setChk28(self::unescape($row->chk28));
	$tbl_Reponses_Sondage->setChk29(self::unescape($row->chk29));
	$tbl_Reponses_Sondage->setChk30(self::unescape($row->chk30));
	$tbl_Reponses_Sondage->setChk31(self::unescape($row->chk31));
	$tbl_Reponses_Sondage->setChk32(self::unescape($row->chk32));
	$tbl_Reponses_Sondage->setChk33(self::unescape($row->chk33));
	$tbl_Reponses_Sondage->setChk34(self::unescape($row->chk34));
	$tbl_Reponses_Sondage->setChk35(self::unescape($row->chk35));
	$tbl_Reponses_Sondage->setChk36(self::unescape($row->chk36));
	$tbl_Reponses_Sondage->setChk37(self::unescape($row->chk37));
	$tbl_Reponses_Sondage->setChk38(self::unescape($row->chk38));
	$tbl_Reponses_Sondage->setChk39(self::unescape($row->chk39));
	$tbl_Reponses_Sondage->setChk40(self::unescape($row->chk40));
	$tbl_Reponses_Sondage->setChk41(self::unescape($row->chk41));
	$tbl_Reponses_Sondage->setChk42(self::unescape($row->chk42));
	$tbl_Reponses_Sondage->setChk43(self::unescape($row->chk43));
	$tbl_Reponses_Sondage->setChk44(self::unescape($row->chk44));
	$tbl_Reponses_Sondage->setChk45(self::unescape($row->chk45));
	$tbl_Reponses_Sondage->setChk46(self::unescape($row->chk46));
	$tbl_Reponses_Sondage->setChk47(self::unescape($row->chk47));
	$tbl_Reponses_Sondage->setChk48(self::unescape($row->chk48));
	$tbl_Reponses_Sondage->setTxtlong1(self::unescape($row->txtlong1));
	$tbl_Reponses_Sondage->setTxtcourt1(self::unescape($row->txtcourt1));
	$tbl_Reponses_Sondage->setTxtcourt2(self::unescape($row->txtcourt2));
	$tbl_Reponses_Sondage->setTxtcourt3(self::unescape($row->txtcourt3));
	$tbl_Reponses_Sondage->setTxtcourt4(self::unescape($row->txtcourt4));
	$tbl_Reponses_Sondage->setTxtcourt5(self::unescape($row->txtcourt5));
	$tbl_Reponses_Sondage->setTxtlong2(self::unescape($row->txtlong2));
	$tbl_Reponses_Sondage->setTxtlong3(self::unescape($row->txtlong3));
	$tbl_Reponses_Sondage->setAdrIp(self::unescape($row->adrIp));
	$tbl_Reponses_Sondage->setNomIp(self::unescape($row->nomIp));
	$tbl_Reponses_Sondage->setTxtcourt6(self::unescape($row->txtcourt6));
	$tbl_Reponses_Sondage->setChx12(self::unescape($row->chx12));
	return $tbl_Reponses_Sondage;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idReponse DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblreponsessondage(); 
	    $entry->setIdReponse(self::unescape($row->idReponse));
	    $entry->setDateReponse(self::unescape($row->dateReponse));
	    $entry->setChx1(self::unescape($row->chx1));
	    $entry->setChx2(self::unescape($row->chx2));
	    $entry->setChx3(self::unescape($row->chx3));
	    $entry->setChx4(self::unescape($row->chx4));
	    $entry->setChx5(self::unescape($row->chx5));
	    $entry->setChx6(self::unescape($row->chx6));
	    $entry->setChx7(self::unescape($row->chx7));
	    $entry->setChx8(self::unescape($row->chx8));
	    $entry->setChx9(self::unescape($row->chx9));
	    $entry->setChx10(self::unescape($row->chx10));
	    $entry->setChx11(self::unescape($row->chx11));
	    $entry->setChk1(self::unescape($row->chk1));
	    $entry->setChk2(self::unescape($row->chk2));
	    $entry->setChk3(self::unescape($row->chk3));
	    $entry->setChk4(self::unescape($row->chk4));
	    $entry->setChk5(self::unescape($row->chk5));
	    $entry->setChk6(self::unescape($row->chk6));
	    $entry->setChk7(self::unescape($row->chk7));
	    $entry->setChk8(self::unescape($row->chk8));
	    $entry->setChk9(self::unescape($row->chk9));
	    $entry->setChk10(self::unescape($row->chk10));
	    $entry->setChk11(self::unescape($row->chk11));
	    $entry->setChk12(self::unescape($row->chk12));
	    $entry->setChk13(self::unescape($row->chk13));
	    $entry->setChk14(self::unescape($row->chk14));
	    $entry->setChk15(self::unescape($row->chk15));
	    $entry->setChk16(self::unescape($row->chk16));
	    $entry->setChk17(self::unescape($row->chk17));
	    $entry->setChk18(self::unescape($row->chk18));
	    $entry->setChk19(self::unescape($row->chk19));
	    $entry->setChk20(self::unescape($row->chk20));
	    $entry->setChk21(self::unescape($row->chk21));
	    $entry->setChk22(self::unescape($row->chk22));
	    $entry->setChk23(self::unescape($row->chk23));
	    $entry->setChk24(self::unescape($row->chk24));
	    $entry->setChk25(self::unescape($row->chk25));
	    $entry->setChk26(self::unescape($row->chk26));
	    $entry->setChk27(self::unescape($row->chk27));
	    $entry->setChk28(self::unescape($row->chk28));
	    $entry->setChk29(self::unescape($row->chk29));
	    $entry->setChk30(self::unescape($row->chk30));
	    $entry->setChk31(self::unescape($row->chk31));
	    $entry->setChk32(self::unescape($row->chk32));
	    $entry->setChk33(self::unescape($row->chk33));
	    $entry->setChk34(self::unescape($row->chk34));
	    $entry->setChk35(self::unescape($row->chk35));
	    $entry->setChk36(self::unescape($row->chk36));
	    $entry->setChk37(self::unescape($row->chk37));
	    $entry->setChk38(self::unescape($row->chk38));
	    $entry->setChk39(self::unescape($row->chk39));
	    $entry->setChk40(self::unescape($row->chk40));
	    $entry->setChk41(self::unescape($row->chk41));
	    $entry->setChk42(self::unescape($row->chk42));
	    $entry->setChk43(self::unescape($row->chk43));
	    $entry->setChk44(self::unescape($row->chk44));
	    $entry->setChk45(self::unescape($row->chk45));
	    $entry->setChk46(self::unescape($row->chk46));
	    $entry->setChk47(self::unescape($row->chk47));
	    $entry->setChk48(self::unescape($row->chk48));
	    $entry->setTxtlong1(self::unescape($row->txtlong1));
	    $entry->setTxtcourt1(self::unescape($row->txtcourt1));
	    $entry->setTxtcourt2(self::unescape($row->txtcourt2));
	    $entry->setTxtcourt3(self::unescape($row->txtcourt3));
	    $entry->setTxtcourt4(self::unescape($row->txtcourt4));
	    $entry->setTxtcourt5(self::unescape($row->txtcourt5));
	    $entry->setTxtlong2(self::unescape($row->txtlong2));
	    $entry->setTxtlong3(self::unescape($row->txtlong3));
	    $entry->setAdrIp(self::unescape($row->adrIp));
	    $entry->setNomIp(self::unescape($row->nomIp));
	    $entry->setTxtcourt6(self::unescape($row->txtcourt6));
	    $entry->setChx12(self::unescape($row->chx12));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idReponse = ?", $id);
        return $dbTable->delete($where);
    }
}