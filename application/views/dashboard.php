
 <div class="content-wrapper">

    <section class="content-header">

      <h1>Dashboard</h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>

        <li class="active">Here</li>

      </ol><br>

    </section>

    <!-- Main content -->
    <?php 
    $StdRemovalClass=get_object_vars($userdata[0]);
    $blnce=$StdRemovalClass['blance'];
    $wallet_address=$StdRemovalClass['wallet_address'];
    ?>

    <section class="content container-fluid">

		<div class="row">

        	<div class="col-md-6">

            	<div class="info-box text-center">

                	<div class="padding_20 bg-purple"><img src="<?php echo base_url();?>upload/images/logo.png" alt="image"></div>

                    <div class="padding_70"> 

                        <h3>MMBTU Coin</h3>  

                        <span class="info-box-number"><span style="border: 1px solid;"><?php echo ' '.$blnce.' ';?></span>&nbsp;&nbsp;&nbsp; MMBTU Coin Balance</span>
                        <span class="info-box-number"><span style="border: 1px solid;"><?php echo ' '.$wallet_address.' ';?></span>&nbsp;&nbsp;&nbsp; MMBTU Wallet Token</span>

                    </div>

                </div>

            </div>

            

            <div class="col-md-6">

            	<div class="info-box">

                    <span class="info-box-icon bg-yellow"><i class="fa fa-bitcoin"></i></span>

                    <div class="info-box-content">

                        <div class="col-sm-6">

                            <h3>Bitcoin</h3>

                            <span class="info-box-number">0.00000 BTC</span>

                        </div>

                        <div class="col-sm-6">
<?php 
$url = "https://bitpay.com/api/rates/USD";
$json = file_get_contents($url);
$BtcPrice=json_decode($json);
?>
                            <p>1 BTC = <?php echo $BtcPrice->rate; ?> USD</p>

                        </div>

                    </div>

                  </div>

            	<div class="info-box">

                    <span class="info-box-icon bg-blue"><img src="<?php echo base_url();?>upload/images/eth.png" alt="image"></span>

                    <div class="info-box-content">

                        <div class="col-sm-6">

                            <h3>ETHEREUMM</h3>

                            <span class="info-box-number">0.00000 ETH</span>

                        </div>
<?php 
$urlETH = "https://api.coinmarketcap.com/v1/ticker/ethereum/?convert=USD";
$jsonETH = file_get_contents($urlETH);
$ethPrice=json_decode($jsonETH);
$ETHUSD=$ethPrice[0]->price_usd;
?>
                        <div class="col-sm-6">

                            <p>1 ETH = <?php echo $ETHUSD;?> USD</p>

                        </div>

                    </div>

                </div>

                <!--<div class="info-box">

                    <span class="info-box-icon bg-green"><img src="<?php echo base_url();?>upload/images/ltc.png" alt="image"></span>

                    <div class="info-box-content">

                        <div class="col-sm-6">

                            <h3>Litecoin</h3>

                            <span class="info-box-number">0.00000 LTC</span>

                        </div>

                        <div class="col-sm-6">

                            <p>1 LTC = 117.20 USD</p>

                        </div>

                    </div>

                </div>-->

                <!--<div class="info-box">

                    <span class="info-box-icon bg-yellow"><i class="fa fa-bitcoin"></i></span>

                    <div class="info-box-content">

                        <div class="col-sm-6">

                            <h3>Bitcoin Cash</h3>

                            <span class="info-box-number">0.00000 BCH</span>

                        </div>

                        <div class="col-sm-6">

                            <p>1 BCH = 7085.65 USD</p>

                        </div>

                    </div>

                  </div>-->

            </div>            

        </div>

        <br>

        <!--<div class="box box-default padding_20">

        	<div class="box-body">

            	<h4>Share your Affiliate Link</h4>

                <form>

                	<div class="input-group input-group-lg">

                    	<input class="form-control" type="text" value="https://lkdkaialksadk.com/eidlaid/aladi/adkadi">

                        <div class="input-group-btn">

                    	<button type="button" class="btn bg-blue dropdown-toggle" data-toggle="dropdown">Copy</button>

                        </div>

                    </div>
 
                </form>

            </div>

        </div>-->

    </section>

  </div>