<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 * Mod_Nicepage
 * nicepage option
 * untuk konfigurasi template nicepage
 * 
 * module admin
 * 
 * @package nicepage
 * @author noor hadi (no3r_hadi@yahoo.com)
 * @license http://opensource.org/licenses/MIT  MIT License
 * 
 * @copyright 2020
 * 
 */


class Mod_Nicepage extends CI_Controller {
	public function index(){         

        cek_session_akses('nicepage',$this->session->id_session); 

        if (isset($_POST['set_config'])){

            $this->update_config();

        } elseif(isset($_POST['set_config_menu'])){
            
            $this->set_config_section('lokasi_menu');

        }  elseif(isset($_POST['set_urut_sections'])){

            $this->update_urut_sections();

        }  elseif(isset($_POST['set_config_about'])){

            $this->set_config_section('section_about');

        } elseif(isset($_POST['set_config_services'])){

            $this->set_config_section('section_services');

        } elseif(isset($_POST['set_config_berita'])){
            
            $this->set_config_section('section_berita');

        } elseif(isset($_POST['set_config_cta'])){
            
            $this->set_config_section('section_cta');

        } elseif(isset($_POST['set_config_feature'])){
            
            $this->set_config_section('section_feature');

        } elseif(isset($_POST['set_config_portfolio'])){
            
            $this->set_config_section('section_portfolio');

        } elseif(isset($_POST['set_config_team'])){
            
            $this->set_config_section('section_team');

        } elseif(isset($_POST['set_config_client'])){
            
            $this->set_config_section('section_client');

        } elseif(isset($_POST['set_config_hero'])){
            
            $this->set_config_section('section_hero');

        } elseif(isset($_POST['set_config_contact'])){
            
            $this->set_config_section('section_contact');

        } elseif(isset($_POST['set_config_testimonial'])){
            
            $this->set_config_section('section_testimonial');

        } elseif(isset($_POST['set_config_faq'])){
            
            $this->set_config_section('section_faq');

        } elseif(isset($_POST['set_setting_sidebar'])){

            $this->set_config_section('setting_sidebar'); 

        } elseif(isset($_POST['set_setting_blog_sections'])){

            $this->set_config_section('setting_blog_sections');

        } elseif(isset($_POST['set_config_agenda'])){

            $this->set_config_section('section_agenda');

        } elseif(isset($_POST['set_config_pengumuman'])){

            $this->set_config_section('section_pengumuman');

        }else {

            $this->view_index();

        }
    }

