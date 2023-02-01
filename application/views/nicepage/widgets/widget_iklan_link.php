<div class="widget card mb-4 widget-iklan-link"> 
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
	$iklan_link_id = array();
	if( isset($widget_setting['iklan_link']) ) {
		$iklan_link_id = $widget_setting['iklan_link'];
	} 
?>
<ul>
<?php
	$where_in = "'". implode("','",$iklan_link_id)."'";
  	$get_iklan_link = $this->db->query("SELECT * FROM banner WHERE id_banner IN(". $where_in.")");

	foreach ($get_iklan_link->result_array() as $iklan){  
		?>
		<li>
		<a href="<?php echo $iklan['url'];?>"  target='_blank'> 
			<?php echo $iklan['judul'];?> 
		</a>
		</li>
		<?php 
	 }
?>
</ul>
</div>