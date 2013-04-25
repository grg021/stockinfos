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
	padding-right:75px
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
    <h1>History Share Price</h1>
	
	<?php
	error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);
		$selectyear = $_POST['year'];
		$selectmonth = $_POST['month'];
		if($selectmonth == January){
		$selmon = "01";
		}
		else if($selectmonth == February){
		$selmon = "02";
		}
		else if($selectmonth == March){
		$selmon = "03";
		}
		else if($selectmonth == April){
		$selmon = "04";
		}
		else if($selectmonth == May){
		$selmon = "05";
		}
		else if($selectmonth == June){
		$selmon = "06";
		}
		else if($selectmonth == July){
		$selmon = "07";
		}
		else if($selectmonth == August){
		$selmon = "08";
		}
		else if($selectmonth == September){
		$selmon = "09";
		}
		else if($selectmonth == October){
		$selmon = "10";
		}
		else if($selectmonth == November){
		$selmon = "11";
		}
		else if($selectmonth == December){
		$selmon = "12";
		}
		$yearnow = date("Y");
		$monnow = date("m");
		$datenow = date("d");
		$call1 = "$selectyear"."-"."$selmon"."-"."01";
		$call2 = "$selectyear"."-"."$selmon"."-"."31";
	?>
	
	<form action="<?php echo JRoute::_('index.php')?>" method="POST">
	<select name="year" class="body">
                          <?php
						  for($i=$yearnow;$i>=2000;$i--){
						  ?>                  
                                            <option value="<?php echo"$i"; ?>"><?php echo"$i"; ?></option>
                                           
									<?php } ?>
								</select>
	               
                                    <?php
								$curr_month = date("m");
								$month = array (01=>"January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
								$select = "<select name=\"month\">\n";
								foreach ($month as $key => $val) {
									$select .= "\t<option val=\"".$key."\"";
									if ($key == $curr_month) {
									$wew = $key;
									$selected =	$select .= " selected=\"selected\">".$val."</option>\n"; ;
									} else {
										$select .= ">".$val."</option>\n";
									}
								}
								$select .= "</select>";
								echo $select;
								?>
								
								
	<input type="submit" value="Enter" name="submit">
	</form>
	<br>
	<table class="hovertable">
	
	<tr>
		<th>Date</th>
		<th>Open</th>
		<th>High</th>
		<th>Low</th>
		<th>Close</th>
		<th>Volume</th>
	</tr>
	
	<?php
	error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);
$conf =& JFactory::getConfig();

$host = $conf->getValue('config.host');
$user = $conf->getValue('config.user');
$password = $conf->getValue('config.password');
$database = $conf->getValue('config.db');
$prefix = $conf->getValue('config.dbprefix');
$table = "$prefix"."stockinfos";
	mysql_connect("$host", "$user", "$password") or die(mysql_error()); 
	mysql_select_db("$database") or die(mysql_error()); 
	
	//if the user already entered desired year
	if($_POST['submit'] != NULL){
	$data = mysql_query("SELECT * FROM $table WHERE `AsOfDate`<='$call2' AND `AsOfDate`>='$call1'") 
	or die(mysql_error());
	while($info = mysql_fetch_array( $data ))
		{
		
	?>
	
	<tr onmouseover="this.style.backgroundColor='#d0dafd';" onmouseout="this.style.backgroundColor='#e8edff';">
		<td><?php echo $info['AsOfDate'];?></td>
		<td><?php echo $info['open_value'];?></td>
		<td><?php echo $info['high'];?></td>
		<td><?php echo $info['low'];?></td>
		<td><?php echo $info['close_value'];?></td>
		<td><?php echo $info['volume'];?></td>
	</tr>
	<?php }
	}
	else{
	$data = mysql_query("SELECT * FROM $table") 
	or die(mysql_error());
	while($info = mysql_fetch_array( $data ))
		{
		
	?>
	
	<tr onmouseover="this.style.backgroundColor='#d0dafd';" onmouseout="this.style.backgroundColor='#e8edff';">
		<td><?php echo $info['AsOfDate'];?></td>
		<td><?php echo $info['open_value'];?></td>
		<td><?php echo $info['high'];?></td>
		<td><?php echo $info['low'];?></td>
		<td><?php echo $info['close_value'];?></td>
		<td><?php echo $info['volume'];?></td>
	</tr>
	<?php } } ?>
	</table>
</div>