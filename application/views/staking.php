<!-- Contentt -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Staking Pool</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Staking Pool</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
    	<div class="row">      
        	<div class="col-md-3">    
                <div class="box box-default padding_20 investment_box">
                    <div class="box-body">
                       <span class="investment_icons"> <i class="fa fa-user"></i></span>
                       <p>Total MMBTU Staking</p>
                       <p><strong>$0.00 MMBTU</strong></p>
                    </div>
                </div> 
             </div>
             <div class="col-md-3">    
                <div class="box box-default padding_20 investment_box">
                    <div class="box-body">
                       <span class="investment_icons"> <i class="fa fa-dollar"></i></span>
                       <p>Active MMBTU Staking</p>
                       <p><strong>$0.00 MMBTU</strong></p>
                    </div>
                </div> 
             </div>
             <div class="col-md-3">    
                <div class="box box-default padding_20 investment_box">
                    <div class="box-body">
                       <span class="investment_icons"> <i class="fa fa-money"></i></span>
                       <p>Total MMBTU Released</p>
                       <p><strong>$0.00 MMBTU</strong></p>
                    </div>
                </div> 
             </div>
             <div class="col-md-3">    
                <div class="box box-default padding_20 investment_box">
                    <div class="box-body">
                       <span class="investment_icons"> <i class="fa fa-signal"></i></span>
                       <p>Total MMBTU Earned</p>
                       <p><strong>$0.00 MMBTU</strong></p>
                    </div>
                </div> 
             </div>     
        </div>
        <button class="btn btn-success">Start Stacking</button>
        
        <div class="box box-default padding_20">
            <div class="box-body">
            	<h3>Your Staking Packages</h3>
                <div class="table-responsive">
                	<table class="table table-bordered">
                    	<thead>
                        	<tr>
                            	<th>Staking ID</th>
                                <th>Amount </th>
                                <th>Total Earned</th> 
                                <th>Start Date</th>
                                <th>Release Date</th> 
                            </tr>
                        </thead>
                        <tbody>
                        	<tr>
                            	<td colspan="5">No Data Available</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>    
    </section>
  </div>
  <div class="modal fade in" id="stacking" role="dialog" style="display: block;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="text-align: center;">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">STAKING</h4>
                    <h3>EXN Wallet Balance: 0.00000000EXN</h3>
          <input type="hidden" class="wallet_bal" value="0.00000000">
          <input type="hidden" class="duration" value="78 ">
          <input type="hidden" class="interest" value="89 ">
          <input type="hidden" class="min_amt" value="8 ">
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Amount</label>
            <input type="text" class="form-control amount" placeholder="1.000000">
            <span style="color: red;font-weight: bold;display:none;" id="error_message_ico_purchase"></span>
          </div>
          <ul class="notice">
                  <li>Your EXN will be locked for 78 days.</li>
                        <li>You will earn approximately 89% new EXN per month.</li>
                        <li>Your earned EXN will be credited to your EXN balance twice a day.</li>

                    </ul>
        </div>
        <div class="modal-footer">
        <button class="btn btn-success submit_btn" type="button" disabled="disabled">SUBMIT</button>
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>