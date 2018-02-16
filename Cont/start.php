<?php
    include ('../Dao/Dao.php');
    $dao=new Dao();
    $game =$dao->cha_one();
    $game->setTouxiang('../pictures/default.png');
    $game->setQiju('0000000000');
    $game->setName(" ");
    $game->setO('0');
    $game->setX('0');
    $game->setStartime(time());
    $game->setEndtime("0");
    $game->setZuitime("0");
    $game->setWin('0');
    $dao->gai($game);

    echo "{\"msg\":\"成功\"}"

?>