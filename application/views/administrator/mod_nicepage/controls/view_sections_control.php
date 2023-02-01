<?php

function nicepage_control_blog_sections($index,$type,$value_sections,$param_name ='setting_blog_sections'){

    switch ($type) {     
        case 'blog_section_berita_populer':
            ?>
                <div class="form-group">
                    <label>Judul</label>
                    <input data-name="judul" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][judul]" 
                        value="<?php echo $value_sections[$index][$type]['judul'];?>"
                        type="text" placeholder="Berita Populer"  class="form-control">
                </div>
                <div class="form-group">                                
                    <label>Jumlah berita yang tampil</label>
                    <select data-name="jumlah" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][jumlah]" class="form-control">
                        <?php
                        for($n = 1; $n <=10 ; $n++){ 
                            ?>
                            <option value="<?php echo $n;?>" 
                                <?php echo ($value_sections[$index][$type]['jumlah'] == $n) ? 'selected="selected"' : '';?>>
                                <?php echo $n;?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            <?php
            break; 
        case 'blog_section_berita_pilihan':
            ?>
                <div class="form-group">
                    <label>Judul</label>
                    <input data-name="judul" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][judul]" 
                        value="<?php echo $value_sections[$index][$type]['judul'];?>"
                        type="text" placeholder="Berita Pilihan" class="form-control">
                </div> 
                <div class="form-group">                              
                    <label>Pilih Group</label>
                    <select data-name="group" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][group]" class="form-control">
                        <option value="" <?php echo (empty($value_sections[$index][$type]['group'])) ? 'selected="selected"' : '';?>>-- Pilih Group --</option>
                        <?php
                        $group_berita = array(
                            'headline' => 'Headline',
                            'pilihan'  => 'Pilihan',
                            'utama' => "Utama"
                        );
                        foreach($group_berita as $key => $nama){ 
                            ?>
                            <option value="<?php echo $key;?>" 
                                <?php echo ($value_sections[$index][$type]['group'] == $key) ? 'selected="selected"' : '';?>>
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
                                    <?php echo ($value_sections[$index][$type]['jumlah'] == $n) ? 'selected="selected"' : '';?>>
                                <?php echo $n;?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            <?php
            break;     
        case 'blog_section_berita_terbaru':
            ?>
              <div class="form-group">
                  <label>Judul</label>
                  <input data-name="judul" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][judul]"
                       type="text" placeholder="Berita Terbaru" class="form-control"
                       value="<?php echo $value_sections[$index][$type]['judul'];?>">
              </div>
              <div class="form-group">                                
                  <label>Jumlah berita yang tampil</label>
                    <select data-name="jumlah" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][jumlah]" class="form-control">
                      <?php
                      for($n = 1; $n <=10 ; $n++){ 
                          ?>
                          <option value="<?php echo $n;?>" 
                                <?php echo ($value_sections[$index][$type]['jumlah'] == $n) ? 'selected="selected"' : '';?>>
                              <?php echo $n;?>
                          </option>
                          <?php
                      }
                      ?>
                  </select>
              </div>
            <?php
            break;   
        case 'blog_section_agenda':
            ?>
                <div class="form-group">
                    <label>Judul</label>
                    <input data-name="judul" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][judul]" 
                        value="<?php echo $value_sections[$index][$type]['judul'];?>"
                        type="text" placeholder="Agenda"  class="form-control">
                </div>
                <div class="form-group">                                
                    <label>Jumlah agenda yang tampil</label>
                    <select data-name="jumlah" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][jumlah]" class="form-control">
                        <?php
                        for($n = 1; $n <=10 ; $n++){ 
                            ?>
                            <option value="<?php echo $n;?>" 
                                <?php echo ($value_sections[$index][$type]['jumlah'] == $n) ? 'selected="selected"' : '';?>>
                                <?php echo $n;?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            <?php
            break;      
        case 'blog_section_pengumuman':
            ?>
                <div class="form-group">
                    <label>Judul</label>
                    <input data-name="judul" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][judul]" 
                        value="<?php echo $value_sections[$index][$type]['judul'];?>"
                        type="text" placeholder="Pengumuman"  class="form-control">
                </div>
                <div class="form-group">                                
                    <label>Jumlah pengumuman yang tampil</label>
                    <select data-name="jumlah" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][jumlah]" class="form-control">
                        <?php
                        for($n = 1; $n <=10 ; $n++){ 
                            ?>
                            <option value="<?php echo $n;?>" 
                                <?php echo ($value_sections[$index][$type]['jumlah'] == $n) ? 'selected="selected"' : '';?>>
                                <?php echo $n;?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            <?php
            break;     
        case 'blog_section_berita_slider':
            ?>
                <div class="form-group">
                    <label>Judul</label>
                    <input data-name="judul" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][judul]" 
                        value="<?php echo $value_sections[$index][$type]['judul'];?>"
                        type="text" placeholder="Berita Slider" class="form-control">
                </div> 
                <div class="form-group">                              
                    <label>Pilih Group</label>
                    <select data-name="group" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][group]" class="form-control">
                        <option value="" <?php echo (empty($value_sections[$index][$type]['group'])) ? 'selected="selected"' : '';?>>-- Pilih Group --</option>
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
                                <?php echo ($value_sections[$index][$type]['group'] == $key) ? 'selected="selected"' : '';?>>
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
                                    <?php echo ($value_sections[$index][$type]['jumlah'] == $n) ? 'selected="selected"' : '';?>>
                                <?php echo $n;?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            <?php
            break;      
    }

}
 
