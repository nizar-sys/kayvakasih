<?php echo form_open($this->uri->segment(1)."/nicepage",array( 'class'=> 'form-horizontal pt-4' )) ;?>

    <?php  
        $get_section_client = isset($get_section_client) ? $get_section_client : array();  
    ?>
    <div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Section Client
            </h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Judul
                </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="section_client[judul]"  value="<?php echo $get_section_client['judul'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Deskripsi
                </label>
                <div class="col-sm-4">
                    <textarea  name="section_client[deskripsi]" rows="5" class="form-control"><?php echo $get_section_client['deskripsi'];?></textarea>
                </div>
            </div> 
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Jumlah Logo Client Yang Tampil
                </label>
                <div class="col-sm-4">
                    <select name="section_client[jumlah]" class="form-control">
                        <?php
                        for($n = 1; $n <=10 ; $n++){ 
                            ?>
                            <option value="<?php echo $n;?>" 
                                <?php echo ($get_section_client['jumlah'] == $n) ? 'selected="selected"' : '';?>>
                                <?php echo $n;?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div> 
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_config_client">Update</button>
        </div>
    </div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan Judul / Deskripsi Client.</li>  
        <li>Batasi client yang ditampilkan dengan mengisi " Jumlah Logo Client Yang Tampil".</li> 
    </ul>
</div>