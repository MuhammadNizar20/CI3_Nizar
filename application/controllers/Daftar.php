<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {
    public function __construct ()
    {
        parent::__construct();
        $this->load->model('DaftarModel');
    }
	public function index()
	{
        $data = $this->DaftarModel->getDaftar();
		$this->load->view ('daftar/index',['data'=>$data]);
	}

    public function error()
    {
        $this->load->view('daftar/tambah');
    }
    public function tambah()
    {
        $this->load->view('daftar/tambah');
    }
    public function action_tambah()
    {
        if($this->DaftarModel->simpan()){
            redirect (base_url('index.php/daftar/tambah'));
        }else{
            redirect (base_url('index.php/daftar/error'));
        }
    }

    public function edit($id)
    {
        $data = $this->DaftarModel->getData($id);
        $this->load->view('daftar/edit',['data'=>$data]);
    }
    public function action_edit($id)
    {
        if($this->DaftarModel->edit($id)){
            redirect (base_url('index.php/daftar/edit/',$id));
        }else{
            redirect (base_url('index.php/daftar/error'));
        }
    }
    public function delete($id)
    {
        if($this->DaftarModel->delete($id)){
            redirect(base_url('index.php/daftar/'));
        }
    }
}
