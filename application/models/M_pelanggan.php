<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pelanggan extends CI_Model {
 
public function duatable() {
 $this->db->select('*');
 $this->db->from('tb_user');
 $this->db->join('tb_alamat','tb_alamat.id_alamat=tb_user.id_user');
 $query = $this->db->get();
 return $query->result();
}

  /** Fungsi DELETE */
  
  function hapus_data($where,$table){
    $this->db->where($where);
    $this->db->delete($table);
  }
  
  function delete_user($id)
{
            if ( ! $this->db->delete('tb_alamat', array('id_alamat' => $id)))
            {
                            return $this->db->error();
            }
    return FALSE;
}
}