<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1> Ubah Data Training</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Data Training</li>
            <li class="breadcrumb-item active">Ubah Data Training</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- tambah data -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Ubah Data</h5>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <?= validation_errors(); ?>
                <form action="" method="post" accept-charset="utf-8">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">id Training</label>
                      <input type="text" class="form-control disabled" name="id_training" value="<?= $ubah['id_training'] ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama</label>
                      <input type="text" class="form-control" name="nama" value="<?= $ubah['nama'] ?>">
                    </div>
                    <div class="form-group">
                      <label>Jenis Izin</label>
                      <select class="form-control" name="jenis_izin">
                        <option value="Kifayah Ortu">Kifayah Ortu</option>
                        <option value="Kifayah Kakek/Nenek">Kifayah Kakek/Nenek</option>
                        <option value="Kifayah Kerabat">Kifayah Kerabat</option>
                        <option value="Berobat Ringan">Berobat Ringan</option>
                        <option value="Sakit">Berobat Berat(Sakit)</option>
                        <option value="Acara Keluarga">Acara Keluarga</option>
                        <option value="Mengurus Surat Diri">Mengurus Surat Diri</option>
                        <option value="Dll(Menghadiri Undangan Acara)">Dll</option>                        
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Jarak Izin</label>
                      <select class="form-control" name="jarak_izin">
                        <option value="Dekat">Dekat</option>
                        <option value="Jauh">Jauh</option>
                        <option value="Sangat Jauh">Sangat Jauh</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Lama Izin</label>
                      <select class="form-control" name="lama_izin">
                        <option value="Sebentar">Sebentar</option>
                        <option value="Sedang">Sedang</option>
                        <option value="Lama">Lama</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Pelanggaran Santri</label>
                      <select class="form-control" name="pelanggaran">
                        <option value="Tidak Pernah">Tidak Pernah</option>
                        <option value="Ringan">Ringan</option>
                        <option value="Sedang">Sedang</option>
                        <option value="Berat">Berat</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Keterlambatan Kembali</label>
                      <select class="form-control" id="exampleInputPassword1" name="terlambat_kembali">
                        <option value="Tidak Pernah">Tidak Pernah</option>
                        <option value="Pernah">Pernah</option>
                        <option value="Sering">Sering</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Nilai Rapor</label>
                      <select class="form-control" name="nilai_rapor">
                        <option value="Kurang">Kurang</option>
                        <option value="Cukup">Cukup</option>
                        <option value="Baik">Baik</option>
                        <option value="Sangat Baik">Sangat Baik</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Status Izin</label>
                      <select class="form-control" name="status_izin">
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                      </select>
                    </div>


                    <input type="submit" name="save" class="btn btn-primary" value="Save">
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
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper