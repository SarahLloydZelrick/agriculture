<?php
ini_set('display_errors', 1);

$sqlcorn = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'corn'";
$resultcorn = mysqli_query($con, $sqlcorn);
$countcorn = mysqli_fetch_assoc($resultcorn)['COUNT(*)'];
if($countcorn = NULL){
	$countcorn = "0";
}

$sqlcassava = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'cassava'";
$resultcassava = mysqli_query($con, $sqlcassava);
$countcassava = mysqli_fetch_assoc($resultcassava)['COUNT(*)'];
if($countcassava = ""){
	$countcassava = "0";
}


$sqlrice = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'rice'";
$resultrice = mysqli_query($con, $sqlrice);
$countrice = mysqli_fetch_assoc($resultrice)['COUNT(*)'];
if($countrice = ""){
	$countrice = "0";
}

//HVC
$sqlhvc = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` != 'rice' AND `crop` != 'cassava' AND `crop` != 'corn'";
$resulthvc = mysqli_query($con, $sqlhvc);
$counthvc = mysqli_fetch_assoc($resulthvc)['COUNT(*)'];
//HVC

//ampalaya
$sqlampalaya = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'ampalaya'";
$resultampalaya = mysqli_query($con, $sqlampalaya);
$countampalaya = mysqli_fetch_assoc($resultampalaya)['COUNT(*)'];
if($countampalaya = ""){
	$countampalaya = "0";
}

//cucumber
$sqlcucumber = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'cucumber'";
$resultcucumber = mysqli_query($con, $sqlcucumber);
$countcucumber = mysqli_fetch_assoc($resultcucumber)['COUNT(*)'];
if($countcucumber = ""){
	$countcucumber = "0";
}

//eggplant
$sqleggplant = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'eggplant'";
$resulteggplant = mysqli_query($con, $sqleggplant);
$counteggplant = mysqli_fetch_assoc($resulteggplant)['COUNT(*)'];
if($counteggplant = ""){
	$counteggplant = "0";
}

//mustartd
$sqlmustartd = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'mustartd'";
$resultmustartd = mysqli_query($con, $sqlmustartd);
$countmustartd = mysqli_fetch_assoc($resultmustartd)['COUNT(*)'];
if($countmustartd = ""){
	$countmustartd = "0";
}

//ladyfinger
$sqlladyfinger = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'ladyfinger'";
$resultladyfinger = mysqli_query($con, $sqlladyfinger);
$countladyfinger = mysqli_fetch_assoc($resultladyfinger)['COUNT(*)'];
if($countladyfinger = ""){
	$countladyfinger = "0";
}

//petchay
$sqlpetchay = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'petchay'";
$resultpetchay = mysqli_query($con, $sqlpetchay);
$countpetchay = mysqli_fetch_assoc($resultpetchay)['COUNT(*)'];
if($countpetchay = ""){
	$countpetchay = "0";
}

//radish
$sqlradish = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'radish'";
$resultradish = mysqli_query($con, $sqlradish);
$countradish = mysqli_fetch_assoc($resultradish)['COUNT(*)'];
if($countradish = ""){
	$countradish = "0";
}

//squash
$sqlsquash = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'squash'";
$resultsquash = mysqli_query($con, $sqlsquash);
$countsquash = mysqli_fetch_assoc($resultsquash)['COUNT(*)'];
if($countsquash = ""){
	$countsquash = "0";
}

//stringbeans
$sqlstringbeans = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'stringbeans'";
$resultstringbeans = mysqli_query($con, $sqlstringbeans);
$countstringbeans = mysqli_fetch_assoc($resultstringbeans)['COUNT(*)'];
if($countstringbeans = ""){
	$countstringbeans = "0";
}


//snapbeans
$sqlsnapbeans = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'snapbeans'";
$resultsnapbeans = mysqli_query($con, $sqlsnapbeans);
$countsnapbeans = mysqli_fetch_assoc($resultsnapbeans)['COUNT(*)'];
if($countsnapbeans = ""){
	$countsnapbeans = "0";
}

//tomato
$sqltomato = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'tomato'";
$resulttomato = mysqli_query($con, $sqltomato);
$counttomato = mysqli_fetch_assoc($resulttomato)['COUNT(*)'];
if($counttomato = ""){
	$counttomato = "0";
}

//bottledground
$sqlbottledground = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'bottledground'";
$resultbottledground = mysqli_query($con, $sqlbottledground);
$countbottledground = mysqli_fetch_assoc($resultbottledground)['COUNT(*)'];
if($countbottledground = ""){
	$countbottledground = "0";
}

//wingedbeans
$sqlwingedbeans = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'wingedbeans'";
$resultwingedbeans = mysqli_query($con, $sqlwingedbeans);
$countwingedbeans = mysqli_fetch_assoc($resultwingedbeans)['COUNT(*)'];
if($countwingedbeans = ""){
	$countwingedbeans = "0";
}

//cabbage
$sqlcabbage = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'cabbage'";
$resultcabbage = mysqli_query($con, $sqlcabbage);
$countcabbage = mysqli_fetch_assoc($resultcabbage)['COUNT(*)'];
if($countcabbage = ""){
	$countcabbage = "0";
}

//snapbeans
$sqlsnapbeans = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'snapbeans'";
$resultsnapbeans = mysqli_query($con, $sqlsnapbeans);
$countsnapbeans = mysqli_fetch_assoc($resultsnapbeans)['COUNT(*)'];
if($countsnapbeans = ""){
	$countsnapbeans = "0";
}

//petchay
$sqlpetchay = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'petchay'";
$resultpetchay = mysqli_query($con, $sqlpetchay);
$countpetchay = mysqli_fetch_assoc($resultpetchay)['COUNT(*)'];
if($countpetchay = ""){
	$countpetchay = "0";
}

//yam
$sqlyam = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'yam'";
$resultyam = mysqli_query($con, $sqlyam);
$countyam = mysqli_fetch_assoc($resultyam)['COUNT(*)'];
if($countyam = ""){
	$countyam = "0";
}

//sweetpotato
$sqlsweetpotato = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'sweetpotato'";
$resultsweetpotato = mysqli_query($con, $sqlsweetpotato);
$countsweetpotato = mysqli_fetch_assoc($resultsweetpotato)['COUNT(*)'];
if($countsweetpotato = ""){
	$countsweetpotato = "0";
}

//sili
$sqlsili = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'sili'";
$resultsili = mysqli_query($con, $sqlsili);
$countsili = mysqli_fetch_assoc($resultsili)['COUNT(*)'];
if($countsili = ""){
	$countsili = "0";
}

//panigang
$sqlpanigang = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'panigang'";
$resultpanigang = mysqli_query($con, $sqlpanigang);
$countpanigang = mysqli_fetch_assoc($resultpanigang)['COUNT(*)'];
if($countpanigang = ""){
	$countpanigang = "0";
}

//ginger
$sqlginger = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'ginger'";
$resultginger = mysqli_query($con, $sqlginger);
$countginger = mysqli_fetch_assoc($resultginger)['COUNT(*)'];
if($countginger = ""){
	$countginger = "0";
}

//banana
$sqlbanana = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'banana'";
$resultbanana = mysqli_query($con, $sqlbanana);
$countbanana = mysqli_fetch_assoc($resultbanana)['COUNT(*)'];
if($countbanana = ""){
	$countbanana = "0";
}

//saba
$sqlsaba = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'saba'";
$resultsaba = mysqli_query($con, $sqlsaba);
$countsaba = mysqli_fetch_assoc($resultsaba)['COUNT(*)'];
if($countsaba = ""){
	$countsaba = "0";
}

//latundan
$sqllatundan = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'latundan'";
$resultlatundan = mysqli_query($con, $sqllatundan);
$countlatundan = mysqli_fetch_assoc($resultlatundan)['COUNT(*)'];
if($countlatundan = ""){
	$countlatundan = "0";
}

//lakatan
$sqllakatan = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'lakatan'";
$resultlakatan = mysqli_query($con, $sqllakatan);
$countlakatan = mysqli_fetch_assoc($resultlakatan)['COUNT(*)'];
if($countlakatan = ""){
	$countlakatan = "0";
}

//mango
$sqlmango = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'mango'";
$resultmango = mysqli_query($con, $sqlmango);
$countmango = mysqli_fetch_assoc($resultmango)['COUNT(*)'];
if($countmango = ""){
	$countmango = "0";
}

//citrus
$sqlcitrus = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'citrus'";
$resultcitrus = mysqli_query($con, $sqlcitrus);
$countcitrus = mysqli_fetch_assoc($resultcitrus)['COUNT(*)'];
if($countcitrus = ""){
	$countcitrus = "0";
}

//calamnsi
$sqlcalamnsi = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'calamnsi'";
$resultcalamnsi = mysqli_query($con, $sqlcalamnsi);
$countcalamnsi = mysqli_fetch_assoc($resultcalamnsi)['COUNT(*)'];
if($countcalamnsi = ""){
	$countcalamnsi = "0";
}

//lansones
$sqllansones = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'lansones'";
$resultlansones = mysqli_query($con, $sqllansones);
$countlansones = mysqli_fetch_assoc($resultlansones)['COUNT(*)'];
if($countlansones = ""){
	$countlansones = "0";
}

//rambutan
$sqlrambutan = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'rambutan'";
$resultrambutan = mysqli_query($con, $sqlrambutan);
$countrambutan = mysqli_fetch_assoc($resultrambutan)['COUNT(*)'];
if($countrambutan = ""){
	$countrambutan = "0";
}

//tomato
$sqlguyabano = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'guyabano'";
$resultguyabano = mysqli_query($con, $sqlguyabano);
$countguyabano = mysqli_fetch_assoc($resultguyabano)['COUNT(*)'];
if($countguyabano = ""){
	$countguyabano = "0";
}

//papaya
$sqlpapaya = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'papaya'";
$resultpapaya = mysqli_query($con, $sqlpapaya);
$countpapaya = mysqli_fetch_assoc($resultpapaya)['COUNT(*)'];
if($countpapaya = ""){
	$countpapaya = "0";
}

//cacao
$sqlcacao = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'cacao'";
$resultcacao = mysqli_query($con, $sqlcacao);
$countcacao = mysqli_fetch_assoc($resultcacao)['COUNT(*)'];
if($countcacao = ""){
	$countcacao = "0";
}

//coffee
$sqlcoffee = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'coffee'";
$resultcoffee = mysqli_query($con, $sqlcoffee);
$countcoffee = mysqli_fetch_assoc($resultcoffee)['COUNT(*)'];
if($countcoffee = ""){
	$countcoffee = "0";
}

//liberica
$sqlliberica = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'liberica'";
$resultliberica = mysqli_query($con, $sqlliberica);
$countliberica = mysqli_fetch_assoc($resultliberica)['COUNT(*)'];
if($countliberica = ""){
	$countliberica = "0";
}

//robusta
$sqlrobusta = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'robusta'";
$resultrobusta = mysqli_query($con, $sqlrobusta);
$countrobusta = mysqli_fetch_assoc($resultrobusta)['COUNT(*)'];
if($countrobusta = ""){
	$countrobusta = "0";
}

//pigs
$sqlpigs = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'pigs'";
$resultpigs = mysqli_query($con, $sqlpigs);
$countpigs = mysqli_fetch_assoc($resultpigs)['COUNT(*)'];
if($countpigs = ""){
	$countpigs = "0";
}

//cow
$sqlcow = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'cow'";
$resultcow = mysqli_query($con, $sqlcow);
$countcow = mysqli_fetch_assoc($resultcow)['COUNT(*)'];
if($countcow = ""){
	$countcow = "0";
}

//carabao
$sqlcarabao = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'carabao'";
$resultcarabao = mysqli_query($con, $sqlcarabao);
$countcarabao = mysqli_fetch_assoc($resultcarabao)['COUNT(*)'];
if($countcarabao = ""){
	$countcarabao = "0";
}

//chicken
$sqlchicken = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'chicken'";
$resultchicken = mysqli_query($con, $sqlchicken);
$countchicken = mysqli_fetch_assoc($resultchicken)['COUNT(*)'];
if($countchicken = ""){
	$countchicken = "0";
}

//goat
$sqlgoat = "SELECT COUNT(*) FROM tbl_intervention WHERE `crop` = 'goat'";
$resultgoat = mysqli_query($con, $sqlgoat);
$countgoat = mysqli_fetch_assoc($resultgoat)['COUNT(*)'];
if($countgoat = ""){
	$countgoat = "0";
}
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
	array("label"=> "Corn", "y"=> $countcorn),
	array("label"=> "Cassava", "y"=> $countcassava),
	array("label"=> "Rice", "y"=> $countrice),
	array("label"=> "Cucumber", "y"=> $countcucumber),
	array("label"=> "Eggplant", "y"=> $counteggplant),
	array("label"=> "Mustard", "y"=> $countmustartd),
	array("label"=> "Lady Finger", "y"=> $countladyfinger),
	array("label"=> "Petchay", "y"=> $countpetchay),
	array("label"=> "Radish", "y"=> $countradish),
	array("label"=> "Squash", "y"=> $countsquash),
	array("label"=> "String beans", "y"=> $countstringbeans),
	array("label"=> "Snap beans", "y"=> $countsnapbeans),
	array("label"=> "Tomato", "y"=> $counttomato),
	array("label"=> "Bottled ground", "y"=> $countbottledground),
	array("label"=> "Winged beans", "y"=> $countwingedbeans),
	array("label"=> "Cabbage", "y"=> $countcabbage),
	array("label"=> "Snap beans", "y"=> $countsnapbeans),
	array("label"=> "Yam", "y"=> $countyam),
	array("label"=> "Sweet potato", "y"=> $countsweetpotato),
	array("label"=> "Sili", "y"=> $countsili),
	array("label"=> "Panigang", "y"=> $countpanigang),
	array("label"=> "Ginger", "y"=> $countginger),
	array("label"=> "Banana", "y"=> $countbanana),
	array("label"=> "Saba", "y"=> $countsaba),
	array("label"=> "Latundan", "y"=> $countlatundan),
	array("label"=> "Lakatan", "y"=> $countlakatan),
	array("label"=> "Mango", "y"=> $countmango),
	array("label"=> "Citrus", "y"=> $countcitrus),
	array("label"=> "Calamansi", "y"=> $countcalamnsi),
	array("label"=> "Lansones", "y"=> $countlansones),
	array("label"=> "Rambutan", "y"=> $countrambutan),
	array("label"=> "Guyabano", "y"=> $countguyabano),
	array("label"=> "Papaya", "y"=> $countpapaya),
	array("label"=> "Cacao", "y"=> $countcacao),
	array("label"=> "Coffee", "y"=> $countcoffee),
	array("label"=> "Liberica", "y"=> $countliberica),
	array("label"=> "Robusta", "y"=> $countrobusta),
	array("label"=> "Pigs", "y"=> $countpigs),
	array("label"=> "Cow", "y"=> $countcow),
	array("label"=> "Carabao", "y"=> $countcarabao),
	array("label"=> "Chicken", "y"=> $countchicken),
	array("label"=> "Goat", "y"=> $countgoat)
	
	
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


