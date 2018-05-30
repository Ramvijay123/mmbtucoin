<?php include('header.php');
error_reporting(0); 
  
?>
<!-- transaction-Modal -->
        <div class="modal fade" id="transaction_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><strong>Transfer</strong></h4>
              </div>
              <div class="modal-body">
                 <form method="post" action="<?php echo base_url();?>Wallet/transfer_insert/<?php echo $userdata['id'];?>">
                 	<div class="form-group">
                    <label>Transfer From</label>
                    	<input type="text" placeholder="<?php echo $userdata['wallet_address'];?>" readonly="" name="transfer_from" value="<?php echo $userdata['wallet_address'];?>" class="form-control">
                    </div>
                    <div class="form-group">
                    <label>Transfer To</label>
                    	<input type="text" placeholder="Transfer To" name="transfer_to" id="transfer_to" class="form-control">
                    </div>
                    <div class="form-group">
                    <label>Amount(MMBTU)</label>
                    	<input type="text" placeholder="Amount(MMBTU" name="transfer_amount" id="transfer_amount" class="form-control">
                    </div>
                    <p class="showappendDAtaresult" style="color: red;"></p>
                    <div class="form-group">
                    	<input type="submit" value="Submit" id="transferbtn" disabled="" class="btn">
                    </div>
                 </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Deposit-Modal -->
        <div class="modal fade" id="deposit_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><strong>Deposit</strong></h4>
              </div>
              <div class="modal-body">
                 <form method="post" action="<?php echo base_url();?>Wallet/deposit_insert/">
                 	<div class="form-group">
                    	<input type="text"  placeholder="Wallet Address" readonly="" value="<?php echo $userdata['wallet_address'];?>" id="depositwalletfrom" name="depositwalletfrom" class="form-control">
                    </div>
                    <!--<div class="form-group">
                    	<input type="text" placeholder="Wallet Address" readonly="" id="depositwalletto" name="depositwalletto" class="form-control">
                    </div>-->
                    <div class="form-group">
                    	<input type="text" placeholder="Amount" id="depositwalletAmt" name="depositwalletAmt" class="form-control">
                    </div>
                    <div class="form-group">
                    	<input type="submit" id="depositbtn" disabled="" value="Submit" class="btn">
                    </div>
                    <p style="color: red;" id="depositmsg"></p>
                 </form>
              </div>
            </div>
          </div>
        </div>
          <!-- Withdrawal-Modal -->
        <div class="modal fade" id="withdrawal_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><strong>Withdrawal</strong></h4>
              </div>
              <div class="modal-body">
                 <!--<form method="post" action="<?php echo base_url();?>Wallet/withdrawal_insert/">-->
                 <form method="post" action="<?php echo base_url();?>Wallet/withdrawalData/">
                    <div class="form-group">
                    	<input type="text" placeholder="Wallet Address" name="walletaddress" id="walletaddress" readonly="" value="<?php echo $userdata['wallet_address'];?>" class="form-control">
                    </div>
                 	<div class="form-group">
                    	<input type="text" placeholder="Bank Name" name="Bankname" id="Bankname" value="" class="form-control">
                    </div>
                    <div class="form-group">
                    	<input type="text" placeholder="Account NO" name="accountno" id="accountno" value="" class="form-control">
                    </div>
                    <div class="form-group">
                    	<input type="text" placeholder="IFSCode" name="ifscode" id="ifscode" value="" class="form-control">
                    </div>
                     <div class="form-group">
                    	<input type="text" placeholder="Amount" name="amount" id="amountwithdreawal" value="" class="form-control">
                    </div>
                    <div class="form-group">
                    	<input type="submit" name="withdrawalBtn" id="withdrawalBtn" value="Submit" class="btn">
                    </div>
                    <p style="color: red;" class="showBlnceinformation"></p>
                 </form>
              </div>
            </div>
          </div>
        </div>
        
         <!-- History-Modal -->
        <div class="modal fade" id="history_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><strong>History</strong></h4>
              </div>
              <div class="modal-body">
                 <form>
                 	<div class="form-group">
                    	<label></label>
                    </div>
                    <div class="form-group">
                    	<input type="email" placeholder="Email Address" class="form-control">
                    </div>
                    <div class="form-group">
                    	<input type="submit" value="Submit" class="btn">
                    </div>
                 </form>
              </div>
            </div>
          </div>
        </div>
