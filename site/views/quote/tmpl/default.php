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
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);
$conf =& JFactory::getConfig();

$host = $conf->getValue('config.host');
$user = $conf->getValue('config.user');
$password = $conf->getValue('config.password');
$database = $conf->getValue('config.db');
$prefix = $conf->getValue('config.dbprefix');
$table = "$prefix"."stockinfos";
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
	padding-right:88px
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
    
	<?php
		mysql_connect("$host", "$user", "$password") or die(mysql_error()); 
		mysql_select_db("$database") or die(mysql_error()); 
		
		$data = mysql_query("SELECT * FROM $table order by AsOfDate desc limit 1;") 
		or die(mysql_error());
			while($info = mysql_fetch_array( $data )) {
		
		$MostUpDate = $info['AsOfDate'];
		
		$NewDate = strtotime ( '-364 day' , strtotime ( $MostUpDate ) ) ;
		$NewDate = date ( 'Y-m-j' , $NewDate );
		
		//$data = mysql_query("SELECT * FROM $table WHERE `AsOfDate`<='$call2' AND `AsOfDate`>='$call1' order by AsOfDate desc limit 10") 
		
		//COMPUTATION FOR WEEK HIGH
		$weekhigh = mysql_query("SELECT * FROM $table where `AsOfDate`<='$MostUpDate' AND `AsOfDate`>='$NewDate' order by high desc limit 1;") 
		or die(mysql_error());
			while($whigh = mysql_fetch_array( $weekhigh ))
			{
			$wkhigh = $whigh['high'];
			}
		 
		//COMPUTATION FOR WEEK LOW
		$weeklow = mysql_query("SELECT * FROM $table where `AsOfDate`<='$MostUpDate' AND `AsOfDate`>='$NewDate' order by high asc limit 1;") 
		or die(mysql_error());
			while($wlow = mysql_fetch_array( $weeklow ))
			{
			$wklow = $wlow['low'];
			}
		//looking for the 2nd most updated close_value	
		$change = mysql_query("SELECT * FROM $table
		WHERE AsOfDate = (SELECT MAX(AsOfDate) FROM $table WHERE AsOfDate < (SELECT MAX(`AsOfDate`) FROM $table))")
		or die(mysql_error());
		while($yesterday = mysql_fetch_array( $change ))
			{
			$ystrdy = $yesterday['close_value'];
			}

			$today = $info['close_value'];
		//SELECT high FROM $table where order by high limit 1		
			
			
			if($today>$ystrdy){
			$percent = (($today-$ystrdy) / $ystrdy) * 100;
			$percent_val = number_format($percent, 2);
			$percentChange ="+ $percent_val";
			}
			else{
			$percent_val = (($today-$ystrdy) / $ystrdy) * 100;
			$percentChange = number_format($percent_val, 2);
			}
	?>
	
	 
	
	<h1>Quote for <?php echo $info['AsOfDate']; ?> </h1>
	
	<table class="hovertable">
	
	<tr>
		<th>PSE : LPZ</th>
		<th>Listed Investments</th>
	</tr>
	
	<tr onmouseover="this.style.backgroundColor='#d0dafd';" onmouseout="this.style.backgroundColor='#e8edff';">
		<td>Open : <?php echo $info['open_value']; ?></td>
		<td>ABS - CBN : <?php echo $info['abscbn']; ?> </td>
	</tr>
	
	<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#e8edff';">
		<td>High : <?php echo $info['high']; ?></td>
		<td>ABS - CBN PDR : <?php echo $info['abscbnpdr']; ?></td>
	</tr>
	
	<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#e8edff';">
		<td>Close : <?php echo $info['close_value']; ?></td>
		<td>FPHC : <?php echo $info['fphc']; ?></td>
	</tr>
	
	<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#e8edff';">
		<td>Change : <?php echo $percentChange; ?></td>
		<td>FPHC Preferred : <?php echo $info['fphc preferred']; ?></td>
	</tr>
	
	<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#e8edff';">
		<td>Volume : <?php echo $info['volume']; ?></td>
		<td>FGEN : <?php echo $info['fgen']; ?></td>
	</tr>
	
	<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#e8edff';">
		<td>52 Week High : <?php echo $wkhigh; ?></td>
		<td>EDC : <?php echo $info['edc']; ?></td>
	</tr>
	
	<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#e8edff';">
		<td>52 Week Low : <?php echo $wklow; ?></td>
		<td>MERALCO  : <?php echo $info['meralco']; ?></td>
	</tr>
	
	<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#e8edff';">
		<td></td>
		<td>ROCK : <?php echo $info['rock']; ?></td>
	</tr>
	<?php } ?>
	
	</table>
</div>