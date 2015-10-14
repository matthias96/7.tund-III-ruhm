<?php
	
	require_once("edit_functions.php");
	//edit
	//addressireal on ?edit_id siis trükin välja selle väärtuse
	if(isset($_GET["edit_id"])){
		echo $_GET ["edit_id"];
		
		$car=getEditData($_GET ["edit_id"]);
		var_dump($car);
	}else{
		echo "VIGA";
		
		header("Location:table.php");
	}


?>
<h2>Muuda autonumbrimärki </h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
	<label for="number_plate">Auto numbrimärk</label><br>
  	<input id="number_plate" name="number_plate" type="text"  value=""> <br><br>
	<label for="color">Värv</label><br>
  	<input id="color" name="color" type="text"  value=""> <br><br>
  	<input type="submit" name="add_plate" value="Salvesta">
  </form>	