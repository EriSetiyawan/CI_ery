<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class category extends CI_controller{
        public function __construct()
    {
        parent::__construct();

        // Load custom helper applications/helpers/MY_helper.php
       // $this->load->helper('MY');

        // Load semua model yang kita pakai
        $this->load->model('blog_model');
        $this->load->model('category_model');
    }

    public function create()
    {
        // Judul Halaman
        $data['page_title'] = 'Buat Kategori';
        $this->load->helper('form');
        $this->load->library('form_validation');
        // Form validasi untuk Nama Kategori
        $this->form_validation->set_rules(
            'cat_name',
            'Nama Kategori',
            'required|is_unique[categories.cat_name]',
            array(
                'required' => 'Isi %s donk, males amat.',
                'is_unique' => 'Judul ' . $this->input->post('title') . ' sudah ada bosque.'
            )
        );
         if($this->form_validation->run() === FALSE){
           
            $this->load->view('cat_create', $data);
        
        } 
        else {
            $this->category_model->create_category();
            redirect('category');
        }
    }
        public function index()
    {
        $data['cat_read'] = $this->category_model->read_category();
        $this->load->view('cat_read',$data);
    }
        public function update($id)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        // Form validasi untuk Nama Kategori
        $this->form_validation->set_rules(
            'cat_name',
            'Nama Kategori',
            'required|is_unique[categories.cat_name]',
            array(
                'required' => 'maaf %s belum anda isi.',
                'is_unique' => 'Judul <strong>' . $this->input->post('cat_name') . '</strong> sudah ada bosque.'
            )
        );
        $data['cat_update'] = $this->category_model->read_category($id)[0];
        if($this->form_validation->run() === FALSE){
    
            $this->load->view('cat_update', $data);
        
        } 
        else {
            $this->category_model->update_category($id);
            redirect('category');
        }
    }
    public function delete($id)
    {
        $this->category_model->delete_category($id);
        redirect('category');
    }
    public function create_category()
   {
       $data = array(
           'cat_name'          => $this->input->post('cat_name'),
           'cat_description'   => $this->input->post('cat_description')
       );

       return $this->db->insert('categories', $data);
   }
}
