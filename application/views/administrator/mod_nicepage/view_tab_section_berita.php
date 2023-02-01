<?php echo form_open($this->uri->segment(1)."/nicepage",array( 'class'=> 'form-horizontal pt-4' )) ;?>

    <?php  
        $get_section_berita = isset($get_section_berita) ? $get_section_berita : array(); 
        $get_kategori_dropdown = isset($get_kategori_dropdown) ? $get_kategori_dropdown : array();
    ?>
    <div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Section Berita
            </h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Judul
                </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="section_berita[judul]"  value="<?php echo $get_section_berita['judul'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Deskripsi
                </label>
                <div class="col-sm-4">
                    <textarea  name="section_berita[deskripsi]" rows="5" class="form-control"><?php echo $get_section_berita['deskripsi'];?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Kategori
                </label>
                <div class="col-sm-4">
                    <select name="section_berita[kategori]" class="form-control">
                        <option value="" <?php echo (empty($get_section_berita['kategori'])) ? 'selected="selected"' : '';?>>-- Semua --</option>
                        <?php if(!empty($get_kategori_dropdown)){
                            foreach($get_kategori_dropdown as $kategori){ 
                                ?>
                                <option value="<?php echo $kategori['id'];?>" 
                                    <?php echo ($get_section_berita['kategori'] ==  $kategori['id']) ? 'selected="selected"' : '';?>>
                                    <?php echo $kategori['judul'];?>
                                </option>
                                <?php
                            }
                        }?>
                    </select>
                </div>
            </div> 
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Jumlah Berita Yang Tampil
                </label>
                <div class="col-sm-4">
                    <select name="section_berita[jumlah]" class="form-control">
                        <?php
                        for($n = 1; $n <=6 ; $n++){ 
                            ?>
                            <option value="<?php echo $n;?>" 
                                <?php echo ($get_section_berita['jumlah'] == $n) ? 'selected="selected"' : '';?>>
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
                    <select name="section_berita[layout]" class="form-control"> 
                        <option value="2" <?php echo ($get_section_berita['layout'] == '2') ? 'selected="selected"' : '';?>>2 Kolom</option>
                        <option value="3" <?php echo ($get_section_berita['layout'] == '3') ? 'selected="selected"' : '';?>>3 Kolom</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Label Link
                </label>
                <div class="col-sm-4">
                    <input placeholder="Selengkapnya" type="text" class="form-control" 
                        name="section_berita[label_link]"  value="<?php echo $get_section_berita['label_link'];?>">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_config_berita">Update</button>
        </div>
    </div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan Judul / Deskripsi Berita.</li>  
        <li>Pilih kategori berita yang akan ditampilkan</li>
        <li>Batasi berita yang ditampilkan dengan mengisi "Jumlah Berita Yang Tampil".</li> 
        <li>Pilih "Layout" yang sesuai.</li> 
        <li>"Label Link" untuk memberi nama link tautan ke halaman berita (default:"selengkapnya").</li>
    </ul>
</div>