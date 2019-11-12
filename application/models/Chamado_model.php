<?php
  class Chamado_model extends CI_Model{
      private $tabelaNome;
      public function __construct(){
          $this->tabelaNome = 'chamado';
          $this->load->database();
      }

      public function get($id=null){
        if($id==null){

          $this->db->select('c.id,c.titulo,c.descricao,c.STATUS,c.solucao,u.user as requerente');
          $this->db->from('chamado c');
          $this->db->join('usuarios u', 'u.id=c.idrequerente');
          $this->db->where(array('c.status'=>'novo'));
          $query = $this->db->get();
          return $query->result_array();

          }
            $query = $this->db->get_where('chamado', array('id'=>$id));
            return $query->row_array(); //uma unica linha MATCH

      }
      public function getTodos(){

               $this->db->select('c.id,c.titulo,c.descricao,c.STATUS,c.solucao,u.user as requerente');
               $this->db->from('chamado c');
               $this->db->join('usuarios u', 'u.id=c.idrequerente');
               $query = $this->db->get();
               return $query->result_array(); //todos os registros


          }


          public function getRequerente($id=null){
            if($id==null){
              $idReq = $this->session->userdata['logado']['id'];

              $this->db->select('c.id,c.titulo,c.descricao,c.STATUS,c.solucao,u.user as requerente');
              $this->db->from('chamado c');
              $this->db->join('usuarios u', 'u.id=c.idrequerente');
              $this->db->where(array('c.status'=>'novo','c.idrequerente'=>$idReq));
              $query = $this->db->get();
              return $query->result_array();
              }
                $query = $this->db->get_where('chamado', array('id'=>$id));
                return $query->row_array(); //uma unica linha MATCH

          }
          public function getTodosRequerente(){
                    $idReq = $this->session->userdata['logado']['id'];

                    $this->db->select('c.id,c.titulo,c.descricao,c.STATUS,c.solucao,u.user as requerente');
                    $this->db->from('chamado c');
                    $this->db->join('usuarios u', 'u.id=c.idrequerente');
                    $this->db->where(array('c.idrequerente'=>$idReq));
                    $query = $this->db->get();
                    return $query->result_array();
          }
          
      public function cadastrar($id=null){
          $registro = $this->input->post();

          if($id==null){ //registro novo
              $registro['STATUS'] = 'Novo';
              $registro['idrequerente'] = $this->session->userdata['logado']['id'];
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
