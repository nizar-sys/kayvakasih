<?php
$this->load->helper('text');
$get_section_agenda    = $this->model_utama->view_where('tbl_nicepage',array('key' => 'section_agenda'))->row_array();
if(isset($get_section_agenda['value'])){
	if(!empty($get_section_agenda['value'])){
		$section_agenda = json_decode($get_section_agenda['value'],true);
	}
}
 
?>

<div class="agenda">
    <div class="container">
        <div class="card py-4">
            <?php if( !empty($section_agenda['judul'])) { ?>
            <h2 class="card-header section-title">
                <?php echo strtoupper($section_agenda['judul']);?>
            </h2>
            <?php } ?>
            <?php if( !empty($section_agenda['deskripsi'])) { ?>
            <div class="section-description">
                <?php echo $section_agenda['deskripsi'];?>
            </div>
            <?php } ?> 
            <div class="card-body">
                <?php
                    $jumlah_agenda = 0; 

                    if( isset($section_agenda['jumlah']) ) {
                        $jumlah_agenda = (int) $section_agenda['jumlah'];
                    }
                    $agenda_data =  $this->db->query("
                        SELECT
                            * 
                        FROM
                            agenda
                        WHERE
                            tgl_mulai >= curdate()
                        ORDER BY
                            tgl_mulai asc
                        LIMIT 0,".$jumlah_agenda
                    )->result_array();   
                ?> 
                <div class="row justify-content-center"> 
                <?php
                    $layout = 'column';
                    if( isset($section_agenda['layout']) ) {
                        $layout = $section_agenda['layout'];
                    }

                    if($layout == 'table') {
                ?>
                    <div class="col-12">
                        <div class="card shadow p-4">
                            <div class="card-body m-0 p-0">
                                <table class="table table-bordered table-hover m-0">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Deskripsi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        if(!empty($agenda_data)) {
                                            ?>
                                            <tbody>
                                            <?php
                                            foreach ($agenda_data as $agenda) { 
                                                ?>
                                                <tr>
                                                    <td> <?php echo tgl_indo($agenda['tgl_mulai']);?> </td>
                                                    <td>
                                                        <a href="<?php echo base_url('agenda/detail/'.$agenda['tema_seo']);?>">    
                                                            <?php echo $agenda['tema'];?> 
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
                        if(!empty($agenda_data)) {
                            foreach ($agenda_data as $agenda) { 
                                $img_src= base_url().'asset/foto_agenda/no-image.jpg';
                                if ($agenda['gambar'] !==''){
                                    $img_src =base_url().'asset/foto_agenda/'.$agenda['gambar'];
                                }  
                                ?> 
                                    <div class="col-md-4 mb-4" >
                                        <div class="body-container card animate shadow h-100">										
                                            <a href="<?php echo base_url('agenda/detail/'.$agenda['tema_seo']);?>">
                                                <div class="post-img-container"
                                                    style="
                                                        background:url('<?php echo $img_src;?>');
                                                        background-position:center;
                                                        background-size:cover;
                                                        background-repeat:no-repeat;
                                                        height:250px;"> 
                                                </div>
                                            </a>
                                            <a href="<?php echo base_url('agenda/detail/'.$agenda['tema_seo']);?>">
                                                <div class="body-content"> 
                                                    <h3 class="post-date">
                                                        <i class="fa fa-calendar-o"></i> <?php echo tgl_indo($agenda['tgl_mulai']);?> 
                                                    </h3>										
                                                    <h5 class="post-title">
                                                        <?php echo $agenda['tema'];?> 
                                                    </h5> 
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
                                Belum Ada Agenda Terdekat
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <div class="col-12 mt-4 text-center">
                        <a href="<?php echo base_url('agenda');?>" class="read-more">                                    
                            <?php echo (empty(trim($section_portfolio['label_link'])) ? 'Selengkapnya' : $section_portfolio['label_link']);?>
                        </a> 
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>