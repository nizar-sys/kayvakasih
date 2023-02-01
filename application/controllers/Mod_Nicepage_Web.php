<?php  defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Mod_Nicepage_Web
 * web 
 * 
 * controller ini untuk menampilkan informasi ke public
 * 
 * module public
 * 
 * @package nicepage
 * @author noor hadi (no3r_hadi@yahoo.com)
 * @license http://opensource.org/licenses/MIT  MIT License
 * 
 * @copyright 2020
 */

class Mod_Nicepage_Web extends CI_Controller {

    protected function meta_description($title = '') { 

		$meta['title'] = $title;
		$meta['description'] = description();
        $meta['keywords'] = keywords();
        return $meta;
    }
	
	public function teams($page= 0){

		$config['total_rows'] = $this->model_utama->view('tbl_nicepage_team')->num_rows();
		$config['base_url'] = base_url().'teams';
		$config['per_page'] = 16; 
		
		$data['get_teams'] = $this->model_utama->view_ordering_limit(
			'tbl_nicepage_team',
			'nama',
			'ACS',
			$page,
			$config['per_page']
		);

        // meta
        $meta = $this->meta_description("Semua Team");
        $data = array_merge($data,$meta);

		// pagination
		$this->pagination->initialize($config);
		$this->template->load(template().'/template',template().'/teams',$data);

    }
    
    public function portfolio($page= 0){

		$config['total_rows'] = $this->model_utama->view('tbl_nicepage_portfolio')->num_rows();
		$config['base_url'] = base_url().'portfolio';
		$config['per_page'] = 12; 
		
		$data['get_portfolio'] = $this->model_utama->view_ordering_limit(
			'tbl_nicepage_portfolio',
			'nama_project',
			'ACS',
			$page,
			$config['per_page']
		);

        // meta
        $meta = $this->meta_description("Portfolio");
        $data = array_merge($data,$meta);
        
		// pagination
		$this->pagination->initialize($config);
		$this->template->load(template().'/template',template().'/portfolio',$data);

	}

    
    public function pengumuman($page= 0){

		$config['total_rows'] = $this->model_utama->view('tbl_nicepage_pengumuman')->num_rows();
		$config['base_url'] = base_url().'pengumuman';
		$config['per_page'] = 12; 

		$data['get_pengumuman'] = $this->model_utama->view_join(
			'tbl_nicepage_pengumuman',
			'users',
			'username', 
			'tanggal',
			'DESC',
			$page,
			$config['per_page']
		);  
        // meta
        $meta = $this->meta_description("Pengumuman");
        $data = array_merge($data,$meta);
        
		// pagination
		$this->pagination->initialize($config);
		$this->template->load(template().'/template',template().'/pengumuman',$data);

	}

    
    public function pengumuman_detail($judul_seo){


		$result = $this->model_utama->view_join_one(
			'tbl_nicepage_pengumuman',
			'users',
			'username',
			array('judul_seo' => $judul_seo ),
			'id_pengumuman','DESC',0,1
		)->row_array(); 

		if(!empty($result)) {
			$this->load->helper('text');
			$data['title'] = cetak($result['judul']); 
			$data['description'] = word_limiter(strip_tags($result['deskripsi']),20,'...'); 
			$data['keywords'] = cetak(str_replace(' ',', ',$result['judul']));
			$data['pengumuman'] = $result;

			$dibaca = array('dibaca'=>$result['dibaca']+1);
			$where = array('id_pengumuman' => $result['id_pengumuman']);
			$this->model_utama->update('tbl_nicepage_pengumuman', $dibaca, $where);
			$this->template->load(template().'/template',template().'/pengumuman_detail',$data);
		} else { 
			redirect('main');
		}

	}

