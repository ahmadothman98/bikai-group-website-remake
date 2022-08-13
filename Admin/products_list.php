<?php
session_start();
if(empty($_SESSION['admin'])){
    die("ACCESS DENIED!!!!");
}
else{


    ob_start();
    
    include '../php/connection.php';
    include '../php/get_products.php';
    
    echo "  <head> 
                <link rel=\"stylesheet\" href=\"http://localhost/test/style.css\">
                <title>Products List</title>
            </head>
                <nav style=\"left:0; width:100%;height:80px; background-color:#FFC79A7f; \">
                <a href=\"admin.php\"><img style=\"width:50px;height:50px; margin:20px\" src=\"http://localhost/test/assets/img/home_logo.png\" > </a>
                </nav>
                <a href=\"./admin.php?logout=\"1\" style=\"position:absolute; top:20px; right:20px; background-color:#EA4645; color:white; font-wheight:bold; border:none; border-radius:5px; padding:5px; cursor:pointer;\"  >LOGOUT</a>

             <ul style=\"padding:0; width:100%;\">";
    $previous_id = 0 ;
    for($i = 0 ;$i<sizeof($products);$i++){
        
       echo "
       <li id=\"product{$products[$i]->id}\" class = \"product\" style=\"display:flex; align-items:center; margin-left:40px;\">
       <a href=\" {$products[$i]->link} \">
           <div class=\"product-img\">
               <img src=\"{$products[$i]->image}\">
           </div>
           <div class=\"product-title\"> {$products[$i]->title} </div>
           <div class=\"product-quantity\"> {$products[$i]->quantity} </div>
           <div class=\"product-details\">"; 
           if(strlen($products[$i]->details)>60){
            echo substr($products[$i]->details,0,strpos($products[$i]->details,' ',50)) . "...";
        }
        else{
            echo $products[$i]->details;
        }
        echo " </div>
           </a>
       <div style=\"display:flex; flex-direction:column; gap:20px;width:400px; align-items:center; margin:0 0 0 50px; \">
          <a id=\"edit{$products[$i]->id}\" href=\" products_list.php?edit={$products[$i]->id}#edit{$products[$i]->id}\"  style=\"height:30px;width:100px;padding:10px; background-color:#0796B4; color:white; font-wight:bold; border-radius:10px\">Edit </a>
          ";
          if(isset($_GET['edit']) && $_GET['edit'] == $products[$i]->id){
            $id = $_GET['edit'];
    
          
            echo "

                <div style=\" border: 1px solid; border-color:rgba(0,0,0,0.5); border-radius:5px; padding:10px\">
                    <form action=\"http://localhost/test/php/add_product.php\" method=\"POST\" enctype=\"multipart/form-data\" style=\"display: flex; flex-direction: column; gap: 10px; align-items:center;   \">
                    <div>
                        <label for =\"img\" style=\"font-size:bold;text-align:center; padding:5px; border: 1px solid rgba(0,0,0,0.4); border-radius:10px; cursor:pointer; background-color:#FFEEEE\"> Change Image </label>
                        <input type=\"file\" id=\"img\" name=\"product_img\"   require hidden>
               
                    </div>
    
                    <div>
                        <input type=\"text\" name=\"product_name\" placeholder=\"Product Name\" value=\"{$products[$i]->title}\" require>
                    </div>
                    <div>
                        <input type=\"text\" name=\"product_link\" placeholder=\"Product Link\" value=\"{$products[$i]->link}\" require>
                    </div>
                     <div>
                        <input type=\"text\" name=\"product_quantity\" placeholder=\"Product Quantity\" value=\"{$products[$i]->quantity}\" require>
                    </div>
                    <div>
                        <input type=\"text\" name=\"product_details\" placeholder=\"Product Details\" value=\"{$products[$i]->details}\" require>
                        
                    </div>
                    <div>
                        <input type=\"submit\" name=\"product_submit\" value=\"Update Product\" style=\"padding:5px; background-color:#32A454; color:white; border-radius:5px; border:none; cursor:pointer; \" >
                    </div>
                        <input type=\"hidden\" name=\"id\" value=\"{$products[$i]->id}\">
    
                    </form>
                </div>
            ";
        }
        
        echo "
          <a href=\" products_list.php?delete={$products[$i]->id}#product{$previous_id}\" style=\"height:30px;width:100px;padding:10px;margin:0 50px; background-color:#EA4645; color:white; font-wight:bold; border-radius:10px\">Delete </a>
       </div>
    </li><br>";
    $previous_id = $products[$i]->id;
    
    
    }
    echo "</ul>";
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $sql = "DELETE FROM products where idProducts=$id" or die($mysqli->error());
        $mysqli -> query($sql);
        header("Location: http://localhost/test/admin/products_list.php");
    
    }

    if(isset($_GET["logout"])){
        session_destroy();
        header('location: http://localhost/test/pages/login.php');
    }

    ob_end_flush();
}

?>