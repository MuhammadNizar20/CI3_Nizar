<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarModel extends CI_Model {
    public function simpan()
    {
        $data = $this->input->post();
        if(!empty ($data)){
            return $this->db->insert ('daftar', $data);
        }
    }

    public function Edit($id)
    {
        $data = $this->input->post();
        if(!empty ($data)){
            return $this->db->update('daftar', $data,['id'=>$id]);
        }
    }

    public function getDaftar()
    {
        $username = $this->input->get('username');
        if(!empty ($username)){
            return $this->db->query('SELECT * FROM daftar WHERE username LIKE ?','%'.$username.'%')->result_array();
        }else{
            return $this->db->get('daftar')->result_array();
        }
    }
    public function getData($id)
    {
        return $this->db->get_where('daftar',['id'=>$id])->row_array();
    }
    public function delete($id){
        return $this->db->delete('daftar',['id'=>$id]);
    }
}