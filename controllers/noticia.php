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
                    redirect('noticia/editar/'.$id,'refresh');
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
            //id informado, continuar com edição
            if($noticia = $this->noticia->get_single($id)):
                $dados['noticia'] = $noticia;
                $dados_update['id'] = $noticia->id;
            else:
                set_msg('<p>Notícia inexistente! Escolha uma notícia para editar.</p>');
                redirect('noticia/listar','refresh');
            endif;    
        else:
            set_msg('<p>Você deve escolher uma notícia para editar!</p>');
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
    
    public function editar(){
        //verifica se o usuário está logado
        verifica_login();

        //verifica se foi passado o id da notícia
        $id = $this->uri->segment(3);
        if($id > 0):
            //id informado, continuar com edição
            if($noticia = $this->noticia->get_single($id)):
                $dados['noticia'] = $noticia;
                $dados_update['id'] = $noticia->id;
            else:
                set_msg('<p>Notícia inexistente! Escolha uma notícia para excluir.</p>');
                redirect('noticia/listar','refresh');
            endif;    
        else:
            set_msg('<p>Você deve escolher uma notícia para excluir!</p>');
            redirect('noticia/listar','refresh');
        endif;

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
            if(isset($_FILES['imagem']) && $_FILES['imagem']['name'] != ''):
                //foi enviada uma imagem, devo fazer o upload
                if($this->upload->do_upload('imagem')):
                    //upload foi efetuada
                    $imagem_antiga = 'uploads/'.$noticia->imagem;
                    $dados_upload = $this->upload->data();
                    $dados_form = $this->input->post();
                    $dados_update['titulo'] = to_bd($dados_form['titulo']);
                    $dados_update['conteudo'] = to_bd($dados_form['conteudo']);
                    $dados_update['imagem'] = $dados_upload['file_name'];
                    if($this->noticia->salvar($dados_update)):
                        unlink($imagem_antiga);
                        set_msg('<p>Notícia alterada com sucesso!</p>');
                        $dados['noticia']->imagem = $dados_update['imagem'];
                    else:
                        set_msg('<p>Erro! nenhuma alteração foi salva.</p>');
                    endif;
                else:
                    //erro no upload
                    $msg = $this->upload->display_errors();
                    $msg .= '<p>São permitidos arquivos JPG e PNG de até 512KB.</p>';
                    set_msg($msg);
                endif;
            else:
                //não foi enviada uma imagem pelo form
                $dados_form = $this->input->post();
                $dados_update['titulo'] = to_bd($dados_form['titulo']);
                $dados_update['conteudo'] = to_bd($dados_form['conteudo']);
                if($this->noticia->salvar($dados_update)):
                    set_msg('<p>Notícia alterada com sucesso!</p>');
                else:
                    set_msg('<p>Erro! nenhuma alteração foi salva.</p>');
                endif;
            endif;
        endif;

        //carrega a view
        $dados['titulo'] = 'RBernadi - Edição de notícias';
        $dados['h2'] = 'Edição de notícias';
        $dados['tela'] = 'editar';
        $this->load->view('painel/noticias', $dados);            
    }
}