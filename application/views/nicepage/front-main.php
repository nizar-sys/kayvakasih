<div class="container mt-md-120 mt-120">
		<div class="row">
            <div class="col-lg-8">
               
                    <?php
                    $iklanatas = $this->model_utama->view('iklanatas')->result_array(); 
                    if (
                            ($this->uri->segment(1)=='main' OR $this->uri->segment(1)=='') &&
                            !empty($iklanatas)
                        ){
                        $iklanatas = $this->model_utama->view('iklanatas');
                        ?>
                         <div class="text-center mb-4">
                        <?php
                        foreach ($iklanatas as $b) {
                            $string = $b['gambar'];
                            if ($b['gambar'] != ''){
                                if(preg_match("/swf\z/i", $string)) {
                                    echo "<embed width='100%' src='".base_url()."asset/foto_iklanatas/$b[gambar]' quality='high' type='application/x-shockwave-flash'>";
                                } else {
                                    echo "<a href='$b[url]' target='_blank'><img style='margin-bottom:5px' width='100%' src='".base_url()."asset/foto_iklanatas/$b[gambar]' alt='$b[judul]' /></a>";
                                }
                            }
                            if (trim($b['source']) != ''){ echo "$b[source]"; }
                        }
                        ?>
                        </div>
                        <?php
                    }
                    ?>
                <?php 
                if ($this->uri->segment(1)=='kategori'){
                    $bb = $this->db->query("SELECT * FROM kategori where kategori_seo='".cetak($this->uri->segment(3))."'")->row_array();
                    if ($bb['gambar_utama'] != ''){
                        if(preg_match("/swf\z/i", $string)) {
                            echo "<embed width='100%' src='".base_url()."asset/foto_berita/$bb[gambar_utama]' quality='high' type='application/x-shockwave-flash'>";
                        } else {
                            echo "<a href='#' target='_blank'><img style='margin-bottom:5px' width='100%' src='".base_url()."asset/foto_berita/$bb[gambar_utama]' alt='$bb[nama_kategori]' /></a>";
                        }
                    }
                }
                ?> 
                <?php echo $contents; ?> 
            </div>
            <div class="col-lg-4"> 
                <?php include "partials/sidebar.php"; ?>
            </div>
    </div>
</div>