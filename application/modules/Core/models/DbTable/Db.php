<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_DbTable_Nouveaute
 * @desc TABLE  : 
 * @file Nouveaute.php
 * @desc PK     : 
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
abstract class Core_Model_DbTable_Db extends Zend_Db_Table_Abstract
{
    public static function getDb()
    {
        return Zend_Controller_Front::getInstance()
                                    ->getParam("bootstrap")
                                    ->getResource("multiDb")
                                    ->getDb("dbcore");
    }
    
    public static function getSqlResults($sql, $params)
    {
         $db   = self::getDb();
         $stmt = $db->query($sql, $params);

         if(APPLICATION_ENV == 'development'){
            # echo $sql;
         }
         
         return $stmt->fetchAll(Zend_Db::FETCH_OBJ );
    }
    
     public static function query($sql)
    {
         $db   = self::getDb();
         $stmt = $db->query($sql);
 
         
         return $stmt;
    }
}