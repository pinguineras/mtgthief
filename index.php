<?php 
/////////////////////////////////////////////
/////////////////////////////////////////////
/////// Magic The Gathering Thief ///////////
/////////////////////////////////////////////
/////////////////////////////////////////////

// Just Edit the document index.php in the function STOLE the edition you want Stole.
// Here some SLUG'S you can enter: "Magic+2013", "Magic+2012", "Theros", "Invasion" ....


// Fork me in Github : https://github.com/pinguineras

// http://www.nopasse.com.br - Brazilian Magic Deck Builder with CSS and JS.
require_once('inc/Thief.Class.php');

$Thief = new mtgcardThief();

 ?>

 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Magic Thief</title>
 </head>
 <body>
 	<div id="geral">
 		<h1>MTG Card List by Edition</h1>

 		<?php 

 			$Cards = $Thief->Stole();

 			var_dump($Cards);



 		 ?>

 	</div>
 	<div align="center">
 		<p><a href="https://github.com/pinguineras">https://github.com/pinguineras</a></p>
 	</div>
 </body>
 </html>