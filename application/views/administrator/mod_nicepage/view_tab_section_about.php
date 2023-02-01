<?php echo form_open($this->uri->segment(1)."/nicepage",array( 'class'=> 'form-horizontal pt-4' )) ;?>

    <?php  
        $get_section_about = isset($get_section_about) ? $get_section_about : array(); 
        $get_halaman_dropdown = isset($get_halaman_dropdown) ? $get_halaman_dropdown : array();
    ?>
    <div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Section About
            </h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Judul
                </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="section_about[judul]"  value="<?php echo $get_section_about['judul'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Deskripsi
                </label>
                <div class="col-sm-4">
                    <textarea  name="section_about[deskripsi]" rows="5" class="form-control"><?php echo $get_section_about['deskripsi'];?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    About
                </label>
                <div class="col-sm-4">
                    <select name="section_about[page]" class="form-control">
                        <option value="" <?php echo (empty($get_section_about['page'])) ? 'selected="selected"' : '';?>>-- Pilih Halaman --</option>
                        <?php if(!empty($get_halaman_dropdown)){
                            foreach($get_halaman_dropdown as $halaman){ 
                                ?>
                                <option value="<?php echo $halaman['id'];?>" 
                                    <?php echo ($get_section_about['page'] ==  $halaman['id']) ? 'selected="selected"' : '';?>>
                                    <?php echo $halaman['judul'];?>
                                </option>
                                <?php
                            }
                        }?>
                    </select>
                </div>
            </div>  
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Max. Kata
                </label>
                <div class="col-sm-4">
                    <input placeholder="45" type="text" class="form-control" 
                        name="section_about[max_kata]"  value="<?php echo $get_section_about['max_kata'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Label Link
                </label>
                <div class="col-sm-4">
                    <input placeholder="Selengkapnya" type="text" class="form-control" 
                        name="section_about[label_link]"  value="<?php echo $get_section_about['label_link'];?>">
                </div>
            </div>

        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_config_about">Update</button>
        </div>
    </div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan Judul / Deskripsi About.</li>
        <li>Pilihlah halaman yang akan digunakan sebagai informasi About.</li>
        <li>Pastikan halaman yang dipilih memiliki gambar, untuk tampilan yang bagus.</li>
        <li>Batasi max. kata yang ditampilkan dengan mengisi "Max. Kata" (default: 45 kata).</li>
        <li>"Label Link" untuk memberi nama button tautan ke halaman about (default:"selengkapnya").</li>
    </ul>
</div>