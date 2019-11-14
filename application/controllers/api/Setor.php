<?php

require APPPATH . 'libraries/REST_Controller.php';

class Setor extends REST_Controller {

	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       //$this->tabela = 'setor';
       $this->load->database();
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_get($id = 0)
	{
        if(!empty($id)){
            $data = $this->db->get_where('setor', ['id' => $id])->row_array();
        }else{
            $data = $this->db->get('setor')->result();
        }

        $this->response($data, REST_Controller::HTTP_OK);
	}

  /**
   * Get All Data from this method.
   *
   * @return Response
  */
  public function del_get($id)
  {
      $data = $this->db->where(array('id'=>$id))->delete('setor');

      $this->response($data, REST_Controller::HTTP_OK);
   }

    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_post()
    {
        $input = $this->input->post();
        $this->db->insert('setor',$input);
        $this->response(['Item created successfully.'], REST_Controller::HTTP_OK);
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put($id)
    {
        $input = $this->put();
        $this->db->update('setor', $input, array('id'=>$id));

        $this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        $this->db->delete('setor', array('id'=>$id));

        $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
    }

}
