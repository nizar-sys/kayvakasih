<?php echo form_open($this->uri->segment(1)."/nicepage",array( 'class'=> 'form-horizontal pt-4' )) ;?>

    <?php
         $get_mode = isset($get_mode) ? $get_mode : '';
         $get_sections_aktif = isset($get_sections_aktif) ? $get_sections_aktif : array();
         $get_sidebar_aktif = isset($get_sidebar_aktif) ? $get_sidebar_aktif : array(); 

         $blog_mode = $get_mode == '0' ? 'd-none':'';
    ?>
    <div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Konfigurasi
            </h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Mode
                </label>
                <div class="col-sm-6">
                    <select name="mode" class="form-control">
                        <option value="1" <?php echo ($get_mode == '1') ? 'selected="selected"' : '';?>>Landing Page</option>
                        <option value="0" <?php echo ($get_mode == '0') ? 'selected="selected"' : '';?>>Blog</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Tagline Website
                </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tagline[text]" value="<?php echo $get_tagline['text'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                   Tampilkan Tagline Di Header
                </label>
                <div class="col-sm-6">
                    <select name="tagline[header]" class="form-control">
                         <option value="0"  <?php echo ($get_tagline['header'] == '0') ? 'selected="selected"' : '';?>>Tidak</option>
                         <option value="1"  <?php echo ($get_tagline['header'] == '1') ? 'selected="selected"' : '';?>>Ya</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                   Tampilkan Tagline Di Footer
                </label>
                <div class="col-sm-6">
                    <select name="tagline[footer]" class="form-control">
                         <option value="0"  <?php echo ($get_tagline['footer'] == '0') ? 'selected="selected"' : '';?>>Tidak</option>
                         <option value="1"  <?php echo ($get_tagline['footer'] == '1') ? 'selected="selected"' : '';?>>Ya</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Tombol "Back To Top"
                </label>
                <div class="col-sm-6">
                    <select name="btn_back_to_top" class="form-control">
                         <option value="0"  <?php echo ($get_btn_back_to_top == '0') ? 'selected="selected"' : '';?>>Sembunyikan</option>
                         <option value="1"  <?php echo ($get_btn_back_to_top == '1') ? 'selected="selected"' : '';?>>Tampilkan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row <?php echo $blog_mode;?>">
                <label class="col-sm-2 col-form-label">
                    Section
                </label>
                <div class="col-sm-6">
                    <select name="sections_aktif[]" class="form-control" multiple style="min-height: 250px;"> 
                        <?php foreach($sections as $key => $item_section) { ?>
                        <option 
                            value="<?php echo $key;?>" 
                            <?php echo (in_array($key,$get_sections_aktif) ?  'selected="selected"' : '');?> >
                            <?php echo $item_section;?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
            </div>   
            <div class="form-group row <?php echo $blog_mode;?>">
                <label class="col-sm-2 col-form-label">
                    Max. Jumlah FAQs
                </label>
                <div class="col-sm-6">
                    <select name="faq_max" class="form-control">
                        <?php
                        for($n = 1; $n <=10 ; $n++){ 
                            ?>
                            <option value="<?php echo $n;?>" 
                                <?php echo ($get_faq_max == $n) ? 'selected="selected"' : '';?>>
                                <?php echo $n;?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row <?php echo $blog_mode;?>">
                <label class="col-sm-2 col-form-label">
                    Max. Jumlah Feature
                </label>
                <div class="col-sm-6">
                    <select name="feature_max" class="form-control">
                        <?php
                        for($n = 1; $n <=10 ; $n++){ 
                            ?>
                            <option value="<?php echo $n;?>" 
                                <?php echo ($get_feature_max == $n) ? 'selected="selected"' : '';?>>
                                <?php echo $n;?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row <?php echo $blog_mode;?>">
                <label class="col-sm-2 col-form-label">
                    Max. Jumlah Team
                </label>
                <div class="col-sm-6">
                    <select name="team_max" class="form-control">
                        <?php
                        for($n = 1; $n <=10 ; $n++){ 
                            ?>
                            <option value="<?php echo $n;?>" 
                                <?php echo ($get_team_max == $n) ? 'selected="selected"' : '';?>>
                                <?php echo $n;?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row <?php echo $blog_mode;?>">
                <label class="col-sm-2 col-form-label">
                    Max. Jumlah Service
                </label>
                <div class="col-sm-6">
                    <select name="services_max" class="form-control">
                        <?php
                        for($n = 1; $n <=10 ; $n++){ 
                            ?>
                            <option value="<?php echo $n;?>" 
                                <?php echo ($get_services_max == $n) ? 'selected="selected"' : '';?>>
                                <?php echo $n;?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row <?php echo $blog_mode;?>">
                <label class="col-sm-2 col-form-label">
                    Max. Jumlah Slider (Hero)
                </label>
                <div class="col-sm-6">
                    <select name="slide_max" class="form-control">
                        <?php
                        for($n = 1; $n <=10 ; $n++){ 
                            ?>
                            <option value="<?php echo $n;?>" 
                                <?php echo ($get_slide_max == $n) ? 'selected="selected"' : '';?>>
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
                    Header Embeded Code
                </label>
                <div class="col-sm-6">
                    <textarea  name="header_embeded_code" rows="5" class="form-control"><?php echo $get_header_embeded_code;?></textarea> 
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Footer Embeded Code
                </label>
                <div class="col-sm-6">
                    <textarea  name="footer_embeded_code" rows="5" class="form-control"><?php echo $get_footer_embeded_code;?></textarea>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_config">Update</button>
        </div>
    </div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>"Mode" untuk mentukan template website menggunakan "Landing Page" atau "list berita/blog".</li>
        <li>"Tagline Website" untuk mengisi Tagline.</li>
        <li>"Tampilkan Tagline Di Header" untuk menampilkan tagline di header.</li>
        <li>"Tampilkan Tagline Di Footer" untuk menampilkan tagline di footer.</li>
        <li>Tombol "Back To Top" , untuk menampilkan / sembunyikan tombol scroll back to top pojok kanan bawah.</li> 
        <li>"Embeded Code" header/footer untuk keperluan integrasi dengan service diluar website (misal: widget chat, google captcha, fb pixel, dll).</li>
    </ul>
</div>