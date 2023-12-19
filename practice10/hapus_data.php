<?php
    include "koneksi.php";
    include "create_message.php";

    $sql = "DELETE from mahasiswa where mahasiswa_id=".$_GET['mahasiswa_id'];
    if ($conn->query($sql) === TRUE) {
        $conn->close(); 
        header("location:index.php");
        create_message("Hapus Data Berhasil","success","check");
        exit();
    } else {
        $conn->close();
        create_message("Error: " . $sql . "<br>" . $conn->error,"danger","warning");
        header("location:index.php");
        exit();
    }
?>