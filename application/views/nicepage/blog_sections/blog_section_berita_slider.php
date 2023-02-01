<section id="<?php echo $section_id;?>" class="section">
	<div class="container">
		<div class="section-container pb-4"> 
			<?php   
				$jumlah_berita = 0;
				if( isset($section_setting['judul']) ) {
					if( !empty(trim($section_setting['judul']))) {
						$section_berita_slider_judul = $section_setting['judul'];
					}
				}

				$filter_berita = array();
				if( isset($section_setting['group']) ) {
					$group_berita =  $section_setting['group'];
					if(!empty(trim($group_berita))) {
						switch ($group_berita) {
							case 'headline':
								$filter_berita = array('berita.headline' => 'Y');
								break;
							case 'pilihan':								
								$filter_berita = array('berita.aktif' => 'Y');
								break;
							case 'utama':	
								$filter_berita = array('berita.utama' => 'Y');
								break; 
						}
					}
				} 

				if( isset($section_setting['jumlah']) ) {
					$jumlah_berita = (int) $section_setting['jumlah'];
				} 
			?>  
			<div class="section-body m-0">  
					<?php 

						$filter_berita = array_merge($filter_berita,array(
							'berita.status' => 'Y'
						));

						$berita_slider = $this->model_utama->view_join_two(
								'berita',
								'users',
								'kategori',
								'username',
								'id_kategori',
								$filter_berita,
								'tanggal','DESC',0,$jumlah_berita)->result_array();
					?>   


<?php if( !empty( $berita_slider )) { 	
	$this->load->helper('text'); 
?>
<div class="section-slider">
    <div id="<?php echo $section_id;?>-carousel-slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" >
			<?php  
				foreach ($berita_slider as $i => $berita) { 				
				?> 
                <div class="carousel-item <?php echo ($i == 0 ? 'active' : '');?>">
                    <div class="carousel-content">
						<?php
							$img_src= base_url().'asset/foto_berita/small_no-image.jpg';
							if ($berita['gambar'] !==''){
								$img_src =base_url().'asset/foto_berita/'.$berita['gambar'];
							} 
						?>
                       	<div class="image-container"
							style="
								background:url('<?php echo $img_src;?>');
								background-position:center;
								background-size:cover;
								background-repeat:no-repeat;
							"> 
						</div>

						<div class="carousel-caption">
							<div class="caption-content-container"> 
								<a href="<?php echo base_url($berita['judul_seo']);?>">
									<h3 class="caption-title">
										<?php echo $berita['judul'];?>
									</h3>
								</a>							 
									<div class="caption-content">									
										<?php echo word_limiter( strip_tags($berita['isi_berita']),15);?> 
									</div>	 
								<div class="post-meta"> 
									<i class="fa fa-calendar"></i> <?php echo tgl_indo($berita['tanggal']); ?> ,
									<i class="fa fa-user"></i> <?php echo "$berita[nama_lengkap]"; ?>,
									<a href="<?php echo base_url()."kategori/detail/$berita[kategori_seo]"; ?>">
										<b><?php echo "$berita[nama_kategori]"; ?></b>
									</a>
								</div> 
							</div>
						</div>
                    </div>
                </div>                 
            <?php }?>
		</div> 
		
        <ol class="carousel-indicators">
			<?php 
				$slide_count = sizeof($berita_slider);
			?>
            <?php for($sc = 0; $sc < $slide_count; $sc++){?>
				<li data-target="#<?php echo $section_id;?>-carousel-slider" data-slide-to="<?php echo $sc;?>" <?php echo ($i == 0 ? 'class="active"' : '');?>></li> 
            <?php } ?>    
        </ol>
    </div> 
</div> 
<?php }?> 

			</div>
		</div>  
	</div>  
</section>