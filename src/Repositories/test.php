<?php
/**
 * Created by PhpStorm.
 * User: vilius
 * Date: 19.2.18
 * Time: 10.16
 */
 ///$dude = include ('../../dbConfig.json');

//$config = json_decode(include ('../../dbConfig.json'),true);
//print_r($config);
//echo 'this';
//var_dump($config);


//$string = file_get_contents("../../dbConfig.json");
//
//var_dump($string);

$json_a = json_decode(file_get_contents("../../dbConfig.json"), true);
//
//var_dump($json_a['host']);
//
//var_dump($json_a);