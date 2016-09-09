<?php

if(!defined("DB_TYPE"))
	define("DB_TYPE","mysql");

if(!defined("DB_SERVER"))
	define("DB_SERVER","localhost");
if(!defined("DB_USER"))
	define("DB_USER","root");


if(!defined("DB_PWD"))
		define("DB_PWD","craiwrut");
		

if(!defined("DB_NAME"))

		define("DB_NAME","db_cpma");

if(!defined("DB_PORT"))
	define("DB_PORT","3306");

if(!defined('ROOT'))
	define('ROOT',''.$_SERVER["DOCUMENT_ROOT"].'');  
		
/**
 * Cookie Constants - these are the parameters
 * to the setcookie function call.
 */
define("COOKIE_EXPIRE", 60*60*24*100);  //100 days by default
define("COOKIE_PATH", "/");  //Avaible in whole domain


//function to connect to database		
	function connect(){
		$conn = mysql_connect(DB_SERVER,DB_USER,DB_PWD);
		mysql_set_charset('utf8',$conn);
		$db = mysql_select_db(DB_NAME,$conn);		 
		if($conn){
			return TRUE;
		} else{
			throw new Exception("Database Connection Failure");
		}
	}
		
	
	
	function secureInput($var)
	{
			
		$output = '';
		if (is_array($var)){
			foreach($var as $key=>$val){
				$output[$key] = secureInput($val);
			}
		} else {
			$var = strip_tags(trim($var));
			if (function_exists("get_magic_quotes_gpc")) {
				$output = mysql_escape_string(get_magic_quotes_gpc() ? stripslashes($var) : $var);
			} else {
				$output = mysql_escape_string($var);
			}
		}
		if (!empty($output))
		return $output;
	}
	
	
	/* function disconnect(){
		pg_close( pg_connect("host=".dbHost." user=".dbUser." password=".dbPWD." dbname=".dbName. " port=".DB_PORT ));	
	}*/

require_once(dirname(__FILE__).'/lib_connectExtended.php');
	
?>
