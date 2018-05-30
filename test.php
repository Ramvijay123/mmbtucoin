<?php 
//set currency
$currency = 'USD';
//get json response
$return = file_get_contents('http://data.mtgox.com/api/1/BTC'.$currency.'/ticker_fast');
//decode it (into an array rather than object [using 'true' parameter])
$info = json_decode($return, true);
//access the dollar value
$value = $info['return']['last_local']['value'];print_r($return);?>