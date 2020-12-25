<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


require_once($_SERVER['DOCUMENT_ROOT'] . '/realestate/system/classes/autoload.php');

$response = [];

if (isset($_GET['salary']) && isset($_GET['age']) && isset($_GET['kids']) && isset($_GET['car'])) {

    $salary = (float)$_GET['salary'];
    $age = (int)$_GET['age'];
    $kids = (int)$_GET['kids'];
    $car = (int)$_GET['car'];

    $employee = new \Bitkit\Core\Entities\Employee($salary, $age, $kids, $car);


    $response['status'] = 'ok';
    $response['text'] = $employee->getFinalSalary();

} else {
    $response['status'] = 'false';
    $response['text'] = "Please check your data";
}

echo json_encode($response);  





