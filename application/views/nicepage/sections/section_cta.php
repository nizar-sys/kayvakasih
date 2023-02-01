<?php
$get_section_cta    = $this->model_utama->view_where('tbl_nicepage',array('key' => 'section_cta'))->row_array();
if(isset($get_section_cta['value'])){
	if(!empty($get_section_cta['value'])){
		$section_cta = json_decode($get_section_cta['value'],true);
	}
}
 
?>

<div class="container">
    <div class="card py-4">
         
        <div class="card-body">
            <div class="row"> 
                    <div class="col-lg-12">
                        <div class="body-container">
                            <div class="body-content center">
                                <?php echo $section_cta['text'];?>
                                <div class="pt-4">
                                    <a class="btn btn-cta btn-lg" href=" <?php echo $section_cta['url'];?>">
                                        <?php echo $section_cta['label'];?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>    
            </div>
        </div>
    </div>
</div> 