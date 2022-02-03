<html>
<head>
	<style>
    	h1 
    	{ 
    		color: #054B61; 
    		text-align: center;
    	}
    	p 
    	{
    		color: #054B61;
    	}
    	.flex
    	{
    		flex-wrap: wrap;
    	}
    	.flex div
    	{
    		margin: 10px;
    	}
    	.picto
    	{
    		display: block;
    		height: 35px;
    		width: 35px;
    		margin-left: auto;
    		margin-right: auto;
		}
		.background
		{
			background-color: #ecfafe;
		}	
  	</style>
  	<script type="text/javascript">
	function dropdownMenu(value){
    console.log(value);
    document.getElementById("Capteur1").style.display = "none";
    document.getElementById("Capteur2").style.display = "none";
    document.getElementById("last_5").style.display = "none";
    document.getElementById("all").style.display = "none";
    document.getElementById(value).style.display = '';
    }</script>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php 
include('api.php');
date_default_timezone_set('Europe/Amsterdam');
$heure = date("H:i\ d-m-Y",time());

function pictogram($temperature){
	if ($temperature<5) {
		echo '<img class="picto" src="neige.png">';
	}
	else if ($temperature<10) {
		echo '<img class="picto" src="nuage.png">';
	}
	else if ($temperature<15) {
		echo '<img class="picto" src="meh.png">';
	}
	else{
		echo '<img class="picto" src="soleil.png">';
	}
}
?>
<body class="back">
	<h1>CUBE 2 : Station météo</h1>
	<p>Il est <?php echo $heure ?>, le dernier relevé indique :
		<div class="flex">
		<div>
			<?php pictogram($response_last[0]['temperature']);?><br>
			Capteur numero : <?php echo $response_last[0]['id_capteur'];?><br>
			Temperature : <?php echo $response_last[0]['temperature'];?><br>
			Humidite : <?php echo $response_last[0]['humidite'];?>%<br>
			Heure : <?php echo $response_last[0]['heure'];?><br>
		</div>
	</div>
	</p>
<div>
	<p>Voir
	<select onChange="dropdownMenu(this.value)">
		<option>-Choisir une option-</option>
		<option value="last_5">les 5 derniers relevés</option>
		<?php 
		
				$compteur_capteur=0;
				while($compteur_capteur<$i_capteur)
				{
					echo '<option value="Capteur'.$response_id_capteur[$compteur_capteur]['id_capteur'].'"">les relevés du Capteur '.$response_id_capteur[$compteur_capteur]['id_capteur'].'</option>';	
					$compteur_capteur++;
				}

		?>
		<option value="all">tous les relevés</option>
	</select>
	<?php 

				echo '<div class="flex" id="last_5" style="display : none;">';
		
				$compteur=0;
				while($compteur<$i)
				{
					echo '<div>';
					pictogram($response_last_5[$compteur]['temperature']);
					echo '<br>Capteur numero : '.$response_last_5[$compteur]['id_capteur'].'<br>';
					echo '<img src="thermometer1.png"> Temperature : '.$response_last_5[$compteur]['temperature'].'<br>';
					echo '<img src="goute.jpeg"> Humidite : '.$response_last_5[$compteur]['humidite'].'% <br>';
					echo '<img src="horloge.png"> Heure : '.$response_last_5[$compteur]['heure'].'<br>';	
					$compteur++;

					echo '</div>';
				}

				echo '</div>';

				echo '<div class="flex" id="Capteur1" style="display : none;">';
		
				$compteur=0;
				while($compteur<$i_compteur_1)
				{
					echo '<div>';
					pictogram($response_capteur_1[$compteur]['temperature']);
					echo '<br>Capteur numero : '.$response_capteur_1[$compteur]['id_capteur'].'<br>';
					echo '<img src="thermometer1.png"> Temperature : '.$response_capteur_1[$compteur]['temperature'].'<br>';
					echo '<img src="goute.jpeg"> Humidite : '.$response_capteur_1[$compteur]['humidite'].'% <br>';
					echo '<img src="horloge.png"> Heure : '.$response_capteur_1[$compteur]['heure'].'<br>';	
					$compteur++;

					echo '</div>';
				}

				echo '</div>';

				echo '<div class="flex" id="Capteur2" style="display : none;">';
		
				$compteur=0;
				while($compteur<$i_compteur_2)
				{
					echo '<div>';
					pictogram($response_capteur_2[$compteur]['temperature']);
					echo '<br>Capteur numero : '.$response_capteur_2[$compteur]['id_capteur'].'<br>';
					echo '<img src="thermometer1.png"> Temperature : '.$response_capteur_2[$compteur]['temperature'].'<br>';
					echo '<img src="goute.jpeg"> Humidite : '.$response_capteur_2[$compteur]['humidite'].'% <br>';
					echo '<img src="horloge.png"> Heure : '.$response_capteur_2[$compteur]['heure'].'<br>';	
					$compteur++;

					echo '</div>';
				}

				echo '</div>';

				echo '<div class="flex" id="all" style="display : none;">';
		
				$compteur=0;
				while($compteur<$i_all)
				{
					echo '<div>';
					pictogram($response_all[$compteur]['temperature']);
					echo '<br>Capteur numero : '.$response_all[$compteur]['id_capteur'].'<br>';
					echo '<img src="thermometer1.png"> Temperature : '.$response_all[$compteur]['temperature'].'<br>';
					echo '<img src="goute.jpeg"> Humidite : '.$response_all[$compteur]['humidite'].'% <br>';
					echo '<img src="horloge.png"> Heure : '.$response_all[$compteur]['heure'].'<br>';	
					$compteur++;

					echo '</div>';
				}

				echo '</div>';
			?>
</p>
</div>
	

</body>
</html>