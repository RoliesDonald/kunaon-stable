<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
               <li class="active"><a href="#current" data-toggle="tab">Current Order</a></li> 
               <li><a href="#history" data-toggle="tab">History</a></li> 
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="current">
                    <?php require_once('_current.php'); ?>
                </div>
                <div class="tab-pane" id="history">
                    <?php require_once('_history.php'); ?>
                </div>
            </div>
        </div>
    </div>
</div>