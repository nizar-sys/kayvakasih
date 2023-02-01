<?php 
// get lokasi menu utama
$get_lokasi_menu    = $this->model_utama->view_where('tbl_nicepage',array('key' => 'lokasi_menu'))->row_array();
if(isset($get_lokasi_menu['value'])){
	if(!empty($get_lokasi_menu['value'])){
		$lokasi_menu = json_decode($get_lokasi_menu['value'],true);
	}
} 
$menu_utama_id = '';
if(isset($lokasi_menu['menu_utama'])) {
	$menu_utama_id = $lokasi_menu['menu_utama'];
}


/**
 * menata menu secara hirarki
 * menu
 * -sub menu
 * --sub menu 
 * ---dst
 * @param $menu_parent_id ( menu id)
 * @param $state_menu_id (menu id (kondisi paling awal))
 * @param $class_menu ( style menu)
 * @param $home_icon ( true => menampilkan icon home)
 * @param $deep ( true jika => menu hirarki)
 */
function build_nav_menu($menu_parent_id = 0 ,$state_menu_id, $class_menu ='menu-navbar',$home_icon = true , $deep = true){
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

		if($menu_parent_id == $state_menu_id) {			
			$list_menu .= '<ul class="'.$class_menu.'">';		
			if($home_icon == true) {
				$list_menu .= '<li class="menu-item">';
				$list_menu .= '<a href="'. base_url() .'">';
				$list_menu .= '<i class="fa fa-home" aria-hidden="true"></i>';
				$list_menu .= '</a>';
				$list_menu .= '</li>';
			}
		} else {
			$list_menu .= '<ul class="sub-menu">';
		}

		foreach($get_menus as $menu_item) {	  
			// filter http link
			$ahref_ttr ='';
			$base_url = base_url($menu_item['link']);
			if(preg_match("/^http/", $menu_item['link'])) {
				$ahref_ttr = 'target="_BLANK"';
				$base_url = $menu_item['link'];
			}
			// create link			
			$a_link_menu = '<a '. $ahref_ttr .' href="'. $base_url .'">';
			$a_link_menu .= $menu_item['nama_menu'];
			$a_link_menu .= '</a>';
			// end
			
			$get_child = array();

			if($deep == true) {
				$get_child = build_nav_menu($menu_item['id_menu'],$state_menu_id);
			}
			if(!empty($get_child) && $deep == true) {
				$list_menu .= '<li class="menu-item menu-item-has-children" id="menu-item-'.$menu_item['id_menu'].'">';
				$list_menu .= $a_link_menu;
				$list_menu .= $get_child;
				$list_menu .= '</li>';
			} else {
				$list_menu .= '<li class="menu-item" id="menu-item-'.$menu_item['id_menu'].'">';
				$list_menu .= $a_link_menu;
				$list_menu .= '</li>';
			}
		}
		$list_menu .= '</ul>';
	}
	return $list_menu;
}
?> 
<nav class="main-menu-container navbar navbar-dark fixed-top  py-2 py-lg-3">
	<div class="button-toggle-container d-lg-none m-2 position-absolute">
		<button class="btn-responsive navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu"
			aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button> 
	</div>
	<div class="container ml-5 pl-4 ml-lg-auto pl-lg-auto">
		<?php
			//menampilkan identias website  
			$base_path = FCPATH;
			$id_website = $this->model_utama->view('identitas')->row_array();	
			$logo_website = $this->model_utama->view('logo')->row_array();				
		?>  
		<a class="navbar-brand float-left" href="<?php echo base_url();?>"> 
			<?php					
				if ( $logo_website['gambar'] !== '' &&  file_exists( $base_path ."asset/logo/".$logo_website['gambar'] ) ){
					$img_src = base_url() ."asset/logo/".$logo_website['gambar'] ;
					?>
						<div class="logo-header">
							<img  src="<?php echo $img_src ;?>" alt="<?php echo $id_website['nama_website']; ?>">
						</div>
					<?php
				} else {
					?> 
					<?php echo $id_website['nama_website']; ?> 
					<?php
				}
			?>
			<?php 
			if( isset($tagline['header']) && isset($tagline['text'])) {
				if(!empty($tagline['text'] && $tagline['header'] ==  '1') ){
					?>
					<div class="tagline-header d-lg-block d-none">" <?php echo $tagline['text'];?> "</div>
					<?php
				}
			}?> 
		</a>
		<div class="main-menu d-lg-block d-none" id="main-menu"> 
			<?php 
			echo build_nav_menu($menu_utama_id,$menu_utama_id);  
			?>	 
		</div>
	</div>
</nav>