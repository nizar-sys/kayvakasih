<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Mod_Nicepage_Team
 * controller ini untuk manajemen team 
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


class Mod_Nicepage_Team extends CI_Controller {
	public function index(){          
        cek_session_akses('nicepage-team',$this->session->id_session);  
         
        if(isset($_POST['set_team'])) {

            /**
             * proses simpan (edit / insert)
             */
            $result = $this->upload_photo('photo');
            $data = array(
                'nama' => $this->db->escape_str( $this->input->post('nama') ),
                'jabatan' => $this->db->escape_str( $this->input->post('jabatan') ),
                'socmed_fb' => $this->db->escape_str( $this->input->post('socmed_fb')),
                'socmed_twitter' => $this->db->escape_str( $this->input->post('socmed_twitter')),
                'socmed_ig' => $this->db->escape_str( $this->input->post('socmed_ig')),
                'socmed_linkedin' => $this->db->escape_str( $this->input->post('socmed_linkedin')),
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
                $msg['success'] = 'Berhasil Update Profile Team';
                if(empty($get_id)) {
                    $msg['success'] = 'Berhasil Menambahkan Profile Team';
                }
		        
            } else {
                $msg['fail'] = 'Profile Team Tidak Tersimpan';
            } 
            $this->session->set_flashdata('alert', $msg);
            redirect($this->uri->segment(1).'/nicepage-team');

        }  elseif(isset($_POST['id_delete'])) {        

            /**
             * proses delete
             */

            $id =  $this->db->escape_str( $this->input->post('id_delete') );
            $msg = array();
            if( $this->delete_data($id)) {
                $msg['success'] = 'Berhasil Hapus Profile Team'; 
            } else {
                $msg['fail'] = 'Profile Team Tidak Terhapus';
            }
            $this->session->set_flashdata('alert', $msg);
            redirect($this->uri->segment(1).'/nicepage-team');

        } else {
            $this->view_index(); 
        }
    }

    protected function view_index(){         
        $data['get_team']  = $this->model_app->view_ordering('tbl_nicepage_team','nama','ASC') ; 
        $this->template->load('administrator/template','administrator/mod_nicepage_team/view_index',$data);
    } 

    /**
     * save_data
     * method ini digunakan untnuk menyimpan team
     * ke table
     */
    protected function save_data($id='',$data = array()) {

        // get data
        $get_data  = $this->model_app->view_where('tbl_nicepage_team',array('id_team' => $id ))->row_array(); 

        if( !empty($data) && is_array($data)) { 
            if(!empty($get_data) && $get_data['id_team'] == $id ){  
                // jika beda /ganti maka hapus yang lama
                if(isset($data['photo'])) {
                    if( !empty($data['photo']) && ($get_data['photo'] != $data['photo'])) {
                        $this->hapus_photo($get_data['photo']); 
                    }
                }

                return $this->model_app->update(
                        'tbl_nicepage_team', 
                        $data,
                        array(
                            'id_team' => $id
                        )
                    ); 

            } else { 
                return $this->model_app->insert('tbl_nicepage_team', $data);
            }
        } else {
            return null;
        }
    }  
    
    /**
     * delete_data
     * method ini digunakan untnuk hapus team
     * ke table
     */
    protected function delete_data($id) { 
        // get data
        $get_data  = $this->model_app->view_where('tbl_nicepage_team',array('id_team' => $id ))->row_array();  
        if( !empty($get_data) ) {  

            if(!empty($get_data['photo'])) {
                $this->hapus_photo($get_data['photo']);
            }

            return $this->model_app->delete(
                'tbl_nicepage_team',
                array(
                    'id_team' => $id
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
        $config['upload_path'] = 'asset/img_nicepage/team/';
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
        $photo_file = FCPATH .'asset/img_nicepage/team/'.$nama_photo; 
        if( !empty($nama_photo) && file_exists($photo_file)) {
            @unlink($photo_file);
        }
    }
}
?>