<?php

  class Relatorio extends MY_Controller{

      public function __construct(){
          parent::__construct();
          if($this->session->userdata['logado']['tipo']=='requerente'){
              redirect('login');//ajustar para redirecionar para chamados com mensagem de acesso negado
          }
          $this->load->model('relatorio_model');
      }

      public function formChamadoStatus(){
          $dados['titulo'] = "Relatório de chamados por status";
          $this->load->helper('form');
          $this->load->library('form_validation');
          $this->template->load('template', 'relatorio/formChamadoStatus', $dados);
      }

      public function chamadoStatus() {
          $status   = $this->input->post('status');
          $dados['titulo'] = "Chamados por status";
          $dados['status']   = $this->relatorio_model->getChamadoStatus($status);
          $this->load->library('MY_FPDF');
          $this->load->view('relatorio/chamadoStatusPDF', $dados);
      }

      public function formChamadoRequerente(){
          $dados['titulo'] = "Relatório de chamados por requerente";
          $this->load->helper('form');
          $this->load->library('form_validation');
          $this->template->load('template', 'relatorio/formChamadoRequerente', $dados);
      }

      public function chamadoRequerente() {
          $requerente   = $this->input->post('requerente');
          $dados['titulo'] = "Chamados por requerente";
          $dados['listaRequerentes']   = $this->relatorio_model->getChamadoRequerente($requerente);
          $this->load->library('MY_FPDF');
          $this->load->view('relatorio/chamadoRequerentePDF', $dados);
      }

  }
 ?>
