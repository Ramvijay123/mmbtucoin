
  <!-- Contentt -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Order</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Order</li>
      </ol><br>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
    	<div class="row">
        	<div class="col-md-6">
            	<div class="box table-responsive box-default padding_20">
                    <div class="box-header">
                      <h3>Buying Orders</h3>
                    </div>
                    <div class="box-body">
                      <div class="table_header">
                        <div class="row">
                            <div class="col-sm-6">
                                <p>Show 
                                    <select class="form-control">
                                        <option>10</option>
                                        <option>20</option>
                                        <option>50</option>
                                        <option>100</option>
                                    </select>
                                    entries</p>
                            </div>
                            <div class="col-sm-6 text-right">
                                <p>Search <input type="text" class="form-control"></p>
                            </div>
                        </div>
                      </div>
                      <table class="table table-bordered">
                        <thead>
                            <tr>
                              <th>S.No</th>
                              <th>Currency</th>
                              <th>Price</th>
                              <th>Amount</th>
                              <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1;
                         foreach($buydata as $buyrecord){ ?>
                             <tr>
                              <td><?php echo $i;?></td>
                              <td><?php echo $buyrecord->currency;?></td>
                              <td><?php echo $buyrecord->price;?></td>
                              <td><?php echo $buyrecord->amount;?></td>
                              <td></td>
                            </tr><?php $i++;}
                            if($i==1){?>
                              <tr><td colspan="5">There is no data in this record</td></tr>  
                           <?php  }
                            ?>
                        </tbody>
                      </table>
                      
                      <div class="table_footer">
                        <div class="row">
                            <div class="col-sm-6">
                                <p>Showing 0 to 0 of 0 entries</p>
                            </div>
                            <div class="col-sm-6 text-right">
                                <nav>
                                  <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                  </ul>
                                </nav>
                            </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>
            </div>
            <div class="col-md-6">
            	<div class="box box-default table-responsive padding_20">
                    <div class="box-header">
                      <h3>Selling Orders</h3>
                    </div>
                    <div class="box-body">
                      <div class="table_header">
                        <div class="row">
                            <div class="col-sm-6">
                                <p>Show 
                                    <select class="form-control">
                                        <option>10</option>
                                        <option>20</option>
                                        <option>50</option>
                                        <option>100</option>
                                    </select>
                                    entries</p>
                            </div>
                            <div class="col-sm-6 text-right">
                                <p>Search <input type="text" class="form-control"></p>
                            </div>
                        </div>
                      </div>
                      <table class="table table-bordered">
                        <thead>
                            <tr>
                              <th>S.No</th>
                              <th>Currency</th>
                              <th>Price</th>
                              <th>Amount</th>
                              <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1;
                         foreach($selldata as $sellrecord){ ?>
                             <tr>
                              <td><?php echo $i;?></td>
                              <td><?php echo $sellrecord->currency;?></td>
                              <td><?php echo $sellrecord->price;?></td>
                              <td><?php echo $sellrecord->amount;?></td>
                              <td></td>
                            </tr><?php $i++;}
                            if($i==1){?>
                              <tr><td colspan="5">There is no data in this record</td></tr>  
                           <?php  }
                            ?>
                        </tbody>
                      </table>
                      
                      <div class="table_footer">
                        <div class="row">
                            <div class="col-sm-6">
                                <p>Showing 0 to 0 of 0 entries</p>
                            </div>
                            <div class="col-sm-6 text-right">
                                <nav>
                                  <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                  </ul>
                                </nav>
                            </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>
            </div>
        </div>
    </section>
  </div>
