<?php
	
	require_once("../config_global.php");
	$database= "if15_mats_3";

	//edit_functions.php
	function getEditData($edit_id){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt=mysqli->prepare("SELECT number_plate, color FROM car_plates WHERE id=? AND deleted IS NULL");
		$stmt->bind_param("i",$edit_id);
		$stmt->bind_result($number_plate,$color);
		$stmt->execute();
		
		$car=new StdClass();
	
		if($stmt->fetch()){
			
			$car->number_plate=$number_plate;
			$car->color=$color;
			
		}else{	
			header("Location:table.php");
			
		}
		return $car;
		
		$stmt->close();
		$mysqli->close();
		
	}



?>