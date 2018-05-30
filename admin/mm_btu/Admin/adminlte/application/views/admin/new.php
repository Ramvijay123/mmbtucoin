<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('header.php');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Manage News   
   
      </h1>
    
    </section>

    <!-- Main content -->
    <section class="content">
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage News</h3>
                  <div class="box-tools">
                      <a class="form-control pull-right btn btn-small" data-target="#new_package" data-toggle="modal" >+ Add</a>
                  </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
          
              <table class="table table-hover">
			  
                <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
           <?php foreach ($getnew as $new){  ?>
                <tr>
                <td><?php echo $new->title; ?></td>
                <td><?php echo $new->description; ?></td>
                <td><img src="<?php echo base_url();?>uploads/new/<?php echo $new->image; ?>" style="width: 60px;"/></td>
                <td><a class="deletebtn" data-id="<?php echo $new->id; ?>"  style="cursor: pointer;"> Delete</a>
                 | <a style="cursor: pointer;" data-name="<?php echo $new->title; ?>" data-designation="<?php echo $new->description; ?>" data-id="<?php echo $new->id; ?>" class="updateadvisors"> Edit</a></td>                
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
                <h4 class="modal-title" id="myModalLabel">Add New News</h4>
              </div>
              <div class="modal-body">
                 <form method="post" action="<?php echo base_url();?>admin/Newsection/insertnews" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="text" name="designation" class="form-control" placeholder="Description">
                    </div>
                     <div class="form-group">
                        <input type="file" name="userfile" class="form-control">
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
                                            <h4 class="modal-title">Delete News</h4>
                                        </div>
                                        <div class="modal-body">
                                        
                                            Are you sure to delete this entry!

                                        </div>
                                        <div class="modal-footer">
                                        <form action="<?php echo base_url();?>admin/Newsection/deletenews/" method="post">

                                        <input  type="hidden"  class="delete_member" name="delete_member" id="delete_member" />

                                            <button data-dismiss="modal" class="btn btn-default" type="button">No</button>
                                            <button class="btn btn-success" name="delete_team_from_account" type="submit">Yes </button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                <!--delete modal end-->
<!--update modal start-->
<div class="modal fade in" id="update_package" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Exitsing News</h4>
              </div>
              <div class="modal-body">
                 <form method="post" action="<?php echo base_url();?>admin/Newsection/editnews" enctype="multipart/form-data">
                    <input type="hidden" name="updateids" id="ipdateids"/>
                    <div class="form-group">
                        <input type="text" name="name" id="title1" class="form-control" placeholder="Name">
                    </div>  
                    <div class="form-group">
                        <input type="text" name="designation" id="designation1" class="form-control" placeholder="Designation">
                    </div>
                     <div class="form-group">
                        <input type="file" name="userfile" class="form-control">
                    </div>

                    <div class="form-group text-center">
                        <input type="submit" value="submit" class="btn">
                    </div>
                 </form>
              </div>
            </div>
          </div>
        </div>
<!--update modal end-->
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
    $(document).on('click','.updateadvisors',function(){
        var ids=$(this).attr('data-id');
        var name=$(this).attr('data-name');
        var designation=$(this).attr('data-designation');
        $('#ipdateids').val(ids);
        $('#title1').val(name); 
        $('#designation1').val(designation);
        $('#update_package').modal('show');
    });
   </script>   