<?php 
$base_path = FCPATH;

$get_section_team    = $this->model_utama->view_where('tbl_nicepage',array('key' => 'section_team'))->row_array();
if(isset($get_section_team['value'])){
	if(!empty($get_section_team['value'])){
		$section_team = json_decode($get_section_team['value'],true);
	}
}

?>
<div class="post-head mb-4"> 
	<?php echo ($section_team['judul'] !='' ? $section_team['judul'] : 'Team');?>
</div>
		<div class="row"> 
			<?php
			  foreach ($get_teams->result_array() as $team) {	 
				  if ($team['photo'] !== '' &&  file_exists( $base_path ."asset/img_nicepage/team/".($team['photo']) ) ){
						$img_src = base_url()."asset/img_nicepage/team/". $team['photo'];
				  }
				  ?>
				  <div class="col-md-3 mb-4">
					  <div class=" card shadow h-100">
						<div class="image-container">
							<img src="<?php echo $img_src;?>" alt="<?php echo  $team['team'];?>" class="card-img-top">
						</div>
						<div class="card-body">
							 <h5 class="body-title text-center">
                                <?php echo $team['nama'];?>
                            </h5> 
                            <div class="team-title text-center">
                                <?php echo $team['jabatan'];?>
							</div>
							<div class="team-socmed  text-center">
                                <a href="https://facebook.com/<?php echo $team['socmed_fb'];?>">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                                <a href="https://twitter.com/<?php echo $team['socmed_twitter'];?>">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                                
                                <a href="https://instagram.com/<?php echo $team['socmed_ig'];?>">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                </a>
                                
                                <a href="https://linkedin.com/<?php echo $team['socmed_linkedin'];?>">
                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                </a>
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