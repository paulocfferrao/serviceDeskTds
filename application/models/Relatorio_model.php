<?php
  class Relatorio_model extends CI_Model{

      public function __construct(){ }

      public function getEmprestimoPeriodo($ini, $fim){
          $this->db->select('e.id, e.data_devolucao, e.data_emprestimo, e.status, p.nome as pessoa, o.nome as objeto, to.nome as tipo');
          $this->db->from('emprestimo e');
          $this->db->join('pessoa p', 'p.id=e.idpessoa');
          $this->db->join('objeto o', 'o.id=e.idobjeto');
          $this->db->join('tipo_objeto to', 'to.id=o.idtipoobjeto');

          $where = array('e.data_emprestimo>='=>$ini, 'e.data_emprestimo<='=>$fim);
          $this->db->where($where);
          $query = $this->db->get();
          return $query->result_array(); //todos os registros

      }
  }
 ?>
