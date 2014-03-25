<?php
ini_set('display_errors', 1) ;

set_time_limit(120);
/*
//base sceneario
define ("NOM","sceneariscene4");
define ("PASSE", "qgYkXK9f");
define ("SERVEUR", "localhost");
define ("BASE", "sceneariscene4");
*/
$dirSqlData = dirname(dirname(__FILE__)). DIRECTORY_SEPARATOR 
                                 . 'application' . DIRECTORY_SEPARATOR 
                                 . 'modules'     . DIRECTORY_SEPARATOR 
                                 . 'Core'        . DIRECTORY_SEPARATOR 
                                 . 'models'      . DIRECTORY_SEPARATOR 
                                 . 'data'        . DIRECTORY_SEPARATOR  ;

$sqlDatas = file_get_contents($dirSqlData.'sceneariscene4.sql');

$sqlDatasParts = explode('--------------------------------------------------------',$sqlDatas);
#echo count($sqlDatasParts);
#print_r($sqlDatasParts);
		
$intVal    = array( 'undefined', 'int', 'tinyint' , 'smallint' , 'bigint', 'timestamp', 'mediumint' );
$stringVal = array( 'undefined', 'char' , 'varchar'  , 'datetime'  , 'text'  , 'date' , 'time'  );

$quote     = '`';
		
#echo '<pre>';

foreach($sqlDatasParts as $key => $sqlPart){
	if($key > 0){
		$create = str_replace(PHP_EOL, '', $sqlPart) ;
		$createParts = explode('--', $create);
		$newParts = array();
		foreach($createParts as $part){
			if($part == null || $part == ' '){
				unset($part);
			}else{
				$newParts[] = $part;
			}
		}
		$tmp = array();
		$tmp = substr($newParts[1], strpos( $newParts[1] , ' (  ')+4 ) ;
		
		$sqlLineInfos = explode(',', $tmp);
		
		$tmpLinesSql = array();
		$primaryKeys = '__A_SPECIFIER__';
		foreach($sqlLineInfos as $sqlLine){
			#if() #PRIMARY KEY
			if(strpos($sqlLine , 'PRIMARY KEY') === false){
				if( strpos($sqlLine , 'KEY `') === false ){
					if( strpos($sqlLine , '`') !== false ){
						#if( strpos($sqlLine , 'ENGINE') !== false ){
							$tmpLinesSql[] = trim($sqlLine);
						#}
					}	
				}
			}else{
				$primaryKeys = getPk($sqlLine) ;
			}
		}
		
		$atmp = array() ;
		$atmp2= array() ;
		$sqlFields = array() ;
		
		foreach($tmpLinesSql as $tmpLineSql){
			$atmp[] = explode(' ', $tmpLineSql);
			$replaceInField = array('`', '(', ')');
			foreach($atmp as $key => $val){
	        	$fieldName = trim(str_replace($replaceInField, '', $val[0]));
	        	$t = @trim(str_replace($replaceInField, ' ', $val[1])) ;
	        	if(strpos($t, ' ')!==false){
		        	$fieldType =  substr ( $t , 0 , strpos( $t , ' '  ));
	        	}else{
		        	$fieldType = $t;
	        	}
	        	
	        	$fieldTypeSQL = $fieldType;
	        	
	        	#echo $fieldTypeSQL . PHP_EOL ;
	        	
	        	if(!null == array_search($fieldType, $stringVal)){
	        		$fieldType = 'string';
	        	}
	        	#
	        	#var_dump($fieldType . ' - '  . array_search($fieldType, $stringVal) );
	        	
	        	if(!null == array_search($fieldType, $intVal)){
		        	$fieldType = 'int';
	        	}
	        	
	        	
	        	
	        	$sqlFields['field_name'] = $fieldName ;
	        	$sqlFields['field_type'] = $fieldType ;
	        	$sqlFields['field_type_sql'] = $fieldTypeSQL ;
			}
			if(!array_key_exists($fieldName, $atmp2))
				$atmp2[$fieldName] = $sqlFields ;
			
		}
		#print_r($atmp2);
		
		
		$replaceComment = array("COMMENT='", "';");
		$comment        = getComment(trim(str_replace($replaceComment , '' ,strrchr($tmp  , 'COMMENT='))));
	
		
		$tableFileName    = substr($newParts[0], strpos($newParts[0], ' `'), strpos($newParts[0], '`')) ;
		$tableFname       = ucfirst(strtolower(trim((str_replace(array('`', '_') , '' , $tableFileName))))) ;
		$cleanedTableName = trim(str_replace( $quote , '' , $tableFileName));
		
		$newParts   = array ( 'file' => array( 
		                                    'table_file_name'            => $tableFname ,
							  				'table_file_name_with_ext'   => $tableFname . '.php' ,
							  				
							  ) ,
							  'class' => array(
							  				'model_class_name'           => 'Core_Model_' . $tableFname  ,
							  				'mapper_class_name'          => 'Core_Model_Mapper_' . $tableFname  ,
							  				'dbtable_class_name'         => 'Core_Model_DbTable_' . $tableFname  , ),
							  'table_name'  => $cleanedTableName ,
							  'description' => $comment, 
							  'primary_key' => $primaryKeys,
							  'sqlRaw'      => $sqlLineInfos,
							  'sql_cleaned' => $atmp2,
							  );
		
		//}
		
		#print_r($newParts);
		
		#createDbtable($newParts);
		#createModel($newParts);
		createMapper($newParts);
	}
}

