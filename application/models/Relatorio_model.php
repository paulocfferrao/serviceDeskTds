<?php
  class Relatorio_model extends CI_Model{

      public function __construct(){ }

      public function getChamadoStatus($status){
        $this->db->select('c.id,c.titulo,c.descricao,c.STATUS,c.solucao,u.user as requerente');
        $this->db->from('chamado c');
        $this->db->join('usuarios u', 'u.id=c.idrequerente');
        $this->db->where(array('c.status'=>$status));
        $query = $this->db->get();
        return $query->result_array();

      }

      public function getChamadoRequerente($requerente){
        $this->db->select('c.id,c.titulo,c.descricao,c.STATUS,c.solucao,u.user as requerente');
        $this->db->from('chamado c');
        $this->db->join('usuarios u', 'u.id=c.idrequerente');
        $this->db->where(array('c.idrequerente'=>$requerente));
        $query = $this->db->get();
        return $query->result_array();

      }

  }
 ?>
