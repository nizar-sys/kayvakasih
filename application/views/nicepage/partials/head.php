<?php
// get header embeded code
$get_header_embeded_code = $this->model_utama->view_where('tbl_nicepage',array('key' => 'header_embeded_code'))->row_array();
if(isset($get_header_embeded_code['value'])){
	if(!empty($get_header_embeded_code['value'])){
        $header_embeded_code = json_decode($get_header_embeded_code['value'],true);
        if(!empty($header_embeded_code)) {
            echo $header_embeded_code;
        }
	}
}