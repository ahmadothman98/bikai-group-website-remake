<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js?render=6LePRW0hAAAAAErY1q0z17qpezF7Kuh1_TdMuz01"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>
    <title>Document</title>
</head>
<body>
    

<form id="form_test" action="new.php" method="POST" >
    <input type='email' placeholder="email" />
    <input type='password' placeholder="password" />
    <input type="submit"  valu="login"/>
</form>



<script>
        $('#form_test').onsubmit= ()=>{console.log('submitted')}

        grecaptcha.ready(function() {
        grecaptcha.execute('6LePRW0hAAAAAErY1q0z17qpezF7Kuh1_TdMuz01'/* the recaptcha site key */, {action: 'submit'}).then(function(token) { // a token is generated to be sent to the server's api to chek it
            $('#form_test').append("<input type=\"hidden\" name=\"token\" value=\""+ token +"\" />")
        });
    });
</script>


<?php         

    if(!empty($_POST['token'])){
        $token = $_POST['token'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => '6LePRW0hAAAAAAiU40Nfbl9MJM8WWL2WmGQpbUkN'/* the recaptcha secret key */, 'response' => $token)));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $arrResponse = json_decode($response, true);
        // echo $arrResponse['success'];
        if($arrResponse['success']){
            if($arrResponse['score']>0.9){ // النقاط بتحدد اذا بوت او لا من 0 ل 1 , 0 يعني بوت 1 يعني لا
                // yuor logic goes here on success, the below line is for testing
                header( 'location: http://localhost/test');
            }
            else{
                // your logic goes here on failure, the below line is for testing
                header( 'location: http://localhost/test/pages/register.php');
            }
        }

    }
?>

</body>
</html>
