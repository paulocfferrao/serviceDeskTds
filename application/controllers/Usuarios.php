<?php


  class Usuarios extends MY_Controller{


      public function __construct(){
          parent::__construct();
          if($this->session->userdata['logado']['tipo']!='admin'){
              redirect('login');//ajustar para redirecionar para chamados com mensagem de acesso negado
          }
          $this->load->model('usuario_model');

      }

      public function index(){
          $dados['titulo']= "Manutenção de Usuário";
          $dados['lista'] = $this->usuario_model->get();

          $this->template->load('template', 'usuario/viewUsuario', $dados);
      }

      public function remover($id){
          if(!$this->usuario_model->remover($id)){
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
          $rule_nome = 'required' . (($id==null)? '|is_unique[usuarios.user]' : '');
          // echo $rule_nome;
          $this->form_validation->set_rules('user', 'Login', $rule_nome);

          //senha obrigatoria apenas no cadastro
          if($id==null) $this->form_validation->set_rules('senha', 'senha', 'required');

          $this->form_validation->set_rules('tipo', 'Tipo', 'required');

          //acao dinamica que sera enviada para a view
          $dados['acao'] = "usuarios/cadastrar/";

          $dados['registro'] = null; //Iniciar como null
          if($id!==null){
              $dados['acao']    .= $id; //concatenando o id
              $dados['registro'] = $this->usuario_model->get($id);
          }

          //veririca se o form foi submetido e não houve erros de validação
          if($this->form_validation->run()===false){

              $this->template->load('template', 'usuario/formUsuario', $dados);
          }else{ //neste caso, form submetido e ok!
              // $registro = $this->input->post();
              // print_r($registro);
              if(!$this->usuario_model->cadastrar($id)){
                  die("Erro ao tentar cadastrar os dados");
              }
              redirect('usuarios/index'); //redireciona o fluxo da aplicação
          }


      }
  }
 ?>
