<div class="widget card mb-4 widget-search"> 
		<?php    
			if( isset($widget_setting['judul']) ) {
				if( !empty(trim($widget_setting['judul']))) {
					?>					
					<h5 class="card-header mb-3">
						<?php echo $widget_setting['judul'];?>
					</h5>
					<?php 
				}
			} 
		?>  
	<div class="card-body">
		<?php echo form_open('berita/index');?>
			<div class="form-group pt-3">
				<div class="input-group">
					<input value="<?php echo set_value('kata');?>" type="text" class="form-control" name="kata" placeholder="Pencarian Berita ...">
					<div class="input-group-append">
						<button class="btn btn-theme" type="submit" name="cari">
							<i class="fa fa-search" aria-hidden="true"></i>
						</button>
					</div>
				</div>
			</div>
		<?php echo form_close();?>
	</div>
</div>