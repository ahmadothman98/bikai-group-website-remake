<?php
include('connection.php');
$banners = [];

$sql = "SELECT title,details FROM banners";
$query = $mysqli -> prepare($sql);
$query->execute();
$result = $query->get_result();
while($banner = $result -> fetch_assoc()){

    $banners[] = $banner;
}
$json = json_encode($banners);
echo $json;
?>