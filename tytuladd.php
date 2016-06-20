<?php

#if(!isset($_POST['id'])) $_POST['id'] = 10;
mysql_connect('localhost', 'root', 'root');
mysql_select_db('galeria');

$query = "UPDATE galeria SET
            tytul = '".$_POST['t']."'
            WHERE
            id = '".$_POST['id']."'";
#echo $query;
 if(@mysql_query($query))
    {
     echo json_encode(1);
    }else{
     echo json_encode(0);
    }

?>
