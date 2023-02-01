<?php

function nicepage_control_widget($index,$type,$value_widget,$param_name ='setting_sidebar'){

    switch ($type) {
        case 'widget_berita_kategori':
            ?>
                <div class="form-group">
                    <label>Judul</label>
                    <input data-name="judul" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][judul]" 
                        type="text" placeholder="Kategori" class="form-control"
                        value="<?php echo $value_widget[$index][$type]['judul'];?>">
                </div>
                <div class="form-group">                                
                    <div class="checkbox-group">
                        <input type="checkbox" 
                            data-name="tampilkan_jumlah_berita" 
                            name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][tampilkan_jumlah_berita]"
                            <?php echo ($value_widget[$index][$type]['tampilkan_jumlah_berita'] == '1' ?  'checked="checked"' : '');?>
                            value="1" 
                            >
                        Tampilkan Jumlah Berita
                    </div>
                </div>
            <?php
            break; 
        case 'widget_berita_populer':
            ?>
                <div class="form-group">
                    <label>Judul</label>
                    <input data-name="judul" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][judul]" 
                        value="<?php echo $value_widget[$index][$type]['judul'];?>"
                        type="text" placeholder="Berita Populer"  class="form-control">
                </div>
                <div class="form-group">                                
                    <label>Jumlah berita yang tampil</label>
                    <select data-name="jumlah" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][jumlah]" class="form-control">
                        <?php
                        for($n = 1; $n <=10 ; $n++){ 
                            ?>
                            <option value="<?php echo $n;?>" 
                                <?php echo ($value_widget[$index][$type]['jumlah'] == $n) ? 'selected="selected"' : '';?>>
                                <?php echo $n;?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            <?php
            break; 
        case 'widget_berita_pilihan':
            ?>  
                <div class="form-group">
                    <label>Judul</label>
                    <input data-name="judul" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][judul]" 
                        value="<?php echo $value_widget[$index][$type]['judul'];?>"
                        type="text" placeholder="Berita Pilihan" class="form-control">
                </div> 
                <div class="form-group">                              
                    <label>Pilih Group</label>
                    <select data-name="group" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][group]" class="form-control">
                        <option value="" <?php echo (empty($value_widget[$index][$type]['group'])) ? 'selected="selected"' : '';?>>-- Pilih Group --</option>
                        <?php
                        $group_berita = array(
                            'headline' => 'Headline',
                            'pilihan'  => 'Pilihan',
                            'utama' => "Utama",
                            'terbaru' => "Terbaru"
                        );
                        foreach($group_berita as $key => $nama){ 
                            ?>
                            <option value="<?php echo $key;?>" 
                                <?php echo ($value_widget[$index][$type]['group'] == $key) ? 'selected="selected"' : '';?>>
                                <?php echo $nama;?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div> 
                <div class="form-group">                                
                    <label>Jumlah berita yang tampil</label>
                        <select data-name="jumlah" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][jumlah]" class="form-control">
                        <?php
                        for($n = 1; $n <=10 ; $n++){ 
                            ?>
                            <option value="<?php echo $n;?>" 
                                    <?php echo ($value_widget[$index][$type]['jumlah'] == $n) ? 'selected="selected"' : '';?>>
                                <?php echo $n;?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            <?php
            break;  
        case 'widget_berita_tag':
            ?> 
                <div class="form-group">
                    <label>Judul</label>
                    <input data-name="judul" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][judul]" 
                        value="<?php echo $value_widget[$index][$type]['judul'];?>"
                        type="text" placeholder="Berita Tag" class="form-control">
                </div> 
            <?php
            break; 
        case 'widget_komentar':
            ?>
                <div class="form-group">
                    <label>Judul</label>
                    <input data-name="judul" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][judul]" 
                        value="<?php echo $value_widget[$index][$type]['judul'];?>"
                        type="text" placeholder="Komentar Terakhir"  class="form-control">
                </div>
                <div class="form-group">                                
                    <label>Jumlah Komentar yang tampil</label>
                    <select data-name="jumlah" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][jumlah]" class="form-control">
                        <?php
                        for($n = 1; $n <=10 ; $n++){ 
                            ?>
                            <option value="<?php echo $n;?>" 
                                <?php echo ($value_widget[$index][$type]['jumlah'] == $n) ? 'selected="selected"' : '';?>>
                                <?php echo $n;?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            <?php
            break;  
        case 'widget_polling':
            ?>
                <div class="form-group">
                    <label>Judul</label>
                    <input data-name="judul" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][judul]" 
                        value="<?php echo $value_widget[$index][$type]['judul'];?>"
                         type="text" placeholder="Jajak Pendapat" class="form-control">
                </div> 
            <?php
            break; 
        case 'widget_search':
            ?>
                <div class="form-group">
                    <label>Judul</label>
                    <input data-name="judul" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][judul]" 
                        value="<?php echo $value_widget[$index][$type]['judul'];?>"
                        type="text" placeholder="Form Pencarian" class="form-control">
                </div> 
            <?php
            break;     
        case 'widget_social':
            ?>
                <div class="form-group">
                    <label>Judul</label>
                    <input data-name="judul" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][judul]" 
                        value="<?php echo $value_widget[$index][$type]['judul'];?>"
                        type="text" placeholder="Social Media" class="form-control">
                </div> 
                <div class="form-group">
                    <label>Teks</label>
                    <textarea 
                        data-name="teks" 
                        name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][teks]"
                        rows="3" class="form-control"><?php echo $value_widget[$index][$type]['teks'];?></textarea> 
                </div> 
            <?php
            break;  
        case 'widget_text':
            ?>
                <div class="form-group">
                    <label>Judul</label>
                    <input data-name="judul" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][judul]" 
                        value="<?php echo $value_widget[$index][$type]['judul'];?>"
                        type="text" placeholder="Teks" class="form-control">
                </div> 
                <div class="form-group">
                    <label>Teks</label>
                    <textarea 
                        data-name="teks" 
                        name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][teks]"
                        rows="5" class="form-control"><?php echo $value_widget[$index][$type]['teks'];?></textarea> 
                </div> 
            <?php
            break;   
        case 'widget_logo':
            ?>
                <div class="form-group">
                    <label>Zoom</label>
                    <select data-name="zoom" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][zoom]" class="form-control">
                        <?php
                        for($n = 1; $n <=10 ; $n++){ 
                            ?>
                            <option value="<?php echo $n;?>" 
                                <?php echo ($value_widget[$index][$type]['zoom'] == $n) ? 'selected="selected"' : '';?>>
                                <?php echo ($n * 10);?> %
                            </option>
                            <?php
                        }
                        ?>
                    </select> 
                </div>
            <?php
            break;   
        case 'widget_contact':
            ?>
                <div class="form-group">
                    <label>Judul</label>
                    <input data-name="judul" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][judul]" 
                        value="<?php echo $value_widget[$index][$type]['judul'];?>"
                        type="text" placeholder="Kontak" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input data-name="email" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][email]" 
                        value="<?php echo $value_widget[$index][$type]['email'];?>"
                        type="text" placeholder="alamat@email.com" class="form-control">
                </div> 
                <div class="form-group">
                    <label>Telp</label>
                    <input data-name="telp" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][telp]" 
                        value="<?php echo $value_widget[$index][$type]['telp'];?>"
                        type="text" placeholder="+610000000" class="form-control">
                </div> 
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea 
                        data-name="alamat" 
                        name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][alamat]"
                        rows="5" class="form-control"><?php echo $value_widget[$index][$type]['alamat'];?></textarea> 
                </div> 
            <?php
            break;
        case 'widget_sekilas_info':
            ?>
                <div class="form-group">
                    <label>Judul</label>
                    <input data-name="judul" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][judul]" 
                        value="<?php echo $value_widget[$index][$type]['judul'];?>"
                        type="text" placeholder="Sekilas Info"  class="form-control">
                </div>
                <div class="form-group">                                
                    <label>Jumlah info yang tampil</label>
                    <select data-name="jumlah" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][jumlah]" class="form-control">
                        <?php
                        for($n = 1; $n <=10 ; $n++){ 
                            ?>
                            <option value="<?php echo $n;?>" 
                                <?php echo ($value_widget[$index][$type]['jumlah'] == $n) ? 'selected="selected"' : '';?>>
                                <?php echo $n;?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            <?php
            break; 
        case 'widget_agenda':
            ?>
                <div class="form-group">
                    <label>Judul</label>
                    <input data-name="judul" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][judul]" 
                        value="<?php echo $value_widget[$index][$type]['judul'];?>"
                        type="text" placeholder="Agenda"  class="form-control">
                </div>
                <div class="form-group">                                
                    <label>Jumlah agenda yang tampil</label>
                    <select data-name="jumlah" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][jumlah]" class="form-control">
                        <?php
                        for($n = 1; $n <=10 ; $n++){ 
                            ?>
                            <option value="<?php echo $n;?>" 
                                <?php echo ($value_widget[$index][$type]['jumlah'] == $n) ? 'selected="selected"' : '';?>>
                                <?php echo $n;?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>
                        Tampilkan Gambar
                    </label>
                    <select data-name="tampilkan_gambar"
                         name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][tampilkan_gambar]" 
                         class="form-control"> 
                        <option value="1" <?php echo ($value_widget[$index][$type]['tampilkan_gambar'] == '1') ? 'selected="selected"' : '';?>>Ya</option>
                        <option value="0" <?php echo ($value_widget[$index][$type]['tampilkan_gambar'] == '0') ? 'selected="selected"' : '';?>>Tidak</option>
                    </select> 
                </div>
            <?php
            break;      
        case 'widget_pengumuman':
            ?>
                <div class="form-group">
                    <label>Judul</label>
                    <input data-name="judul" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][judul]" 
                        value="<?php echo $value_widget[$index][$type]['judul'];?>"
                        type="text" placeholder="Pengumuman"  class="form-control">
                </div>
                <div class="form-group">                                
                    <label>Jumlah pengumuman yang tampil</label>
                    <select data-name="jumlah" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][jumlah]" class="form-control">
                        <?php
                        for($n = 1; $n <=10 ; $n++){ 
                            ?>
                            <option value="<?php echo $n;?>" 
                                <?php echo ($value_widget[$index][$type]['jumlah'] == $n) ? 'selected="selected"' : '';?>>
                                <?php echo $n;?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>
                        Tampilkan Gambar
                    </label> 
                    <select data-name="tampilkan_gambar"
                         name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][tampilkan_gambar]" 
                         class="form-control"> 
                        <option value="1" <?php echo ($value_widget[$index][$type]['tampilkan_gambar'] == '1') ? 'selected="selected"' : '';?>>Ya</option>
                        <option value="0" <?php echo ($value_widget[$index][$type]['tampilkan_gambar'] == '0') ? 'selected="selected"' : '';?>>Tidak</option>
                    </select> 
                </div>
            <?php
            break; 
    }

}
 
