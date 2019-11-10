<?php


  class Cidade extends MY_Controller{

      public function __construct(){
          parent::__construct();

          $this->load->model('cidade_model');
          //ATENÇÃO
          // $this->load->helper('url'); //colocado no config/autoload
      }

      public function index(){
          $dados['titulo']= "Manutenção de Cidade";
          $dados['lista'] = $this->cidade_model->get();

          $this->template->load('template', 'cidade/viewCidade', $dados);
      }

      public function remover($id){
          if(!$this->cidade_model->remover($id)){
              die('Erro ao tentar remover');
          }
          redirect('cidade/index'); //redireciona o fluxo da aplicação
      }

      public function cadastrar($id=null){
          $this->load->helper('form');
          $this->load->library('form_validation');
          //load da model de estados
          $this->load->model('estado_model');

          //variaveis enviadas para a View
          $dados['titulo'] = "Cadastro de Cidade";

          //definição de regras para o formulário

          // echo $rule_nome;
          $this->form_validation->set_rules('nome', 'Nome', 'required');
          $this->form_validation->set_rules('idestado', 'idestado', 'required');


          //acao dinamica que sera enviada para a view
          $dados['acao'] = "cidade/cadastrar/";

          $dados['registro'] = null; //Iniciar como null
          if($id!==null){
              $dados['acao']    .= $id; //concatenando o id
              $dados['registro'] = $this->cidade_model->get($id);
          }
          //buscando a lista de estados
          $dados['listaEstados'] = $this->estado_model->get();

          //veririca se o form foi submetido e não houve erros de validação
          if($this->form_validation->run()===false){
              $this->template->load('template', 'cidade/formCidade', $dados);
          }else{ //neste caso, form submetido e ok!

              if(!$this->cidade_model->cadastrar($id)){
                  die("Erro ao tentar cadastrar os dados");
              }
              redirect('cidade/index'); //redireciona o fluxo da aplicação
          }


      }
  }
 ?>
