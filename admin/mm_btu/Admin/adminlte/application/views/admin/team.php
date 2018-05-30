<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
include('header.php');
?>
<style>
.msg_no {
	background:#3777cf;
	color:#fff;
	width:30px;
	height:30px;
	line-height:30px;
	cursor:pointer;
	border-radius:50%;
	display:inline-block;	
}
.msg_wrap {
	height: 300px;
	position: relative;
	overflow-y: auto;
}
.msg_wrap ul {
	padding:0;
	margin:0 auto;
}
.msg_wrap ul li {
	list-style:none;
	padding:10px;
	border-bottom:#eee solid 1px;
}
.msg_wrap ul li p {
	color:#555;
	font-size:15px;
	margin:0 auto;
}
.msg_form {
	background:#eee;
	padding:10px;	
}
.msg_form form {
	position:relative;
}
.msg_form form textarea {
	width: 100%;
	padding: 12px 10px;
	border: #ddd solid 1px;
	border-radius: 3px;
	height: 50px;
}
.msg_form form .btn {
	position: absolute;
	top: 0;
	right: 0;
	border-radius: 0;
	height: 50px;
	padding: 0 28px;
}
.networking_wrap {
	padding:40px 0;
}
.networking_steps {
	position:relative;
	float:left;
	width:25%;
	cursor:pointer;
	padding-right:30px;
}
.img_wrap {
	width:60px;
	height:60px;
	border-radius:50px;
	overflow:hidden;
	border:#ccc solid 2px;
	position:relative;
	float:left;
}
.img_wrap img {
	border-radius:50%;
}
.steps_info {
	float:right;
	width:72%;
	padding:7px 0;
}
.steps_info p {
	font-weight:600;
	font-size:15px;
}
.level {
	display:inline-block;
	background:red;
	padding:0px 3px;
	color:#fff;
	font-weight:500;
	font-size:12px;
	line-height:15px;
	border-radius:3px;
}
.next_step {
	position:absolute;
	top:20px;
	font-size:12px;
	right:15px;
	border-radius:50%;
	text-align:center;
	box-shadow:rgba(0, 0, 0, 0.15) 0 0 10px;
	line-height:30px;
	width:30px;
	height:30px;
}
#step_2, #step_3, #step_4 {
	display:none;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Manage RoadMap 
   
      </h1>
    
    </section>
<?php 
$RemovalStdClass=get_object_vars($getteamtoken[0]);

?>
    <!-- Main content -->
    <section class="content">
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage RoadMap</h3>
            </div>
            
            <div class="box-body table-responsive padding">
            <form method="post" action="<?php echo base_url();?>admin/Team/inserteam/<?php echo $RemovalStdClass['id'];?>" enctype="multipart/form-data">
            <div class="form-group row">
                    <label for="inptEmail3" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" value="<?php echo $RemovalStdClass['title'];?>" name="title"/>
                </div>
                
            </div>
            <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Designation</label>
                <div class="col-sm-8">
                    <textarea class="form-control" name="designation"><?php echo $RemovalStdClass['designation'];?></textarea>
                </div>
            </div>
             <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control" value="" name="userfile"/>
                </div>
            </div>
           
           <div class="form-group row">
                    <label for="inptEmail3" class="col-sm-2 col-form-label">Title2</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" value="<?php echo $RemovalStdClass['title2'];?>" name="title2"/>
                </div>
                
            </div>
            <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Designation2</label>
                <div class="col-sm-8">
                    <textarea class="form-control" name="designation2"><?php echo $RemovalStdClass['designation2'];?></textarea>
                </div>
            </div>
             <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Image2</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control" value="" name="userfile2"/>
                </div>
            </div>
            
            <div class="form-group row">
                    <label for="inptEmail3" class="col-sm-2 col-form-label">Title3</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" value="<?php echo $RemovalStdClass['title3'];?>" name="title3"/>
                </div>
                
            </div>
            <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Designation3</label>
                <div class="col-sm-8">
                    <textarea class="form-control" name="designation3"><?php echo $RemovalStdClass['designation3'];?></textarea>
                </div>
            </div>
             <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control" value="" name="userfile3"/>
                </div>
            </div>

            <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label"></label>
                <div class="col-sm-9">
                    <input type="submit" class="btn btn-danger" name="submit"/>
                </div>
            </div>
            </form>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      </section>
      </div>
      
    
      <?php include('footer.php');?>   
    