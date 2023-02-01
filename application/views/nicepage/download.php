<div class="post-head mb-4"> 
Semua daftar / List File Download
</div>  
<div class="blog-detail card shadow mb-4">
	<div class="card-body">
		<table class="table table-bordered table-hover table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama File</th>
					<th>Hits</th>
					<th style='width:70px'></th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no=$this->uri->segment(3)+1;
					foreach ($download->result_array() as $r) {	
					?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $r['judul'];?></td>
							<td class="text-right"><?php echo $r['hits'];?> Kali</td>
							<td class="text-center">
								<a href="<?php echo base_url()."download/file/".$r['nama_file'];?>">
									<i class="fa fa-download" aria-hidden="true"></i>
								</a>
							</td>
						</tr> 
					<?php
						$no++;
					}
				?>
			</tbody>
		</table>
	</div>
	<div class="card-footer">
		<?php include 'partials/share.php';?>
	</div>
</div>
	<div class="pagination">
		<?php echo $this->pagination->create_links(); ?>
	</div>

<?php
$diklan = $this->model_utama->view_where_ordering_limit('iklantengah',array('posisi'=>'hal_download'),'id_iklantengah','ASC',0,5);
if(!empty($diklan)) {
	foreach ($diklan->result_array() as $ia) {
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
}
?> 