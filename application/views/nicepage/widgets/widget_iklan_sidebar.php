<div class="widget card mb-4 widget-iklan-sidebar">	
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
	$iklan_sidebar = 0;
	if( isset($widget_setting['iklan_sidebar']) ) {
		$iklan_sidebar = (int) $widget_setting['iklan_sidebar'];
	} 
?>
<?php
  	$pasang_iklan_sidebar = $this->db->query("SELECT * FROM pasangiklan WHERE id_pasangiklan ='". $iklan_sidebar."'");

	foreach ($pasang_iklan_sidebar->result_array() as $iklan){
		$string = $iklan['gambar'];
		if ($iklan['gambar'] != ''){
			?>
			<a href="<?php echo $iklan['url'];?>" 
				target='_blank'>
				<img style='width:100%' 
					src="<?php echo base_url()."asset/foto_pasangiklan/".$iklan['gambar'];?>" 
					alt="<?php echo $iklan['judul'];?>" />
			</a>
			<?php
		}
		if (trim($iklan['source']) != ''){ echo "$iklan[source]"; }
	 }
?>
</div>