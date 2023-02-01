<?php echo form_open($this->uri->segment(1)."/nicepage",array( 'class'=> 'form-horizontal pt-4' )) ;?>

    <?php  
        $get_section_pengumuman = isset($get_section_pengumuman) ? $get_section_pengumuman : array(); 
        $get_kategori_dropdown = isset($get_kategori_dropdown) ? $get_kategori_dropdown : array();
    ?>
    <div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Section Pengumuman
            </h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Judul
                </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="section_pengumuman[judul]"  value="<?php echo $get_section_pengumuman['judul'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Deskripsi
                </label>
                <div class="col-sm-4">
                    <textarea  name="section_pengumuman[deskripsi]" rows="5" class="form-control"><?php echo $get_section_pengumuman['deskripsi'];?></textarea>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Jumlah Pengumuman Yang Tampil
                </label>
                <div class="col-sm-4">
                    <select name="section_pengumuman[jumlah]" class="form-control">
                        <?php
                        for($n = 1; $n <=6 ; $n++){ 
                            ?>
                            <option value="<?php echo $n;?>" 
                                <?php echo ($get_section_pengumuman['jumlah'] == $n) ? 'selected="selected"' : '';?>>
                                <?php echo $n;?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Layout
                </label>
                <div class="col-sm-4">
                    <select name="section_pengumuman[layout]" class="form-control">  
                        <option value="column" <?php echo ($get_section_pengumuman['layout'] == 'column') ? 'selected="selected"' : '';?>>3 Kolom</option>
                        <option value="table" <?php echo ($get_section_pengumuman['layout'] == 'table') ? 'selected="selected"' : '';?>>Table</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Label Link
                </label>
                <div class="col-sm-4">
                    <input placeholder="Selengkapnya" type="text" class="form-control" 
                        name="section_pengumuman[label_link]"  value="<?php echo $get_section_pengumuman['label_link'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Gambar Di Halaman Pengumuman
                </label>
                <div class="col-sm-4">
                    <select name="section_pengumuman[gambar_halaman]" class="form-control">      
                        <option value="1" <?php echo ($get_section_agenda['gambar_halaman'] == '1') ? 'selected="selected"' : '';?>>Tampilkan</option>
                        <option value="0" <?php echo ($get_section_agenda['gambar_halaman'] == '0') ? 'selected="selected"' : '';?>>Sembunyikan</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_config_pengumuman">Update</button>
        </div>
    </div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan Judul / Deskripsi Pengumuman.</li>  
        <li>Pilih kategori pengumuman yang akan ditampilkan</li>
        <li>Batasi pengumuman yang ditampilkan dengan mengisi "Jumlah Pengumuman Yang Tampil".</li> 
        <li>Pilih "Layout" yang sesuai.</li> 
        <li>"Label Link" untuk memberi nama link tautan ke halaman pengumuman (default:"selengkapnya").</li>
    </ul>
</div>