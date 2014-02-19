
<?php
mb_internal_encoding("UTF-8");

// This file is NOT a part of Moodle - http://moodle.org/
//
// This client for Moodle 2 is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//

/**
 * REST client for Moodle 2
 * Return JSON or XML format
 *
 * @authorr Jerome Mouneyrac
 */

/// SETUP - NEED TO BE CHANGED
	$token = 'ad874e6d9f50389e180f49f4d926d50e';
	$domainname = 'http://localhost/moodle';
	$functionname = 'core_course_create_courses';
	$restformat = 'json';


	/*	fullname string   //full name
		shortname string   //course short name
		categoryid int   //category id
		summaryformat int  Padrão para "1" //summary format (1 = HTML, 0 = MOODLE, 2 = PLAIN or 4 = MARKDOWN)
		format string  Padrão para "weeks" //course format: weeks, topics, social, site,..
		showgrades int  Padrão para "1" //1 if grades are shown, otherwise 0
		newsitems int  Padrão para "5" //number of recent items appearing on the course page
		maxbytes int  Padrão para "0" //largest size of file that can be uploaded into the course
		showreports int  Padrão para "0" //are activity report shown (yes = 1, no =0)
		groupmode int  Padrão para "0" //no group, separate, visible
		groupmodeforce int  Padrão para "0" //1: yes, 0: no
		defaultgroupingid int  Padrão para "0" //default grouping id
		
	*/



	$course = new stdClass();

	$course->fullname = "Curso teste";	// string,    254, Obrigatorio,          Nome Completo do Curso
	$course->shortname = "TESTE";					// string,    100, Obrigatorio,          Nome Curto, evite usar espaço, substitua os espaços por traço baixo (underscore)
	$course->categoryid  = 1;					// int, 	   10, Obrigatorio, 		 Id da categoria
													// deve ser conhecido o id conforme já cadastrado no moodle 
	$course->summaryformat = 1;
	$course->showgrades = 1;
	$course->newsitems = 5;
	$course->maxbytes = 0;
	$course->showreports = 0;
	$course->groupmodeforce = 0;
	$course->defaultgroupingid = 0;
	//$course->idnumber  = "axo.44d.1x";				// string,    100, Opcional,             Id universal do curso
	$course->summary  = "Este curso foi criado para teste do Enrol/Matricula de usuário via novo WebService do Aula";
													// string,     1K, Obrigatorio, 			 Sumário
	$course->visible  = 1;						// int,         1, Obrigatorio,             1: Disponível para estudante, 0:Não disponível
	$course->groupmode  =  0;						// int,         1, Obrigatorio,             Padrão para "0" //no group, separate, visible
	$course->format  = "weeks";					// string,      1, Obrigatorio,				Padrão para "weeks" //Formato do curso: weeks, topics, social, site,..



	$courses = array( $course);
	$params = array('courses' => $courses);
	print_r($params );

	/// REST CALL
	header('Content-Type: text/plain');
	$serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname;
	require_once('./curl.php');
	$curl = new curl;
	//if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
	$restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:'';
	$resp = $curl->post($serverurl . $restformat, $params);
	print_r($resp);

?>