#createDbtable($newParts);

#
function getPk($pkString){
	GLOBAL $quote ;
	#var_dump(strpos($pkString, $quote));
	if(strpos($pkString, $quote) !== false){
		$pk = substr($pkString, strpos($pkString,  $quote), strpos($pkString, $quote ) ) ;
		$pk = str_replace(array('(',')',$quote), '', $pk) ;
		$pk = explode(' ', $pk);

		return $pk[0] != '' ? $pk[0] : '__A_SPECIFIER__';
	}
	return '__A_SPECIFIER__' ;
}

#
function getComment($comment){
	if(strpos( $comment , '=' ) !== false || strpos( $comment , '`' ) !== false){
		return 'Description en cours' ;
	}
	
	if($comment == ''){
		return 'Description en cours';
	}
	return $comment ;
}


//exit;

/*
$sqlString = <<<SQL


CREATE TABLE IF NOT EXISTS `tbl_Calendrier_bak` (
  `idCalendrier` int(11) NOT NULL auto_increment,
  `categorie` varchar(20) NOT NULL default 'Z',
  `actif` varchar(1) NOT NULL default 'N',
  `lieu` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `heure` time default NULL,
  `duree` int(11) NOT NULL default '0',
  `lien` varchar(200) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY  (`idCalendrier`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;


SQL;
*/

#makeModel($sqlString);