    protected function view_index(){

        /**
         * get data option dari database
         */
        $get_options  = $this->model_app->view('tbl_nicepage')->result_array(); 
        if(!empty($get_options)){
            foreach($get_options as $item) {
                $data['get_' . $item['key'] ]= $this->extract_data($item['value']);
            }
        } 
  
        /**
         * config default content service ,feature, team
         */ 
        $data['get_feature_max']    = empty($data['get_feature_max']) ? 3 : $data['get_feature_max'];
        $data['get_services_max']   = empty($data['get_services_max']) ? 3 : $data['get_services_max'];
        $data['get_team_max']       = empty($data['get_team_max']) ? 4 : $data['get_team_max'];
        $data['get_slide_max']      = empty($data['get_slide_max']) ? 5 : $data['get_slide_max'];
        $data['get_faq_max']        = empty($data['get_faq_max']) ? 5 : $data['get_faq_max'];
        // default

        // widget
        $data['widget']  = array( 
            'widget_agenda' => 'Agenda',
            'widget_berita_populer' => 'Berita Populer',  
            'widget_berita_pilihan' => 'Berita Pilihan', 
            'widget_berita_tag' => 'Berita Tags',
            'widget_search' => 'Form Pencarian',
            'widget_gallery' => 'Galeri',
            'widget_iklan_sidebar' => 'Iklan Sidebar',
            'widget_iklan_link' => 'Iklan Link',
            'widget_berita_kategori' => 'Kategori Berita',            
            'widget_contact' => 'Kontak',
            'widget_komentar' => 'Komentar Terakhir',
            'widget_logo' => 'Logo Web',
            'widget_menu' => 'Menu',
            'widget_pengumuman' => 'Pengumuman',
            'widget_polling' => 'Polling',
            'widget_sekilas_info' => 'Sekilas Info',
            'widget_social' => 'Social Media',
            'widget_text' => 'Teks',
            'widget_video' => 'Video' 
        ); 

        // data section landingpage mode
        $data['sections'] = array(
            'section_about' => 'Section About',
            'section_agenda' => 'Section Agenda',
            'section_berita' => 'Section Berita',
            'section_client' => 'Section Client',
            'section_contact' => 'Section Contact',
            'section_cta' => 'Section Call To Action',
            'section_faq' => 'Section FAQs',
            'section_feature' => 'Section Feature',
            'section_hero' => 'Section Hero',
            'section_pengumuman' => 'Section Pengumuman',
            'section_portfolio' => 'Section Portfolio',
            'section_services' => 'Section Services',
            'section_team' => 'Section Team',
            'section_testimonial' => 'Section Testimonial'
        ); 
        
        // data section blog mode 
        $data['blog_sections'] = array(  
            'blog_section_agenda' => 'Agenda',
            'blog_section_berita_populer' => 'Berita Populer',
            'blog_section_berita_pilihan' => 'Berita Pilihan',
            'blog_section_berita_per_kategori' => 'Berita Per Kategori', 
            'blog_section_berita_terbaru' => 'Berita Terbaru',
            'blog_section_berita_slider' => 'Berita Slider' ,
            'blog_section_iklan_home' => 'Iklan Home',
            'blog_section_pengumuman' => 'Pengumuman'
        );

        //dropdown
        $data['get_halaman_dropdown'] = $this->get_halaman_dropdown();
        $data['get_kategori_dropdown'] = $this->get_kategori_dropdown(); 
        $data['get_team_dropdown'] = $this->get_team_dropdown();
        $data['get_menu_dropdown'] = $this->get_menu_dropdown(); 

        $data['get_playlist_dropdown'] = $this->get_playlist_dropdown(); 
        $data['get_album_dropdown'] = $this->get_album_dropdown(); 
        $data['get_iklan_link_list'] = $this->get_iklan_link_list();
        $data['get_iklan_sidebar_dropdown'] = $this->get_iklan_sidebar_dropdown();
        $data['get_iklan_home_dropdown'] = $this->get_iklan_home_dropdown();
        $data['get_iklan_atas_dropdown'] = $this->get_iklan_atas_dropdown(); 

        $this->template->load('administrator/template','administrator/mod_nicepage/view_index',$data);
    }
 

    /**
     * update_config
     * untuk menyumpan konfigurasi template
     */
    protected function update_config(){ 
        
        // update mode
        $this->save_config('mode',  $this->input->post('mode') ); 

        // tambahkan tagline        
        $this->save_config('tagline',  $this->input->post('tagline') );
        
        // hidden / show btn_back_to_top
        $this->save_config('btn_back_to_top',  $this->input->post('btn_back_to_top') );
        
        // max item setting          
        $this->save_config('faq_max',  $this->input->post('faq_max') ); 
        $this->save_config('feature_max',  $this->input->post('feature_max') ); 
        $this->save_config('services_max',  $this->input->post('services_max') ); 
        $this->save_config('slide_max',  $this->input->post('slide_max') ); 
        $this->save_config('team_max',  $this->input->post('team_max') ); 

        // header & footer embeded code
        $this->save_config('header_embeded_code',  $this->input->post('header_embeded_code') ); 
        $this->save_config('footer_embeded_code',  $this->input->post('footer_embeded_code') ); 
 
        // update sections aktif
        // prepare value sections
        $data_sections_aktif = array();      
        $update_sections_order = array();          
        if( !empty($this->input->post('sections_aktif')) && is_array( $this->input->post('sections_aktif'))) {              
            //get sections order
            $get_sections_order  = $this->model_app->view_where('tbl_nicepage',array('key' => 'sections_order' ))->row_array();             
            if( isset($get_sections_order['value'])) { 
                $update_sections_order = json_decode($get_sections_order['value'],true); 
                $update_sections_order = is_null($update_sections_order) ? array() : $update_sections_order;
            }
            //

            foreach( $this->input->post('sections_aktif') as $sections_aktif) {
                $data_sections_aktif[] = $sections_aktif;

                // tambahkan ke data sections order jika belum ada
                if(!in_array( $sections_aktif , $update_sections_order ) ){ 
                    array_push( $update_sections_order , $sections_aktif );
                }
            }

            // hapus jika tidak aktif
            $get_sections_order = $update_sections_order;
            foreach($get_sections_order as $i => $sections_order){
                if( !in_array( $sections_order , $data_sections_aktif ) ) {
                    unset($update_sections_order[$i]);
                }
            }
            unset($get_sections_order);

        }         
        $this->save_config('sections_aktif', $data_sections_aktif ); 
        $this->save_config('sections_order', $update_sections_order ); 
		$this->session->set_flashdata('alert','Konfigurasi Telah Diupdate');
        redirect($this->uri->segment(1).'/nicepage');
    }
 
    
    /**
     * update_urut_sections
     * untuk mengurutkan tataletak sections
     */
    protected function update_urut_sections(){         
        // prepare value
        $data_sections = array();                
        if( !empty($this->input->post('sections_order')) ) {            
            $sections_order = json_decode($this->input->post('sections_order'),true); 
            foreach( $sections_order as $value) {
                $data_sections[] = $value['id'];
            }
        }  

        // value data dipisah dengan koma 
        $this->save_config('sections_order', $data_sections ); 
		$this->session->set_flashdata('alert','Konfigurasi Telah Diupdate');
        redirect($this->uri->segment(1).'/nicepage#content_section');
    }
     

