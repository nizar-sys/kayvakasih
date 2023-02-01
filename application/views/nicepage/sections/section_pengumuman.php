<?php
$this->load->helper('text');
$get_section_pengumuman    = $this->model_utama->view_where('tbl_nicepage',array('key' => 'section_pengumuman'))->row_array();
if(isset($get_section_pengumuman['value'])){
	if(!empty($get_section_pengumuman['value'])){
		$section_pengumuman = json_decode($get_section_pengumuman['value'],true);
	}
}
 
?>

<div class="container">
    <div class="card py-4">
        <?php if( !empty($section_pengumuman['judul'])) { ?>
        <h2 class="card-header section-title">
            <?php echo strtoupper($section_pengumuman['judul']);?>
        </h2>
        <?php } ?>
        <?php if( !empty($section_pengumuman['deskripsi'])) { ?>
        <div class="section-description">
            <?php echo $section_pengumuman['deskripsi'];?>
        </div>
        <?php } ?> 
        <div class="card-body">
            <?php
                $jumlah_pengumuman = 0; 
                if( isset($section_pengumuman['jumlah']) ) {
                    $jumlah_pengumuman = (int) $section_pengumuman['jumlah'];
                }
                
                $pengumuman_data =  $this->model_utama->view_join(
                    'tbl_nicepage_pengumuman',
                    'users',
                    'username', 
                    'tanggal','DESC',0, $jumlah_pengumuman
                )->result_array();  
            ?> 
            <div class="row justify-content-center">  
                <?php
                    $layout = 'column';
                    if( isset($section_pengumuman['layout']) ) {
                        $layout = $section_pengumuman['layout'];
                    }

                    if($layout == 'table') {
                ?>
                    <div class="col-12">
                        <div class="card shadow p-4 bg-white">
                            <div class="card-body m-0 p-0">
                                <table class="table table-bordered table-hover m-0">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Deskripsi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        if(!empty($pengumuman_data)) {
                                            ?>
                                            <tbody>
                                            <?php
                                            foreach ($pengumuman_data as $item) { 
                                                ?>
                                                <tr>
                                                    <td> <?php echo tgl_indo($item['tanggal']);?> </td>
                                                    <td>
                                                        <a href="<?php echo base_url('pengumuman/detail/'.$item['judul_seo']);?>">    
                                                            <?php echo $item['judul'];?> 
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                            <?php
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>                    
                <?php } else { ?>
                    <?php  
                        if(!empty($pengumuman_data)) {
                            foreach ($pengumuman_data as $item) { 
                                $img_src= base_url().'asset/img_nicepage/pengumuman/no-image.jpg';
                                if ($item['gambar'] !==''){
                                    $img_src =base_url().'asset/img_nicepage/pengumuman/'.$item['gambar'];
                                }  
                                ?> 
                                    <div class="col-md-4 mb-4" >
                                        <div class="body-container card animate shadow h-100">										
                                            <a href="<?php echo base_url('pengumuman/detail/'.$item['judul_seo']);?>">
                                                <div class="post-img-container"
                                                    style="
                                                        background:url('<?php echo $img_src;?>');
                                                        background-position:center;
                                                        background-size:cover;
                                                        background-repeat:no-repeat;
                                                        height:250px;"> 
                                                </div>
                                            </a>
                                            <a href="<?php echo base_url('pengumuman/detail/'.$item['judul_seo']);?>">
                                                <div class="body-content"> 
                                                    <h5 class="post-title">
                                                        <?php echo $item['judul'];?> 
                                                    </h5>  
                                                    <div class="body-post-meta p-0 py-1">   
                                                        <i class="fa fa-calendar"></i> <?php echo tgl_indo($item['tanggal']); ?> ,
                                                        <i class="fa fa-user"></i> <?php echo $item['nama_lengkap']; ?> 
                                                    </div> 
                                                </div>										
                                            </a> 
                                        </div>
                                    </div>
                                <?php
                            }
                            ?>
                      
                            <?php
                        } else {
                            ?>
                            <div class="col-md-12 text-center py-5">
                                Belum Ada Pengumuman Terdekat
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <div class="col-12 mt-4 text-center">
                        <a href="<?php echo base_url('pengumuman');?>" class="read-more">                                    
                            <?php echo (empty(trim($section_portfolio['label_link'])) ? 'Selengkapnya' : $section_portfolio['label_link']);?>
                        </a> 
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div> 