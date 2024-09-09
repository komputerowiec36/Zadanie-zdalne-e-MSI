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
 $result = mysqli_query($con,"SELECT * FROM delegacjedb;");

echo "<table border='1' id='tablica'>




<tr style= 'background-color:#d2d2d2'>

<th rowspan='7'><button type='sumbit'  onclick='up()'><img src='delegacje/arrowup.png' width='40' height='170'></button><br>
<button type='sumbit' style='top=23px'onclick='down()'><img src='delegacje/arrowdown.png' width='40' height='170'></button></th>

<th></th>

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
  
  echo "<td><input type='checkbox' id='check".$i."'></td>";

  echo "<td>". $row['Lp.'] ."</td>";

  echo "<td><div id='in".$i."' >". $row['Imie i Nazwisko'] ."</div></td>";

  echo "<td><div id='datod".$i."' >" . $row['Data od:'] . "</div></td>";

  echo "<td><div id='datdo".$i."' >" . $row['Data do:'] . "</div></td>";
  
  echo "<td><div id='miejscew".$i."' >" . $row['Miejsce wyjazdu:'] . "</div></td>";
  
  echo "<td><div id='miejscep".$i."' >" . $row['Miejsce przyjazdu:'] . "</div></td>";

  echo "</tr>";
  $i = $i +1;
  }

echo "</table>";

 

mysqli_close($con);

?>

</center>

