<?php
/**
 * @version     1.0.0
 * @package     com_stockinfos
 * @copyright   Copyright (C) 2011 Amy Stephen. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/** custom css **/
$document = JFactory::getDocument();
$document->addStyleSheet('../media/com_stockinfos/css/administrator.css');

// Load the tooltip behavior.
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');
?>

<script type="text/javascript">
	Joomla.submitbutton = function(task) {
		if (task == 'stockinfo.cancel' || document.formvalidator.isValid(document.id('item-form'))) {
			<?php echo $this->form->getField('fulltext')->save(); ?>
			Joomla.submitform(task, document.getElementById('item-form'));
		} else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_stockinfos&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="item-form" class="form-validate">
	<div class="width-60 fltlft">
		<fieldset class="adminform">
			<legend><?php echo empty($this->item->id) ? JText::_('COM_STOCKINFOS_NEW_STOCKINFO') : JText::sprintf('COM_STOCKINFOS_EDIT_STOCKINFO', $this->item->id); ?></legend>
			<ul class="adminformlist">
				<?php /*?><li><?php echo $this->form->getLabel('title'); ?>
				<?php echo $this->form->getInput('title'); ?></li>

				<li><?php echo $this->form->getLabel('subtitle'); ?>
				<?php echo $this->form->getInput('subtitle'); ?></li><?php */?>
                
                <li><?php echo $this->form->getLabel('date'); ?>
				<?php echo $this->form->getInput('date'); ?></li>

				<li><?php echo $this->form->getLabel('time'); ?>
				<?php echo $this->form->getInput('time').'<br /><br />'; ?></li>
                
                <li><?php echo $this->form->getLabel('open'); ?>
				<?php echo $this->form->getInput('open'); ?></li>

				<li><?php echo $this->form->getLabel('high'); ?>
				<?php echo $this->form->getInput('high'); ?></li>      
                
                <li><?php echo $this->form->getLabel('low'); ?>
				<?php echo $this->form->getInput('low'); ?></li>      
                
                <li><?php echo $this->form->getLabel('close'); ?>
				<?php echo $this->form->getInput('close'); ?></li>      
                
                <li><?php echo $this->form->getLabel('volume'); ?>
				<?php echo $this->form->getInput('volume').'<br /><br />'; ?></li>      
               
                 <li><?php echo $this->form->getLabel('abs-cbn'); ?>
				<?php echo $this->form->getInput('abs-cbn'); ?></li>
                
                 <li><?php echo $this->form->getLabel('abs-cbn pdr'); ?>
				<?php echo $this->form->getInput('abs-cbn pdr'); ?></li>
                
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

	<div class="width-40 fltrt">
		<?php echo JHtml::_('sliders.start','content-sliders-'.$this->item->id, array('useCookie'=>1)); ?>

			<?php echo $this->loadTemplate('publishing'); ?>

			<?php echo $this->loadTemplate('custom_fields'); ?>

			<?php echo $this->loadTemplate('parameters'); ?>

			<?php echo $this->loadTemplate('metadata'); ?>

		<?php echo JHtml::_('sliders.end'); ?>
        </div>
    
<div class="clr"></div>
<?php if ($this->canDo->get('core.admin')): ?>
    <div class="width-100 fltlft">
        <?php echo JHtml::_('sliders.start','permissions-sliders-'.$this->item->id, array('useCookie'=>1)); ?>

            <?php echo JHtml::_('sliders.panel',JText::_('COM_STOCKINFOS_FIELDSET_RULES'), 'access-rules'); ?>
            <fieldset class="panelform">
                <?php echo $this->form->getLabel('rules'); ?>
                <?php echo $this->form->getInput('rules'); ?>
            </fieldset>

        <?php echo JHtml::_('sliders.end'); ?>
    </div>
<?php endif; ?>
<div>
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="return" value="<?php echo JRequest::getCmd('return');?>" />
    <?php echo JHtml::_('form.token'); ?>
</div>
</form>
