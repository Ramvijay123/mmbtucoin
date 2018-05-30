<?php 
$RemovalClass=get_object_vars($userdata[0]);
$twoFaStatus=$RemovalClass['two_fa'];
$Secretcode=$RemovalClass['two_secretcode'];
if($twoFaStatus=='1'){
    $codeSecret=$Secretcode;
    $level='High';
    $type='Enabled';
    $addstyle="font-weight:bold;color:green;";
}else{
    $codeSecret=$secret_code;
    $level='Low';
    $type='Disabled';
    $addstyle="color:red;";
}
?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>Security</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Security</a></li>

      </ol><br>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">          
        <div class="box box-default padding_20">
        	<div class="box-body">
            	<div class="security_ac text-center">
                    <h1> <span class="sec_icon"><i class="fa fa-lock"></i></span> Security</h1>
                    <h4>Your Account security level: <span class="sec_lavel" style="<?php echo $addstyle;?>"><?php echo $level; ?></span></h4>
                    <p>Weak account security increasses the risk of theft</p>
                 </div>   
            </div>
        </div>
        
        <div class="box box-default padding_20">
        	<div class="box-body">
            	<div class="security_ac">
                   <h2>Your two-factor method id: <span class="sec_lavel" id="enabledsecurity" style="<?php echo $addstyle;?>"><?php echo $type;?></span></h2>
                   <p>Protect your account in just few minutes by enabling following security optons Mobile APP based two-factor authentication.</p>
                   <ul>
                   	<li>Download the <strong>"Google Authenticator"</strong> for your mobile Phone or desktop computer: android or iPhone, iPod, iPad, Windows Phone and other systems including Microsoft Windows Desktops</li>
                    <li>Write down this key <strong></strong> on the paper and store it safe, you will need it if you lose or change your device.</li>
                    <li>Install <strong>"Google Authenticator"</strong> app Scan OR bar code recealed below with mobile app</li>
                    <li>Enter the <strong>Authentication code</strong> give your mobile app in the box.</li>
                   </ul>
                 </div>   
            </div>
        </div>
        
        <div class="box box-default padding_20">
        	<div class="box-body">
            	<div class="security_ac">
                    <h2>Two Factor Authentication</h2><br>
                    <p class="showMsgDisplay" style="color: red;"></p>
                    <?php 
                    if($twoFaStatus=='1'){?>
                        <div class="row" id="textCodeDisabled">
                      <form method="post" id="codeVarificationSecret">
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Varification Code" name="varificationcode" id="varificationcode"/>
                            <input type="hidden" value="<?php echo $codeSecret;?>"/ name="secretcode">
                        </div>
                        <div class="col-md-3">
                            <input type="submit" class="btn btn-success" value="Submit" id="codebtn"/>
                        </div>
                        </form>
                      </div>
                    <?php }else{ ?>
                        <div class="row" id="textCodeEnable">
                   		<div class="col-md-3">
                        	<div class="rq_wp">
                            	<img src="<?php echo $QRCode;?>" alt="image">
                            </div>
                          </div>  
                        <div class="col-md-9">
                            <div class="recovery_key">
                             <form method="post" id="SecretForm">
                                <h3>Recovery Key</h3>
                                <p><strong><?php echo $codeSecret;?></strong></p>
                                <input type="text" id="entercode" name="entercode" placeholder="authentication Code" class="form-control">
                                <input type="hidden" id="secretids" name="secretids" value="<?php echo $codeSecret;?>"/>
                                <p>Print a back of your recovery code.</p>
                                <p><label><input type="checkbox"> I have written down this backup code <?php echo $codeSecret;?></label></p>
                                <p><label><input type="checkbox"> Enable goodle authentication while sending coin form wallet? (optional). This will ask Google Authentication code each time when you send coin to outside of MMBTU Wattel,</label></p>
                                <input type="submit" class="btn"  value="Enable Authentication">
                                <br>
                                </form>
                            </div>
                        </div>
                      </div>
                    <?php } ?>
                    
                      
                    </div>
                 </div>   
            </div>
        
         <!--<div class="box box-default padding_20">
        	 <div class="box-body">
          		 <h2>Your Recent Activity</h2>  
                 <div class="table-responsive">
                 	<table class="table table-bordered">
                    	<thead>
                        	<tr>
                            	<th>IP Address</th>
                                <th>Location</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<tr>
                            	<td>157.34.150.19</td>
                                <td>India</td>
                            </tr>
                            <tr>
                            	<td>157.34.150.19</td>
                                <td>India</td>
                            </tr>
                            <tr>
                            	<td>157.34.150.19</td>
                                <td>India</td>
                            </tr>
                            <tr>
                            	<td>157.34.150.19</td>
                                <td>India</td>
                            </tr>
                        </tbody>
                    </table>
                 </div>	
              </div>   
          </div> -->  
    </section>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $(document).on('submit','#SecretForm',function(e){
        e.preventDefault();
        $.ajax({
            url:'<?php echo base_url();?>Security/enabledsecurity/',
            type: "POST",
            data: $('form#SecretForm').serialize(),
            dataType: "html",
            success: function(data){
              if(data=='OK'){
                $('.showMsgDisplay').html('');
                //$('#textCodeEnable').hide();
                $('#textCodeEnable').html(' <div class="row" id="textCodeDisabled"><form method="post" id="codeVarificationSecret"><div class="col-md-9"><input type="text" class="form-control" placeholder="Varification Code" id="varificationcode"/><input type="hidden" value="<?php echo $codeSecret;?>"/ name="secretcode"></div><div class="col-md-3"><input type="submit" class="btn btn-success" value="Submit" id="codebtn"/></div></form></div>');
                $('.sec_lavel').html('High');
                $('.sec_lavel').css("color","Green");
                $('.sec_lavel').css("font-weight","bold");
                $('#enabledsecurity').html('Enabled');
                $('#enabledsecurity').css("color","Green");
                $('#enabledsecurity').css("font-weight","bold");
              }else{
                $('.showMsgDisplay').html('QRCode not responding...please try again later');
              }
              }
        });
    });
    $(document).on('submit','form#codeVarificationSecret',function(e){
        e.preventDefault();
        $.ajax({
            url:'<?php echo base_url();?>Security/disabledsecurity/',
            type: "POST",
            data: $('form#codeVarificationSecret').serialize(),
            dataType: "html",
            success: function(data){
                 $('.sec_lavel').html('LOw');
                $('.sec_lavel').css("color","red");
                $('#enabledsecurity').html('Disabled');
                $('#enabledsecurity').css("color","red");
                $('#textCodeDisabled').html('<div class="col-md-3"><div class="rq_wp"><img src="<?php echo $QRCode;?>" alt="image"></div></div><div class="col-md-9"><div class="recovery_key"><form method="post" id="SecretForm"><h3>Recovery Key</h3><p><strong><?php echo $codeSecret;?></strong></p><input type="text" id="entercode" name="entercode" placeholder="authentication Code" class="form-control"><input type="hidden" id="secretids" name="secretids" value="<?php echo $codeSecret;?>"/><p>Print a back of your recovery code.</p><p><label><input type="checkbox"> I have written down this backup code <?php echo $codeSecret;?></label></p><p><label><input type="checkbox"> Enable goodle authentication while sending coin form wallet? (optional). This will ask Google Authentication code each time when you send coin to outside of MMBTU Wattel,</label></p><input type="submit" class="btn"  value="Enable Authentication"><br></form></div></div>');
              }
        });
    });
  });
  </script>