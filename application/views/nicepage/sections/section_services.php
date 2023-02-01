<?php
$this->load->helper('text');
$services_max = 0;
$get_services_max    = $this->model_utama->view_where('tbl_nicepage',array('key' => 'services_max'))->row_array();
if(isset($get_services_max['value'])){
	if(!empty($get_services_max['value'])){
		$services_max = json_decode($get_services_max['value'],true);
	}
}

$get_section_services    = $this->model_utama->view_where('tbl_nicepage',array('key' => 'section_services'))->row_array();
if(isset($get_section_services['value'])){
	if(!empty($get_section_services['value'])){
		$section_services = json_decode($get_section_services['value'],true);
	}
}

// koleksi halaman
$get_halaman_id = array();
for($i = 1; $i <= ((int) $services_max); $i++) {
    if(!empty($section_services['page_' . $i])) {
        array_push($get_halaman_id, (int) $section_services['page_'. $i]);
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

<div class="container">
    <div class="card py-4">
        <?php if( !empty($section_services['judul'])) { ?>
        <h2 class="card-header section-title">
            <?php echo strtoupper($section_services['judul']);?>
        </h2>
        <?php } ?>
        <?php if( !empty($section_services['deskripsi'])) { ?>
        <div class="section-description">
            <?php echo $section_services['deskripsi'];?>
        </div>
        <?php } ?> 
        <div class="card-body">
            <div class="row justify-content-center">
                <?php if( !empty($get_halaman)) {?>
                    <?php
                        switch ((int) $section_services['layout']) { 
                            case 2:
                                $layout = '6'; 
                                break;                                    
                            case 3:
                                $layout = '4'; 
                                break;                    
                            default:                             
                                $layout = '6'; 
                                break;
                        }
                    ?>
                    <?php foreach($get_halaman as $hal) {?>
                    <div class="mb-4 col-md-6 col-lg-<?php echo $layout;?>">
                        <div class="body-container animate shadow h-100"> 
                            <img src="<?php echo base_url();?>asset/foto_statis/<?php echo $hal['gambar'];?>" alt="<?php echo $hal['judul'];?>">   
                            <a href="<?php echo base_url('halaman/detail/'.$hal['judul_seo']);?>" >
                                <h4 class="body-title center">
                                    <?php echo $hal['judul'];?>
                                </h4>
                            </a>                                
                            <div class="body-content center">
                                <?php $limit_word =  (empty(trim($section_services['max_kata'])) ? 15 : (int) $section_services['max_kata']);?>
                                <?php echo word_limiter($hal['isi'],$limit_word);?>   
                             </div>                             
                        </div>
                    </div>                    
                    <?php }?>
                    <?php if(!empty(trim($section_services['url_link'])) ){ ?>
                        <div class="col-12 mt-4 text-center">
                            <a href="<?php echo $section_services['url_link'];?>" class="read-more">                                    
                                <?php echo (empty(trim($section_services['label_link'])) ? 'Selengkapnya' : $section_services['label_link']);?>
                            </a> 
                        </div>
                    <?php } ?> 
                <?php }?>
            </div>
        </div>
    </div>
</div> 