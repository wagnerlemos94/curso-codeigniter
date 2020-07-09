<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }
 
    public function index(){
        $dados['titulo'] = 'RBernardi Desenvolvimento web';
        $this->load->view('home', $dados);
    }
    
    public function clientes(){
        $dados['titulo'] = 'Clientes - RBernardi Desenvolvimento web';
        $this->load->view('clientes', $dados);
    }

    public function servicos(){
        $dados['titulo'] = 'O que eu faço - RBernardi Desenvolvimento web';
        $this->load->view('servicos', $dados);
    }

    public function sobre(){
        $dados['titulo'] = 'Sobre mim - RBernardi Desenvolvimento web';
        $this->load->view('sobre', $dados);
    }

    public function contato(){
        $this->load->helper('form');
        $this->load->library(array('form_validation', 'email'));
        //regas de validação do formulário
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('assunto', 'Asusnto', 'trim|required');
        $this->form_validation->set_rules('mensagem', 'Mensagem', 'trim|required');

        if($this->form_validation->run() == FALSE):
            $dados['formerror'] = validation_errors();
        else:
            $dados_form = $this->input->post();
            $this->email->from($dados_form['email'], $dados_form['nome']);
            $this->email->to('wagner.lemos94@hotmail.com');
            $this->email->subject($dados_form['assunto']);
            $this->email->message($dados_form['mensagem']);
            if($this->email->send()):
                $dados['formerrror'] = 'Email enviado com sucesso';
            else:
                $dados['formerrror'] = 'Erro ao enviar email, tente novamente em alguns minutos. ';
            endif;
        endif;

        $dados['titulo'] = 'Fale comigo - RBernardi Desenvolvimento web';
        $this->load->view('contato', $dados);
    }
}