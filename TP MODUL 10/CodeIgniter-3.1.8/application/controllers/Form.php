<?php 
	
	class Form extends CI_Controller {
		public function index(){
			 $this->load->helper(array('form', 'url'));

			 $this->load->library('form_validation');

			 $this->form_validation->set_rules('nim', 'NIM', 'required|exact_length[10]|callback_nim_check',
			 	 array('required' => 'Please fill out this field',
			 		   'exact_length' => 'Please match the requested format')
			);

			 $this->form_validation->set_rules('nama', 'Nama', 'required',
			 	 array('required' => 'Please fill out this field')
			);

			 if($this->form_validation->run() == FALSE)
			 {
			 	$data['msg'] ='';
			 	$this->load->view('myform', $data);
			 }else{
			 	$data['msg'] = 'Register berhasil.';
			 	$this->load->view('myform', $data);
			 }


		}

		public function nim_check($nim)
		{
			$query = $this->db->get_where('mahasiswa_1301164045', array('nim' => $nim));
			if($query->row() == NULL)
			{
				return true;
			}else{

			$this->form_validation->set_message('nim_check', 'NIM yang dimasukkan sudah terdaftar');
			return false;}
		}

		public function insert_mahasiswa()
		{
			$this->load->library('form_validation');

			$nim = $this->input->post('nim');
			$nama = $this->input->post('nama');
			$mhs = array(
				'nim' => $nim,
				'nama' => $nama);
			
			$this->db->insert('mahasiswa_1301164045',$mhs);
		    $message = array('msg' => 'Register berhasil.');
		    
			if($this->form_validation->run() == FALSE)
			 {
			 	$data['msg'] ='';
			 	$this->load->view('myform', $message);
			 }else{
			 	$data['msg'] = 'Register berhasil.';
			 	
			 	$this->load->view('myform', $message);
			 }
		}
	}
?>