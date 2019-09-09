<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Ledgermanagement extends CI_Model
    {

        public function getLedgerList($uId,$sDate='',$eDate=''){

            $where = '';
            if(isset($sDate) && $sDate!='' && isset($eDate) && $eDate!=''){
                $where.= " AND T.posted_on >= '".$sDate."' AND T.posted_on <= '".$eDate."'";
            }

            if(isset($uId) && $uId!=''){
                $sql = "SELECT T.*,O.orderno FROM transaction AS T
                    JOIN orders AS O
                    ON T.order_id = O.id 
                    WHERE T.user_id = '".$uId."' 
                    $where
                    ORDER BY T.posted_on DESC";
            }else{
                $sql = "SELECT T.*,O.orderno FROM transaction AS T
                    JOIN orders AS O
                    ON T.order_id = O.id 
                    WHERE 1
                    $where
                    ORDER BY T.posted_on DESC";
            }
            
            return $this->db->query($sql)->result_array();  


        }
    }
?>