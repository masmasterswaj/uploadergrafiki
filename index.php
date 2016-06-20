<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Uploader</title>
    <!-- Dyrektywa meta dla urządzeń mobilnych ustawiająca pełen ekran -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="pl" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!-- jQuery - pełna wersja skompresowana -->
    <script src="js/jquery-2.1.4.min.js"></script>
    <!-- jQuery - wersja dla urządzeń mobilnych -->
    <script src="js/jquery.mobile-1.1.0.min.js"></script>
    <!-- jQuery - bibioteka poprawiająca kompatybilość starszych skryptów jQuery do nowej bibilioteki -->
    <script src="js/jquery.easing.compatibility.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- bibioteka gotowych ikonek w postaci czcionki --------->
    <link rel="stylesheet" href="js/icon/style.css" />
    <!-- Biblioteka poprawiająca obsługę myszy dla zdarzeń jQuery -->
    <script type="text/javascript" src="js/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>

    <!-- FancyBox - biblioteka pozwalająca wywoływać okienka popup z DIV -->
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
            background-image: url(grafika/tlo.jpg);
            font-family: Normalna;
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
            float:left;
        }
        hr {
            clear: both;
        }
      </style>

    <body>
        <div id="form">
            <span id="napis"><span class="icon-spinner4"></span> Uploader plików graficznych v.1.0</span>
            <hr />
            <div class="tresc">
            Program służy do uploadowania plików graficznych na serwer z konwersją do rozmiarów
            odpowiednich do wykorzystania ich później w galerii na stronie.
            </div>
            <br />
            <div class="tresc">
                Dopuszczalne są następujące pliki graficzne: <b>gif</b>, <b>png</b>, <b>jpg</b>. Poniżej należy ustawić
            parametry 3 plików wynikowych lub pozostawić wartości domyślne.
            <br />
                Powstaną 3 pliki plus duży plik, który zostaje uploadowany oraz 3 z sufixami <b>_d _m _i</b>
            </div>
            <br />
            <div class="tresc">
                <span class="wyr">Parametry:</span>
            </div>
            <br />
            <form action="uploadFile.php" method="POST" ENCTYPE="multipart/form-data">
            <div class="tresc">
                Długość dużego zdjęcia wyświetlanego w galerii - <span class="wyr">sufix _d</span>
            </div>
            <input type="number" max="1000" min="400" value="600" step="10" name="duze" class="formularz" required />
            <br />
            <div class="tresc">
            Długość miniatury podglądu - <span class="wyr">sufix _m</span>
            </div>
            <input type="number" max="400" min="200" value="300" step="10" name="podglad" class="formularz" required/>
            <br />
            <div class="tresc">
            Długość miniatury wyświetlanej w liście galerii - <span class="wyr">sufix _i</span>
            </div>
            <input type="number" max="200" min="50" value="150" step="10" name="miniatura" class="formularz" required/>
            <br />
            <div class="tresc">
            Nazwa galerii
            </div>
            <input type="text" name="nazwadb" class="formularz" value="nowa" required/>
            <br />
            <div class="upload">
                <input type="file" name="plik" id="plik"/>
                <label for="plik">
                    <div class="przycisk">Wskarz plik graficzny</div>
                </label>
            </div>
            <input type="submit" class="przycisk" name="wyslij" value="Prześlij plik" />
            <a href="galeria3.php"><div class="przycisk" style="width:50px;">Galeria</div></a>
            </form>
            <hr />
            <div class="tresc">Uploader plików graficznych<span class="wyr">(c) 2016 v.1.0</span></div>
        </div>
    </body>
    </html>
