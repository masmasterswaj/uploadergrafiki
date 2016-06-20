
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Uploader</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="pl" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/jquery.mobile-1.1.0.min.js"></script>
    <script src="js/jquery.easing.compatibility.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/slider/jssor.slider.min.js"></script>
    <link rel="stylesheet" href="js/icon/style.css" />
    <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="js/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>

    <!-- Add fancyBox -->
    <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <script type="text/javascript" src="js/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>
    <style>
         /* ---- BODY i FONTS ------------------------------------------------------------------- */
        /* http://www.fontsquirrel.com/tools/webfont-generator */
        @font-face {
            font-family: 'Pogrubiona';
            src: url('fonts/klavikabasic-bold-webfont.eot');
            src: url('fonts/klavikabasic-bold-webfont.eot?#iefix') format('embedded-opentype'),
                 url('fonts/klavikabasic-bold-webfont.woff2') format('woff2'),
                 url('fonts/klavikabasic-bold-webfont.woff') format('woff'),
                 url('fonts/klavikabasic-bold-webfont.ttf') format('truetype'),
                 url('fonts/klavikabasic-bold-webfont.svg#klavika_basicbold') format('svg');
            font-weight: normal;
            font-style: normal;

        }

        @font-face {
            font-family: 'Normalna';
            src: url('fonts/klavikabasic-regular-webfont.eot');
            src: url('fonts/klavikabasic-regular-webfont.eot?#iefix') format('embedded-opentype'),
                 url('fonts/klavikabasic-regular-webfont.woff2') format('woff2'),
                 url('fonts/klavikabasic-regular-webfont.woff') format('woff'),
                 url('fonts/klavikabasic-regular-webfont.ttf') format('truetype'),
                 url('fonts/klavikabasic-regular-webfont.svg#klavika_basic_regularregular') format('svg');
            font-weight: normal;
            font-style: normal;

        }

        @font-face {
            font-family: 'Cienka';
            src: url('fonts/klavikabasic-light-webfont.eot');
            src: url('fonts/klavikabasic-light-webfont.eot?#iefix') format('embedded-opentype'),
                 url('fonts/klavikabasic-light-webfont.woff2') format('woff2'),
                 url('fonts/klavikabasic-light-webfont.woff') format('woff'),
                 url('fonts/klavikabasic-light-webfont.ttf') format('truetype'),
                 url('fonts/klavikabasic-light-webfont.svg#klavika_basiclight') format('svg');
            font-weight: normal;
            font-style: normal;

        }
        body{
            margin: 0px;
            padding: 0px;
            background-image: url(grafika/tlo.jpg)
        }
        #form {
            width:700px;
            height:auto;
            background-color: #e4e4e4;
            padding: 40px;
            border-radius: 10px;
            margin: 50px auto;
        }
        #napis {
            font-family: Pogrubiona;
            font-size: 25px;
            color: #0054ff;
        }
        .tresc {
            font-family: Cienka;
            font-size: 16px;
            color: #4d4d4d;
            text-align: justify;
        }
        .formularz {
            font-family: Pogrubiona;
            font-size: 16px;
            color: #0054ff;
            width: 150px;
            padding: 7px;
            margin: 10px;
            border-radius: 5px;
            border: 1px solid #bfbfbf;
        }
        .wyr {
            font-family: Pogrubiona;
            font-size: 16px;
            color: #0054ff;
        }
        .upload input[type="file"] {
             display: none;
        }
        .przycisk {
            position:relative;
            height: 60px;
            /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#54a3ee+0,54a3ee+50,3690f0+51,0036f9+100 */
            background: #0054ff; /* Old browsers */
            font-family: Pogrubiona;
            font-size: 16px;
            color: #000;
            margin:10px;
            border:solid #aaa;
            border-width:1px 1px 1px 1px;
            border-radius:5px 5px 5px 5px;
            padding:0px 30px 0px 30px;
            line-height: 60px;
            text-shadow:none;
            color:#fff;
            cursor: pointer;
            float: left;
        }
        hr {
            clear: both;
        }
      </style>

    <body>
        <div id="form">
            <span id="napis">Uploader plików graficznych v.1.0</span>
            <hr />
            <div class="tresc">
            Program służy do uploadowania plików graficznych na serwer z konwersją do rozmiarów
            odpowiednich do wykorzystania ich później w galerii na stronie.
            </div>
            <br />
            <div class="tresc">
            Ustawiono następujące długości:<br/>
            <ul>
                <li>Zdjęcie duże galeria:<span class="wyr"><?php echo $_POST['duze'];?>px</span></li>
                <li>Zdjęcie małe podgląd galerii:<span class="wyr"><?php echo $_POST['podglad'];?>px</span></li>
                <li>Miniatura galerii:<span class="wyr"><?php echo $_POST['miniatura'];?>px</span></li>
            </ul>
            </div>
            <br />
            <div class="tresc">
                <span class="wyr">Potwierdzenie wykonania:</span>
            </div>
            <?php
            $sciezka = "images/";
            if(!mysql_connect('localhost', 'root', 'root')) {
                echo '
                <div class="tresc">Problem z połączeniem:
                <span class="wyr">
                </span>
                </div>';
                }
            if(!mysql_select_db('galeria')) {
                echo '
                <div class="tresc">Problem z połączeniem:
                <span class="wyr">
                </span>
                </div>';
            }else{
                echo '
                <div class="tresc">Połączono z bazą danych</div><br />';
            }

            if(is_uploaded_file($_FILES['plik']['tmp_name']))
                {
                echo '<div class="tresc" style="margin-left:20px">';
                echo 'nazwa pliku: <span class="wyr">'.$_FILES['plik']['name'].'</span>' ;
                echo '<br/>rozmiar: <span class="wyr">'.$_FILES['plik']['size'].'B</span>' ;
                echo '<br/>nazwa w tmp: <span class="wyr">'.$_FILES['plik']['tmp_name'].'</span>';
                echo '<br/>typ: <span class="wyr">'.$_FILES['plik']['type'].'</span>';

                $fullname=$_FILES['plik']['name'];

                if($_FILES['plik']['type'] == 'image/jpeg'
                || $_FILES['plik']['type'] == 'image/png'
                || $_FILES['plik']['type'] == 'image/gif')
                {
                    echo "<br/><br />Plik ma prawidłowy typ";
                    if($_FILES['plik']['size'] < 10 * 1024 * 1024)
                    {
                        echo "<br/>Plik ma prawidłowy rozmiar";
                        if(move_uploaded_file($_FILES['plik']['tmp_name'],"images/".$_FILES['plik']['name']))
                        {
                            echo "<br/>Plik został poprawnie uploadowny";
                            echo '</div><br />';
                            $pos = strrpos($fullname,".");
                            $nazwa = substr($fullname,0,$pos);
                                $roz = substr($fullname,$pos+1,strlen($fullname));


                            $info = @getimagesize("images/".$fullname);
                            # DETEKCJA RODZAJU PLIKU GRAFICZNEGO I POBRANIE GO ZE SCIEZKI
                            switch ($info['mime'])  {
                                case "image/jpeg":
                                    $ram1 =imagecreatefromjpeg("images/".$fullname);
                                    break;

                                case "image/gif":
                                    $ram1 =imagecreatefromgif("images/".$fullname);
                                    break;

                                case "image/png":
                                    $ram1 =imagecreatefrompng("images/".$fullname);
                                    break;
                            }

                            $old_x=imageSX($ram1);
                            $old_y=imageSY($ram1);
                            if($old_x>$old_y)
                            {
                                $new_y=$_POST['duze'];
                                $new_x=$old_x*$new_y/$old_y;
                            }
                            if($old_x<$old_y)
                            {
                                $new_x = $_POST['duze'];
                                $new_y = $old_y * $new_x / $old_x;

                            }
                            if($old_x==$old_y)
                            {
                                $new_x=$_POST['duze'];
                                $new_y=$_POST['duze'];
                            }

                            $ram2 = imagecreatetruecolor($new_x, $new_y);

                            imagecopyresized($ram2,$ram1,0,0,0,0,$new_x,$new_y,$old_x,$old_y);

                            $error = false;
                            switch ($info['mime'])  {
                                case "image/jpeg":
                                    if(imagejpeg($ram2,"images/".$nazwa."_d.".$roz)) $error = false; else $error = true;
                                    break;

                                case "image/gif":
                                    if(imagegif($ram2,"images/".$nazwa."_d.".$roz)) $error = false; else $error = true;
                                    break;

                                case "image/png":
                                    if(imagepng($ram2,"images/".$nazwa."_d.".$roz)) $error = false; else $error = true;
                                    break;
                            }

                            if(!$error) {
                                echo '<div class="tresc" style="margin-left:20px">';
                                echo 'Utworzone zdjęcie duże: <span class="wyr">'.$nazwa."_d.".$roz.'</span>' ;
                                echo '</div>';
                            }else{
                                echo '<div class="tresc" style="margin-left:20px">';
                                echo 'Nie utworzono zdjęcia dużego: <span class="wyr">Błąd</span>' ;
                                echo '</div>';
                            }

                            if($old_x>$old_y)
                            {
                                $y_m=$_POST['miniatura'];
                                $x_m=$old_x*$y_m/$old_y;

                            }
                            if($old_x<$old_y)
                            {
                                $x_m = $_POST['miniatura'];
                                $y_m = $old_y * $x_m / $old_x;

                            }
                            if($old_x==$old_y)
                            {
                                $x_m=$_POST['miniatura'];
                                $y_m=$_POST['miniatura'];

                            }

                            $ram3 = imagecreatetruecolor($x_m, $y_m);
                            imagecopyresized($ram3,$ram1,0,0,0,0,$x_m,$y_m,$old_x,$old_y);

                            $dm = $_POST['miniatura'];
                            $wm = $_POST['miniatura'];

                            $d1 = round($x_m / 2);
                            $w1 = round($y_m / 2);
                            $d2 = round($dm / 2);
                            $w2 = round($wm / 2);
                            $xm = $d1 - $d2;
                            $ym = $w1 - $w2;

                            $ram4=imagecreatetruecolor($dm,$wm);

                            imagecopyresized($ram4,$ram3,0,0,$xm,$ym,$dm,$wm,$dm,$wm);

                            $error = false;
                            switch ($info['mime'])  {
                                case "image/jpeg":
                                    if(imagejpeg($ram4,"images/".$nazwa."_i.".$roz)) $error = false; else $error = true;
                                    break;

                                case "image/gif":
                                    if(imagegif($ram4,"images/".$nazwa."_i.".$roz)) $error = false; else $error = true;
                                    break;

                                case "image/png":
                                    if(imagepng($ram4,"images/".$nazwa."_i.".$roz)) $error = false; else $error = true;
                                    break;
                            }

                            if(!$error) {
                                echo '<div class="tresc" style="margin-left:20px">';
                                echo 'Utworzone miniature - zdjęcie galerii: <span class="wyr">'.$nazwa."_i.".$roz.'</span>' ;
                                echo '</div>';
                            }else{
                                echo '<div class="tresc" style="margin-left:20px">';
                                echo 'Nie utworzono zdjęcia dużego: <span class="wyr">Błąd</span>' ;
                                echo '</div>';
                            }

                            if($old_x>$old_y)
                                {
                                $y_n=$_POST['podglad'];
                                $x_n=$old_x*$y_n/$old_y;
                                }
                            if($old_x<$old_y)
                                {
                                $x_n = $_POST['podglad'];
                                $y_n = $old_y * $x_n / $old_x;
                                }
                            if($old_x==$old_y)
                                {
                                $x_n=$_POST['podglad'];
                                $y_n=$_POST['podglad'];
                                }

                            $ram5 = imagecreatetruecolor($x_n, $y_n);
                            imagecopyresized($ram5,$ram1,0,0,0,0,$x_n,$y_n,$old_x,$old_y);

                            $dn = $_POST['podglad'];
                            $wn = $_POST['podglad'];

                            $d1_n=round($x_n/2);
                            $w1_n=round($y_n/2);
                            $d2_n=round($dn/2);
                            $w2_n=round($wn/2);
                            $xn=$d1_n-$d2_n;
                            $yn=$w1_n-$w2_n;


                            $ram6=imagecreatetruecolor($dn,$wn);

                            imagecopyresized($ram6,$ram5,0,0,$xn,$yn,$dn,$wn,$dn,$wn);

                            $error = false;
                            switch ($info['mime'])  {
                                case "image/jpeg":
                                    if(imagejpeg($ram6,"images/".$nazwa."_m.".$roz)) $error = false; else $error = true;
                                    break;

                                case "image/gif":
                                    if(imagegif($ram6,"images/".$nazwa."_m.".$roz)) $error = false; else $error = true;
                                    break;

                                case "image/png":
                                    if(imagepng($ram6,"images/".$nazwa."_m.".$roz)) $error = false; else $error = true;
                                    break;
                            }

                            if(!$error) {
                                echo '<div class="tresc" style="margin-left:20px">';
                                echo 'Utworzone zdjęcie małe - podgląd galerii: <span class="wyr">'.$nazwa."_m.".$roz.'</span>' ;
                                echo '</div>';
                            }else{
                                echo '<div class="tresc" style="margin-left:20px">';
                                echo 'Nie utworzono zdjęcia dużego: <span class="wyr">Błąd</span>' ;
                                echo '</div>';
                            }
                            $query = "SELECT * FROM galeria WHERE
                                        nazwapliku = '".$nazwa."' and
                                        roz = '".$roz."' and
                                        idgalerii = '".$_POST['nazwadb']."'";
                            $odp = mysql_query($query);
                            if(mysql_num_rows($odp)== 0) {
                            $query = "INSERT INTO galeria SET
                                        nazwapliku = '".$nazwa."',
                                        roz = '".$roz."',
                                        sciezka = 'images/',
                                        data = '".time()."',
                                        tytul = '',
                                        idgalerii = '".$_POST['nazwadb']."'";
                            echo '<br />';
                            if(mysql_query($query))
                                {
                                echo '<div class="tresc" style="margin-left:20px">';
                                echo 'Plik został dodany do bazy danych: <span class="wyr">'.$nazwa.'</span>' ;
                                echo '</div>';
                                }else{
                                echo '<div class="tresc" style="margin-left:20px">';
                                echo 'Problem z dodaniem pliku do bazy danych: <span class="wyr">'.mysqli_error().'</span>' ;
                                echo '</div>';
                                }

                            }else{
                                echo '<div class="tresc" style="margin-left:20px">';
                                echo 'Plik już istnieje w bazie danych: <span class="wyr">'.$_FILES['plik']['name'].'</span>' ;
                                echo '</div>';
                            }
                        }
                    }else{
                        echo '<div class="tresc" style="margin-left:20px">';
                        echo 'Plik jest zbyt duży MAKS 2MB: <span class="wyr">'.$_FILES['plik']['size'].'B</span>' ;
                        echo '</div>';
                    }
                }else{
                    echo '<div class="tresc" style="margin-left:20px">';
                    echo 'Plik ma niedopuszcalny TYP: <span class="wyr">'.$_FILES['plik']['type'].'</span>' ;
                    echo '</div>';
                }
            }else{
                echo '<div class="tresc" style="margin-left:20px">';
                echo 'Plik się nie uploadował: <span class="wyr">'.$_FILES['plik']['name'].'</span>' ;
                echo '</div>';
            }
            mysql_close($link);
            ?>
            <br />
            <br />
            <a href="index.php"><div class="przycisk" style="width:130px;">Powrót do uploadu</div></a>
            <a href="galeria3.php"><div class="przycisk" style="width:50px;">Galeria</div></a>
            <br />
            <hr />
            <div class="tresc" style="width:100%;">Uploader plików graficznychL <span class="wyr">(c) 2016 v.1.0</span></div>
        </div>
    </body>
    </html>









