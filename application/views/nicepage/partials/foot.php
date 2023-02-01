<?php
// get footer embeded code
$get_footer_embeded_code = $this->model_utama->view_where('tbl_nicepage',array('key' => 'footer_embeded_code'))->row_array();
if(isset($get_footer_embeded_code['value'])){
	if(!empty($get_footer_embeded_code['value'])){
        $footer_embeded_code = json_decode($get_footer_embeded_code['value'],true);
        if(!empty($footer_embeded_code)) {
            echo $footer_embeded_code;
        }
	}
}