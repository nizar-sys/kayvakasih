<?php
$get_section_contact    = $this->model_utama->view_where('tbl_nicepage',array('key' => 'section_contact'))->row_array();
if(isset($get_section_contact['value'])){
	if(!empty($get_section_contact['value'])){
		$section_contact = json_decode($get_section_contact['value'],true);
	}
}
  
/**
 * untuk generate captcha
 */
$this->load->helper('captcha');
$vals = array(
    'img_path'	 => './captcha/',
    'img_url'	 => base_url().'captcha/',
    'font_size'     => 17,
    'img_width'	 => '150',
    'img_height' => 29,
    'border' => 0, 
    'word_length'   => 5,
    'expiration' => 7200
);
    
$security_code = create_captcha($vals);    
$this->session->set_userdata('captcha_contact', $security_code['word']); 
?>
<div class="container">
    <div class="card py-4">
        <?php if( !empty($section_contact['judul'])) { ?>
        <h2 class="card-header section-title">
            <?php echo strtoupper($section_contact['judul']);?>
        </h2>
        <?php } ?>
        <?php if( !empty($section_contact['deskripsi'])) { ?>
        <div class="section-description">
            <?php echo $section_contact['deskripsi'];?>
        </div>
        <?php } ?> 
        <div class="card-body">
            <div class="row justify-content-center"> 
                <div class="col-lg-12">
                    <div class="body-container p-4 shadow">
                        <?php  
                            $alert = $this->session->flashdata('contact_message');   
                            if( !empty($alert) && isset($alert['success'])) {?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                    <?php echo $alert['success'];?>
                                </div>
                                <?php
                            }
                            if( !empty($alert) && isset($alert['warning'])) {?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                    <?php echo $alert['warning'];?>
                                </div>
                                <?php
                            }
                        ?>
                        <div class="row">
                            <div class="col-md-6">                   
                                <form action="<?php echo base_url('contact-us');?>" method="POST">         
                                    <div class="form-group">
                                        <label>Nama *</label>
                                        <input type="text" required  class="form-control" name="nama">
                                    </div>
                                    <div class="form-group">
                                        <label>Email *</label>
                                        <input type="text" required class="form-control" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label>Pesan *</label>
                                        <textarea name="pesan" required rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label > Kode Keamanan * <?php echo $security_code['image']; ?> </label>
                                        <input name='security_code' maxlength=6 type="text" class="required form-control" placeholder="Masukkkan kode keamanan">
                                    </div>
                                    
                                    <div class="form-group text-center">
                                        <button name="kirim" class="btn btn-theme px-5 py-2" type="submit" >
                                            Kirim
                                        </button>
                                    </div>
		                        </form>
                            </div>
                            <div class="col-md 6">
                                <div class="body-content">
                                    <?php echo $section_contact['text'];?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<?php if(isset($section_contact['embeded_code']) && !empty($section_contact['embeded_code'])) { ?>
<div class="google-map-source">
    <?php echo $section_contact['embeded_code'];?>
</div>
<?php }?>