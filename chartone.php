<?php
ini_set('display_errors', 1);

$sqlcorn = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'corn'";
$resultcorn = mysqli_query($con, $sqlcorn);
$countcorn = mysqli_fetch_assoc($resultcorn)['COUNT(*)'];

$sqlcassava = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'cassava'";
$resultcassava = mysqli_query($con, $sqlcassava);
$countcassava = mysqli_fetch_assoc($resultcassava)['COUNT(*)'];

$sqlrice = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'rice'";
$resultrice = mysqli_query($con, $sqlrice);
$countrice = mysqli_fetch_assoc($resultrice)['COUNT(*)'];

$sqlhvc = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` != 'rice' AND `crop` != 'cassava' AND `crop` != 'corn'";
$resulthvc = mysqli_query($con, $sqlhvc);
$counthvc = mysqli_fetch_assoc($resulthvc)['COUNT(*)'];
?>

<?php
 
$dataPoints = array(
	array("label"=> 1997, "y"=> 254722.1),
	array("label"=> 1998, "y"=> 292175.1),
	array("label"=> 1999, "y"=> 369565),
	array("label"=> 2000, "y"=> 284918.9),
	array("label"=> 2001, "y"=> 325574.7),
	array("label"=> 2002, "y"=> 254689.8),
	array("label"=> 2003, "y"=> 303909),
	array("label"=> 2004, "y"=> 335092.9),
	array("label"=> 2005, "y"=> 408128),
	array("label"=> 2006, "y"=> 300992.2),
	array("label"=> 2007, "y"=> 401911.5),
	array("label"=> 2008, "y"=> 299009.2),
	array("label"=> 2009, "y"=> 319814.4),
	array("label"=> 2010, "y"=> 357303.9),
	array("label"=> 2011, "y"=> 353838.9),
	array("label"=> 2012, "y"=> 288386.5),
	array("label"=> 2013, "y"=> 485058.4),
	array("label"=> 2014, "y"=> 326794.4),
	array("label"=> 2015, "y"=> 483812.3),
	array("label"=> 2016, "y"=> 254484)
);
	
?>

<script>
window.onload = function () {
 
var chart1 = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	//theme: "light2",
	title:{
		text: "Salmon Production - 1997 to 2006"
	},
	axisX:{
		crosshair: {
			enabled: true,
			snapToDataPoint: true
		}
	},
	axisY:{
		title: "in Metric Tons",
		includeZero: true,
		crosshair: {
			enabled: true,
			snapToDataPoint: true
		}
	},
	toolTip:{
		enabled: false
	},
	data: [{
		type: "area",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});

//Chart TWO
<?php

    $dataPointstwo = array(
    array("label"=> "Corn", "y"=> $countcorn),
    array("label"=> "Cassava", "y"=> $countcassava),
    array("label"=> "HVC", "y"=> $counthvc),
    array("label"=> "Rice", "y"=> $countrice),
    );

?>
var chart2 = new CanvasJS.Chart("chartContainer2", {

animationEnabled: true,
exportEnabled: true,
title:{
    text: "Total number of crops"
},
subtitles: [{
    text: "in candelaria"
}],
data: [{
    type: "pie",
    showInLegend: "true",
    legendText: "{label}",
    indexLabelFontSize: 16,
    indexLabel: "{label} - #percent%",
    yValueFormatString: "฿#,##0",
    dataPoints: <?php echo json_encode($dataPointstwo, JSON_NUMERIC_CHECK); ?>
}]
});

//Chart Three

<?php
 
$dataPoints = array(
	array("label"=> "Test 1", "y"=> 41),
	array("label"=> "Test 2", "y"=> 35),
	array("label"=> "Test 3", "y"=> 50),
	array("label"=> "Test 4", "y"=> 45),
	array("label"=> "Test 5", "y"=> 52),
	array("label"=> "Test 6", "y"=> 68),
	array("label"=> "Test 7", "y"=> 38),
	array("label"=> "Test 8", "y"=> 71),
	array("label"=> "Test 9", "y"=> 52),
	array("label"=> "Test 10", "y"=> 60),
	array("label"=> "Test 11", "y"=> 36),
	array("label"=> "Test 12", "y"=> 49),
	array("label"=> "Test 13", "y"=> 41),
	array("label"=> "Test 14", "y"=> 41),
	array("label"=> "Test 15", "y"=> 35),
	array("label"=> "Test 16", "y"=> 50),
	array("label"=> "Test 17", "y"=> 45),
	array("label"=> "Test 18", "y"=> 52),
	array("label"=> "Test 19", "y"=> 68),
	array("label"=> "Test 20", "y"=> 38),
	array("label"=> "Test 21", "y"=> 71),
	array("label"=> "Test 22", "y"=> 52),
	array("label"=> "Test 23", "y"=> 60),
	array("label"=> "Test 24", "y"=> 36),
	array("label"=> "Test 25", "y"=> 49),
	array("label"=> "Test 26", "y"=> 41),
	array("label"=> "Test 27", "y"=> 41),
	array("label"=> "Test 28", "y"=> 35),
	array("label"=> "Test 29", "y"=> 50),
	array("label"=> "Test 30", "y"=> 45),
	array("label"=> "Test 31", "y"=> 52),
	array("label"=> "Test 32", "y"=> 68),
	array("label"=> "Test 33", "y"=> 38),
	array("label"=> "Test 34", "y"=> 71),
	array("label"=> "Test 35", "y"=> 52)
	
);
	
?>
var chart3 = new CanvasJS.Chart("chartContainer3", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Simple Column Chart with Index Labels"
	},
	axisY:{
		includeZero: true
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart1.render();
chart2.render();
chart3.render();
}
</script>


