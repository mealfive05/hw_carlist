<?php
session_start();
$userName = "Guest";
if (isset($_SESSION["userName"])) {
  $userName = $_SESSION["userName"];
}
$_SESSION["BackTo"] = "index.php";        //把最後離開的頁面加入session中


require_once("config.php");
$link = mysqli_connect($dbhost, $dbuser, $dbpass);
$result = mysqli_query($link, "set names utf8");
mysqli_select_db($link, $dbname);
$sqlCommand = "select * from Products ";
$result = mysqli_query($link, $sqlCommand);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Lab - index</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <style>
    .card {
      width: 27%;
      display: inline-block;
      margin-left: 3%;
      margin-top: 3%;

    }

    img {
      display: block;
      width: 250px;
      height: 200px;



    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row align-items-start">
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>

        <div class="card">
          <a href="Products_details.php?pid=<?= $row["pid"] ?>"><img src="images/<?= $row["pname_e"] ?>.png" class="card-img-top" alt="..."></a>
          <div class="card-body">
            <hr>
            <h5 class="card-title"><?= $row["pname"] ?></h5>
            <p class="card-text">售 價：<?= $row["price"] ?></p>
            <a href="Products_details.php?pid=<?= $row["pid"] ?>" class="btn btn-primary">去購買</a>
          </div>
        </div>
      <?php } ?>
    </div>

  </div>

  <div class="container">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>

      <div class="col-md-6">
        <div class="card">
          <img src="images/<?= $row["pname_e"] ?>.png">
          <div class="card-body">
            <h5 class="card-title"><?= $row["pname"] ?></h5>
            <p class="card-text">售 價：<?= $row["price"] ?></p>
          </div>
        </div>
      </div>

    <?php } ?>
  </div>

  <table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    <tr>
      <td align="center" bgcolor="#CCCCCC">
        <font color="#FFFFFF">會員系統 - 首頁</font>
      </td>
    </tr>
    <tr>
      <td align="center" valign="baseline">
        <?php if ($userName == "Guest") { ?>
          <a href="login.php">登入</a>
        <?php } else { ?>
          <a href="login.php?signout=1">登出</a>
        <?php } ?>

        | <a href="carlist.php">查看購物車</a></td>

    </tr>
    <tr>
      <td align="center" bgcolor="#CCCCCC">welcome! <?php echo $userName; ?></td>
    </tr>
  </table>

</body>

</html>