<?php
  class Emprestimo_model extends CI_Model{
      private $tabelaNome;
      public function __construct(){
          $this->tabelaNome = 'emprestimo';
          // $this->load->database(); //esta no autoload
      }

      public function get($id=null){
          if($id==null){
              $this->db->select('e.id, e.data_devolucao, e.data_emprestimo, e.status, p.nome as pessoa, o.nome as objeto, to.nome as tipo');
              $this->db->from('emprestimo e');
              $this->db->join('pessoa p', 'p.id=e.idpessoa');
              $this->db->join('objeto o', 'o.id=e.idobjeto');
              $this->db->join('tipo_objeto to', 'to.id=o.idtipoobjeto');
              $query = $this->db->get();
              return $query->result_array(); //todos os registros
          }
          $query = $this->db->get_where($this->tabelaNome, array('id'=>$id));
          return $query->row_array(); //uma unica linha MATCH
      }

      public function remover($id){
          return $this->db->where(array('id'=>$id))->delete($this->tabelaNome);
      }

      public function cadastrar($id=null){
          $registro = $this->input->post();

          if($id==null){ //registro novo
              $registro['status'] = true; //emprestado
              $this->db->trans_begin();
              if( !$this->db->where('id', $registro['idobjeto'])->update('objeto', array('emprestado'=>true))
               || !$this->db->insert($this->tabelaNome, $registro) ){
                  $this->db->trans_rollback();
                  return false;
              }
              $this->db->trans_commit();
              return true;
          }
          return $this->db->where(array('id'=>$id))->update($this->tabelaNome,$registro);
      }

      //atualizando o campo emprestado (tye bool) na tabela de objetos, e após atualiza a devolução na tabela empréstimo
      //caso algum dos lançamentos ocorra erro, realiza um rollback e retorna erro.
      public function lancarDevolucao($id) {
          $emp = $this->get($id); //recuperando o objeto

          $this->db->trans_begin();
          if( !$this->db->where('id', $emp['idobjeto'])->update('objeto', array('emprestado'=>false))
          ||  !$this->db->where('id', $id)->update($this->tabelaNome, array('status'=>false, 'data_devolucao'=>$this->input->post('data_devolucao'))) ){
              $this->db->trans_rollback();
              return false;
          }
          $this->db->trans_commit();
          return true;
      }
  }
 ?>