    /**
     * set_config_section
     * untuk mengisi data section
     */
    protected function set_config_section($section_id){
        // prepare value
        $data = '';
        if( !empty($this->input->post($section_id)) ) {            
            $data = $this->input->post($section_id); 
        }         
        $this->save_config($section_id, $data ); 
		$this->session->set_flashdata('alert','Konfigurasi Telah Diupdate');
        redirect($this->uri->segment(1).'/nicepage#content_'.$section_id);
    } 
    
    /**
     * save config
     * method ini digunakan untnuk menyimpan konfigurasi
     * dengan berbagai key (mode, sections  dll)
     * ke table
     */
    protected function save_config($key='',$value = '') {

        // get options value 
        $get_option  = $this->model_app->view_where('tbl_nicepage',array('key' => $key ))->row_array(); 
        $value = json_encode($value);
        // cek key
        if(!empty($get_option) && $get_option['key'] == $key ){ 
            if( !empty($value)) {
                // save data pisah dengan koma
                $this->model_app->update(
                    'tbl_nicepage', 
                    array(
                        'key' => $key,
                        'value' => $value
                    ),
                    array(
                        'key' => $key
                    )
                ); 
            } else {
        
                $this->model_app->update(
                    'tbl_nicepage', 
                    array(
                        'value' => ''
                    ),
                    array(
                        'key' => $key
                    )
                );
            }
        } else { 
            if( !empty($value) ) {                
                // save data pisah dengan koma
                $this->model_app->insert(
                    'tbl_nicepage', 
                    array(
                        'key' => $key,
                        'value' => $value
                    )
                );
            }
        } 
    }

    /**
     * extract_data
     * untuk mengextrak data dari jason format / string
     */
    protected function extract_data($value,$from_json = true){
        if($from_json == true && is_string($value)) {
            return json_decode($value,true);
        } else {
            return $value;
        }
    }


