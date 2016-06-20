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
    <link rel="stylesheet" href="js/lightbox/css/lightbox.min.css" />
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
            width: auto;
            height: 60px;
            background: #0054ff;
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
            float:left;
        }
        hr {
            clear: both;
        }
        #galeria img {
            margin: 10px;
            border-radius: 5px;
            #border: 2px solid #999;
        }
      </style>

    <body>
        <div id="form">
            <span id="napis">Galeria</span>
            <hr />
            <div class="tresc">
            Przykładowa galeria z uploadowanych plików
            </div>
            <br />
            <div id="galeria">
            <?php
            $path_dir = 'images/';
            if($uchwyt = @opendir($path_dir))

                {
                while($plik = readdir($uchwyt))
                    {
                        $pos = strrpos($plik,".");
                        $nazwa = substr($plik,0,$pos);
                        $roz = substr($plik,$pos+1,strlen($plik));
                        $sufix = substr($nazwa,-2);
                        $nazwaNoSufix = substr($nazwa,0,strlen($nazwa)-2);
                        if($plik != '.' && $plik != '..' && $sufix == '_i')
                            {
                            /*
                            echo 'Plik: <b>'.$plik.'</b></br>';
                            echo 'nazwa: <b>'.$nazwa.'</b></br>';
                            echo 'roz: <b>'.$roz.'</b></br>';
                            echo 'sufix: <b>'.$sufix.'</b></br>';
                            echo '--------------------------------------</br>';
                            */
                            echo '
                            <a href="'.$path_dir.$nazwaNoSufix.'_d.'.$roz.'" data-lightbox="galeria"><img src="'.$path_dir.$plik.'" /></a>
                                        <span id="napis"><span class="icon-image"></span>

                            ';
                            }
                    }
                }
            ?>
            </div>
            <br />
            <a href="index.php"><div class="przycisk" style="width:100px;">Upload plików</div></a>
            <br />
            <hr />
            <div class="tresc">Uploader plików graficznych <span class="wyr">(c) 2016 v.1.0</span></div>
        </div>
        <script type="text/javascript" src="js/lightbox/js/lightbox.min.js"></script>
    </body>
    </html>


