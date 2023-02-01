<?php 

$base_path = FCPATH;

$get_section_portfolio    = $this->model_utama->view_where('tbl_nicepage',array('key' => 'section_portfolio'))->row_array();
if(isset($get_section_portfolio['value'])){
	if(!empty($get_section_portfolio['value'])){
		$section_portfolio = json_decode($get_section_portfolio['value'],true);
	}
} 

?>
<div class="post-head mb-4">  
	<?php echo ($section_portfolio['judul'] !='' ? $section_portfolio['judul'] : 'Portfolio');?>
</div>
		<div class="row"> 
			<?php
			  foreach ($get_portfolio->result_array() as $portfolio) {	 
				  if ($portfolio['image'] !== '' &&  file_exists( $base_path ."asset/img_nicepage/portfolio/".($portfolio['image']) ) ){
						$img_src = base_url()."asset/img_nicepage/portfolio/". $portfolio['image'];
				  }
				  ?>
				  <div class="col-md-4 mb-4">
					  <div class="portfolio card shadow h-100">
						<div class="image-container">
							<img src="<?php echo $img_src;?>" alt="<?php echo  $portfolio['nama_project'];?>" class="card-img-top">
						</div>
						<div class="card-body">
							 <h5 class="body-title">
                                <?php echo $portfolio['nama_project'];?>
                            </h5>  
							<div class="client-name">
				  			<?php if(!empty(trim($portfolio['nama_client']))) { ?>
								Client : <?php echo $portfolio['nama_client'];?>
							  <?php } ?>								
							</div> 
                            <div class="description">
								<label class="mt-2 d-block">Deskripsi :</label>
								<?php if(!empty(trim($portfolio['deskripsi']))) {?>
								<?php echo $portfolio['deskripsi'];?>
								<?php }else { ?>
									-
								<?php } ?>	
                            </div>
						</div>
					</div> 
				</div>
				<?php
			  }
			?> 
		</div>
<div class="pagination">
	<?php echo $this->pagination->create_links(); ?>
</div> 