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

// Add a reference to a Javascript file
// The default path is 'media/system/js/'

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highstock Example</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">
$(function() {
//$.getJSON('http://www.highcharts.com/samples/data/jsonp.php?filename=aapl-c.json&callback=?', function(data) {
	$.getJSON('<?php echo $this->baseurl ?>/media/<?php echo $this->media;?>com_stockinfos/js/jsonp.php', function(data) {
		// Create the chart
		console.log(data);
		$('#container').highcharts('StockChart', {
			

			rangeSelector : {
				selected : 1
			},

			title : {
				text : 'Lopez Holding Corp'
			},
			
			series : [{
				name : 'LPZ',
				data : data,
				tooltip: {
					valueDecimals: 2
				}
			}]
		});
	});

});

		</script>
</head> 
    
	<body>
    
<script src="<?php echo $this->baseurl ?>/media/<?php echo $this->media;?>com_stockinfos/js/highstock.js" ></script>
<script src="<?php echo $this->baseurl ?>/media/<?php echo $this->media;?>com_stockinfos/js/modules/exporting.js" ></script>

<div id="container" style="height: 500px; min-width: 500px"></div>
	</body>
</html>


