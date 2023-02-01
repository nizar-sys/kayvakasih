<?php
$get_section_testimonial    = $this->model_utama->view_where('tbl_nicepage',array('key' => 'section_testimonial'))->row_array();
if(isset($get_section_testimonial['value'])){
	if(!empty($get_section_testimonial['value'])){
		$section_testimonial = json_decode($get_section_testimonial['value'],true);
	}
}
  
if(!empty($section_testimonial['jumlah'])) {
    // $section_testimonial['jumlah'] =1;
    $get_testimoni = $this->db->query("
                SELECT 
                    t.id_testimoni as id,
                    t.nama as nama,
                    t.profesi as profesi,
                    t.testimoni as testimoni,
                    t.photo as photo
                FROM 
                    tbl_nicepage_testimoni t
                ORDER BY nama ASC LIMIT 0,".$section_testimonial['jumlah']
                )->result_array(); 
} 
?>

<div class="container">
    <div class="card py-4">
        <?php if( !empty($section_testimonial['judul'])) { ?>
        <h2 class="card-header section-title">
            <?php echo strtoupper($section_testimonial['judul']);?>
        </h2>
        <?php } ?>
        <?php if( !empty($section_testimonial['deskripsi'])) { ?>
        <div class="section-description">
            <?php echo $section_testimonial['deskripsi'];?>
        </div>
        <?php } ?> 
        <div class="card-body">
            <div class="row justify-content-center">
                <?php if( !empty($get_testimoni)) {?> 
                    <div class="mb-4 mt-4 col-lg-12">
                        <div id="carouselTestimonial" class="carousel slide" data-ride="carousel">
                            <div class="carousel-testimoni-inner" role="listbox">
                                <?php foreach($get_testimoni as $i => $testi) {?>
                            
                                <div class="carousel-item <?php echo ($i == 0 ? 'active': '');?>">
                                    <div class="photo-testimoni">
                                        <img src="<?php echo base_url();?>asset/img_nicepage/testimoni/<?php echo $testi['photo'];?>" alt="<?php echo $testi['nama'];?>">
                                    </div>                                    
                                    <div class="carousel-caption ">
                                        <h3><?php echo $testi['nama'];?></h3>
                                        <h5><?php echo $testi['profesi'];?></h5>
                                        <div class="testimoni">
                                            <i class="fa fa-quote-left quote-left" aria-hidden="true"></i> 
                                                <?php echo $testi['testimoni'];?> 
                                            <i class="fa fa-quote-right quote-right" aria-hidden="true"></i> 
                                        </div>
                                    </div>
                                 </div> 
                                         
                                <?php }?>   
                            </div> 
                            <ol class="carousel-indicators">
                                <?php $count_testimoni = sizeof($get_testimoni); ?>
                                <?php for($t = 0 ; $t < $count_testimoni;$t++) {?>
                                    <li 
                                    data-target="#carouselTestimonial" 
                                    data-slide-to="<?php echo $t;?>"
                                    <?php echo ($t == 0) ? ' class="active"':'';?>
                                    ></li> 
                                <?php } ?>
                            </ol>                            
                        </div>          
                    </div> 
                <?php }?>
            </div>
        </div>
    </div>
</div> 