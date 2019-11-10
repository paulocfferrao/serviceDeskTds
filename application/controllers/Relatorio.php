<?php

  class Relatorio extends MY_Controller{

      public function __construct(){
          parent::__construct();

          $this->load->model('relatorio_model');
      }

      public function formEmprestimoPeriodo(){
          $dados['titulo'] = "Relatório de Objetos emprestados por período";
          $this->load->helper('form');
          $this->load->library('form_validation');
          $this->template->load('template', 'relatorio/formEmprestimoPeriodo', $dados);
      }

      public function emprestimoPeriodo() {
          $ini   = $this->input->post('data_inicial');
          $fim   = $this->input->post('data_final');
          $dados['titulo'] = "Empréstimo por período";
          $dados['data']   = $this->relatorio_model->getEmprestimoPeriodo($ini, $fim);
          // echo '<pre>';
          // print_r($dados);
          // echo '</pre>';
          $this->load->library('MY_FPDF');
          $this->load->view('relatorio/emprestimoPeriodoPDF', $dados);
      }

  }
 ?>
