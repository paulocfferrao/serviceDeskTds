<?php
  class Objeto_model extends CI_Model{
      private $tabelaNome;
      public function __construct(){
          $this->tabelaNome = 'objeto';
          // $this->load->database(); //esta no autoload
      }

      public function get($id=null){
          if($id==null){
              $query = $this->db->get($this->tabelaNome);
              return $query->result_array(); //todos os registros
          }
          $query = $this->db->get_where($this->tabelaNome, array('id'=>$id));
          return $query->row_array(); //uma unica linha MATCH
      }

      public function getLivres() {
          $this->db->select('o.id, o.nome, to.nome as tipo');
          $this->db->join('tipo_objeto to', 'to.id=o.idtipoobjeto');
          $query = $this->db->get_where('objeto o', array('emprestado'=>false));
          return $query->result_array(); //uma unica linha MATCH
      }

      public function remover($id){
          return $this->db->where(array('id'=>$id))->delete($this->tabelaNome);
      }

      public function cadastrar($id=null){
          $registro = $this->input->post();
          //criptografando a senha
          if($id==null){ //registro novo
              return $this->db->insert($this->tabelaNome, $registro);
          }
          return $this->db->where(array('id'=>$id))->update($this->tabelaNome,$registro);
      }
  }
 ?>
