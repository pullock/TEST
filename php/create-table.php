<?php
    class Table {
        public $count;
        public $monthSet;
    
        public function createTable($month, $countGet){
            include '../html/table-inner-html.php';
        }

        public function logic($data, $id){
            if (date('m', strtotime($this->monthSet)) < date('m', strtotime($data['trdate']))){
                $this->createTable($this->monthSet, $this->count);
            }

            if ($data['account_to'] == $id){
                $this->count += $data['amount'];
            } else if ($data['account_from'] == $id){
                $this->count -= $data['amount'];
            }

            $this->monthSet = $data['trdate'];
        }

        public function logicEnd($data, $id){
            $this->createTable($this->monthSet, $this->count);
        }
    }
?>