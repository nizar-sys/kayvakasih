<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Mod_Nicepage_Portfolio
 * controller ini untuk manajemen portfolio 
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


class Mod_Nicepage_Portfolio extends CI_Controller {
	public function index(){          
        cek_session_akses('nicepage-portfolio',$this->session->id_session);  
         
        if(isset($_POST['set_portfolio'])) {

            /**
             * proses simpan (edit / insert)
             */
            $result = $this->upload_image('image');
            $data = array(
                'nama_project' => $this->db->escape_str( $this->input->post('nama_project') ),
                'nama_client' => $this->db->escape_str( $this->input->post('nama_client') ),
                'deskripsi' => $this->db->escape_str( $this->input->post('deskripsi') ),
                'url' => $this->db->escape_str( $this->input->post('url') )
            );
            if( $result['file_name']) {
                $data = array_merge(
                    $data ,
                    array(
                        'image'=> $result['file_name']
                    )
                );
            }
            $get_id = $this->db->escape_str( $this->input->post('id_edit') );
            $msg = array();
            if( $this->save_data($get_id,$data) ){ 
                $msg['success'] = 'Berhasil Update Portfolio';
                if(empty($get_id)) {
                    $msg['success'] = 'Berhasil Menambahkan Portfolio';
                }
		        
            } else {
                $msg['fail'] = 'Portfolio Tidak Tersimpan';
            } 
            $this->session->set_flashdata('alert', $msg);
            redirect($this->uri->segment(1).'/nicepage-portfolio');

        }  elseif(isset($_POST['id_delete'])) {        

            /**
             * proses delete
             */

            $id =  $this->db->escape_str( $this->input->post('id_delete') );
            $msg = array();
            if( $this->delete_data($id)) {
                $msg['success'] = 'Berhasil Hapus Portfolio'; 
            } else {
                $msg['fail'] = 'Portfolio Tidak Terhapus';
            }
            $this->session->set_flashdata('alert', $msg);
            redirect($this->uri->segment(1).'/nicepage-portfolio');

        } else {
            $this->view_index(); 
        }
    }

    protected function view_index(){         
        $data['get_portfolio']  = $this->model_app->view_ordering('tbl_nicepage_portfolio','nama_project','ASC') ; 
        $this->template->load('administrator/template','administrator/mod_nicepage_portfolio/view_index',$data);
    } 

    /**
     * save_data
     * method ini digunakan untnuk menyimpan portfolio
     * ke table
     */
    protected function save_data($id='',$data = array()) {

        // get data
        $get_data  = $this->model_app->view_where('tbl_nicepage_portfolio',array('id_portfolio' => $id ))->row_array(); 

        if( !empty($data) && is_array($data)) { 
            if(!empty($get_data) && $get_data['id_portfolio'] == $id ){  
                // jika beda /ganti maka hapus yang lama
                if(isset($data['image'])) {
                    if( !empty($data['image']) && ($get_data['image'] != $data['image'])) {
                        $this->hapus_image($get_data['image']); 
                    }
                }

                return $this->model_app->update(
                        'tbl_nicepage_portfolio', 
                        $data,
                        array(
                            'id_portfolio' => $id
                        )
                    ); 

            } else { 
                return $this->model_app->insert('tbl_nicepage_portfolio', $data);
            }
        } else {
            return null;
        }
    }  
    
    /**
     * delete_data
     * method ini digunakan untnuk hapus portfolio
     * ke table
     */
    protected function delete_data($id) { 
        // get data
        $get_data  = $this->model_app->view_where('tbl_nicepage_portfolio',array('id_portfolio' => $id ))->row_array();  
        if( !empty($get_data) ) {  

            if(!empty($get_data['image'])) {
                $this->hapus_image($get_data['image']);
            }

            return $this->model_app->delete(
                'tbl_nicepage_portfolio',
                array(
                    'id_portfolio' => $id
                )
            );  
        } else {
            return null;
        }
    } 

    /**
     * upload_image
     * untuk upload image
     */
    protected function upload_image($param){

        // config
        $config['upload_path'] = 'asset/img_nicepage/portfolio/';
        $config['allowed_types'] = 'jpg|png|JPG';
        $config['max_size'] = '3084'; //kilobyte

        $this->load->library('upload', $config);
        $this->upload->do_upload( $param );

        return $this->upload->data(); 
    }

    /**
     * hapus image
     */
    protected function hapus_image($nama_image = '') {
        // jika ada image hapus
        $image_file = FCPATH .'asset/img_nicepage/portfolio/'.$nama_image; 
        if( !empty($nama_image) && file_exists($image_file)) {
            @unlink($image_file);
        }
    }
}
?>