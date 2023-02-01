<style>
ol.list-setting-sidebar{
    list-style:none;    
    margin: 0;
    padding: 0;
}


li.item-setting-sidebar {
    line-height:20px;
}
li.item-setting-sidebar .card ,
li.item-setting-sidebar.dd-item .card {
    margin-bottom: 10px;
}


li.item-setting-sidebar .card .card-header .card-title,
li.item-setting-sidebar.dd-item .card .card-header .card-title{
    font-size:15px; 
}

.dd-dragel >  li.item-setting-sidebar.dd-item .card .card-header,
.dd-dragel >  li.item-setting-sidebar.dd-item .card,
ol.list-setting-sidebar li .card .card-header,
ol.list-setting-sidebar li .card{
    border-radius:0;
}
 
.dd-dragel >  li.item-setting-sidebar.dd-item .dd-handle { 
    margin:0; 
    border-radius: 0;   
    height:100%; 
}

ol.list-setting-sidebar li .dd-handle{
    margin: 0; 
    border-radius: 0; 
    height: auto;
    cursor: move;
    padding: 5px;
    font-weight: normal;
}

.dd-dragel >  li.item-setting-sidebar.dd-item .dd-handle ,
ol.list-setting-sidebar li.dd-item .dd-handle{
    float: left;
    padding: 10px;
    font-size: 15px;
    line-height: 1.5em; 
}

#setting-sidebar .widget-active .card-body .title-active {
    margin-bottom: 10px;
    border-bottom: 1px solid #17a2b8;
    color: #17a2b8;
    font-size: 20px;
}

#setting-sidebar .widget-available .card-body .title-available {
    margin-bottom: 10px;
    border-bottom: 1px solid #343a40;
    color: #343a40;
    font-size: 20px;
}  