function makeModel($sqlString){

	$intVal    = array( 'int', 'tinyint' , 'smallint'  );
	$stringVal = array( 'char' ,'varchar'  , 'datetime'  , 'text'  , 'date'   );
	
	$replaceComment = array("COMMENT='", "';");
	$comment        = trim(str_replace($replaceComment , '' ,strrchr($sqlString  , 'COMMENT=')));
	
	
	#echo $comment ;
	
	$moduleName      = 'Core_' ;
	$modelPrefix     = $moduleName . 'Model_' ;
	$mapperPrefix    = $moduleName . 'Model_Mapper_' ;
	$dbtablePrefix   = $moduleName . 'Model_DbTable_' ;
	
	$tableNamePiece  = explode( ' (', $sqlString ) ;
	$tableName       = trim(substr($tableNamePiece[0], strpos($tableNamePiece[0], '`')) , '`');
	
	#$test = substr( $sqlString, strpos( $sqlString, ' (' ), strpos( $sqlString, ') ' )  );
	
	#echo $test ;
	
	$sqlStringPieces = explode( ',', $sqlString ) ;
	
	$sqlStringParam  = substr( $sqlStringPieces[count($sqlStringPieces) -1]  , 
	                           strpos($sqlStringPieces[count($sqlStringPieces) -1] , 'ENGINE=MyISAM')
	                         );
	                         
	$lastField       = $sqlStringPieces[count($sqlStringPieces) -1] ;
	/*                         
	$sqlStringParams = explode(' ' , $sqlStringParam);
	
	foreach($sqlStringParams as $sqlStringParam){
		if(strpos($sqlStringParam, 'COMMENT=') !== false){
			
		}
	}
	*/
	
	
	$sqlStringCleaned = substr( $sqlString, strpos( $sqlString, ' (' ), strpos( $sqlString, PHP_EOL .') ' )  ); 
	$sqlStringCleanedParts = explode(','.PHP_EOL, $sqlStringCleaned);
	#print_r( $sqlStringParams ) ;
	#$fields = array();
	foreach($sqlStringCleanedParts as $key => $sqlStringPiece){
		#echo $sqlStringPiece . '<br />';
		if(strpos($sqlStringPiece, 'PRIMARY KEY') !== false){
			$searchPK   = array('PRIMARY KEY', '(', ')', '`', ' ');
			$replacePK  = array('');
			$primaryKey = str_replace($searchPK, $replacePK, $sqlStringPiece );
		}
		
		if(strpos($sqlStringPiece, 'KEY `') !== false){
			$searchK   = array('KEY ', '(', ')', '`', ' ');
			$replaceK  = array('');
			$keyPieces = explode('`', $sqlStringPiece );
			$key       = $keyPieces[3];
		}
		
		#if($key > 0){
		$partsOfString = explode(' ' ,  $sqlStringPiece) ;
		if(strpos($sqlStringPiece, '`') !== false){
			#echo $sqlStringPiece . PHP_EOL ;
			$type = '';
			foreach($stringVal as $strval){
				if(strpos($sqlStringPiece, $strval ) !==false){
					$type = 'string' ;
				}
			}
			
			
			
			foreach($intVal as $ival){
				if(strpos($sqlStringPiece, $ival ) !==false){
					$type = 'int' ;
				}
			}
			
			#echo $type;
			
			$field1    = trim(str_replace( '`', '', substr($sqlStringPiece, strpos($sqlStringPiece, '`'), strpos($sqlStringPiece, '` ') - 1))); 
			if(strpos($field1, ')') !== false){
				$field2     = substr($field1, 0 , strpos($field1 , ')') );
				$field      = $field2 ;
			}else{
				$field      = $field1 ;
			}
			$field = cleanedField($field);
			$fields[$field] = array('setter' => 'set'.ucfirst($field) , 'getter' => 'get'.ucfirst($field), 'type' => $type) ;		
		}
		#}
	}
	
	$myTableNameToModelName = array( 'model_class_name'    => $modelPrefix .  Ucfirst(strtolower(str_replace('_', '', $tableName))) , 
                                 'mapper_class_name'   => $mapperPrefix .  Ucfirst(strtolower(str_replace('_', '', $tableName))) ,
                                 'dbtable_class_name'  => $dbtablePrefix .  Ucfirst(strtolower(str_replace('_', '', $tableName))) ,
                                 'table_name'          => $tableName ,
                                 'primary_key'         => @trim($primaryKey, PHP_EOL),
                                 'key'                 => @$key,
                                 'table_fields'        => $fields,
                                 #'engine'              => substr( $lastField, strpos($lastField, 'ENGINE=' ), strpos($lastField ,'') ),
                               ) ;
                              # echo $lastField;
                              # echo strpos($lastField ,' ') ;
  
	
	
	outputCodeAndCreateFile($myTableNameToModelName);

}

#clean les inputs - $strToClean est d'un format attendu
#type 'mastring uneautrestring'
#la fonction retourne mastring
function cleanedField($strToClean){
	$space = strpos($strToClean ,' ') ;
	if($space !== false)
		return substr($strToClean, 0, $space );
	else
		return $strToClean;
}




    
#echo '<pre>';
#print_r($myTableNameToModelName);
#print_r($sqlStringCleanedParts);
#echo '</pre>';

/*
 *@desc retourne la liste des var du model
 *@var array $arrayOfVars
 */
function generateVarNameAndComments($arrayOfVars){
	#print_r($arrayOfVars);
	$output = '';
	foreach($arrayOfVars as $key => $vars){
		$output .= PHP_EOL . '	/* ' . PHP_EOL ;
		$output .= '	 * @var '. $vars['field_type'] . ' - type SQL : ' . $vars['field_type_sql']  .' $_' . $vars['field_name'] . PHP_EOL ;
		$output .= '	 * @desc __A_SPECIFIER__' . PHP_EOL ;
		$output .= '	 */ ' . PHP_EOL;
		$output .= '	private $_' . $vars['field_name'] . ' ; ' . PHP_EOL ;
	}
	return $output ;
}

/*
 *@desc retourne une chaine formatée
 *@var array $setters
 */
