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
        	<a href="index.html"><img src="<?php echo base_url();?>assests/images/logo.png" alt="image"></a>
        </div>
        <div class="form_inner">
        	<h1>Create an Account</h1>
            <p style="color: red;"><?php echo $this->session->flashdata('login_error');?></p>
            <form action="<?php echo base_url();?>login/userDetail" id="RegisterForm" method="post">
                <div class="form-group">
                    <input type="text" name="name" error-msg="Name Cannot be Blank" class="form-control required_validation_for_user_management" placeholder="Full Name">
                </div>
                <div class="form-group">
                    <input type="email" id="UserEmail" name="emial" error-msg="Email Cannot be Blank" class="form-control required_validation_for_user_management" placeholder="Email Address">
                </div>
                <div class="form-group">
                    <input type="text" name="username" error-msg="Username Cannot be Blank" class="form-control required_validation_for_user_management" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" name="password" error-msg="Password Cannot be Blank" class="form-control required_validation_for_user_management" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="text" name="country" error-msg="Country Cannot be Blank" class="form-control required_validation_for_user_management" placeholder="Country">
                </div>
                <div class="form-group">
                    <input type="text" name="phone" error-msg="Phone Cannot be Blank" class="form-control required_validation_for_user_management allownumber" placeholder="Phone Number">
                </div>
                <div class="form-group">
                    <input type="text" name="refferer" readonly="" value="<?php echo $username;?>" class="form-control" placeholder="Referrer">
                </div>
                <div class="form-group btn_group">
                	<input class="btn" name="submit" value="Sign Up" type="submit">
                </div>
            </form>
            <p><a href="index">Already have an account? Sign In Here</a></p>
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
   $(document).on('submit','#RegisterForm',function(data){   
    var checkNumber;
    var check_required_field='';
    $(this).find('.error_msg_validation').remove();
    $(this).find(".required_validation_for_user_management").each(function(){
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
    $("#UserEmail").bind("blur", function () {
        $(".error").hide();
        var hasError = false;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var emailaddressVal = $("#UserEmail").val();
        if(emailaddressVal == '') {
            hasError = true;  
        }
        else if(!emailReg.test(emailaddressVal)) {
            hasError = true;
            $("#UserEmail").val(''); 
        }
        if(hasError == true) { return false; }
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $(".allownumber").keydown(function (e) {
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 return;
        }
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});
</script>