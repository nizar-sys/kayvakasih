<?php echo form_open($this->uri->segment(1)."/nicepage",array( 'class'=> 'form-horizontal pt-4' )) ;?>

    <?php  
        $get_lokasi_menu = isset($get_lokasi_menu) ? $get_lokasi_menu : array();  
        $get_menu_dropdown = isset($get_menu_dropdown) ? $get_menu_dropdown : array(); 
    ?>
    <div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Setting Menu
            </h3>
        </div>
        <div class="card-body"> 
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Set Menu Utama
                </label>
                <div class="col-sm-4">
                    <select name="lokasi_menu[menu_utama]" class="form-control">
                        <option value="" <?php echo (empty($get_lokasi_menu['menu_utama'])) ? 'selected="selected"' : '';?>>-- Pilih Menu --</option>
                        <?php if(!empty($get_menu_dropdown)){
                            foreach($get_menu_dropdown as $item_menu){ 
                                ?>
                                <option value="<?php echo $item_menu['id'];?>" 
                                    <?php echo ($get_lokasi_menu['menu_utama'] ==  $item_menu['id']) ? 'selected="selected"' : '';?>>
                                    <?php echo $item_menu['nama'];?>
                                </option>
                                <?php
                            }
                        }?>
                    </select>
                </div>
            </div>    
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Set Menu Footer
                </label>
                <div class="col-sm-4">
                    <select name="lokasi_menu[menu_footer]" class="form-control">
                        <option value="" <?php echo (empty($get_lokasi_menu['menu_footer'])) ? 'selected="selected"' : '';?>>-- Pilih Menu --</option>
                        <?php if(!empty($get_menu_dropdown)){
                            foreach($get_menu_dropdown as $item_menu){ 
                                ?>
                                <option value="<?php echo $item_menu['id'];?>" 
                                    <?php echo ($get_lokasi_menu['menu_footer'] ==  $item_menu['id']) ? 'selected="selected"' : '';?>>
                                    <?php echo $item_menu['nama'];?>
                                </option>
                                <?php
                            }
                        }?>
                    </select>
                </div>
            </div>  
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_config_menu">Update</button>
        </div>
    </div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Lokasi "Menu Utama" mendukung hirarki menu.</li>
        <li>Lokasi "Menu Footer" hanya mendukung 1 level saja.</li>
    </ul>
</div>