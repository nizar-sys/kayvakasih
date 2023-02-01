<div class="sidebar">
<?php
  
$get_setting_sidebar    = $this->model_utama->view_where('tbl_nicepage',array('key' => 'setting_sidebar'))->row_array(); 

$sidebar = array();
if(isset($get_setting_sidebar['value'])) {

	if(!empty($get_setting_sidebar['value'])){

		$setting_sidebar = json_decode($get_setting_sidebar['value'],true); 
		if(!empty($setting_sidebar)) {
			$number = 0;
			foreach($setting_sidebar as $i => $widget_id){ 
				$id = key($widget_id); 
				$sidebar[$number]['widget_id'] = $id;
				$sidebar[$number]['widget_setting'] = $widget_id[$id];
				$number++; 
			}

		}

	}

} 

foreach($sidebar as $i => $item) {
	$file_sidebar = VIEWPATH . template().'/widgets/' . $item['widget_id'] . '.php';
	
	if( file_exists($file_sidebar)) { 
		$widget_setting = $item['widget_setting'];
		include $file_sidebar;
	}
}

?>
</div>