<style>
.modal-dialog {
  max-width: 80% !important;
    margin: 30px auto;
  }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Uji</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Uji</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


  <!-- Main content -->
  <section class="content">
    <!-- NOTIFIKASI -->
    <?php 
    if ($this->session->flashdata('flash_uji')){ ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h6>
          <i class="icon fas fa-check"></i> 
          Data Berhasil 
          <strong>
            <?= $this->session->flashdata('flash_uji');   ?>
          </strong> 
        </h6>
      </div>
    <?php } ?>
    <!-- tambah data -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Tambah Data Uji</h5>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <?= validation_errors(); ?>
                <form action="<?= base_url() ?>DataUji/hitung" method="post" accept-charset="utf-8">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama Santri</label>
                      <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap" name="nama" required>
                    </div>
                    <div class="form-group">
                      <label>Jenis Izin</label>
                      <select class="form-control" name="jenis_izin">
                        <option value="Kifayah Ortu">Kifayah Ortu</option>
                        <option value="Kifayah Kakek">Kifayah Kakek</option>
                        <option value="Kifayah Nenek">Kifayah Nenek</option>
                        <option value="Kifayah Kerabat">Kifayah Kerabat</option>
                        <option value="Berobat">Berobat Ringan</option>
                        <option value="Sakit">Berobat Berat(Sakit)</option>
                        <option value="Acara Keluarga">Acara Keluarga</option>
                        <option value="Mengurus Surat">Mengurus Surat Diri</option>
                        <option value="Dll">Dll (Menghadiri Undangan Acara)</option>                        
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Jarak Izin</label>
                      <select class="form-control" name="jarak_izin">
                        <option value="Dekat">Dekat (Dalam Kota)</option>
                        <option value="Jauh">Jauh (Luar Kota)</option>
                        <option value="Sangat Jauh">Sangat Jauh (Luar Provinsi)</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Lama Izin</label>
                      <select class="form-control" name="lama_izin">
                        <option value="Sebentar">Sebentar (1 Hari)</option>
                        <option value="Sedang">Sedang (2-3 Hari)</option>
                        <option value="Lama">Lama (7 Hari)</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Pelanggaran Santri</label>
                      <select class="form-control" name="pelanggaran">
                        <option value="Tidak Pernah">Tidak Pernah</option>
                        <option value="Ringan">Ringan (&#60;50 Poin) </option>
                        <option value="Sedang">Sedang (50-100 Poin) </option>
                        <option value="Berat">Berat (100-200 Poin) </option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Keterlambatan Kembali</label>
                      <select class="form-control" name="terlambat_kembali">
                        <option value="Tidak Pernah">Tidak Pernah</option>
                        <option value="Pernah">Pernah (&#60;5) </option>
                        <option value="Sering">Sering (>5) </option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Nilai Rapor</label>
                      <select class="form-control" name="nilai_rapor">
                        <option value="Kurang">Kurang (&#60;50) </option>
                        <option value="Cukup">Cukup (50-70) </option>
                        <option value="Baik">Baik (70-85)</option>
                        <option value="Sangat Baik">Sangat Baik (85-100)</option>
                      </select>
                    </div>
                   
                  <input type="submit" name="save" class="btn btn-primary" value="IJIN">
                </div>
                <!-- /.card-body -->
              </form>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- ./card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <!-- list data -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- card-body -->
        <div class="card-body">
          <table id="example12" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Izin</th>
                <th>Jarak Izin</th>
                <th>Lama Izin</th>
                <th>Pelanggaran Santri</th>
                <th>Keterlambatan Kembali</th>
                <th>Nilai Rapor</th>
                <th>Status Izin</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no=1;
              foreach ($training as $row){ ?>
                <tr>
                  <td><?= $no ?></td>                 
                  <td><?= $row->nama ?></td>
                  <td><?= $row->jenis_izin ?></td>
                  <td><?= $row->jarak_izin ?></td>
                  <td><?= $row->lama_izin ?></td>
                  <td><?= $row->pelanggaran ?></td>
                  <td><?= $row->terlambat_kembali ?></td>
                  <td><?= $row->nilai_rapor ?></td>
                  <td><?= $row->status_izin ?></td>
                  <td>
                    <div class="btn-group">
                      <a href="<?= base_url() ?>DataUji/hapus/<?= $row->id_training ?>" class="btn btn-danger" onclick="return confirm('yakin ?')">Hapus</a>
                      <a href="<?= base_url() ?>DataUji/ubah/<?= $row->id_training ?>" class="btn btn-warning">Update</a>
                    </div>
                  </td>
                </tr>
                <?php 
                $no++;
              } 
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
</div>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hasil data Uji </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo $this->session->flashdata('flash_hitung'); ?>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
          <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
        </div>
      </div>
    </div>
  </div>
