<style>
.no-logo{
    width: 250px;
    border: 1px solid #dee2e6;
    color: #dee2e6;
    justify-content: center;
    flex-direction: column;
    display: flex;
    text-align: center;
}
.title,
.nama{
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
            Daftar Client
        </h3>
    </div>
    <div class="card-body">
        <table id="nicepage-client-table" class="table table-sm table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width:40px">No</th>
                    <th style="width:250px">Logo</th>
                    <th>Nama</th> 
                    <th style="width:100px">Aksi</th>
                </tr>
            </thead>
            <tbody> 
            <?php if( !empty($get_client) ) {?>
                <?php $fpath = FCPATH;?>
                <?php foreach($get_client as $i => $client){?>
                <tr>
                    <td><?php echo $i+1;?></td>
                    <td>
                    <?php 
                        $logo_file= $fpath .'asset/img_nicepage/client/'.$client['logo']; 
                        if(file_exists($logo_file) && !empty($client['logo'])) {
                            ?>
                            <img src="<?php echo base_url()."asset/img_nicepage/client/".$client['logo'];?>" style="width:100%">
                            <?php
                        } else {
                            ?>
                            <div class="no-logo">
                                No Logo
                            </div>
                            <?php
                        }
                    ?>
                    </td>
                    <td> 
                            <?php echo $client['nama']; ?> 
                    </td> 
                    <td>
                        <button type="button" class="nicepage-btn-client-edit btn btn-xs btn-success"
                            data-id="<?php echo $client['id_client'] ;?>"
                            data-nama="<?php echo $client['nama'] ;?>" 
                            data-logo="<?php echo $client['logo'] ;?>"
                            data-logourl="<?php echo base_url()."asset/img_nicepage/client/".$client['logo'];?>"
                        >
                            <i class="fas fa-edit"></i>
                        </button>
                        <?php echo form_open($this->uri->segment(1)."/nicepage-client" , array('class'=> 'nicepage-client-delete-form d-inline'));?>
                            <input type="hidden" value="<?php echo $client['id_client'];?> " name="id_delete">
                            <button data-nama="<?php echo $client['nama'] ;?>" type="button" class="nicepage-btn-client-delete btn btn-xs btn-danger" name="delete_client">
                                <i class="fa fa-trash-alt"></i>
                            </button>
                        <?php echo form_close();?>
                    </td>
                </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td class="no-data" colspan="4"> Belum ada client </td>
                </tr>
            <?php } ?>                
            </tbody>
        </table>
    </div>        
</div> 
</div>

<script>  
$(function(){ 
    $('.nicepage-btn-client-delete').on('click', function(e){
        e.preventDefault(); 
        var result = confirm('Apakah anda akan menghapus client '+ $(this).data('nama') +' ?')
        if(result) {
            $(this).closest('form.nicepage-client-delete-form').submit();
        } 

    });
    $('.nicepage-btn-client-edit').on('click', function(e){
        e.preventDefault(); 
        nicePageClientClearForm();

        // deactive tabs
        if($('#nicepage-client .nav-tabs').find('a.nav-link').hasClass('active')){
            $('#nicepage-client .nav-tabs').find('a.nav-link').removeClass('active');
            $('#nicepage-client .nav-tabs').find('a.nav-link').removeClass('show'); 
        }
        
        if($('#nicepage-client .tab-content').find('.tab-pane').hasClass('active')){ 
            $('#nicepage-client .tab-content').find('.tab-pane').removeClass('active');
            $('#nicepage-client .tab-content').find('.tab-pane').removeClass('show');
        }

        // active tab
        $('#nicepage-client .nav-tabs .nav-link#content-client-form-tab').addClass('active');
        $('#nicepage-client .nav-tabs .nav-link#content-client-form-tab').addClass('show');
        $('#nicepage-client .tab-content .tab-pane#content-client-form').addClass('active');
        $('#nicepage-client .tab-content .tab-pane#content-client-form').addClass('show');

        // form
        $('#nicepage-client #content-client-form #nicepage-client-form #id').val($(this).data('id'));
        $('#nicepage-client #content-client-form #nicepage-client-form #nama').val($(this).data('nama')); 

        if($(this).data('logo')) {
            $('#nicepage-client #content-client-form #nicepage-client-form #file-logo').html(
                '<img style="width:100%" src="'+ $(this).data('logourl')+'" />'
            );
            $('#nicepage-client #content-client-form #nicepage-client-form #file-logo-upload').removeAttr('required');
        }

    });
    
    $('#nicepage-client a#content-client-form-tab').on('click',function(e){ 
        nicePageClientClearForm();
    });

    var nicePageClientClearForm = function(){        
        $('#nicepage-client #content-client-form #nicepage-client-form #id').val('');
        $('#nicepage-client #content-client-form #nicepage-client-form #nama').val(''); 
        $('#nicepage-client #content-client-form #nicepage-client-form #file-logo').html('');
        $('#nicepage-client #content-client-form #nicepage-client-form #file-logo-upload').attr('required',''); 
    }

    $('#nicepage-client-table').DataTable( );
      
      // auto remove / hide alert message
      if( $(document).find('#nicepage-alert.alert')) {
          $('#nicepage-alert.alert').fadeOut(3000,function(){
              //remove it 
              $('#nicepage-alert.alert').remove();
          }); 
      }
    
});
</script>