<style>
.tab-container{
      display: flex;
      flex-direction: row;
}
.tab-container .tab-container-navigation{
      width: 225px;
}


.tab-container .tab-container-navigation .nav-tabs {
      display:block;
}

.tab-container .tab-container-content{
      width: 100%;
}
.tab-container .tab-container-content .tab-content{
      min-height: 650px;
}

.nav-tabs .nav-link {
      border: 1px solid #eff2f5;
      background: #f9f9f9;
      color: #a8a8a8;
      margin: 0;
      border-radius:0;
}
.nav-tabs .nav-link.active {      
      border-top: 1px solid #17a2b8;
      border-left: 1px solid #17a2b8;
      border-bottom: 1px solid #17a2b8;
      border-right: 0;
      background: #17a2b8;
      color:#fff;
}

.style-alert-success{
      color: #23923d;
      border-color: #23923d;
      background: #e8f9ec;
}
 
.style-alert-danger{
      color: #dc3545;
      border-color: #dc3545;
      background: #ffe3e5;
}
.tab-content {
      padding: 0 20px 20px 20px;
      border: 1px solid #dee2e6;
}
</style>
<?php

      $this->load->helper('text');
      // for widget control
      include 'controls/view_widget_control.php';
      include 'controls/view_sections_control.php';

      $get_mode = isset($get_mode) ? $get_mode : '';
      $get_sections_aktif = isset($get_sections_aktif) ? $get_sections_aktif : array(); 

      $blog_mode  = $get_mode == '0' ? 'd-none':'';
      $lp_mode    = $get_mode == '1' ? 'd-none':'';
?>
<div class="card" id="nicepage-panel">
    <div class="card-header bg-secondary">
        <h3 class="card-title py-1">Konfigurasi Template Nicepage</h3>
    </div> 
        <div class="card-body">
            <?php      
            if($this->session->flashdata('alert')!=null) {?>
                  <div id="nicepage-alert" class="alert style-alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              <span class="sr-only">Close</span>
                        </button>
                       <?php echo $this->session->flashdata('alert');?>
                  </div>
            <?php
            }
            ?>
            <div class="tab-container">
               <div class="tab-container-navigation">                        
                        <ul class="nav nav-tabs"role="tablist"> 
                              <li class="nav-item">
                              <a class="nav-link active" id="content_home_tab" data-toggle="pill" href="#content_home" role="tab"
                                    aria-controls="content-home" aria-selected="true">Home</a>
                              </li>
                              <li class="nav-item">
                                    <a class="nav-link " id="content_lokasi_menu_tab" data-toggle="pill" href="#content_lokasi_menu" role="tab"
                                    aria-controls="content" aria-selected="false">Setting Menu</a>
                              </li> 

                              <li class="nav-item">
                                    <a class="nav-link " id="content_setting_sidebar_tab" data-toggle="pill" href="#content_setting_sidebar" role="tab"
                                    aria-controls="content" aria-selected="false">Setting Sidebar</a>
                              </li> 
                              <li class="nav-item <?php echo $lp_mode ;?>">
                                    <a class="nav-link " id="content_setting_blog_sections_tab" data-toggle="pill" href="#content_setting_blog_sections" role="tab"
                                    aria-controls="content" aria-selected="false">Setting Section Blog</a>
                              </li> 
                              <li class="nav-item <?php echo $blog_mode;?>">
                                    <a class="nav-link" id="content_section_tab" data-toggle="pill" href="#content_section" role="tab"
                                    aria-controls="content" aria-selected="false">Urutkan Section</a>
                              </li>  
                              <?php
                                    foreach($get_sections_aktif as $section_item){
                                    ?>    
                                    <li class="nav-item <?php echo $blog_mode;?>">
                                          <a class="nav-link" id="content_<?php echo $section_item;?>_tab" data-toggle="pill" href="#content_<?php echo $section_item;?>" role="tab"
                                          aria-controls="content" aria-selected="false">
                                                <?php echo (isset($sections[$section_item]) ? $sections[$section_item] : 'Section Name' );?>
                                          </a>
                                    </li> 
                                    <?php
                                    }
                              ?> 
                        </ul>   
                  </div>
                  <div class="tab-container-content">
                        <div class="tab-content">
                              <div class="tab-pane fade show active" id="content_home">  
                                    <?php include 'view_tab_home.php';?>
                              </div>
                              <div class="tab-pane fade" id="content_section">  
                                    <?php include 'view_tab_sections.php';?>
                              </div> 
                              <div class="tab-pane fade" id="content_setting_sidebar">  
                                    <?php include 'view_tab_sidebar.php';?>
                              </div> 
                              <div class="tab-pane fade" id="content_lokasi_menu">  
                                    <?php include 'view_tab_menu.php';?>
                              </div> 
                              <div class="tab-pane fade" id="content_setting_blog_sections">  
                                    <?php include 'view_tab_setting_blog.php';?>
                              </div> 

                              <?php 
                              /**
                               * untuk sections
                               */ 
                              foreach($get_sections_aktif as $section_item){
                              ?>    
                                    <div class="tab-pane fade" id="content_<?php echo $section_item;?>">  
                                          <?php include 'view_tab_'.$section_item.'.php';?>
                                    </div>
                              <?php
                              }
                              ?>
                        </div>

                  </div>
            </div>
        </div>
    </div>
</div>

<script>

$(function(){  
      if (window.location.hash) {
        var initial_nav = window.location.hash; 

        // deactive tabs
        if($('#nicepage-panel .nav-tabs').find('a.nav-link').hasClass('active')){
            $('#nicepage-panel .nav-tabs').find('a.nav-link').removeClass('active');
            $('#nicepage-panel .nav-tabs').find('a.nav-link').removeClass('show'); 
        }
        
        if($('#nicepage-panel .tab-content').find('.tab-pane').hasClass('active')){ 
            $('#nicepage-panel .tab-content').find('.tab-pane').removeClass('active');
            $('#nicepage-panel .tab-content').find('.tab-pane').removeClass('show');
        }

        // active tab
        $('#nicepage-panel .nav-tabs .nav-link'+initial_nav+'_tab').addClass('active');
        $('#nicepage-panel .nav-tabs .nav-link'+initial_nav+'_tab').addClass('show');
        $('#nicepage-panel .tab-content .tab-pane'+initial_nav).addClass('active');
        $('#nicepage-panel .tab-content .tab-pane'+initial_nav).addClass('show'); 

        // side menu, reopen menu 
        $('body div.sidebar ul').find('li.module-nicepage').addClass('menu-open');
        $('body div.sidebar ul').find('li.nicepage').addClass('menu-open');
        $('body div.sidebar ul').find('li.nicepage a').addClass('active');
      } 

      
        // auto remove / hide alert message
        if( $(document).find('#nicepage-alert.alert')) {
            $('#nicepage-alert.alert').fadeOut(3000,function(){
                //remove it 
                $('#nicepage-alert.alert').remove();
            }); 
        }
});
</script>