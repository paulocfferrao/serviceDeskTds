<?php

  class Emprestimo extends MY_Controller{

      public function __construct(){
          parent::__construct();

          //validação de está logado foi passado para a classe MY_controller
          // if(empty($this->session->userdata['logado'])){
          //     redirect('login');
          // }

          $this->load->model('emprestimo_model');
          //ATENÇÃO
          // $this->load->helper('url'); //colocado no config/autoload
      }

      public function index(){
          $dados['titulo']= "Manutenção de Empréstimo";
          $dados['lista'] = $this->emprestimo_model->get();

          $this->template->load('template', 'emprestimo/viewEmprestimo', $dados);
      }

      public function remover($id){
          if(!$this->emprestimo_model->remover($id)){
              $this->session->set_userdata('mensagem', 'erro');
          }else{
              $this->session->set_userdata('mensagem', 'sucesso');
          }
          redirect('emprestimo'); //redireciona o fluxo da aplicação
      }

      public function cadastrar($id=null){
          $this->load->helper('form');
          $this->load->library('form_validation');

          //variaveis enviadas para a View
          $dados['titulo'] = "Manutenção de Empréstimos";

          // echo $rule_nome;
          $this->form_validation->set_rules('idobjeto', 'Objeto', 'required');
          $this->form_validation->set_rules('idpessoa', 'Pessoa', 'required');
          $this->form_validation->set_rules('data_emprestimo', 'Data', 'required');

          //acao dinamica que sera enviada para a view
          $dados['acao'] = "emprestimo/cadastrar/";

          $dados['registro'] = null; //Iniciar como null
          if($id!==null){
              $dados['acao']    .= $id; //concatenando o id
              $dados['registro'] = $this->emprestimo_model->get($id);
          }

          $this->load->model('objeto_model');
          $dados['listaObjetos'] = $this->objeto_model->getLivres();

          $this->load->model('pessoa_model');
          $dados['listaPessoas'] = $this->pessoa_model->get();

          //veririca se o form foi submetido e não houve erros de validação
          if($this->form_validation->run()===false){

              $this->template->load('template', 'emprestimo/formEmprestimo', $dados);
          }else{ //neste caso, form submetido e ok!
              // $registro = $this->input->post();
              // print_r($registro);
              if(!$this->emprestimo_model->cadastrar($id)){
                  $this->session->set_userdata('mensagem', 'erro');
              }else{
                  $this->session->set_userdata('mensagem', 'sucesso');
              }
              redirect('emprestimo'); //redireciona o fluxo da aplicação
          }
      }

      public function devolver($id) {
          if(!$this->emprestimo_model->lancarDevolucao($id)){
              $this->session->set_userdata('mensagem', 'erro');
          }else{
              $this->session->set_userdata('mensagem', 'sucesso');
          }
          redirect('emprestimo'); //redireciona o fluxo da aplicação
      }
  }
 ?>
