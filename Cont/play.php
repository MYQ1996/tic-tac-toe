<?php
    include ('../Dao/Dao.php');
    $dao=new Dao();

//    1.获取落子位置
    $luozi =$_GET['xia'];
//   2.获取棋局 （取）
    $game=$dao->cha_one();
    $qiju=$game->getQiju();
//  3.修改棋局
    $qiju[$luozi]=1;
    $game->setQiju($qiju);
//  4.修改玩家步数
    $game->setO($game->getO()+1);
//  5.修改时间戳
    $game->setEndtime(time());
    $game->setZuitime($game->getEndtime()-$game->getStartime());
//  6.判断玩家输赢
    $game= bisai($qiju,$game);

//  7.电脑落子

    if($game->win==1||$game->win==2||$game->win==3){
        //8.有结果，修改数据库
        $dao->gai($game);

    }else{
        //8.没有结果
        //  随机数
        $shu=rand(1,9);
        while ($qiju[$shu]!=0){
            $shu=rand(1,9);
        }
        //落子
        $qiju[$shu]=2;
        //存棋局
        $game->setQiju($qiju);
//  9.电脑步数
        $game->setX($game->getX()+1);
//  10.判断电脑输赢
        $game=bisai($qiju,$game);
        sleep(1);
        //修改数据库
        $dao->gai($game);

    }

//    123
//    456
//    789

    echo json_encode($game);

    function bisai($qi,$game){
        //如果符合条件，就赢
        if ($qi[1]==$qi[2]&&$qi[2]==$qi[3]){
            $game->setWin($qi[1]);
        }else if($qi[4]==$qi[5]&&$qi[5]==$qi[6]){
            $game->setWin($qi[4]);
        } else if ($qi[7]==$qi[8]&&$qi[8]==$qi[9]){
            $game->setWin( $qi[7]);
        }else if ($qi[1]==$qi[5]&&$qi[5]==$qi[9]){
            $game->setWin($qi[1]);
        }else if($qi[3]==$qi[5]&&$qi[5]==$qi[7]){
            $game->setWin($qi[3]);
        } else if ($qi[1]==$qi[4]&&$qi[4]==$qi[7]) {
            $game->setWin($qi[1]);
        }else if ($qi[2]==$qi[5]&&$qi[5]==$qi[8]) {
            $game->setWin($qi[2]);
        }else if ($qi[3]==$qi[6]&&$qi[6]==$qi[9]) {
            $game->setWin($qi[3]);
        }else if($qi[1]!=0&&$qi[2]!=0&&$qi[3]!=0&&$qi[4]!=0&&$qi[5]!=0&&$qi[6]!=0&&$qi[7]!=0&&$qi[8]!=0&&$qi[9]!=0){
            $game->setWin(1);
            //        0平局
        }
        return $game;
    }
?>