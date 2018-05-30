<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    
    
    
    
<?php echo link_tag('assets/bootstrap/css/style.css') ?>
    
    
    
  </head>

  <body>

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>


<form action="<?php echo base_url(); ?>admin/login/getlogin" id="loginadmin" method="post">
  <h4> Login  </h4>
  <?php echo $this->session->flashdata("error"); ?>
  <input name="user_name" class="name required_validation_for_admin_management" error-msg="Username cannot be blank" type="text" placeholder="Enter Email"/>
  <input name="password" class="pw required_validation_for_admin_management" error-msg="Password cannot be blank" type="password" placeholder="Enter Password"/>

  <input type="submit" class="button" type="submit" value="Log in"/>
</form>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
   /*Register start*/
$(document).on('submit','#loginadmin',function(data){   
    var checkNumber;
    var check_required_field='';
    $(this).find('.error_msg_validation').remove();
    $(this).find(".required_validation_for_admin_management").each(function(){
    var val22 = ($(this).val()).trim();     
    if(checkNumber)
    {
        check_required_field='error';
    }
    if (!val22){
        check_required_field='error';
        $(this).css("border-color","red");
        $(this).after('<span class="error_msg_validation" style="color: red;font-weight: bold;">'+$(this).attr('error-msg')+'</span>');   
    } 
     if($(this).hasClass('check_box_validation'))
        {
                if(!$(this).is(':checked')){
                    check_required_field='error';
                     $(this).after('<span class="error_msg_validation" style="color: red;font-weight: bold;">'+$(this).attr('error-msg')+'</span>');
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
    else {return true;}                             
      });
/*Register End*/ 
});
</script>

