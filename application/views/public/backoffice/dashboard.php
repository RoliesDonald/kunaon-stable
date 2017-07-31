<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-maroon">
            <div class="inner">
                <h3><?php echo $pin_transaction;?></h3>
                <p>Transaction</p>
            </div>
            <div class="icon">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="<?php echo base_url('backoffice/report/sales/period');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-orange">
            <div class="inner">
                <h3><?php echo $pin_branch;?></h3>
                <p>Branch</p>
            </div>
            <div class="icon">
                <i class="fa fa-map-marker"></i>
            </div>
            <a href="<?php echo base_url('backoffice/report/sales/branch');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-purple">
            <div class="inner">
                <h3>$ <?php echo price($pin_net_sales);?></h3>
                <p>Net Sales</p>
            </div>
            <div class="icon">
                <i class="fa fa-money"></i>
            </div>
            <a href="<?php echo base_url('backoffice/report/sales/payment');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-olive">
            <div class="inner">
                <h3><?php echo $pin_menu;?></h3>
                <p>Menu Sold</p>
            </div>
            <div class="icon">
                <i class="fa fa-cutlery"></i>
            </div>
            <a href="<?php echo base_url('backoffice/report/sales/menu');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
</div><!-- /.row -->
<div class="row">
    <div class="col-md-4">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-credit-card"></i> Payment Method</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="chart-responsive">
                             <canvas id="pie_payment_chart"></canvas>
                        </div><!-- ./chart-responsive -->
                    </div><!-- /.col -->
                    <div class="col-md-4">
                        <ul class="chart-legend clearfix" id="pie_payment_legend">
                        </ul>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.box-body -->
            <div class="box-footer no-padding">
                <ul class="nav nav-pills nav-stacked" id="pie_payment_text">
                </ul>
            </div><!-- /.footer -->
        </div><!-- /.box -->
    </div>
    <div class="col-md-8">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-shopping-cart"></i> Last Transaction</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <table class="table table-hover table-striped table-bordered" width="100%" cellspacing="0" id="">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Date Transaction</th>
                            <th>Casheir</th>
                            <th>Table Reserved</th>
                            <th>Payment Type</th>
                            <th>Grand Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($transaction)>0): ?>
                        <?php $i = 1; foreach($transaction as $row): ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo my_date($row->transaction_date);?></td>
                            <td><?php echo $row->fullname;?></td>
                            <td><?php echo $this->order->ListTable($row->id);?></td>
                            <td><?php echo transaction($row->transaction_type);?></td>
                            <td><?php echo price($row->grandtotal);?></td>
                        </tr>   
                        <?php $i++; EndForeach; ?>   
                        <?php Else : ?>
                        <tr>
                            <td colspan="6" class="text-center">No Data</td>
                        </tr> 
                        <?php EndIf; ?>
                    </tbody>
                </table>    
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>
<div class="row">
     <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-bar-chart"></i>  Sales Chart</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body ">
             <div class="chart">
                <canvas id="barChart"></canvas>
              </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>
<script type="text/javascript">
    var pie_payment = <?php echo $pie_payment;?>;
    var barchart = <?php echo $barchart;?>;
</script>