<section id="<?php echo $section_id;?>" class="section mb-4"> 
	<div class="container"> 
		<?php
			$iklan_home_id = 0;
			if( isset($section_setting['iklan_home']) ) {
				$iklan_home_id = (int) $section_setting['iklan_home'];
			} 
			$pasang_iklan_home = $this->db->query("
				SELECT 
					judul,
					url,
					gambar,
					source
				FROM 
					iklantengah 
				WHERE 
					id_iklantengah ='". $iklan_home_id."'"
			)->row_array();
		?>   
			<?php if( $pasang_iklan_home['gambar'] !='') { ?>
				<?php
				if(preg_match("/swf\z/i", $pasang_iklan_home['gambar'] )) { ?>
					<embed width="100%" 
					src=" <?php echo base_url()."asset/foto_iklanatas/". $pasang_iklan_home['gambar'];?>" 
						quality='high' type='application/x-shockwave-flash'>
					<?php
				} else {
					?>
					<a href="<?php echo $pasang_iklan_home['url'];?>" target='_blank'>
						<img style='width:100%' 
								src="<?php echo base_url()."asset/foto_iklantengah/".$pasang_iklan_home['gambar'];?>" 
								alt="<?php echo $pasang_iklan_home['judul'];?>" 
						/>
					</a>
			<?php }
			}				
			if (trim($pasang_iklan_home['source']) != '') { 
				echo $pasang_iklan_home['source'];
			}
			?>  
	</div>  
</section>