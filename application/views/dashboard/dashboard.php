<?php $this->load->view('layout/header'); ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/datatables.net-bs/css/dataTables.bootstrap.min.css">
<?php $this->load->view('layout/sidebar'); ?>
<?php $no=0; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $this->session->flashdata('pesan') ?>
    <div class="row">
    <div class="col-lg-3 col-md-12 col-sm-12">
      <!-- Default box -->
      <form class="user" method="POST" action="<?= site_url('bio-update') ?>">
      <div class="box">
        <div class="box-body">
            <div class="form-group">
                <label class="control-label">Nama Lengkap:</label>
                <input type="text" class="form-control" placeholder="Masukan Pelayanan:" value="<?=$users['nama']?>" name="nama"/>
            </div>
            <div class="form-group">
                <label class="control-label">Tanggal Lahir:</label>
                <input type="date" class="form-control" placeholder="Masukan Pelayanan:" value="<?=$users['tgl_lahir']?>" name="tgl_lahir"/>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea type="text" class="form-control" name="alamat"><?=$users['alamat']?></textarea>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary text-bold btn-block">
            Submit
          </button>
        </div>
      </div>
      </form>
      <!-- /.box -->
      </div>
      <div class="col-lg-9 col-md-12 col-sm-12">
      <!-- Default box -->
      <?php if ($this->session->userdata('role')=='user') : ?>
      <div class="box">
        <div class="box-header with-border">
          
            <a class="btn btn-primary text-bold" data-toggle="modal" data-target="#modal-add">
                <i class="fa fa-plus icon"></i> Ajukan Pelayanan
            </a>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 100px">#</th>
                  <th>Pelayanan</th>
                  <th>Civitas Pelayanan</th>
                  <th>Status Pelayanan</th>
                  <th>Tanggal Pelayanan</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($my_layanan as $row) : ?>
                <tr>
                  <td><?= ++$no ?></td>
                  <td><?= $row->master_pelayanan; ?></td>
                  <td><?= $row->nama; ?></td>
                  <td class="text-center">
                    <?php if ($row->status_pelayanan=="selesai") { ?>
                      <a class="btn btn-success">selesai</a>
                    <?php } elseif ($row->status_pelayanan=="proses") { ?>
                      <a class="btn btn-warning">proses</a>
                    <?php } elseif ($row->status_pelayanan=="perbaikan") { ?>
                      <a class="btn btn-dark">ulangi</a>
                    <?php } else { ?>
                      <a class="btn btn-danger">ditolak</a>
                    <?php } ?>
                  </td>
                  <td><?= $row->tanggal_pelayanan; ?></td>
                  <td><a class="btn btn-social-icon btn-info" href="<?=site_url('detail-pelayanan/') . $row->id_pelayanan;?>" ><i class="fa fa-eye icon"></i></a></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Pelayanan</th>
                  <th>Civitas Pelayanan</th>
                  <th>Status Pelayanan</th>
                  <th>Tanggal Pelayanan</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            <!-- /.box-body -->
          </div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
        <?php endif; ?>
      </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

      
<!-- page script -->
            <!-- Modal Edit -->
           <form class="item-add" method="post" action="<?= site_url('tambah-pelayanan'); ?>" enctype="multipart/form-data" id="form_add">
            <div class="modal fade" id="modal-add" tabindex="-1">
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
                      <input type="hidden" class="form-control" placeholder="Masukan Kode:" name="id_pelayanan" value="<?=$users['nama']?>"/>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Data Pengguna (Civitas):</label>
                      <input type="text" class="form-control" placeholder="Masukan Pelayanan:" value="<?=$users['nama']?>" readonly/>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Tanggal Pengajuan:</label>
                      <input type="date" class="form-control" placeholder="Masukan Pelayanan:" name="tanggal_pelayanan" value="<?=date('Y-m-d')?>" readonly/>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Pelayanan:</label>
                      <select class="form-control select-costum" name="pelayanan" required>
                        <option value="" selected>-- Pilih Pelayanan --</option>
                        <?php foreach ($master_pelayanan as $row) : ?>
                        <option value="<?=$row->id_master_pelayanan?>"><?=$row->master_pelayanan?></option>
                      <?php endforeach; ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Dokumen:</label>
                      <input type="file" class="form-control" name="dokumen[]" multiple required/>
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
// form validation
$(document).ready(function() {
  $('#edit-bio').click(function() {
    if($(this).is(':checked')){
      $('#nama').attr('readonly', false);
      $('#tgl_lahir').attr('readonly', false);
      $('#password').attr('readonly', false);
      $('#btn-submit').attr('disabled', false);
    } else {
      $('#nama').attr('readonly', true);
      $('#tgl_lahir').attr('readonly', true);
      $('#password').attr('readonly', true);
      $('#btn-submit').attr('enable', true);
    }
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
</script>
  <!-- DataTables -->
<script src="<?php echo base_url(); ?>public/admin/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>