<?php
    include ('../Dao/Dao.php');
    $dao=new Dao();
    $game=$dao->cha_one();
    echo json_encode($game);
?>