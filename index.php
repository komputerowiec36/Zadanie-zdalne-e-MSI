
<html>
   <head>
       <title>strona główna</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=auto, initial-scale=1">
        <link href="index.css" rel="stylesheet">
		
   </head>
		<body bgcolor="yellow">
		<div id="temat">
		<center>
		Zadanie zdalne e-MSI
		</center>
		 </div>
			<div id="lewy" >
			  <center>
			  <br><br>
			  <ol style='padding-left: 60px', id="menu">
			   <a href="?kontrolki"><li >Różne Kontrolki HTML</li></a><br>
			   <br>
			   <a href="?pracownicy"><li >Tabela Pracowników</li></a><br>
			   <br>
			   <a href="?faktury"><li >Tabela Faktur VAT</li></a><br>
			   <br>
			   <a href="?delegacje"><li >Tabela Delegacji BD</li></a><br>
			   <br>
			   <a href="?kontrahenci"><li >Dane Kontrahentów</li></a><br>
			  <br><br>
			  </ol>
			  </center>
			</div>
		  <div id="prawy" >   
			<?php 
  if (array_keys($_GET)!= null)
{
	$a = array_keys($_GET);
	ob_start();
	switch($a[0])
	{
	  case 'kontrolki':
		include 'kontrolki/kontrolkihtml.html';
	  break;

	  case 'pracownicy':
		include 'pracownicy/tabelapracownikow.html';
	  break;

	  case 'faktury':
		include 'faktury/tabelafaktur.html';
	  break;

	  case 'delegacje':
		include 'delegacje/tabeladelegacji.php';
	  break;
	  
	  case 'kontrahenci':
		include 'kontrahenci/danekontrahentow.php';
	  break;

	}
	$content = ob_get_clean();
	echo $content;
}
 ?>
		  </div>
</html>

