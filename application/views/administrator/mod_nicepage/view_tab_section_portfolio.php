<?php echo form_open($this->uri->segment(1)."/nicepage",array( 'class'=> 'form-horizontal pt-4' )) ;?>

    <?php  
        $get_section_portfolio = isset($get_section_portfolio) ? $get_section_portfolio : array();  
    ?>
    <div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Section Porfolio
            </h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Judul
                </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="section_portfolio[judul]"  value="<?php echo $get_section_portfolio['judul'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Deskripsi
                </label>
                <div class="col-sm-4">
                    <textarea  name="section_portfolio[deskripsi]" rows="5" class="form-control"><?php echo $get_section_portfolio['deskripsi'];?></textarea>
                </div>
            </div>
             
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Jumlah Yang Tampil
                </label>
                <div class="col-sm-4">
                    <select name="section_portfolio[jumlah]" class="form-control">
                        <?php
                        for($n = 1; $n <=6 ; $n++){ 
                            ?>
                            <option value="<?php echo $n;?>" 
                                <?php echo ($get_section_portfolio['jumlah'] == $n) ? 'selected="selected"' : '';?>>
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
                    <select name="section_portfolio[layout]" class="form-control"> 
                        <option value="2" <?php echo ($get_section_portfolio['layout'] == '2') ? 'selected="selected"' : '';?>>2 Kolom</option>
                        <option value="3" <?php echo ($get_section_portfolio['layout'] == '3') ? 'selected="selected"' : '';?>>3 Kolom</option> 
                    </select>
                </div>
            </div> 
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Label Link
                </label>
                <div class="col-sm-4">
                    <input placeholder="Selengkapnya" type="text" class="form-control" 
                        name="section_portfolio[label_link]"  value="<?php echo $get_section_portfolio['label_link'];?>">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_config_portfolio">Update</button>
        </div>
    </div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan Judul / Deskripsi Porfolio.</li>  
        <li>Batasi portfolio yang ditampilkan dengan mengisi "Jumlah Yang Tampil".</li>
        <li>Pilih "Layout" yang sesuai.</li> 
        <li>"Label Link" untuk memberi nama link tautan ke halaman portfolio (default:"selengkapnya").</li>
    </ul>
</div>