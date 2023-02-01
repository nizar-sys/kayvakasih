<style>
ol.list-setting-blog-sections{
    list-style:none;    
    margin: 0;
    padding: 0;
}


li.item-setting-blog-sections {
    line-height:20px;
}
li.item-setting-blog-sections .card ,
li.item-setting-blog-sections.dd-item .card {
    margin-bottom: 10px;
}


li.item-setting-blog-sections .card .card-header .card-title,
li.item-setting-blog-sections.dd-item .card .card-header .card-title{
    font-size:15px; 
}

.dd-dragel >  li.item-setting-blog-sections.dd-item .card .card-header,
.dd-dragel >  li.item-setting-blog-sections.dd-item .card,
ol.list-setting-blog-sections li .card .card-header,
ol.list-setting-blog-sections li .card{
    border-radius:0;
}
 
.dd-dragel >  li.item-setting-blog-sections.dd-item .dd-handle { 
    margin:0; 
    border-radius: 0;   
    height:100%; 
}

ol.list-setting-blog-sections li .dd-handle{
    margin: 0; 
    border-radius: 0; 
    height: auto;
    cursor: move;
    padding: 5px;
    font-weight: normal;
}

.dd-dragel >  li.item-setting-blog-sections.dd-item .dd-handle ,
ol.list-setting-blog-sections li.dd-item .dd-handle{
    float: left;
    padding: 10px;
    font-size: 15px;
    line-height: 1.5em; 
}

#setting-blog-sections .widget-active .card-body .title-active {
    margin-bottom: 10px;
    border-bottom: 1px solid #17a2b8;
    color: #17a2b8;
    font-size: 20px;
}

#setting-blog-sections .widget-available .card-body .title-available {
    margin-bottom: 10px;
    border-bottom: 1px solid #343a40;
    color: #343a40;
    font-size: 20px;
}  

