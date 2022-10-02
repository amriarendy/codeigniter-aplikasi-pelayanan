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
        Pelayanan
        <small>List Pelayanan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pelayanan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo $this->session->flashdata('pesan') ?>
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
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
                  <th style="width: 200px">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($pelayanan as $row) : ?>
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
                  <td>
                    <div class="text-center">
<!--                     <a class="btn btn-social-icon btn-warning" data-toggle="modal" data-target="#modal-edit" data-id_master_pelayanan="<?=$row->id_master_pelayanan;?>" data-id_master_pelayanan="<?=$row->id_master_pelayanan;?>" data-id_master_pelayanan="<?=$row->id_master_pelayanan;?>" data-id_master_pelayanan="<?=$row->id_master_pelayanan;?>"><i class="fa fa-edit icon"></i></a> -->
                    <a class="btn btn-social-icon btn-warning" href="<?=site_url('edit-pelayanan/') . $row->id_pelayanan;?>" ><i class="fa fa-edit icon"></i></a>
                    <a class="btn btn-social-icon btn-danger" href="<?=site_url('delete-pelayanan/') . $row->id_pelayanan;?>" onclick="return confirm('Yakin Hapus?')" ><i class="fa fa-trash icon"></i></a>
                    </div>
                  </td>
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
            <!-- Modal Edit -->
           <form class="item-edit" method="post" action="<?= site_url('update-pelayanan'); ?>" enctype="multipart/form-data" id="form_edit">
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
                      <input type="hidden" class="form-control" placeholder="Masukan Kode:" name="id_pelayanan" id="id_pelayanan_edit"/>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Data Pengguna (Civitas):</label>
                      <input type="text" class="form-control" placeholder="Masukan Pelayanan:" id="civitas_pelayanan_edit" readonly/>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Pelayanan:</label>
                      <input type="text" class="form-control" placeholder="Masukan Pelayanan:" id="pelayanan_edit" readonly/>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Tanggal Pengajuan:</label>
                      <input type="date" class="form-control" placeholder="Masukan Pelayanan:" id="tanggal_pelayanan_edit" readonly/>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Catatan:</label>
                      <textarea type="text" class="form-control" name="catatan_pelayanan" id="catatan_pelayanan_edit" required></textarea>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Dokumen:</label>
                      <input type="file" class="form-control" placeholder="Masukan Pelayanan:" name="dokumen" id="pelayanan" required/>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Status Pengajuan:</label>
                      <select class="form-control select-costum" name="status_pelayanan" id="status_pelayanan_edit" required>
                        <option value="selesai">Selesai</option>
                        <option value="proses">Proses</option>
                        <option value="perbaikan">Ulangi</option>
                        <option value="ditolak">Ditolak</option>
                      </select>
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
<!-- DataTables -->
<script type="text/javascript">
$(document).ready(function() {
  $(document).on('click', '#edit_modal', function() {
      var id_master_pelayanan = $(this).data('id_master_pelayanan');
      var master_pelayanan = $(this).data('master_pelayanan');
      $('#id_master_pelayanan_edit').val(id_master_pelayanan);
      $('#master_pelayanan_edit').val(master_pelayanan);
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
</script>
<script src="<?php echo base_url(); ?>public/admin/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>