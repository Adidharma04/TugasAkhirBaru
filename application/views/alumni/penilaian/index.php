<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>
 
</head>
<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Penilaian</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Alumni/dashboard_alumni')?>">Home</a></li>
              <li class="breadcrumb-item active">Penilaian </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">



      <?php

        $kritik = "Belum mengisi kritik";
        $saran  = "Belum mengisi saran";

        $update_at = "";

        // button
        $btnText = "Tambah Penilaian";
        $btnColor = "btn-primary";

        if ( $penilaian->num_rows() == 1 ) {

          $baris = $penilaian->row();

          $kritik = $baris->kritik;
          $saran = $baris->saran;


          if ( $baris->update_at ) {  // tidak null

            $update_at = date('l d F Y H.i A', strtotime( $baris->update_at ));
          } else {

            $update_at = date('l d F Y H.i A', strtotime( $baris->created_at ));
          }


          // button
          $btnText = "Sunting Penilaian";
          $btnColor = "btn-warning";
        }
      
      ?>
      <div class="row">
          <div class="col-md-8">
            <div class="card">
            <?php echo $this->session->flashdata('msg') ?>
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-comment"></i>
                  Kritik dan Saran
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <?php if ( $penilaian->num_rows() == 1 ) { ?>
                
                <blockquote class="quote-danger">
                  <p><b>Kritik</b></p>
                  <p>"<?php echo $kritik ?>"</p>
                  <small>Last update <cite title="Source Title"><?php echo $update_at ?></cite></small>
                </blockquote>
                
                <blockquote class="quote-primary">
                  <p><b>Saran</b></p>
                  <p>"<?php echo $saran ?> "</p>
                  <small>Last update <cite title="Source Title"><?php echo $update_at ?></cite></small>
                </blockquote>
                <div class="row">
                  <div class="col-md-4">
                  <a href="<?= base_url("Alumni/penilaian/tambah")?>" class="btn <?php echo $btnColor ?>"><?php echo $btnText ?></a>
                </div>

                <?php } else {  ?>


                  <div class="text-center">
                  
                    <svg style="width: 250px" id="a3c5dfd7-be65-444e-9313-11a650221507" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 830.56679 711.72746"><polygon points="68.348 169.893 455 169.893 455 296.824 440.354 296.824 440.354 330.021 407.157 296.824 68.348 296.824 68.348 169.893" fill="#e6e6e6"/><rect x="79.08798" y="182.25349" width="365.17166" height="101.54506" fill="#fff"/><rect x="108.45338" y="211.90022" width="175.82079" height="5.33572" fill="#00b0ff"/><rect x="108.45338" y="230.35817" width="306.44088" height="5.33572" fill="#e6e6e6"/><rect x="108.45338" y="248.81612" width="306.1408" height="5.33572" fill="#e6e6e6"/><polygon points="386.652 339.785 0 339.785 0 466.717 14.646 466.717 14.646 499.914 47.843 466.717 386.652 466.717 386.652 339.785" fill="#e6e6e6"/><rect x="10.74034" y="352.14621" width="365.17165" height="101.54507" fill="#fff"/><rect x="43.03493" y="382.76932" width="175.8208" height="5.33572" fill="#00b0ff"/><rect x="43.03493" y="401.22726" width="306.4409" height="5.33572" fill="#e6e6e6"/><rect x="43.03493" y="419.68521" width="306.14082" height="5.33572" fill="#e6e6e6"/><polygon points="386.652 0 0 0 0 126.931 14.646 126.931 14.646 160.129 47.843 126.931 386.652 126.931 386.652 0" fill="#e6e6e6"/><rect x="10.74034" y="12.36079" width="365.17165" height="101.54506" fill="#fff"/><rect x="43.03493" y="42.98392" width="175.8208" height="5.33572" fill="#00b0ff"/><rect x="43.03493" y="61.44186" width="306.4409" height="5.33572" fill="#e6e6e6"/><rect x="43.03493" y="79.8998" width="306.14082" height="5.33572" fill="#e6e6e6"/><polygon points="679.314 695.51 663.401 695.509 655.83 634.126 679.317 634.128 679.314 695.51" fill="#ffb8b8"/><path d="M868.08957,805.072l-51.31317-.00191v-.649a19.97358,19.97358,0,0,1,19.97252-19.9722h.00126l31.34034.00127Z" transform="translate(-184.71661 -94.13627)" fill="#2f2e41"/><polygon points="656.939 649.359 642.131 655.186 612.608 600.84 634.464 592.24 656.939 649.359" fill="#ffb8b8"/><path d="M851.08138,756.36359l-47.74953,18.7889-.23767-.60394a19.97357,19.97357,0,0,1,11.27144-25.89874l.00118-.00047,29.16382-11.47552Z" transform="translate(-184.71661 -94.13627)" fill="#2f2e41"/><path d="M836.8057,769.70088l5.06736-186.22422-22.54834,79.833,16.29194,55.393-27.0288,22.97459L781.03553,653.772l-.0488-.15465L808.37141,508.8701l80.99068-3.91825.57931-.02916.09285.573c.078.48171,7.73193,48.54149,1.29553,83.29746C884.9184,623.416,869.4257,770.28906,869.2701,771.76965l-.06655.63128Z" transform="translate(-184.71661 -94.13627)" fill="#2f2e41"/><path d="M812.567,520.48036l-.4573-.18254,15.03-137.88428.43861-.10965c15.275-3.81938,35.85564-3.48536,46.76457-2.94725a7.20471,7.20471,0,0,1,6.74793,6.09225l18.0698,119.01239-.149.213c-12.49252,17.84574-31.5815,22.697-48.64891,22.697A115.19974,115.19974,0,0,1,812.567,520.48036Z" transform="translate(-184.71661 -94.13627)" fill="#00b0ff"/><path d="M884.14261,560.76448l-.54318-.04944L874,379l29.17042,6.58833A13.17336,13.17336,0,0,1,913.296,400.092L909.513,430.29712l1.29616,53.13919c.90319,3.26416,15.67334,57.33506,7.46731,71.42353a6.54421,6.54421,0,0,1-4.06245,3.29205,101.77251,101.77251,0,0,1-24.05778,2.81541C886.47379,560.966,884.199,560.76955,884.14261,560.76448Z" transform="translate(-184.71661 -94.13627)" fill="#3f3d56"/><path d="M798.23922,561.99662a10.32063,10.32063,0,0,1-5.77977-6.86677c-1.90082-7.6527,4.51594-17.27658,5.44226-18.61266l7.7614-73.73316-11.54465-68.11438a8.68128,8.68128,0,0,1,7.59724-10.07895l32.88368-3.66726-1.66916,70.0716c14.11383,47.70484-16.62247,116.48916-16.93463,117.17876l-.17271.38155h-.41864C815.23882,568.55535,811.20774,568.48056,798.23922,561.99662Z" transform="translate(-184.71661 -94.13627)" fill="#3f3d56"/><circle cx="850.5182" cy="335.04827" r="31.8816" transform="translate(-241.19863 354.88194) rotate(-28.6632)" fill="#ffb8b8"/><path d="M887.0246,527.87856a12.17184,12.17184,0,0,1,12.19193-14.13167l11.03525-25.532,17.15133,2.92184L911.3128,526.974a12.23781,12.23781,0,0,1-24.2882.90458Z" transform="translate(-184.71661 -94.13627)" fill="#ffb8b8"/><path d="M902.56245,504.48348l9.11269-54.67683-15.56558-25.94339,3.96547-37.01235.88291-.22057a13.25148,13.25148,0,0,1,15.11177,7.10508l25.42746,53.06567.10173.21169-18.46815,72.55427Z" transform="translate(-184.71661 -94.13627)" fill="#3f3d56"/><path d="M871.41419,360.757c.72863.21108,3.78825-3.24457,7.13869-7.38717a38.47235,38.47235,0,0,0,8.01955-31.25182c-.04646-.24665-.09286-.48076-.1391-.70078-1.1097-5.28044-6.14638-10.14433-11.425-9.02588.39869-4.67793-2.7522-9.0836-6.74525-11.55292s-8.72463-3.38457-13.3381-4.25517c-5.26309-.99319-10.59278-1.99089-15.938-1.65211a31.10761,31.10761,0,0,0-14.53307,4.6423,30.68254,30.68254,0,0,0-12.88638,33.15c6.71749-7.62794,14.67773-15.92507,26.18309-12.61913a21.10906,21.10906,0,0,1,7.15908,3.74434c6.99255,5.49218,10.50836,13.58,13.90909,21.48323,1.69861-4.32494,8.00012-5.95212,11.58033-2.99028,2.29806,1.90113,3.24415,5.0619,3.15731,8.04315a29.61549,29.61549,0,0,1-2.04145,8.6741" transform="translate(-184.71661 -94.13627)" fill="#2f2e41"/><path d="M867.30308,479.86373h-1.5v-5.90137a6.60588,6.60588,0,0,0-6.59863-6.59863H840.40171a6.60588,6.60588,0,0,0-6.59863,6.59863V514.7651a6.60588,6.60588,0,0,0,6.59863,6.59863h18.80274a6.60588,6.60588,0,0,0,6.59863-6.59863V486.86373h1.5Z" transform="translate(-184.71661 -94.13627)" fill="#2f2e41"/><circle cx="665.58647" cy="392.72746" r="4" fill="#fff"/><path d="M853.5672,502.802a12.17181,12.17181,0,0,0-18.05914-4.7132L811.92965,483.3335,799.4682,495.47506l33.58994,20.36967A12.2378,12.2378,0,0,0,853.5672,502.802Z" transform="translate(-184.71661 -94.13627)" fill="#ffb8b8"/><path d="M769.23545,474.69344l21.57512-81.50565a8.72409,8.72409,0,0,1,9.94554-6.31979l7.41787,1.34813,7.90433,43.47285L800.0025,468.33246l29.07887,17.45784-4.08907,32.71128Z" transform="translate(-184.71661 -94.13627)" fill="#3f3d56"/><path d="M1014.28339,805.86373h-381a1,1,0,0,1,0-2h381a1,1,0,0,1,0,2Z" transform="translate(-184.71661 -94.13627)" fill="#3f3d56"/></svg>
                    <h4 style="margin: 5px">Tambahkan Penilaianmu</h4>
                    <small>Masukkan kritik dan saran agar sekolah ......</small> <br><br>
                    <a href="<?= base_url("Alumni/penilaian/tambah")?>" class="btn <?php echo $btnColor ?>"><?php echo $btnText ?></a>
                  
                  </div>
                  
                  
                <?php } ?>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
          <div class="col-md-6">
            
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
       
      </div><!-- /.container-fluid -->

      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</body>
</html>
