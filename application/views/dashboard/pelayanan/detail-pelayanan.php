<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Pelayanan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Detail Pelayanan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-12">
        <!-- Default box -->
        <form class="user" method="POST" action="<?= site_url('bio-update') ?>">
        <div class="box">

          <div class="box-body">
            <div class="form-group mb-3">
              <input type="hidden" class="form-control" placeholder="Masukan Kode:" name="id_pelayanan" value="<?=$pelayanan['nama']?>" />
            </div>

            <div class="form-group">
              <label class="control-label">Data Pengguna (Civitas):</label>
              <input type="text" class="form-control" placeholder="Masukan Pelayanan:" value="<?=$pelayanan['nama']?>" readonly/>
            </div>

            <div class="form-group">
              <label class="control-label">Data NIK (Civitas):</label>
              <input type="text" class="form-control" placeholder="Masukan Pelayanan:" value="<?=$pelayanan['nik']?>" readonly/>
            </div>

            <div class="form-group">
              <label class="control-label">Pelayanan:</label>
              <input type="text" class="form-control" placeholder="Masukan Pelayanan:" value="<?=$pelayanan['master_pelayanan']?>" readonly/>
            </div>

            <div class="form-group">
              <label class="control-label">Tanggal Pengajuan:</label>
              <input type="date" class="form-control" placeholder="Masukan Pelayanan:" value="<?=$pelayanan['tanggal_pelayanan']?>" readonly/>
            </div>

            <div class="form-group">
              <label class="control-label">Status Pengajuan:</label><br>
                    <?php if ($pelayanan['status_pelayanan']=="selesai") { ?>
                      <a class="btn btn-success">selesai</a>
                    <?php } elseif ($pelayanan['status_pelayanan']=="proses") { ?>
                      <a class="btn btn-warning">proses</a>
                    <?php } elseif ($pelayanan['status_pelayanan']=="perbaikan") { ?>
                      <a class="btn btn-dark">ulangi</a>
                    <?php } else { ?>
                      <a class="btn btn-danger">ditolak</a>
                    <?php } ?>
            </div>

            <div class="form-group">
              <label class="control-label">Catatan:</label><br>
              <p><?=$pelayanan['catatan_pelayanan']?></p>
            </div>
            
            <div class="form-group">
              <label class="control-label">Dokumen Dari Users:</label><br>
            <?php foreach ($dokumen_users as $row) : ?>
              <a class="text-bold" href="<?=base_url() . 'uploads/file_berkas/' . $row->dokumen;?>" target="_blank"> <?=$row->dokumen;?></a><br>
            <?php endforeach; ?>
            </div>

            <div class="form-group">
              <label class="control-label">Dokumen Dari Admin:</label><br>
            <?php foreach ($dokumen_admin as $row) : ?>
              <a class="text-bold" href="<?=base_url() . 'uploads/file_berkas/' . $row->dokumen;?>" target="_blank"> <?=$row->dokumen;?></a><br>
            <?php endforeach; ?>
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
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('layout/footer'); ?>