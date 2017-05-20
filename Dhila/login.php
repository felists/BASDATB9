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
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $isAdmin = false;

    $set = "SET search_path to TOKOKEREN";
    $result = pg_query($conn, $set);
    $result1 = pg_query($conn, "SELECT email, password, nama FROM PENGGUNA WHERE email = '$email'");

    $result2 = pg_query($conn, "SELECT count(email) AS id FROM PELANGGAN WHERE email= '$email'");

    $role = pg_fetch_array($result2);
        echo $role['id'];

    if($role['id'] == '0') {
      $isAdmin = true;
    }

    $row = pg_fetch_array($result1);
    
      if($row["email"]==$email && $row["password"]==$pass)  {
        if($isAdmin) {
          $_SESSION['isAdmin'] = "yes";
        }
          echo"Login successful!";
          $_SESSION['username'] = $row["nama"];
          header("Location: index.php");
        } else {
          echo "<script>alert('Sorry you have not registered yet, Please register');</script>";
          header("Location: index.php");
        }
    

?> 