function nicepage_control_blog_section_berita_per_kategori($index,$type,$value_sections,$dropdown_kategori,$param_name ='setting_blog_sections'){
?> 
    <div class="form-group berita-per-kategori">                                
        <label>Pilih Kategori</label>      
        <input class="judul" 
            data-name="judul" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][judul]" 
                        value="<?php echo $value_sections[$index][$type]['judul'];?>"
                        type="hidden" >  
        <select class="select-kategori form-control" 
            data-name="kategori" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][kategori]"> 
            <option value="" <?php echo (empty($value_sections[$index][$type]['kategori'])) ? 'selected="selected"' : '';?>>-- Pilih Kategori --</option>
            <?php if(!empty($dropdown_kategori)){
                foreach($dropdown_kategori as $item){ 
                    ?>
                    <option value="<?php echo $item['id'];?>" 
                        <?php echo ($value_sections[$index][$type]['kategori'] ==  $item['id']) ? 'selected="selected"' : '';?>>
                        <?php echo $item['judul'];?>
                    </option>
                    <?php
                }
            }?>
        </select>
        <script>
            $(function(){
                $(document).on('change','body #setting-sections .berita-per-kategori .select-kategori',function(e){
                    var formContext = $(this).closest('div.berita-per-kategori');  
                    $('.judul', formContext).val( $(this).children(":selected").text().split('(')[0].trim() );
                });
            });
        </script>
    </div>

    <div class="form-group">                                
        <label>Jumlah berita yang tampil</label>
          <select data-name="jumlah" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][jumlah]" class="form-control">
            <?php
            for($n = 1; $n <=10 ; $n++){ 
                ?>
                <option value="<?php echo $n;?>" 
                      <?php echo ($value_sections[$index][$type]['jumlah'] == $n) ? 'selected="selected"' : '';?>>
                    <?php echo $n;?>
                </option>
                <?php
            }
            ?>
        </select>
    </div>
<?php 
} 
  
  
 
function nicepage_control_blog_section_iklan_home($index,$type,$value_sections,$dropdown_iklan_home,$param_name ='setting_blog_sections'){
    ?>
        <div class="form-group">
            <label>Judul</label>
            <input data-name="judul" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][judul]" 
                value="<?php echo $value_sections[$index][$type]['judul'];?>"
                type="text" placeholder="Iklan" class="form-control">
        </div> 
        <div class="form-group">                                
            <label>Pilih Iklan Home</label> 
            <select data-name="iklan_home" name="<?php echo $param_name; ?>[<?php echo $index;?>][<?php echo $type;?>][iklan_home]" class="form-control"> 
                <option value="" <?php echo (empty($value_sections[$index][$type]['iklan_home'])) ? 'selected="selected"' : '';?>>-- Pilih Iklan --</option>
                <?php if(!empty($dropdown_iklan_home)){
                    foreach($dropdown_iklan_home as $item_iklan){ 
                        ?>
                        <option value="<?php echo $item_iklan['id'];?>" 
                            <?php echo ($value_sections[$index][$type]['iklan_home'] ==  $item_iklan['id']) ? 'selected="selected"' : '';?>>
                            <?php echo $item_iklan['nama'];?>
                        </option>
                        <?php
                    }
                }?>
            </select>
        </div>
    <?php 
}
