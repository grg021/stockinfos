<?php
/**
 * @version     1.0.0
 * @package     com_stockinfos
 * @copyright   Copyright (C) 2011 Amy Stephen. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * JSON View class for the Stockinfos component
 *
 * @package		Joomla
 * @subpackage	com_stockinfos
 * @since 1.5
 */
class StockinfosViewCharts extends JView
{
   protected
      $headers,
      $response;
   
   /**
   * Constructor.
   */   
   public function __construct( $p_array = array() )
   {
      parent::__construct( $p_array );
      $this->headers = array(
         "No-Cache" => "SetNoCacheHeaderValueHere"
      );
      $this->response = NULL;
   }
   
   /**
   * Class clean-up.
   */
   public function __destruct()
   {
      unset(
         $this->headers,
         $this->response
      );
   }
   
   /**
   * Override the parent display method and fill in some variables for the view to ouput.
   */
   function display( $p_tpl = NULL )
   {
$conf =& JFactory::getConfig();

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
	$result = mysql_query("SELECT open_value,AsOfDate FROM $table order by AsOfDate asc");
	//fetch tha data from the database
	$result_array = array();
	
	while ($row = mysql_fetch_assoc($result)) {
	   $r = array();
	   $r[] = strtotime($row{'AsOfDate'})*1000;
	   $r[] = floatval($row{'open_value'});
	   $result_array[] = $r;
	}
	print json_encode($result_array);
	return;
   }
}