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
$item->getSingleEmployee();

if($item->address != null){

    $emp_array=array(
        "address_id" => $item->address_id,
        "address" =>$item->address,
        "address2" =>$item->address2,
        "district" =>$item->district,
        "city" =>$item->city,
        "postcode" =>$item->postcode,
        "country" =>$item->country
    );
    http_response_code(200);
    echo json_encode($emp_array);
}
else{
    http_response_code(404);
    echo json_encode("Employee not found.");
}

?>
