<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../database.php';
include_once '../employees.php';
$database = new Database();

$db = $database->getConnection();

$item = new Employee($db);


$item->address = $_GET['address'];
$item->address2 = $_GET['address2'];
$item->district = $_GET['district'];
$item->city = $_GET['city'];
$item->postcode = $_GET['postcode'];
$item->country = $_GET['country'];

if($item->createEmployee()){
echo 'Employee created successfully.';
} else{
echo 'Employee could not be created.';
}


?>