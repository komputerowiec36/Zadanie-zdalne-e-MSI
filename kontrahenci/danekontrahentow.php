<head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body bgcolor="#ccff00">
<br><br>
<center>
<style>

#tablica

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
width: 700px; 

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
<H1>Dane Kontrahentów<H1>
<?php
	$con = mysqli_connect("localhost","root","serwer12345*","firma");

	if (!$con)

	  {

	  die('Could not connect: ' . mysqli_error());

	  }
	 $result = mysqli_query($con,"SELECT * FROM kontrahenci Where NAZWA!='Usunięty';");

	 

	echo "<table id='tablica' border='1'>

	<tr style= 'background-color:#d2d2d2'>

	<th>NIP</th>

	<th>REGON</th>

	<th>NAZWA</th>

	<th>CZY PŁATNIK VAT?</th>

	<th>ULICA</th>

	<th>Numer Domu</th>

	<th>Numer Mieszkania</th>

	</tr>";

	 $i = 1;

	while($row = mysqli_fetch_array($result))

	  {
	  echo "<tr>";

	  echo "<td>". $row['NIP'] ."</td>";

	  echo "<td>" . $row['REGON'] . "</td>";

	  echo "<td>" . $row['NAZWA'] . "</td>";

	  echo "<td>" . $row['CZYPŁATNIKVAT'] . "</td>";
	  
	  echo "<td>" . $row['ULICA'] . "</td>";
	  
	  echo "<td>" . $row['NUMERDOMU'] . "</td>";
	  
	  echo "<td>" . $row['NUMERMIESZKANIA'] . "</td>";

	  echo "</tr>";
	  $i = $i +1;
	  }

	echo "</table>";

	 



?>
<br>
<br>
   <form action="" method = "POST">
<table id="tablica2">
   <tr style="text-align: center;">
   <td colspan="7" style='height:80px'><H1>Panel do edycji danych w tabeli</H1></td>
   </tr>
   <tr style= 'background-color:#d2d2d2' >
   <th>NIP </th>
   <th>REGON </th>
   <th>Nazwa </th>
   <th>Czy płatnik vat? </th>
   <th>Ulica </th>
   <th>Numer Domu </th>
   <th>Numer Mieszkania </th> 
   </tr>
   <tr>
   <td><input type="textbox" name="NIP" value=""></td> 
   <td><input type="textbox" name="REGON" value=""></td>
   <td><input type="textbox" name="Nazwa" value=""></td>
   <td><input type="checkbox" name="Czyplatnikvat" value=""></td>
   <td><input type="textbox" name="Ulica" value=""></td>
   <td><input type="textbox" name="Numerdomu" value=""></td>
   <td><input type="textbox" name="Numermieszkania" value=""></td>
   </tr>
   <tr>
   <td colspan="7" style='height:80px'>
   <br>
   <input type = "Submit" name="dodaj" Value = "Dodawanie kontrahenta" />
   <input type = "Submit" name="edytuj" Value = "Edycja kontrahenta" />
   <input type = "Submit" name="usun" Value = "usuwanie kontrahenta" /></td>
   <br>
   </tr>
</table>

   </form>
</center>
<?php

