<?php

	$url = 'http://localhost:8088/api/categorias';



$response = file_get_contents($url);
	
// Decode the response
$DataCategoria = json_decode($response, TRUE);

$totalReg =  count($DataCategoria);

// Print the date from the response

?>




<html>
    <head>
        <title>
            DIgital Food - Catalogo de Productos
        </title>

        <meta name="description" content="least.js 2 - Random and Responsive HiDPI jQuery Gallery based on HTML5 and CSS3">
        <meta charset="utf-8" />
        
        <!-- Responsive viewport for smartphone devices -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- least.js 2 CSS file -->
        <link href="css/style2.css" rel="stylesheet" />
		<link href="css/style5.css" rel="stylesheet" />
    </head>
    <body>
	<center>
	<?php

include("cabecera_2.php");
?>

        <!-- Least Gallery -->
        <section id="least" style="margin-top:10px;">
            
            <!-- Least Gallery: Fullscreen Preview -->
            <div class="least-preview"></div>
            
            <!-- Least Gallery: Thumbnails -->
            <ul class="least-gallery">

                <!-- 1 || Element with data-caption ||-->
				<?php 
				
				   for ($index = 0; $index < $totalReg; $index++) {   ?>
                <li>
                    <a href="productos.php?cod_categ=<?=$DataCategoria[$index]['codCategoria']?>" title="<?=$DataCategoria[$index]['nomCategoria']?>" data-subtitle="View Picture" data-caption="<strong>Bold text</strong> normal caption text">
                        <img src="<?=$DataCategoria[$index]['foto']?>" alt="Alt Image Text" />
                    </a>
                </li>
                
				<?php 
				      
				     }
				?>
	




            </ul>

        </section>
        <!-- Least Gallery end -->

        <!-- jQuery library -->
        <script src="src/js/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- least.js library -->
        <script src="src/js/libs/least/least.min.js"></script>

        <script>

        
    </center>
    </body>
</html>










