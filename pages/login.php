<!DOCTYPE html>
<html lang="en">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6LdLk7EUAAAAAEWHuB2tabMmlxQ2-RRTLPHEGe9Y"></script>

    <title>Login</title>
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
.login-form{
    background-color: #ECF0F1;
    display: flex;
    flex-direction: column;
    width: 300px;
    padding: 20px;
    border-radius: 5px;
    margin-bottom: auto;
}
.login-form input{
    margin-bottom: 10px;
    height: 40px;
    border-radius: 4px;
    border: 2px #34495E solid;
}
.login-display{
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
.email,.password{
    padding-left: 10px;
    color: #34495E;
}
.login{
    background-color: #243B51;
    color: white;
    font-weight: bold;
}
.login:hover{
    background-color: #34495E;
    cursor: pointer;
}

</style>
</head>
<body>
    <div class="container">
        <div class="login-display">
            <hr>
            <h1>LOGIN</h1>
            <hr>
        </div>
        <form method="POST" id='form' action="login.php" class="login-form">
            <input type="email" class="email" name="email" placeholder="Email" required>
            <input type="password" class="password" name="password" placeholder="Password" required>  
            <input type="submit" class="login" name="submit_login" value="login">
            <div>Don't have an account yet? <a href="register.php">Register</a></div>

        </form>
    </div>
</body>
</html>
<script>
    $('#form').submit(function(event){
        event.preventDefault();
        grecaptcha.ready(function() {
            var x = grecaptcha.execute('6LdLk7EUAAAAAEWHuB2tabMmlxQ2-RRTLPHEGe9Y', {action: 'login'}).then(function(token) {
                $('#newsletterForm').prepend('<input type="hidden" name="token" value="' + token + '">');
                $('#newsletterForm').prepend('<input type="hidden" name="action" value="subscribe_newsletter">');
                $('#newsletterForm').unbind('submit').submit();
            });;


         })
    })

</script>
<?php
    include '../php/connection.php';

    define("RECAPTCHA_V3_SECRET_KEY", '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe');

    if(isset($_POST['submit_login'])){
        var_dump($_POST['submit_login']);

        $token = $_POST['token'];
        $action = $_POST['action'];
        
        // call curl to POST request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $arrResponse = json_decode($response, true);
        
        // verify the response
        if($arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5) {
            // valid submission
            // go ahead and do necessary stuff
        } else {
            // spam submission
            // show error message
        }
        
    }
    // if(isset($_POST['login'])){
    //     $email = $_POST["email"];
    //     $password = $_POST["password"];
    //     $sql = 'SELECT * from users where email=?';
    //     $query = $mysqli->prepare($sql);
    //     $query->bind_param('s',$email);
    //     $query->execute();
    //     $result = $query->get_result();
    //     if( $result->num_rows == 1){
    //         $user = $result->fetch_assoc();
    //         $hashed_password = $user['password'];
    //         if(password_verify($password, $hashed_password)) {
    //             session_start();
    //             if($user['role'] == 1){
    //                 $_SESSION['admin'] = $user['id'] ;
    //                 // print_r($_SESSION);
    //                 header('location: http://localhost/test/Admin/admin.php');
    //             }
    //             else{
    //                 $_SESSION['user'] = ['id'=>$user['id'],'name' => $user['Name']];
                    
    //                 header('location: http://localhost/test/');
    //             }
    //         }
    //         else{
    //             echo $password;
    //         }
    //      }
    //      else{
    //         echo " User \"" . $email . "\" not found.";
    //      }

        
    // }
    

?>