 <div class="widget card mb-4 widget-category">
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
		$menu_sidebar_id = '';
		if(isset($widget_setting['group_menu'])) {
			$menu_sidebar_id = (int) $widget_setting['group_menu'];
		}
	?>  
	<div class="card-body">	
	<?php 
		echo build_nav_menu( $menu_sidebar_id , $menu_sidebar_id ,'menu',false);  
	?>	 
	</div>
</div>