<div class="row">
	<div class="col-md-12">
        <div class="pull-left">
            <a href="<?php echo base_url();?>order/add" class="btn btn-primary btn-sm" data-toggle="tooltip" 
            data-placement="top" title="Create Data">
            <i class="fa fa-plus"></i> Create New
            </a>
             <a href="javascript:document.getElementById('FormDelete').submit()" class="btn btn-danger btn-sm btn-delete-all" data-toggle="tooltip" 
                data-placement="top" title="Delete Data">
                <i class="fa fa-trash"></i> Delete
            </a>
        </div>
        <div class="pull-right">
        	 <a href="<?php echo base_url();?>order" class="btn btn-warning btn-sm" data-toggle="tooltip" 
                data-placement="top" title="Refresh">
                <i class="fa fa-refresh"></i> Refresh
            </a>
             <form method="POST" id="FormDelete" action="<?php echo base_url();?>order/delete">
               <input type="hidden" name="dataDeleted" id="dataDeleted" value="">
           </form>
        </div>
    </div>
    <hr>
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-hover table-striped table-bordered" id="TableCurrentOrder">
				<thead>
					<th><input type="checkbox" class="flat-red check-all"/></th>
					<th>No</th>
					<th>Order ID</th>
					<th>Date Order</th>
					<th>Table Reserved</th>
					<th>Total Qty</th>
					<th>Grand Total</th>
					<th>Action</th>
				</thead>
				<tbody>
					<?php $no = 1; foreach($data as $row): ?>
						<tr>
							<td><input type="checkbox" value="'.$row->id.'" class='flat-red'/></td>
							<td><?php echo $no;?></td>
							<td><?php echo 'ODR'.$row->transaction_number; ?></td>
							<td><?php echo my_date($row->created);?></td>
							<td><?php echo $this->order->ListTable($row->id);?></td>
							<td><?php echo count(json_decode($row->items));?></td>
							<td><?php echo price($row->grandtotal);?></td>
							<td><?php echo crud_action('order/',$row->id);?></td>
						</tr>	
					<?php $no++; EndForeach; ?>	
				</tbody>
			</table>
		</div>
	</div>
</div>