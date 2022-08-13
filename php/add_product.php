<?php
include('connection.php');
$target_dir = "../uploads/";
if(   isset($_POST["product_submit"]) && !isset($_POST["id"])){  // add new product
    $sql = "SELECT idProducts FROM products ORDER BY idProducts DESC LIMIT 1";
    $query = $mysqli -> prepare($sql);
    $query -> execute();
    $result = $query->get_result();
    $id = $result->fetch_assoc();
    $id=$id["idProducts"];

    $image = imagecreatefromstring(file_get_contents($_FILES["image"]["tmp_name"]));
    
    $target_file = $target_dir . "product_img_".($id+1).".png" ;
    ImagePNG($image,$target_file,0);

    $title = $_POST["name"];
    $link = $_POST["link"];
    $quantity = $_POST["quantity"];
    $details = $_POST["details"];
    $img_link =  "http://localhost/test/uploads/product_img_".($id+1).".png";
    echo "title " . $title . "    link " . $link;
    $sql = "INSERT INTO 
            products (title,link,image,quantity,details) 
            VALUES(?,?,?,?,?)
            ";
    $query = $mysqli -> prepare($sql);
    $query ->bind_param('sssss',$title,$link,$img_link,$quantity,$details);
    $query -> execute();
    header("Location: http://localhost/test/admin/admin.php");
    

}







if(isset($_POST["product_submit"]) && isset($_POST["id"])){  // edit product
    
    if(!empty($_FILES["product_img"]['tmp_name']) || is_uploaded_file($_FILES["product_img"]['tmp_name'])){
        $target_file = $target_dir . "product_img_".($_POST['id']).".png" ;
        $image = imagecreatefromstring(file_get_contents($_FILES["product_img"]["tmp_name"]));
        ImagePNG($image,$target_file,0);
        $img_link =  "http://localhost/test/uploads/product_img_".($_POST['id']).".png";
        $sql = "UPDATE products
        SET image=? WHERE idProducts=?";
        $query = $mysqli -> prepare($sql);
        $query ->bind_param('ss',$img_link,$_POST['id']);
        $query -> execute();
    }

    $title = $_POST["product_name"];
    $link = $_POST["product_link"];
    $quantity = $_POST["product_quantity"];
    $details = $_POST["product_details"];
    $sql = "UPDATE products

    SET title=?,link=?,quantity=?,details=? WHERE idProducts=?";
    $query = $mysqli -> prepare($sql);
    $query ->bind_param('sssss',$title,$link,$quantity,$details,$_POST['id']);
    $query -> execute();
    header("Location: http://localhost/test/admin/products_list.php#product".$_POST['id']);

}



?>