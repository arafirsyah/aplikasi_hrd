<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "db_pkl";

$conn = mysql_connect($host,$user,$pass) or die("Koneksi Gagal");
$conn_db = mysql_select_db($db) or die ("Koneksi ke Database Gagal");

?>