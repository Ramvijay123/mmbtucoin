<?php 
 $balance='';
foreach($userdata as $dataall){
$balance=$dataall->blance;
}

$url = "https://bitpay.com/api/rates/USD";
$json = file_get_contents($url);
$BtcPrice=json_decode($json);



$urlETH = "https://api.coinmarketcap.com/v1/ticker/ethereum/?convert=USD";
$jsonETH = file_get_contents($urlETH);
$ethPrice=json_decode($jsonETH);
$ETHUSD=$ethPrice[0]->price_usd;

?>

<style>



.exchange-exchange-header{

        padding: 13px 15px;

    background-color: rgba(0,0,0,0.03);

    border-bottom: 1px solid rgba(0,0,0,0.125);

        color: black;

    font-weight: bold;

}

th{

    color: black !important;

}

.exchange{

    position: relative;

    display: -webkit-box;

    display: -ms-flexbox;

    display: flex;

    -webkit-box-orient: vertical;

    -webkit-box-direction: normal;

    -ms-flex-direction: column;

    flex-direction: column;

    min-width: 0;

    word-wrap: break-word;

    background-color: #fff;

    background-clip: border-box;

    border: 1px solid rgba(0,0,0,0.125);

    border-radius: 0.25rem;

}

.exchange-body{

        -webkit-box-flex: 1;

    -ms-flex: 1 1 auto;

    flex: 1 1 auto;

    padding: 1.25rem;

}

label{

    display: inline-block;

    margin-bottom: .5rem;

        padding: 12px 0px;

        color: black;

}

.input-group{





    width: 100%;

}

h4{

        font-size: 21px;

    font-weight: bold;

    color: black;

}

.blncbox {

    /*	background:#f39c12 ;

	color:#fff;*/

}

.blncbox1 {

  /*  border: 1px solid #b3b3b3;

    padding: 5px;



    font-size:15px;*/

}

.btn-success

{

    background: #2f2f2f !important;

        border: 1px solid #2f2f2f !important;

}

</style>

<style>

.active_wallet{

         background: #eaaa4c;

    border: 1px solid #eaaa4c;

    color: white;

        cursor: default;

}

.active_wallet1{

         background: #eaaa4c;

    border: 1px solid #eaaa4c;

    color: white;

        cursor: default;

}

</style>



<?php 

$priceset='';

foreach($mmbtucoin_price as $coin_price){

    $priceset.=$coin_price->coinprice;

}

