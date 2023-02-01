<style>
    .checkbox-group{
        font-size:14px;   
        padding: 5px 0;
        font-style: italic;
    }
</style>
<?php echo form_open($this->uri->segment(1)."/nicepage",array( 'class'=> 'form-horizontal pt-4' )) ;?>

    <?php  
        $get_section_hero = isset($get_section_hero) ? $get_section_hero : array(); 
        $get_halaman_dropdown = isset($get_halaman_dropdown) ? $get_halaman_dropdown : array();
    ?>
    <div class="card" style="min-height:450px">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
                Section Hero
            </h3>
        </div>
        <div class="card-body"> 
            <?php 
                for($sld = 1; $sld <= $get_slide_max; $sld++) {
            ?>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Slide <?php echo $sld;?>
                </label>
                <div class="col-sm-4"> 
                    <select name="section_hero[page_<?php echo $sld;?>]" class="form-control">
                        <option value="" <?php echo (empty($get_section_hero['page_'.$sld])) ? 'selected="selected"' : '';?>>-- Pilih Halaman --</option>
                        <?php if(!empty($get_halaman_dropdown)){
                            foreach($get_halaman_dropdown as $halaman){ 
                                ?>
                                <option value="<?php echo $halaman['id'];?>" 
                                    <?php echo ($get_section_hero['page_'.$sld] ==  $halaman['id']) ? 'selected="selected"' : '';?>>
                                    <?php echo $halaman['judul'];?>
                                </option>
                                <?php
                            }
                        }?>
                    </select>
                    <div class="checkbox-group">
                           <input type="checkbox" name="section_hero[caption_<?php echo $sld;?>]" 
                           <?php echo ($get_section_hero['caption_'.$sld] ==  '1') ? 'checked="checked"' : '';?>
                            value="1">
                           Tampilkan Judul
                    </div>
                </div>
            </div> 
            <?php
                }
            ?> 
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Label Link
                </label>
                <div class="col-sm-4">
                    <input placeholder="Selengkapnya" type="text" class="form-control" name="section_hero[label_link]"  value="<?php echo $get_section_hero['label_link'];?>">
                </div>
            </div>

        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_config_hero">Update</button>
        </div>
    </div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Pilihlah halaman yang akan digunakan sebagai slider.</li>
        <li>Pastikan halaman yang dipilih memiliki gambar serta memiliki ukuran yang sama.</li>
        <li>Beri tanda centang pada opsi "Tampilkan Judul" untuk menampilkan judul slider.</li>
        <li>"Label Link" untuk memberi nama button tautan ke halaman slider (default:"selengkapnya").</li>
    </ul>
</div>