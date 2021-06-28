    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit Tracer Kuliah</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit Tracer Kuliah</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Default box -->
        <div class="card">
          <div class="card-header" style="background-color:blanchedalmond">
            <h3 class="card-title">Form Edit Tracer Kuliah</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
            
            <input type="hidden" name="id" value="<?php echo $tracer['id_kuliah'] ?>" />
            <input type="hidden" name="tipe" value="<?php echo $tipe ?>" />
            <div class="row">
                  <div class="col-md-4">
                  <label>Nama Kampus</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                        </div>
                        <input type="text" class="form-control" id="nama_kampus" name="nama_kampus" placeholder="Masukkan Nama Kampus" value="<?php echo $tracer['nama_kampus']?>">
                    </div>
                    <?= form_error('nama_kampus','<small class="text-danger">','</small>');?>
                  </div>
                  <div class="col-md-4">
                  <label>Prodi(Program Study)</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                        </div>
                        <input type="text" class="form-control" name="program_studi" id="program_studi" placeholder="Masukkan Program Study" value="<?php echo $tracer['program_studi']?>">
                    </div>
                    <?= form_error('program_studi','<small class="text-danger">','</small>');?>
                  </div>
                  <div class="col-md-4">
                  <label>Jurusan</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                        </div>
                        <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Masukkan Jurusan" value="<?php echo $tracer['jurusan']?>" >
                    </div>
                    <?= form_error('jurusan','<small class="text-danger">','</small>');?>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-6">
                    <label>Tahun Masuk</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk" placeholder="Masukkan Tahun Masuk" value="<?php echo $tracer['tahun_masuk']?>">
                    </div>
                    <?= form_error('tahun_masuk','<small class="text-danger">','</small>');?>
                  </div>
                  <div class="col-md-6">
                    <label>Tahun lulus</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input type="number" class="form-control" id="tahun_lulus" name="tahun_lulus" placeholder="Masukkan Tahun Lulus" value="<?php echo $tracer['tahun_lulus']?>" >
                    </div>
                    <?= form_error('tahun_lulus','<small class="text-danger">','</small>');?>
                  </div>
                  
              </div>
               <!-- Batas Baris -->
               <div class="form-group">
                    <label for="status">Jalur Penerimaan</label>
                    <div class="form-check">
                        <input type="radio" name="jalur_penerimaan" value="snmptn" <?php if ( $tracer['jalur_penerimaan'] == "snmptn" ) echo 'checked'; ?> > SNMPTN 
                    </div>
                    <div class="form-check">
                        <input type="radio" name="jalur_penerimaan" value="sbmptn" <?php if ( $tracer['jalur_penerimaan'] == "sbmptn" ) echo 'checked'; ?>> SBMPTN
                    </div>

                    <div class="form-check">
                        <input type="radio" name="jalur_penerimaan" value="snmpn" <?php if ( $tracer['jalur_penerimaan'] == "snmpn" ) echo 'checked'; ?>> SNMPN
                    </div>
                    <div class="form-check">
                        <input type="radio" name="jalur_penerimaan" value="sbmpn" <?php if ( $tracer['jalur_penerimaan'] == "sbmpn" ) echo 'checked'; ?>> SBMPN
                    </div>
                    <div class="form-check">
                        <input type="radio" name="jalur_penerimaan" value="mandiri" <?php if ( $tracer['jalur_penerimaan'] == "mandiri" ) echo 'checked'; ?>> Mandiri
                    </div>
                    <div class="form-check">
                        <input type="radio" name="jalur_penerimaan" value="ikatan_dinas" <?php if ( $tracer['jalur_penerimaan'] == "ikatan_dinas" ) echo 'checked'; ?>> Ikatan Dinas
                    </div>
                    <div class="form-check">
                        <input type="radio" name="jalur_penerimaan" value="kedinasan" <?php if ( $tracer['jalur_penerimaan'] == "kedinasan" ) echo 'checked'; ?>> Kedinasan
                    </div>
                    <?= form_error('jalur_penerimaan','<small class="text-danger">','</small>');?>
                </div>
              <div class="row">
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <span> <a href="<?= base_url("alumni/tracer")?>" class="btn btn-danger">Cancel</a></span>
                  </div>
              </div>

            </form>
          </div>
          <!-- /.card-body -->
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <br><br>