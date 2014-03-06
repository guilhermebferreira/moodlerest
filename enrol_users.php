<?php

	/// Connection
	$token = 'ed874e6d9f51239e180f49f4d926d50f';
	$domainname = 'http://localhost/moodle';
	$functionname = 'enrol_manual_enrol_users';
	$restformat = 'json';

	//////// enrol_manual_enrol_users ////////

	/// Paramètres
	$enrolment = new stdClass();
	$enrolment->roleid = 5; //estudante(student) -> 5; moderador(teacher) -> 4; professor(editingteacher) -> 3;
	$enrolment->userid = 2;
	$enrolment->courseid = 5; 
	$enrolments = array( $enrolment);
	$params = array('enrolments' => $enrolments);

	print_r($params);

	header('Content-Type: text/plain');
	$serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname;
	require_once('./curl.php');
	$curl = new curl;
	//if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
	$restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:'';
	$resp = $curl->post($serverurl . $restformat, $params);
	print_r($resp);
	if (isset($resp)) {
		print_r($resp);
	}
?>

