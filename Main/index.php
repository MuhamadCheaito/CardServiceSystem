<?php
include ("../Header/Mainheader.html");
require ("../DataBase/connect.php");
session_start();
if(!isset($_SESSION['username'])){
    $_SESSION['msg'] = "You must log in first to view this page.";
    header('location: ../');
}
if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location: ../');
}
?>
<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h4>Welcome <strong><?php echo strtoupper($_SESSION['username'])?></strong></h4>
        </div>
        <ul class="list-unstyled components">
            <li id="requestCard">
                <a href="#"><i class="fa fa-credit-card"></i> Request a Card</a>
            </li>
            <li>
            <li id="cardlist">
                <a href="#"><i class="fa fa-list-ul"></i> Card List</a>
            </li>
            <li id="customerlist">
                <a href="#"><i class="fa fa-address-book"></i> Customers List</a>
            </li>
            <li id="profile">
                <a href="#"><i class="fa fa-user"></i> Your Profile</a>
            </li>
        </ul>
    </nav>
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button"  id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Toggle Sidebar</span>
                </button>
            </div>
            <form action="index.php" method="get">
            <button class="btn btn-danger float-right" name="logout">Logout</button>
            </form>
        </nav>
        <hr>
        <div class="container">
        </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
      $('#profile').on('click',function (e) {
          e.preventDefault();
          $('ul li').removeClass('active');
          $(this).addClass('active');
         $.ajax({
             type:'post',
             url:'userprofile.php',
             data:{postData: 'username'},
             success:function(response){
                 $('.container').html(response);
             },
         });
      });
      $('#requestCard').on('click',function(e){
            e.preventDefault();
          $('ul li').removeClass('active');
          $(this).addClass('active');
          $.ajax({
                type:'post',
                url:'requestcard.php',
              data:{postData: 'requestCardPage'},
              success:function (response) {
                  $('.container').html(response)
              }
          });
      });
    });
</script>
</body>
</html>
