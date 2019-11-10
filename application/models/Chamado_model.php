<?php
  class Chamado_model extends CI_Model{
      private $tabelaNome;
      public function __construct(){
          $this->tabelaNome = 'chamado';
          $this->load->database();
      }

      public function get($id=null){
        if($id==null){
          $query = $this->db->get_where('chamado', array('status'=>'novo'));
          return $query->result_array();

          }
            $query = $this->db->get_where('chamado', array('id'=>$id));
            return $query->row_array(); //uma unica linha MATCH

      }
      public function getTodos(){

               $query = $this->db->get('chamado');
               return $query->result_array(); //todos os registros

          }


          public function getRequerente($id=null){
            if($id==null){
              $idReq = $this->session->userdata['logado']['id'];
              $query = $this->db->get_where('chamado', array('status'=>'novo','idrequerente'=>$idReq));
              return $query->result_array();

              }
                $query = $this->db->get_where('chamado', array('id'=>$id));
                return $query->row_array(); //uma unica linha MATCH

          }
          public function getTodosRequerente(){
                    $idReq = $this->session->userdata['logado']['id'];
                   $query = $this->db->get('chamado');
                   $query = $this->db->get_where('chamado', array('idrequerente'=>$idReq));
                   return $query->result_array(); //todos os registros

              }






      public function remover($id){
          return $this->db->where(array('id'=>$id))->delete($this->tabelaNome);
      }

      public function cadastrar($id=null){
          $registro = $this->input->post();

          if($id==null){ //registro novo
              $registro['STATUS'] = 'Novo';
              return $this->db->insert($this->tabelaNome, $registro);
          }
          if (isset($registro['solucao'])) {
            if($registro['solucao']!= ""){
              $registro['STATUS'] = 'Fechado';
            }
          }
          return $this->db->where(array('id'=>$id))->update($this->tabelaNome,$registro);
      }
  }
 ?>
