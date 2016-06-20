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
            width:auto;
            height:auto;
            background-color: #e4e4e4;
            padding: 40px;
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
            margin: 10px -20px 20px 0px;
            border-radius: 5px;
            #border: 2px solid #999;
        }
        .napis {
            position:relative;
            left:-130px;
            top:-1px;
            font-size: 16px;
            color: #666;
            text-decoration: none;

        }
        .czasview{
            position: absolute;
            font-family: Normalna;
            font-size: 16px;
            color:#666;
            left:2px;
            top:-41px;
            padding: 5px 10px 5px 10px;
            background: #e4e4e4;
            border-radius: 5px;
            text-align: center;
            border:1px solid #999;
            white-space:nowrap;

        }
        .tytulview{
            position: absolute;
            font-family: Normalna;
            font-size: 16px;
            color:#666;
            left:2px;
            top:-41px;
            padding: 5px 10px 5px 10px;
            background: #e4e4e4;
            border-radius: 5px;
            text-align: center;
            border:1px solid #999;
            white-space:nowrap;
            text-decoration: none;

        }
        .czas {
            cursor: pointer;
        }
        .tytul {
            cursor: pointer;
        }
        .przyciskwyb {
            position:relative;
            width: auto;
            height: 41px;
            background: #0054ff;
            font-family: Pogrubiona;
            font-size: 16px;
            color: #000;
            margin:10px;
            border:solid #aaa;
            border-width:1px 1px 1px 1px;
            border-radius:5px 5px 5px 5px;
            padding:0px 30px 0px 30px;
            line-height: 41px;
            text-shadow:none;
            color:#fff;
            cursor: pointer;
        }
        .fancybox-skin {
            background: #000;
        }
        .link {
            font-size: 16px;
            color: #666;
            text-decoration: none;
        }
      </style>

    <body>
        <script>
            $(document).ready(function(){
                $('#button').click(function(){
                    var tytul = $('#tytul').val();
                    var idzdjecia = <?php echo $_GET['id'];?>;
                    $.ajax({
                        type:'POST',
                        dataType:'json',
                        url:'tytuladd.php',
                        data:{
                            t:tytul,
                            id:idzdjecia,
                        },
                        success:function(data){
                            if(data == 1)
                                $('#info').html('Zakualizowano tytuł');
                            else
                                $('#info').html('Wystąpił bład aktualizacji');
                        },
                        error:function(){alert('BLAD KOMUNIKACJI Z SERWEREM')},
                    });

                });
            });
        </script>
        <?php
            if(!mysql_connect('localhost', 'root', 'root')) {
                echo '
                <div class="tresc">Problem z połączeniem z MySQL:
                <span class="wyr">
                </span>
                </div>';
                }
            if(!mysql_select_db('galeria')) {
                echo '
                <div class="tresc">Problem z połączeniem z bazą danych:
                <span class="wyr">
                </span>
                </div>';
            }
            $query = "SELECT tytul FROM galeria WHERE id = '".$_GET['id']."'";
            $odp = @mysql_query($query) or die ('Blad odczytu tytułu zdjecia z MySQL: <br /><span class="wyr">'.mysql_error().'</span>');
            $tytulArray = mysql_fetch_array($odp);

        ?>
        <div id="form">
            <div class="tresc">
            Tytul zdjęcia
            </div>
            <input type="text" id="tytul" class="formularz" value="<?php echo $tytulArray['tytul']?>" style="width:300px;"/>
            <input type="button" id="button" value="Aktualizuj" class="przyciskwyb" />
            <input type="hidden" value="<?php echo $_GET['id'];?>" id="idzjecie" />
            <br />
            <div id="info" class="tresc"></div>
        </div>
    </body>
    </html>


