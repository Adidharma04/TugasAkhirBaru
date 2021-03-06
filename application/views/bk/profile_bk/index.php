<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profile Guru BK</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('bk/dashboard_bk') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Profile Guru BK </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="col-19 col-lg-7 d-flex align-items-stretch">
                <div class="card bg-light">
                    <div class="card-header text-muted border-bottom-0">
                        <h2>Profil<h2>
                                <hr>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">

                            <div class="col-md-6" align="center">

                                <?php

                                $img = "";
                                // foto default 
                                if ($this->session->userdata('sess_jenis_kelamin') == "l") {

                                    $img = base_url('assets/Gambar/Website/male.png');
                                } else {

                                    $img = base_url('assets/Gambar/Website/female.png');
                                }
                                ?>

                                <img src="<?= $img ?>" style="width: 200px; border-radius: 5px; border: 1.5px solid #e0e0e0">

                            </div>

                            <div class="col-6">
                                <h4 class="lead"><b><?php echo ucfirst($this->session->userdata('sess_name')) ?></b></h4>

                                <p class="text-muted text-sm "><b>Tanggal Lahir : </b> <?php echo ucfirst($this->session->userdata('sess_tanggal_lahir')) ?></p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building fa-1x"></i> </span>
                                        <h6><b>Alamat</b>
                                            <h6>
                                    </li>
                                    <span align="justify">
                                        <p><?php echo ucfirst($this->session->userdata('sess_alamat')) ?></p>
                                    </span>

                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope fa-1x"></i> </span>
                                        <h6><b>Email</b>
                                            <h6>
                                    </li>
                                    <span align="justify">
                                        <p><?php echo ucfirst($this->session->userdata('sess_email')) ?></p>
                                    </span>

                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone fa-1x"></i> </span>
                                        <h6><b>HP/Telepon</b>
                                            <h6>
                                    </li>
                                    <span align="justify">
                                        <p><?php echo ucfirst($this->session->userdata('sess_telfon')) ?></p>
                                    </span>
                                    <br>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <?php $sess_id_pegawai = $this->session->userdata('sess_id_pegawai') ?>
                            <a href="<?= base_url() . 'bk/pegawai/edit/' . $sess_id_pegawai ?>" class="btn btn-sm btn-primary">
                                <i class="fas fa-user"></i> Edit Profil
                            </a>
                            <a href="<?= base_url() . 'bk/pegawai/password' ?>" class="btn btn-sm btn-primary">
                                <i class="fas fa-key"></i> Ubah Password
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<br>
<br>