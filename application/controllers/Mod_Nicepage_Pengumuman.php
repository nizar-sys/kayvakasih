<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Mod_Nicepage_Pengumuman
 * controller ini untuk manajemen pengumuman 
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


class Mod_Nicepage_Pengumuman extends CI_Controller {

    public function detail($id='') {

        cek_session_akses('nicepage-pengumuman',$this->session->id_session);  

        $result = $this->model_app->view_where('tbl_nicepage_pengumuman',array('id_pengumuman' => $id ))->row_array();
        if(!empty($result)) {
            $data = json_encode($result);
        } else{
            $data = json_encode(array());
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output( $data );
            
    }

	public function index(){          
        cek_session_akses('nicepage-pengumuman',$this->session->id_session);  
         
        if(isset($_POST['set_pengumuman'])) {

            /**
             * proses simpan (edit / insert)
             */
            
            $data = array(
                'judul_seo' => seo_title( $this->db->escape_str( $this->input->post('judul') ) ),
                'judul' => $this->db->escape_str( $this->input->post('judul') ), 
                'deskripsi' => $this->db->escape_str( $this->input->post('deskripsi') ),
                'username' => $this->session->username,
                'tanggal' =>  date(
                    'Y-m-d', 
                    strtotime(
                        $this->db->escape_str( $this->input->post('tanggal') )
                    )
                )
            );
            
            $file_gambar = $this->upload_file('gambar');
            if( $file_gambar['file_name']) {
                $data = array_merge(
                    $data ,
                    array(
                        'gambar'=> $file_gambar['file_name']
                    )
                );
            }
 

            $get_id = $this->db->escape_str( $this->input->post('id_edit') );
            $msg = array();
            if( $this->save_data($get_id,$data) ){ 
                $msg['success'] = 'Berhasil Update Pengumuman';
                if(empty($get_id)) {
                    $msg['success'] = 'Berhasil Menambahkan Pengumuman';
                }
		        
            } else {
                $msg['fail'] = 'Pengumuman Tidak Tersimpan';
            } 
            $this->session->set_flashdata('alert', $msg);
            redirect($this->uri->segment(1).'/nicepage-pengumuman');

        }  elseif(isset($_POST['id_delete'])) {        

            /**
             * proses delete
             */

            $id =  $this->db->escape_str( $this->input->post('id_delete') );
            $msg = array();
            if( $this->delete_data($id)) {
                $msg['success'] = 'Berhasil Hapus Pengumuman'; 
            } else {
                $msg['fail'] = 'Pengumuman Tidak Terhapus';
            }
            $this->session->set_flashdata('alert', $msg);
            redirect($this->uri->segment(1).'/nicepage-pengumuman');

        } else {
            $this->view_index(); 
        }
    }

    protected function view_index(){         
        $data['get_pengumuman']  = $this->model_app->view_ordering('tbl_nicepage_pengumuman','judul','ASC') ; 
        $this->template->load('administrator/template','administrator/mod_nicepage_pengumuman/view_index',$data);
    } 

    /**
     * save_data
     * method ini digunakan untnuk menyimpan pengumuman
     * ke table
     */
    protected function save_data($id='',$data = array()) {

        // get data
        $get_data  = $this->model_app->view_where('tbl_nicepage_pengumuman',array('id_pengumuman' => $id ))->row_array(); 

        if( !empty($data) && is_array($data)) { 
            if(!empty($get_data) && $get_data['id_pengumuman'] == $id ){  
                // jika beda /ganti maka hapus yang lama
                if(isset($data['gambar'])) {
                    if( !empty($data['gambar']) && ($get_data['gambar'] != $data['gambar'])) {
                        $this->hapus_file($get_data['gambar']); 
                    }
                }
 

                return $this->model_app->update(
                        'tbl_nicepage_pengumuman', 
                        $data,
                        array(
                            'id_pengumuman' => $id
                        )
                    ); 

            } else { 
                return $this->model_app->insert('tbl_nicepage_pengumuman', $data);
            }
        } else {
            return null;
        }
    }  
    
    /**
     * delete_data
     * method ini digunakan untnuk hapus pengumuman
     * ke table
     */
    protected function delete_data($id) { 
        // get data
        $get_data  = $this->model_app->view_where('tbl_nicepage_pengumuman',array('id_pengumuman' => $id ))->row_array();  
        if( !empty($get_data) ) {  

            if(!empty($get_data['gambar'])) {
                $this->hapus_file($get_data['gambar']);
            }
 

            return $this->model_app->delete(
                'tbl_nicepage_pengumuman',
                array(
                    'id_pengumuman' => $id
                )
            );  
        } else {
            return null;
        }
    } 

    /**
     * upload_file
     * untuk upload gambar
     */
    protected function upload_file($param ){

        // config
        $config['upload_path'] = 'asset/img_nicepage/pengumuman/'; 
        $config['allowed_types'] = 'jpg|png|JPG'; 
        $config['max_size'] = '3084'; //kilobyte

        $this->load->library('upload', $config);
        $this->upload->do_upload( $param );

        return $this->upload->data(); 
    }

    /**
     * hapus gambar
     */
    protected function hapus_file($file_name = '') {
        // jika ada gambar hapus
        $file_name_path = FCPATH .'asset/img_nicepage/pengumuman/'.$file_name; 
        if( !empty($file_name) && file_exists($file_name_path)) {
            @unlink($file_name_path);
        }
    }
}
?>