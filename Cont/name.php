<?php
    include ('../Dao/Dao.php');
    $dao =new Dao();
    $name =$_POST['nickname'];
    $game=$dao->cha_one();
    $game->setName($name);

    $dao->zeng($game);
    echo json_encode('ok');
?>