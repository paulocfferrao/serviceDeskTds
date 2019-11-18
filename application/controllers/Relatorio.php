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
          $relDados['titulo'] = "Relatório de chamados por status";
          $this->load->helper('form');
          $this->load->library('form_validation');
          $this->template->load('template', 'relatorio/formChamadoStatus', $relDados);
      }

      public function chamadoStatus() {
          $status   = $this->input->post('status');
          $relDados['titulo'] = "Chamados por status";
          $relDados['status']   = $this->relatorio_model->getChamadoStatus($status);
          $this->load->library('MY_FPDF');
          $this->load->view('relatorio/chamadoStatusPDF', $relDados);
      }

      public function formUsuarioSetor(){
          $relDados['titulo'] = "Relatório de chamados por status";
          $this->load->helper('form');
          $this->load->library('form_validation');
          $this->template->load('template', 'relatorio/formUsuarioSetor', $relDados);
      }

      public function usuarioSetor() {
          $status   = $this->input->post('status');
          $relDados['titulo'] = "Usuários por Statos";
          $relDados['usuario']   = $this->relatorio_model->getUsuarioSetor($status);
          $this->load->library('MY_FPDF');
          $this->load->view('relatorio/usuarioSetorPDF', $relDados);
      }

      public function formChamadoRequerente(){
          $relDados['titulo'] = "Relatório de chamados por requerente";
          $this->load->helper('form');
          $this->load->library('form_validation');
          $this->template->load('template', 'relatorio/formChamadoRequerente', $relDados);
      }

      public function chamadoRequerente() {
          $requerente   = $this->input->post('requerente');
          $relDados['titulo'] = "Chamados por requerente";
          $relDados['requerente']   = $this->relatorio_model->getChamadoRequerente($requerente);
          $this->load->library('MY_FPDF');
          $this->load->view('relatorio/chamadoRequerentePDF', $relDados);
      }

  }
 ?>