function generateSetterAndGetter($arrayOfFields){
	
	$output = '';
	foreach($arrayOfFields as $key1 => $field){
		#GLOBAL $stringVal, $intVal ;
		$fields = array('var_name' => $field['field_name'],'setter' => 'set'.ucfirst($field['field_name']) , 'getter' => 'get'.ucfirst($field['field_name']), 'type' => $field['field_type']) ;	
		
		foreach($fields as $key2 => $value){
			#echo $value . PHP_EOL; 
			
			
			if($key2 == 'setter'){
				#static $output =  ''    ; 
				$output .= PHP_EOL . PHP_EOL . '	/* ' . PHP_EOL ;
				$output .= '	 * @desc SETTER AND GETTER FOR $_' . $fields['var_name'] . PHP_EOL ;
				$output .= '	 * @var ' . $fields['type'] . ' $' . $fields['var_name'] . PHP_EOL ;
				$output .= '	 */ ' ;
				$output .= PHP_EOL . '	public function ' . $value . '($'.$fields['var_name'].')' .  PHP_EOL . '	{';
				$output .= PHP_EOL . '		$this->_' . $fields['var_name'] . ' = $' . $fields['var_name'] . ' ;' ;
				$output .= PHP_EOL . '		return $this;' . PHP_EOL ;
				$output .= PHP_EOL . '	}';
			}elseif($key2 == 'getter'){
				#static $output = '' ; 
				$output .= PHP_EOL . '	public function ' . $value . '()' .  PHP_EOL . '	{';
				$output .= PHP_EOL . '		return $this->_' . $fields['var_name'] . ' ;' ;
				$output .= PHP_EOL . '	}';
			}
			else{
				continue;
			}		
		}			
	}
	return $output;
}

