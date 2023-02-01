<?php
$this->load->helper('text');
$slide_max = 0;
$get_slide_max    = $this->model_utama->view_where('tbl_nicepage',array('key' => 'slide_max'))->row_array();
if(isset($get_slide_max['value'])){
	if(!empty($get_slide_max['value'])){
		$slide_max = json_decode($get_slide_max['value'],true);
	}
}

$get_section_hero    = $this->model_utama->view_where('tbl_nicepage',array('key' => 'section_hero'))->row_array();
if(isset($get_section_hero['value'])){
	if(!empty($get_section_hero['value'])){
		$section_hero = json_decode($get_section_hero['value'],true);
	}
}

// koleksi halaman
$get_halaman_id = array(); 
$get_caption_config = array();
for($i = 1; $i <= ((int) $slide_max); $i++) {
    if(!empty($section_hero['page_' . $i])) {
        array_push($get_halaman_id, (int) $section_hero['page_'. $i]);

        if(isset($section_hero['caption_'. $i])) {
            $get_caption_config[(int) $section_hero['page_'. $i]] = $section_hero['caption_'. $i];
        } else {
            $get_caption_config[(int) $section_hero['page_'. $i]] = '0';
        }
    };
}
// get halaman
$get_halaman = array();
if(!empty($get_halaman_id)) {
    $get_halaman = $this->db->query("
                SELECT 
                    hal.id_halaman as id,
                    hal.judul as judul,                
                    hal.judul_seo as judul_seo,
                    hal.isi_halaman as isi,
                    hal.gambar as gambar
                FROM 
                    halamanstatis  hal
                WHERE
                    hal.id_halaman IN(". implode(',',$get_halaman_id) .")
            ")->result_array(); 
} 
?>
 <?php if( !empty($get_halaman)) {?>
<div class="section-slider-hero"> 
    <div id="carouselHero" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php $slide_count = sizeof($get_halaman);?>
            <?php for($sc = 0; $sc < $slide_count; $sc++){?>
                <li data-target="#carouselHero" data-slide-to="<?php echo $sc;?>" <?php echo ($i == 0 ? 'class="active"' : '');?>></li> 
            <?php } ?>    
        </ol>
        <div class="carousel-inner" role="listbox">
            <?php foreach($get_halaman as $i =>  $hal) {?>
                <div class="carousel-item <?php echo ($i == 0 ? 'active' : '');?>">
                    <div class="carousel-content">
                        <div class="image-container"
							style="
                                background:url('<?php echo base_url('asset/foto_statis/'.$hal['gambar']);?>'); 
								background-position:center;
								background-size:cover;
                                background-repeat:no-repeat;
                                height:100vh;
							"></div> 
                        <!-- <div class="image-content">
                            <img style="width:100%" src="<?php echo base_url();?>asset/foto_statis/<?php echo $hal['gambar'];?>" />
                        </div> -->
                        <?php if( $get_caption_config[ $hal['id'] ] == '1') {?>
                            <div class="carousel-caption">
                                <h3 class="caption-title"><?php echo $hal['judul'];?></h3>
                                <div class="caption-content"> <?php echo word_limiter( strip_tags($hal['isi']),35);?></div>
                                <a href="<?php echo base_url('halaman/detail/'.$hal['judul_seo']);?>" class="btn btn-theme btn-read-more">
                                    <?php echo (empty(trim($section_hero['label_link'])) ? 'Selengkapnya' : $section_hero['label_link']);?>
                                </a>
                            </div>
                        <?php } ?>

                    </div>
                </div>                 
            <?php }?>
        </div>
        <a class="carousel-control-prev" href="#carouselHero" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselHero" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div> 
</div> 
<?php }?> 