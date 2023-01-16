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
$item->id=isset($_GET['id']) ? $_GET['id'] : die();
$item->getSingleEmployee();

if($item->name != null){

    $emp_array=array(
        "id" => $item->id,
        "name" =>$item->name,
        "email" =>$item->email,
        "designation" =>$item->designation,
        "created" =>$item->created
    );
    http_response_code(200);
    echo json_encode($emp_array);
}
else{
    http_response_code(404);
    echo json_encode("Employee not found.");
}

?>