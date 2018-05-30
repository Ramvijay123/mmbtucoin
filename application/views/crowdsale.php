<!-- Contentt -->
<?php 
$url = "https://bitpay.com/api/rates/USD";
$json = file_get_contents($url);
$BtcPrice=json_decode($json);

$urlETH = "https://api.coinmarketcap.com/v1/ticker/ethereum/?convert=USD";
$jsonETH = file_get_contents($urlETH);
$ethPrice=json_decode($jsonETH);
$ETHUSD=$ethPrice[0]->price_usd;
?>
  <div class="content-wrapper">

    <section class="content-header">

      <h1>Dashboard</h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li class="active">Join Crowdsale</li>

      </ol><br>

    </section>

    <!-- Main content -->

    <section class="content container-fluid">

    	<div class="row">

        	<div class="col-md-3">

                <div class="info-box padding_20">

                    <h3>Bitcoin</h3>

                    <span class="info-box-number">0.00000 BTC</span>

                    <p>1 BTC = <?php echo $BtcPrice->rate; ?> USD</p>

                </div>

            </div>

            <div class="col-md-3">

                <div class="info-box padding_20">

                    <h3>ETHEREUM</h3>

                    <span class="info-box-number">0.00000 ETH</span>

                    <p>1 ETH = <?php echo $ETHUSD;?> USD</p>

                </div>

            </div>

            <!--<div class="col-md-3">

                <div class="info-box padding_20">

                    <h3>Litecoin</h3>

                    <span class="info-box-number">0.00000 LTC</span>

                    <p>1 LTC = 117.20 USD</p>

                </div>

            </div>

            <div class="col-md-3">

                <div class="info-box padding_20">

                    <h3>Bitcoin Cash</h3>

                    <span class="info-box-number">0.00000 BCH</span>

                    <p>1 BCH = 7085.65 USD</p>

                </div>

            </div>-->

		</div>          

          

        <div class="box box-default padding_20">

        	<div class="box-body">

            	<div class="buy_token">

                    <div class="text-center">

                        <h2>Buy MMBTU Coin Tokens</h2>

                    </div>

                    <form>

                        <div class="form-group">

                            <div class="row">

                                <div class="col-xs-3"><label><input type="radio" name="coin_group" value="radio" id="coiinGroup1_0"> Bitcoin</label></div>

                                <div class="col-xs-3"><label><input type="radio" name="coin_group" value="radio" id="coiinGroup1_2"> Ethereum</label></div>

                                <div class="col-xs-3"><label><input type="radio" name="coin_group" value="radio" id="coiinGroup1_3"> Litecoin</label></div>

                                <div class="col-xs-3"><label><input type="radio" name="coin_group" value="radio" id="coiinGroup1_4"> Bitcoin Cash</label></div>

                            </div>

                        </div>

                        <div class="form-group">

                        	<div class="row">

                            	<div class="col-md-6">

                                	<label>MMBTU Tokens</label>

                                    <input type="text" class="form-control">

                                </div>

                                <div class="col-md-6">

                                	<label>Amount to pay in BTC</label>

                                    <input type="text" class="form-control">

                                </div>

                            </div>

                        </div>

                        <p>Your MMBTU tokens will be credited in about 1 to 2 hours after payment.</p><br>

                        <div class="form-group text-center">

                        	<input type="submit" value="Submit" class="btn">

                        </div>

                    </form>

                 </div>   

            </div>

        </div>

        

        <div class="box box-default padding_20">

        	<div class="box-body">

            	<div class="buy_token">

                    <div class="text-center">

                        <h3>My Contribution</h3>

                    </div>

                    <div class="table-responsive">

        	            <table class="table table-bordered">

    	    				<thead>

                            	<tr>

                                	<th>Date</th>

                                    <th>Method</th>

                                    <th>Amount (MMBTU)</th>

                                    <th>Value</th>

                                </tr>

                            </thead> 

                            <tbody>

                            	<tr>

                                	<td></td>

                                    <td></td>

                                    <td>0</td>

                                    <td>0</td>

                                </tr>

                            </tbody>           	

	                    </table>

                    </div>

                 </div>   

            </div>

        </div>

    </section>

  </div>