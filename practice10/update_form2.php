<?php
    include "koneksi.php";
    $qkelas = "select * from kelas";
    $data_kelas = $conn->query($qkelas);
    $qmahasiswa = "select*from mahasiswa left join kelas on kelas.kelas_id = mahasiswa.kelas_id";
    $data_mahasiswa = $conn->query($qmahasiswa); 
    
    $qselect_mahasiswa = "select*from mahasiswa left join kelas on kelas.kelas_id = mahasiswa.kelas_id where mahasiswa_id = ".$_GET['mahasiswa_id'];
    
    foreach($conn->query($qselect_mahasiswa) as $value){
        $data_select_mahasiswa=$value;
    } ;
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Form Mahasiswa</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">
    <link href="../node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      .img-mahasiswa {
        width: 75px;
        height: 100px;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
        <h2>Form Mahasiswa</h2>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          Konten Data
          <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Data Mahasiswa</span>
                <span class="badge badge-secondary badge-pill">0</span>
            </h4>
            <?php
                foreach($data_mahasiswa as $index => $value){
                  $q_kelas_by_id = "SELECT * FROM kelas WHERE kelas_id = " . $value['kelas_id'];
                  $result_kelas = $conn->query($q_kelas_by_id);
                  $kelas = $result_kelas->fetch_assoc();
            ?>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                <img src="<?php echo $value['foto']; ?>" alt="Foto Mahasiswa" class="img-thumbnail img-mahasiswa">
                    <div>
                      <h6 class="my-0"><?php echo $value['nama_lengkap'] ?></h6>
                      <small class="text-muted"><?php echo $value['alamat'] ?></small>
                    </div>
                    <span class="text-muted"><?php echo $kelas['nama'] ?></span>
                    <a href="update_form.php?mahasiswa_id=<?php echo $value['mahasiswa_id'] ?>" type="button" class="close">
                      <span class="fa fa-pencil"></span>
                      </a> 
                    <a href="hapus_data.php?mahasiswa_id=<?php echo $value['mahasiswa_id'] ?>" type="button" class="close">
                      <span class="fa fa-trash"></span>
                    </a>
                </li>
            </ul>
            <?php
                }
            ?>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Input Data</h4> 
          <form action ="simpan_mahasiswa.php" method="POST" >
          <input type="hidden" name="mahasiswa_id" value="<?php echo $data_select_mahasiswa['mahasiswa_id'] ?>"> 
            <div class="mb-3"> 
                <label for="nama_lengkap">Nama Lengkap</label> 
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $data_select_mahasiswa['nama_lengkap'] ?>"  required> 
            </div> 
            <div class="mb-3"> 
                <label for="alamat">Alamat</label> 
                <input type="text" class="form-control" id="alamat" name="alamat"  value="<?php echo $data_select_mahasiswa['alamat'] ?>" required> 
            </div> 
            <div class="mb-3"> 
                <label for="kelas">Kelas</label> 
                <select class="custom-select d-block w-100" id="Kelas" name="kelas_id" required> 
                    <option value="">Pilih...</option>
                    <?php 
                        foreach($data_kelas as $index => $value){
                            if($data_select_mahasiswa['kelas_id']==$value['kelas_id']){
                                $is_selected = 'selected';
                            }
                            else{
                                $is_selected = '';
                            }                                
                        ?> 
                        <option <?php echo $is_selected ?> value="<?php echo $value['kelas_id'] ?>"><?php echo $value['nama'] ?></option> 
                    <?php 
                        } 
                    ?> 
                </select> 
            </div>
            <input type="hidden" name="foto_lama" value="<?php echo $data_select_mahasiswa['foto']; ?>">
            <div class="mb-3">
              <!-- menambahkan fungsi untuk upload foto -->
                <label for="foto">Foto</label><br>
                <img src="<?php echo $data_select_mahasiswa['foto']; ?>" alt="Foto Mahasiswa" class="img-thumbnail img-mahasiswa">
                <input type="file" class="form-control-file" id="foto" name="foto" accept="image/*">
            </div> 
            <div class="row"> 
            </div> 
            <hr class="mb-4"> 
            <button class="btn btn-primary btn-lg btn-block" type="submit">Update Data</button>
            <a href="index.php" class="btn btn-warning btn-lg btn-block" type="submit">Batal</a> 
        </form>
        </div>


      </div>

    </div>
  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2019 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>
<script src="../node_modules/jquery/dist/jquery.min.js" crossorigin="anonymous"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>