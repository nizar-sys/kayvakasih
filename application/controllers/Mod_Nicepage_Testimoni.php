<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Mod_Nicepage_Testimoni
 * controller ini untuk manajemen testimoni 
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


class Mod_Nicepage_Testimoni extends CI_Controller {
	public function index(){          
        cek_session_akses('nicepage-testimoni',$this->session->id_session);  
         
        if(isset($_POST['set_testimoni'])) {

            /**
             * proses simpan (edit / insert)
             */
            $result = $this->upload_photo('photo');
            $data = array(
                'nama' => $this->db->escape_str( $this->input->post('nama') ),
                'profesi' => $this->db->escape_str( $this->input->post('profesi') ),
                'testimoni' => $this->db->escape_str( $this->input->post('testimoni') )
            );
            if( $result['file_name']) {
                $data = array_merge(
                    $data ,
                    array(
                        'photo'=> $result['file_name']
                    )
                );
            }
            $get_id = $this->db->escape_str( $this->input->post('id_edit') );
            $msg = array();
            if( $this->save_data($get_id,$data) ){ 
                $msg['success'] = 'Berhasil Update Testimoni';
                if(empty($get_id)) {
                    $msg['success'] = 'Berhasil Menambahkan Testimoni';
                }
		        
            } else {
                $msg['fail'] = 'Testimoni Tidak Tersimpan';
            } 
            $this->session->set_flashdata('alert', $msg);
            redirect($this->uri->segment(1).'/nicepage-testimoni');

        }  elseif(isset($_POST['id_delete'])) {        

            /**
             * proses delete
             */

            $id =  $this->db->escape_str( $this->input->post('id_delete') );
            $msg = array();
            if( $this->delete_data($id)) {
                $msg['success'] = 'Berhasil Hapus Testimoni'; 
            } else {
                $msg['fail'] = 'Testimoni Tidak Terhapus';
            }
            $this->session->set_flashdata('alert', $msg);
            redirect($this->uri->segment(1).'/nicepage-testimoni');

        } else {
            $this->view_index(); 
        }
    }

    protected function view_index(){         
        $data['get_testimoni']  = $this->model_app->view_ordering('tbl_nicepage_testimoni','nama','ASC') ; 
        $this->template->load('administrator/template','administrator/mod_nicepage_testimoni/view_index',$data);
    } 

    /**
     * save_data
     * method ini digunakan untnuk menyimpan testimoni
     * ke table
     */
    protected function save_data($id='',$data = array()) {

        // get data
        $get_data  = $this->model_app->view_where('tbl_nicepage_testimoni',array('id_testimoni' => $id ))->row_array(); 

        if( !empty($data) && is_array($data)) { 
            if(!empty($get_data) && $get_data['id_testimoni'] == $id ){  
                // jika beda /ganti maka hapus yang lama
                if(isset($data['photo'])) {
                    if( !empty($data['photo']) && ($get_data['photo'] != $data['photo'])) {
                        $this->hapus_photo($get_data['photo']); 
                    }
                }

                return $this->model_app->update(
                        'tbl_nicepage_testimoni', 
                        $data,
                        array(
                            'id_testimoni' => $id
                        )
                    ); 

            } else { 
                return $this->model_app->insert('tbl_nicepage_testimoni', $data);
            }
        } else {
            return null;
        }
    }  
    
    /**
     * delete_data
     * method ini digunakan untnuk hapus testimoni
     * ke table
     */
    protected function delete_data($id) { 
        // get data
        $get_data  = $this->model_app->view_where('tbl_nicepage_testimoni',array('id_testimoni' => $id ))->row_array();  
        if( !empty($get_data) ) {  

            if(!empty($get_data['photo'])) {
                $this->hapus_photo($get_data['photo']);
            }

            return $this->model_app->delete(
                'tbl_nicepage_testimoni',
                array(
                    'id_testimoni' => $id
                )
            );  
        } else {
            return null;
        }
    } 

    /**
     * upload_photo
     * untuk upload photo
     */
    protected function upload_photo($param){

        // config
        $config['upload_path'] = 'asset/img_nicepage/testimoni/';
        $config['allowed_types'] = 'jpg|png|JPG';
        $config['max_size'] = '3084'; //kilobyte

        $this->load->library('upload', $config);
        $this->upload->do_upload( $param );

        return $this->upload->data(); 
    }

    /**
     * hapus photo
     */
    protected function hapus_photo($nama_photo = '') {
        // jika ada photo hapus
        $photo_file = FCPATH .'asset/img_nicepage/testimoni/'.$nama_photo; 
        if( !empty($nama_photo) && file_exists($photo_file)) {
            @unlink($photo_file);
        }
    }
}
?>