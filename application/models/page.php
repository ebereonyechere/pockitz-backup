<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Model {
    public $title;
    public $slug;
    public $redirect_link;
    public $is_redirect;
    public $is_published;
    public $content;

    public function __construct() {
        $this->load->database();
    }

    public function all() {
        $query = $this->db->get('custom_pages');
        return $query->result();
    }

    public function find($slug) {
        $this->db->where('slug', $slug);
        $query = $this->db->get('custom_pages');
        return $query->result();
    }

    public function published() {
        $this->db->where('is_published', 1);
        $query = $this->db->get('custom_pages');
        return $query->result();
    }

    public function insert($data) {
        $this->title = $data['title'];
        $this->slug = $data['slug'];
        $this->redirect_link = $data['redirect_link'];
        $this->is_redirect = $data['is_redirect'];
        $this->is_published = $data['is_published'];
        $this->content = $data['content'];

        $this->db->insert('custom_pages', $this);
    }

    public function update($data, $id) {
        $this->title = $data['title'];
        $this->slug = $data['slug'];
        $this->redirect_link = $data['redirect_link'];
        $this->is_redirect = $data['is_redirect'];
        $this->is_published = $data['is_published'];
        $this->content = $data['content'];

        $this->db->where('id', $id);
        $this->db->update('custom_pages', $this);
    }

    public function destroy($id) {
        $this->db->where('id', $id);
        $this->db->delete('custom_pages');
    }
}