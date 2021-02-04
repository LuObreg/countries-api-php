<?php

$db_host = '127.0.0.1';
$db_user = 'root';
$db_password = '';
$db_database = 'sysworld';
$db_charset = 'utf8';

global $link;

$link = mysqli_connect($db_host, $db_user, $db_password, $db_database);

if(!$link){
    die("Connection error".mysqli_connect_errno());
}

mysqli_set_charset($link, $db_charset);