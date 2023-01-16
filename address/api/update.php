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

$item->id = isset($_GET['address_id']) ? $_GET['address_id'] : die();
$item->address = $_GET['address'];
$item->address2 = $_GET['address2'];
$item->district = $_GET['district'];
$item->city = $_GET['city'];
$item->postcode = $_GET['postcode'];
$item->country = $_GET['country'];
if($item->updateEmployee()){
echo json_encode("Employee data updated.");
} else{
echo json_encode("Data could not be updated");
}

?>