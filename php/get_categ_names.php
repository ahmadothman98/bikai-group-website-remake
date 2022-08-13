<?php
include('connection.php');
$names = [];

$sql = "SELECT name FROM categories";
$query = $mysqli -> prepare($sql);
$query->execute();
$result = $query->get_result();

while($name = $result -> fetch_assoc()){
    $names[] = $name;
}
$json = json_encode($names);

echo $json;
?>