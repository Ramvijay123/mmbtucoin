<?php
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
       Manage Support 
   
      </h1>
    
    </section>

    <!-- Main content -->
    <section class="content">
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Support</h3>
                  <!--<div class="box-tools">
                      <a class="form-control pull-right btn btn-small" data-target="#new_package" data-toggle="modal" >+ Add</a>
                  </div>-->
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
                  <th>TicketId</th>
                  <th>Title</th>
                  <th>Problem Type</th>
                  <th>Created Date</th>
                  <th>Action</th>
                </tr>
            <?php foreach ($user_tickets as $ticket){ 
                   $holdname='';
                      foreach($getAllUser as $userAll){
                        if($userAll->id==$ticket->user_id){
                            $holdname=$userAll->name;
                        }
                      }
                          ?>
                <tr>
                <td><?php echo $holdname; ?></td>
                <td><?php echo $ticket->token; ?></td>
                <td><?php echo $ticket->title; ?></td>
                <td><?php echo $ticket->title; ?></td>
                <td><?php echo $ticket->created_date ; ?></td>
                <td>
                <a style="cursor: default;" class="deletebtn" data-id="<?php echo $ticket->id; ?>"> Delete</a> | 
                <a class="editSupport" data-id="<?php echo $ticket->id; ?>" data-userid="<?php echo $ticket->user_id; ?>" style="cursor: default;"> Reply</a></td>                
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel"><strong>Reply</strong></h4>
              </div>
              <div class="modal-body">
                 <div class="msg_wrap">
                 	<ul id="setmessageall">
                           
                       </ul>
                 </div>
                 <div class="msg_form">
                    	<form method="post" action="<?php echo base_url();?>admin/Support/insertMessage">
                          <input type="hidden" id="support_ids" name="ids" value="">
                          <input type="hidden" id="support_user_ids" name="user_ids" value="">
							<textarea placeholder="Type you message here..." name="message"></textarea>
                            <input type="submit" class="btn" value="Reply">
                        </form>
                    </div>
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
                                            <h4 class="modal-title">Delete Support</h4>
                                        </div>
                                        <div class="modal-body">
                                        
                                            Are you sure to delete this Support entry!

                                        </div>
                                        <div class="modal-footer">
                                        <form action="<?php echo base_url();?>admin/Support/DeleteSupport/" method="post">

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
    $(document).on('click','.editSupport',function(){
        var ids=$(this).attr('data-id');
        var user_id=$(this).attr('data-userid');
       
          $.ajax({
        url:'<?php echo base_url() ?>admin/Support/supportmessage',
        secureuri:false,
        type: "POST",       
        data: 'ids='+ids,
		dataType: 'html',
        success: function (data){
            $('#setmessageall').html(data);
            $('#support_ids').val(ids);
            $('#support_user_ids').val(user_id);
            $('#new_package').modal('show');
        } 
    });
        
    });
    $(document).on('click','.deletebtn',function(){
            var datids=$(this).attr('data-id');
            $('#delete_member').val(datids);
            $('#delete_particularTeam').modal('show');
        });
   });
   </script>