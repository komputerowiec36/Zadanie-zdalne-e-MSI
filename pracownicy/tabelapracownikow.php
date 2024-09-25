<meta http-equiv="content-type" content="text/html; charset=utf-8">
<body bgcolor="litegreen">
<body>
<br><br>
<center>
<H1>Tabela Pracowników<H1>
<style>

table

{
width: 1000px; 

height: 300px;

border-style:solid;

border-width:9px;

border-color:blue;

background-color:#e0f7fa;

text-align: center;

text-border: 60;

font-weight: 200px;
}
#tablica2
{
width: 1000px; 

height: 100px;

border-style:solid;

border-width:9px;

border-color:grey;

background-color:#e0f7fa;

text-align: center;

text-border: 60;

font-weight: 200px;
}

</style>	
<H2>wybierz kolor:</H2>
<div class="colors-picker">
 <div>
  <label for="color_even">Kolor 1:</label>
  <input type="color" id="color_odd" value="#dddddd"/>
 </div>
 <div>
  <label for="color_odd">Kolor 2:</label>
  <input type="color" id="color_even" value="#999999"/>
 </div>
</div>

<br>
<?php
$con = mysqli_connect("localhost","root","serwer12345*","firma");
if (!$con)
{

die('Could not connect: ' . mysqli_error());

}
if (isset($_POST['pokaz']))
{
 $column = $_POST['column'];
 $var = $_POST['var'];
 $selected = $_POST['tab'];

 if($column == '' and $var == '')
 {
	$result = mysqli_query($con,"SELECT * FROM $selected;");

	$lista = array();
	echo "<table border='1' id='tablica'>";


	echo "<tr style= 'background-color:#d2d2d2'>";


	$j = 0;
	while ($property = mysqli_fetch_field($result)) {

	 echo"<th>".$property->name."</th>";
	 $lista[$j]=$property->name;
	 $j=$j+1;
	}

	echo"</tr>";

	 $i = 1;
	 $titlerows=mysqli_num_fields($result);
	while($row = mysqli_fetch_array($result))

	  {
	  echo "<tr>";
	  
	  $k = 0;
	  While($k<$titlerows)
	  {
		echo "<td>". $row[$lista[$k]] ."</td>";
		$k=$k+1;
	  }

	  echo "</tr>";
	  $i = $i +1;
	  }
	  

	echo "</table>";
    


	
 }
 if ($column != '' and $var !='')
 {
	 $result = mysqli_query($con,"SELECT * FROM $selected Where `$column`='$var';");
	 $ile=mysqli_num_rows($result);
	 if($ile > 0 )
	 {
		$lista = array();
		echo "<table border='1' id='tablica'>";


		echo "<tr style= 'background-color:#d2d2d2'>";


		$j = 0;
		while ($property = mysqli_fetch_field($result)) {

		 echo"<th>".$property->name."</th>";
		 $lista[$j]=$property->name;
		 $j=$j+1;
		}

		echo"</tr>";

		 $i = 1;
		 $titlerows=mysqli_num_fields($result);
		while($row = mysqli_fetch_array($result))

		  {
		  echo "<tr>";
		  
		  $k = 0;
		  While($k<$titlerows)
		  {
			echo "<td>". $row[$lista[$k]] ."</td>";
			$k=$k+1;
		  }

		  echo "</tr>";
		  $i = $i +1;
		  }
		  

		echo "</table>";
		


		mysqli_close($con);
	 }
	 if($ile == 0 )
	 {
	  if(isset($_POST['front']))
	  {
		$result = mysqli_query($con,"SELECT * FROM $selected WHERE `$column` LIKE '$var%';");

		$lista = array();
		echo "<table border='1' id='tablica'>";


		echo "<tr style= 'background-color:#d2d2d2'>";


		$j = 0;
		while ($property = mysqli_fetch_field($result)) {

		 echo"<th>".$property->name."</th>";
		 $lista[$j]=$property->name;
		 $j=$j+1;
		}

		echo"</tr>";

		 $i = 1;
		 $titlerows=mysqli_num_fields($result);
		while($row = mysqli_fetch_array($result))

		  {
		  echo "<tr>";
		  
		  $k = 0;
		  While($k<$titlerows)
		  {
			echo "<td>". $row[$lista[$k]] ."</td>";
			$k=$k+1;
		  }

		  echo "</tr>";
		  $i = $i +1;
		  }
		  

		echo "</table>";
		


		mysqli_close($con);

	  }
	  if(isset($_POST['behind']))
	  {
		$result = mysqli_query($con,"SELECT * FROM $selected WHERE `$column` LIKE '%$var';");

		$lista = array();
		echo "<table border='1' id='tablica'>";


		echo "<tr style= 'background-color:#d2d2d2'>";


		$j = 0;
		while ($property = mysqli_fetch_field($result)) {

		 echo"<th>".$property->name."</th>";
		 $lista[$j]=$property->name;
		 $j=$j+1;
		}

		echo"</tr>";

		 $i = 1;
		 $titlerows=mysqli_num_fields($result);
		while($row = mysqli_fetch_array($result))

		  {
		  echo "<tr>";
		  
		  $k = 0;
		  While($k<$titlerows)
		  {
			echo "<td>". $row[$lista[$k]] ."</td>";
			$k=$k+1;
		  }

		  echo "</tr>";
		  $i = $i +1;
		  }
		  

		echo "</table>";
		


		mysqli_close($con);

	  }
	  if(!isset($_POST['front']) and !isset($_POST['behind']))
	  {
		$result = mysqli_query($con,"SELECT * FROM $selected WHERE `$column` LIKE '%$var%';");

		$lista = array();
		echo "<table border='1' id='tablica'>";


		echo "<tr style= 'background-color:#d2d2d2'>";


		$j = 0;
		while ($property = mysqli_fetch_field($result)) {

		 echo"<th>".$property->name."</th>";
		 $lista[$j]=$property->name;
		 $j=$j+1;
		}

		echo"</tr>";

		 $i = 1;
		 $titlerows=mysqli_num_fields($result);
		while($row = mysqli_fetch_array($result))

		  {
		  echo "<tr>";
		  
		  $k = 0;
		  While($k<$titlerows)
		  {
			echo "<td>". $row[$lista[$k]] ."</td>";
			$k=$k+1;
		  }

		  echo "</tr>";
		  $i = $i +1;
		  }
		  

		echo "</table>";
		


		mysqli_close($con);
	  }
	 }
}
 if($var == '' and $column !='')
 {
    $lista = array();
	echo "<table border='1' id='tablica'>";


	echo "<tr style= 'background-color:#d2d2d2'>";


	$j = 0;
	while ($property = mysqli_fetch_field($result)) {

	 echo"<th>".$property->name."</th>";
	 $lista[$j]=$property->name;
	 $j=$j+1;
	}

	echo"</tr>";

	 $i = 1;
	 $titlerows=mysqli_num_fields($result);
	while($row = mysqli_fetch_array($result))

	  {
	  echo "<tr>";
	  
	  $k = 0;
	  While($k<$titlerows)
	  {
		echo "<td>". $row[$lista[$k]] ."</td>";
		$k=$k+1;
	  }

	  echo "</tr>";
	  $i = $i +1;
	  }
	  

	echo "</table>";
    


	mysqli_close($con);
 }
 
}
else
{

	$result = mysqli_query($con,'SELECT * FROM pracownicy;');

	$lista = array();
	echo "<table border='1' id='tablica'>";


	echo "<tr style= 'background-color:#d2d2d2'>";


	$j = 0;
	while ($property = mysqli_fetch_field($result)) {

	 echo"<th>".$property->name."</th>";
	 $lista[$j]=$property->name;
	 $j=$j+1;
	}

	echo"</tr>";

	 $i = 1;
	 $titlerows=mysqli_num_fields($result);
	while($row = mysqli_fetch_array($result))

	  {
	  echo "<tr>";
	  
	  $k = 0;
	  While($k<$titlerows)
	  {
		echo "<td>". $row[$lista[$k]] ."</td>";
		$k=$k+1;
	  }

	  echo "</tr>";
	  $i = $i +1;
	  }
	  

	echo "</table>";
    


	mysqli_close($con);
}

