<meta http-equiv="content-type" content="text/html; charset=utf-8">
<body bgcolor="litegreen">
<body>
<br><br>
<center>
<H1>Tabela Delegacji<H1>
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

</style>	
<?php

$con = mysqli_connect("localhost","root","serwer12345*","firma");

if (!$con)

  {

  die('Could not connect: ' . mysqli_error());

  }
 $sq = mysqli_connect("localhost", "root","serwer12345*","firma");
 $result = mysqli_query($con,"SELECT * FROM delegacjedb;");

 

echo "<table border='1'>

<tr style= 'background-color:#d2d2d2'>

<th>Lp.</th>

<th>Imię i Nazwisko</th>

<th>Data od:</th>

<th>Data do:</th>

<th>Miejsce wyjazdu</th>

<th>Miejsce przyjazdu</th>

</tr>";

 $i = 1;

while($row = mysqli_fetch_array($result))

  {
  echo "<tr>";

  echo "<td>". $row['Lp.'] ."</td>";

  echo "<td>" . $row['Imie i Nazwisko'] . "</td>";

  echo "<td>" . $row['Data od:'] . "</td>";

  echo "<td>" . $row['Data do:'] . "</td>";
  
  echo "<td>" . $row['Miejsce wyjazdu:'] . "</td>";
  
  echo "<td>" . $row['Miejsce przyjazdu:'] . "</td>";

  echo "</tr>";
  $i = $i +1;
  }

echo "</table>";

 

mysqli_close($con);

?>


</center>
</body>
</html>