</style>
    <?php    
    
     $get_setting_blog_sections = isset($get_setting_blog_sections) ? $get_setting_blog_sections : array();   
     $get_kategori_dropdown = isset($get_kategori_dropdown) ? $get_kategori_dropdown : array();    
     $get_iklan_home_dropdown = isset($get_iklan_home_dropdown) ? $get_iklan_home_dropdown : array(); 
    ?>
    <div class="card mt-4" style="min-height:450px" id="setting-blog-sections">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
               Setting Blog  
            </h3>
        </div>
        <div class="card-body">    
            <div class="row">            
                <div class="col-md-5">
                    <div class="card widget-available">
                        <div class="card-body">
                            <div class="title-available">
                                Sections Tersedia
                            </div>
                            <div>
                                <ol class="list-setting-blog-sections">
                                    <?php if ($blog_sections) {?>
                                        <?php
                                        $wi = 0;
                                        foreach($blog_sections as $section_key => $section_name) { 
                                        ?>

                                        <li class="item-setting-blog-sections"> 
                                            <div class="card ">
                                                <div class="card-header ">
                                                    <div class="card-title">
                                                        <?php echo $section_name; ?>
                                                    </div>
                                                    <div class="card-tools">
                                                        <button type="button" 
                                                            data-id="<?php echo $section_key;?>"
                                                            data-name="<?php echo $section_name;?>"
                                                            class="setting-blog-sections-widget-add btn btn-tool">
                                                            <i class="fas fa-plus-circle"></i>
                                                            Tambahkan
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body form-template d-none">
                                                    <?php  
                                                    switch ($section_key) {
                                                        case 'blog_section_iklan_home':
                                                            nicepage_control_blog_section_iklan_home($wi,$section_key,array(),$get_iklan_home_dropdown);
                                                            break;  
                                                        case 'blog_section_berita_per_kategori':
                                                            nicepage_control_blog_section_berita_per_kategori($wi,$section_key,array(),$get_kategori_dropdown);
                                                            break; 
                                                        default:
                                                            nicepage_control_blog_sections($wi,$section_key,array());
                                                            break;
                                                    } 
                                                    ?>
                                                </div>
                                            </div>
                                        </li> 
                                    <?php 
                                        $wi++;
                                        }
                                    }
                                    ?>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">                
                    <div class="card widget-active"> 
                    <?php echo form_open($this->uri->segment(1)."/nicepage",array( 'class'=> ' form-horizontal' )) ;?>
                        <div class="card-body"> 
                            <div class="title-active">
                               Homepage
                            </div>
                            <div class="dd"  id="setting-blog-sections-active">
                                <ol class="dd-list list-setting-blog-sections">
                                    <?php if ($get_setting_blog_sections) {?>
                                        <?php foreach($get_setting_blog_sections as $i => $section_active) { 
                                            $id = key($section_active); 
                                        ?>

                                        <li class="item-setting-blog-sections dd-item" data-id="<?php echo $id;?>">
                                            <div class="dd-handle">
                                                <i class="fa fa-arrows-alt"></i>
                                            </div>
                                            <div class="card collapsed-card">
                                                <div class="card-header bg-info">
                                                    <div class="card-title">
                                                        <?php if(!empty($section_active[$id]['judul'])) { ?> 
                                                            <?php echo $blog_sections[$id] .' : "'.word_limiter($section_active[$id]['judul'],2).'"';?>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <?php echo $blog_sections[$id]; ?>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                        <button type="button" class="setting-blog-sections-widget-remove btn btn-tool ">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <?php  
                                                    switch ($id) {
                                                        case 'blog_section_iklan_home':
                                                            nicepage_control_blog_section_iklan_home($i,$id,$get_setting_blog_sections,$get_iklan_home_dropdown);
                                                            break;  
                                                        case 'blog_section_berita_per_kategori':
                                                            nicepage_control_blog_section_berita_per_kategori($i,$id,$get_setting_blog_sections,$get_kategori_dropdown);
                                                            break;  
                                                        default:
                                                            nicepage_control_blog_sections($i,$id,$get_setting_blog_sections);
                                                            break;
                                                    }  
                                                    ?>
                                                </div>
                                            </div>
                                        </li> 
                                    <?php 
                                        }
                                    }
                                    ?>
                                </ol>
                            </div>
                        </div>
                        <div class="card-footer"> 
                            <button class="btn btn-info" type="submit" name="set_setting_blog_sections">Update</button>
                        </div>
                    <?php echo form_close();?> 
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    
<div class="callout callout-info">
    <h5>Info</h5>
    <ul>
        <li>Untuk menampilkan Section pada Halaman Utama (Blog Mode), klik tombol "Tambahkan"</li>
        <li>Klik tombol "Update" untuk simpan konfigurasi</li>
    </ul>
</div>
<script>
$(function(){
    // untuk sortlable nested sidebar
    $('#setting-blog-sections-active').nestable({
        maxDepth: 1
    }).on('change',function(e){ 
        reIndexListHomepageSections()
    });

    $(document).on('click','.setting-blog-sections-widget-add',function(e){
        e.preventDefault();
        var widgetKey = $(this).data('id');
        var widgetName = $(this).data('name');
        var itemContext = $(this).closest('li.item-setting-blog-sections');
        var widgetFormElement = $('.form-template',itemContext).html();

        var createElementList = '<li class="item-setting-blog-sections dd-item" data-id="'+ widgetKey +'">'+
                '<div class="dd-handle">'+
                    '<i class="fa fa-arrows-alt"></i>'+
                '</div>'+
                '<div class="card collapsed-card">'+
                    '<div class="card-header  bg-info">'+
                        '<div class="card-title">'+
                            widgetName +
                        '</div>'+
                        '<div class="card-tools">'+
                            '<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>'+
                            '<button type="button" class="setting-blog-sections-widget-remove btn btn-tool"><i class="fas fa-trash-alt"></i></button>' +
                        '</div>'+
                    '</div>'+
                    '<div class="card-body">'+
                        widgetFormElement +
                    '</div>'+
                '</div>'+
            '</li>';
        $('#setting-blog-sections-active .list-setting-blog-sections').append(createElementList);        
        reIndexListHomepageSections();
    });

    $(document).on('click','.setting-blog-sections-widget-remove',function(e){
        e.preventDefault();
        $(this).closest('li.item-setting-blog-sections').remove();
        reIndexListHomepageSections();
    });

    var reIndexListHomepageSections = function(){ 
        // reindex element
        $('#setting-blog-sections-active .list-setting-blog-sections').find('li.item-setting-blog-sections').each(function(i){
            var indexElement = i;
            var listContext = $(this);
            var widgetKey = $(this).data('id');
            $('.form-group' , listContext).find('input,select,textarea').each(function(){
                if( $(this).data('multiple') === 'Y') {
                    $(this).attr('name','setting_blog_sections['+indexElement+']['+  widgetKey +']['+ $(this).data('name') +'][]');
                } else {
                    $(this).attr('name','setting_blog_sections['+indexElement+']['+  widgetKey +']['+ $(this).data('name') +']');
                }
            });

        });
    }

});
</script>