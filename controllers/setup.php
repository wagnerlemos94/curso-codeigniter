<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('option_model', 'option');
    }

    public function index(){
        if($this->option->get_option('setup_executado') == 1):
            //setup ok, mostrar tela para editar dados de setup
            redirect('setup/alterar', 'refresh');
        else:
            //não instalado, mostrar tela de setup
            redirect('setup/instalar', 'refresh');
        endif;
    }

    public function instalar(){
        if($this->option->get_option('setup_executado') == 1):
            //setup ok, mostrar tela para editar dados de setup
            redirect('setup/alterar', 'refresh');
        endif;

        //carregar a view
        $dados['titulo'] = 'RBernardi - setup do sistema';
        $dados['h2'] = 'Setup do sistema';
        $this->load->view('painel/setup', $dados);
    }
}