<?php
    include ('../DBHelper/DBHelper.php');
    include ('../Pojo/Game.php');
    class Dao{
        private $db;
        public function Dao(){
            $this->db = new DBHelper();
        }

        public function zeng(Game $game){
            $sql = "INSERT INTO `moduleb_myq` (`touxiang`, `name`, `o`, `x`, `startime`, `endtime`, `zuitime`, `qiju`, `win`) VALUES ('{$game->getTouxiang()}', '{$game->getName()}', '{$game->getO()}', '{$game->getX()}', '{$game->getStartime()}', '{$game->getEndtime()}', '{$game->getZuitime()}', '{$game->getQiju()}', '{$game->getWin()}')";
            $this->db->zsg($sql);

        }

        public function gai(Game $game){
            $sql = "UPDATE `moduleb_myq` SET `touxiang` = '{$game->getTouxiang()}', `name` = '{$game->getName()}', `o` = '{$game->getO()}', `x` = '{$game->getX()}', `startime` = '{$game->getStartime()}', `endtime` = '{$game->getEndtime()}}', `zuitime` = '{$game->getZuitime()}', `qiju` = '{$game->getQiju()}', `win` = '{$game->getWin()}' WHERE `moduleb_myq`.`id` = 1";
//            echo $sql;
            $this->db->zsg($sql);
        }

        public function gaofenbang(){

            $sql="SELECT * FROM moduleb_myq WHERE `win`=1 ORDER BY `startime`ASC ,`endtime`DESC LIMIT 10";
            $arr=$this->db->cha($sql);
            $games = array();
            for ($i=0;$i<count($arr);$i++){
                $games[$i]=$this->setGame($arr[$i]);
            }
            return $games;
        }



        public function cha_one(){
            $sql="SELECT * FROM moduleb_myq WHERE id = 1";
            $arr=$this->db->cha($sql);
            $game = $this->setGame($arr[0]);
            return $game;

        }

        public function setGame($rs){
            $game=new Game();
            $game->setTouxiang($rs["touxiang"]);
            $game->setName($rs['name']);
            $game->setStartime($rs['startime']);
            $game->setEndtime($rs['endtime']);
            $game->setZuitime($rs['zuitime']);
            $game->setO($rs['o']);
            $game->setX($rs['x']);
            $game->setQiju($rs['qiju']);
            $game->setWin($rs['win']);
            return $game;
        }

    }

?>