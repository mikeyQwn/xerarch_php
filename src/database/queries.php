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
	"select full_name, login, role_id from cookie c " . 
	"inner join client cl " . 
	"on cl.id = c.user_id " . 
	"where not c.disabled " . 
	"and not cl.deleted " .
	"and c.id = $1 ";
?>
