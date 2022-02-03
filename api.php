<?php
$con = mysqli_connect("localhost","root","test1234","meteo");
$response = array();
$response_last = array();
$response_capteur_1 = array();
$response_capteur_2 = array();
$response_all = array();
//$compteur=0;
//$sql_tab = array();
$data_result = array();
if($con){
	$sql = "select * from releves ORDER BY id_releve DESC";
	$sql_last = "select * from releves ORDER BY id_releve DESC limit 1";
	$sql_last_5 = "select * from releves ORDER BY id_releve DESC limit 5";
	$sql_id_capteur = "select distinct id_capteur from capteurs";
	$sql_capteur_1 = "select id_releve, id_capteur, temperature, humidite, heure from releves where id_capteur=1";
	$sql_capteur_2 = "select id_releve, id_capteur, temperature, humidite, heure from releves where id_capteur=2";
	$sql_all = "select id_releve, id_capteur, temperature, humidite, heure from releves";
	/*while($compteur<24)
	{
		$sql_tab[$compteur]="select * from releves where TIME_FORMAT(heure, '%H')=".$compteur;
		$compteur++;
		$data_result[$compteur]=mysqli_query($con,$sql_tab[$compteur]);
		echo $data_result[$compteur];
	}*/
	$result = mysqli_query($con,$sql);
	$result_last = mysqli_query($con,$sql_last);
	$result_last_5 = mysqli_query($con,$sql_last_5);
	$result_id_capteur = mysqli_query($con,$sql_id_capteur);
	$result_capteur_1 = mysqli_query($con,$sql_capteur_1);
	$result_capteur_2 = mysqli_query($con,$sql_capteur_2);
	$result_all = mysqli_query($con,$sql_all);
	if($result){
		header("Content-Type: JSON");
		$i=0;
		while($row = mysqli_fetch_assoc($result)){
			$response[$i]['id_releve'] = $row ['id_releve'];
			$response[$i]['id_capteur'] = $row ['id_capteur'];
			$response[$i]['temperature'] = $row ['temperature'];
			$response[$i]['humidite'] = $row ['humidite'];
			$response[$i]['heure'] = $row ['heure'];
			$i++;
		}
	}
	if($result_last){
		header("Content-Type: JSON");
		while($row = mysqli_fetch_assoc($result_last)){
			$response_last[0]['id_releve'] = $row ['id_releve'];
			$response_last[0]['id_capteur'] = $row ['id_capteur'];
			$response_last[0]['temperature'] = $row ['temperature'];
			$response_last[0]['humidite'] = $row ['humidite'];
			$response_last[0]['heure'] = $row ['heure'];
		}
	}
	if($result_last_5){
		header("Content-Type: JSON");
		$i=0;
		while($row = mysqli_fetch_assoc($result_last_5)){
			$response_last_5[$i]['id_releve'] = $row ['id_releve'];
			$response_last_5[$i]['id_capteur'] = $row ['id_capteur'];
			$response_last_5[$i]['temperature'] = $row ['temperature'];
			$response_last_5[$i]['humidite'] = $row ['humidite'];
			$response_last_5[$i]['heure'] = $row ['heure'];
			$i++;
		}
	}
	if($result_id_capteur){
		header("Content-Type: JSON");
		$i_capteur=0;
		while($row = mysqli_fetch_assoc($result_id_capteur)){
			$response_id_capteur[$i_capteur]['id_capteur'] = $row ['id_capteur'];
			$i_capteur++;
		}
		/*
		while($compteur<$i_capteur)
		{
			$sql_tab[$compteur]=$compteur+1;
			$sql_capteur = "select id_releve, id_capteur, temperature, humidite, heure from releves where id_capteur=".$sql_tab[$compteur];
			$compteur=0;
			$result_capteur=mysqli_query($con,$sql_capteur);
				if($result_capteur){
					header("Content-Type: JSON");
					$i_compteur=0;
					while($row = mysqli_fetch_assoc($result_capteur)){
						${"response_capteur_" . $sql_tab[0]}['id_releve'] = $row ['id_releve'];
						${"response_capteur_" . $sql_tab[0]}['id_capteur'] = $row ['id_capteur'];
						${"response_capteur_" . $sql_tab[0]}['temperature'] = $row ['temperature'];
						${"response_capteur_" . $sql_tab[0]}['humidite'] = $row ['humidite'];
						${"response_capteur_" . $sql_tab[0]}['heure'] = $row ['heure'];
						$i_compteur++;
						echo json_encode($response_capteur_1, JSON_PRETTY_PRINT);
						echo 'test';
					}b
				$compteur++;
				}
		}
	}*/
	if($result_capteur_1){
		header("Content-Type: JSON");
		$i_compteur_1=0;
		while($row = mysqli_fetch_assoc($result_capteur_1)){
			$response_capteur_1[$i_compteur_1]['id_releve'] = $row ['id_releve'];
			$response_capteur_1[$i_compteur_1]['id_capteur'] = $row ['id_capteur'];
			$response_capteur_1[$i_compteur_1]['temperature'] = $row ['temperature'];
			$response_capteur_1[$i_compteur_1]['humidite'] = $row ['humidite'];
			$response_capteur_1[$i_compteur_1]['heure'] = $row ['heure'];
			$i_compteur_1++;
		}
	}
	if($result_capteur_2){
		header("Content-Type: JSON");
		$i_compteur_2=0;
		while($row = mysqli_fetch_assoc($result_capteur_2)){
			$response_capteur_2[$i_compteur_2]['id_releve'] = $row ['id_releve'];
			$response_capteur_2[$i_compteur_2]['id_capteur'] = $row ['id_capteur'];
			$response_capteur_2[$i_compteur_2]['temperature'] = $row ['temperature'];
			$response_capteur_2[$i_compteur_2]['humidite'] = $row ['humidite'];
			$response_capteur_2[$i_compteur_2]['heure'] = $row ['heure'];
			$i_compteur_2++;
		}
	}
	if($result_all){
		header("Content-Type: JSON");
		$i_all=0;
		while($row = mysqli_fetch_assoc($result_all)){
			$response_all[$i_all]['id_releve'] = $row ['id_releve'];
			$response_all[$i_all]['id_capteur'] = $row ['id_capteur'];
			$response_all[$i_all]['temperature'] = $row ['temperature'];
			$response_all[$i_all]['humidite'] = $row ['humidite'];
			$response_all[$i_all]['heure'] = $row ['heure'];
			$i_all++;
		}
	}
}
else{
	echo "DB connection failed";
}
}
?>