<?php

    interface IDBhelper{
        public function zsg($sql);
        public function cha($sql);
    }

    class DBHelper implements IDBhelper{

         private $localhost='localhost';
         private $username='root';
         private $password='';
         private $shuju='moduleb_myq';


         public function zsg($sql){
             try {
                 $mysql = new mysqli($this->localhost, $this->username, $this->password, $this->shuju);
                 $mysql->query('SET NAMES UTF8');
                 $mysql->query($sql);
                 $mysql->close();
             }catch (Exception $e){
                 echo "zsg出错";
                 return;
             }
         }

         public function cha($sql)
         {
             try {
                 $mysql = new mysqli($this->localhost, $this->username, $this->password, $this->shuju);
                 $mysql->query('SET NAMES UTF8');
                 $fanhui = $mysql->query($sql);
                 $rs = array();
                 $i = 0;
                 while ($row = $fanhui->fetch_array()) {
                     $rs[$i++] = $row;
                 }
                 $fanhui->close();
                 $mysql->close();
                 return $rs;
             } catch (Exception $e) {
                 echo "数据库发生错误";
                 return;
             }
         }
    }
?>