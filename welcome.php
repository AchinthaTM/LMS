<?php
		require_once 'core/init.php';
	$user = new User();
  if(!$user->isLoggedIn()){
    Redirect::to('login.php');
}
//  $sid = Session::get(Config::get('session/session_name'));
    $username = escape($user->data()->username);
?>
<!DOCTYPE html>
<html>
<head>
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Library Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../images/images.png">
    <link rel="shortcut icon" href="../images/images.png">

    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="../assets/scss/style.css">
    <link href="../assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin:0;
            font-size: 17px;
        }

        .container {
            padding-top: 30px;
            position: relative;
            max-width: 350px;
            margin: 0 auto;
            height: 200px;
            border-radius: 25px;
        }

        .container img {vertical-align: middle;}

        .container .content {
            position: absolute;
            bottom: 0;
            color: #000000;
            width: 100%;
            padding-bottom: 30px;
            text-align: center;
        }

        .content{text-align: center;
            background-color: green;}

        

        
    </style>
    <style>
    .dropbtn {
        background-color: #ffffff;
        color:black;
        padding: 16px;
        font-size: 16px;
        border: none;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {background-color: #ddd;}

    .dropdown:hover .dropdown-content {display: block;}

    .dropdown:hover .dropbtn {background-color: #ffffff;}

    .mp{
        padding-left: 10px;
        padding-right: 10px;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    </style>
</head>
</head>
     <style> body {
    background-image: url("images/library_style_table_books_wooden_39317_1920x1080.jpg");
              } </style>
<body>
    
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand"><img src="images/elib-logo-head.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    
                   
                  
                    
                  

                   
                    <li>
                        <a href=""> <i class="menu-icon ti-"></i></a>
                    </li>
                   

                 
                  
                   
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <?php //echo $sid ;
    $user = new User();
    if($user->isLoggedIn()){
    ?>
    <div style="background-color: white;width: auto; height:70px;">
        <div style="width: auto; height:50px; float: left; padding-left:20px;padding-top: 10px;">
            
        </div>
        <div style=" width: auto; height:70px; float: right; padding-right: 20px;padding-top: 10px;">
            <table border="0">
                <tr>
                    <td>
                        <div class="dropdown">
                          <button class="dropbtn"><?php echo escape($user->data()->name); ?></button>
                          <div class="dropdown-content">
                            <a href="login.php">Logout</a>
                          </div>
                        </div>
                    </td>  
                    <td >
                        <div style="width: auto; height:50px; float: right; padding-right: 20px;padding-bottom: 10px;">
                                <img src='../images/systemAdministration/user.jpg' alt='logo' style='height:50px; width: 50px;'>
                        </div>
                    </td>
                    
                </tr>
            </table>
        </div>
    </div>
    <div>
      </div>
     
    </div>
    <div style="background-color: gray;width: auto; height:3px; ">
    </div>
     <?php
         $employee = DB::getInstance()->query("SELECT MONTH(dob) as month,DAY(dob) as day FROM employee WHERE email = '$username'");
                    if(!$employee->count()) {
                       
                    } else {
                        foreach ($employee->results() as $employee) {
                              $month = $employee->month;
                              $day = $employee->day;
                        }
                    }

        $m = date('m');
        $d = date('d');

         /*if($d == $day && $m == $month){
         
            echo "  <br><div style='padding-right:20px; padding-left:20px;'><button type='button' class='btn btn-warning btn-lg btn-block' data-toggle='modal' data-target='#scrollmodal'><i class='fa fa-envelope'></i>&nbsp;&nbsp;
                          You have a special message !
                      </button><div>";
         
         }else{
         
         }*/
      ?>
       <div class="modal fade" id="scrollmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                              
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <center><img src='../images/systemAdministration/bday.jpg'></center>
                            </div>
                            <div class="modal-footer">
                              
                            </div>
                        </div>
                    </div>
                </div>

      <br>
     
        <br><div><table border = "0" align="center"><tr>
    <?php
       
		
		if($user->hasPermission('fromanager')){
            echo "
                <td class='mp'><a href='../../edited/index.php'><div class='container' align='center' style='background-color:#873600;'>
                  <img src='../images/systemAdministration/hr.png' alt='admin' style='width:25%;''>
                  <div align='center'>
                    <h3>HR Management</h3>
                  </div>
                </div></a></td>";
        }
		
		
		
         if($user->hasPermission('salesmanager')){
            echo "
                <td class='mp'><a href='../../book/index.php'><div class='container' align='center' style='background-color:#633974;'>
                  <img src='../images/systemAdministration/leave.png' alt='admin' style='width:25%;''>
                  <div align='center'>
                    <h3>Book Management</h3>
                  </div>
                </div></a></td>";
        }
        
        
         if($user->hasPermission('restaurentmanager')){
            echo "
                <tr><td class='mp'><a href='adminView.php'><div class='container' align='center' style='background-color:#200F3D;'>
                  <img src='../images/systemAdministration/adminpanel.png' alt='admin' style='width:25%;''>
                  <div align='center'>
                    <h3>user management</h3>
                  </div>
                </div></a></td>";
        }
       
          if($user->hasPermission('supervisor')){
            echo "
                <td class='mp'><a href='../../edited/ViewBooks.php'><div class='container' align='center' style='background-color:#212FED;'>
                  <img src='../images/systemAdministration/leave.png' alt='admin' style='width:25%;''>
                  <div align='center'>
                    <h3>Online Book Management<t/h3>
                  </div>
                </div></a></td>";
             
        }
        if($user->hasPermission('accountsmanager')){
            echo "
                <tr><td class='mp'><a href='../../fi/index.php'><div class='container' align='center' style='background-color:#34495E;'>
                  <img src='../images/systemAdministration/accounting.png' alt='admin' style='width:25%;''>
                  <div align='center'>
                    <h3>Finance Management</h3>
                  </div>
                </div></a></td>";
        }
        if($user->hasPermission('inventorymanager')){
            echo "
                <td class='mp'><a href='../../StockManagement/index.php'><div class='container' align='center' style='background-color:#212F3D;'>
                  <img src='../images/systemAdministration/storehouse.png' alt='admin' style='width:25%;''>
                  <div align='center'>
                    <h3>Library Stock Management</h3>
                  </div>
                </div></a></td>";
        }
     
        
        ?></tr></table></div><?php
    }else{
    	Redirect::to('login.php');
    }
    ?>
<?php
        if(Session::exists('home')){
        $s = Session::flash('home');
        echo '  <br><br><div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                            <span class="badge badge-pill badge-primary">Success</span>
                                                '. $s .'
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
        }
    ?>
    <script src="../assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/main.js"></script>




</body>
</html>