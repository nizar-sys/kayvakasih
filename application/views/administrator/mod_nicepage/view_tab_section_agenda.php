<?php echo form_open($this->uri->segment(1)."/nicepage",array( 'class'=> 'form-horizontal pt-4' )) ;?>

    <?php  
        $get_section_agenda = isset($get_section_agenda) ? $get_section_agenda : array(); 
        $get_kategori_dropdown = isset($get_kategori_dropdown) ? $get_kategori_dropdown : array();
    ?>
    <div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Section Agenda
            </h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Judul
                </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="section_agenda[judul]"  value="<?php echo $get_section_agenda['judul'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Deskripsi
                </label>
                <div class="col-sm-4">
                    <textarea  name="section_agenda[deskripsi]" rows="5" class="form-control"><?php echo $get_section_agenda['deskripsi'];?></textarea>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Jumlah Agenda Yang Tampil
                </label>
                <div class="col-sm-4">
                    <select name="section_agenda[jumlah]" class="form-control">
                        <?php
                        for($n = 1; $n <=6 ; $n++){ 
                            ?>
                            <option value="<?php echo $n;?>" 
                                <?php echo ($get_section_agenda['jumlah'] == $n) ? 'selected="selected"' : '';?>>
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
                    <select name="section_agenda[layout]" class="form-control">                         
                        <option value="column" <?php echo ($get_section_agenda['layout'] == 'column') ? 'selected="selected"' : '';?>>3 Kolom</option>
                        <option value="table" <?php echo ($get_section_agenda['layout'] == 'table') ? 'selected="selected"' : '';?>>Table</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Label Link
                </label>
                <div class="col-sm-4">
                    <input placeholder="Selengkapnya" type="text" class="form-control" 
                        name="section_agenda[label_link]"  value="<?php echo $get_section_agenda['label_link'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Gambar Di Halaman Agenda
                </label>
                <div class="col-sm-4">
                    <select name="section_agenda[gambar_halaman]" class="form-control">      
                        <option value="1" <?php echo ($get_section_agenda['gambar_halaman'] == '1') ? 'selected="selected"' : '';?>>Tampilkan</option>
                        <option value="0" <?php echo ($get_section_agenda['gambar_halaman'] == '0') ? 'selected="selected"' : '';?>>Sembunyikan</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_config_agenda">Update</button>
        </div>
    </div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan Judul / Deskripsi Agenda.</li>  
        <li>Pilih kategori agenda yang akan ditampilkan</li>
        <li>Batasi agenda yang ditampilkan dengan mengisi "Jumlah Agenda Yang Tampil".</li> 
        <li>Pilih "Layout" yang sesuai.</li> 
        <li>"Label Link" untuk memberi nama link tautan ke halaman agenda (default:"selengkapnya").</li>
    </ul>
</div>