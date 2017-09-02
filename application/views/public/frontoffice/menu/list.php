<?php $i=1; foreach($data as $row): ?>
<div class="col-md-4">
    <div class="thumbnail">
      <a href="#" onclick="Order.AddMenu('<?php echo $row->id;?>','<?php echo $row->menu_name;?>','1','<?php echo $row->price;?>')">
        <?php if($row->photo && file_exists($row->photo)): ?>
         <img src="<?php echo base_url().''.$row->photo;?>" alt="<?php echo $row->menu_name;?>" style="width:100%"> 
        <?php Else: ?>
         <img src="<?php echo base_url().'assets/dist/img/No-Image-Available.jpg';?>" alt="Tidak ada foto" style="width:100%">
        <?php EndIf; ?> 
        <div class="caption text-center">
          <p><?php echo $row->menu_name;?><br><?php echo price($row->price);?></p>
        </div>
      </a>
      <div class="title text-center"><?php echo $row->menu_name;?></div>
    </div>
</div>
<?php if($i%3==0): ?>
  <div class="clearfix"></div>
<?php EndIf; ?>
<?php $i++; EndForeach; ?>