<!-- Contentt -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Wallet</h1>
      <ol class="breadcrumb">
        <li>Wallet Address</li>
        <li class="active"><?php echo $userdata['wallet_address'];?></li>
      </ol><br>
    </section>
    <!-- Main content -->
    <h3 style="color: red;"><?php echo $this->session->flashdata('wallet_error');?></h3>
    <section class="content container-fluid">
    	<div class="box box-default padding_20">
        	<div class="text-right">
				<a class="btn transfer_trans"  data-toggle="modal" data-target="#transaction_modal">Transfer</a>
                <a class="btn btn-xs deposit_modal" data-toggle="modal" data-wallet="" data-id="">Deposit</a>
                <a  class="btn btn-xs withdrawal_modal" data-toggle="modal" data-wallet="" data-id="">Withdrawal</a>    
            </div>
             <div class="wallet_table" style="padding: 20px 0;">
             	<table class="table table-bordered">
                	<thead>
                    	<tr>
                        	<th>S.No</th>
                            <th>Name</th>
                            <th>Transaction ID</th>
                            <th>Transaction Type</th>
                            <th>Date</th>
                            <!--<th>Action</th>-->
                        </tr>
                    </thead>
                    <tbody>
                     <?php  $i=1;
                     foreach($transferUser as $transfer){
                        foreach($getalluser as $userdata){
                             $takenWallet=$userdata->wallet_address;
                             $transferWallet=$transfer->transfer_to;
                               if($takenWallet==$transferWallet){
                         ?>
                         <tr>
                        	<td><?php echo $i;?></td>
                            <td><?php echo $userdata->name. ' ('.$transfer->status.')';?></td>
                            <td><?php echo '#'.$transfer->trans_id;?></td>
                            <td><?php echo 'Transfer';?></td>
                            <td><?php echo $transfer->created_date;?></td>
                           <!-- <td>
                            	
                                <a href="#" class="btn btn-xs history_modal" data-toggle="modal">History</a>
                             </td>-->
                        </tr>
                       <?php } } $i++;}
                       
                       foreach($depositUser as $depositAll){
                        foreach($getalluser as $userdata){
                            $takenWallet=$userdata->wallet_address;
                            $transferWallet=$depositAll->transfer_from;
                               if($takenWallet==$transferWallet){
                       ?>
                       <tr>
                        	<td><?php echo $i;?></td>
                            <td><?php echo $userdata->name. ' ('.$depositAll->status.')';?></td>
                            <td><?php echo '#'.$depositAll->trans_id;?></td>
                            <td><?php echo 'Deposit';?></td>
                            <td><?php echo $depositAll->created_date;?></td>
                           <!-- <td>
                            	
                                <a href="#" class="btn btn-xs history_modal" data-toggle="modal">History</a>
                             </td>-->
                        </tr><?php } } $i++;} 
                        foreach($withdrawalUser as $withdrawal){
                        foreach($getalluser as $userdata){
                            $takenWallet2=$userdata->wallet_address;
                            $withdrawaladdress=$withdrawal->walletaddress;
                               if($takenWallet2==$withdrawaladdress){
                       ?>
                       <tr>
                        	<td><?php echo $i;?></td>
                            <td><?php echo $userdata->name. ' ('.$withdrawal->status.')';?></td>
                            <td><?php echo '#'.$withdrawal->trans_id;?></td>
                            <td><?php echo 'Withdrawal';?></td>
                            <td><?php echo $withdrawal->created_date;?></td>
                           <!-- <td>
                            	
                                <a href="#" class="btn btn-xs history_modal" data-toggle="modal">History</a>
                             </td>-->
                        </tr><?php } } $i++;} ?>
                    </tbody>
                </table>
             </div>
        </div>
    </section>
  </div>        
<?php include('footer.php'); ?>



<script type="text/javascript">
$(document).ready(function(){
    $(document).on('blur','#transfer_amount',function(){
        $('#transferbtn').attr('disabled',true);
        var amount=$(this).val();
        $.ajax({
            type : "POST",
            url : '<?php echo base_url(); ?>Wallet/checkBalance',
            data : 'amount='+amount,
            dataType: 'html',
            success : onSaveSuccess
            }); 
            function onSaveSuccess(data)
            { 
                if(data=='available'){
                    $('#transferbtn').attr('disabled',false);
                    $('.showappendDAtaresult').html('');
                    
                }else{
                    $('#transferbtn').attr('disabled',true);
                    $('.showappendDAtaresult').html('Insufficient Balance');
                }
                
             //$('#append_package').html(data);   
            }
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $(document).on('click','.deposit_modal',function(){
        var datawallet=$(this).attr('data-wallet');
        $('#depositwalletto').val(datawallet);
        $('#deposit_modal').modal('show');
      
    });
    $(document).ready(function(){
        $(document).on('blur','#depositwalletAmt',function(){
          var amount=$(this).val();
        $.ajax({
            type : "POST",
            url : '<?php echo base_url(); ?>Wallet/checkBalance',
            data : 'amount='+amount,
            dataType: 'html',
            success : onSaveSuccess
            }); 
            function onSaveSuccess(data)
            { 
                if(data=='available'){
                    $('#depositbtn').attr('disabled',false);
                    $('#depositmsg').html('');   
                }else{
                    $('#depositbtn').attr('disabled',true);
                    $('#depositmsg').html('Insufficient Balance');
                }
             //$('#append_package').html(data);   
            }  
        });
    });
 });
</script>
<script type="text/javascript">
$(document).ready(function(){
    $(document).on('click','.withdrawal_modal',function(){
        var datawallet=$(this).attr('data-wallet');
        $('#walletfromwith').val(datawallet);
        $('#withdrawal_modal').modal('show');
      
    });
    $(document).ready(function(){
        $(document).on('blur','#amountwithdrawal',function(){
          var amount=$(this).val();
        $.ajax({
            type : "POST",
            url : '<?php echo base_url(); ?>Wallet/checkBalance',
            data : 'amount='+amount,
            dataType: 'html',
            success : onSaveSuccess
            }); 
            function onSaveSuccess(data)
            { 
                if(data=='available'){
                    $('#withdrawalBtn').attr('disabled',false);
                    $('.showBlnceinformation').html('');   
                }else{
                    $('#withdrawalBtn').attr('disabled',true);
                    $('.showBlnceinformation').html('Insufficient Balance');
                }
             //$('#append_package').html(data);   
            }  
        });
    });
 });
</script>
<script type="text/javascript">
$(document).ready(function(){
   $(document).on('click','.history_modal',function(){
     $('#history_modal').modal('show');
   }); 
});
</script>