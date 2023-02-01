<?php
//menampilkan identias website 
$id_website = $this->model_utama->view('identitas')->row_array();	
$logo_website = $this->model_utama->view('logo')->row_array();			

// footer menu 
$get_lokasi_menu    = $this->model_utama->view_where('tbl_nicepage',array('key' => 'lokasi_menu'))->row_array();
if(isset($get_lokasi_menu['value'])){
	if(!empty($get_lokasi_menu['value'])){
		$lokasi_menu = json_decode($get_lokasi_menu['value'],true);
	}
} 
$menu_footer_id = '';
if(isset($lokasi_menu['menu_footer'])) {
	$menu_footer_id = $lokasi_menu['menu_footer'];
}


function build_footer_menu($menu_parent_id ){
	// get instance CI
	$list_menu = '';
	$ci = & get_instance();
	$get_menus = $ci->db->query("
		SELECT 
			id_menu, 
			nama_menu, 
			link
		FROM 
			menu 
		WHERE 
			aktif='Ya' 
			AND 
			id_parent='". $menu_parent_id."'
		ORDER BY urutan
	")->result_array();
	if(!empty($get_menus)) {  
		$list_menu .= '<ul class="footer-menu">';  
		foreach($get_menus as $menu_item) {	  
			// filter http link
			$ahref_ttr ='';
			$base_url = base_url($menu_item['link']);
			if(preg_match("/^http/", $menu_item['link'])) {
				$ahref_ttr = 'target="_BLANK"';
				$base_url = $menu_item['link'];
			}
			// create link			
			$list_menu .= '<li class="menu-item" id="menu-item-'.$menu_item['id_menu'].'">';
			$list_menu .= '<a '. $ahref_ttr .' href="'. $base_url .'">';
			$list_menu .= $menu_item['nama_menu'];
			$list_menu .= '</a>'; 
			$list_menu .= '</li>'; 
		}
		$list_menu .= '</ul>';
	}
	return $list_menu;
}


$base_path = FCPATH;
?>
<footer>
	<div id="footer" class="py-5"> 
		<div class="container">
			<div class="row">			
				<div class="col-md-12 text-center"> 
					<?php					
						if ( $logo_website['gambar'] !== '' &&  file_exists( $base_path ."asset/logo/".$logo_website['gambar'] ) ){
							$img_src = base_url() ."asset/logo/".$logo_website['gambar'] ;
							?>
								<div class="logo-footer">
									<img  src="<?php echo $img_src ;?>" alt="<?php echo $id_website['nama_website']; ?>">
								</div>

							<?php
						} else {
							?>
							<h3 class="logo-text">
								<?php echo $id_website['nama_website']; ?>
							</h3>
							<?php
						}
					?>

					<?php 
					if( isset($tagline['footer']) && isset($tagline['text'])) {
						if(!empty($tagline['text'] && $tagline['footer'] ==  '1') ){
							?>
							<div class="tagline-footer">" <?php echo $tagline['text'];?> "</div>
							<?php
						}
					}?> 
				</div>
				<div class="col-md-12 text-center">  
					<?php 
						echo build_footer_menu($menu_footer_id);
					?> 
				</div>
				<div class="col-md-12 text-center"> 
					<div class="social-bar">
					<h6>Temukan Kami Di</h6>
						<?php
							$sosmed = $this->model_utama->view('identitas')->row_array();
							$pecahd = explode(",", $sosmed['facebook']);
						?>
						<a target="_BLANK" href="<?php echo $pecahd[0]; ?>" class="social-icon"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						<a target="_BLANK" href="<?php echo $pecahd[1]; ?>" class="social-icon"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						<a target="_BLANK" href="<?php echo $pecahd[2]; ?>" class="social-icon"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						<a target="_BLANK" href="<?php echo $pecahd[3]; ?>" class="social-icon"><i class="fa fa-youtube" aria-hidden="true"></i></a>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<div id="footer-bottom" class="py-4 text-center">
		<div class="container"> 
			<p>&copy; <?php echo date('Y');?> Copyright <b><?php echo $id_website['nama_website']; ?></b> . All Rights reserved.</p>
		</div>
	</div>
</footer>
<?php $this->model_utama->kunjungan(); ?>