<?php


  class Chamado extends MY_Controller{


      public function __construct(){
          parent::__construct();
          //if($this->session->userdata['logado']['tipo']!='admin'){
            //redirect('login');//ajustar para redirecionar para chamados com mensagem de acesso negado
          //}
          $this->load->model('chamado_model');

      }

      public function index($todos=null){
          $dados['titulo']= "Chamados";

          if($this->session->userdata['logado']['tipo']!='requerente'){
            if ($todos=='1') {
              $dados['lista'] = $this->chamado_model->getTodos();
              // foreach ($dados['lista'] as $item) {
              //
              //     $this->load->model('usuario_model');
              //     $id = $item['idrequerente'];
              //     $item['requerente'] = $this->usuario_model->get($id);
              //
              //
              // }
              $this->template->load('template', 'chamado/viewChamado', $dados);
            }else{
              $dados['lista'] = $this->chamado_model->get();
              // foreach ($dados['lista'] as $item) {
              //
              //     $this->load->model('usuario_model');
              //     $id = $item['idrequerente'];
              //     $item['requerente'] = $this->usuario_model->get($id);
              //
              //
              // }
              $this->template->load('template', 'chamado/viewChamado', $dados);
            }
          } else {
            if ($todos=='1') {
              $dados['lista'] = $this->chamado_model->getTodosRequerente();
              $this->template->load('template', 'chamado/viewChamado', $dados);
            }else{
              $dados['lista'] = $this->chamado_model->getRequerente();
              $this->template->load('template', 'chamado/viewChamado', $dados);
            }
          }
      }

      public function remover($id){
          if(!$this->chamado_model->remover($id)){
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
          $rule_nome = 'required';
          //echo $rule_nome;
          $this->form_validation->set_rules('titulo', 'descricao', $rule_nome);



          //acao dinamica que sera enviada para a view
          $dados['acao'] = "chamado/cadastrar/";

          $dados['registro'] = null; //Iniciar como null
          if($id!==null){
              $dados['acao']    .= $id; //concatenando o id
              $dados['registro'] = $this->chamado_model->get($id);
          }

          $this->load->model('categoria_model');
          $dados['listaCategorias'] = $this->categoria_model->get();

          $this->load->model('computador_model');
          $dados['listaComputadores'] = $this->computador_model->get();


          //veririca se o form foi submetido e não houve erros de validação
          if($this->form_validation->run()===false){

              $this->template->load('template', 'chamado/formChamado', $dados);
          }else{ //neste caso, form submetido e ok!
              // $registro = $this->input->post();
              // print_r($registro);
              if(!$this->chamado_model->cadastrar($id)){
                  die("Erro ao tentar cadastrar os dados");
              }
              redirect('chamado/index'); //redireciona o fluxo da aplicação
          }


      }
  }
 ?>
