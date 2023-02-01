<div id="responsive-menu" class="responsive-menu shadow">
    <div class="menu-top">
        <a href="#" class="btn-responsive">
            <i class="fa fa-times" aria-hidden="true"></i>
        </a>
    </div>
    <div class="menu-content">
        <div class="menu-header">
            Main Menu
        </div> 
    <?php 
    echo build_nav_menu($menu_utama_id,$menu_utama_id,'sidemenu');  
    ?>	 
    </div>
</div>   
<div class="responsive-lock-screen" style="display:none;"></div>