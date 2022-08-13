<?php
include('connection.php');

$target_dir = "../uploads/";

if(isset($_POST["categ_submit"])){

    for($i = 1;$i<4;$i++){
        if(!empty($_FILES["categ_image".$i]['tmp_name']) && is_uploaded_file($_FILES["categ_image".$i]['tmp_name']))
        {            
            $image = imagecreatefromstring(file_get_contents($_FILES["categ_image".$i]["tmp_name"]));
            $target_file = $target_dir . "categ_img_" . $i .  ".png" ;
            ImagePNG($image,$target_file,0);
        }
        if(!empty($_POST["categ_name" . $i])){
            $name = $_POST["categ_name" . $i];
            $sql = "INSERT INTO 
                    categories (idCategories,name) 
                    VALUES(?,?)
                    on duplicate key
                    UPDATE name=?";
        $query = $mysqli -> prepare($sql);
        $query ->bind_param('sss',$i,$name,$name);
        $query -> execute();
        }
        

        
    }
    echo "success";
}

?>