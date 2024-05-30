<?php   
include("FusionCharts.php");
require ('db.php');
   $strXML = "<graph caption='กราฟแสดงงบประมาณ' subCaption='แยกตามหมวดหมู่' xAxisName='หมวดหมู่' yAxisName='Baht' decimalPrecision='0' showNames='1' numberSuffix=' บาท' pieSliceDepth='30' formatNumberScale='0' baseFontSize ='15' >";

  
   $strQuery = "SELECT * FROM tbbudgetyear";
   $result = mysql_query($strQuery) or die(mysql_error());

   
   if ($result) {
      while($ors = mysql_fetch_array($result)) {
         
         $strXML .=
		  "<set name='" . $ors['Budgetyear'] . "' value='" . $ors['Budgetyearmoney'] . "'/>";
	
        
      }
   }

  
   $strXML .= "</graph>";
	$fullPath = "FusionCharts/Charts/".$_POST["modfusion"];
   //Create the chart - Pie 3D Chart with data from $strXML 
   echo renderChart($fullPath, "", $strXML, "Budgetcategory", 800, 600  );  
?>