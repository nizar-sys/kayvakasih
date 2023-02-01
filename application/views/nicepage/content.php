<?php

$get_blog_sections    = $this->model_utama->view_where('tbl_nicepage',array('key' => 'setting_blog_sections'))->row_array(); 
 
$blog_sections = array();
if(isset($get_blog_sections['value'])) {

    if(!empty($get_blog_sections['value'])){

        $setting_sections = json_decode($get_blog_sections['value'],true); 
        if(!empty($setting_sections)) {
            $number = 0;
            foreach($setting_sections as $i => $section_id){ 
                $id = key($section_id); 
                $blog_sections[$number]['section_id'] = $id;
                $blog_sections[$number]['section_setting'] = $section_id[$id];
                $number++; 
            }

        }

    }

} 
if(!empty($blog_sections)){ 
    foreach($blog_sections as $i => $item) { 
        $file_sections = VIEWPATH . template().'/blog_sections/' . $item['section_id'] . '.php'; 
        if( file_exists($file_sections)) { 
            $section_id = $item['section_id'].'_' .$i;
            $section_setting = $item['section_setting']; 
            include $file_sections;
        }
    }
}
?>  