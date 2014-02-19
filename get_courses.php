<?php

$token = 'ad874e6d9f50389e180f49f4d926d50e';
$domainname = 'http://localhost/moodle';
$functionname = 'core_course_get_courses';
$restformat = 'json';
/* --configurações servidor de teste 
$token = '3628ef85fb388f16a5c3757690f5d775'; //token configurado no admin do moodle
$domainname = 'http://inga.uft.edu.br/moodle'; //dominio onde se encontra o moodle
$functionname = 'core_course_get_courses'; //função que retorna a lista de cursos
$restformat = 'json';*/


$cursos = '{}';

	

		$serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname.'&moodlewsrestformat=' . $restformat;
		
		
		try {
			$cursos = file_get_contents($serverurl);
			
		} catch (Exception $e) {
			echo $e;
			
		}
		


		$rows = json_decode($cursos);

		echo "<pre>";
		print_r($rows);



?>
