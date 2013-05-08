<?php

//no direct access
defined('_JEXEC') or die('Restricted Access');

//Include the syndicate function only once
require_once( dirname(__FILE__).DS.'helper.php');

//load helper class and function
$stocks = modStocksHelper::getStocks($params);

//load the layout file from template views
require(JModuleHelper::getLayoutPath('mod_stocks'));

?>