</style>
    <?php    
    
     $get_setting_sidebar = isset($get_setting_sidebar) ? $get_setting_sidebar : array();  
     $get_menu_dropdown = isset($get_menu_dropdown) ? $get_menu_dropdown : array(); 
     $get_iklan_sidebar_dropdown = isset($get_iklan_sidebar_dropdown) ? $get_iklan_sidebar_dropdown : array();
     $get_playlist_dropdown = isset($get_playlist_dropdown) ? $get_playlist_dropdown : array();  
     $get_album_dropdown = isset($get_album_dropdown) ? $get_album_dropdown : array();  
     $get_iklan_link_list = isset($get_iklan_link_list) ? $get_iklan_link_list : array();
    ?>
    <div class="card mt-4" style="min-height:450px" id="setting-sidebar">
        <div class="card-header bg-info">
            <h3 class="card-title py-1">
               Setting Sidebar  
            </h3>
        </div>
        <div class="card-body">    
            <div class="row">            
                <div class="col-md-5">
                    <div class="card widget-available">
                        <div class="card-body">
                            <div class="title-available">
                                Widget Tersedia
                            </div>
                            <div>
                                <ol class="list-setting-sidebar">
                                    <?php if ($widget) {?>
                                        <?php
                                        $wi = 0;
                                        foreach($widget as $widget_key => $widget_name) { 
                                        ?>

                                        <li class="item-setting-sidebar"> 
                                            <div class="card ">
                                                <div class="card-header ">
                                                    <div class="card-title">
                                                    <?php echo $widget_name; ?>
                                                    </div>
                                                    <div class="card-tools">
                                                        <button type="button" 
                                                            data-id="<?php echo $widget_key;?>"
                                                            data-name="<?php echo $widget_name;?>"
                                                            class="setting-sidebar-widget-add btn btn-tool">
                                                            <i class="fas fa-plus-circle"></i>
                                                            Tambahkan
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body form-template d-none">
                                                    <?php  
                                                    switch ($widget_key) {
                                                        case 'widget_video':
                                                            nicepage_control_widget_video($wi,$widget_key,array(),$get_playlist_dropdown);
                                                            break;
                                                        case 'widget_gallery':
                                                            nicepage_control_widget_gallery($wi,$widget_key,array(),$get_album_dropdown);
                                                            break;
                                                        case 'widget_iklan_sidebar':
                                                            nicepage_control_iklan_sidebar($wi,$widget_key,array(),$get_iklan_sidebar_dropdown);
                                                            break;
                                                        case 'widget_iklan_link':
                                                            nicepage_control_iklan_link($i,$id,array(),$get_iklan_link_list);
                                                            break;
                                                        case 'widget_menu':
                                                            nicepage_control_widget_menu($wi,$widget_key,array(),$get_menu_dropdown);
                                                            break; 
                                                        default:
                                                            nicepage_control_widget($wi,$widget_key,array());
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
                               Sidebar
                            </div>
                            <div class="dd"  id="setting-sidebar-active">
                                <ol class="dd-list list-setting-sidebar">
                                    <?php if ($get_setting_sidebar) {?>
                                        <?php foreach($get_setting_sidebar as $i => $widget_active) { 
                                            $id = key($widget_active); 
                                        ?>

                                        <li class="item-setting-sidebar dd-item" data-id="<?php echo $id;?>">
                                            <div class="dd-handle">
                                                <i class="fa fa-arrows-alt"></i>
                                            </div>
                                            <div class="card collapsed-card">
                                                <div class="card-header bg-info">
                                                    <div class="card-title">
                                                        <?php if(!empty($widget_active[$id]['judul'])) { ?> 
                                                            <?php echo $widget[$id] .' : "'.word_limiter($widget_active[$id]['judul'],2).'"';?> 
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <?php echo $widget[$id]; ?>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                        <button type="button" class="setting-sidebar-widget-remove btn btn-tool ">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <?php  
                                                    switch ($id) {
                                                        case 'widget_video':
                                                            nicepage_control_widget_video($i,$id,$get_setting_sidebar,$get_playlist_dropdown);
                                                            break;
                                                        case 'widget_gallery':
                                                            nicepage_control_widget_gallery($i,$id,$get_setting_sidebar,$get_album_dropdown);
                                                            break;
                                                        case 'widget_iklan_sidebar':
                                                            nicepage_control_iklan_sidebar($i,$id,$get_setting_sidebar,$get_iklan_sidebar_dropdown);
                                                            break;
                                                        case 'widget_iklan_link':
                                                            nicepage_control_iklan_link($i,$id,$get_setting_sidebar,$get_iklan_link_list);
                                                            break;
                                                        case 'widget_menu': 
                                                            nicepage_control_widget_menu($i,$id,$get_setting_sidebar,$get_menu_dropdown);
                                                            break; 
                                                        default:
                                                            nicepage_control_widget($i,$id,$get_setting_sidebar);
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
                            <button class="btn btn-info" type="submit" name="set_setting_sidebar">Update</button>
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
            <li>Untuk menampilkan Widget pada sidebar, klik tombol "Tambahkan"</li>
            <li>Klik tombol "Update" untuk simpan konfigurasi</li>
        </ul>
    </div>
<script>
$(function(){
    // untuk sortlable nested sidebar
    $('#setting-sidebar-active').nestable({
        maxDepth: 1
    }).on('change',function(e){ 
        reIndexListSidebar()
    });

    $(document).on('click','.setting-sidebar-widget-add',function(e){
        e.preventDefault();
        var widgetKey = $(this).data('id');
        var widgetName = $(this).data('name');
        var itemContext = $(this).closest('li.item-setting-sidebar');
        var widgetFormElement = $('.form-template',itemContext).html();

        var createElementList = '<li class="item-setting-sidebar dd-item" data-id="'+ widgetKey +'">'+
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
                            '<button type="button" class="setting-sidebar-widget-remove btn btn-tool"><i class="fas fa-trash-alt"></i></button>' +
                        '</div>'+
                    '</div>'+
                    '<div class="card-body">'+
                        widgetFormElement +
                    '</div>'+
                '</div>'+
            '</li>';
        $('#setting-sidebar-active .list-setting-sidebar').append(createElementList);        
        reIndexListSidebar();
    });

    $(document).on('click','.setting-sidebar-widget-remove',function(e){
        e.preventDefault();
        $(this).closest('li.item-setting-sidebar').remove();
        reIndexListSidebar();
    });

    var reIndexListSidebar = function(){ 
        // reindex element
        $('#setting-sidebar-active .list-setting-sidebar').find('li.item-setting-sidebar').each(function(i){
            var indexElement = i;
            var listContext = $(this);
            var widgetKey = $(this).data('id');
            $('.form-group' , listContext).find('input,select,textarea').each(function(){
                if( $(this).data('multiple') === 'Y') {
                    $(this).attr('name','setting_sidebar['+indexElement+']['+  widgetKey +']['+ $(this).data('name') +'][]');
                } else {
                    $(this).attr('name','setting_sidebar['+indexElement+']['+  widgetKey +']['+ $(this).data('name') +']');
                }
            });

        });
    }

});
</script>