function outputCodeAndCreateFile($myTableNameToModelName){
	GLOBAL $sqlString, $comment;
	$listOfVars     = generateVarNameAndComments($myTableNameToModelName['sql_cleaned']);
	$listOfFunction = generateSetterAndGetter($myTableNameToModelName['sql_cleaned']);
	#echo $listOfVars;
	#echo $listOfFunction;
	
	#return;
	
	#echo '**REGARDER LA SOURCE DU DOCUMENT POUR VOIR LA GENERATION**' . PHP_EOL;
	#echo '/*------------------------------------------------------*/' . PHP_EOL;
	#echo '/*--------------SCAFFOLDING MODEL FOR ZF----------------*/' . PHP_EOL;
	#echo '/*------------------------------------------------------*/' . PHP_EOL;
	
	ob_start();
	
	echo '<?php ' . PHP_EOL  ;
	
	
#echo '/*' .
#trim($sqlString) .
#'*/ '  . PHP_EOL;
echo '
/*
 * SCENEARIO.COM
 * '. $myTableNameToModelName['description'] .'
 * @desc CLASSE : '.$myTableNameToModelName['class']['model_class_name'].'
 * @desc TABLE  : '.$myTableNameToModelName['table_name'].'
 * @file '.$myTableNameToModelName['file']['table_file_name_with_ext'].'
 * @desc PK     : '.$myTableNameToModelName['primary_key'].'
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
' . PHP_EOL  ;

echo 'class '. $myTableNameToModelName['class']['model_class_name']   . PHP_EOL . '{' . PHP_EOL ;

echo $listOfVars;
echo $listOfFunction ;

echo PHP_EOL . '}' . PHP_EOL ;
	
	$classData = ob_get_contents();
	ob_end_clean();
	
	#echo $classData;
	
	if($myTableNameToModelName['primary_key'] == '__A_SPECIFIER__'){
		$fileName = '__A_SPECIFIER__' . $myTableNameToModelName['file']['table_file_name_with_ext'] ;
	}else{
		$fileName = $myTableNameToModelName['file']['table_file_name_with_ext'] ;
	}
	
	
	$modelDir = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'application' . DIRECTORY_SEPARATOR .  'modules' . DIRECTORY_SEPARATOR .  'Core' . DIRECTORY_SEPARATOR .  'models' . DIRECTORY_SEPARATOR . $fileName;


	
   file_put_contents($modelDir , $classData);

}


function createDbtable($infosFromSql){
	
	
	if($infosFromSql['primary_key'] == '__A_SPECIFIER__'){
		$fileName = '__A_SPECIFIER__' . $infosFromSql['file']['table_file_name_with_ext'] ;
	}else{
		$fileName = $infosFromSql['file']['table_file_name_with_ext'] ;
	}
	
	$dbtableDir = dirname(dirname(__FILE__)). DIRECTORY_SEPARATOR . 'application' . DIRECTORY_SEPARATOR .  'modules' . DIRECTORY_SEPARATOR .  'Core' . DIRECTORY_SEPARATOR .  'models' . DIRECTORY_SEPARATOR . 'DbTable' . DIRECTORY_SEPARATOR . $fileName;

	ob_start();
	echo '<?php

/*
 * SCENEARIO.COM
 * '. $infosFromSql['description'] .'
 * @desc CLASSE : '.$infosFromSql['class']['dbtable_class_name'].'
 * @desc TABLE  : '.$infosFromSql['table_name'].'
 * @file '.$infosFromSql['file']['table_file_name_with_ext'].'
 * @desc PK     : '.$infosFromSql['primary_key'].'
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class '.$infosFromSql['class']['dbtable_class_name'].' extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "'.$infosFromSql['table_name'].'",
			"primary" => "'.$infosFromSql['primary_key'].'"
		);
		parent::__construct($options);
	}	
}' ;
	$dbtable = ob_get_contents();
	ob_end_clean();
	
	file_put_contents($dbtableDir, $dbtable);
	
}


function createModel($infosFromSql){
	#generateSetterAndGetter($infosFromSql);
	outputCodeAndCreateFile($infosFromSql);
}


function createMapper($infosFromSql){
	$currentMapperVarName = '$'.$infosFromSql['table_name'];// '$'.lcfirst($infosFromSql['file']['table_file_name']);
	
	if($infosFromSql['primary_key'] == '__A_SPECIFIER__'){
		$fileName = '__A_SPECIFIER__' . $infosFromSql['file']['table_file_name_with_ext'] ;
	}else{
		$fileName = $infosFromSql['file']['table_file_name_with_ext'] ;
	}
	
	$mapperDir = dirname(dirname(__FILE__)). DIRECTORY_SEPARATOR . 'application' . DIRECTORY_SEPARATOR .  'modules' . DIRECTORY_SEPARATOR .  'Core' . DIRECTORY_SEPARATOR .  'models' . DIRECTORY_SEPARATOR . 'mappers' . DIRECTORY_SEPARATOR . $fileName;

	ob_start();
	
	echo '<?php

/*
 * SCENEARIO.COM
 * '. $infosFromSql['description'] .'
 * @desc CLASSE : '.$infosFromSql['class']['mapper_class_name'].'
 * @desc TABLE  : '.$infosFromSql['table_name'].'
 * @file '.$infosFromSql['file']['table_file_name_with_ext'].'
 * @desc PK     : '.$infosFromSql['primary_key'].'
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class '.$infosFromSql['class']['mapper_class_name'].'
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
            $this->setDbTable("'.$infosFromSql['class']['dbtable_class_name'].'");
        }
        return $this->_dbTable;
    }
    /*
    public function save('.$infosFromSql['class']['model_class_name'].' '.$currentMapperVarName.')
    {
	    
        $data = array(';
        foreach($infosFromSql['sql_cleaned'] as $sql){
        	#echo PHP_EOL . '	'.$currentMapperVarName.'->set'.ucfirst($sql['field_name']).'($row->'.$sql['field_name'].')';
        	echo PHP_EOL . '		"' . $sql['field_name'] . '"	=> ' . $currentMapperVarName . '->get'.ucfirst($sql['field_name']).'() ,';
        }
    	echo '
        );
        $id = (int)$data["'.$infosFromSql['primary_key'].'"];

        //if (null === ($id = '.$currentMapperVarName.'->get'.ucfirst( $infosFromSql['primary_key'] ).'()  )) {
        if($id === 0){
            unset($data["'.$infosFromSql['primary_key'].'"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("'.$infosFromSql['primary_key'].' = ?" => $id));
        }
    } */

    public function find($id, '.$infosFromSql['class']['model_class_name'].' '.$currentMapperVarName.')
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); ';
        
        foreach($infosFromSql['sql_cleaned'] as $sql){
        	echo PHP_EOL . '	'.$currentMapperVarName.'->set'.ucfirst($sql['field_name']).'(self::unescape($row->'.$sql['field_name'].'));';
        }
        
     
    echo PHP_EOL . '	return '.$currentMapperVarName.';
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"'.$infosFromSql['primary_key'].' DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new '.$infosFromSql['class']['model_class_name'].'(); ';
            
        foreach($infosFromSql['sql_cleaned'] as $sql){
        	echo PHP_EOL . '	    $entry->set'.ucfirst($sql['field_name']).'(self::unescape($row->'.$sql['field_name'].'));'; //self::unescape
        }
        echo'
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("'.$infosFromSql['primary_key'].' = ?", $id);
        return $dbTable->delete($where);
    }
}' ;

	$mapper = ob_get_contents();
	ob_end_clean();
	
	 #echo $mapper ;
	 file_put_contents($mapperDir, $mapper);
	
}