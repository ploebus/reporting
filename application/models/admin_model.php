<?php

Class Admin_Model extends CI_Model
  {
  	
  	function get_total($Org){
     $sql = "select (`increase_1000`+`release_1000`+`pre_1000`+`pro_1000`+`ratio_1000`+`assessment_1000`+`other_1000`+`Paid_2000`+`other_2000`+`other_3000`+`other_4000`+`travel_5000`+`equipment_5000`+`workshop_5000`+`incentives_5000`+`contracted_5000`+`other_5000`+`other_6000`) as tot from q1_claims where OrgName='".$Org."';";
     
     $query=$this->db->query($sql);
     $row = $query->result();
     return $row;

    }
  	
    function get_agencies(){

  		$sql = "SELECT OrgName,sum(award_amount) as award FROM qi_award where Orgname <> 'admin' group by OrgName";
  		$query = $this->db->query($sql);
  		return $query->result();

  	}

    function get_last_reported($Org){
      $sql = "Select LastReported from organization where OrgName = '".$Org."';";
      $query = $this->db->query($sql);
      $result = $query->row();
      return $result->LastReported;

    }


function get_data(){
  $query =$this->db->where('OrgName!=','admin');
  $query = $this->db->get('q1_claims');
  return $query->result_array();
}

function table_scheme(){
  $sql = "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='qireporting' AND `TABLE_NAME`='q1_claims';";

  $query = $this->db->query($sql);
  $theReturn=[];
  $columns = $query->result_array();
  //var_dump($columns);
  foreach($columns as $column){
    array_push($theReturn,$column['COLUMN_NAME']);
  }
  return $theReturn;
}

  }