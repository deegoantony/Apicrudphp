
<?php 
class Database {
public $db;
public function getConnection() {
$db=null;
try{
    $db= new mysqli('localhost','root','Deego@94','apicruddb');
}catch(Exception $e){
    echo "Database not connected: " .$e->getMessage();
}
return $db;
}

}

?>




