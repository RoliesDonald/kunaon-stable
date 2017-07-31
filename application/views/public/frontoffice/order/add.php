<div class="row" id="TableOrder">
    <div class="col-lg-6">
        <div class="box">
            <div class="box-header with-border">
                <div class="box-title">
                    List  Menu
                </div>
                <div class="box-tools">
                    <form id="FormSearch">
                        <div class="input-group" style="">
                            <input name="search" id="text-search" class="form-control input-sm pull-right" placeholder="Search..." type="text">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body no-padding" id="MenuArea">
                <div id="MenuLoader">
                    <img src="<?php echo base_url().'assets/dist/img/loading.gif';?>">
                </div>
                <div id="MenuList">
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
                <div class="btn-group dropup ">
                    <button type="button" class="btn btn-sm btn-default" id="txt-category">Category</button>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" 
                            data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <?php foreach ($category as $row): ?>
                            <li><a href="#" onclick="Order.LoadMenu(document.getElementById('text-search').value,'<?php echo $row->id_main; ?>','<?php echo $row->category_name; ?>')"><?php echo $row->category_name; ?></a></li>
                            <?php EndForeach; ?>  
                        <li class="divider"></li>
                        <li><a href="#" onclick="Order.LoadMenu()">All Category</a></li>
                    </ul>
                </div>
                  <a href="<?php echo base_url(); ?>order/add" class="btn btn-default btn-sm pull-right" data-toggle="tooltip" 
                   data-placement="top" title="Reset">
                    <i class="fa fa-refresh"></i> Reset
                </a> 
            </div>
        </div><!-- /.box -->
    </div>
    <div class="col-lg-6">
        <div class="box">
            <div class="box-header with-border">
                <div class="box-title">
                    Detail Bill
                </div>
                <div class="box-tools">
                    <label id="box-time"></label>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body" id="MenuBill">
                <div class="table-responsive">
                    <input type="hidden" id="tax" value="<?php echo setting('com_tax'); ?>"/>
                    <input type="hidden" id="discount" value="<?php echo setting('com_discount'); ?>"/>
                    <table class="table table-hover" id="TableBill">
                        <thead>
                            <tr>
                                <th>Menu</th>
                                <th>Price</th>
                                <th align="center">Qty</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><strong>Subtotal</strong></td>
                                <td></td>
                                <td></td>
                                <td colspan="2"><strong id="t_subtotal"></strong></td>
                            </tr>
                            <tr>
                                <td><strong>Tax <small> (<?php echo setting('com_tax'); ?>%)</small></strong></td>
                                <td></td>
                                <td></td>
                                <td colspan="2"><strong id="t_tax"></strong></td>
                            </tr>
                            <tr>
                                <td><strong>Discount <small>(<?php echo setting('com_discount'); ?>%)</small></strong></td>
                                <td></td>
                                <td></td>
                                <td colspan="2"><strong id="t_discount"></strong> </td>
                            </tr>
                            <tr>
                                <td><strong>Grandtotal</strong></td>
                                <td></td>
                                <td></td>
                                <td colspan="2"><strong id="t_grandtotal"></strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
                <div class="btn-group">
                   <a href="#" id="btn-member" class="btn btn-default btn-sm" onclick="Order.SelectMember()" data-toggle="tooltip" 
                   data-placement="top" title="Member">
                    <i class="fa fa-users"></i> Choose Member
                 </a> 
                  <a class="btn btn-sm btn-default" onclick="Order.ResetMember()" data-toggle="tooltip" 
                   data-placement="top" title="Cancel">
                     <i class="fa fa-close"></i>
                   </a>
                </div>
                <div class="btn-group">
                   <a href="#" id="btnSelectTable" onclick="Order.SelectTable()" class="btn btn-default btn-sm" data-toggle="tooltip" 
                   data-placement="top" title="Choose Table">
                    <i class="fa fa-arrows"></i> Choose Table
                   </a> 
                   <a class="btn btn-sm btn-default" onclick="Order.ResetTable()"  data-toggle="tooltip" 
                   data-placement="top" title="Clear Table">
                     <i class="fa fa-close"></i>
                   </a>
                </div>
                <a href="javascript:document.getElementById('FormSubmit').submit()" class="btn btn-default btn-sm pull-right" data-toggle="tooltip" 
                   data-placement="top" title="Save Order">
                    <i class="fa fa-save"></i> Save Order
                </a> 
            </div>
        </div><!-- /.box -->
    </div>
</div>

<!-- FormSubmit -->
<form method="POST" action="<?php echo base_url();?>order/save" id="FormSubmit">
    <input type="hidden" id="InputBill" name="InputBill"/>
    <input type="hidden" id="InputTable" name="InputTable"/>
    <input type="hidden" id="InputSubTotal" name="InputSubTotal"/>
    <input type="hidden" id="InputTax" name="InputTax"/>
    <input type="hidden" id="InputDiscount" name="InputDiscount"/>
    <input type="hidden" id="InputGrandTotal" name="InputGrandTotal"/>
    <input type="hidden" id="member_id" name="member_id"/>
</form>
<!-- /.FormSubmit -->


<div class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" id="ModalTable">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">List Table</h4>
      </div>
      <div class="modal-body">
        <table class="table " id="TableTab">
              <thead>
                  <tr>
                      <th>Select</th>
                      <th>Room</th>
                      <th>Number Of Table</th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach($table as $t): ?>
                     <?php if($t->is_empty=='1'): ?>
                    <tr>
                        <td>
                            <input type="checkbox" class="flat-red select-table" value="<?php echo $t->id_main;?>">
                        </td>
                        <td><?php echo $t->room_name;?></td>
                        <td><?php echo $t->code;?></td>
                    </tr> 
                       <?php EndIf; ?> 
                  <?php EndForeach; ?>  
              </tbody>
           </table>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="Order.SelectedTable(false)" class="btn btn-default btn-sm pull-left" ><i class="fa fa-refresh"></i> Reset</button>
        <button type="button" onclick="Order.SelectedTable(true)" class="btn btn-default btn-sm pull-left" ><i class="fa fa-check"></i> Select All</button>
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-edit"></i> Finsih Selected</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" id="ModalMember">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">List Member</h4>
      </div>
      <div class="modal-body">  
          <table class="table table-hover table-striped" width="100%" cellspacing="0" id="TableMember">
             <thead>
                 <tr>
                     <th><input type="checkbox" class="flat-red check-all"/></th>
                     <th>No</th>
                     <th>Member ID</th>
                     <th>Full Name</th>
                     <th>Gender</th>
                     <th>Email</th>
                     <th>Phone Number</th>
                     <th>Address</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
             </tbody>
          </table>    
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