function nicepage_control_widget_menu($index,$type,$value_widget,$dropdown_menu,$param_name ='setting_sidebar'){
?>
    <div class="form-group">
        <label>Judul</label>
        <input data-name="judul" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][judul]" 
            value="<?php echo $value_widget[$index][$type]['judul'];?>"
            type="text" placeholder="Menu" class="form-control">
    </div>
    <div class="form-group">                                
        <label>Pilih Group Menu</label>
        
        <select data-name="group_menu" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][group_menu]" class="form-control"> 
            <option value="" <?php echo (empty($value_widget[$index][$type]['group_menu'])) ? 'selected="selected"' : '';?>>-- Pilih Menu --</option>
            <?php if(!empty($dropdown_menu)){
                foreach($dropdown_menu as $item_menu){ 
                    ?>
                    <option value="<?php echo $item_menu['id'];?>" 
                        <?php echo ($value_widget[$index][$type]['group_menu'] ==  $item_menu['id']) ? 'selected="selected"' : '';?>>
                        <?php echo $item_menu['nama'];?>
                    </option>
                    <?php
                }
            }?>
        </select>
    </div>
<?php 
}


 
function nicepage_control_iklan_sidebar($index,$type,$value_widget,$dropdown_iklan,$param_name ='setting_sidebar'){
    ?>
        <div class="form-group">
            <label>Judul</label>
            <input data-name="judul" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][judul]" 
                value="<?php echo $value_widget[$index][$type]['judul'];?>"
                type="text" placeholder="Iklan" class="form-control">
        </div> 
        <div class="form-group">                                
            <label>Pilih Iklan Sidebar</label> 
            <select data-name="iklan_sidebar" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][iklan_sidebar]" class="form-control"> 
                <option value="" <?php echo (empty($value_widget[$index][$type]['iklan_sidebar'])) ? 'selected="selected"' : '';?>>-- Pilih Iklan --</option>
                <?php if(!empty($dropdown_iklan)){
                    foreach($dropdown_iklan as $item_iklan){ 
                        ?>
                        <option value="<?php echo $item_iklan['id'];?>" 
                            <?php echo ($value_widget[$index][$type]['iklan_sidebar'] ==  $item_iklan['id']) ? 'selected="selected"' : '';?>>
                            <?php echo $item_iklan['nama'];?>
                        </option>
                        <?php
                    }
                }?>
            </select>
        </div>
    <?php 
}

 
function nicepage_control_iklan_link($index,$type,$value_widget,$get_iklan_link_list,$param_name ='setting_sidebar'){
    ?>
        <div class="form-group">
            <label>Judul</label>
            <input data-name="judul" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][judul]" 
                value="<?php echo $value_widget[$index][$type]['judul'];?>"
                type="text" placeholder="Iklan" class="form-control">
        </div> 
        <div class="form-group">                                
            <label>Pilih Iklan Sidebar</label> 
            <select 
                multiple="multiple"
                style="min-height: 200px;"
                data-name="iklan_link" 
                data-multiple="Y"
                name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][iklan_link][]" class="form-control"> 
                <?php if(!empty($get_iklan_link_list)){
                    foreach($get_iklan_link_list as $item_iklan){ 
                        ?>
                        <option value="<?php echo $item_iklan['id'];?>" 
                            <?php echo (in_array( $item_iklan['id'],$value_widget[$index][$type]['iklan_link']) ) ? 'selected="selected"' : '';?>>
                            <?php echo $item_iklan['nama'];?>
                        </option>
                        <?php
                    }
                }?>
            </select>
        </div>
    <?php 
}


 
function nicepage_control_widget_gallery($index,$type,$value_widget,$dropdown_album,$param_name ='setting_sidebar'){
?> 
    <div class="form-group">
        <label>Judul</label>
        <input data-name="judul" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][judul]" 
            value="<?php echo $value_widget[$index][$type]['judul'];?>"
            type="text" placeholder="Galeri" class="form-control">
    </div> 
    <div class="form-group">                                
        <label>Pilih Album</label>  
        <select class="form-control" 
            data-name="album" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][album]"> 
            <option value="" <?php echo (empty($value_widget[$index][$type]['album'])) ? 'selected="selected"' : '';?>>-- Semua --</option>
            <?php if(!empty($dropdown_album)){
                foreach($dropdown_album as $item){ 
                    ?>
                    <option value="<?php echo $item['id'];?>" 
                        <?php echo ($value_widget[$index][$type]['album'] ==  $item['id']) ? 'selected="selected"' : '';?>>
                        <?php echo $item['nama'];?>
                    </option>
                    <?php
                }
            }?>
        </select> 
    </div>
    
    <div class="form-group">                                
        <label>Jumlah photo yang tampil</label>
          <select data-name="jumlah" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][jumlah]" class="form-control">
            <?php
            for($n = 1; $n <=10 ; $n++){ 
                ?>
                <option value="<?php echo $n;?>" 
                      <?php echo ($value_widget[$index][$type]['jumlah'] == $n) ? 'selected="selected"' : '';?>>
                    <?php echo $n;?>
                </option>
                <?php
            }
            ?>
        </select>
    </div>
