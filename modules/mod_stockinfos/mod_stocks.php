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

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script type="https://raw.github.com/jonthornton/jquery-timepicker/master/jquery.timepicker.js"></script>
<script type="text/javascript">
	$(function() {
    $( "#jform_datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  	$( "#jform_timepicker" ).timepicker();
		$( "#jform_setTimeButton" ).on('click', function (){
		$( "#jform_timepicker" ).timepicker('setTime', new Date());
	});
  });
</script>
<form action="<?php echo JRoute::_('index.php?option=com_stockinfos&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="item-form" class="form-validate">
	<div class="width-60 fltlft">
		<fieldset class="adminform">
			<legend><?php echo empty($this->item->id) ? JText::_('COM_STOCKINFOS_NEW_STOCKINFO') : JText::sprintf('COM_STOCKINFOS_EDIT_STOCKINFO', $this->item->id); ?></legend>
			<ul class="adminformlist">
				<li><?php echo $this->form->getLabel('title'); ?>
				<?php echo $this->form->getInput('title'); ?></li>
				
				<li><?php echo $this->form->getLabel('subtitle'); ?>
				<?php echo $this->form->getInput('subtitle'); ?></li>
                
                <li><?php echo $this->form->getLabel('AsOfDate'); ?>
				<?php echo $this->form->getInput('AsOfDate'); ?></li>

				<li><?php echo $this->form->getLabel('AsOfTime'); ?>
				<?php echo $this->form->getInput('AsOfTime').'<br /><br /><br /><br /><br />'; ?><span style="position:relative; top:6px;"><i>Format(hh:mm)</i></span></li>
                
                <li><?php echo $this->form->getLabel('open_value'); ?>
				<?php echo $this->form->getInput('open_value'); ?></li>

				<li><?php echo $this->form->getLabel('high'); ?>
				<?php echo $this->form->getInput('high'); ?></li>      
                
                <li><?php echo $this->form->getLabel('low'); ?>
				<?php echo $this->form->getInput('low'); ?></li>      
            
                <li><?php echo $this->form->getLabel('close_value'); ?>
				<?php echo $this->form->getInput('close_value'); ?></li>      
                
                <li><?php echo $this->form->getLabel('volume'); ?>
				<?php echo $this->form->getInput('volume').'<br /><br />'; ?></li>      
               
                 <li><?php echo $this->form->getLabel('abscbn'); ?>
				<?php echo $this->form->getInput('abscbn'); ?></li>
                
                 <li><?php echo $this->form->getLabel('abscbnpdr'); ?>
				<?php echo $this->form->getInput('abscbnpdr'); ?></li>
                
                 <li><?php echo $this->form->getLabel('fphc'); ?>
				<?php echo $this->form->getInput('fphc'); ?></li>
                
                 <li><?php echo $this->form->getLabel('fphc preferred'); ?>
				<?php echo $this->form->getInput('fphc preferred'); ?></li>
                
                 <li><?php echo $this->form->getLabel('fgen'); ?>
				<?php echo $this->form->getInput('fgen'); ?></li>
                
                 <li><?php echo $this->form->getLabel('edc'); ?>
				<?php echo $this->form->getInput('edc'); ?></li>
                
                 <li><?php echo $this->form->getLabel('meralco'); ?>
				<?php echo $this->form->getInput('meralco'); ?></li>
                
                 <li><?php echo $this->form->getLabel('rock'); ?>
				<?php echo $this->form->getInput('rock').'<br /><br />'; ?></li>
                
                 <li><?php echo $this->form->getLabel('benpres'); ?>
				<?php echo $this->form->getInput('benpres'); ?></li>
                
                 <li><?php echo $this->form->getLabel('phisix'); ?>
				<?php echo $this->form->getInput('phisix'); ?></li>
			</ul>

			<div class="clr"></div>
			<?php echo $this->form->getLabel('snippet'); ?>
			<div class="clr"></div>
			<?php echo $this->form->getInput('snippet'); ?>

			<div class="clr"></div>
			<?php echo $this->form->getLabel('fulltext'); ?>
			<div class="clr"></div>
			<?php echo $this->form->getInput('fulltext'); ?>
		
        </fieldset>
	</div>



