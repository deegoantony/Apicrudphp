<?php
class Employee{

private $db;

private $db_table = "employee";

public $id;
public $name;
public $email;
public $designation;
public $created;
public $result;

public function __construct($db){
$this->db = $db;
}

// get all
public function getEmployees(){
// $sqlQuery = "SELECT employee.id,employee.name,address.address FROM employee INNER JOIN address ON employee.id=address.employee_id";
$sqlQuery="SELECT * FROM employee";
$result = $this->db->query($sqlQuery);
return $result;
}
public function getAddress(){
    // $sqlQuery="SELECT * FROM employee INNER JOIN address ON employee.id=address.employee_id";
    $sqlQuery="SELECT * FROM address";
    $result = $this->db->query($sqlQuery);
    return $result;
}

// create
public function createEmployee(){
    
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->designation=htmlspecialchars(strip_tags($this->designation));
    $this->created=htmlspecialchars(strip_tags($this->created));
    $sqlQuery = "INSERT INTO
    ". $this->db_table ." SET name = '".$this->name."',
    email = '".$this->email."', designation = '".$this->designation."',created = '".$this->created."'";
    
    $result=$this->db->query($sqlQuery);
    if($this->db->affected_rows > 0){
    return true;
    }
    return $result;
    }

// single_read
public function getSingleEmployee(){
    $sqlQuery = "SELECT id, name, email, designation, created FROM
    ". $this->db_table ." WHERE id = ".$this->id;
    $record = $this->db->query($sqlQuery);
    $dataRow=$record->fetch_assoc();
    $this->name = $dataRow['name'];
    $this->email = $dataRow['email'];
    $this->designation = $dataRow['designation'];
    $this->created = $dataRow['created'];
    }

// update
public function updateEmployee(){
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->designation=htmlspecialchars(strip_tags($this->designation));
    $this->created=htmlspecialchars(strip_tags($this->created));

    $sqlQuery="UPDATE ".$this->db_table." SET name='".$this->name."', email='".$this->email."',
    designation='".$this->designation."', created='".$this->created."' WHERE id='".$this->id."'";
    
    $result=$this->db->query($sqlQuery);
    if($this->db->affected_rows > 0){
        return true;
    }
    return $result;
}

// delete
public function deleteEmployee(){
    
    $sqlQuery="DELETE FROM ".$this->db_table." WHERE id='".$this->id."'";
    $result=$this->db->query($sqlQuery);
    if($this->db->affected_rows > 0){
        return true;
    }
    return $result;
}

}
?>