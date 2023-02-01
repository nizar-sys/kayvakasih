<style>
.no-gambar{
    width: 80px;
    height: 80px;
    border: 1px solid #dee2e6;
    color: #dee2e6;
    justify-content: center;
    flex-direction: column;
    display: flex;
    text-align: center;
}
.title,
.judul{
    display: block;
    padding: 0;
    margin: 0;
    font-weight: normal !important;
}

.title{
    font-size:14px;
}

.no-data{
    text-align: center;
    border: 1px solid #dee2e6;
}

</style>
<div class="pt-4">
<div class="card"  style="min-height:450px">
    <div class="card-header bg-info">
        <h3 class="card-title py-1">
            Daftar Pengumuman
        </h3>
    </div>
    <div class="card-body">
        <table id="nicepage-pengumuman-table" class="table table-sm table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width:40px">No</th>
                    <th style="width:80px">Gambar</th>
                    <th style="width:200px">Tanggal</th>
                    <th>Judul</th>
                    <th style="width:100px">Aksi</th>
                </tr>
            </thead>
            <tbody> 
            <?php if( !empty($get_pengumuman) ) {?>
                <?php $fpath = FCPATH;?>
                <?php foreach($get_pengumuman as $i => $pengumuman){?>
                <tr>
                    <td><?php echo $i+1;?></td>
                    <td>
                    <?php 
                        $gambar_file= $fpath .'asset/img_nicepage/pengumuman/'.$pengumuman['gambar']; 
                        if(file_exists($gambar_file) && !empty($pengumuman['gambar'])) {
                            ?>
                            <img src="<?php echo base_url()."asset/img_nicepage/pengumuman/".$pengumuman['gambar'];?>" style="width:100%">
                            <?php
                        } else {
                            ?>
                            <div class="no-gambar">
                                No Gambar
                            </div>
                            <?php
                        }
                    ?>
                    </td>
                    <td> 
                        <?php echo date('m/d/Y', strtotime($pengumuman['tanggal'])); ?> 
                    </td>
                    <td><?php echo $pengumuman['judul'];?></td>
                    <td>
                        <button type="button" class="nicepage-btn-pengumuman-edit btn btn-xs btn-success"
                            data-id="<?php echo $pengumuman['id_pengumuman'] ;?>"
                            data-judul="<?php echo $pengumuman['judul'] ;?>" 
                            data-deskripsi=""
                            data-tanggal="<?php echo date('m/d/Y',strtotime($pengumuman['tanggal']) );?>"
                            data-gambar="<?php echo $pengumuman['gambar'] ;?>"
                            data-gambarurl="<?php echo base_url()."asset/img_nicepage/pengumuman/".$pengumuman['gambar'];?>"
                        >
                            <i class="fas fa-edit"></i>
                        </button>
                        <?php echo form_open($this->uri->segment(1)."/nicepage-pengumuman" , array('class'=> 'nicepage-delete-form d-inline'));?>
                            <input type="hidden" value="<?php echo $pengumuman['id_pengumuman'];?> " name="id_delete">
                            <button data-judul="<?php echo $pengumuman['judul'] ;?>" type="button" class="nicepage-btn-pengumuman-delete btn btn-xs btn-danger" name="delete_pengumuman">
                                <i class="fa fa-trash-alt"></i>
                            </button>
                        <?php echo form_close();?>
                    </td>
                </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td class="no-data" colspan="5"> Belum ada pengumuman </td>
                </tr>
            <?php } ?>                
            </tbody>
        </table>
    </div>        
</div> 
</div>

<script>  
$(function(){ 
    $('.nicepage-btn-pengumuman-delete').on('click', function(e){
        e.preventDefault(); 
        var result = confirm('Apakah anda akan menghapus pengumuman dari '+ $(this).data('judul') +' ?')
        if(result) {
            $(this).closest('form.nicepage-delete-form').submit();
        } 

    });
    $('.nicepage-btn-pengumuman-edit').on('click', function(e){
        e.preventDefault(); 
        nicePagePengumumanClearForm();

        // deactive tabs
        if($('#nicepage-pengumuman .nav-tabs').find('a.nav-link').hasClass('active')){
            $('#nicepage-pengumuman .nav-tabs').find('a.nav-link').removeClass('active');
            $('#nicepage-pengumuman .nav-tabs').find('a.nav-link').removeClass('show'); 
        }
        
        if($('#nicepage-pengumuman .tab-content').find('.tab-pane').hasClass('active')){ 
            $('#nicepage-pengumuman .tab-content').find('.tab-pane').removeClass('active');
            $('#nicepage-pengumuman .tab-content').find('.tab-pane').removeClass('show');
        }

        // active tab
        $('#nicepage-pengumuman .nav-tabs .nav-link#content-pengumuman-form-tab').addClass('active');
        $('#nicepage-pengumuman .nav-tabs .nav-link#content-pengumuman-form-tab').addClass('show');
        $('#nicepage-pengumuman .tab-content .tab-pane#content-pengumuman-form').addClass('active');
        $('#nicepage-pengumuman .tab-content .tab-pane#content-pengumuman-form').addClass('show');

        // form
        if( $(this).data('id') ) {
            $('#nicepage-pengumuman #content-pengumuman-form #nicepage-pengumuman-form #id').val($(this).data('id'));
            $.get( "<?php echo base_url($this->uri->segment(1)."/nicepage-pengumuman/");?>" + $(this).data('id'), function( data ) { 

                var editor = $('#nicepage-pengumuman #content-pengumuman-form #nicepage-pengumuman-form .note-editor.note-frame.card');
                $('.note-editable.card-block', editor).html( data['deskripsi']);
                $('#nicepage-pengumuman #content-pengumuman-form #nicepage-pengumuman-form #judul').val(data['judul']); 
                $('#nicepage-pengumuman #content-pengumuman-form #nicepage-pengumuman-form #deskripsi').val(data['deskripsi']);
                $('#nicepage-pengumuman #content-pengumuman-form #nicepage-pengumuman-form #tanggal').val(data['tanggal']);

            }, "json" );
        }

        if($(this).data('gambar')) {
            $('#nicepage-pengumuman #content-pengumuman-form #nicepage-pengumuman-form #file-gambar').html(
                '<img style="width:100%" src="'+ $(this).data('gambarurl')+'" />'
            );
            $('#nicepage-pengumuman #content-pengumuman-form #nicepage-pengumuman-form #file-gambar-upload').removeAttr('required');
        }

    });
    
    $('#nicepage-pengumuman a#content-pengumuman-form-tab').on('click',function(e){ 
        nicePagePengumumanClearForm();
    });

    var nicePagePengumumanClearForm = function(){        
        $('#nicepage-pengumuman #content-pengumuman-form #nicepage-pengumuman-form #id').val('');
        $('#nicepage-pengumuman #content-pengumuman-form #nicepage-pengumuman-form #judul').val(''); 
        $('#nicepage-pengumuman #content-pengumuman-form #nicepage-pengumuman-form #deskripsi').val('');
        $('#nicepage-pengumuman #content-pengumuman-form #nicepage-pengumuman-form #tanggal').val('<?php echo date('m/d/Y');?>');
        $('#nicepage-pengumuman #content-pengumuman-form #nicepage-pengumuman-form #file-gambar').html('');
        $('#nicepage-pengumuman #content-pengumuman-form #nicepage-pengumuman-form #file-gambar-upload').attr('required',''); 
        
        var editor = $('#nicepage-pengumuman #content-pengumuman-form #nicepage-pengumuman-form .note-editor.note-frame.card');
        $('.note-editable.card-block', editor).html('');
    }

    $('#nicepage-pengumuman-table').DataTable( );
      
      // auto remove / hide alert message
      if( $(document).find('#nicepage-alert.alert')) {
          $('#nicepage-alert.alert').fadeOut(3000,function(){
              //remove it 
              $('#nicepage-alert.alert').remove();
          }); 
      }
});
</script>