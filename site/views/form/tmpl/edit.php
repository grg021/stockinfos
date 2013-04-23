<?php
/**
 * @version     1.0.0
 * @package     com_stockinfos
 * @copyright   Copyright (C) 2011 Amy Stephen. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.calendar');
JHtml::_('behavior.formvalidation');

// Load administrator language to avoid duplicate translations
JFactory::getLanguage()->load('com_stockinfos', JPATH_ADMINISTRATOR.'/components/com_stockinfos');

// Create shortcut to parameters.
$parameters = $this->state->get('params');

// Uncomment out to view what form fields are available
//echo '<pre>';var_dump($this->form);'</pre>';
?>

<script type="text/javascript">
	Joomla.submitbutton = function(task) {
		if (task == 'stockinfo.cancel' || document.formvalidator.isValid(document.id('adminForm'))) {
			<?php echo $this->form->getField('fulltext')->save(); ?>
			Joomla.submitform(task);
		} else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
</script>
<div class="edit item-page<?php echo $this->pageclass_sfx; ?>">
<?php if ($parameters->get('show_page_heading', 1)) : ?>
<h1>
	<?php echo $this->escape($parameters->get('page_heading')); ?>
</h1>
<?php endif; ?>

<form action="<?php echo JRoute::_('index.php?option=com_stockinfos&a_id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
	<fieldset>
		<legend><?php echo JText::_('JEDITOR'); ?></legend>

			<?php /*?><div class="formelm">
                <?php echo $this->form->getLabel('title'); ?>
                <?php echo $this->form->getInput('title'); ?>
			</div>

			<div class="formelm">
                <?php echo $this->form->getLabel('subtitle'); ?>
                <?php echo $this->form->getInput('subtitle'); ?>
			</div><?php */?>
            
            <div class="formelm">
                <?php echo $this->form->getLabel('date'); ?>
                <?php echo $this->form->getInput('date'); ?>
			</div>
            
            <div class="formelm">
                <?php echo $this->form->getLabel('time'); ?>
                <?php echo $this->form->getInput('time'); ?>
			</div>
            
            <div class="formelm">
                <?php echo $this->form->getLabel('open'); ?>
                <?php echo $this->form->getInput('open'); ?>
			</div>
            
            <div class="formelm">
                <?php echo $this->form->getLabel('high'); ?>
                <?php echo $this->form->getInput('high'); ?>
			</div>
            
            <div class="formelm">
                <?php echo $this->form->getLabel('low'); ?>
                <?php echo $this->form->getInput('low'); ?>
			</div>
            
            <div class="formelm">
                <?php echo $this->form->getLabel('close'); ?>
                <?php echo $this->form->getInput('close'); ?>
			</div>
            
            <div class="formelm">
                <?php echo $this->form->getLabel('volume'); ?>
                <?php echo $this->form->getInput('volume'); ?>
			</div>

        <div class="formelm-buttons">
            <button type="button" onclick="Joomla.submitbutton('stockinfo.save')">
                <?php echo JText::_('JSAVE') ?>
            </button>
            <button type="button" onclick="Joomla.submitbutton('stockinfo.cancel')">
                <?php echo JText::_('JCANCEL') ?>
            </button>
        </div>

		<?php echo $this->form->getInput('fulltext'); ?>

	</fieldset>

	//This module is the right side module
    //Will edit later :p
    <?php echo $this->loadTemplate('publishing'); ?>

    <?php echo $this->loadTemplate('custom_fields'); ?>

    <?php echo $this->loadTemplate('parameters'); ?>

	<fieldset>

    	<?php echo $this->loadTemplate('metadata'); ?>

		<input type="hidden" name="task" value="" />
		<input type="hidden" name="return" value="<?php echo $this->return_page;?>" />
		<input type="hidden" name="id" value="<?php echo $this->parameters->get('id', 0);?>" />
		<?php echo JHtml::_( 'form.token' ); ?>
	</fieldset>
</form>
</div>