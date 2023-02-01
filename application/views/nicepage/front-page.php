<?php

$get_sections    = $this->model_utama->view_where('tbl_nicepage',array('key' => 'sections_order'))->row_array();
if(isset($get_sections['value'])){
	if(!empty($get_sections['value'])){
		$sections = json_decode($get_sections['value'],true);
	}
}

$number = 1;
foreach($sections as $item) {
	$file_section = VIEWPATH .'nicepage/sections/' . $item . '.php';
	if( file_exists($file_section)) {	
        ?>
        <div id="<?php echo $item ;?>" class="section <?php echo ($number % 2 == 0) ? 'even' : 'odd';?>">
        <?php
            include $file_section;
        ?>
        </div>
        <?php
        $number++;
    }
}
?>  