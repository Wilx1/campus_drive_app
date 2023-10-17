<?php 
session_start();
require 'functions.php';
include 'dbcon.php';

$id 		= $_GET['id'] ?? null;
$user_id 	= $_SESSION['MY_DRIVE_USER']['id'] ?? 0;

$id = (int)$id;
$user_id = (int)$user_id;

$qry = $conn->query("SELECT * FROM docs where id=".$id)->fetch_array();

extract($_POST);
// var_dump($qry);die;
$fname=$qry['file_path'];
$file_type = $qry['file_type'];   
$file = ($fname);

header ("Content-Type: ".filetype($file_type));
header ("Content-Length: ".filesize($file));
header ("Content-Disposition: attachment; filename=".$qry['file_name']);

readfile($file);