<?php
    include ('../Dao/Dao.php');
    $dao =new Dao();
    $games=$dao->gaofenbang();
    echo json_encode($games);

?>