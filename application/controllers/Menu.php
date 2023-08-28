<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
            redirect('menu');
        }
    }


    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
            redirect('menu/submenu');
        }
    }

    public function submenuedit($id)
    {
        $title = html_escape($this->input->post('titleedit', true));
        $url = html_escape($this->input->post('urledit', true));
        $icon = html_escape($this->input->post('iconedit', true));
        $menu_id = $this->input->post('menu_idedit', true);

        $data = array(
            'menu_id' => $menu_id,
            'title' => $title,
            'url' => $url,
            'icon' => $icon
        );

        $this->db->update('user_sub_menu', $data, array('id' => $id));

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu has changed!</div>');
        redirect('menu/submenu');
    }

    public function submenudelete($id)
    {
        $this->db->delete('user_sub_menu', array('id' => $id));

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu was deleted!</div>');
        redirect('menu/submenu');
    }

    public function menuedit($id)
    {
        $menuname = html_escape($this->input->post('menunameedit', true));

        $this->db->update('user_menu', array('menu' => $menuname), array('id' => $id));

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu name has changed!</div>');
        redirect('menu');
    }

    public function menudelete($id)
    {
        $this->db->delete('user_menu', array('id' => $id));

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu was deleted!</div>');
        redirect('menu');
    }
}
