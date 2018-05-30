  <div class="content-wrapper">
    <section class="content-header">
      <h1>Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Lending</a></li>
        <li class="active">Lending</li>
      </ol><br>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
    	<div class="box box-default padding_20">
            <div class="box-body">
            	<div class="row">
                	<div class="col-md-4">
                    	<div class="investment_process">
                        	<div class="inv_icon"><img src="<?php echo base_url();?>assests/images/money.png" alt="image"></div>
                            <ul>
                            	<li><i class="fa fa-signal"></i> 1.72%</li>
                                <li><i class="fa fa-calendar"></i> Jan 05, 2018</li>
                                <li><i class="fa fa-check"></i> Applied</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                    	<div class="investment_process">
                        	<div class="inv_icon"><img src="<?php echo base_url();?>assests/images/money.png" alt="image"></div>
                            <ul>
                            	<li><i class="fa fa-signal"></i> 1.72%</li>
                                <li><i class="fa fa-calendar"></i> Jan 05, 2018</li>
                                <li><i class="fa fa-check"></i> Applied</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                    	<div class="investment_process">
                        	<div class="inv_icon"><img src="<?php echo base_url();?>assests/images/money.png" alt="image"></div>
                            <ul>
                            	<li><i class="fa fa-signal"></i> 1.72%</li>
                                <li><i class="fa fa-calendar"></i> Jan 05, 2018</li>
                                <li><i class="fa fa-check"></i> Applied</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                    	<div class="investment_process">
                        	<div class="inv_icon"><img src="<?php echo base_url();?>assests/images/money.png" alt="image"></div>
                            <ul>
                            	<li><i class="fa fa-signal"></i> 1.72%</li>
                                <li><i class="fa fa-calendar"></i> Jan 05, 2018</li>
                                <li><i class="fa fa-check"></i> Applied</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                    	<div class="investment_process">
                        	<div class="inv_icon"><img src="<?php echo base_url();?>assests/images/money.png" alt="image"></div>
                            <ul>
                            	<li><i class="fa fa-signal"></i> 1.72%</li>
                                <li><i class="fa fa-calendar"></i> Jan 05, 2018</li>
                                <li><i class="fa fa-check"></i> Applied</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                    	<div class="investment_process">
                        	<div class="inv_icon"><img src="<?php echo base_url();?>assests/images/money.png" alt="image"></div>
                            <ul>
                            	<li><i class="fa fa-signal"></i> 1.72%</li>
                                <li><i class="fa fa-calendar"></i> Jan 05, 2018</li>
                                <li><i class="fa fa-check"></i> Applied</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    	<div class="box box-default padding_20">
            <div class="box-body">
                <div class="text-center">
                    <a class="btn btn-sm lendingbtn">Start Lending</a>
                   <!--<a href="#" class="btn btn-sm">Profit Calculator</a>-->
                </div>
        	</div>
        </div>
    
    	<div class="row">      
        	<div class="col-md-3">    
                <div class="box box-default padding_20 investment_box">
                    <div class="box-body">
                       <span class="investment_icons"> <i class="fa fa-user"></i></span>
                       <p>Total Investments</p>
                       <p><strong>$0.00</strong></p>
                    </div>
                </div> 
             </div>
             <div class="col-md-3">    
                <div class="box box-default padding_20 investment_box">
                    <div class="box-body">
                       <span class="investment_icons"> <i class="fa fa-dollar"></i></span>
                       <p>Active Investments</p>
                       <p><strong>$0.00</strong></p>
                    </div>
                </div> 
             </div>
             <div class="col-md-3">    
                <div class="box box-default padding_20 investment_box">
                    <div class="box-body">
                       <span class="investment_icons"> <i class="fa fa-money"></i></span>
                       <p>Total Capital Released</p>
                       <p><strong>$0.00</strong></p>
                    </div>
                </div> 
             </div>
             <div class="col-md-3">    
                <div class="box box-default padding_20 investment_box">
                    <div class="box-body">
                       <span class="investment_icons"> <i class="fa fa-signal"></i></span>
                       <p>Total Earned</p>
                       <p><strong>$0.00</strong></p>
                    </div>
                </div> 
             </div>     
        </div>
        
        <div class="box box-default padding_20">
            <div class="box-body">
            	<h3>Your lending packages</h3>
                <div class="table-responsive">
                	<table class="table table-bordered">
                    	<thead>
                        	<tr>
                            	<th>Lending ID</th>
                                <th>Amount </th>
                                <th>Bonus</th>
                                <th>Total Amount</th>
                                <th>Start Date</th>
                                <th>Release Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                          
                         foreach($packageall as $datapackage){
                          
                                
                                $packageSelectedId=$datapackage->package_type;
                                $interset=$datapackage->interset;
                              $total=$interset+$datapackage->mmbtu_amt;
                         
                            ?>
                       	    <tr>
                            	<td><?php echo $datapackage->id;?></td>
                                <td><?php echo $datapackage->mmbtu_amt;?></td>
                                <td><?php echo $interset; ?></td>
                                <td><?php echo $total;?></td>
                                <td><?php echo $datapackage->created_dare;?></td>
                                <td><?php echo $datapackage->expire_time;?></td>
                            </tr>
                        <?php }?>
                         
                        </tbody>
                    </table>
                </div>
            </div>
        </div>    
    </section>
  </div>
  <!--modal start-->
  <div class="modal fade in" id="strat_lending" role="dialog" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
         <form method="post" action="<?php echo base_url();?>lending/saveuserpackage">
        <div class="modal-header" style="text-align: center;">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">START LENDING</h4>
          <h3>MMBTU-COIN Wallet Balance: 0.00000000 MMBTU-COIN</h3>
         <h3> Exchange rate: 1 MMBTU-COIN = $103.84</h3>
          <!--<p>Your session will expire in 115 seconds</p>-->
        </div>
        <div class="modal-body">
           <div class="row">
             <div class="col-sm-4">
                    <div class="form-group">
                     <label>Choose payment type</label>
                       <select style="width: 100%;height: 37px;" id="package_based" name="package_type">
                          <option>Select Package Wise</option>
                          <option value="daily">Daily</option>
                          <option value="weekly">Weekly</option>
                          <option value="monthly">Monthly</option>
                       </select>
                   </div>
               </div>
                 <div class="col-sm-4">
                    <div class="form-group">
                     <label>Amount In MMBTU</label>
                        <input class="form-control" name="amountinec" id="show_ec_val" type="text" placeholder="0.0000000000">
                        <span style="color: red;font-weight: bold;display:none;" id="error_message_ico_purchase"></span>
                   </div>
               </div>
            <div class="col-sm-4">
                <div class="form-group">
                <label>Amount In USD</label>
                    <input class="form-control" name="amountinusd" type="text" readonly="" id="get_usd_val" placeholder="0.00">

               </div>

            </div>


           </div>
           <div class="row">
                <div class="col-sm-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Lending amount</th>
                                <th>	Interest (Acrued daily)</th>
                                <th>	Capital back</th>
                                <th>	Select Package</th>
                            </tr>
                        </thead>
                        <tbody id="append_package">

                        </tbody>
                    </table>
                </div>
           </div>
        </div>
        <div class="modal-footer">

            <input type="hidden" id="dataplanid" name="dataplanid">
            <input type="hidden" id="amount_with_interest" name="amount_with_interest">
            <input type="hidden" id="amount_entered" name="amount_entered">
            <input type="hidden" id="time_period" name="time_period">
            <input type="hidden" id="amount_interest" name="amount_interest">
            <input type="hidden" id="customerWalletAddress" name="customerWalletAddress" value="$2y$10$Tci277ISHgJIOrrTeftOg.3a/kDyDiMrXW9wqM20YLLJaKvMZaI6e">

        <button class="btn btn-success submit_lending" type="submit">
        SUBMIT</button>
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
          </div>
         </form>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.lendingbtn',function(){
        $('#strat_lending').modal('show');
    });
  });
  $(document).ready(function(){
    $(document).on('change','#package_based',function(){
       var packagename =$(this).val();
       $.ajax({
            type : "POST",
            url : '<?php echo base_url(); ?>lending/getpackage',
            data : 'package='+packagename,
            dataType: 'html',
            success : onSaveSuccess
            }); 
            function onSaveSuccess(data)
            { 
             $('#append_package').html(data);   
            }
    });
    $(document).on('blur','#show_ec_val',function(){
        mmbtucoin=$(this).val();
        var usdamt='68.7';
        var changeAmt=parseFloat(mmbtucoin)/parseFloat(usdamt);
        var setamount=changeAmt.toFixed(2);
        $('#get_usd_val').val(setamount);
        $('#amount_entered').val(mmbtucoin);
    });
    $(document).on('click','.selectthis',function(){
        var thischeck=$(this).val();
        var intest=$(this).attr('data-interest');
        var time_period=$(this).attr('data-period');
        var time_interest=$(this).attr('data-interest');
        var enterAmt=$('#show_ec_val').val();
        var calcAmt=parseFloat(intest)+parseFloat(enterAmt);
        $('#dataplanid').val(thischeck);
        $('#time_period').val(time_period);
        $('#amount_with_interest').val(calcAmt);
        $('#amount_interest').val(time_interest);
    });
  });
  </script>