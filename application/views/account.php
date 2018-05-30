  <!-- Contentt --><?php 
  $RemovalStdClass=get_object_vars($userdata[0]);
  ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">My Account</li>
      </ol><br>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
     <p style="color: red;"><?php echo $this->session->flashdata('password_error');?></p>
    	<form method="post" action="<?php echo base_url();?>Account/updatedata/<?php echo $RemovalStdClass['id'];?>" enctype="multipart/form-data">
    	<div class="row">
        	<div class="col-md-6">
            	<div class="box box-default padding_20">
                	<div class="box-title">
                    	<h3>My Profile</h3>
                    </div>
                	<br>
                    <table class="table table-bordered">
                    	<tbody>
                        	<tr>
                            	<td><strong>Referral</strong></td>
                                <td>You have no referral</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <label>Full Name</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $RemovalStdClass['name'];?>">
                            </div>
                        </div>
                        <!--<div class="col-md-6">
                        	<div class="form-group">
                                <label>Last Name </label>
                                <input type="text" class="form-control" value="Jain">
                            </div>
                        </div>-->
                    </div>
                    <div class="row">
                    	<div class="col-md-6">
                        	<div class="form-group">
                                <label>Phone No</label>
                                <input type="text" class="form-control" name="phone" value="<?php echo $RemovalStdClass['phone'];?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                        	<div class="form-group">
                                <label>E-Mail </label>
                                <input type="text" class="form-control" name="email" value="<?php echo $RemovalStdClass['email'];?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" name="country" value="<?php echo $RemovalStdClass['country'];?>">
                    </div>
                    <div class="form-group">
                        <label>Profile</label>
                        <input type="file" class="form-control" name="userfile">
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
            	<div class="box box-default padding_20">
                	<div class="box-title">
                    	<h3>Change Password</h3>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Current Password</label>
                        <input type="password" name="current" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="newpass" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confpass" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
        	<input type="submit" value="Update" class="btn">
        </div>    
        </form>
    </section>
  </div>
  
 