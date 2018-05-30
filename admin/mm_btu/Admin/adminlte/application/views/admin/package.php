<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('header.php');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Manage Package 
   
      </h1>
    
    </section>

    <!-- Main content -->
    <section class="content">
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Package</h3>
                  <div class="box-tools">
                      <a class="form-control pull-right btn btn-small" data-target="#new_package" data-toggle="modal" >+ Add</a>
                  </div>
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
                  <th>Price Range</th>
                  <th>Amount</th>
                  <th>Interest</th>
                   <th>Period Time</th>
                  <th>Action</th>
                </tr>
            <?php foreach ($user_package as $package){  ?>
                <tr>
                <td><?php echo $package->package ; ?></td>
                <td><?php echo $package->rangefrom.' - '.$package->rangeto; ?></td>
                <td><?php echo $package->amount; ?></td>
                <td><?php echo $package->interest; ?></td>
                <td><?php echo $package->period_time ; ?></td>
                <td><a class="deletebtn" data-id="<?php echo $package->id; ?>" style="cursor: pointer;"> Delete</a>
                 | <a href="<?php echo base_url();?>admin/package/UpdatePackage/<?php echo $package->id; ?>" style="cursor: pointer;"> Edit</a></td>                
                </tr>
             <?php } ?>
  
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      </section>
      </div>
      
      <div class="modal fade in" id="new_package" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Post New Ticket</h4>
              </div>
              <div class="modal-body">
                 <form method="post" action="<?php echo base_url();?>admin/package/addpackages">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="text" name="pricefrom" class="form-control" placeholder="Price From">
                    </div>
                     <div class="form-group">
                        <input type="text" name="priceto" class="form-control" placeholder="Price To">
                    </div>
                     <div class="form-group">
                        <input type="text" name="amount" class="form-control" placeholder="Amount">
                    </div>
                     <div class="form-group">
                        <input type="text" name="interest" class="form-control" placeholder="Interest">
                    </div>
                     <div class="form-group">
                        <input type="text" name="timeperiod" class="form-control" placeholder="Time Period">
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" value="submit" class="btn">
                    </div>
                 </form>
              </div>
            </div>
          </div>
        </div>
        <!--delete modal start-->
                  <div class="modal fade" id="delete_particularTeam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Delete Package</h4>
                                        </div>
                                        <div class="modal-body">
                                        
                                            Are you sure to delete this Package entry!

                                        </div>
                                        <div class="modal-footer">
                                        <form action="<?php echo base_url();?>admin/package/DeletePackage/" method="post">

                                        <input  type="hidden"  class="delete_member" name="delete_member" id="delete_member" />

                                            <button data-dismiss="modal" class="btn btn-default" type="button">No</button>
                                            <button class="btn btn-success" name="delete_team_from_account" type="submit">Yes </button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                <!--delete modal end-->
      <?php include('footer.php');?>
<script type="text/javascript">
   $(document).ready(function(){
    $(document).on('click','.addpackage',function(){
        $('#new_package').modal('show');
    });
    $(document).on('click','.deletebtn',function(){
            var datids=$(this).attr('data-id');
            $('#delete_member').val(datids);
            $('#delete_particularTeam').modal('show');
        });
   });
   </script>   