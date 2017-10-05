<?php
Class Report extends CI_Model
  {
   
    function getBalance($user)
    {

    $this -> db -> where('username', $user);
    $query = $this -> db -> get('users');

     if($query -> num_rows() == 1)
     {
       return $query->row();
     }
     else
     {
       return false;
     }
   }

   
   function getClaims($name,$report)
   {
      $this->db->where('orgName',$name);
      $this->db->where('period',$report);
      $query = $this->db->get('q1_claims');
       if($query -> num_rows() == 1)
     {
       return $query->row();
     }
     else
     {
       return false;
     }

   }

   function update_claim($data)
    {
      $this->db->where("OrgName",$this->session->userdata("OrgName"));
      $this->db->where("period",$data['period']);
      $query = $this->db->update("q1_claims",$data);
      //UPDATE DATE

       $this->db->where("OrgName",$this->session->userdata("OrgName"));
       $sql = "UPDATE organization set LastReported = CURDATE();";

       $this->db->query($sql);
       


      if($query)
       {
         return true;
       }
     else
       {
         return false;
       }

    }

    function get_total($Org){
     $sql = "select (`increase_1000`+`release_1000`+`pre_1000`+`pro_1000`+`ratio_1000`+`assessment_1000`+`other_1000`+`Paid_2000`+`other_2000`+`other_3000`+`other_4000`+`travel_5000`+`equipment_5000`+`workshop_5000`+`incentives_5000`+`contracted_5000`+`other_5000`+`other_6000`) as tot from q1_claims where OrgName='".$Org."';";
     
     $query=$this->db->query($sql);
     $row = $query->result();
     return $row;

    }

    function get_awards($org){
      $this->db->where("OrgName",$org);
      $query = $this->db->get('qi_award');
      if($query->num_rows()> 0){
        return $query->result();

      }
      else{
        return false;
      }
    }



    function delete_award($data){

      $this->db->where("OrgName",$data['OrgName']);
      $this->db->where("award_date",$data['date']);
      $query = $this->db->delete("qi_award");
      if($query){
        return ;
      }

    }

    function add_award($data){
      
      
      var_dump($data);
      $query = $this->db->insert("qi_award",$data);
      return;
    }
  }
