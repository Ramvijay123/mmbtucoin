<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('header.php');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Update Package 
   
      </h1>
    
    </section>

    <!-- Main content -->
    <section class="content">
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Update Package</h3>
                 
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
             <div class="col-2"></div>
             <div class="col-10">
             <?php 
             $package_name='';
             $rangefrom='';
             $rangeto='';
             $amount='';
             $interest='';
             $period_time=''; 
             $ids='';
               foreach($updatepackagequery as $package){
                $package_name.=$package->package;
                $rangefrom.=$package->rangefrom;
                $rangeto.=$package->rangeto;
                $amount.=$package->amount;
                $interest.=$package->interest;
                $period_time.=$package->period_time;
                $ids.=$package->id;
                
               }
              ?>
        <form method="post" action="<?php echo base_url();?>admin/package/lendingUpdate/<?php echo $ids;?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Package Name</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $package_name;?>" placeholder="<?php echo $package_name;?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Range From</label>
    <input type="text" name="rangefrom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $rangefrom;?>" placeholder="<?php echo $rangefrom;?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Range To</label>
    <input type="text" name="rangeto" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $rangeto;?>" placeholder="<?php echo $rangeto;?>">
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">Amount</label>
    <input type="text" name="amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $amount;?>" placeholder="<?php echo $amount;?>">
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">Interest</label>
    <input type="text" name="interest" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $interest;?>" placeholder="<?php echo $interest;?>">
  </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Time Period</label>
    <input type="text" name="timeperiod" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $period_time;?>" placeholder="<?php echo $period_time;?>">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<div class="col-2"></div>
            <!-- /.box-body -->
          </div>
          
        </div>
      </div>
      </section>
      </div>
      <?php include('footer.php');?>
 