<?php 
$base_path = FCPATH; 
$tgl_posting   = tgl_indo($rows['tgl_posting']);
$tgl_mulai   = tgl_indo($rows['tgl_mulai']);
$tgl_selesai = tgl_indo($rows['tgl_selesai']);
$isi_agenda=nl2br($rows['isi_agenda']);
$baca = $rows['dibaca']+1; 
?>	

<div class="post-head mb-4"> 
Agenda
</div> 
<div class="agenda card shadow"> 
		<?php
		 	$img_src = base_url()."asset/foto_agenda/small_no-image.jpg";
			if (!empty($rows['gambar']) &&  file_exists( $base_path ."asset/foto_agenda/".($rows['gambar']) ) ){
				$img_src = base_url()."asset/foto_agenda/". $rows['gambar'];
				?>	 	
				<?php
			}
		?> 
		<div class="image-container">
			<img src="<?php echo $img_src;?>" alt="<?php echo  $rows['gambar'];?>" class="card-img-top">
		</div>
	<div class="card-body">
		<h2 class="card-title">
			<?php echo $rows['tema']; ?>
		</h2>
		<div class="post-meta"> 
			<i class="fa fa-calendar"></i> <?php echo $tgl_posting; ?> ,
			<i class="fa fa-user"></i> <?php echo "$rows[nama_lengkap]"; ?> ,
			dilihat <?php echo $rows['dibaca'];?> x 
		</div> 
		<div class="card-text">		
			<?php
				echo "<table>
					  <tr><td width=65px><b>Tema</b><br><br></td> <td width=15px> : </td> 	<td>$rows[isi_agenda]<br><br></td></tr>
					  <tr><td><b>Tanggal</b></td> 	<td> : </td> <td>$tgl_mulai s/d $tgl_selesai</td></tr>
					  <tr><td><b>Tempat</b></td> 	<td> : </td> <td>$rows[tempat]</td></tr>
					  <tr><td><b>Jam</b></td> 	<td> : </td> <td>$rows[jam]</td></tr>
					  </table><br><br>";
			?>
		</div> 
	</div>
	<div class="card-footer">  
		<?php include 'partials/share.php';?>
	</div>
</div>


<?php
$aiklan = $this->model_utama->view_where_ordering_limit('iklantengah',array('posisi'=>'detail_agenda'),'id_iklantengah','ASC',0,5);
if(!empty($aiklan)){
	?>
	<div class="mt-4">
	<?php
	foreach ($aiklan->result_array() as $ia) {
		echo "<a href='$ia[url]' target='_blank'>";
			$string = $ia['gambar'];
			if ($ia['gambar'] != ''){
				if(preg_match("/swf\z/i", $string)) {
					echo "<embed style='margin-top:-10px' src='".base_url()."asset/foto_iklantengah/$ia[gambar]' width='100%' height=90px quality='high' type='application/x-shockwave-flash'>";
				} else {
					echo "<img style='margin-top:-10px; margin-bottom:5px' width='100%' src='".base_url()."asset/foto_iklantengah/$ia[gambar]' title='$ia[judul]' />";
				}
			}
		echo "</a>";
		if (trim($ia['source']) != ''){ echo "$ia[source]"; }
	}
	?>
	</div>
	<?php
}
?> 