<div class="row">
	<div class="col-md-12">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
                <?php $i=1; foreach($data as $row): ?>
                	<?php $active = null; if($i==1){ $active = 'active';  } ?>
                	<li class="<?php echo $active;?>"><a href="#tab<?php echo $i;?>" data-toggle="tab"><?php echo $row->room_name;?></a></li>
                <?php $i++; EndForeach;?> 	
            </ul>
          	<div class="tab-content">
          		<?php $i=1; foreach($data as $row): ?>
                	<?php $active = null; if($i==1){ $active = 'active';  } ?>
                	<div class="<?php echo $active;?> tab-pane" id="tab<?php echo $i;?>">

                	<?php $table = get_table($row->id); ?>
                		
                	<div class="row">
                		<?php foreach($table as $t): ?>
                		<div class="col-xs-18 col-sm-5 col-md-2">
				          <div class="thumbnail">
				             <img src="<?php echo base_url();?>assets/dist/img/table.jpg" alt="">
				             <div class="caption text-center">
				                <h4><?php echo strtoupper($t->code)?></h4>
				                <?php if($t->is_empty=='1'): ?>
				                	<p><span class="label label-primary">Empty</span></p>
				                <?php Else: ?>
				                	 <p><span class="label label-danger">Reserved</span></p>
				                <?php EndIf; ?>	
				               <!--  <p><a href="#" class="btn btn-info btn-xs" role="button">Button</a></p> -->
				            </div>
				          </div>
				        </div>
				        <?php EndForeach; ?>
                	</div>

                	</div>
                <?php $i++; EndForeach;?> 	
          	</div>
		</div>
	</div>
</div>