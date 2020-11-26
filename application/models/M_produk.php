<?php
Class M_produk extends CI_Model{

    public function show_produk()
    {
        $data=$this->db->get('tb_produk');
        return $data;
    }

    public function add()
    {
        $data=[
            
            'nama_produk' => $this->input->post('nama_produk'),
            'harga_produk'  => $this->input->post('harga_produk'),
            'diskon_produk'      => $this->input->post('diskon_produk'),
            'desk_produk'      => $this->input->post('desk_produk'),
            'gambar_produk'      => $this->input->post('gambar_produk'),
            'kategori_produk'  => $this->input->post('kategori_produk')
         ];
         $this->db->insert('tb_produk',$data);
    }
    public function edit($id)
    {
        $data=$this->db->get_where('tb_produk',array('kd_produk'=>$id));
        return $data;
    }

    public function update()
    {
        $data=[
            
            'nama_produk' => $this->input->post('nama_produk'),
            'harga_produk'  => $this->input->post('harga_produk'),
            'diskon_produk'      => $this->input->post('diskon_produk'),
            'desk_produk'      => $this->input->post('desk_produk'),
            'gambar_produk'      => $this->input->post('gambar_produk'),
            'kategori_produk'  => $this->input->post('kategori_produk')
         ];
         $kd_produk=$this->input->post('kd_produk');
         $this->db->where('kd_produk',$kd_produk);
         $this->db->update('tb_produk',$data);

    }

}
?>