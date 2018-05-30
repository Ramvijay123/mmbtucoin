<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<form action="" method="POST">
    <input type="text" name="name" value="" />
    <input type="text" name="email" value="" />
    <textarea type="text" name="message"></textarea>
    <div class="g-recaptcha" data-sitekey="6LfVF1YUAAAAAFKd2xLMtv-bSm1R4GYrO95ObnG1"></div>
    <input type="submit" name="submit" value="SUBMIT">
</form>
<?php
if(isset($_POST['submit'])){
        //your site secret key
        $secret = '6LfVF1YUAAAAALanDGikLltHV0yTlQEdp2lopBhg';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        print_r($responseData);
 }
?>
