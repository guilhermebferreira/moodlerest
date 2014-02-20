<?php

$token = 'ad874e6d9f50389e180f49f4d926d50e';
$domainname = 'http://localhost/moodle';
$functionname = 'core_course_get_courses';
$restformat = 'json';

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