if (isset($_POST['dodaj']))
{
 $NIP = $_POST['NIP'];
 $REGON = $_POST['REGON'];
 $Nazwa = $_POST['Nazwa'];
 $Czyplatnikvat=isset($_POST['Czyplatnikvat']);
 $Ulica = $_POST['Ulica'];
 $Numerdomu = $_POST['Numerdomu'];
 $Numermieszkania = $_POST['Numermieszkania'];
 if ($NIP != "" and $REGON != "" and $Nazwa != "" and $Ulica != "" and $Numerdomu != "" and $Numermieszkania != "")
 {
   $sq = mysqli_connect("localhost","root","serwer12345*","firma");

   if (!$sq)

   {

	die('Could not connect: ' . mysqli_error());

   }
   if ($Czyplatnikvat == 1)
   {
     mysqli_query($sq,"Insert into kontrahenci SET NIP='$NIP', REGON='$REGON', NAZWA='$Nazwa', CZYPŁATNIKVAT='Tak', ULICA='$Ulica', NUMERDOMU='$Numerdomu', NUMERMIESZKANIA='$Numermieszkania';");
   }
   if ($Czyplatnikvat != 1)
   {
	 mysqli_query($sq,"Insert into kontrahenci SET NIP='$NIP', REGON='$REGON', NAZWA='$Nazwa', CZYPŁATNIKVAT='Nie', ULICA='$Ulica', NUMERDOMU='$Numerdomu', NUMERMIESZKANIA='$Numermieszkania';");
   }
 }
 mysqli_close($sq);
 header("Refresh:0");
}
if (isset($_POST['edytuj']))
{
 $NIP = $_POST['NIP'];
 $REGON = $_POST['REGON'];
 $Nazwa = $_POST['Nazwa'];
 $Czyplatnikvat=isset($_POST['Czyplatnikvat']);
 $Ulica = $_POST['Ulica'];
 $Numerdomu = $_POST['Numerdomu'];
 $Numermieszkania = $_POST['Numermieszkania'];
 if ($NIP != "" and $REGON != "" and $Nazwa != "" and $Ulica != "" and $Numerdomu != "" and $Numermieszkania != "")
 {
   $sq = mysqli_connect("localhost","root","serwer12345*","firma");

   if (!$sq)

   {

	die('Could not connect: ' . mysqli_error());

   }
   if ($Czyplatnikvat == 1)
   {
     mysqli_query($sq,"Update kontrahenci SET NIP='$NIP', REGON='$REGON', NAZWA='$Nazwa', CZYPŁATNIKVAT='Tak', ULICA='$Ulica', NUMERDOMU='$Numerdomu', NUMERMIESZKANIA='$Numermieszkania' Where NIP='$NIP' || REGON='$REGON' || NAZWA='$Nazwa'|| CZYPŁATNIKVAT='Tak' && ULICA='$Ulica' || NUMERDOMU='$Numerdomu' || NUMERMIESZKANIA='$Numermieszkania' ;");
   }
   if ($Czyplatnikvat != 1)
   {
	 mysqli_query($sq,"Update kontrahenci SET NIP='$NIP', REGON='$REGON', NAZWA='$Nazwa', CZYPŁATNIKVAT='Nie', ULICA='$Ulica', NUMERDOMU='$Numerdomu', NUMERMIESZKANIA='$Numermieszkania' Where NIP='$NIP' || REGON='$REGON' || NAZWA='$Nazwa'|| CZYPŁATNIKVAT='Nie' || ULICA='$Ulica' || NUMERDOMU='$Numerdomu' || NUMERMIESZKANIA='$Numermieszkania' ;");
   }
 }
 mysqli_close($sq);
 header("Refresh:0");
}
if (isset($_POST['usun']))
{
 $NIP = $_POST['NIP'];
 $REGON = $_POST['REGON'];
 $Nazwa = $_POST['Nazwa'];
 $Czyplatnikvat=isset($_POST['Czyplatnikvat']);
 $Ulica = $_POST['Ulica'];
 $Numerdomu = $_POST['Numerdomu'];
 $Numermieszkania = $_POST['Numermieszkania'];
 if ($NIP != "" and $REGON != "" and $Nazwa != "" and $Ulica != "" and $Numerdomu != "" and $Numermieszkania != "")
 {
   $sq = mysqli_connect("localhost","root","serwer12345*","firma");

   if (!$sq)

   {

	die('Could not connect: ' . mysqli_error());

   }
   if ($Czyplatnikvat == 1)
   {
     mysqli_query($sq,"Update kontrahenci SET  NAZWA='Usunięty' Where NIP='$NIP' && REGON='$REGON' && CZYPŁATNIKVAT='Tak' && ULICA='$Ulica' && NUMERDOMU='$Numerdomu' && NUMERMIESZKANIA='$Numermieszkania' ;");
   }
   if ($Czyplatnikvat != 1)
   {
	 mysqli_query($sq,"Update kontrahenci SET NAZWA='Usunięty' Where NIP='$NIP' && REGON='$REGON' && CZYPŁATNIKVAT='Nie' && ULICA='$Ulica' && NUMERDOMU='$Numerdomu' && NUMERMIESZKANIA='$Numermieszkania' ;");
   }
 }
  mysqli_close($sq);
  header("Refresh:0");
}
 ?>
</body>
</html>
