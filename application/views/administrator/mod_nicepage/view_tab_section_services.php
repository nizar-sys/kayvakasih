<?php echo form_open($this->uri->segment(1)."/nicepage",array( 'class'=> 'form-horizontal pt-4' )) ;?>

    <?php  
        $get_section_services = isset($get_section_services) ? $get_section_services : array(); 
        $get_halaman_dropdown = isset($get_halaman_dropdown) ? $get_halaman_dropdown : array();     
    ?>
    <div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Section Services
            </h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Judul
                </label>
                <div class="col-sm-4"> 
                    <input type="text" class="form-control" name="section_services[judul]"  value="<?php echo $get_section_services['judul'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Deskripsi
                </label>
                <div class="col-sm-4">
                    <textarea  name="section_services[deskripsi]" rows="5" class="form-control"><?php echo $get_section_services['deskripsi'];?></textarea>
                </div>
            </div>
            <?php 
                for($srv = 1; $srv <= $get_services_max; $srv++) {
            ?>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Service <?php echo $srv;?>
                </label>
                <div class="col-sm-4">
                    <select name="section_services[page_<?php echo $srv;?>]" class="form-control">
                        <option value="" <?php echo (empty($get_section_services['page_'.$srv])) ? 'selected="selected"' : '';?>>-- Pilih Halaman --</option>
                        <?php if(!empty($get_halaman_dropdown)){
                            foreach($get_halaman_dropdown as $halaman){ 
                                ?>
                                <option value="<?php echo $halaman['id'];?>" 
                                    <?php echo ($get_section_services['page_'.$srv] ==  $halaman['id']) ? 'selected="selected"' : '';?>>
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
                    <select name="section_services[layout]" class="form-control"> 
                        <option value="2" <?php echo ($get_section_services['layout'] == '2') ? 'selected="selected"' : '';?>>2 Kolom</option>
                        <option value="3" <?php echo ($get_section_services['layout'] == '3') ? 'selected="selected"' : '';?>>3 Kolom</option> 
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Max. Kata
                </label>
                <div class="col-sm-4">
                    <input placeholder="15" type="text" class="form-control" 
                        name="section_services[max_kata]"  value="<?php echo $get_section_services['max_kata'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Url Link
                </label>
                <div class="col-sm-4">
                    <input placeholder="http://services.selengkapnya" type="text" class="form-control" 
                        name="section_services[url_link]"  value="<?php echo $get_section_services['url_link'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Label Link
                </label>
                <div class="col-sm-4">
                    <input placeholder="Selengkapnya" type="text" class="form-control" 
                        name="section_services[label_link]"  value="<?php echo $get_section_services['label_link'];?>">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_config_services">Update</button>
        </div>
    </div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan Judul / Deskripsi Services.</li>
        <li>Pilihlah halaman yang akan digunakan sebagai informasi Services.</li>
        <li>Pastikan halaman yang dipilih memiliki gambar, serta memiliki ukuran yang sama untuk tampilan yang bagus.</li>
        <li>Pilih "Layout" yang sesuai.</li>
        <li>Batasi max. kata yang ditampilkan dengan mengisi "Max. Kata" (default: 15 kata).</li>
        <li>"Url Link" untuk memberi link tautan ke halaman yang berkaitan, jika diperlukan info tambahan, biarkan kosong jika tidak ada.</li>
        <li>"Label Link" untuk memberi nama link tautan ke halaman yang berkaitan (default:"selengkapnya"). Jika "Url Link"  kosong maka tidak tampil.</li>
    </ul>
</div>