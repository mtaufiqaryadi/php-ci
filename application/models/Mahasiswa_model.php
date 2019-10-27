<?php
class Mahasiswa_model extends CI_Model{
    public function getAllMhs(){
        $query = $this->db->get('mahasiswa');
        return $query->result_array();
    }

    public function getMhsById($id){
        $query = $this->db->get_where('mahasiswa', ['id', $id]);
        return $query->row_array();
    }

    public function cariMhs(){
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama' , $keyword);
        return $this->db->get('mahasiswa')->result_array();

    }

    public function tambahDataMhs(){
        $data = [
            "nama" => $this->input->post('inputNama', true),
            "asal" => $this->input->post('inputAsal', true)
        ];
        $this->db->insert('mahasiswa', $data);

    }

    public function hapusMhsById($id){
        $this->db->where('id', $id);
        $this->db->delete('mahasiswa');
    }

    public function ubahDataMhs(){
        $data = [
            "nama" => $this->input->post('inputNama', true),
            "asal" => $this->input->post('inputAsal', true)
        ];

        $this->db->where('id', $this->input->post('id', true));
        $this->db->update('mahasiswa', $data);
    }
}

?>