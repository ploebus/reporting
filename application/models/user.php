<?php

Class User extends CI_Model
  {

    function validate()
    {

        
     $this -> db -> where('username', $this->input->post('username'));
     $this -> db -> where('password', md5($this->input->post('password')));
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

   function create_member()
   {
      //ADD ORGANIZATION TO ORG TABLE AND GET ID
   
    $new_organization = array(
        'OrgName' => $this->input->post('agency_name')
      );
    $insert1 = $this->db->insert('organization',$new_organization);
    
    $query2 = $this->db->where('OrgName', $this->input->post('agency_name'));
    $query2 = $this->db->get('organization');
    if($query2 -> num_rows() == 1)
     {
      $row = $query2->row();
      
      $OrgID = $row->OrgID;
     }
    
    //ADD NEW MEMBER
      $new_member_insert_data=array(
        'first_name'=>$this->input->post('first_name'),
        'last_name'=>$this->input->post('last_name'),
        'OrgName'=>$this->input->post('agency_name'),
        'email_address'=>$this->input->post('email_address'),
        'username'=>$this->input->post('username'),
        'password'=>md5($this->input->post('password'))
        );

      
      //CREATE NEW REPORTS FOR NEW ORGANIZATION
      $insert = $this->db->insert('users',$new_member_insert_data);
      $this->create_report($this->input->post('agency_name'),1);
      $this->create_report($this->input->post('agency_name'),2);
      return $insert;
   }

   function create_report($name,$num)
    {
      $new_report = array(
        'OrgName'=>$name,
        'Period'=>$num);
    
      $query = $this->db->insert('q1_claims',$new_report);
      return true;
    }
  }
