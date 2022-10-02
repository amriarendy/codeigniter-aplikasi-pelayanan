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
        Data Pengguna
        <small>List Data Pengguna</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Pengguna</li>
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
              <div class="btn-group">
                  <button type="button" class="btn btn-info">Pilih Sortir</button>
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#"><i class="fa fa-users icon"></i> Semua Data Pengguna</a></li>
                    <li><a href="#"><i class="fa fa-check icon"></i> Admin</a></li>
                    <li><a href="#"><i class="fa fa-people icon"></i> Users / Warga</a></li>
                  </ul>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 100px">#</th>
                  <th>NIK</th>
                  <th>Nama Lengkap</th>
                  <th>Tanggal Lahir</th>
                  <th style="width: 200px">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $row) : ?>
                <tr>
                  <td><?= ++$no ?></td>
                  <td><?= $row->nik ?></td>
                  <td><?= $row->nama ?></td>
                  <td><?= $row->tgl_lahir ?></td>
                  <td>
                    <div class="text-center">
                    <a id="edit_modal" class="btn btn-social-icon btn-warning" data-toggle="modal" data-target="#modal-edit" data-id="<?=$row->id;?>" data-nama="<?=$row->nama;?>" data-nik="<?=$row->nik;?>" data-tgl_lahir="<?=$row->tgl_lahir;?>"><i class="fa fa-edit icon"></i></a>
                    <a class="btn btn-social-icon btn-danger" href="<?=site_url('delete-users/').$row->id;?>" onclick="return confirm('Yakin Hapus?')" ><i class="fa fa-trash icon"></i></a>
                    </div>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>NIK</th>
                  <th>Nama Lengkap</th>
                  <th>Tanggal Lahir</th>
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
           <form class="item-add" method="post" action="<?= site_url('tambah-users'); ?>" enctype="multipart/form-data" id="form_add">
            <div class="modal fade" id="modal-add" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title">Tambah Data</h3>
                </div>
                <div class="modal-body">

                <div class="form-group">
                  <label class="control-label">Nama:</label>
                  <input type="text" class="form-control" name="nama" required/>
                </div>

                <div class="form-group">
                  <label class="control-label">NIK:</label>
                  <input type="number" class="form-control" name="nik" required/>
                </div>

                <div class="form-group">
                  <label class="control-label">Tgl Lahir:</label>
                  <input type="date" class="form-control" name="tgl_lahir" required/>
                </div>

                <div class="form-group">
                  <label class="control-label">Password:</label>
                  <input type="password" class="form-control" name="password" required/>
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
           <form class="item-edit" method="post" action="<?= site_url('update-users'); ?>" enctype="multipart/form-data" id="form_edit">
            <div class="modal fade" id="modal-edit" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title">Edit Data</h3>
                </div>
                  <div class="modal-body">
                  <input type="hidden" class="form-control" name="id" id="id_edit" required/>
                  
                  <div class="form-group">
                    <label class="control-label">Nama:</label>
                    <input type="text" class="form-control" name="nama" id="nama_edit" required/>
                  </div>

                  <div class="form-group">
                    <label class="control-label">NIK:</label>
                    <input type="number" class="form-control" name="nik" id="nik_edit" required/>
                  </div>

                  <div class="form-group">
                    <label class="control-label">Tgl Lahir:</label>
                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir_edit" required/>
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
<script type="text/javascript">
  $(document).ready(function() {
  $(document).on('click', '#edit_modal', function() {
      var id = $(this).data('id');
      var nama = $(this).data('nama');
      var nik = $(this).data('nik');
      var tgl_lahir = $(this).data('tgl_lahir');
      $('#id_edit').val(id);
      $('#nama_edit').val(nama);
      $('#nik_edit').val(nik);
      $('#tgl_lahir_edit').val(tgl_lahir);
      $('#modal-edit').modal('show');
  })
})
</script>
<script>
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
</script><!-- DataTables -->
<script src="<?php echo base_url(); ?>public/admin/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>