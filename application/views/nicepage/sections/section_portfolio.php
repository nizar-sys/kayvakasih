<?php
$get_section_portfolio    = $this->model_utama->view_where('tbl_nicepage',array('key' => 'section_portfolio'))->row_array();
if(isset($get_section_portfolio['value'])){
	if(!empty($get_section_portfolio['value'])){
		$section_portfolio = json_decode($get_section_portfolio['value'],true);
	}
} 

// get portfolio 
if( isset($section_portfolio['jumlah'])) {
$get_portfolio = $this->db->query("
    SELECT 
        portfolio.id_portfolio as id,
        portfolio.nama_project as nama,
        portfolio.nama_client as client,
        portfolio.deskripsi as deskripsi,
        portfolio.url as url,
        portfolio.image as image
    FROM 
        tbl_nicepage_portfolio portfolio
    ORDER BY portfolio.nama_project ASC 
    LIMIT 0,".$section_portfolio['jumlah']
)->result_array(); 
}
?>

<div class="container">
    <div class="card py-4">
        <?php if( !empty($section_portfolio['judul'])) { ?>
        <h2 class="card-header section-title">
            <?php echo strtoupper($section_portfolio['judul']);?>
        </h2>
        <?php } ?>
        <?php if( !empty($section_portfolio['deskripsi'])) { ?>
        <div class="section-description">
            <?php echo $section_portfolio['deskripsi'];?>
        </div>
        <?php } ?> 
        <div class="card-body">
            <div class="row justify-content-center">
                <?php if( !empty($get_portfolio)) {?>
                    <?php
                        switch ((int) $section_portfolio['layout']) { 
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
                    <?php foreach($get_portfolio as $item) {?>
                    <div class="mb-4 col-md-6 col-lg-<?php echo $layout;?>">
                        <div class="body-container animate shadow h-100"> 
                            <?php 
                            if ($item['image'] !==''){
                                $img_src =base_url().'asset/img_nicepage/portfolio/'.$item['image'];
                            } 
                            ?>
                            <img src="<?php echo $img_src;?>" alt="<?php echo $item['nama'];?>">
                            <h4 class="body-title center">
                                <?php echo $item['nama'];?>
                            </h4>                             
                        </div>
                    </div>                    
                    <?php }?> 
                        <div class="col-12 mt-4 text-center">
                            <a href="<?php echo base_url('portfolio');?>" class="read-more">                                    
                                <?php echo (empty(trim($section_portfolio['label_link'])) ? 'Selengkapnya' : $section_portfolio['label_link']);?>
                            </a> 
                        </div>  
                <?php }?>
            </div>
        </div>
    </div>
</div> 