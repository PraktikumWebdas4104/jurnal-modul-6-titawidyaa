<html>
<body bgcolor="pink">
 <marquee><h1>HALAMAN LOGIN :)</h1></marquee>
 <hr> 
 <form action="registrasi.php" method="post" enctype="multipart/form-data"> 
<table align="center" border="2">
   <tr>
    <td>NIM :</td>
    <td><input type="text" name="nim"></td>
   </tr>
   <tr>
    <td>PASSWORD :</td>
    <td><input type="password" name="password"></td>
   </tr>
  </table>
  <table align="center"><tr><td align="center"><input type="submit" name="login" value="Log In"></td></center></tr></table>
 </form>
</body>
</html>

<?php 
  if(isset($_POST['submit'])){
    session_start();

    include 'koneksidb.php';

    $nim = $_POST['nim'];
    $password = $_POST['password'];

    $sql = "SELECT nim, password FROM mahasiswa WHERE nim='$nim'";

    $qry = mysqli_query($koneksidb, $sql);
    $row = mysqli_fetch_row($qry);

    if($nim == $row[0]){
      if($password == $row[1]){
        $_SESSION["berhasi login"]=1;
        $_SESSION["nim"]=$row[0];
        $_SESSION["password"]=$row[1];

        echo "SELAMAT LOGIN SUKSES";
      }
      else{
        echo "MAAF PASSWORD YANG DIMASUKKAN SALAH !";
      }
    }
    else{
      echo "MAAF NIM YANG DIMASUKKAN SALAH !";
    }
  }
?>