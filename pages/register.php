<!DOCTYPE html>
<html lang="en">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
<style>
    html{
    height: 100%;
}
body{
    height: 100%;
    margin: 0;
    background-color: #34495E;

}
.container{
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-content: center;
    align-items: center;
    justify-items: center;
}
.register-form{
    background-color: #ECF0F1;
    display: flex;
    flex-direction: column;
    width: 300px;
    padding: 20px;
    border-radius: 5px;
    margin-bottom: auto;
}
.register-form input{
    margin-bottom: 10px;
    height: 40px;
    border-radius: 4px;
    border: 2px #34495E solid;
}
.register-display{
    margin-top: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
}
h1{
    font-family:Impact, Haettenschweiler, 'Arial', sans-serif;
    font-weight: normal !important;
}
hr{
    width: 50px ;
    height: 0;
    margin: 10px;
    color: white;
}
.name,.email,.password{
    padding-left: 10px;
    color: #34495E;
}
.register{
    background-color: #243B51;
    color: white;
    font-weight: bold;
}
.register:hover{
    background-color: #34495E;
    cursor: pointer;
}

</style>
</head>
<body>
    <div class="container">
        <div class="register-display">
            <hr>
            <h1>Register</h1>
            <hr>
        </div>
        <form method="POST" action="register.php" class="register-form">
            <input type="text" class="name" name="name" placeholder="Name" required>
            <input type="email" class="email" name="email" placeholder="Email" required>
            <input type="password" class="password" name="password" placeholder="Password" required>
            <input type="submit" class="register" name="register" value="register">
            <div>Already have an account? <a href="login.php">Login</a></div>

        </form>
    </div>
</body>
</html>
<?php
    include '../php/connection.php';

    if(isset($_POST['register'])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT );
        $role = 0;
        $sql = 'INSERT INTO users(name,email,password,role) values(?,?,?,?)';
        $query = $mysqli->prepare($sql);
        $query->bind_param('ssss',$name,$email,$password,$role);
        $query->execute();
        $user_id = mysqli_insert_id($mysqli);
        session_start();
        $_SESSION['user'] = ['id' => $user_id, 'name' => $name];
        header('location: http://localhost/test/');
    }
?>