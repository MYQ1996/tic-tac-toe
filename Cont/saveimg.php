<?php
    include_once '../Dao/Dao.php';

    $photo=$_FILES['photo'];
    if($photo['size']<0){
        echo "{'msg':'null'}";
        return;
    }

    $arr=array('jpg','png','gif');
    $arrs=explode('.',$photo['name']);
    $ext=$arrs[count($arrs)-1];
    if(!in_array($ext,$arr)){
        echo json_encode('no');
        return;
    }

    $dir='pictures/'.$photo['name'];
    $dirs='../pictures/'.$photo['name'];
    $upload=copy($photo['tmp_name'],$dirs);


    $dao =new Dao();
    $game = $dao->cha_one();
    $game->setTouxiang($dir);
    $dao->gai($game);

    if($upload=false){
        echo json_encode('no');
        return;
    }else{
        echo "{\"msg\":\"ok\"}";
        return;
    }

?>