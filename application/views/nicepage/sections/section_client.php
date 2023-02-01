<?php
$get_section_client = $this->model_utama->view_where('tbl_nicepage',array('key' => 'section_client'))->row_array();
if(isset($get_section_client['value'])){
	if(!empty($get_section_client['value'])){
		$section_client = json_decode($get_section_client['value'],true);
	}
} 

// get client logo 
$get_client = array();
if(isset($section_client['jumlah'])) {
    $get_client = $this->db->query("
        SELECT 
            client.id_client as id,
            client.nama as nama,
            client.logo as logo
        FROM 
            tbl_nicepage_client client 
        ORDER BY client.nama ASC 
        LIMIT 0,".$section_client['jumlah']
    )->result_array(); 
}
?>

<div class="container">
    <div class="card py-4">
        <?php if( !empty($section_client['judul'])) { ?>
        <h2 class="card-header section-title">
            <?php echo strtoupper($section_client['judul']);?>
        </h2>
        <?php } ?>
        <?php if( !empty($section_client['deskripsi'])) { ?>
        <div class="section-description">
            <?php echo $section_client['deskripsi'];?>
        </div>
        <?php } ?> 
        <div class="card-body">
            <div class="row justify-content-center">
                <?php if( !empty($get_client)) {  ?>
                    <?php foreach($get_client as $item) {?>
                    <div class="mb-4 col-md-4 col-lg-3">
                        <div class="body-container shadow p-2"> 
                            <?php 
                            if ($item['logo'] !==''){
                                $img_src =base_url().'asset/img_nicepage/client/'.$item['logo'];
                            } 
                            ?>
                            <img src="<?php echo $img_src;?>" alt="<?php echo $item['nama'];?>">                         
                        </div>
                    </div>                    
                    <?php }?> 
                <?php }?>
            </div>
        </div>
    </div>
</div> 