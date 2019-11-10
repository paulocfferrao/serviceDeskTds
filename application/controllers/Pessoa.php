<?php
  // class Pessoa extends CI_Controller{
  class Pessoa extends MY_Controller{

      public function __construct(){
          parent::__construct();

          //validação de está logado foi passado para a classe MY_controller
          // if(empty($this->session->userdata['logado'])){
          //     redirect('login');
          // }

          $this->load->model('pessoa_model');
          //ATENÇÃO
          // $this->load->helper('url'); //colocado no config/autoload
      }

      public function index(){
          $dados['titulo']= "Manutenção de Pessoa";
          $dados['lista'] = $this->pessoa_model->get();

          // $this->load->view('template/header', $dados);
          // $this->load->view('pessoa/viewPessoa', $dados);
          // $this->load->view('template/footer', $dados);

          $this->template->load('template', 'pessoa/viewPessoa', $dados);
      }

      public function remover($id){
          if(!$this->pessoa_model->remover($id)){
              $this->session->set_userdata('mensagem', 'erro');
          }else{
              $this->session->set_userdata('mensagem', 'sucesso');
          }
          redirect('pessoa'); //redireciona o fluxo da aplicação
      }

      public function cadastrar($id=null){
          $this->load->helper('form');
          $this->load->library('form_validation');

          //variaveis enviadas para a View
          $dados['titulo'] = "Cadastro de Pessoas";

          //definição de regras para o formulário
          $rule_nome = 'required' . (($id==null)? '|is_unique[pessoa.nome]' : '');
          // echo $rule_nome;
          $this->form_validation->set_rules('nome', 'Nome', $rule_nome);
          $this->form_validation->set_rules('idade', 'Idade', 'required');
          $this->form_validation->set_rules('endereco', 'Endereco', 'required');

          //acao dinamica que sera enviada para a view
          $dados['acao'] = "pessoa/cadastrar/";

          $dados['registro'] = null; //Iniciar como null
          if($id!==null){
              $dados['acao']    .= $id; //concatenando o id
              $dados['registro'] = $this->pessoa_model->get($id);
          }

          $this->load->model('cidade_model');
          $dados['listaCidade'] = $this->cidade_model->get();

          //veririca se o form foi submetido e não houve erros de validação
          if($this->form_validation->run()===false){
              // $this->load->view('template/header', $dados);
              // $this->load->view('pessoa/formPessoa', $dados);
              // $this->load->view('template/footer', $dados);
              $this->template->load('template', 'pessoa/formPessoa', $dados);
          }else{ //neste caso, form submetido e ok!
              // $registro = $this->input->post();
              // print_r($registro);
              if(!$this->pessoa_model->cadastrar($id)){
                  $this->session->set_userdata('mensagem', 'erro');
              }else{
                  $this->session->set_userdata('mensagem', 'sucesso');
              }
              redirect('pessoa'); //redireciona o fluxo da aplicação
          }


      }
  }
 ?>
