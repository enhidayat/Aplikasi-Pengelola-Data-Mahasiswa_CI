<?php 



 	class Mahasiswa extends CI_Controller
	{
		// public function __construct(){
		// 	parent::__construct();
		// 	$this->load->database(); 
		// } untuk satufile load db
		
		public function __construct(){
			//untuk satufile load model
			parent::__construct();
			//$this->load->model('Mahasiswa_model');
			//$this->load->helper('url');
			$this->load->library('form_validation');

			
		} 
		public function  index()
		{
			$data['judul'] = 'Daftar Mahasiswa';
			$data['mahasiswa'] = $this->Mahasiswa_model->getAllmahasiswa();
			if ($this->input->post('keyword')) {
				$data['mahasiswa'] = $this->Mahasiswa_model->cariDataMahasiswa();
			}
			$this->load->view('templates/header',$data);
			$this->load->view('mahasiswa/index',$data);
			$this->load->view('templates/footer');
		}

		public function tambah(){
			$data['judul'] = 'Form Tambah Data Mahasiswa';

			$this->form_validation->set_rules('nama','Nama','required');
			$this->form_validation->set_rules('nim','NIM','required|numeric|min_length[8] ');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			if($this->form_validation->run() ==FALSE){
				 $this->load->view('templates/header',$data);
				 $this->load->view('mahasiswa/tambah');
				 $this->load->view('templates/footer');

			}else{
				$this->Mahasiswa_model->tambahDataMahasiswa();
				$this->session->set_flashdata('flash','ditambahkan'); // memanggil modul session setelah di aktifkan do autoloading (nama session , isinya )
				redirect('mahasiswa');
			}
		}
		
		public function hapus($id){
			$this->Mahasiswa_model->hapusDataMahasiswa($id);
			$this->session->set_flashdata('flash','Dihapus');
			redirect('mahasiswa');
		}

		public function detail($id){

			$data ['judul'] = 'Detail Data Mahasiswa';
			$data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
			$this->load->view('templates/header',$data);
			$this->load->view('mahasiswa/detail');
			$this->load->view('templates/footer');

			
		}

		public function ubah($id){
			$data['judul'] = 'Form Ubah Data Mahasiswa';
			$data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
			// $data['jurusan'] = $this->Jurusan_model->getAllmahasiswa(); //Harusnya pakai table untuk jurusan
			$data['jurusan'] = ['Teknik Informatika', 'Teknik Industri' ,'Management Informatika' ,'Desain Komunikasi Visual', 'FIKIH' ,'Ekonomi Syariah', 'Teknik Arsitektur'];

			$this->form_validation->set_rules('nama','Nama','required');
			$this->form_validation->set_rules('nim','NIM','required|numeric|min_length[8] ');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			if($this->form_validation->run() ==FALSE){
				 $this->load->view('templates/header',$data);
				 $this->load->view('mahasiswa/ubah',$data);
				 $this->load->view('templates/footer');

			}else{
				$this->Mahasiswa_model->ubahDataMahasiswa();
				$this->session->set_flashdata('flash','diubah'); // memanggil modul session setelah di aktifkan do autoloading (nama session , isinya )
				redirect('mahasiswa');
			}
		}
	}