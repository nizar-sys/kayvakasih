<?php echo form_open($this->uri->segment(1)."/nicepage",array( 'class'=> 'form-horizontal pt-4' )) ;?>

    <?php  
        $get_section_feature = isset($get_section_feature) ? $get_section_feature : array(); 
        $get_halaman_dropdown = isset($get_halaman_dropdown) ? $get_halaman_dropdown : array();    
    ?>
    <div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Section Feature
            </h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Judul
                </label>
                <div class="col-sm-4"> 
                    <input type="text" class="form-control" name="section_feature[judul]"  value="<?php echo $get_section_feature['judul'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Deskripsi
                </label>
                <div class="col-sm-4">
                    <textarea  name="section_feature[deskripsi]" rows="5" class="form-control"><?php echo $get_section_feature['deskripsi'];?></textarea>
                </div>
            </div>
            <?php 
                for($ftr = 1; $ftr <= $get_feature_max; $ftr++) {
            ?>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Feature <?php echo $ftr;?>
                </label>
                <div class="col-sm-4">
                    <select name="section_feature[page_<?php echo $ftr;?>]" class="form-control">
                        <option value="" <?php echo (empty($get_section_feature['page_'.$ftr])) ? 'selected="selected"' : '';?>>-- Pilih Halaman --</option>
                        <?php if(!empty($get_halaman_dropdown)){
                            foreach($get_halaman_dropdown as $halaman){ 
                                ?>
                                <option value="<?php echo $halaman['id'];?>" 
                                    <?php echo ($get_section_feature['page_'.$ftr] ==  $halaman['id']) ? 'selected="selected"' : '';?>>
                                    <?php echo $halaman['judul'];?>
                                </option>
                                <?php
                            }
                        }?>
                    </select>
                </div>
            </div> 
            <?php
                }
            ?>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Layout
                </label>
                <div class="col-sm-4">
                    <select name="section_feature[layout]" class="form-control">
                        <option value="0" <?php echo ($get_section_feature['layout'] == '0') ? 'selected="selected"' : '';?>>Grid Variant</option> 
                        <option value="2" <?php echo ($get_section_feature['layout'] == '2') ? 'selected="selected"' : '';?>>2 Kolom</option>
                        <option value="3" <?php echo ($get_section_feature['layout'] == '3') ? 'selected="selected"' : '';?>>3 Kolom</option> 
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Max. Kata
                </label>
                <div class="col-sm-4">
                    <input placeholder="15" type="text" class="form-control" 
                        name="section_feature[max_kata]"  value="<?php echo $get_section_feature['max_kata'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Url Link
                </label>
                <div class="col-sm-4">
                    <input placeholder="http://feature.selengkapnya" type="text" class="form-control" 
                        name="section_feature[url_link]"  value="<?php echo $get_section_feature['url_link'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Label Link
                </label>
                <div class="col-sm-4">
                    <input placeholder="Selengkapnya" type="text" class="form-control" 
                        name="section_feature[label_link]"  value="<?php echo $get_section_feature['label_link'];?>">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_config_feature">Update</button>
        </div>
    </div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan Judul / Deskripsi Feature.</li>
        <li>Pilihlah halaman yang akan digunakan sebagai informasi Feature.</li>
        <li>Pastikan halaman yang dipilih memiliki gambar, serta memiliki ukuran yang sama untuk tampilan yang bagus.</li>
        <li>Pilih "Layout" yang sesuai.</li>
        <li>Batasi max. kata yang ditampilkan dengan mengisi "Max. Kata" (default: 15 kata).</li>
        <li>"Url Link" untuk memberi link tautan ke halaman yang berkaitan, jika diperlukan info tambahan, biarkan kosong jika tidak ada.</li>
        <li>"Label Link" untuk memberi nama link tautan ke halaman yang berkaitan (default:"selengkapnya"). Jika "Url Link"  kosong maka tidak tampil.</li>
    </ul>
</div>