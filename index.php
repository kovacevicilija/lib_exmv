<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <title>Filmovi</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<style>



a {
	color: black;
	
}

#divclick {
	margin: auto;
	text-align: center;
	font-size: 0.5cm;
	
}

.seminar

{
	font-family: Arial;
	font-size: 0.6cm;

}

.unos

{
	font-family: Arial;
	font-size: 0.6cm;
	color: forestgreen;


}

.unos:hover
{
	text-decoration:none;
	opacity: 0.5;

}


th, td {
	width: 30px;
	border: 1px solid black;
	text-align: center;
	height: 35px;
	
	
}
table {
	border-collapse: collapse;
	background-color: white;
	
}



#table {
	margin: auto;
	
}

#prikazfilm {
		
	margin: 20px auto;
	
}

img {
	width: 90%;
	margin: 3px;
}

#brise
{
	
	color: blue;
	
}

.navbar-header{
	
	text-align: center;
	margin: 5px 10px;
	
}

.tdtd{

color: black;
background-color: silver;
font-weight: bold;
width: 160px;

}

</style>
<body>
     
<nav class="navbar navbar-default" role="navigation">
<div class="container">
<div class="navbar-header">
<a class="seminar" href="index.php">PHP Seminar</a>&nbsp;&nbsp;
<a class="unos" href="unos.php">Unos</a>

</div>
  
	
<div id="divclick" class="center">
<form action="index.php" method="POST" name="slovofilma">
    
 
	<?php 
	
	$azRange = range('A', 'Z');
	foreach($azRange as $key => $val)
{
    echo " | <a href=index.php?slovofilma=$val>$val</a>";

	}


?>

</form>
</div>                


<?php

	$db['db_host'] = "localhost";
	$db['db_user'] = 'root';
	$db['db_pass'] = '';
	$db['db_name'] = 'kolekcija';

	foreach($db as $key => $value)
	
		{
						
			define(strtoupper($key), $value);
						
		}


	$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


	if(!$connection)
	
		{
		
			die("Nismo spojeni na bazu" . mysqli_error($conenction));
			
		
		}
		

if(isset($_GET['slovofilma'])){
	
	
	$string = $_GET['slovofilma'];	   

	 
	$query = "SELECT * FROM filmovi WHERE naslov LIKE '$string%'";
	$result = mysqli_query($connection, $query);
	
	
	echo "<table id='prikazfilm'>";
	echo "<tr>";
	echo "<td class='tdtd'>Slika</td>";
	echo "<td class='tdtd'>Naslov filma</td>";
	echo "<td class='tdtd'>Godina</td>";
	echo "<td class='tdtd'>Trajanje</td>";
	echo "<td class='tdtd'>Akcija</td>";
	echo "</tr>";
	
	
	
	while ($row = mysqli_fetch_assoc($result) ) {

			
			$idfilma = $row['id'];
			
			echo "<tr>";
			

			echo "<td>"."<img src='".$row['slika']."'/>";
			echo "</td>";
			echo "<td>".$row['naslov']."</td>";
			echo "<td>".$row['godina']."</td>";
			echo "<td>".$row['trajanje']." min"."</td>";
			echo "<td>"."<a id='brise' href='index.php?delete={$idfilma}'>[ obrisi ]</a></td>";
						
					
			echo "</tr>";
	
	}	
	
	echo "</table>";
}


	if(isset($_GET['delete']))
			
		
		
		
			{
				
				$id_od_film = $_GET['delete'];
				
				$deletefilmquery = "DELETE FROM filmovi WHERE id = {$id_od_film}";
				$delquery = mysqli_query($connection, $deletefilmquery);
				//header("Location: index.php");
				
				
				echo "<p class='text-center'>Film obrisan</p>";
					
				
								
			}
			
	
?>

</body>
</html>