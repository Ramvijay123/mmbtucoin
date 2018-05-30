<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('header.php');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Manage Users 
   
      </h1>
    
    </section>

    <!-- Main content -->
    <section class="content">
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Users</h3>

              <!--<div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>-->
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
          
              <table class="table table-hover">
			  
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>IP-Details</th>
                   <th>2-factor Authentication</th>
                   <th>Status</th>
                  <th>Action</th>
                  
                </tr>
		
<?php foreach ($user_details as $allexperience){
	if($allexperience->two_fa){
	   $two_fa='Enable';
	}else{
	   $two_fa='Disabled';
	}
    $userstatus=$allexperience->status;
    if($userstatus==0){
        $Show='Active';
        $class='dataactive';
        $current_status='Suspend';
        $color='red';
    }else{
        $Show='Suspend';
        $class='datasuspend';
        $current_status='Active';
        $color='green';
    }
	?>
                <tr>
                <td><?php echo $allexperience->name ; ?></td>
                <td><?php echo $allexperience->email; ?></td>
                <td><?php echo $allexperience->phone; ?></td>
                <td><?php echo $allexperience->ip_details; ?></td>
                <td><?php echo $two_fa ; ?></td>
                <td><span style="color:<?php echo $color;?>"><?php echo $current_status ; ?></span></td>
                <td>
                <a  data-toggle="modal" class="datadelete" data-id="<?php echo $allexperience->id; ?>"> Delete</a>
                <a data-toggle="modal" class="<?php echo $class;?>" data-id="<?php echo $allexperience->id; ?>"> <?php echo $Show;?></a>
                </td>                
                </tr>
                
                <?php
}?>
  
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      </section>
      </div>
      
       <!--delete modal start-->
                  <div class="modal fade" id="delete_particularTeam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Delete User</h4>
                                        </div>
                                        <div class="modal-body">
                                        
                                            Are you sure to delete this User entry!

                                        </div>
                                        <div class="modal-footer">
                                        <form action="<?php echo base_url();?>admin/Usermanagement/deleteUser" method="post">

                                        <input  type="hidden"  class="delete_member" name="delete_member" id="delete_member" />

                                            <button data-dismiss="modal" class="btn btn-default" type="button">No</button>
                                            <button class="btn btn-success" name="delete_team_from_account" type="submit">Yes </button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                <!--delete modal end-->
                 <!--Active modal start-->
                  <div class="modal fade" id="active_particularTeam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Active User</h4>
                                        </div>
                                        <div class="modal-body">
                                        
                                            Are you sure to delete this Active entry!

                                        </div>
                                        <div class="modal-footer">
                                        <form action="<?php echo base_url();?>admin/Usermanagement/enableddisabledUser" method="post">
                                        <input  type="hidden"  name="statusUser" value="1" />
                                        <input  type="hidden"  class="delete_member" name="delete_member" id="active_member" />

                                            <button data-dismiss="modal" class="btn btn-default" type="button">No</button>
                                            <button class="btn btn-success" name="delete_team_from_account" type="submit">Yes </button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                <!--active modal end-->
                 <!--suspend modal start-->
                  <div class="modal fade" id="suspend_particularTeam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Suspend User</h4>
                                        </div>
                                        <div class="modal-body">
                                        
                                            Are you sure to delete this Suspend entry!

                                        </div>
                                        <div class="modal-footer">
                                        <form action="<?php echo base_url();?>admin/Usermanagement/enableddisabledUser" method="post">

                                        <input  type="hidden"  class="delete_member" name="delete_member" id="suspend_member" />
                                        <input  type="hidden"  name="statusUser" value="0" />
                                            <button data-dismiss="modal" class="btn btn-default" type="button">No</button>
                                            <button class="btn btn-success" name="delete_team_from_account" type="submit">Yes </button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                <!--suspend modal end-->
      <?php include('footer.php');?>
      <script type="text/javascript">
      $(document).ready(function(){
        $(document).on('click','.datadelete',function(){
            var datids=$(this).attr('data-id');
            $('#delete_member').val(datids);
            $('#delete_particularTeam').modal('show');
        });
         $(document).on('click','.datasuspend',function(){
            var datids=$(this).attr('data-id');
            $('#suspend_member').val(datids);
            $('#suspend_particularTeam').modal('show');
        });
        $(document).on('click','.dataactive',function(){
            var datids=$(this).attr('data-id');
            $('#active_member').val(datids);
            $('#active_particularTeam').modal('show');
        });
      });
      </script>