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
                  <th>S.no</th>
                  <th>Name</th>
                  <th>Transaction Id</th>
                  <th>Amount</th>
                  <th>Transaction Type</th>
                   <th>Date</th>
                   <th>Status</th>
                  <!--<th>Action</th>-->
                  
                </tr>
		
                <?php $i=1;
                foreach ($getwallettransfer as $transfer){
                    foreach($getallfrontuser as $user){
                        $walletTransfer=$transfer->transfer_from;
                        $userWallet=$user->wallet_address;
                        if($walletTransfer==$userWallet){
                	?>
                <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $user->name; ?></td>
                <td><?php echo $transfer->trans_id; ?></td>
                <td><?php echo $transfer->amount; ?></td>
                <td><?php echo 'Transfer'; ?></td>
                <td><?php echo $transfer->created_date ; ?></td>
                <td><?php echo $transfer->status ; ?></td>
               <!--<td>
                <a  data-toggle="modal" class="datadelete" data-id="<?php echo $deposit->id; ?>"> Delete</a>
                </td>-->                 
                </tr>
                
                <?php $i++;} } }?>
                <?php 
                foreach ($getwalletdeposit as $deposit){
                    foreach($getallfrontuser as $user){
                        $walletTransfer=$deposit->transfer_from;
                        $userWallet=$user->wallet_address;
                        if($walletTransfer==$userWallet){
                	?>
                <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $user->name; ?></td>
                <td><?php echo $deposit->trans_id; ?></td>
                <td><?php echo $deposit->amount; ?></td>
                <td><?php echo 'Deposit'; ?></td>
                <td><?php echo $deposit->created_date ; ?></td>
                <td><?php echo $deposit->status ; ?></td>
                <!--<td>
                <a  data-toggle="modal" class="datadelete" data-id="<?php echo $deposit->id; ?>"> Delete</a>
                </td>-->                
                </tr>
                <?php $i++;} } }?>
                <?php 
                foreach ($getwalletwithdrawal as $withdrawal){
                    foreach($getallfrontuser as $user){
                        $walletTransfer=$withdrawal->walletaddress;
                        $userWallet=$user->wallet_address;
                        if($walletTransfer==$userWallet){
                	?>
                <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $user->name; ?></td>
                <td><?php echo $withdrawal->trans_id; ?></td>
                <td><?php echo $withdrawal->amount; ?></td>
                <td><?php echo 'Withdrawal  '; ?><span class="withdrawalClass" title="Bank Detail" data-bankname="<?php echo $withdrawal->bankname;?>" data-accountno="<?php echo $withdrawal->accountno;?>" data-ifscode="<?php echo $withdrawal->ifscode;?>"><i class="fa fa-user"></i></span></td>
                <td><?php echo $withdrawal->created_date ; ?></td>
                <td><?php echo $withdrawal->status ; ?></td>
                <!--<td>
                <a  data-toggle="modal" class="datadelete" data-id="<?php echo $withdrawal->id; ?>"> Delete</a>
                </td>-->                
                </tr>
                <?php $i++;} } }?>
  
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
                                            <h4 class="modal-title">Delete Wallet Entry</h4>
                                        </div>
                                        <div class="modal-body">
                                        
                                            Are you sure to delete this entry!

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
                <!--Bank modal start-->
                  <div class="modal fade" id="bankdetailshow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">View Bank Details</h4>
                                        </div>
                                        <div class="modal-body">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Bank Name</label>
                                            <div class="col-sm-9">
                                              <label class="form-control" id="bankname_withdrawal"></label>
                                            </div>
                                          </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Bank Account</label>
                                            <div class="col-sm-9">
                                              <label class="form-control" id="bankaccount_withdrawal"></label>
                                            </div>
                                         </div>
                                         <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">IFSCode</label>
                                            <div class="col-sm-9">
                                              <label class="form-control" id="ifscode_withdrawal"></label>
                                            </div>
                                          </div>
                                        </div>
                                        <!--<div class="modal-footer">
                                            <form action="<?php echo base_url();?>admin/Usermanagement/deleteUser" method="post">
                                                <input  type="hidden"  class="delete_member" name="delete_member" id="delete_member" />
                                                <button data-dismiss="modal" class="btn btn-default" type="button">No</button>
                                                <button class="btn btn-success" name="delete_team_from_account" type="submit">Yes </button>
                                            </form>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                <!--Bank modal end-->
      <?php include('footer.php');?>
      <script type="text/javascript">
      $(document).ready(function(){
        $(document).on('click','.datadelete',function(){
            var datids=$(this).attr('data-id');
            $('#delete_member').val(datids);
            $('#delete_particularTeam').modal('show');
        });
          $(document).on('click','.withdrawalClass',function(){
            var bankname=$(this).attr('data-bankname');
            var accountno=$(this).attr('data-accountno');
            var ifscode=$(this).attr('data-ifscode');
              $('#bankname_withdrawal').text(bankname);
              $('#bankaccount_withdrawal').text(accountno);
              $('#ifscode_withdrawal').text(ifscode);
              
            $('#bankdetailshow').modal('show');
          });  
      });
      </script>