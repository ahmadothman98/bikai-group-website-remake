<?php
include('connection.php');


class Product{
   public $id;
   public $title;
   public $link;
   public $image;
   public $quantity;
   public $details;
}

$products = [];

   
$sql = "SELECT * from products";
$query = $mysqli->prepare($sql);
$query->execute();
$result = $query->get_result();
$i=0;
while($array = $result->fetch_assoc()){
   $products[$i] = new Product;
   $products[$i]->id = $array['idProducts'];
   $products[$i]->title = $array['title'];
   $products[$i]->link = $array['link'];
   $products[$i]->image = $array['image'];
   $products[$i]->quantity = $array['quantity'];
   $products[$i]->details = $array['details'];
   $i++;
}

?>