    /**
     * get_menu_dropdown
     * untuk mendapatkan menu parent
     */
    protected function get_menu_dropdown(){        
        $get_menu = $this->db->query("
			SELECT 
                m.id_menu as id,
				m.nama_menu as nama
			FROM 
                menu m
            WHERE
                m.id_parent = 0      
                AND
                m.aktif = 'Ya'
			ORDER BY m.nama_menu ASC
        ")->result_array();
        
        $data_dropdown = array();
        if(!empty($get_menu)){
            $data_dropdown = $get_menu;
        } 
        return $data_dropdown;
    }

    /**
     * get_halaman_dropdown
     * untuk mendapatkan halaman statis
     */
    protected function get_halaman_dropdown(){             
        $get_halaman = $this->db->query("
			SELECT 
                hal.id_halaman as id,
                hal.judul as judul
			FROM 
                halamanstatis  hal
			ORDER BY hal.judul ASC
        ")->result_array();   
        $data_dropdown = array();
        if(!empty($get_halaman)){
            $data_dropdown = $get_halaman;
        } 
        return $data_dropdown;
    }

    /**
     * get_kategori_dropdown
     * untuk mendapatkan kategori
     */
    protected function get_kategori_dropdown(){        
        $get_kategori = $this->db->query("
            SELECT 
				cat.id_kategori as id,
				concat(cat.nama_kategori,' (',count(b.id_kategori),')') as judul
			FROM 
				kategori cat
				LEFT JOIN berita b ON b.id_kategori = cat.id_kategori  and b.status = 'Y'
			WHERE 
				cat.aktif='Y' 
			group by cat.id_kategori 
            ORDER BY cat.nama_kategori ASC
        ")->result_array();
        
        $data_dropdown = array();
        if(!empty($get_kategori)){
            $data_dropdown = $get_kategori;
        } 
        return $data_dropdown;
    } 

    /**
     * get_team_dropdown
     * untuk mendapatkan photo team
     */
    protected function get_team_dropdown(){        
        $get_team = $this->db->query("
			SELECT 
                team.id_team as id,
				team.nama as nama
			FROM 
                tbl_nicepage_team team
			ORDER BY team.nama ASC
        ")->result_array();
        
        $data_dropdown = array();
        if(!empty($get_team)){
            $data_dropdown = $get_team;
        } 
        return $data_dropdown;
    } 

    /**
     * get_playlist_dropdown
     * untuk mendapatkan playlist
     */
    protected function get_playlist_dropdown(){        
        $get_playlist = $this->db->query("
            SELECT 
				pl.id_playlist as id,
				concat(pl.jdl_playlist,' (',count(v.id_video),')') as nama
			FROM 
				playlist pl
				LEFT JOIN video v ON v.id_playlist = pl.id_playlist 
			WHERE 
				pl.aktif='Y' 
			group by pl.id_playlist 
            ORDER BY pl.jdl_playlist ASC
        ")->result_array();
        
        $data_dropdown = array();
        if(!empty($get_playlist)){
            $data_dropdown = $get_playlist;
        } 
        return $data_dropdown;
    } 

    /**
     * get_album_dropdown
     * untuk mendapatkan album
     */
    protected function get_album_dropdown(){        
        $get_album = $this->db->query("
            SELECT 
                alb.id_album as id,
				concat(alb.jdl_album,' (',count(g.id_gallery),')') as nama
			FROM 
				album alb
				LEFT JOIN gallery g ON g.id_album = alb.id_album
			WHERE 
                alb.aktif='Y' 
			group by alb.id_album 
            ORDER BY alb.jdl_album ASC
        ")->result_array();
        
        $data_dropdown = array();
        if(!empty($get_album)){
            $data_dropdown = $get_album;
        } 
        return $data_dropdown;
    } 

    /**
     * get_iklan_sidebar_dropdown
     * untuk mendapatkan iklan gambar sidebar
     */
    protected function get_iklan_sidebar_dropdown(){        
        $get_iklan = $this->db->query(" 
			SELECT 
                iklan.id_pasangiklan as id,
                iklan.judul as nama
			FROM 
                pasangiklan iklan
			ORDER BY iklan.judul ASC
        ")->result_array();
        
        $data_dropdown = array();
        if(!empty($get_iklan)){
            $data_dropdown = $get_iklan;
        } 
        return $data_dropdown;
    }

    /**
     * get_iklan_link_list
     * untuk mendapatkan iklan link
     */
    protected function get_iklan_link_list(){        
        $get_iklan_link = $this->db->query(" 
			SELECT 
                iklan.id_banner as id,
                iklan.judul as nama
			FROM 
                banner iklan
			ORDER BY iklan.judul ASC
        ")->result_array();
        
        $data_list = array();
        if(!empty($get_iklan_link)){
            $data_list = $get_iklan_link;
        } 
        return $data_list;
    }

    /**
     * get_iklan_home_dropdown
     * untuk mendapatkan iklan gambar home
     */
    protected function get_iklan_home_dropdown(){        
        $get_iklan = $this->db->query(" 
			SELECT 
                iklan.id_iklantengah as id,
                iklan.judul as nama
			FROM 
                iklantengah iklan
			ORDER BY iklan.judul ASC
        ")->result_array();
        
        $data_dropdown = array();
        if(!empty($get_iklan)){
            $data_dropdown = $get_iklan;
        } 
        return $data_dropdown;
    }

    /**
     * get_iklan_atas_dropdown
     * untuk mendapatkan iklan atas
     */
    protected function get_iklan_atas_dropdown(){        
        $get_iklan = $this->db->query(" 
			SELECT 
                iklan.id_iklanatas as id,
                iklan.judul as nama
			FROM 
                iklanatas iklan
			ORDER BY iklan.judul ASC
        ")->result_array();
        
        $data_dropdown = array();
        if(!empty($get_iklan)){
            $data_dropdown = $get_iklan;
        } 
        return $data_dropdown;
    }
 
}
?>