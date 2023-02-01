<?php echo form_open($this->uri->segment(1)."/nicepage",array( 'class'=> 'form-horizontal pt-4' )) ;?>

    <?php 
         $get_sections_aktif = isset($get_sections_aktif) ? $get_sections_aktif : array();
         $get_sections_order = isset($get_sections_order) ? $get_sections_order : $get_sections_aktif;
    ?>
    <div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Daftar Section
            </h3>
        </div>
        <?php if( !empty($get_sections_order)) {?> 
        <div class="card-body">                
            <div class="row">
                <div class="col-sm-6">
                    <div id="sections-list" class="dd">
                        <ol class="dd-list">
                            <?php  
                                foreach($get_sections_order as $sections_key){
                                    if( in_array($sections_key, $get_sections_aktif)) {
                                    ?>
                                    <li class="dd-item" data-id="<?php echo $sections_key;?>">
                                    <div class="dd-handle callout callout-info py-3" style="cursor:move;height:100%">
                                        <div>
                                        <i class="fa fa-arrows-alt"></i> <?php echo isset($sections[$sections_key]) ? $sections[$sections_key]: $sections_key; ?>
                                        </div>
                                    </div> 
                                    </li>
                                    <?php
                                    }
                                }
                            ?>
                        </ol>
                    </div>            
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="hidden" id="sections_order" name="sections_order">
            <button class="btn btn-info" type="submit" name="set_urut_sections">Update</button>
        </div>
        <?php } else {?>
        <div class="card-body">                
            <div class="row">
                <div class="col-sm-6">
                    <div class="alert alert-warning" role="alert">
                        <strong>Warning</strong> <div>Section belum ditampilkan</div>
                    </div>
                </div>    
            </div>    
        </div>    
        <?php
        }?>
    </div>
<?php echo form_close();?> 
<script>
$(document).ready(function() {
    var updateOutput = function(e) {
        var list = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));
        } else {
            output.val('JSON Not Supported');
        }
    };
    $('#sections-list').nestable({
        maxDepth: 1
    }).on('change', updateOutput);
    updateOutput($('#sections-list').data('output', $('#sections_order')));
});
</script>