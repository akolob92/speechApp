<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo 'qweqwe';
require_once('login.php');
echo 'qweqwe';
$connection = mysqli_connect($host, $user, $password, $database);
echo "qwe";
if (isset($_POST['foreign'])) {
        $string = sanitizeStringMysql($_POST['foreign'], $connection);
} else {
    echo ":(";
}
echo "qwe2";
$query = "INSERT INTO tbl_saved_words VALUES (null,'{$string}'  ,'1')";


$result = $connection->query($query);
var_dump($result);
echo "qwe3";
var_dump($string);
function sanitizeStringMysql($var,$connection) {
   // $var = $connection->real_escape_string($var);
    $var = sanitizeString($var);
    return $var;
}

function sanitizeString($var){
    $var = stripslashes($var);
    $var = htmlentities($var);
    $var = strip_tags($var);
    return $var;
}



