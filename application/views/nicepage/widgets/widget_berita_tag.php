<div class="widget widget-tagcloud card mb-4"> 
		<?php    
			if( isset($widget_setting['judul']) ) {
				if( !empty(trim($widget_setting['judul']))) {
					?>					
					<h5 class="card-header">
						<?php echo $widget_setting['judul'];?>
					</h5>
					<?php 
				}
			}  
		?>  
  <div class="tagcloud">
  	<?php 
		$tag = $this->model_utama->view_ordering_limit('tag','id_tag','RANDOM',0,50);
  		foreach ($tag->result_array() as $row) {
			?>
			<a href="<?php echo base_url()."tag/detail/".$row['tag_seo'];?>">
				<?php echo $row['nama_tag'];?>
			</a>
			<?php
		}
	?></div>
</div> 