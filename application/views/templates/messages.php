<?php $success = $this->session->flashdata('success');?>
<?php if ($success):?>
	<script type="text/javascript">
		$(document).ready(function(){
			sweetAlert("Success..", "<?php echo $this->session->flashdata('success'); ?>", "success");
		});	
	</script>
<?php endif?>
<?php $warning = $this->session->flashdata('warning');?>
<?php if ($warning):?>
	<script type="text/javascript">
		$(document).ready(function(){
			sweetAlert("Warning..", "<?php echo $this->session->flashdata('warning'); ?>", "warning");
		});	
	</script>
<?php endif?>
<?php $danger = $this->session->flashdata('danger');?>
<?php if ($danger):?>
	<script type="text/javascript">
		$(document).ready(function(){
			sweetAlert("System Error..", "<?php echo $this->session->flashdata('danger'); ?>", "error");
		});	
	</script>
<?php endif?>