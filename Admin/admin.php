<?php 
    session_start();
    if(empty($_SESSION['admin'])){
        // die("YOU SHOULD NOT BE HERE");
        header('location: http://localhost/test/pages/login.php');

    }

    if(isset($_GET["logout"])){
        session_destroy();
        header('location: http://localhost/test/pages/login.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/test/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Admin Page</title>

</head>
<body class="admin-page" style="margin-left:50px;">
    <a href="./admin.php?logout="1" style="position:absolute; top:20px; right:20px; background-color:#EA4645; color:white; font-wheight:bold; border:none; border-radius:5px; padding:5px; cursor:pointer;" type="submit" name="logout" >LOGOUT</a>
    <div class="admin-col">
        <h1>Banner</h1>
        <form name="banner_form">
            <div>
                <input type="text" name="title1" placeholder="Banner1 Title">
                <input type="text" name="details1" placeholder="Banner1 Details">
            </div>
            <br>
            <div>
                <input type="text" name="title2" placeholder="Banner2 Title">
                <input type="text" name="details2" placeholder="Banner2 Details">
            </div>
            <br>
            <div>
                <input type="text" name="title3" placeholder="Banner3 Title">
                <input type="text" name="details3" placeholder="Banner3 Details">
            </div>
            <br>

            <input type="submit" name="banner_update" value="Update Banner">
        </form>
        <h1>Categories</h1>
        <form name="categ_form">
            <div>
                <input type="text" name="categ_name1" placeholder="category 1">
                <input type="file" name="categ_image1" >
            </div>
            <div>
                <input type="text" name="categ_name2" placeholder="category 2">
                <input type="file" name="categ_image2">
            </div>
            <div>
                <input type="text" name="categ_name3" placeholder="category 3">
                <input type="file" name="categ_image3" >
            </div>
            <br>
            <input type="submit" name="categ_submit" value="Update Category">
        </form>
    </div>
    <div class="line"></div>
    <div class="products-admin">
        <h1>
            <a href="http://localhost/test/admin/products_list.php">
            Products

            </a>
        </h1>
        
        <form name="product_form" >
            <div>
                <input type="text" name="product_name" placeholder="Product Name" required >
            </div>
            <div>
                <input type="text" name="product_link" placeholder="Product Link" required >
            </div>
                <input type="file" name="product_img" required>
            <div>
                <input type="text" name="product_quantity" placeholder="Product Quantity" required >
            </div>
            <div>
                <input type="text" name="product_details" placeholder="Product Details" required>
            </div>
            <div>
                <input type="submit" name="product_submit" value="Add Product" required>
            </div>
        </form>

    </div>
</body>
<script>
    banner_form.addEventListener('submit', (e)=>{
        const url="http://localhost/test/php/update_banners.php";
        
    })

































































    categ_form.addEventListener('submit', (e) =>{
        e.preventDefault();
        // const xhr = new XMLHttpRequest();
        const url = "http://localhost/test/php/categories.php"
        var data = new FormData();
        data.append('categ_submit',1 )
        data.append('categ_name1',categ_form.categ_name1.value )
        data.append('categ_name2',categ_form.categ_name2.value )
        data.append('categ_name3',categ_form.categ_name3.value )
        data.append('categ_image1',categ_form.categ_image1.files[0])
        data.append('categ_image2',categ_form.categ_image2.files[0])
        data.append('categ_image3',categ_form.categ_image3.files[0]);
        // xhr.open("POST",url,false);
        
        // // xhr.onerror =(err)=>{console.log(err)}
        // xhr.onload = ()=>{
        //         categ_form.categ_name1.value = ''
        //         categ_form.categ_name2.value = ''
        //         categ_form.categ_name3.value = ''
        //         categ_form.categ_image1.value = ''
        //         categ_form.categ_image2.value = ''
        //         categ_form.categ_image3.value = ''
        //         // console.log(xhr.readyState)
        //     }
        // xhr.send(data)
        // // console.log(xhr.responseText)
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            processData: false,
            contentType: false,
            success: "success",
        });

    })
    
    product_form.addEventListener('submit', (e)=>{
        e.preventDefault();
    const xhr = new XMLHttpRequest();
    // console.log(product_form.product_img.files[0])
    var url = 'http://localhost/test/php/add_product.php';
    var data = new FormData();
    data.append('name', product_form.product_name.value)
    data.append('image', product_form.product_img.files[0])
    data.append('link', product_form.product_link.value)
    data.append('quantity', product_form.product_quantity.value)
    data.append('details', product_form.product_details.value)
    data.append('product_submit',product_form.product_submit)


    xhr.open("POST", url,false)
    xhr.onerror = function(){ alert ("something went wrong"); }
    xhr.onload = function(){ 
        product_form.product_name.value = '';
        product_form.product_img.value = '';
        product_form.product_link.value = '';
        product_form.product_quantity.value = '';
        product_form.product_details.value = '';
        
     } 
    xhr.send(data);
    })
</script>
</html>
