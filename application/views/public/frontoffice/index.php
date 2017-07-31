<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo $data['today_order'];?></h3>
                <p>Pending Orders</p>
            </div>
            <div class="icon">
                <i class="fa fa-coffee"></i>
            </div>
            <a href="<?php echo base_url('order');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?php echo $data['today_sales'];?></h3>
                <p>Today Sales</p>
            </div>
            <div class="icon">
                <i class="fa fa-money"></i>
            </div>
            <a href="<?php echo base_url('order');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?php echo $data['current_member'];?></h3>
                <p>Current Members</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url('member');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?php echo $data['table_usage'];?><sup style="font-size: 20px">%</sup></h3>
                <p>Table Usage</p>
            </div>
            <div class="icon">
                <i class="fa fa-group"></i>
            </div>
            <a href="<?php echo base_url('table');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
</div><!-- /.row -->
<div class="row">
    <div class="col-lg-7" id="list_product">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">New Menu</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <ul class="products-list product-list-in-box">
                   <?php foreach($data['menu'] as $row): ?>
                     <li class="item">
                        <div class="product-img">
                            <img src="<?php echo file_exists($row->photo) ? base_url($row->photo) : base_url('assets/dist/img/default-50x50.gif') ; ?>" alt="Product Image">
                        </div>
                        <div class="product-info">
                            <a  class="product-title"><?php echo $row->menu_name;?> <span class="label label-success pull-right"><?php echo price($row->price)?></span></a>
                            <span class="product-description">
                                <?php echo $row->description!=null ?  $row->description : "<strong>No Description</strong>" ;?>
                            </span>
                        </div>
                    </li><!-- /.item -->
                   <?php EndForeach; ?> 
                </ul>
            </div><!-- /.box-body -->
            <div class="box-footer text-center">
                <a href="<?php echo base_url('menus');?>" class="uppercase">See More Menu</a>
            </div><!-- /.box-footer -->
        </div><!-- /.box -->
    </div>
    <div class="col-lg-5" id="chart_menu">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Top Menu</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="chart-responsive">
                            <canvas id="pieChart" height="150"></canvas>
                        </div><!-- ./chart-responsive -->
                    </div><!-- /.col -->
                    <div class="col-md-6">
                        <ul class="chart-legend clearfix" id="legend_chart">
                        </ul>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.box-body -->
            <div class="box-footer no-padding">
                <ul class="nav nav-pills nav-stacked" id="legend_text">
                </ul>
            </div><!-- /.footer -->
        </div><!-- /.box -->
    </div>
</div>
<script type="text/javascript">
    var chart = <?php echo $data['pie_chart'];?>;
</script>