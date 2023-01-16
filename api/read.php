<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once "../database.php";
include_once "../employees.php";

$database = new Database();

$db=$database->getConnection();

$items = new Employee($db);

$records = $items->getEmployees();

$records2=$items->getAddress();

$itemCount= $records->num_rows;
$itemCount2=$records2->num_rows;

if($itemCount >0){
    $employeeArr = array();
    $employeeArr["body"]= array();
    $employeeArr["itemCount"]= $itemCount;

    // $addressarr=array();
    // $addressarr["address"]=array();

    
    while($row = $records->fetch_assoc()){
        $arr=array();
        array_push($employeeArr["body"],$row);

    }
    
 $d1=array();
 foreach($employeeArr["body"] as $key=>$value){
    array_push($d1,$value);
 }
//  echo json_encode($d1);
// echo json_encode($employeeArr["body"]);



  //getAddress

  if($itemCount2 >0){
    $addressArr = array();
    $addressArr["address"]= array();
    $addressArr["itemCount"]= $itemCount;

    while($row2 = $records2->fetch_assoc()){
        
        array_push($addressArr["address"],$row2);

    }
$d2=array();
foreach($addressArr["address"] as $key=>$value){
    array_push($d2,$value);
}
// echo json_encode($d2);
// echo json_encode($addressArr["address"]); 

}


else{
    http_response_code(404);
    echo json_encode(array("message" => "no record found"));
}


}


else{
    http_response_code(404);
    echo json_encode(array("message" => "no record found"));
}

foreach ($d1 as &$user) {
    
    $user['address'] = array();
    foreach ($d2 as $address) {
        
        if ($address['employee_id'] == $user['id']) {
            // $user['address'][] = $address;
            array_push($user['address'],$address);
        }
    }
}
echo json_encode($d1);

// $combinedData=array();
// foreach($d1 as $t1){
//     foreach($d2 as $t2){
//        if($t1['id'] == $t2['employee_id']){

//         // print_r(json_encode($t2));
       
//         $data = array_merge($t1,$t2);
        
//         array_push($combinedData,$data);
        
//        }
//     }
// }

// echo json_encode($combinedData);

     //from code

// foreach($d1 as $t1){
//     foreach($d2 as $t2){
//         $t2 = array_map(function($v){
//             $v['employee_id'] = $v['id'];
//             unset($v['id']);
//             return $v;
//         }, $t2);

//         foreach ($t1 as &$v) {
//             $v['address'] = array_filter($t2, function($address) use ($v){
//                 return $address['employee_id'] == $v['id'];
//             });
//         }
//         print_r($t1);
//     }
// }


?>