<?php 
} 
    

 
function nicepage_control_widget_video($index,$type,$value_widget,$dropdown_playlist,$param_name ='setting_sidebar'){
?> 
    <div class="form-group">
        <label>Judul</label>
        <input data-name="judul" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][judul]" 
            value="<?php echo $value_widget[$index][$type]['judul'];?>"
            type="text" placeholder="Video" class="form-control">
    </div> 
    <div class="form-group">
        <label>Pilih Playlist</label> 
        <select class="form-control" 
            data-name="playlist" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][playlist]"> 
            <option value="" <?php echo (empty($value_widget[$index][$type]['playlist'])) ? 'selected="selected"' : '';?>>-- Semua --</option>
            <?php if(!empty($dropdown_playlist)){
                foreach($dropdown_playlist as $item){ 
                    ?>
                    <option value="<?php echo $item['id'];?>" 
                        <?php echo ($value_widget[$index][$type]['playlist'] ==  $item['id']) ? 'selected="selected"' : '';?>>
                        <?php echo $item['nama'];?>
                    </option>
                    <?php
                }
            }?>
        </select> 
    </div>

    <div class="form-group">                                
        <label>Jumlah video yang tampil</label>
          <select data-name="jumlah" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][jumlah]" class="form-control">
            <?php
            for($n = 1; $n <=10 ; $n++){ 
                ?>
                <option value="<?php echo $n;?>" 
                      <?php echo ($value_widget[$index][$type]['jumlah'] == $n) ? 'selected="selected"' : '';?>>
                    <?php echo $n;?>
                </option>
                <?php
            }
            ?>
        </select>
    </div>
<?php 
} 
     