<div class="row" id="DetailTransaction">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <div class="box-title">
                    Detail Order
                </div>
                <input type="hidden" id="bill_size" value="<?php echo get_width_size();?>"/>
                <div class="box-tools">
                  <a class="btn btn-default btn-sm" href="<?php echo base_url('order');?>"><i class="fa fa-reply"></i> Back</a>
                  <a class="btn btn-default btn-sm" href="<?php echo base_url('order/add');?>"><i class="fa fa-plus"></i> Add New</a>
                  <?php if(!$paid): ?>
                    <a class="btn btn-default btn-sm" href="<?php echo base_url('order/edit/'.$payment->sales_id);?>"><i class="fa fa-edit"></i> Edit</a>
                    <a class="btn btn-default btn-sm delete" href="<?php echo base_url('order/delete/'.$payment->sales_id);?>"><i class="fa fa-trash"></i> Delete</a>
                  <?php EndIf; ?>  
                  <a class="btn btn-default btn-sm" href="#" id="DoPaid"><i class="fa fa-money"></i> Payment</a>
                  <a class="btn btn-default btn-sm" id="btn-bill" href="<?php echo base_url('order/bill/'.$payment->sales_id);?>"><i class="fa fa-print"></i> Print Bill</a>    
                </div>
            </div><!-- /.box-header -->
            <div class="box-body ">
                <div class="table-responsive">
                    <table class="table table-detail">
                      <tr>
                         <td>Order ID</td>
                         <td>ODR<?php echo $payment->transaction_number;?></td>
                         <td>Transaction Number</td>
                         <td><?php if($paid){ echo 'TRN'.$payment->transaction_number; }else { echo "-"; } ?></td>
                      </tr>
                      <tr>
                         <td>Date Order</td>
                         <td><?php echo my_date($date_reserved);?></td>
                         <td>Date Transaction</td>
                         <td><?php if($paid){ echo my_date($payment->transaction_date); }else { echo "-"; }  ?></td>
                      </tr>
                      <tr>
                         <td>Casheir</td>
                         <td><?php echo $payment->fullname;?></td>
                         <td>Table Reserved</td>
                         <td><?php echo $table;?></td>
                      </tr>
                      <tr>
                         <td>Member Name</td>
                         <td><?php echo $guest_name == null ? "-" : $guest_name;?></td>
                         <td>Transaction Type</td>
                         <td><?php if($paid){ echo transaction($payment->transaction_type); }else{ echo "-"; } ?></td>
                      </tr>
                      <?php if($paid && $payment->transaction_type=='0'): ?>
                      <tr>
                         <td>Cash</td>
                         <td><?php echo isset($paid->cash) ? price($paid->cash) : "-" ?></td>
                         <td>Change</td>
                         <td><?php echo isset($paid->change) ? price($paid->change) : "-" ?></td>
                      </tr>
                      <?php EndIf; ?>
                      <?php if($paid && $payment->transaction_type=='1'): ?>
                      <tr>
                         <td>Bank Name</td>
                         <td><?php echo isset($paid->bank_name) ? $paid->bank_name : "-" ?></td>
                         <td>Credit Card</td>
                         <td><?php echo isset($paid->credit_name) ? $paid->credit_name : "-" ?></td>
                      </tr>
                      <tr>
                         <td>Holder Number</td>
                         <td><?php echo isset($paid->holder_number) ? $paid->holder_number : "-" ?></td>
                         <td>Credit Card Number</td>
                         <td><?php echo isset($paid->credit_number) ? $paid->credit_number : "-" ?></td>
                      </tr>
                      <?php EndIf; ?>
                      <?php if($paid && $payment->transaction_type=='2'): ?>
                      <tr>
                         <td>Bank Name</td>
                         <td><?php echo isset($paid->bank_name) ? $paid->bank_name : "-" ?></td>
                         <td>Cheque Number</td>
                         <td><?php echo isset($paid->cheque_number) ? $paid->cheque_number : "-" ?></td>
                      </tr>
                      <?php EndIf; ?>
                  </table> 
                </div>

                <div class="table-responsive">
                  <table class="table  table-striped">   
                    <tr>
                       <td>No</td>
                       <td>Menu</td>
                       <td>Price</td>
                       <td>Qty</td>
                       <td>Total</td>
                    </tr>
                    <?php $i = 1; $data = json_decode($payment->items); foreach($data as $row): ?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $row->menu;?></td>
                      <td><?php echo price($row->price);?></td>
                      <td><?php echo $row->qty;?></td>
                      <td><?php echo price($row->total);?></td>
                    </tr>
                    <?php $i++; EndForeach; ?>
                    <tr>
                       <td colspan="4"><strong>Subtotal</strong></td>
                       <td><strong><?php echo price($payment->subtotal)?></strong></td>
                    </tr>
                    <tr>
                       <td colspan="4"><strong>Tax</strong></td>
                       <td><strong><?php echo price($payment->tax)?></strong></td>
                    </tr>
                    <tr>
                       <td colspan="4"><strong>Discount</strong></td>
                       <td><strong><?php echo price($payment->discount)?></strong></td>
                    </tr>
                    <tr>
                       <td colspan="4"><strong>Grandtotal</strong></td>
                       <td><strong><?php echo price($payment->grandtotal)?></strong></td>
                    </tr>
                </table>
                </div>
                
            </div><!-- /.box-body -->
        </div>
    </div>
