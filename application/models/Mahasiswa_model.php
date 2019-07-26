<?php 

class Mahasiswa_model extends CI_model{
	public function getAllmahasiswa(){
		return $this->db->get('mahasiswa')->result_array(); // result = untuk mengambil banyak data dlm bentuk elemen array (select * from mahasiswa)->urai;kan dengan array
	}

	public function tambahDataMahasiswa(){
		  $data = [
		  	//"nama" => $_POST['nama'] penulisan biasa tanpa security xsql insection
		  	"nama" => $this->input->post('nama',true),
		  	"nim" => $this->input->post('nim',true),
		  	"email" => $this->input->post('email',true),
		  	"jurusan" => $this->input->post('jurusan',true)

		  ];

		  $this->db->insert('mahasiswa', $data);
	}

	public function hapusDataMahasiswa($id){
		// $this->db->where('id',$id);
		// $this->db->delete('mahasiswa'); //cara ribet
		//return $this->db->where('id',$id)->delete('mahasiswa');  //cara lama
		$this->db->delete('mahasiswa',['id'=>$id]);  //cara lama


	}

	public function getMahasiswaById($id){
		return $this->db->get_where('mahasiswa', array('id' => $id))->row_array(); //row_array() = untuk mengambil hanya 1 baris  dlm bentuk array , row()= untuk mengambil dalam bntuk objex
	}

	public function ubahDataMahasiswa(){
		  $data = [
		  	//"nama" => $_POST['nama'] penulisan biasa tanpa security xsql insection
		  	"nama" => $this->input->post('nama',true), //mengambil nama dari database
		  	"nim" => $this->input->post('nim',true),
		  	"email" => $this->input->post('email',true),
		  	"jurusan" => $this->input->post('jurusan',true)

		  ];

		  $this->db->where('id', $this->input->post('id')); //mengambil id untuk seleksi
		  $this->db->update('mahasiswa', $data);
	}

	public function cariDataMahasiswa(){
		$keyword =$this->input->post('keyword',true);
		$this->db->like('nama',$keyword);
		$this->db->or_like('jurusan',$keyword);
		$this->db->or_like('nim',$keyword);
		$this->db->or_like('email',$keyword);
		return 	$this->db->get('mahasiswa')->result_array();
	}
}