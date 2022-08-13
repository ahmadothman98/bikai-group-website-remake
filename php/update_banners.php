<?php
include('connection.php');


if(isset($_POST["banner_update"])){
    
    for($i = 1;$i<4;$i++){
        if(!empty($_POST["title".$i]))
        {      
            $title = $_POST["title" . $i];
            $sql = "INSERT INTO 
                    banners (id,title) 
                    VALUES(?,?)
                    on duplicate key
                    UPDATE title=?";
            $query = $mysqli -> prepare($sql);
            $query ->bind_param('sss',$i,$title,$title);
            $query -> execute();
        }
        if(!empty($_POST["details".$i])){
            $details = $_POST["details".$i];

            $sql = "INSERT INTO 
                    banners (id,details) 
                    VALUES(?,?)
                    on duplicate key
                    UPDATE details=?";
            $query = $mysqli -> prepare($sql);
            $query ->bind_param('sss',$i,$details,$details);
            $query -> execute();
        }
        

        
    }
    header("Location: http://localhost/test/admin/admin.php");
}

?>