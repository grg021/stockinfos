<?php

header("Content-type: text/json");

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');

	error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);
	$conf = new JConfig();

	$host = $conf->getValue('config.host');
	$user = $conf->getValue('config.user');
	$password = $conf->getValue('config.password');
	$database = $conf->getValue('config.db');
	$prefix = $conf->getValue('config.dbprefix');
	$table = "$prefix"."stockinfos";

	//connection to the database
	$dbhandle = mysql_connect($host, $user, $password) 
	  or die("Unable to connect to MySQL");
	  
	$selected = mysql_select_db($database, $dbhandle) 
	  or die("Could not select examples");
	  
	//execute the SQL query and return records
	$result = mysql_query("SELECT AsOfDate FROM $table");
	//fetch tha data from the database
	$result_array = array();
	var_dump($result);
	
	while ($row = mysql_fetch_assoc($result)) {
	   $r = array();
	   $r[] = strtotime($row{'AsOfDate'})*1000;
	   //$r[] = strtotime($row{echo $this->form->getInput('AsOfDate');} )*1000;
	   //$r[] = floatval($row{'open_value'});
	   $result_array[] = $r;
	}
	print json_encode($result_array);
?>