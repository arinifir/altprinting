<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_produk extends CI_Model
{
    private $_table = "tb_produk";

    public $kd_produk;
    public $nama_produk;
    public $harga_produk;
    public $diskon_produk;
    public $desk_produk;
    public $gambar_produk = "default.jpg";
    public $kategori_produk;

    public function rules()
    {
        return [
            [
                'field' => 'nama_produk',
                'label' => 'Name',
                'rules' => 'required'
            ],

            [
                'field' => 'harga_produk',
                'label' => 'Harga',
                'rules' => 'numeric'
            ],

            [
                'field' => 'disk_produk',
                'label' => 'Diskon',
                'rules' => 'numeric'
            ],

            [
                'field' => 'desk_produk',
                'label' => 'Deskripsi',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kd_produk" => $id])->row();
    }

    public function getByFilter($min = null, $max = null, $ktg = null)
    {
        if ($ktg != null) {
            $this->db->where('kategori_produk', $ktg);
        }
        if ($min != null && $max != null) {
            $this->db->where("harga_produk BETWEEN $min AND $max");
            // $this->db->where("harga_produk <='$max'");
        }
        return $this->db->get('tb_produk');
    }

    public function save()
    {
        $post = $this->input->post();
        $this->kd_produk = uniqid();
        $this->nama_produk = $post["nama_produk"];
        $this->harga_produk = $post["harga_produk"];
        $this->desk_produk = $post["desk_produk"];
        $this->diskon_produk = $post["diskon_produk"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->product_id = $post["id"];
        $this->name = $post["name"];
        $this->price = $post["price"];
        if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
        }
        $this->description = $post["description"];
        return $this->db->update($this->_table, $this, array('product_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("product_id" => $id));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/product/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->product_id;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    public function getProduk($kode)
    {
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->join('tb_kategori', 'tb_produk.kategori_produk = tb_kategori.kd_kategori');
        $this->db->where('kd_produk = '.$kode);
        return $this->db->get()->row();
    }
}
