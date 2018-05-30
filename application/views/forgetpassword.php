<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>MMBTU Coin</title>
<!--Bootstrap -->
<link rel="stylesheet" href="<?php echo base_url();?>assests/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="<?php echo base_url();?>assests/css/style.css" type="text/css">
<!--FontAwesome Font Style -->
<link href="<?php echo base_url();?>assests/css/font-awesome.min.css" rel="stylesheet">
<!-- Fav and touch icons -->
<link rel="shortcut icon" href="<?php echo base_url();?>assests/images/favicon-icon/favicon.png">
<!-- Google-Font-->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet"> 
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->  
</head>
<body>
<div class="form_wrap">
	<div class="form_container">
    	<div class="form_header">
        	<a href="index.php"><img src="<?php echo base_url();?>assests/images/logo.png" alt="image"></a>
        </div>
        <div class="form_inner">
        	<h1>Forgot Password</h1>
            <p style="color: red;"><?php echo $this->session->flashdata('login_error');?></p>
            <form method="post" action="<?php echo base_url();?>login/forgot_detail" id="FOrgotForm">
                <div class="form-group">
                    <input type="email" id="UserEmailForgot" error-msg="Email Cannot be Blank" name="email" class="form-control required_validation_for_forgot_management" placeholder="Enter Address">
                </div>
                <div class="form-group btn_group">
                	<input class="btn" name="forgotpassword" value="Send Email" type="submit">
                </div>
            </form>
       </div>     
    </div>
</div>

<!-- Scripts --> 
<script src="<?php echo base_url();?>assests/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assests/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url();?>assests/js/particles.min.js"></script>
<script src="<?php echo base_url();?>assests/js/app.js"></script>
</body>
</html>
<script type="text/javascript">
   $(document).on('submit','#FOrgotForm',function(data){   
    var checkNumber;
    var check_required_field='';
    $(this).find('.error_msg_validation').remove();
    $(this).find(".required_validation_for_forgot_management").each(function(){
    var val22 = ($(this).val()).trim();     
    if(checkNumber)
    {
        check_required_field='error';
    }
    if (!val22){
        check_required_field='error';
        $(this).css("border-color","red");
        $(this).after('<p class="error_msg_validation" style="color: red;font-weight: bold;">'+$(this).attr('error-msg')+'</p>');   
    } 
     if($(this).hasClass('check_box_validation'))
        {
                if(!$(this).is(':checked')){
                    check_required_field='error';
                     $(this).after('<p class="error_msg_validation" style="color: red;font-weight: bold;">'+$(this).attr('error-msg')+'</p>');
                }    
        }
        $(this).on('keypress change',function(){
            $(this).css("border-color","#ccc").siblings('.error_msg_validation').remove();
        });   
    });  
    if(check_required_field)
    {  
         data.preventDefault();
    return false;
    }  
    else {      
  // return true; 
    }                             
      }); 
</script>
<script>
$(document).ready(function() { 
    $("#UserEmailForgot").bind("blur", function () {
        $(".error").hide();
        var hasError = false;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var emailaddressVal = $("#UserEmailForgot").val();
        if(emailaddressVal == '') {
            hasError = true;  
        }
        else if(!emailReg.test(emailaddressVal)) {
            hasError = true;
            $("#UserEmailForgot").val(''); 
        }
        if(hasError == true) { return false; }
    });
});
</script>