<script type="text/javascript" >
function up(){
	var len = document.getElementsByTagName('tr').length - 1;
    alert(len);
	var d = 0;
	const ile = [];
    for(let i=1;i<=len;i++){
	   var x = document.getElementById("check"+i).checked;
	   if (x == true)
	   {
		alert(d);
		ile[d] = i;
		d=d+1;
	   }
	   
	   if(i == 6 && ile.length == 1)
		{
		  alert(ile[0]);
		  var row2 = ile[0] - 1;
		  if (row2 == 0)
		  {
			  alert('Początek Tabeli');
		  } 
		  if (row2 > 0)
		  {
			  const row = [];
			  row[0] = document.getElementById("in"+ile[0]).innerHTML;
			  row[1] = document.getElementById("datod"+ile[0]).innerHTML;
			  row[2] = document.getElementById("datdo"+ile[0]).innerHTML;
			  row[3] = document.getElementById("miejscew"+ile[0]).innerHTML;
			  row[4] = document.getElementById("miejscep"+ile[0]).innerHTML;
			  row[5] = document.getElementById("in"+row2).innerHTML;
			  row[6] = document.getElementById("datod"+row2).innerHTML;
			  row[7] = document.getElementById("datdo"+row2).innerHTML;
			  row[8] = document.getElementById("miejscew"+row2).innerHTML;
			  row[9] = document.getElementById("miejscep"+row2).innerHTML;
			  document.getElementById("in"+ile[0]).innerHTML = row[5];
			  document.getElementById("datod"+ile[0]).innerHTML = row[6];
			  document.getElementById("datdo"+ile[0]).innerHTML = row[7];
			  document.getElementById("miejscew"+ile[0]).innerHTML = row[8];
			  document.getElementById("miejscep"+ile[0]).innerHTML = row[9];
			  document.getElementById("in"+row2).innerHTML = row[0];
			  document.getElementById("datod"+row2).innerHTML = row[1];
			  document.getElementById("datdo"+row2).innerHTML = row[2];
			  document.getElementById("miejscew"+row2).innerHTML = row[3];
			  document.getElementById("miejscep"+row2).innerHTML = row[4];
			  document.getElementById("check"+ile[0]).checked = false;
			  document.getElementById("check"+row2).checked = true;
		  }
		}
	   if(i == 6 && ile.length == 2)
		{
		  var row3 = ile[1] - ile[0];
		  if (row3 > 1)
		  {
		    alert(ile[0]);
		    const row = [];
		    row[0] = document.getElementById("in"+ile[0]).innerHTML;
			row[1] = document.getElementById("datod"+ile[0]).innerHTML;
			row[2] = document.getElementById("datdo"+ile[0]).innerHTML;
			row[3] = document.getElementById("miejscew"+ile[0]).innerHTML;
			row[4] = document.getElementById("miejscep"+ile[0]).innerHTML;
			row[5] = document.getElementById("in"+ile[1]).innerHTML;
			row[6] = document.getElementById("datod"+ile[1]).innerHTML;
			row[7] = document.getElementById("datdo"+ile[1]).innerHTML;
			row[8] = document.getElementById("miejscew"+ile[1]).innerHTML;
			row[9] = document.getElementById("miejscep"+ile[1]).innerHTML;
			document.getElementById("in"+ile[0]).innerHTML = row[5];
			document.getElementById("datod"+ile[0]).innerHTML = row[6];
			document.getElementById("datdo"+ile[0]).innerHTML = row[7];
			document.getElementById("miejscew"+ile[0]).innerHTML = row[8];
			document.getElementById("miejscep"+ile[0]).innerHTML = row[9];
			document.getElementById("in"+ile[1]).innerHTML = row[0];
			document.getElementById("datod"+ile[1]).innerHTML = row[1];
			document.getElementById("datdo"+ile[1]).innerHTML = row[2];
			document.getElementById("miejscew"+ile[1]).innerHTML = row[3];
			document.getElementById("miejscep"+ile[1]).innerHTML = row[4];
			document.getElementById("check"+ile[0]).checked = false;
			document.getElementById("check"+ile[1]).checked = false;
		  }
		  if (row3 == 1)
		  {
			alert('Wybierz drugi z nich i naciśnij strzałkę w górę')
			document.getElementById("check"+ile[0]).checked = false;
			document.getElementById("check"+ile[1]).checked = false;
		  }
		}
		


	}
}
function down(){
	var len = document.getElementsByTagName('tr').length - 1;
    alert(len);
	var d = 0;
	const ile = [];
    for(let i=1;i<=len;i++){
	   var x = document.getElementById("check"+i).checked;
	   if (x == true)
	   {
		alert(d);
		ile[d] = i;
		d=d+1;
	   }
	   
	   if(i == 6 && ile.length == 1)
		{
		  alert(ile[0]);
		  var row2 = ile[0] + 1;
		  if (row2 == 7)
		  {
			  alert('Koniec Tabeli');
		  } 
		  if (row2 < 7)
		  {
			  const row = [];
			  row[0] = document.getElementById("in"+ile[0]).innerHTML;
			  row[1] = document.getElementById("datod"+ile[0]).innerHTML;
			  row[2] = document.getElementById("datdo"+ile[0]).innerHTML;
			  row[3] = document.getElementById("miejscew"+ile[0]).innerHTML;
			  row[4] = document.getElementById("miejscep"+ile[0]).innerHTML;
			  row[5] = document.getElementById("in"+row2).innerHTML;
			  row[6] = document.getElementById("datod"+row2).innerHTML;
			  row[7] = document.getElementById("datdo"+row2).innerHTML;
			  row[8] = document.getElementById("miejscew"+row2).innerHTML;
			  row[9] = document.getElementById("miejscep"+row2).innerHTML;
			  document.getElementById("in"+ile[0]).innerHTML = row[5];
			  document.getElementById("datod"+ile[0]).innerHTML = row[6];
			  document.getElementById("datdo"+ile[0]).innerHTML = row[7];
			  document.getElementById("miejscew"+ile[0]).innerHTML = row[8];
			  document.getElementById("miejscep"+ile[0]).innerHTML = row[9];
			  document.getElementById("in"+row2).innerHTML = row[0];
			  document.getElementById("datod"+row2).innerHTML = row[1];
			  document.getElementById("datdo"+row2).innerHTML = row[2];
			  document.getElementById("miejscew"+row2).innerHTML = row[3];
			  document.getElementById("miejscep"+row2).innerHTML = row[4];
			  document.getElementById("check"+ile[0]).checked = false;
			  document.getElementById("check"+row2).checked = true;
		  }
		}
	   if(i == 6 && ile.length == 2)
		{
		  var row3 = ile[1] - ile[0];
		  if (row3 > 1)
		  {
			  const row = [];
		      row[0] = document.getElementById("in"+ile[0]).innerHTML;
			  row[1] = document.getElementById("datod"+ile[0]).innerHTML;
			  row[2] = document.getElementById("datdo"+ile[0]).innerHTML;
			  row[3] = document.getElementById("miejscew"+ile[0]).innerHTML;
			  row[4] = document.getElementById("miejscep"+ile[0]).innerHTML;
			  row[5] = document.getElementById("in"+ile[1]).innerHTML;
			  row[6] = document.getElementById("datod"+ile[1]).innerHTML;
			  row[7] = document.getElementById("datdo"+ile[1]).innerHTML;
			  row[8] = document.getElementById("miejscew"+ile[1]).innerHTML;
			  row[9] = document.getElementById("miejscep"+ile[1]).innerHTML;
			  document.getElementById("in"+ile[1]).innerHTML = row[0];
			  document.getElementById("datod"+ile[1]).innerHTML = row[1];
			  document.getElementById("datdo"+ile[1]).innerHTML = row[2];
			  document.getElementById("miejscew"+ile[1]).innerHTML = row[3];
			  document.getElementById("miejscep"+ile[1]).innerHTML = row[4];
			  document.getElementById("in"+ile[0]).innerHTML = row[5];
			  document.getElementById("datod"+ile[0]).innerHTML = row[6];
			  document.getElementById("datdo"+ile[0]).innerHTML = row[7];
			  document.getElementById("miejscew"+ile[0]).innerHTML = row[8];
			  document.getElementById("miejscep"+ile[0]).innerHTML = row[9];
			  document.getElementById("check"+ile[1]).checked = false;
			  document.getElementById("check"+ile[0]).checked = false;
		  }
		   if (row3 == 1)
		  {
			alert('Wybierz pierwszy z nich i naciśnij strzałkę w dół')
			document.getElementById("check"+ile[1]).checked = false;
			document.getElementById("check"+ile[0]).checked = false;
		  }
		}
		


	}
}
</script>
</body>
</html>