?>
<br>
<form action="" method = "POST">
<table id="tablica2">
   <tr style="text-align: center;">
   <td colspan="7" style='height:80px'><H1>Panel do przeglądania tabeli</H1></td>
   </tr>
   <tr style= 'background-color:#d2d2d2' >
   <th>Tablica</th>
   <th>Nazwa kolumny </th>
   <th>Szukana Wartość </th>
   <th>Początek Wartości </th>
   <th>Koniec Wartości </th>
   
   </tr>
   <tr>
   <td><select type="list" name="tab">
		<option value="pracownicy">pracownicy</option>
		<option value="fakturyvat">fakturyvat</option>
		<option value="delegacjedb">delegacjedb</option>
		<option value="kontrahenci">kontrahenci</option></td>
   <td><input type="textbox" name="column" value=""></td>
   <td><input type="textbox" name="var" value=""></td>
   <td><input type='checkbox' name="front" id='przod' onclick='document.getElementById("koniec").checked = false'></td>
   <td><input type='checkbox' name="behind" id='koniec' onclick='document.getElementById("przod").checked = false'></td>
   
   </tr>
   <tr>
   <td colspan="7" style='height:80px'>
   <br>
   <input type = "Submit" name="pokaz" Value = "Wyświetl tabelę" />

   <br>
   </tr>
</table>

</form>

</center>

<script type="text/javascript" >
window.onload = pageLoaded;
 
function pageLoaded() {
  const input_colors_picker = document.querySelectorAll('input[type="color"]');
 
  input_colors_picker.forEach((input_color) => {
    input_color.addEventListener('input', setRowBackgroundColor);
  });
 
  input_colors_picker[0].dispatchEvent(new Event('input', null));

  input_colors_picker[1].dispatchEvent(new Event('input', null));
}

function setRowBackgroundColor(e) {
  const type_row = (e.target.id === 'color_even') ? 'even' : 'odd';
  const tr_rows = document.querySelectorAll(`#tablica tr:nth-child(${type_row})`);
  tr_rows.forEach((tr_row) => {
    tr_row.style.backgroundColor = e.target.value;
  });   
}
</script>
</body>
</html>
