<html>
    <head>
        <?php
            /* Title & Media querys */
            $subtitle='| Subweb Online Licitacions';
            echo '<title>'.$title.' '.$subtitle.'</title>';
            echo '<meta charset="UTF-8">';
            echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
            
            /* Fonts */
            echo '<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">';
            
            /* Css Jquery resources */
            $self = $_SERVER['PHP_SELF'];
            if (strpos($self,"admin/")) {
                include "../System/Errors.php"; //Debug Mode
                echo '<LINK REL=StyleSheet HREF="../Public/css/font-awesome.css" TYPE="text/css" MEDIA=screen>';
                echo '<LINK REL=StyleSheet HREF="../Public/css/style.css" TYPE="text/css" MEDIA=screen>';
                echo '<LINK REL=StyleSheet HREF="../Public/css/menu.css" TYPE="text/css" MEDIA=screen>';
                echo '<LINK REL=StyleSheet HREF="../Public/css/panellAdmin.css" TYPE="text/css" MEDIA=screen>';
                echo '<script src="../Public/jquery/jquery-1.12.0.min.js"></script>';
                echo '<script src="../Public/jquery/jquery-ui.min.js"></script>';
                echo '<link rel="shortcut icon" href="../favicon.ico">';
            }else if (strpos($self,"user/")) {
                include "../System/Errors.php"; //Debug Mode
                echo '<LINK REL=StyleSheet HREF="../Public/css/font-awesome.css" TYPE="text/css" MEDIA=screen>';
                echo '<LINK REL=StyleSheet HREF="../Public/css/style.css" TYPE="text/css" MEDIA=screen>';
                echo '<LINK REL=StyleSheet HREF="../Public/css/menu.css" TYPE="text/css" MEDIA=screen>';
                echo '<LINK REL=StyleSheet HREF="../Public/css/panellUser.css" TYPE="text/css" MEDIA=screen>';
                echo '<script src="../Public/jquery/jquery-1.12.0.min.js"></script>';
                echo '<script src="../Public/jquery/jquery-ui.min.js"></script>';
                echo '<link rel="shortcut icon" href="../favicon.ico">';
            }else{
                include "System/Errors.php"; //Debug Mode
                echo '<LINK REL=StyleSheet HREF="Public/css/font-awesome.css" TYPE="text/css" MEDIA=screen>';
                echo '<LINK REL=StyleSheet HREF="Public/css/style.css" TYPE="text/css" MEDIA=screen>';
                echo '<LINK REL=StyleSheet HREF="Public/css/menu.css" TYPE="text/css" MEDIA=screen>';
                echo '<script src="Public/jquery/jquery-1.12.0.min.js"></script>';
                echo '<script src="Public/jquery/jquery-ui.min.js"></script>';
                echo '<link rel="shortcut icon" href="favicon.ico">';
            }
        ?>
    </head>
    <body>
    <!-- Menu --> 
    <div class="header-box">
        <?php
            session_start();
            if(isset($_SESSION['usuari'])){
                $value=$_SESSION['usuari'];
                //var_dump($value);
            }
            echo '<div class="header-nav">';
                echo'<ul class="nav">';
                    if (strpos($self,"admin/")) {
                        echo'<li><a href="../index.php">Inici</a> <span class="flecha">&#9660</span></li>';
                        /*
                         * Resta de Menus aqui!!
                         */
                        if(!isset($_SESSION['usuari'])){
                            header('Location: ../login.php');
                        }else{
                            if($value['id_tipus'] == 1){   
                                echo'<li style="float:right;"><a>Hola, ';
                                echo $value['user'];
                                echo'<span class="flecha">&#9660</span></a>';
                                    echo'<ul class="panel-ul">';
                                        echo'<div class="panel-zone">';
                                            echo'<div class="panel-img">';
                                                echo'<img src="../Public/img/login.png">';
                                            echo'</div>';
                                            echo'<div class="panel-links">';
                                                if($value['id_tipus'] == 1){
                                                    echo'<a href="AdminPanel.php">AdminPanel</a>';
                                                }
                                                echo'<a href="../user/panel.php"> Configuració</a>';
                                                echo'<a href="../logout.php">Sortir</a>';
                                            echo'</div>';
                                        echo'</div>';
                                    echo'</ul>';
                                echo'</li>';
                            }else{
                                header('Location: ../index.php');
                            }
                        }
                    }else if (strpos($self,"user/")) {
                        echo'<li><a href="../index.php">Inici</a> <span class="flecha">&#9660</span></li>';
                        /*
                         * Resta de Menus aqui!!
                         */
                        if(!isset($_SESSION['usuari'])){
                            header('Location: ../login.php');
                        }else{
                            echo'<li style="float:right;"><a>Hola, ';
                            echo $value['user'];
                            echo'<span class="flecha">&#9660</span></a>';
                                echo'<ul class="panel-ul">';
                                    echo'<div class="panel-zone">';
                                        echo'<div class="panel-img">';
                                            echo'<img src="../Public/img/login.png">';
                                        echo'</div>';
                                        echo'<div class="panel-links">';
                                            if($value['id_tipus'] == 1){
                                                echo'<a href="../admin/AdminPanel.php">AdminPanel</a>';
                                            }
                                            echo'<a href="panel.php"> Configuració</a>';
                                            echo'<a href="../logout.php">Sortir</a>';
                                        echo'</div>';
                                    echo'</div>';
                                echo'</ul>';
                            echo'</li>';
                        }
                    }else{
                        echo'<li><a href="index.php">Inici</a> <span class="flecha">&#9660</span></li>';
                        /*
                         * Resta de Menus aqui!!
                         */
                        if(!isset($_SESSION['usuari'])){
                            echo'<li style="float:right;"><a href="login.php">Login <span class="flecha">&#9660</span></a></li>';
                            echo'<li style="float:right;"><a href="signup.php">Signup <span class="flecha">&#9660</span></a></li>';
                        }else{
                            echo'<li style="float:right;"><a>Hola, ';
                            echo $value['user'];
                            echo'<span class="flecha">&#9660</span></a>';
                                echo'<ul class="panel-ul">';
                                    echo'<div class="panel-zone">';
                                        echo'<div class="panel-img">';
                                            echo'<img src="Public/img/login.png">';
                                        echo'</div>';
                                        echo'<div class="panel-links">';
                                            if($value['id_tipus'] == 1){
                                                echo'<a href="admin/AdminPanel.php">AdminPanel</a>';
                                            }
                                            echo'<a href="user/panel.php"> Configuració</a>';
                                            echo'<a href="logout.php">Sortir</a>';
                                        echo'</div>';
                                    echo'</div>';
                                echo'</ul>';
                            echo'</li>';
                        }
                    } 
                echo'</ul>';
            echo'</div>';
        ?>
        <div class="header-logo">
            <?php
                if (strpos($self,"index")) {
                    echo '  <style>
                                .header-logo{
                                    display:none;
                                }
                            </style>';
                }
                $migasdepan = explode("#",$migas);
                $contmigas = count($migasdepan);
                echo '&nbsp; <i class="fa fa-home"></i> <i class="fa fa-angle-right"></i>';
                for ($i = 0; $i < $contmigas; $i++){
                    $pan = explode("|", $migasdepan[$i]);
                    if ($i <= 1){
                        if(count($pan) == 2){
                            echo '<a href="'.$pan[1].'"> '.$pan[0].'</a> ';
                        }else{
                            echo '<a> '.$pan[0].'</a> ';
                        }
                    }else{
                        if(count($pan) == 2){
                            echo '<i class="fa fa-angle-right"></i><a href="'.$pan[1].'"> '.$pan[0].'</a> ';
                        }else{
                            echo '<i class="fa fa-angle-right"></i><a> '.$pan[0].'</a> ';
                        }
                    }
                }
            ?>
            
        </div>
    </div>