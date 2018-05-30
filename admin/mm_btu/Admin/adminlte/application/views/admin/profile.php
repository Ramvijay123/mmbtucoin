<?php include('header.php'); ?>
  <!-- Contentt -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Profile</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Profile</li>
      </ol><br>
    </section>
    <!-- Main content -->
    <?php 
    $RemovalStdClassUser=get_object_vars($details[0]);
    ?>
    <section class="content container-fluid">
		<div class="box">
        	<div class="profile_wrap_m">
                <div class="row">
                 <form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>admin/Profile/UpdateProfileDetails/<?php echo $RemovalStdClassUser['id'];?>">
                    <div class="col-md-4">
                    	<div class="profile_img">
                        	<img style="width: 319px;" src="<?php echo base_url(); ?>uploads/admin/<?php echo $RemovalStdClassUser['pic']; ?>" alt="image">
                        </div>
                        <div class="upload_btn">
                        	<input type="file" name="userfile" value="Upload">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="label_block">Full Name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $RemovalStdClassUser['name'];?>">
                        </div>
                        <div class="form-group">
                            <label class="label_block">Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $RemovalStdClassUser['email'];?>">
                        </div>
                        <div class="form-group">
                            <label class="label_block">Phone</label>
                            <input type="text" class="form-control" name="phone" value="<?php echo $RemovalStdClassUser['phone'];?>">
                        </div>
         
                        <div class="form-group">
                            <label class="label_block">Username</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $RemovalStdClassUser['username'];?>">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn" value="Save">
                        </div>
                    </div>
                    </form>
                </div>
        	</div>
          </div>
    </section>
  </div>
 

<?php include('footer.php');?>