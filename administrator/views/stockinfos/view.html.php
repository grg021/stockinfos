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
 * View class for a list of stockinfos.
 *
 * @package		Joomla.Administrator
 * @subpackage	com_stockinfos
 */
class StockinfosViewStockinfos extends JView
{
	protected $items;
	protected $pagination;
	protected $state;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
		$this->state		= $this->get('State');
		$this->authors		= $this->get('Authors');

		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		if ($this->getLayout() !== 'modal') {
			$this->addToolbar();
		}

		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 */
	protected function addToolbar()
	{
		$canDo	= StockinfosHelper::getActions($this->state->get('filter.category_id'));
		$user	= JFactory::getUser();
		JToolBarHelper::title(JText::_('COM_STOCKINFOS_STOCKINFOS_TITLE'), 'stockinfo.png');

		if ($canDo->get('core.create')
            || (count($user->getAuthorisedCategories('com_stockinfos', 'core.create'))) > 0 ) {
			JToolBarHelper::addNew('stockinfo.add');
		}

		if (($canDo->get('core.edit'))
            || ($canDo->get('core.edit.own'))) {
			JToolBarHelper::editList('stockinfo.edit');
		}

		if ($canDo->get('core.edit.state')) {
			JToolBarHelper::divider();
			JToolBarHelper::publish('stockinfos.publish', 'JTOOLBAR_PUBLISH', true);
			JToolBarHelper::unpublish('stockinfos.unpublish', 'JTOOLBAR_UNPUBLISH', true);
			JToolBarHelper::divider();
			JToolBarHelper::checkin('stockinfos.checkin');
		}

		if ($this->state->get('filter.published') == -2
            && $canDo->get('core.delete')) {
			JToolBarHelper::deleteList('', 'stockinfos.delete','JTOOLBAR_EMPTY_TRASH');
			JToolBarHelper::divider();

		} else if ($canDo->get('core.edit.state')) {
			JToolBarHelper::trash('stockinfos.trash');
			JToolBarHelper::divider();
		}

		if ($canDo->get('core.admin')) {
			JToolBarHelper::preferences('com_stockinfos');
			JToolBarHelper::divider();
		}
	}
}