</div>
<!--Modal Payment-->
<div class="modal fade" aria-hidden="true" role="dialog"  id="ModalPayment">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title"><i class="fa fa-calculator"></i> Payment Transaction</h4>
      </div>
      <div class="modal-body">
         <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#cash" data-toggle="tab" aria-expanded="true"><i class="fa fa-money"></i> Cash</a></li>
              <li class=""><a href="#credit" data-toggle="tab" aria-expanded="false"><i class="fa fa-credit-card"></i> Credit</a></li>
              <li><a href="#cheque" data-toggle="tab"><i class="fa fa-file-text-o"></i> Cheque</a></li>
            </ul>
            <div class="tab-content">
               <div class="tab-pane active" id="cash">
                   <form role="form" method="post" action="<?php echo base_url();?>order/payment">
                        <input type="hidden" name="id" value="<?php echo $payment->sales_id;?>"/>
                        <div class="form-group ">
                            <label for="table">Grand Total</label>
                            <input type="hidden" class="grandtotal" id="grandtotal" value="<?php echo $payment->grandtotal;?>"/>
                            <input class="form-control grandtotal_view" id="grandtotal_view" value="<?php echo $payment->grandtotal;?>"  type="text" readonly/>
                        </div>
                        <div class="form-group ">
                            <label for="table">Cash</label>
                            <input class="form-control price" id="cash_view" name="cash_view" placeholder="Nominal" type="text" required>
                        </div>
                        <div class="form-group ">
                            <label for="table">Change</label>
                            <input type="hidden" id="change" value="0"/>
                            <input class="form-control" id="change_view" name="change_view" value="0" type="text" readonly>
                        </div>
                        <div class="btn-group btn-group-justified">
                            <div class="btn-group">
                                <button type="submit" name="transaction_type" value="0" class="btn btn-primary"><i class="fa fa-save"></i>  Save</button>
                            </div>
                            <div class="btn-group">
                              <a href="<?php echo base_url();?>order/detail/<?php echo $payment->transaction_number;?>" class="btn btn-warning"><i class="fa fa-refresh"></i> Reset</a>
                            </div>
                        </div>
                    </form>
               </div>
                <div class="tab-pane" id="credit">
                     <form role="form" method="post" action="<?php echo base_url();?>order/payment">
                        <input type="hidden" name="id" value="<?php echo $payment->sales_id;?>"/>
                        <div class="form-group ">
                            <label for="table">Grand Total</label>
                            <input type="hidden" class="grandtotal" id="grandtotal" value="<?php echo $payment->grandtotal;?>"/>
                            <input class="form-control grandtotal_view" id="grandtotal_view" value="<?php echo $payment->grandtotal;?>"  type="text" readonly/>
                        </div>
                         <div class="form-group ">
                            <label for="table">Name Of Bank</label>
                            <select name="bank_id" id="bank_id" required="true" class="form-control" style="width:100%;" required> 
                            </select>
                        </div>
                        <div class="form-group ">
                            <label for="table">Credit Card</label>
                            <select name="creditcard_id" id="creditcard_id" required="true" class="form-control" style="width:100%;" required> 
                            </select>
                        </div>
                        <div class="form-group ">
                            <label for="table">Credit Card Number</label>
                            <input class="form-control credit_number" id="credit_number" name="credit_number" placeholder="Credit Number" type="text">
                        </div>
                        <div class="form-group ">
                            <label for="table">Holder Number</label>
                            <input class="form-control credit_number" id="holder_number" name="holder_number" placeholder="Holder Number" type="text">
                        </div>
                        <div class="btn-group btn-group-justified">
                            <div class="btn-group">
                                <button type="submit" name="transaction_type" value="1" class="btn btn-primary"><i class="fa fa-save"></i>  Save</button>
                            </div>
                            <div class="btn-group">
                               <a href="<?php echo base_url();?>order/detail/<?php echo $payment->transaction_number;?>" class="btn btn-warning"><i class="fa fa-refresh"></i> Reset</a>
                            </div>
                        </div>
                   </form>
               </div>
                <div class="tab-pane" id="cheque">
                    <form role="form" method="post" action="<?php echo base_url();?>order/payment">
                        <input type="hidden" name="id" value="<?php echo $payment->sales_id;?>"/>
                        <div class="form-group cash">
                           <label for="table">Grand Total</label>
                           <input type="hidden" class="grandtotal" id="grandtotal" value="<?php echo $payment->grandtotal;?>"/>
                           <input class="form-control grandtotal_view" id="grandtotal_view" value="<?php echo $payment->grandtotal;?>"  type="text" readonly/>
                        </div>
                        <div class="form-group cash">
                            <label for="table">Bank</label>
                            <select name="bank_id" id="bank_id2" required="true" class="form-control" style="width:100%;" required> 
                            </select>
                        </div>
                        <div class="form-group cheque">
                            <label for="table">No Cheque</label>
                            <input class="form-control " id="cheque_number" name="cheque_number" placeholder="Cheque Number" type="text">
                        </div>
                        <div class="btn-group btn-group-justified">
                            <div class="btn-group">
                                <button type="submit" name="transaction_type" value="2" class="btn btn-primary"><i class="fa fa-save"></i>  Save</button>
                            </div>
                            <div class="btn-group">
                                 <a href="<?php echo base_url();?>order/detail/<?php echo $payment->transaction_number;?>" class="btn btn-warning"><i class="fa fa-refresh"></i> Reset</a>
                            </div>
                        </div>
                    </form>
               </div>
            </div>
         </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>