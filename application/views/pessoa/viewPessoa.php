<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">

<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="<?= site_url('pessoa/cadastrar'); ?>">
          <i class="fa fa-fw fa-plus"></i>Adicionar
        </a>
        <div class="box">
          <!-- <div class="box-header with-border">
              <h2 class="box-title"><?php //echo $titulo; ?></h2>
          </div> -->
          <?php if (isset($this->session->userdata['mensagem'])
                      && ($this->session->userdata['mensagem']=='sucesso') ) { ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Aviso!</h4>
                  Operação realizada com Sucesso.
                </div>
        <?php }else if (isset($this->session->userdata['mensagem'])
                    && ($this->session->userdata['mensagem']!='sucesso') ){ ?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Atenção!</h4>
                  Erro ao tentar realizar a operação.
              </div>
        <?php } ?>
        <?php $this->session->unset_userdata('mensagem'); ?>

          <div class="box-body">
            <table id="tabelaDataTable" class="table table-hover table-striped">
              <thead>
                <th class="col-md-1">#</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Cidade</th>
                <th>Endereço</th>
                <th class="col-md-1">Ações</th>
              </thead>
              <tbody>
                <?php foreach($lista as $item):?>
                  <tr>
                    <td><?= $item['id'];?></td>
                    <td><?= $item['nome'];?></td>
                    <td><?= $item['idade'];?></td>
                    <td><?= $item['cidade'];?></td>
                    <td><?= $item['endereco'];?></td>
                    <td>
                        <a class="btn btn-xs btn-info" href="<?= site_url('pessoa/cadastrar/'.$item['id']); ?>">
                            <i class="fa fa-fw fa-edit"></i>
                        </a>
                        <buttton class="btn btn-xs btn-danger confirmaExclusao" data-id="<?= $item['id'];?>"
                          data-nome="<?= $item['nome'];?>">
                            <i class="fa fa-fw fa-trash"></i>
                        </button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('.confirmaExclusao').on('click', function(e){
        e.preventDefault();
        var id   = $(this).data('id');
        var nome = $(this).data('nome');

        console.log('nome: ' + nome);

        $('#nomeItem').text(nome);
        //criando uma variavel id no modal para receber o id do item a ser excluído
        $('#modalConfirmacao').data('id', id);
        $('#modalConfirmacao').modal('show');
    });

    function remove(){
        var id = $('#modalConfirmacao').data('id');
        document.location.href = "<?= site_url('pessoa/remover/')?>" + id;
    }
</script>

 <!-- DataTables -->
<script src="<?= base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>

<script type="text/javascript">
  $(document).ready( function () {
      $('#tabelaDataTable').DataTable();
  } );
</script>

<!-- Modal de confirmação de exclusão -->
<div class="modal fade" id="modalConfirmacao">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title">Atenção</h4>
       </div>
       <div class="modal-body">
         <p>Você tem certeza que deseja excluir o item: <span id="nomeItem"></span>?</p>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
         <button type="button" class="btn btn-danger" onclick="remove();">Sim, remover</button>
       </div>
     </div>
     <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
 </div>
 <!-- /.modal -->
