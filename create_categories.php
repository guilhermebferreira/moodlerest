
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
	$functionname = 'core_course_create_categories';
	$restformat = 'json';

	$category = new stdClass();
	$category->name = 'Example';
	$category->parent = 0;
	$category->description = '<p>text</p>';
	$category->descriptionformat = 1;
	$categories = array( $category);
	$params = array('categories' => $categories);

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


