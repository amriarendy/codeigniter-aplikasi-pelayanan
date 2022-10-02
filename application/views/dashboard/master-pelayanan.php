<?php $this->load->view('layout/header'); ?>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/datatables.net-bs/css/dataTables.bootstrap.min.css">
<?php $this->load->view('layout/sidebar'); ?>
<?php $no=0; ?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="text-bold">
        Master Pelayanan
        <small>List Master Pelayanan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Master Pelayanan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo $this->session->flashdata('pesan') ?>
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <a class="btn btn-primary text-bold" data-toggle="modal" data-target="#modal-add">
                <i class="fa fa-plus icon"></i> Tambah Data
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 100px">#</th>
                  <th>Master Pelayanan</th>
                  <th style="width: 200px">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($master_pelayanan as $row) : ?>
                <tr>
                  <td><?= ++$no ?></td>
                  <td><?=$row->master_pelayanan;?></td>
                  <td>
                    <div class="text-center">
                    <a id="edit_modal" class="btn btn-social-icon btn-warning" data-toggle="modal" data-target="#modal-edit" data-id_master_pelayanan="<?=$row->id_master_pelayanan;?>" data-master_pelayanan="<?=$row->master_pelayanan;?>"><i class="fa fa-edit icon"></i></a>
                    <a class="btn btn-social-icon btn-danger" href="<?=site_url('delete-master-pelayanan/').$row->id_master_pelayanan;?>" onclick="return confirm('Yakin Hapus?')" ><i class="fa fa-trash icon"></i></a>
                    </div>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th style="width: 100px">#</th>
                  <th>Master Pelayanan</th>
                  <th style="width: 200px">Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- page script -->
            <!-- Modal Add -->
           <form class="item-add" method="post" action="<?= site_url('tambah-master-pelayanan'); ?>" enctype="multipart/form-data" id="form_add">
            <div class="modal fade" id="modal-add" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title">Tambah Data</h3>
                </div>
                <div class="modal-body">

                
                <input type="hidden" class="form-control" name="check_value" value="value"/>

                <div class="form-group">
                  <label class="control-label">Master Pelayanan:</label>
                  <input type="text" class="form-control" placeholder="Masukan Master Pelayanan:" name="master_pelayanan" required/>
                </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submit-add">Submit</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
            <!--/ Modal Add -->
            <!-- Modal Edit -->
           <form class="item-edit" method="post" action="<?= site_url('update-master-pelayanan'); ?>" enctype="multipart/form-data" id="form_edit">
            <div class="modal fade" id="modal-edit" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title">Edit Data</h3>
                </div>
                  <div class="modal-body">
                  
                  
                  <input type="hidden" class="form-control" name="check_value" value="value">

                    <div class="form-group mb-3">
                      <input type="hidden" class="form-control" placeholder="Masukan Kode:" name="id_master_pelayanan" id="id_master_pelayanan_edit">
                    </div>

                    <div class="form-group">
                      <label class="control-label">Master Pelayanan:</label>
                      <input type="text" class="form-control" placeholder="Masukan Master Pelayanan:" name="master_pelayanan" id="master_pelayanan_edit">
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning" id="submit-edit">Submit</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <!--/ Modal Edit -->
<?php $this->load->view('layout/footer'); ?>
<script>
$(document).ready(function() {
  $(document).on('click', '#edit_modal', function() {
      var id_master_pelayanan = $(this).data('id_master_pelayanan');
      var master_pelayanan = $(this).data('master_pelayanan');
      $('#id_master_pelayanan_edit').val(id_master_pelayanan);
      $('#master_pelayanan_edit').val(master_pelayanan);
      $('#modal-edit').modal('show');
  })
})
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script src="<?php echo base_url(); ?>public/admin/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>