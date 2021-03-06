<?php
/**
 * @version     1.0.0
 * @package     com_stockinfos
 * @copyright   Copyright (C) 2011 Amy Stephen. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

/** uncomment out to determine values available */
//echo '<pre>';var_dump($this->state);'</pre>';
//echo '<pre>';var_dump($this->params);'</pre>';
//echo '<pre>';var_dump($this->user);'</pre>';

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');

//$custom_fields = json_decode($this->item->custom_fields);

/** uncomment out to determine column names */
//echo '<pre>';var_dump($this->item);'</pre>';

/** uncomment out to display the names and values of all custom_fields  */
//foreach ($custom_fields as $name=>$value) {
//    echo '<br/>'.$name.' '.$value.'<br />';
//};

/** uncomment out to display a specific custom field */
//echo $custom_fields->image1;
?>
<style type="text/css">
table.hovertable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #999999;
	border-collapse: collapse;
}
table.hovertable th {
	font-size: 13px;
	font-weight: normal;
	background: #b9c9fe;
	border-top: 4px solid #aabcfe;
	border-bottom: 1px solid #fff;
	color: #039;
	padding: 8px;
	padding-right:30px
}
table.hovertable tr {
	background-color:#d0dafd;
}
table.hovertable td {
	background: rgb(239, 240, 247);;
	border-bottom: 1px solid #fff;
	color: #669;
	border-top: 1px solid transparent;
	padding: 8px;
}
</style>

<div>

    <h1>Dividends and Rights</h1>
	<table class="hovertable">
	
	<tr>
		<th>Year</th>
		<th>Stock Dividend</th>
		<th>Cash Dividend</th>
		<th>Stock Split</th>
		<th>Pre-emptive Right</th>
		<th>Ex-Date</th>
		<th>Record Date</th>
		<th>Payment Date</th>
	</tr>
	
	<tr onmouseover="this.style.backgroundColor='#d0dafd';" onmouseout="this.style.backgroundColor='#e8edff';">
		<td>Sample YEAR</td>
		<td>Sample Stock Dividend</td>
		<td>Sample Cash Dividend</td>
		<td>Sample Stock Split</td>
		<td>Sample Pre-emptive Right</td>
		<td>Sample Ex-Date</td>
		<td>Sample Record Date</td>
		<td>Sample Payment Date</td>
	</tr>
	
	</table>
</div>