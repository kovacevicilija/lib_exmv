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

if(isset($_POST['upload']))
{

      $film_naziv = $_POST['naziv'];
      $film_godina = $_POST['godina'];
      $film_trajanje = $_POST['trajanje'];
      $film_zanr = $_POST['zanr'];
      //$zanrid = $row['id'];

       $image = $_FILES['image']['name'];
       $imagetemploc = $_FILES['image']['tmp_name'];
       



       move_uploaded_file($imagetemploc, "img/$image");

      
$query = "INSERT INTO filmovi (id, naslov, id_zanr, godina, trajanje, slika) ";

$query .= "VALUES(id,'{$film_naziv}', '{$film_zanr}', '{$film_godina}', '{$film_trajanje}', 'img/$image')";

$upquery = mysqli_query($connection, $query);

if(!$upquery)

{

  die("Query nije dobar" . mysqli_error($connection));

}

  else{

      echo "<div class='alert alert-success clear-float' id='por' role='alert' style='width:210px';>Film uspješno dodan</div>";

  }

}

?>




<!DOCTYPE html>
<html lang="en">
<head>
<title>Unesite film</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>




</head>

<style>

input:required {

    box-shadow:none;

}

.clear-float
{

margin : 20px auto;

}

.t{

  text-align: center;
  font-size: 0.5cm;
  padding: 10px;

}

.index:hover 
{
  
  text-decoration:none;
  opacity: 0.5;

}

.index

{

  color: forestgreen;
  font-weight: bold;

}

.container{

width: 450px;



}

.tekstimafilma
{

text-align: center;
margin: 20px 60px;
font-size: 20px;
}

#por{

width: 80%;
text-align: center;
border: 


}

</style>

<body>   

<div class="container">

<p class="tekstimafilma">Unesite novi <a class="index" href="index.php">film</a></p>

<form action="unos.php" method="post" enctype="multipart/form-data">

  
  <div class="form-group">
		<label for="naziv">Naziv filma</label>
		<input type="text" class="form-control" name="naziv" required>
	</div>
  
  <div class="form-group">

  <label for="zanr">Zanr</label>
  <select name="zanr" id="" required>

  <?php

  $query = "SELECT * FROM zanr";
  $selzanr = mysqli_query($connection, $query);

  while ($row = mysqli_fetch_assoc($selzanr)) {
    $zanrid = $row['id'];
    $zanrnaziv = $row['naziv'];


    echo "<option value='$zanrid'>{$zanrnaziv}</option>";
  }

  ?>

  </select>


  </div>


  <div class="form-group">

  <label for="godina">Godina</label>
  <input type="text" class="form-control" name="godina" required>

  </div>
  
  <div class="form-group">

  <label for="trajanje">Trajanje</label>
  <input type="text" class="form-control" name="trajanje" required>

  </div>
  
  <div class="form-group">

  <label for="image">Odaberite sliku: </label>
  <input type="file" name="image" required>


  </div>  

  
  
  <div class="form-group">
  <input type="submit" name="upload" value="CLICK" class="btn btn-primary">

  </div>




</form>



</div>

</body>
</html>