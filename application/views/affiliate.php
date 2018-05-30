<?php include('header.php');
$username=$userdata['username'];
?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Affailate</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Affailate</li>
      </ol><br>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
		<div class="box box-default padding_20">
        	<div class="box-body">
            	<div class="text-center">
	            	<h2>My Referals</h2>
                </div>
                <div class="referals_wrap">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info-box exchange_coin padding_20">
                                <span class="info-box-icon bg-yellow"><i class="fa fa-sitemap"></i></span>
                                <h3>My Referals</h3>
                                <p>0</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-box exchange_coin padding_20">
                                <span class="info-box-icon bg-blue"><i class="fa fa-sitemap"></i></span>
                                <h3>Active Referals</h3>
                                <p>0</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-box exchange_coin padding_20">
                                <span class="info-box-icon bg-green"><i class="fa fa-dollar"></i></span>
                                <h3>Commission Active Referals</h3>
                                <p>0</p>
                            </div>
                        </div>
                    </div>
                </div>
        
				<div class="table-responsive">
                	<table class="table table-bordered">
                        <thead>
                            <tr>
                              <th>Registartion Date</th>
                              <th>Full Name</th>
                              <th>Referral Email</th>
                              <th>Referal Lave</th>
                              <th>Regeral Bonus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                              <td colspan="5">There is no people on your side</td>
                            </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
        <br>
        <div class="box box-default padding_20">
        	<div class="box-body">
            	<h4>Share your Affiliate Link</h4>
                <form>
                	<div class="input-group input-group-lg">
                    	<input class="form-control" id="usernamecopied" type="text" value="http://mmbtucoin.com/mmbtucoin/login/register/<?php echo $username; ?>">
                        <div class="input-group-btn">
                    	<button type="button" onclick="myFunction()" class="btn bg-blue dropdown-toggle" data-toggle="dropdown">Copy</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="box box-default padding_20">
        	<div class="box-body">
            	<div class="text-center">
	            	<h2>ICO Referal Commisson</h2>
                </div>
                <div class="affalite_level">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info-box level_box padding_20">
                            	<span class="level_tag">Level 1</span>
                                <div class="level_info"><p>10%</p></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-box level_box padding_20">
                            	<span class="level_tag">Level 2</span>
                                <div class="level_info"><p>6%</p></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-box level_box padding_20">
                            	<span class="level_tag">Level 3</span>
                                <div class="level_info"><p>4%</p></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                	<table class="table table-bordered">
                        <thead>
                            <tr>
                              <th>Registartion Date</th>
                              <th>Full Name</th>
                              <th>Referral Email</th>
                              <th>Referal Lave</th>
                              <th>Regeral Bonus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                              <td colspan="5">There is no people on your side</td>
                            </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </section>
  </div>
  <?php include('footer.php');?>
  <script>
function myFunction() {
  var copyText = document.getElementById("usernamecopied");
  copyText.select();
  document.execCommand("Copy");
}
</script>