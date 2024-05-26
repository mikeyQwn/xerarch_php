<?php
$GET_PASSWORD_AND_SALT="" .
"select id, full_name, role_id, password, salt " .
"from client " .
"where client.login = ($1) ".
"and not client.deleted ";

$INSERT_COOKIE="" .
"insert into cookie ".
"(user_id, disabled) ".
"values ($1, false) ".
"returning id as cookie ";

$GET_USER_INFO="" .
"select cl.id, full_name, login, role_id from cookie c " . 
"inner join client cl " . 
"on cl.id = c.user_id " . 
"where not c.disabled " . 
"and not cl.deleted " .
"and c.id = $1 ";
	
$FETCH_USERS="" .
"select login, full_name from client " .
"where login like $1 " .
"and not deleted ";


$DELETE_USERS="" .
"update client ".
"set deleted = true ".
	"where login = ANY ($1) ";

$CREATE_USER="" .
"insert into client ".
"(full_name, login, password, salt, role_id) ".
"values ".
	"($1, $2, $3, $4, $5) ";

$FETCH_COURSES="" .
"select c.id, name, description from course c " .
"inner join course_client cc on " .
"cc.course_id  = c.id " .
"where cc.client_id = $1 ";

$FETCH_LESSONS = "" .
"select l.id, l.name from lesson l " .
"inner join course c " .
"on c.id = l.course_id " .
"inner join course_client cc " .
"on cc.course_id = c.id " .
"where c.id = $1 " .
	"and cc.client_id = $2 ";

$FETCH_TESTS = "" .
	"select t.id, t.name from test t " .
	"inner join course c " .
	"on c.id = t.course_id " .
	"inner join course_client cc " .
	"on cc.course_id = c.id " .
	"where c.id = $1 " .
		"and cc.client_id = $2 ";
?>
