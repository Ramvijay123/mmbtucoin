<style>
.right-bar{
    display:none;
}
.btn-info{        
    background-color: #f1cf70 !important;    
    border: 1px solid #f1cf70 !important;    
    color: black !important;}
.btn-info:hover
{
    background-color: #a7824b !important;
    border: 1px solid #a7824b !important;
}
.chat
{
    list-style: none;
    margin: 0;
    padding: 0px;
    
}
.panel-body{
    overflow-y: scroll;
    height: 250px!important;
}
.chat li
{
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
}

.chat li.left .chat-body
{
    margin-left: 60px;
}

.chat li.right .chat-body
{
    margin-right: 60px;
}


.chat li .chat-body p
{
    margin: 0;
    color: #777777;
}

.panel .slidedown .glyphicon, .chat .glyphicon
{
    margin-right: 5px;
}



::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

::-webkit-scrollbar
{ 
    width: 12px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}

/* START NEW */
.custom_content{
    background-color:#fff;
    color:#000;
    border: 1px solid #e8eaed;
    box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, 0.15);
    padding: 30px;
    margin-bottom: 30px;
    text-align: center;
}
.border_bottom_title:after{
   content: "";
    width: 40px;
    top: 35px;
    height: 2px;
    position: absolute;
    bottom: 0;
    left: calc(50% - 20px);
    background-color: #ebab21;
}
.btn-yellow {
    background-color: #ebab21;
    border-color: #ebab21;
    color: #000;
}
.btn-yellow:hover {
    background-color: #000;
    border-color: #000;
    color: #fff;
}
.table > thead > tr > th, th {
    background-color: #ebab21!important;
    color: black !important;
}
.btn {
    padding: 6px 11px;
    font-size: 14px;
    font-weight: 700;
    line-height: 20px;
    border: 2px solid transparent;
    border-radius: 6px;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: 0.4s all;
    -webkit-transition: 0.4s all;
    -moz-transition: 0.4s all;
    outline: none;
}
.btn-primary{
    background-color: #ebab21 !important;
    border: 1px solid #ebab21 !important;
}
th {
    text-align: center;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 4px;
    line-height: 1.42857143;
     vertical-align:middle!important;
    border-top: 1px solid #ddd;
}
/* END NEW */

</style>
<!-- Contentt -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Support</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Support</a></li>
        
      </ol><br>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
    	<div class="box box-default padding_20">
        	<div class="box-body">
            	<div class="buy_token">
                    <div class="text-center">
                        <h2>Support & Ticket</h2>
                        <p>We are always available and accessible to support you at anytime you need us. Here is our sujpport emaill address link:<br> 
                        <strong>support@mmbtucoin.com</strong></p>
                        <p>If you need a technical support, it would be more convenient if you could create a ticket.</p>
                        <button type="button" class="btn"  data-toggle="modal" data-target="#new_ticket"><i class="fa fa-plus-square"></i>&nbsp; Add New ticket</button>
                    </div>
                 </div>   
            </div>
        </div>
        <p style="color: red;"><?php echo $this->session->flashdata('login_error');?></p>
        <div class="box box-default padding_20">
        	<div class="box-body">
            	<div class="buy_token">
                    <div class="text-center">
                        <h2>Create Support ticket</h2>
                        <div class="table-responsive">
    	                    <table class="table table-bordered text-center">
        						<thead>
                                	<tr>
                                    	<th>S.No</th>
                                        <th>Ticket ID</th>
                                        <th>Subject</th>
                                        <th>Date of Ticket</th>
                                        <th>Action</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                <?php 
                                  $i=1;
                                foreach($tokenuser as $token){?>
                                	<tr>
                                    	<td><?php echo $i;?></td>
                                        <td>#<?php echo $token->token;?></td>
                                        <td><?php echo $token->title;?></td>
                                        <td><?php echo $token->created_date;?></td>
                                        <td>
                                           <a class="chatmodal" data-ids="<?php echo $token->id;?>"><i class="fa fa-eye"></i></a>&nbsp; 
                                            &nbsp; &nbsp; 
                                            <a href="<?php echo base_url(); ?>Support/deleteticket/<?php echo $token->id;?>"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++;} ?>	
                                </tbody>               
	                        </table>
                        </div>
                    </div>
				
                 </div>   
            </div>
        </div>
        
        
    	<!-- Modal-Ticket -->
        <div class="modal fade" id="new_ticket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Post New Ticket</h4>
              </div>
              <div class="modal-body">
                 <form method="post" action="<?php echo base_url();?>Support/created_ticket">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Ticket Title">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="problrm_type">
                            <option>Problem Type</option>
                            <option>Type 1</option>
                            <option>Type 2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea rows="3" class="form-control" name="message" placeholder="Message"></textarea>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" value="Post Ticket" class="btn">
                    </div>
                 </form>
              </div>
            </div>
          </div>
        </div>
    </section>
  </div>
  
  
  
    <!-- Modal-Message -->
        <div class="modal fade" id="msg_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><strong>Reply</strong></h4>
              </div>
              <div class="modal-body">
                 <div class="msg_wrap">
                 	<ul id="setmessageall">
                    	<li>
                        	<p><i class="fa fa-calendar"></i> 2018-04-27</p><p>Hello</p>
                        </li>
                        <li style="float: right;">
                        	<p><i class="fa fa-calendar"></i> 2018-04-27</p>
                            <p>Hello</p>
                        </li>         
                    </ul>
                 </div>
                 <div class="msg_form">
                    	<form method="post" action="<?php echo base_url();?>Support/insertMessage">
                          <input type="hidden" id="support_ids" name="ids"/>
							<textarea placeholder="Type you message here..." name="message"></textarea>
                            <input type="submit" class="btn" value="Reply">
                        </form>
                    </div>
              </div>
            </div>
          </div>
        </div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.chatmodal',function(){
        var ids=$(this).attr('data-ids');
        $('#support_ids').val(ids);
       $.ajax({
              type: "POST",
              url: "<?php echo base_url();?>Support/GetMessage",
              data: 'support_id='+ids,
              cache: false,
              success: function(data){
                 $('#setmessageall').html(data);
                 $('#msg_modal').modal('show');
              }
            });
        
    });
  });
  </script>
 