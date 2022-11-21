<?php

require_once("home.php"); // loading home controller

class page_editor extends Home
{
    public $user_id;

    /**
     * load constructor
     * @access public
     * @return void
     */

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('logged_in') != 1)
            redirect('home/login_page', 'location');

        $this->load->helper('form');
        $this->load->library('upload');
        $this->load->library('google');
        $this->load->library('Web_common_report');
        $this->load->model('page');
        $this->upload_path = realpath(APPPATH . '../upload');
        $this->user_id=$this->session->userdata('user_id');
        set_time_limit(0);




        if($this->session->userdata('user_type') != 'Admin' && !in_array(26,$this->module_access))
            redirect('home/login_page', 'location');
    }

    public function index()
    {
        $pages = $this->page->all();
        $data['pages'] = $pages;
        $data['page_title'] = $this->lang->line('page creator');
        $data['body'] = 'page_editor/index';
        $this->_viewcontroller($data);
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['body'] = 'page_editor/create';
        $this->_viewcontroller($data);
    }

    public function show($slug) {
        $page = $this->page->find($slug);
        $data['page'] = $page[0];

        // if ($data['page']->is_redirect) redirect("http://${$data['page']->redirect_link}", 'refresh');
        if ($data['page']->is_redirect) header('location: http://' . $data['page']->redirect_link);;
        $data['body'] = 'page_editor/show';
        $this->_viewcontroller($data);
    }

    public function store() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('is_published', 'Published', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('page_editor/create');
        } else {
            if (isset($_POST['is_redirect'])) $is_redirect = $_POST['is_redirect']; else $is_redirect = 0;

            if (isset($_POST['redirect_link'])) $redirect_link = $_POST['redirect_link']; else $redirect_link = '';

            if ($this->page->find($this->createSlug($_POST['title']))) $slug = $this->createSlug($_POST['title']) . '1'; else $slug = $this->createSlug($_POST['title']);

            $data = [
                'title'           =>  $_POST['title'],
                'slug'            =>  $slug,
                'content'         =>  $_POST['content'],
                'is_published'    =>  $_POST['is_published'],
                'is_redirect'     => $is_redirect,
                'redirect_link'   =>  $redirect_link
            ];
            $this->page->insert($data);
            $data['body'] = 'page_editor/index';
            redirect('/page-creator', 'refresh');
        }
    }

    public function edit($slug) {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $page = $this->page->find($slug);
        //404 if not found;
        $data['page'] = $page[0];
        $data['body'] = 'page_editor/edit';
        $this->_viewcontroller($data);
    }

    public function update($slug) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $page = $this->page->find($slug);
        $page = $page[0];

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('is_published', 'Published', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('page_editor/edit');
        } else {
            if (isset($_POST['is_redirect'])) $is_redirect = $_POST['is_redirect']; else $is_redirect = 0;

            if (isset($_POST['redirect_link'])) $redirect_link = $_POST['redirect_link']; else $redirect_link = '';

            $data = [
                'title'           =>  $_POST['title'],
                'slug'            =>  $page->slug,
                'content'         =>  $_POST['content'],
                'is_published'    =>  $_POST['is_published'],
                'is_redirect'     => $is_redirect,
                'redirect_link'   =>  $redirect_link
            ];
            $this->page->update($data, $page->id);
            redirect('/page-creator', 'refresh');
        }
    }

    public function destroy($slug) {
        $page = $this->page->find($slug);
        $page = $page[0];

        $this->page->destroy($page->id);
        redirect('/page-creator', 'refresh');
    }

    private function createSlug($str, $delimiter = '-'){

        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;

    }
}