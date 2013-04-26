<?php
/**
 * @version     1.0.0
 * @package     com_stockinfos
 * @copyright   Copyright (C) 2013 Johnpel Quingua. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');

$media = JURI::root() . "site/views/Charts/jsonp.php";
$highstock = JURI::root() . "media/com_stockinfos/js/highstock.js";
$export = JURI::root() . "media/com_stockinfos/js/modules/exporting.js";

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highstock Example</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">
$(function() {
//$.getJSON('http://www.highcharts.com/samples/data/jsonp.php?filename=aapl-c.json&callback=?', function(data) {
	$.getJSON('<?php echo $media; ?>, function(data) {
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
<script src="<?php echo $highstock; ?>" ></script>
<script src="<?php echo $export; ?>" ></script>

<div id="container" style="height: 500px; min-width: 500px"></div>
	</body>
</html>