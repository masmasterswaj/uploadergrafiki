<span class="napis">
    <a href="tytul.php?id=<?php echo $id;?>" class="various link" data-fancybox-type="iframe">
    <span class="icon-bubble tytul">
        <span class="tytulview" style="display:none">'.$tytul.'</span>
    </span>
    </a>
    <span class="icon-clock2 czas">
        <span class="czasview" style="display:none">'.$data.'</span>
    </span>
</span>


<style>
    .napis {
            position:relative;
            left:-130px;
            top:-1px;
            font-size: 16px;
            color: #666;
            text-decoration: none;
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
</style>

<?php
    $czas = date('Y.m.d H:i:s',$galeria['data']);
    $tytul = $galeria['tytul'];
    if($tytul == '') $tytul = 'Brak tytulu';
    $id = $galeria['id'];

?>
<script>
    $(document).ready(function(){
      $('.tytul').mouseover(function(){
          $(this).find('.tytulview').attr('style','dispaly:block');
      });
      $('.tytul').mouseout(function(){
          console.log($(this));
          $(this).find('.tytulview').attr('style','dispaly:none');
      });
       $('.tytul').mouseover(function(){
          $(this).find('.tytulview').attr('style','dispaly:block');
      });
      $('.tytul').mouseout(function(){
          $(this).find('.tytulview').attr('style','dispaly:none');
      });


    });

</script>