	/**
	 * contact untuk 
	 * font page
	 */
	public function contact(){

		if (isset($_POST['kirim'])){
    
			if ( !empty($this->input->post('security_code')) && 
				(strtolower($this->input->post('security_code')) == strtolower(  $this->session->userdata('captcha_contact') ))
				) {

				$data = array(
					'nama' => cetak($this->input->post('nama',TRUE)),
					'email' => cetak($this->input->post('email',TRUE)),
					'subjek' => $_SERVER['REMOTE_ADDR'],
					'pesan' => cetak($this->input->post('pesan',TRUE)),
					'tanggal' => date('Y-m-d'),
					'jam' => date('H:i:s')
				);

				$this->model_utama->insert('hubungi',$data);

				$msg['success'] = 'Terimakasih Telah Menghubungi Kami.';
				$this->session->set_flashdata('contact_message', $msg);

			}else{

				$msg['warning'] = 'Kode keamanan yang anda masukkan salah!';
				$this->session->set_flashdata('contact_message', $msg);

			} 
			
			redirect('#section_contact');
		} 

	}

	

	public function komentar_berita() {

		if (isset($_POST['submit'])) {

			$cek = $this->model_utama->view_where('berita',array('id_berita' => $this->input->post('berita')));
			$row = $cek->row_array();

			if ($cek->num_rows()<=0){

				redirect('main');

			}else{
				
				if ( !empty($this->input->post('security_code')) && 
					(strtolower($this->input->post('security_code')) == strtolower($this->session->userdata('mycaptcha')))) {

					$data = array(
						'id_berita'	=>	cetak($this->input->post('berita',TRUE)),
		                'nama_komentar'	=>	cetak($this->input->post('nama',TRUE)),
		                'url'	=>	cetak($this->input->post('url_website',TRUE)),
		                'email'	=>	cetak($this->input->post('email',TRUE)),
		                'isi_komentar'	=>	cetak($this->input->post('komentar',TRUE)),
		                'tgl' => date('Y-m-d'),
		                'jam_komentar' => date('H:i:s'),
		                'aktif' => 'N' 
					);

					$this->model_utama->insert('komentar',$data);

					$msg['success'] = 'Terimakasih atas komentar Anda. Komentar akan tampil setelah kami setujui!.';
					$this->session->set_flashdata('komentar_message', $msg); 
				}else{
					$msg['warning'] = 'Kode keamanan yang Anda masukkan salah!';
					$this->session->set_flashdata('komentar_message', $msg); 
				}
			}
			redirect('berita/detail/'.$row['judul_seo'].'#writecomment');
		}
	}
	

	public function komentar_video() {
	
			if (isset($_POST['submit'])) {

				$cek = $this->model_utama->view_where('video',array('id_video' => $this->input->post('video')));
				$row = $cek->row_array();
				if ($cek->num_rows()<=0) {

					redirect('main');

				} else {
					
					if ( !empty($this->input->post('security_code')) && 
						(strtolower($this->input->post('security_code')) == strtolower($this->session->userdata('mycaptcha')))) {
							
						$data = array(
							'id_video'	=>	cetak($this->input->post('video',TRUE)),
							'nama_komentar'	=>	cetak($this->input->post('nama',TRUE)), 
							'url'	=>	cetak($this->input->post('email',TRUE)),
							'isi_komentar'	=>	cetak($this->input->post('komentar',TRUE)),
							'tgl' => date('Y-m-d'),
							'jam_komentar' => date('H:i:s'),
							'aktif' => 'N' 
						);
	
						$this->model_utama->insert('komentarvid',$data);
	
						$msg['success'] = 'Terimakasih atas komentar Anda. Komentar akan tampil setelah kami setujui!.';
						$this->session->set_flashdata('komentar_message', $msg); 
					}else{
						$msg['warning'] = 'Kode keamanan yang Anda masukkan salah!';
						$this->session->set_flashdata('komentar_message', $msg); 
					}
				}
				redirect('playlist/watch/'.$row['video_seo']. '#writecomment');
			} 
	}

}
