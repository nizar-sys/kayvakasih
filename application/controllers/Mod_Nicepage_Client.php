<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Mod_Nicepage_Client
 * controller ini untuk manajemen logo client 
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


class Mod_Nicepage_Client extends CI_Controller {
	public function index(){          
        cek_session_akses('nicepage-client',$this->session->id_session);  
         
        if(isset($_POST['set_client'])) {

            /**
             * proses simpan (edit / insert)
             */
            $result = $this->upload_logo('logo');
            $data = array(
                'nama' => $this->db->escape_str( $this->input->post('nama') )
            );
            if( $result['file_name']) {
                $data = array_merge(
                    $data ,
                    array(
                        'logo'=> $result['file_name']
                    )
                );
            }
            $get_id = $this->db->escape_str( $this->input->post('id_edit') );
            $msg = array();
            if( $this->save_data($get_id,$data) ){ 
                $msg['success'] = 'Berhasil Update Logo Client';
                if(empty($get_id)) {
                    $msg['success'] = 'Berhasil Menambahkan Logo Client';
                }
		        
            } else {
                $msg['fail'] = 'Logo Client Tidak Tersimpan';
            } 
            $this->session->set_flashdata('alert', $msg);
            redirect($this->uri->segment(1).'/nicepage-client');

        }  elseif(isset($_POST['id_delete'])) {        

            /**
             * proses delete
             */

            $id =  $this->db->escape_str( $this->input->post('id_delete') );
            $msg = array();
            if( $this->delete_data($id)) {
                $msg['success'] = 'Berhasil Hapus Logo Client'; 
            } else {
                $msg['fail'] = 'Logo Client Tidak Terhapus';
            }
            $this->session->set_flashdata('alert', $msg);
            redirect($this->uri->segment(1).'/nicepage-client');

        } else {
            $this->view_index(); 
        }
    }

    protected function view_index(){         
        $data['get_client']  = $this->model_app->view_ordering('tbl_nicepage_client','nama','ASC') ; 
        $this->template->load('administrator/template','administrator/mod_nicepage_client/view_index',$data);
    } 

    /**
     * save_data
     * method ini digunakan untnuk menyimpan client
     * ke table
     */
    protected function save_data($id='',$data = array()) {

        // get data
        $get_data  = $this->model_app->view_where('tbl_nicepage_client',array('id_client' => $id ))->row_array(); 

        if( !empty($data) && is_array($data)) { 
            if(!empty($get_data) && $get_data['id_client'] == $id ){  
                // jika beda /ganti maka hapus yang lama
                if(isset($data['logo'])) {
                    if( !empty($data['logo']) && ($get_data['logo'] != $data['logo'])) {
                        $this->hapus_logo($get_data['logo']); 
                    }
                }

                return $this->model_app->update(
                        'tbl_nicepage_client', 
                        $data,
                        array(
                            'id_client' => $id
                        )
                    ); 

            } else { 
                return $this->model_app->insert('tbl_nicepage_client', $data);
            }
        } else {
            return null;
        }
    }  
    
    /**
     * delete_data
     * method ini digunakan untnuk hapus client
     * ke table
     */
    protected function delete_data($id) { 
        // get data
        $get_data  = $this->model_app->view_where('tbl_nicepage_client',array('id_client' => $id ))->row_array();  
        if( !empty($get_data) ) {  

            if(!empty($get_data['logo'])) {
                $this->hapus_logo($get_data['logo']);
            }

            return $this->model_app->delete(
                'tbl_nicepage_client',
                array(
                    'id_client' => $id
                )
            );  
        } else {
            return null;
        }
    } 

    /**
     * upload_logo
     * untuk upload logo
     */
    protected function upload_logo($param){

        // config
        $config['upload_path'] = 'asset/img_nicepage/client/';
        $config['allowed_types'] = 'jpg|png|JPG';
        $config['max_size'] = '3084'; //kilobyte

        $this->load->library('upload', $config);
        $this->upload->do_upload( $param );

        return $this->upload->data(); 
    }

    /**
     * hapus logo
     */
    protected function hapus_logo($nama_logo = '') {
        // jika ada logo hapus
        $logo_file = FCPATH .'asset/img_nicepage/client/'.$nama_logo; 
        if( !empty($nama_logo) && file_exists($logo_file)) {
            @unlink($logo_file);
        }
    }
}
?>