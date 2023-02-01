<?php
$faq_max = 0;
$get_faq_max    = $this->model_utama->view_where('tbl_nicepage',array('key' => 'faq_max'))->row_array();
if(isset($get_faq_max['value'])){
	if(!empty($get_faq_max['value'])){
		$faq_max = json_decode($get_faq_max['value'],true);
	}
}

$get_section_faq    = $this->model_utama->view_where('tbl_nicepage',array('key' => 'section_faq'))->row_array();
if(isset($get_section_faq['value'])){
	if(!empty($get_section_faq['value'])){
		$section_faq = json_decode($get_section_faq['value'],true);
	}
}

// faq
$get_faqs = array();
for($i = 1; $i <= ((int) $faq_max ); $i++) {
    
    if(!empty($section_faq['tanya_' . $i])) {
        $get_faqs[$i]['tanya'] = $section_faq['tanya_'. $i];
    };

    if(!empty($section_faq['jawab_' . $i])) {
        $get_faqs[$i]['jawab'] = $section_faq['jawab_'. $i];
    };
}

?>

<div class="container">
    <div class="card py-4">
        <?php if( !empty($section_faq['judul'])) { ?>
        <h2 class="card-header section-title">
            <?php echo strtoupper($section_faq['judul']);?>
        </h2>
        <?php } ?>
        <?php if( !empty($section_faq['deskripsi'])) { ?>
        <div class="section-description">
            <?php echo $section_faq['deskripsi'];?>
        </div>
        <?php } ?> 
        <div class="card-body">
            <div class="row justify-content-center">
                <?php if( !empty($get_faqs)) {?> 
                    <div class="mb-4 col-md-10">
                        <div class="body-container shadow p-2"> 
                            <ul class="accordion faq">
                                <?php foreach( $get_faqs as $faq ): ?> 
                                    <li> 
                                        <div class="question">
                                            <?php echo $faq['tanya'];?> <i class="fa fa-question" aria-hidden="true"></i>
                                        </div> 
                                        <div class="answer">
                                            <?php echo $faq['jawab'];?>
                                        </div>
                                    </li>    
                                <?php endforeach;?>
                            </ul> 
                        </div>
                    </div> 
                <?php }?>
            </div>
        </div>
    </div>
</div> 
