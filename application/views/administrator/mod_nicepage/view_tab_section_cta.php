<?php echo form_open($this->uri->segment(1)."/nicepage",array( 'class'=> 'form-horizontal pt-4' )) ;?>

    <?php  
        $get_section_cta = isset($get_section_cta) ? $get_section_cta : array();  
    ?>
    <div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Section Call To Action
            </h3>
        </div>
        <div class="card-body"> 
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Teks
                </label>
                <div class="col-sm-4">
                    <textarea  name="section_cta[text]" rows="5" class="form-control"><?php echo $get_section_cta['text'];?></textarea>
                </div>
            </div>  
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Url Cta
                </label>
                <div class="col-sm-4">
                    <input placeholder="http://alamat.cta" type="text" class="form-control" name="section_cta[url]"  value="<?php echo $get_section_cta['url'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Label Link
                </label>
                <div class="col-sm-4">
                    <input placeholder="Join Now" type="text" class="form-control" name="section_cta[label]"  value="<?php echo $get_section_cta['label'];?>">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_config_cta">Update</button>
        </div>
    </div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan "Teks" yang diperlukan untuk "Call To Action".</li> 
        <li>"Url Cta" untuk memberi link tautan ke info "Call To Action".</li>
        <li>"Label Link" untuk memberi nama link tautan ke halaman yang berkaitan (default:"Join Now").</li>
    </ul>
</div>