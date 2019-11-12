<?php


  class Setor extends MY_Controller{


      public function __construct(){
          parent::__construct();
          if($this->session->userdata['logado']['tipo']!='admin'){
              redirect('login');//ajustar para redirecionar para chamados com mensagem de acesso negado
          }
          $this->load->model('setor_model');

      }

      public function index(){
          $dados['titulo']= "Manutenção de Usuário";
          $dados['lista'] = $this->setor_model->get();

          $this->template->load('template', 'setor/viewSetor', $dados);
      }

      public function remover($id){
          if(!$this->setor_model->remover($id)){
              die('Erro ao tentar remover');
          }
          $this->index();
      }

      public function cadastrar($id=null){
          $this->load->helper('form');
          $this->load->library('form_validation');

          //variaveis enviadas para a View
          $dados['titulo'] = "Cadastro de Usuários";

          //definição de regras para o formulário
          $rule_nome = 'required' . (($id==null)? '|is_unique[setor.nome]' : '');
          // echo $rule_nome;
          $this->form_validation->set_rules('nome', 'Nome', $rule_nome);

          //acao dinamica que sera enviada para a view
          $dados['acao'] = "setor/cadastrar/";

          $dados['registro'] = null; //Iniciar como null
          if($id!==null){
              $dados['acao']    .= $id; //concatenando o id
              $dados['registro'] = $this->setor_model->get($id);
          }

          //veririca se o form foi submetido e não houve erros de validação
          if($this->form_validation->run()===false){

              $this->template->load('template', 'setor/formSetor', $dados);
          }else{ //neste caso, form submetido e ok!
              if(!$this->setor_model->cadastrar($id)){
                  die("Erro ao tentar cadastrar os dados");
              }
              redirect('setor/index'); //redireciona o fluxo da aplicação
          }


      }
  }
 ?>
