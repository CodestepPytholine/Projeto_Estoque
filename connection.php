<?php

	$host = 'localhost';
	$user = 'root';
	$password = '';
	$database = 'db_estoque';

	$conn = new PDO('mysql:host='. $host . ';user='. $user . ';dbname='. $database);
