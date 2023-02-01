<?php echo form_open($this->uri->segment(1)."/nicepage",array( 'class'=> 'form-horizontal pt-4' )) ;?>

    <?php  
        $get_section_team = isset($get_section_team) ? $get_section_team : array(); 
        $get_team_dropdown = isset($get_team_dropdown) ? $get_team_dropdown : array();  
    ?>
    <div class="card" style="min-height:450px">
        <div class="card-header bg-info"> 
            <h3 class="card-title py-1">
                Section Team
            </h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Judul
                </label>
                <div class="col-sm-4"> 
                    <input type="text" class="form-control" name="section_team[judul]"  value="<?php echo $get_section_team['judul'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Deskripsi
                </label>
                <div class="col-sm-4">
                    <textarea  name="section_team[deskripsi]" rows="5" class="form-control"><?php echo $get_section_team['deskripsi'];?></textarea>
                </div>
            </div>
            <?php 
                for($p = 1; $p <= $get_team_max; $p++) {
            ?>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Personal <?php echo $p;?>
                </label>
                <div class="col-sm-4">
                    <select name="section_team[person_<?php echo $p;?>]" class="form-control">
                        <option value="" <?php echo (empty($get_section_team['person_'.$p])) ? 'selected="selected"' : '';?>>-- Pilih Personal --</option>
                        <?php if(!empty($get_team_dropdown)){
                            foreach($get_team_dropdown as $item){ 
                                ?>
                                <option value="<?php echo $item['id'];?>" 
                                    <?php echo ($get_section_team['person_'.$p] ==  $item['id']) ? 'selected="selected"' : '';?>>
                                    <?php echo $item['nama'];?>
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
                    <select name="section_team[layout]" class="form-control"> 
                        <option value="2" <?php echo ($get_section_team['layout'] == '2') ? 'selected="selected"' : '';?>>2 Kolom</option>
                        <option value="3" <?php echo ($get_section_team['layout'] == '3') ? 'selected="selected"' : '';?>>3 Kolom</option> 
                        <option value="4" <?php echo ($get_section_team['layout'] == '4') ? 'selected="selected"' : '';?>>4 Kolom</option> 
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    Label Link
                </label>
                <div class="col-sm-4">
                    <input placeholder="Selengkapnya" type="text" class="form-control" 
                        name="section_team[label_link]"  value="<?php echo $get_section_team['label_link'];?>">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-info" type="submit" name="set_config_team">Update</button>
        </div>
    </div>
<?php echo form_close();?>
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Isikan Judul / Deskripsi Team.</li>  
        <li>Isikan personal team inti.</li>
        <li>Pilih "Layout" yang sesuai.</li> 
        <li>"Label Link" untuk memberi nama link tautan ke halaman team (default:"selengkapnya").</li>
    </ul>
</div>