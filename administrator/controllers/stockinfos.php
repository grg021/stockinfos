<?php
/**
 * @version     1.0.0
 * @package     com_stockinfos
 * @copyright   Copyright (C) 2011 Amy Stephen. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');

/**
 * Stockinfos list controller class.
 *
 * @package		Joomla
 * @subpackage	com_stockinfos
 * @since	1.6
 */
class  StockinfosControllerStockinfos extends JControllerAdmin
{
	/**
	 * Constructor.
	 *
	 * @param	array	$config	An optional associative array of configuration settings.

	 * @return	 StockinfosControllerStockinfos
	 * @see		JController
	 * @since	1.6
	 */
	public function __construct($config = array())
	{
		parent::__construct($config);
	}

	/**
	 * Proxy for getModel.
	 *
	 * @param	string	$name	The name of the model.
	 * @param	string	$prefix	The prefix for the PHP class name.
	 *
	 * @return	JModel
	 */
	public function getModel($name = 'Stockinfo', $prefix = 'StockinfosModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);

		return $model;
	}
}