<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once "../database.php";
include_once "../employees.php";

$database=new Database();
$bd=$database->getConnection();

$item=new Employee($bd);
$item->address_id=isset($_GET['address_id']) ? $_GET['address_id'] : die();

if($item->deleteEmployee()){
    echo json_encode("Employee deleted");
}
else{
    echo json_encode("Data could not be found");
}

?>