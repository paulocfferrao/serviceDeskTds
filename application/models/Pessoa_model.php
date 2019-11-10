<?php
  class Pessoa_model extends CI_Model{
      public function __construct(){
          // $this->load->database();
      }

      public function get($id=null){
          if($id==null){
              $this->db->select('p.id, p.nome, p.idade, p.endereco, c.nome as cidade');
              $this->db->from('pessoa p');
              $this->db->join('cidade c', 'c.id=p.idcidade');
              $query = $this->db->get();
              return $query->result_array(); //todos os registros
          }
          $query = $this->db->get_where('pessoa', array('id'=>$id));
          return $query->row_array(); //uma unica linha MATCH
      }

      public function remover($id){
          return $this->db->where(array('id'=>$id))->delete('pessoa');
      }

      public function cadastrar($id=null){
          $registro = $this->input->post();
          if($id==null){ //registro novo
              return $this->db->insert('pessoa', $registro);
          }
          return $this->db->where(array('id'=>$id))->update('pessoa',$registro);
      }
  }
 ?>
