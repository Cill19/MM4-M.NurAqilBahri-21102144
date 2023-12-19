<?php
    include "koneksi.php";
    include "create_message.php"; 

    if(isset($_POST['mahasiswa_id'])){
        //Kondisi Update
        $foto_lama = $_POST['foto_lama'];
        $nama_foto = $_FILES['foto']['name'];

        if (!empty($nama_foto)) {
            // Jika ada file baru diunggah
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["foto"]["name"]);
            $error = false;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            $check = getimagesize($_FILES["foto"]["tmp_name"]);
            //cek apakah file termasuk gambar atau bukan
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $error = false;
            } else {
                echo "File is not an image.";
                $error = true;
            }
    
            //cek ukuran gambar
            if ($_FILES["foto"]["size"] > 5000000) {
                echo "Sorry, your file is too large.";
                $error = true;
            }
            
            //gambar yang diizinkan
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $error = true;
            }

            // Upload file baru
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["foto"]["name"]) . " has been uploaded.";
                $foto = $target_file; // Perubahan nama variabel di sini
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            // Jika tidak ada file baru diunggah, gunakan nama file lama
            $foto = $foto_lama;
        }

        //perintah mySQL untuk update data
        $sql = "UPDATE mahasiswa SET nama_lengkap = '".$_POST['nama_lengkap']."', alamat = '".$_POST['alamat']."', kelas_id = '".$_POST['kelas_id']."', foto = '".$foto."' WHERE (`mahasiswa_id` = '".$_POST['mahasiswa_id']."');";
        
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            create_message("Ubah Data Berhasil", "succcess" , "check");
            header("location: index.php");
            exit();
        } else {
            $conn->close();
            create_message("Error: " . $sql . "<br>" . $conn->error,"danger","warning");
            header("location:".$_SERVER['HTTP_REFERER']);
            exit();
        }
    }
    else{
    
        //Kondisi Insert
        //periksa apakah filefoto diunggah
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        $error = false;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["foto"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $error = false;
            } else {
                echo "File is not an image.";
                $error = false;
            }
        }       

        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $error = true;
        }

        if ($_FILES["foto"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $error = true;
        }
        
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $error = true;
        }

        if ($error == true) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    
        //simpah data mahasiswa
        $sql = "INSERT INTO mahasiswa (nama_lengkap, kelas_id, alamat, foto) VALUES ('".$_POST['nama_lengkap']."', ".$_POST['kelas_id'].", '".$_POST['alamat']."', '".$target_file."')";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            create_message("Simpan Data Berhasil","success","check");
            header("location:index.php");
        exit();
        } else {
            $conn->close();
            create_message("Error: " . $sql . "<br>" . $conn->error,"danger","warning");
            header("location:index.php");
        exit();
        }
    }
?>