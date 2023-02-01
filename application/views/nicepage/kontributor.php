<script type="text/javascript">
	function validasireg(form){
		if (form.a.value == ""){ alert("Anda belum mengisikan Username"); form.a.focus(); return (false); }							
		if (form.b.value == ""){ alert("Anda belum mengisikan Password"); form.b.focus(); return (false); }									
		if (form.c.value == ""){ alert("Anda belum menuliskan Nama Lengkap"); form.c.focus(); return (false); }
		if (form.d.value == ""){ alert("Anda belum menuliskan Email"); form.d.focus(); return (false); }
		if (form.e.value == ""){ alert("Anda belum menuliskan No Telpon"); form.e.focus(); return (false); }																		
	  return (true);
	}
</script>	
<div class="post-head mb-4"> 
	Pendaftaran untuk Kontributor
</div>  
<div class="blog card shadow mb-4">	
	<div class="card-body">
		<div class="card-text">			
			<div class="alert alert-warning">
				<strong>PENTING!</strong>
				<p>
					Untuk berkontribusi dalam memberikan atau menulis artikel/berita, 
					maka Silahkan Melengkapi form dibawah ini dengan data yang sebenarnya. Terima kasih,.. ^_^
				</p>
			</div> 
			<?php echo $this->session->flashdata('message'); ?>
			<form class="form" action="<?php echo base_url(); ?>kontributor/pendaftaran" method="POST" enctype='multipart/form-data' onSubmit="return validasireg(this)">
				<div class="row">
					<div class="col-md-12 form-group">
						<label for="c_name">Username<span class="required">*</span></label>
						<input class="form-control" type="text" placeholder="Nickname" name='a' id="c_name" onkeyup="nospaces(this)" required/>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 form-group">
						<label for="c_name">Password<span class="required">*</span></label>
						<input class="form-control"  type="text" placeholder="Password" name='b' id="c_name" required/>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 form-group">
						<label for="c_name">Nama Lengkap<span class="required">*</span></label>
						<input class="form-control"  type="text" placeholder="Nama Lengkap" name='c' id="c_name" required/>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 form-group">
						<label for="c_email">E-mail<span class="required">*</span></label>
						<input class="form-control"  type="text" placeholder="E-mail" name='d' id="c_email" required/>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 form-group">
						<label for="c_email">No Telpon<span class="required">*</span></label>
						<input class="form-control"  type="text" placeholder="No Telpon" name='e' id="c_email" required/>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 form-group">
						<label for="c_email">Foto<span class="required">*</span></label>
						<input class="form-control"  type="file" name='f' id="c_email" required/><br>
						<i>Allowed File : gif, jpg, png, jpeg</i>
					</div>	
				</div>						
				<div class="row">
					<div class="col-md-12">
						<label >Kode Keamanan <span class="required">*</span></label>
					</div>
					<div class="form-group col-md-3">
						<label><?php echo $image; ?></label>
					</div>							
					<div class="form-group col-md-9">
						<input name='secutity_code' maxlength=6 type="text" class="form-control" required placeholder="Masukkkan kode di sebelah kiri..">
					</div>
				</div>	 							
				<div class="row">
					<div class="col-md-12">
						<input type="submit" class="btn btn-submit" name='submit' value="Daftar Sekarang!" />
					</div>
				</div>	  
			</form>
		</div>
	</div>
</div>  