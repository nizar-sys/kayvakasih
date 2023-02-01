<?php
$this->load->helper('text');
$get_section_about    = $this->model_utama->view_where('tbl_nicepage',array('key' => 'section_about'))->row_array();
if(isset($get_section_about['value'])){
	if(!empty($get_section_about['value'])){
		$section_about = json_decode($get_section_about['value'],true);
	}
}

// koleksi halaman
$get_halaman_id =$section_about['page'];
// get halaman 
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
                    hal.id_halaman ='".$get_halaman_id."'
                ORDER BY hal.judul ASC
            ")->result_array(); 
}
?>

<div class="container">
    <div class="card py-4">
        <?php if( !empty($section_about['judul'])) { ?>
        <h2 class="card-header section-title">
            <?php echo strtoupper($section_about['judul']);?>
        </h2>
        <?php } ?>
        <?php if( !empty($section_about['deskripsi'])) { ?>
        <div class="section-description">
            <?php echo $section_about['deskripsi'];?>
        </div>
        <?php } ?> 
        <div class="card-body">
            <div class="row justify-content-center">
                <?php if( !empty($get_halaman)) {?> 
                    <?php foreach($get_halaman as $hal) {?>
                    <div class="col-lg-12">
                        <div class="body-container shadow">
                            <div class="row">
                                <div class="col-lg-6 valign">
                                    <img src="<?php echo base_url();?>asset/foto_statis/<?php echo $hal['gambar'];?>" alt="<?php echo $hal['judul'];?>">
                                </div>
                                <div class="col-lg-6 valign">
                                    <a href="<?php echo base_url('halaman/detail/'.$hal['judul_seo']);?>"> 
                                        <h2 class="body-title  pr-4"> 
                                                <?php echo $hal['judul'];?> 
                                        </h2>
                                    </a>
                                    <div class="body-content pr-4"> 
                                    <?php $limit_word =  (empty(trim($section_feature['max_kata']))  ? 45 : (int) $section_about['max_kata']);?>
                                        <?php echo word_limiter($hal['isi'],$limit_word);?> 
                                    </div>
                                    <div class="body-action pr-4">
                                        <a href="<?php echo base_url('halaman/detail/'.$hal['judul_seo']);?>" class="btn btn-theme btn-read-more">                                    
                                            <?php echo (empty(trim($section_about['label_link'])) ? 'Selengkapnya' : $section_about['label_link']);?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                    <?php }?>
                <?php }?>
            </div>
        </div>
    </div>
</div> 