<?php
    session_start();
    unset($_SESSION['user_id']);
    unset($_SESSION['admin_id']);
    unset($_SESSION['error']);
    session_destroy();
?>

<?php include 'header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini" class="hold-transition login-page">

    <?php include 'navbar1.php'; ?>
    <div class="login-logo" style="margin-bottom: -30px; margin-top: 67px; color: purple; font-family: cursive;">
    <b align="center" > BANGTAN LIBRARY MANAGEMENT SYSTEM </b>
    </div>

    <div  >
        <div  class = "first-wrapper"  >
                <br>
                <h1 style="text-align:center; color:black;" class="SubHead"> USER </h1>
                <br>
                <div align="center" class="button"></p><a href="user/user_reg.php" class="link">Sign Up</a></div>
                <br>
                <div align="center" class="button"></p><a href="user/user_login.php" class="link">Login In</a></div>
                <br>
                <br>
        </div>
        <div  class = "second-wrapper" >
                <br>
                <h1 style="text-align:center; color:black;" class="SubHead"> ADMIN </h1>
                <br>
                <div align="center" class="button"></p><a href="admin/admin_reg.php" class="link">Sign Up</a></div>
                <br>
                <div align="center" class="button"></p><a href="admin/index1.php" class="link">Login In</a></div>
                <br>
                <br>
        </div>
  
    </div>

</body>
