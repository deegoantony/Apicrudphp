<?php 

class Employee {
private $db;

private $db_table = "address";

public $address_id;
public $address;
public $address2;
public $district;
public $city;
public $postcode;
public $country;

public function __construct($db){
$this->db=$db;
}

//get all

public function getEmployees(){
    $sqlQuery= "SELECT * FROM ".$this->db_table."";
    $result=$this->db->query($sqlQuery);
    return $result;
}

// create
public function createEmployee(){
    
    
    $this->address=htmlspecialchars(strip_tags($this->address));
    $this->address2=htmlspecialchars(strip_tags($this->address2));
    $this->district=htmlspecialchars(strip_tags($this->district));
    $this->city=htmlspecialchars(strip_tags($this->city));
    $this->postcode=htmlspecialchars(strip_tags($this->postcode));
    $this->country=htmlspecialchars(strip_tags($this->country));

    $sqlQuery = "INSERT INTO
    ". $this->db_table ." SET address = '".$this->address."', address2 = '".$this->address2."',
    district = '".$this->district."', city = '".$this->city."', postcode = '".$this->postcode."',
    country = '".$this->country."'";
    
    $result=$this->db->query($sqlQuery);
    if($this->db->affected_rows > 0){
    return true;
    }
    return $result;
    }

// single_read
public function getSingleEmployee(){
    $sqlQuery = "SELECT address_id,address,address2,district,city,postcode,country FROM
    ". $this->db_table ." WHERE address_id = ".$this->address_id;
    $record = $this->db->query($sqlQuery);
    $dataRow=$record->fetch_assoc();
    $this->address = $dataRow['address'];
    $this->address2 = $dataRow['address2'];
    $this->district = $dataRow['district'];
    $this->city = $dataRow['city'];
    $this->postcode = $dataRow['postcode'];
    $this->country = $dataRow['country'];
    }

// update
public function updateEmployee(){
    $this->address=htmlspecialchars(strip_tags($this->address));
    $this->address2=htmlspecialchars(strip_tags($this->address2));
    $this->district=htmlspecialchars(strip_tags($this->district));
    $this->city=htmlspecialchars(strip_tags($this->city));
    $this->postcode=htmlspecialchars(strip_tags($this->postcode));
    $this->country=htmlspecialchars(strip_tags($this->country));

    $sqlQuery="UPDATE ".$this->db_table." SET address = '".$this->address."', address2 = '".$this->address2."',
    district = '".$this->district."', city = '".$this->city."', postcode = '".$this->postcode."',
    country = '".$this->country."' WHERE id='".$this->address_id."'";
    
    $result=$this->db->query($sqlQuery);
    if($this->db->affected_rows > 0){
        return true;
    }
    return $result;
}

//delete
public function deleteEmployee(){
    $sqlQuery="DELETE FROM ".$this->db_table." WHERE address_id='".$this->address_id."'";
    $result=$this->db->query($sqlQuery);
    if($this->db->affected_rows > 0){
        return true;
    }
    return $result;
}


}

?>
