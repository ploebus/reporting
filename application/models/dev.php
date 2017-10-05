<?php
Class Dev extends CI_Model
  {

  	function add_child(){
  		
     
     $AssignedTo = ($this->session->userdata('OrgName') == 'admin')? $this->input->post('AssignedTo'):$this->session->userdata('OrgName');
     
     $date = date('Y-m-d H:i:s');

     $theChild=array(
      'child_firstname'=>$this->input->post('first_name'),
      'child_lastname'=>$this->input->post('last_name'),
      'hmg_referral_id'=>$this->input->post('hmg_id'),
      'caregiver_name'=>$this->input->post('caregiver_name'),
      'AssignedTo'=>$AssignedTo,
      'last_status'=> 'enrolled',
      'last_status_date'=>$date
      );
  		$result = $this->db->insert('child',$theChild);
  		
  		
  		//GET CHILD ID
      $sql = 'SELECT child_id from child order by child_id Desc limit 1;';	
  		$query = $this->db->query($sql);	
  		$row = $query->row();
  		
  		//GET STATUS ITEMS
      $this->db->select('value')->where('group','program_status')->where('activeSW','1');
      $this->db->order_by('list_order','asc');
      $items = $this->db->get('lkup_code')->result();

      foreach($items as $item){
  			$first_status = ($item->value == 'enrolled') ? true : false;
        $data = array(
  				'child_id'=>$row->child_id,
  				'status_item'=>$item->value,
  				'status'=> $first_status,
          'status_date' => $date );

  			$this->db->insert('status',$data);
  		}
  	}

  	function remove_child(){
  		$tables = array('child','activity','status');
  		$this->db->where('child_id',$this->input->post('child_id'));
  		$this->db->delete($tables);
  	}

    function sent_incentive(){
      $cid = (string)$this->input->post('cid');
      $this->db->where('child_id', $cid);
      $this->db->where('status_item','i_incentive_sent');
      $this->db->set('status_date', date('Y-m-d H:i:s'));
      $this->db->set('status', 1);
      $this->db->update('status');

    }

  	function get_all_children($status = '1'){
  		
  		$sql = "SELECT c.description, b.activity_date, a.* from child a";
      $sql .= " LEFT JOIN (SELECT DISTINCT child_id, min(activity_date) as activity_date from activity group by child_id) b ON a.child_id=b.child_id";
      $sql .= " LEFT JOIN lkup_code c ON a.last_status=c.value";
      $sql .= " WHERE a.openSW='" . $status . "'";
  		//$this->db->select('*');
  		//$this->db->from('child')->where('openSW', $status);
     
  		//$this->db->join('lkup_code', 'child.last_status=lkup_code.value');

      //NEW CODE

  		if ($this->session->userdata('OrgName') !=='admin'){
  			$sql.=" AND AssignedTo='".$this->session->userdata('OrgName')."'";
        //$this->db->where('AssignedTo', $this->session->userdata('OrgName'));
      }
  		//$this->db->order_by('child_firstname','asc');
      //$this->db->order_by('AssignedTo','asc');
      $sql .= " ORDER BY cohort asc, activity_date asc, child_firstname asc";
      //$query = $this->db->get();
      $query = $this->db->query($sql);
      //echo $sql;
      return $query->result();
  	}


  	function create_cohort($data){
  		$this->db->insert('cohort',$data);
  	}
  	
  	function add_to_group(){
        $this->db->where('child_id', $this->input->post('child_id'));
        $this->db->set('cohort',$this->input->post('addCohort'));
        $this->db->update('child');
    }
    

    function get_cohorts(){
  		$this->db->where('agency_name',$this->session->userdata('OrgName'));
  		$query = $this->db->get('cohort');
  		return $query->result();
  	}

  	function get_cohort($cohort_id){
  		$this->db->where('cohort_id',$cohort_id);
  		$query = $this->db->get('cohort');
  		return $query->row();
  	}

  	function remove_cohort($data){
  		//GET COHORT NAME!
      $this->db->where('cohort_id',$this->input->post('cohort_id'));
      $query = $this->db->get('cohort');
      $row = $query->row();
      //UNSET USERS WHO WHERE IN THE COHORT
      $this->db->where("cohort",$row->cohort_name);
      $this->db->set("cohort",'');
      $this->db->update("child");
      //remove record from cohort table
      $this->db->where('cohort_id',$this->input->post('cohort_id'));
  		$this->db->delete('cohort');

  	}

  	function get_child($child_id){
  		

  		$this->db->where('child_id',$child_id);	
  		$query = $this->db->get('child');
  		$row =  $query->row();
  		return $row;
  	}

  	function update_child($theChild){
  		$this->db->where('child_id',$theChild['child_id']);
  		$this->db->update('child',$theChild);
  	}

    function archive_child($cid,$s='0'){
      $this->db->set('openSW', $s);
      $this->db->where('child_id', $cid);
      $this->db->update('child');
    }

  	function renew_child($info){
      $this->db->set('renewalSW', '1');
      $this->db->set('renewal_date', date('Y-m-d H:i:s', strtotime($info['renewal_date'])));
      $this->db->set('renewal_note', $info['renewal_note']);
      $this->db->where('child_id', $info['child_id']);
      $query = $this->db->update('child');
     }

     

    function add_renewal_status($info){
      $this->db->where('group','renewal_status');
      $query = $this->db->get('lkup_code');
      $values = $query->result();
      foreach ($values as $row) {
       $data = array(
        'child_id'=>$info['child_id'],
        'status_item'=>$row->value);
       $this->db->insert('status',$data);
      }
    }

    function update_status(){
  		$mysqldate = null;
      
      if(strlen($this->input->post('status_date')) > 1){
      $phpdate = strtotime( $this->input->post('status_date'));
      $mysqldate = date( 'Y-m-d H:i:s', $phpdate );
      }

      $newStatus = ($this->input->post('status')=='True')? 1 : 0;
      
      $this->db->set('status', $newStatus);
      $this->db->set('status_date',$mysqldate);
  		$this->db->where('child_id',$this->input->post('child_id'));
  		$this->db->where('status_item',$this->input->post('status_item'));
  		$this->db->update('status');
  		//CHANGE CHILD TABLE TOO
  		
      //$this->db->reset_query();
  		if($newStatus = True){
      $this->db->set('last_status',$this->input->post('status_item'));
  		$this->db->set('last_status_date', $mysqldate);
  		$this->db->where('child_id',$this->input->post('child_id'));
  		$this->db->update('child');
     }
  	}

  	function get_status_items($child_id){
  		$this->db->select('status,description,status_date,status_item');
  		$this->db->from('status');
  		$this->db->join('lkup_code', 'status.status_item=lkup_code.value');
  		$this->db->where('child_id',$child_id);
  		$this->db->not_like('status_item','0');
  		$query = $this->db->get();
  		return $query->result();
  	}

    function check_initial($item,$status){
      $sql = 'SELECT child.child_id, AssignedTo, concat(child_firstname," ", child_lastname) as fullname, date_created
      FROM child
      LEFT JOIN status
      on child.child_id = status.child_id
      WHERE status_item = ?
      and status = ?
      and AssignedTo not in ("admin","Agency 1")
      order by AssignedTo asc';


      $query = $this->db->query($sql,array($item,$status));
      return $query->result();
    }

    function check_returned($item,$status){
      $sql = 'SELECT a.child_id, a.AssignedTo, concat(a.child_firstname," ", a.child_lastname) as fullname, a.status_date
      FROM (select child.*,status_date from child inner join status on child.child_id = status.child_id where status_item = "i_packet_sent" and status = "1") a
      LEFT JOIN status
      on a.child_id = status.child_id
      WHERE status_item = ?
      and status = ?
      and AssignedTo not in ("admin","Agency 1")
      order by AssignedTo asc';
      $query = $this->db->query($sql,array($item,$status));
      return $query->result();
    }

     function get_renewal_status($cid){
      $sql = "SELECT status,description,status_date,status_item 
      FROM status
      left join lkup_code
      on status_item = value
      where child_id = ?
      and `group` = ?";

      $query = $this->db->query($sql,array($cid,'renewal_status'));
      return $query->result();
     }

  	function get_last_status(){
  		$sql = "select a.child_id,a.status_date,b.final,c.description \n"
    . "from\n"
    . "status as a\n"
    . "left join (SELECT child_id,max(status_id) as final FROM `status` WHERE status = '1' group by child_id) as b\n"
    . "on a.status_id = b.final\n"
    . "left join lkup_code as c\n"
    . "on a.status_item=c.value\n"
    . "where b.final is not null";
  	$query = $this->db->query($sql);
  	return $query->result();

  	}

  	function get_agencies(){
  		$sql = "SELECT DISTINCT OrgName as name FROM users where OrgName <> 'admin'";
  		$query = $this->db->query($sql);
  		return $query->result();
  	}

  	function add_activity($data){
 		

  		$this->db->insert('activity',$data);
  	}
  	
  	function update_endnote($data){
  		$phpdate = strtotime( $this->input->post('final_date'));
      $mysqldate = date( 'Y-m-d', $phpdate );
      $this->db->where('child_id',$data['child_id']);
  		$this->db->set('final_status',$data['final_status']);
  		$this->db->set('final_comment',trim($data['final_comment']));
      $this->db->set('final_date',$mysqldate);
      $this->db->set('openSW','0');
  		$this->db->update('child');
  	}
  	
  	function get_activities($child_id){
  		$this->db->where('child_id',$child_id);
  		$query = $this->db->get('activity');
  		return $query->result();
    }

    function get_activity(){
      $this->db->where('activity_id',$this->uri->segment(3,0));
      $query= $this->db->get('activity');
      return $query->row();
    }
    
    function delete_activity(){
      $this->db->where('activity_ID',$this->input->post('activity_ID'));
      $this->db->delete('activity');
    }
    
    function post_edit_activity($id){
      $this->db->where('activity_ID',$id);
      $this->db->update('activity',$this->input->post());
      
    }


    }

