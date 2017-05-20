<?php
  session_start();
    function connectDB(){
      // Create connection
      $dbconn = pg_connect("host=localhost port=5432 dbname=fadhilahkhairatun user=postgres password=DhilaKaha09091997");
      
      // Check connection
      if (!$dbconn) {
        $res1 = pg_get_result($dbconn);
        die("Connection failed: ".pg_result_error($res1));
      }
      return $dbconn;
    }

    $conn = connectDB();
    $email = "dhilakaha@gmail.com";
    $isAdmin = false;

    $set = "SET search_path to TOKOKEREN";
    $result = pg_query($conn, $set);
    $result1 = pg_query($conn, "SELECT email, password FROM PENGGUNA WHERE email = '$email'");

    $result2 = pg_query($conn, "SELECT count(email) AS id FROM PELANGGAN WHERE email= '$email'");

    $arr = pg_fetch_array($result2);
        echo $arr['id'];

    if($arr['id'] != '0') {
      echo " adalah $email";
    } else {
      echo 'Nothing';
    }

    $row = pg_fetch_array($result1);
    if($row["email"]==$email && $row["password"]= false)  {
        echo"<script>alert('Login successful!');</script>";
        header("Location: index.html");
    } else { 
        echo $row["email"];
        echo $row["password"];
        echo "<script>alert('Sorry you have not registered yet, Please register');</script>";
    }

?> 