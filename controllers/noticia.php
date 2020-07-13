<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticia extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('option_model', 'option');
        $this->load->model('noticia_model', 'noticia');
    }

    public function index(){
        redirect('noticia/listar', 'refresh');
    }

    public function listar(){
        //verifica se o usuário está logado
        verifica_login();

        //carrega a view
        $dados['titulo'] = 'RBernadi - Listagem de notícias';
        $dados['h2'] = 'Listagem de notícias';
        $dados['tela'] = 'listar';
        $dados['noticias'] = $this->noticia->get();
        $this->load->view('painel/noticias', $dados);
    } 
   
    public function cadastrar(){
        //verifica se o usuário está logado
        verifica_login();
        //regas de validação
        $this->form_validation->set_rules('titulo', 'TITULO', 'trim|required');
        $this->form_validation->set_rules('conteudo', 'CONTEUDO', 'trim|required');
        
        //verifica a validação
        if($this->form_validation->run() == FALSE):
            if(validation_errors()):
                set_msg(validation_errors());
            endif;
        else:
            $this->load->library('upload', config_upload());
            if($this->upload->do_upload('imagem')):
                //upload foi efetuado
                $dados_upload = $this->upload->data();
                $dados_form = $this->input->post();
                $dados_insert['titulo'] = to_bd($dados_form['titulo']);
                $dados_insert['conteudo'] = to_bd($dados_form['conteudo']);
                $dados_insert['imagem'] = $dados_upload['file_name'];
                //salvar no banco de dados
                if($id = $this->noticia->salvar($dados_insert)):
                    set_msg('<p>Notícia cadastrada com sucesso!</p>');
                    redirect('noticia/listar','refresh');
                else:
                    set_msg('<p>Erro! Notícia não sucesso!</p>');
                endif;
            else:
                //erro no upload
                $msg = $this->upload->display_errors();
                $msg .= '<p>São permitidos arquivos JPG e PNG de até 512KB.</p>';
                set_msg($msg);
            endif;
        endif;
            
        //carrega a view
        $dados['titulo'] = 'RBernadi - Cadastro de notícias';
        $dados['h2'] = 'Cadastro de notícias';
        $dados['tela'] = 'cadastrar';
        $this->load->view('painel/noticias', $dados);            
    }

    public function excluir(){
        //verifica se o usuário está logado
        verifica_login();
        //verifica se foi passado o id da notícia
        $id = $this->uri->segment(3);
        if($id > 0):
            //id informado, continuar com exclusão
            if($noticia = $this->noticia->get_single($id)):
                $dados['noticia'] = $noticia;
            else:
                set_msg('<p>Notícia inexistente! Escolha uma notícia para excluir.</p>');
                redirect('noticia/listar','refresh');
            endif;    
        else:
            echo $id;exit;
            set_msg('<p>Você deve escolher uma notícia para excluir!</p>');
            redirect('noticia/listar','refresh');
        endif;

        //regra de validação
        $this->form_validation->set_rules('enviar', 'ENVIAR', 'trim|requeride');
        
        //verifica a validação
        if($this->form_validation->run() == FALSE):
            if(validation_errors()):
                set_msg(validation_errors());
            endif;
        else:
            $imagem = 'uploads/'.$noticia->imagem;
            if($this->noticia->excluir($id)):
                unlink($imagem);
                set_msg('<p>Notícia excluída om sucesso!</p>');
                redirect('noticia/listar','refresh');
            else:   
                set_msg('<p>Erro! Nenhuma notícia foi excluída.</p>');
            endif;
        endif;

        //carrega a view
        $dados['titulo'] = 'RBernadi - Exclusão de notícias';
        $dados['h2'] = 'Exclusão de notícias';
        $dados['tela'] = 'excluir';
        $this->load->view('painel/noticias', $dados);            
    }
        
}