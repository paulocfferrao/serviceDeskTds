<div class="row col-md-12">
    <div class="box">
        <div class="box-body">
          <?php
              //verificando se o form_validation retornou erros
              if(validation_errors() != null){ ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Erro!</h4>
                    <?php echo validation_errors(); //mostra os erros?>
                </div>
          <?php } ?>

          <?php echo form_open('relatorio/chamadoStatus'); ?>
            <div class="form-group">
              <label>Nome</label>
              <select class="form-control" id="requerente" name="requerente">
                <option value="">Selecione um item da lista</option>
                <?php
                $this->db->select('u.id, u.user, u.tipo, s.nome as setor');
                $this->db->from('usuarios u');
                $this->db->join('setor s', 's.id=u.idsetor');
                $query = $this->db->get();
                $listaRequerentes= $query->result_array();

                 ?>
                  <?php foreach ($listaRequerentes as $c): ?>
                      <option value="<?= $c['id']; ?>">
                          <?= $c['user'] . ' | ' . $c['setor']?>
                      </option>
                  <?php endforeach; ?>
                </select>
              </select>
            </div>

            <button class="btn btn-success" type="submit" formtarget="_blank">Enviar</button>
          </form>
        </div>
    </div>
</div>