?><!-- Contentt -->

  <div class="content-wrapper">

    <section class="content-header">

      <h1>Exchange</h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li class="active">Lending</li>

      </ol><br>

    </section>

    <!-- Main content -->

    <section class="content container-fluid">

        <div class="row">

        	<div class="col-md-3">

                <div class="info-box exchange_coin padding_20">

                	<span class="info-box-icon bg-yellow"><i class="fa fa-bitcoin"></i></span>

                    <h3>Bitcoin</h3>

                    <p>1 BTC = <?php echo $BtcPrice->rate; ?> USD</p>

                </div>

            </div>

            <div class="col-md-3">

                <div class="info-box exchange_coin padding_20">

                	<span class="info-box-icon bg-blue"><img src="<?php echo base_url();?>assests/images/eth.png" alt="image"></span>

                    <h3>ETHEREUMM</h3>

                    <p>1 ETH = <?php echo $ETHUSD;?> USD</p>

                </div>

            </div>

            <div class="col-md-3">

                <div class="info-box exchange_coin padding_20">

                	<span class="info-box-icon bg-green"><img src="<?php echo base_url();?>assests/images/logo.png" alt="image"></span>

                    <h3>MMBTUCOIN</h3>

                    <p>1 MMBTU = <?php echo $priceset; ?> USD</p>

                </div>

            </div>

            <!--<div class="col-md-3">

                <div class="info-box exchange_coin padding_20">

                	<span class="info-box-icon bg-yellow"><i class="fa fa-bitcoin"></i></span>

                    <h3>Bitcoin Cash</h3>

                    <p>1 BCH = 7085.65 USD</p>

                </div>

            </div>-->

		</div>  

        

        <div class="row">

        	<div class="col-md-6">

            	<div class="box box-default padding_20">

                	<div class="box-title">

                    	<h3 class="pull-left">Buy MMBTU</h3>

                        <p class="pull-right">MMBTU Balance:<?php echo $balance;?></p>

                    </div>

                    <table class="table table-bordered exchange_table">

                    	<tr>

                        	<td class="blncbox walletname active_wallet " data-text="MMBTU">

                            	<p style="color: black;">Wallet</p>

                            	<p style="color: black;">Name: MMBTU</p>

                           	 	<p style="color: black;">Balance: <?php echo $balance;?></p>

                            </td>

                            <!--<td class="blncbox walletname" data-text="ETH">

                            	<p style="color: black;">Wallet</p>

                            	<p style="color: black;">Name: ETH</p>

                           	 	<p style="color: black;">Balance: 0,00</p>

                            </td>-->

                           

                        </tr>

                    </table>

                    
  
                    <form method="post" action="<?php base_url();?>Exchange/buytoken">
                    	<div class="form-group">
                        	<h4><strong>Amount</strong></h4>
                            <div class="input-group form-group">
                              <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                              <input type="text" name="buy_rate" id="buyprice" class="form-control" placeholder="0.0">
                              <span class="input-group-addon showwalletname">USD</span>
                              <input type="hidden" name="current_rate" id="mmbtu_rate" value="<?php echo $priceset; ?>"/>
                            </div>
                        </div>
                        <!--<div class="form-group">
                        	<h4><strong>Amount</strong></h4>
                            <div class="input-group form-group">
                              <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                              <input type="text" id="buyamount" class="form-control" placeholder="0.0">
                              <span class="input-group-addon">MMBTU</span>
                            </div>
                        </div>-->
                        <div class="form-group">
                        	<h4><strong>Total</strong></h4>
                            <div class="input-group form-group">
                              <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                              <input type="text" id="totalamount" readonly="" name="totalrate" class="form-control" placeholder="0.0">
                              <span class="input-group-addon">MMBTU</span>
                            </div>
                        </div>
                        <span class="mr-3" id="show_charge_fee"></span>
                        <input type="submit" id="confirmbuywnc" value="Buy" class="btn btn-sm">
                    </form>
                </div>
            </div>

            

            <div class="col-md-6">

            	<div class="box box-default padding_20">

                	<div class="box-title">

                    	<h3 class="pull-left">Sell MMBTU</h3>

                        <p class="pull-right">MMBTU Balance:<?php echo $balance;?></p>

                    </div>

                    <table class="table table-bordered exchange_table">

                    	<tr>

                        	<td class="blncbox1 walletname active_wallet1" data-text="BTH">

                            	<p style="color: black;">Wallet</p>

                            	<p style="color: black;">Name: MMBTU</p>

                           	 	<p style="color: black;">Balance: <?php echo $balance;?></p>

                            </td>

                            <!--<td class="blncbox1 walletname" data-text="ETH">

                            	<p style="color: black;">Wallet</p>

                            	<p style="color: black;">Name: ETH</p>

                           	 	<p style="color: black;">Balance: 0,00</p>

                            </td>-->

                            

                        </tr>

                    </table>

                    <p style="color: red;"><?php echo $this->session->flashdata('login_error');?></p>

                    <form method="post" action="<?php echo base_url();?>Exchange/selltoken">
                        <input type="hidden" name="current_rate" id="mmbtu_rate" value="<?php echo $priceset; ?>"/>
                        <input type="hidden" name="currentMMbtuBlnce" id="currentMMbtuBlnce" value="<?php echo $balance;?>"/>
                    	<div class="form-group">

                        	<h4><strong>Amount</strong></h4>

                            <div class="input-group form-group">

                              <span class="input-group-addon"><i class="fa fa-globe"></i></span>

                              <input type="text" id="sell_price" name="sell_price" class="form-control" placeholder="0.0">

                              <span class="input-group-addon showwalletname1">MMBTU</span>

                            </div>

                        </div>

                        

                        <!--<div class="form-group">

                        	<h4><strong>Amount</strong></h4>

                            <div class="input-group form-group">

                              <span class="input-group-addon"><i class="fa fa-globe"></i></span>

                              <input type="text" id="sell_amount" class="form-control" placeholder="0.0">

                              <span class="input-group-addon">MMBTU</span>

                            </div>

                        </div>-->

                        

                        <div class="form-group">

                        	<h4><strong>Total</strong></h4>

                            <div class="input-group form-group">

                              <span class="input-group-addon"><i class="fa fa-globe"></i></span>

                              <input type="text" id="sell_total" readonly="" name="sell_total" class="form-control" placeholder="0.0">

                              <span class="input-group-addon">USD</span>

                            </div>

                        </div>

                        <span class="mr-3" id="show_charge_feeSell"></span>

                        <input type="submit" id="sell_btn" disabled="" value="Sell" class="btn btn-sm">

                    </form>

                </div>

            </div>

        </div>  

    </section>

  </div>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <script type="text/javascript">

  $(document).ready(function(){

    $(document).on('blur','#buyprice',function(){

        var usd_amount=$(this).val();

        var mmbtu_rate=$('#mmbtu_rate').val();

        var getmmbtu=parseFloat(usd_amount)/parseFloat(mmbtu_rate);

        $('#totalamount').val(getmmbtu);

        

    });

     $(document).on('blur','#sell_price',function(){

        var usd_amount=parseFloat($(this).val());

        var mmbtu_rate=$('#mmbtu_rate').val();
        
        var currentMMbtuBlnce=parseFloat($('#currentMMbtuBlnce').val());
        if(currentMMbtuBlnce>=usd_amount){
            var getmmbtu=parseFloat(usd_amount)*parseFloat(mmbtu_rate);
            $('#sell_total').val(getmmbtu);
            $('#show_charge_feeSell').html('');
            $('#sell_btn').attr('disabled',false);
        }else{
            $('#show_charge_feeSell').html('Insufficient Balance');
            $('#show_charge_feeSell').css('color','red');
            $('#sell_btn').attr('disabled',true);
        }

        

        

    });

    /*$(document).on('click','#confirmbuywnc',function(e){
        e.preventDefault();
       var buyrate=$('#buyprice').val(); 
       var totalrate=$('#totalamount').val(); 
       var current_rate=$('#mmbtu_rate').val();
       var stingData='buy_rate='+buyrate+'&totalrate='+totalrate+'&current_rate='+current_rate;
       $.ajax({ 
    url:'<?php echo base_url();?>'+'Exchange/buytoken',
    data:stingData,
    method:'POST',
    success: function(result){
    }
 });

    });*/

  });
  </script>

 