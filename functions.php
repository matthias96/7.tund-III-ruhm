
<?php

require_once("../config_global.php");
	$database= "if15_mats_3";
	
	function getCarData(){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt= $mysqli->prepare("SELECT id, user_id, number_plate, color from car_plates WHERE deleted IS NULL");
		$stmt->bind_result($id, $user_id_from_database, $number_plate, $color);
		$stmt->execute();
		
		//tekitan  tühja massiivi kus edaspidi hoian objekte
		$car_array = array();
		
		//$row= 0;
		
		//tee midagi seni, kuni saame ab'ist ühe rea andmeid
		while($stmt->fetch()){
			//seda siin sees tehakse
			//nii mitu korda kui on ridu
			
			//echo $row."".$number_plate."<br>";
			//$row=$row + 1;
			//$row +=1;
			//row++;
			$car = new StdClass();
			$car->id= $id;
			$car->plate = $number_plate;
			$car->color = $color;
			$car->user_id= $user_id_from_database;
			//lisan massiivi
			
			array_push($car_array, $car);
			//var dump ütleb muutuja sisu
			//echo"<pre>";
			//var_dump ($car_array);
			//echo"</pre><br>";
		
		}
		
		//tagastan massiivi,kus kõik read sees
		return $car_array;
		
		$stmt->close();
		$mysqli->close();
		
	}
	
	function deleteCar($id){
	$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
	
	$stmt = $mysqli->prepare("UPDATE car_plates SET deleted=NOW() WHERE id=?");
	$stmt->bind_param("i", $id);
	if($stmt->execute()){
		
		header("Location: table.php");
		
	}
	$stmt->close();
	$mysqli->close();
	
	
	
	}
	
	function updateCar ($id, $number_plate, $color){
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("UPDATE car_plates SET number_plate=?, color=? WHERE id=?");
        $stmt->bind_param("ssi", $number_plate, $color, $car_id);
        if($stmt->execute()){
			
		
        
        // tühjendame aadressirea
        header("Location: table.php");
        }
        $stmt->close();
        $mysqli->close();
		
		
	}
	//käivitan funktsiooni
	
?>	