<?php

@session_start();
include "inc/koneksi.php";

if (@$_SESSION['Admin']) {
    header("location:index.php");
    exit();
} else if (@$_SESSION['Kepala']) {
    header("location:kepala/index.php");
    exit();
} else if (@$_SESSION['Karyawan']) {
    header("location:karyawan/index.php");
    exit();
} else if (@$_SESSION['Nasabah']) {
    header("location:nasabah/index.php");
    exit();
} else {

    if (isset($_POST['btnLogin'])) {
        $username = @$_POST['username'];
        $password = @$_POST['password'];

        if ($username == '' || $password == '') {
            header("location:login.php");
            exit();
        } else {
            // Check Admin and Kepala
            $sql = mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE username = '$username' AND password = '$password'");
            $data = mysqli_fetch_array($sql);
            $cek = mysqli_num_rows($sql);

            if ($cek > 0) {
                if ($data['level'] == "Admin") {
                    @$_SESSION['Admin'] = $data['id_pengguna'];
                    echo "<script type='text/javascript'> alert('Selamat Datang Admin'); location.href='index.php'; </script>";
                    exit();
                } else if ($data['level'] == "Kepala") {
                    @$_SESSION['Kepala'] = $data['id_pengguna'];
                    echo "<script type='text/javascript'> alert('Selamat Datang Kepala'); location.href='kepala/index.php?page=dashboard'; </script>";
                    exit();
                } else {
                    // Fallback for invalid level
                    header("location:login.php");
                    exit();
                }
            } else {
                // Check Karyawan
                $sql_karyawan = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE username = '$username' AND password = '$password'");
                $data_karyawan = mysqli_fetch_array($sql_karyawan);
                $cek_karyawan = mysqli_num_rows($sql_karyawan);

                if ($cek_karyawan > 0) {
                    @$_SESSION['Karyawan'] = $data_karyawan['id_karyawan'];
                    @$_SESSION['nik'] = $data_karyawan['nik'];
                    
                    echo "<script type='text/javascript'> alert('Selamat Datang Karyawan'); location.href='karyawan/index.php?page=dashboard'; </script>";
                    exit();
                } else {
                    // Check Nasabah
                    $sql_nasabah = mysqli_query($koneksi, "SELECT * FROM tb_nasabah WHERE username = '$username' AND password = '$password'");
                    $data_nasabah = mysqli_fetch_array($sql_nasabah);
                    $cek_nasabah = mysqli_num_rows($sql_nasabah);

                    if ($cek_nasabah > 0) {
                        $_SESSION['id_nasabah'] = $data_nasabah['id_nasabah'];
                        $_SESSION['nik'] = $data_nasabah['nik'];
                        echo "<script type='text/javascript'> alert('Selamat Datang Nasabah'); location.href='nasabah/index.php?page=dashboard'; </script>";
                        exit();
                    } else {
                        header("location:login.php");
                        exit();
                    }
                }
            }
        }
    }
}
