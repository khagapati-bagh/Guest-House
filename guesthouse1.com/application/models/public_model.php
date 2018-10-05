<?php if ( ! defined('BASEPATH')) exit('No direct script allowed');

class Public_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function login($id,$pwd)
	{
		$this->db->select('*');
		$this->db->from('iris');
		$this->db->where('id',$id);
		$this->db->where('password',md5($pwd));
		$query = $this->db->get();
		if(count($query->result()) == 1)
		{
			foreach($query->result() as $row)
			{
				$user_session = array(
					'userid' => $row->id,
					'username' => $row->first_name,
					'type' => $row->type,
					'department' => $row->department,
					'chkin' => '',
					'chkout' => '',
				);
				$this->session->set_userdata($user_session);
				return true;
			}
		}
	}

	public function logout()
	{
		$user_session = array(
			'userid' => '',
			'username' => '',
			'type' => '',
			'department' => '',
		);
		$this->session->unset_userdata($user_session);
		$this->session->sess_destroy();
	}

	/*public function booking()
	{	
		$SQL = "select max(booking_id) as id from booking";
		$query = $this->db->query($SQL);
		$num = $query->row_array();
		$booking_data = array(
			'booking_id' => $num['id']+1,
			'booked_by' => $this->session->userdata['username'],
			'booking_date_time' => date('Y-m-d H:i:s'),
			'check_in_date' => $this->input->post('chkin'),
			'check_out_date' => $this->input->post('chkout'),
			'rooms' => 1,
			'adults' => 1,
			'children' => 1,
		);
		$this->db->insert('booking',$booking_data);
		return true;
	}*/

	

	/*public function total_rooms_all($room_type)
	{
		$sql = "select room_number
				from rooms
				where room_type = '".$room_type."'";
		$query = $this->db->query($sql);
		return (count($query->result()));	
	}*/

	public function total_rooms_all($room_type)
	{
		$sql = "select g.guesthouse_number,r.room_number
				from rooms r,guesthouse g
				where r.guesthouse_number = g.guesthouse_number
				and room_type = '".$room_type."'";
		$query = $this->db->query($sql);
		return (count($query->result()));	
	}

	/*public function booked_all($room_type,$chkin,$chkout){
		$sql = "select b.room_number
				from application_form af,booking b,guesthouse g,confirm c
				where af.application_number = c.application_number
				and c.booking_id = b.booking_id
				and g.guesthouse_number = b.guesthouse_number
				and g.room_type = '".$room_type."'
				and ( ('".$chkin."'<=af.check_in_date and '".$chkout."'>=af.check_out_date)
				or ( '".$chkin."' between af.check_in_date and af.check_out_date)
				or ('".$chkout."' between af.check_in_date and af.check_out_date) )";
				$query = $this->db->query($sql);
		return (count($query->result()));
	}*/

	public function confirmed_nac($chkin,$chkout){
		$sql = "select sum(af.number_of_non_ac_rooms) as sum
				from application_form af,confirm c
				where af.application_number = c.application_number
				and ( ('".$chkin."'<=af.check_in_date and '".$chkout."'>=af.check_out_date)
				or ( '".$chkin."' between af.check_in_date and af.check_out_date)
				or ('".$chkout."' between af.check_in_date and af.check_out_date) )";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		return $row['sum'];
	}

	public function confirmed_ac($chkin,$chkout){
		$sql = "select sum(af.number_of_ac_rooms) as sum
			from application_form af,confirm c
			where af.application_number = c.application_number
			and ( ('".$chkin."'<=af.check_in_date and '".$chkout."'>=af.check_out_date)
			or ( '".$chkin."' between af.check_in_date and af.check_out_date)
			or ('".$chkout."' between af.check_in_date and af.check_out_date) )";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		return $row['sum'];
	}

	public function pending_applications($chkin,$chkout)
	{
		/*$sql = "select application_number
				from application_form
				where check_in_date between '".$chkin."' and '".$chkout."'
				or check_out_date between '".$chkin."' and '".$chkout."'
				and faculty_status = 2";*/

		$sql = "select application_number
				from application_form af
				where faculty_status = 2
				and ( ('".$chkin."'<=af.check_in_date and '".$chkout."'>=af.check_out_date)
				or ( '".$chkin."' between af.check_in_date and af.check_out_date)
				or ('".$chkout."' between af.check_in_date and af.check_out_date) )";
		$query = $this->db->query($sql);
		return count($query->result_array());
	}

	/*public function booked_ac_all($t1,$t2)
	{
		$sql = "select sum(b.number_of_rooms) as sum
				from application_form af,booking b
				where af.application_number = b.application_number
				and b.room_type = 'AC'
				and ( ('".$t1."'<=af.check_in_date and '".$t2."'>=af.check_out_date)
				or ( '".$t1."' between af.check_in_date and af.check_out_date)
				or ('".$t2."' between af.check_in_date and af.check_out_date) )";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		return $row['sum'];
	}

	public function booked_nac_all($t1,$t2)
	{
		$sql = "select sum(b.number_of_rooms) as sum
				from application_form af,booking b
				where af.application_number = b.application_number
				and b.room_type = 'Non-AC'
				and ( ('".$t1."'<=af.check_in_date and '".$t2."'>=af.check_out_date)
				or ( '".$t1."' between af.check_in_date and af.check_out_date)
				or ('".$t2."' between af.check_in_date and af.check_out_date) )";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		return $row['sum'];
	}*/

	public function total_rooms($guesthouse_number,$room_type)
	{
		$sql = "select room_number
				from rooms
				where room_type = '".$room_type."'
				and guesthouse_number = ".$guesthouse_number."";
		$query = $this->db->query($sql);
		return count($query->result_array()); 
	}

	public function booked_rooms($guesthouse_number,$room_type,$chkin,$chkout)
	{
		$sql = "select sum(b.number_of_rooms) as sum
				from application_form af, booking b
				where af.application_number = b.application_number
				and b.room_type = '".$room_type."'
				and b.guesthouse_number = ".$guesthouse_number."
				and ('".$chkin."' between af.check_in_date and af.check_out_date
				or '".$chkout."' between af.check_in_date and af.check_out_date)";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		return $row['sum'];
	}

	public function booked_ac($guesthousenumber,$t1,$t2)
	{
		/*$sql = "select sum(b.number_of_rooms) as sum
				from application_form af,booking b
				where af.application_number = b.application_number
				and b.guesthouse_number = ".$guesthousenumber."
				and ( ('".$t1."' between af.check_in_date and af.check_out_date
				or '".$t2."' between af.check_in_date and af.check_out_date )
				or (af.check_in_date between '".$t1."' and '".$t2."' 
				or af.check_out_date between '".$t1."' and '".$t2."') )";*/

		$sql = "select sum(b.number_of_rooms) as sum
				from application_form af,booking b
				where af.application_number = b.application_number
				and b.room_type = 'AC'
				and b.guesthouse_number = ".$guesthousenumber."
				and ( ('".$t1."'<=af.check_in_date and '".$t2."'>=af.check_in_date)
				or ( '".$t1."' between af.check_in_date and af.check_out_date)
				or ('".$t2."' between af.check_in_date and af.check_out_date) )";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		return $row['sum'];
	}

	public function booked_nac($guesthousenumber,$t1,$t2)
	{
		/*$sql = "select sum(b.number_of_rooms) as sum
				from application_form af,booking b
				where af.application_number = b.application_number
				and b.guesthouse_number = ".$guesthousenumber."
				and (('".$t1."' between af.check_in_date and af.check_out_date
				or '".$t2."' between af.check_in_date and af.check_out_date )
				or (af.check_in_date between '".$t1."' and '".$t2."' 
				or af.check_out_date between '".$t1."' and '".$t2."') )";*/

		$sql = "select sum(b.number_of_rooms) as sum
				from application_form af,booking b
				where af.application_number = b.application_number
				and b.room_type = 'Non-AC'
				and b.guesthouse_number = ".$guesthousenumber."
				and ( ('".$t1."'<=af.check_in_date and '".$t2."'>=af.check_in_date)
				or ( '".$t1."' between af.check_in_date and af.check_out_date)
				or ('".$t2."' between af.check_in_date and af.check_out_date) )";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		return $row['sum'];
	}

	/*public function check_availability1()
	{
		$room_type = $this->input->post('roomtype');
		$bed_type = $this->input->post('bedtype');
		$check_in = $this->input->post('chkin');
		$this->db->select('*');
		$this->db->from('rooms');
		$this->db->where('status','available');
		$this->db->where('room_type','Non-AC');
		$this->db->where('bed_type',$bed_type);
		$this->db->or_where('check_out <=',$check_in);
		$this->db->where('room_type',$room_type);
		$this->db->where('bed_type',$bed_type);
		$query = $this->db->get();
		return (count($query->result()));	
	}*/

	/*public function insert($data = array())
	{
        if(!array_key_exists("created",$data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified",$data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        $insert = $this->db->insert($this->tableName,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }*/

    public function app_count()
    {
    	$sql = "select application_number
    			from application_form
    			order by application_number desc
    			limit 1";
    	$query = $this->db->query($sql);
    	$row = $query->row_array();
    	return $row['application_number'];
    }

    public function insert($document)
	{
		$var = $this->public_model->app_count() + 1;
        $app_data = array(
        	'application_number' => $var ,
        	//'booking_id' => 'GH'.$var3,
        	'first_name' => trim($this->input->post('fname')),
        	'last_name' => trim($this->input->post('lname')),
        	'gender' => trim($this->input->post('gender')),
        	'id_card_type' => trim($this->input->post('id_type')),
        	'id_card_number' => trim($this->input->post('id_number')),
        	'address_field' => trim($this->input->post('address')),
        	'submitted_by' => $this->session->userdata('userid'),
        	'submitted_on' => date('Y-m-d H:i:s'),
        	'check_in_date' => $this->input->post('chkin1'),
        	'check_out_date' => $this->input->post('chkout1'),
        	'city' => trim($this->input->post('dist')),
        	'state' => trim($this->input->post('state')),
        	'country' => trim($this->input->post('country')),
        	'pincode' => trim($this->input->post('pincode')),
        	'number_of_ac_rooms' => trim($this->input->post('room_ac')),
        	'number_of_non_ac_rooms' => trim($this->input->post('room_non_ac')),
        	'number_of_persons' => trim($this->input->post('persons')),
        	'relation_with_applicant' => trim($this->input->post('relation')),
        	'nature_of_visit' => trim($this->input->post('optradio')),
        	'document' => $document,
        	'contact_number' => trim($this->input->post('contact_number')),
        	'email_id' => trim($this->input->post('email_id')),
        	'status' => 0,
        );
        $insert = $this->db->insert('application_form',$app_data);
        /*print_r($insert);
        exit();*/
        if($insert){
            return true;
        }else{
            return false;    
        }
    }

    public function get_count()
    {
    	$this->db->select('*');
		$this->db->from('application_form');
		$query = $this->db->get();
		return count($query->result());
    }

    public function get_user_detail($id)
    {
    	$this->db->select('*');
    	$this->db->from('application_form');
    	$this->db->where('booking_id',$id);
    	$query = $this->db->get();
    	return $query->row_array();
    }

   /* public function booking($id)
	{	
		$data['userdetail'] = get_user_detail($id);
		$a=0;
		foreach($this->input->post('fname') as $num)
		{
			$user_data = array(
				'booking_id' => $userdetail['booking_id'],
				'first_name' => trim($this->input->post('fname['.$a.']')),
        		'last_name' => trim($this->input->post('lname['.$a.']')),
        		'check_in_date' => $userdetail['check_in_date'],
        		'check_out_date' => $userdetail['check_out_date'],
        		'room_number' => trim($this->input->post('room_number['.$a.']')),
        	);
        	$this->db->insert('booking',$userdata_data);
        	$a+=1;
		} 
		return true;
	}*/

	public function page($status,$type,$table,$nature_of_visit)
	{
			
		if($type == 'hod'){
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where('hod_status',$status);
			$this->db->where('nature_of_visit',$nature_of_visit);
			$this->db->order_by('submitted_on','asc');
			$query = $this->db->get();
			return $query;
		}
		else if($type == 'faculty')
		{
			$sql = "select distinct af.first_name, af.last_name,af.application_number,af.check_in_date,af.check_out_date
					from ".$table." af
					where af.faculty_status = ".$status."
					and af.hod_status = 1
					and af.nature_of_visit = '".$nature_of_visit."'
					order by af.submitted_on asc";
			$query = $this->db->query($sql);
			return $query;
		}	
	}

	/*public function manager_page($confirm_status,$booking_status,$nature_of_visit){
	$sql = "select distinct af.first_name, af.last_name,af.application_number,af.check_in_date,af.check_out_date,c.booking_id
				from application_form af,confirm c,booking b
				where af.application_number = c.application_number
				and c.booking_id = b.booking_id
				and c.status = ".$confirm_status."
				and b.status = ".$booking_status."
				and af.nature_of_visit = '".$nature_of_visit."'
				order by af.submitted_on asc";
		$query = $this->db->query($sql);
		return $query;
	}*/

	public function manager_page($confirm_status,$booking_status,$nature_of_visit){
		$sql = "select distinct af.first_name, af.last_name,af.application_number,af.check_in_date,af.check_out_date,c.booking_id
				from application_form af,confirm c,booking b
				where af.application_number = c.application_number
				and c.booking_id = b.booking_id
				and c.status = ".$confirm_status."
				and b.status = ".$booking_status."
				and af.nature_of_visit = '".$nature_of_visit."'
				order by af.submitted_on asc";
		$query = $this->db->query($sql);
		return $query;
	}

	public function manager_cancelled($nature_of_visit){
		$sql = "select distinct af.first_name, af.last_name,af.application_number,af.check_in_date,af.check_out_date				from application_form af
				where af.application_number not in(select application_number from confirm)
				and af.faculty_status = 1
				and af.nature_of_visit = '".$nature_of_visit."'
				order by af.submitted_on desc";
		$query = $this->db->query($sql);
		return $query;
	}

	/*public function manager_pending($confirm_status){
	$sql = "select distinct af.first_name, af.last_name,af.application_number,af.check_in_date,af.check_out_date,c.booking_id,af.nature_of_visit
				from application_form af,confirm c
				where af.application_number = c.application_number
				and c.status = ".$confirm_status."
				order by af.submitted_on asc";
		$query = $this->db->query($sql);
		return $query;
	}*/

	public function manager_pending($confirm_status,$nature_of_visit){
	$sql = "select distinct af.first_name, af.last_name,af.application_number,af.check_in_date,af.check_out_date,c.booking_id
				from application_form af,confirm c
				where af.application_number = c.application_number
				and c.status = ".$confirm_status."
				and af.nature_of_visit = '".$nature_of_visit."'
				order by af.submitted_on asc";
		$query = $this->db->query($sql);
		return $query;
	}

	public function manager_page_checked_in($nature_of_visit){
		$sql = "select distinct af.first_name, af.last_name,af.application_number,af.check_in_date,af.check_out_date,c.booking_id
				from application_form af,confirm c,booking b
				where af.application_number = c.application_number
				and c.booking_id = b.booking_id
				and b.check_in_time <> '00:00:00'
				and b.check_out_time = '00:00:00'
				and af.nature_of_visit = '".$nature_of_visit."'
				order by af.submitted_on asc";
		$query = $this->db->query($sql);
		return $query;
	}

	public function manager_page_checked_out($nature_of_visit){
		$sql = "select distinct af.first_name, af.last_name,af.application_number,af.check_in_date,af.check_out_date,c.booking_id
				from application_form af,confirm c,booking b
				where af.application_number = c.application_number
				and c.booking_id = b.booking_id
				and b.check_in_time <> '00:00:00'
				and b.check_out_time <> '00:00:00'
				and af.nature_of_visit = '".$nature_of_visit."'
				order by af.submitted_on asc";
		$query = $this->db->query($sql);
		return $query;
	}

	public function get_rooms($guesthousenumber,$floor,$chkin,$chkout){
		/*$sql = "select room_number,guesthouse_number
				from rooms
				where guesthouse_number =".$guesthousenumber;*/


		$sql = "select r.room_number,r.guesthouse_number,t2.status,r.floor,r.bed_type,r.toilet
				from rooms r
				left join
					(select c.status,b.room_number
					from application_form af,booking b,confirm c
					where af.application_number = c.application_number
					and b.booking_id = c.booking_id
					and b.guesthouse_number = ".$guesthousenumber."
					and ( ('".$chkin."'<=af.check_in_date and '".$chkout."'>=af.check_in_date)
					or ( '".$chkin."' between af.check_in_date and af.check_out_date)
					or ('".$chkout."' between af.check_in_date and af.check_out_date) ) ) t2
				on r.room_number = t2.room_number
				where r.guesthouse_number = ".$guesthousenumber."
				and r.floor = '".$floor."'";
		$query = $this->db->query($sql);
		return $query;
	}

	/*public function caretaker($status,$nature_of_visit,$status_of_guest)
	{
		if($status_of_guest == 'arrived'){
			$sql = "select *
					from application_form af,caretaker c
					where af.application_number = c.application_number
					and af.nature_of_visit = '".$nature_of_visit."'
					and c.check_in_date_time <> '0000-00-00 00:00:00'
					and c.status = ".$status."";
		}
		else if($status_of_guest == 'left'){
			$sql = "select *
					from application_form af,caretaker c
					where af.application_number = c.application_number
					and af.nature_of_visit = '".$nature_of_visit."'
					and c.check_out_date_time <> '0000-00-00 00:00:00'
					and c.status = ".$status."";
		}
		else{
			$sql = "select *
					from application_form af,caretaker c
					where af.application_number = c.application_number
					and af.nature_of_visit = '".$nature_of_visit."'
					and c.status = ".$status."";
		}
		
		$query = $this->db->query($sql);
		return $query;
	}*/

	/*public function non_official($var,$var2)
	{
		$this->db->select('*');
		$this->db->from('application_form');
		if($var2 == 'hod')
			$this->db->where('hod_status',$var);
		else if($var2 == 'dean')
		{
			$this->db->where('hod_status',1);
			$this->db->where('dean_status',$var);
		}
		$this->db->where('nature_of_visit','Non-official');
		$this->db->order_by('submitted_on','asc');
		$query = $this->db->get();
		return $query;
	}*/

	/*public function official_count($var,$status)
	{
		$this->db->select('*');
		$this->db->from('application_form');
		if($var == 'hod')
			$this->db->where('hod_status',$status);
		else if($var == 'dean')
			$this->db->where('dean_status',$status);
		$query = $this->db->get();
		return count($query->result());
	}*/

	public function status($status,$type,$application_number)
	{
		if($status == 'approve') 
		{
			if($type == 'hod')	
			{
				$data = array(
							'hod_status' => 1,
						);
			}
			else if($type == 'faculty')
			{
				$data = array(
							'faculty_status' => 1,
						);
			}

		}
		else if($status == 'disapprove')
		{
			if($type == 'hod')
			{
				$data = array(
							'hod_status' => 0,
							//'faculty_status' => 0,
						);
			}
			else if($type == 'faculty')
			{
				$data = array(
							'faculty_status' => 0,
						);
			}
		}
		$this->db->where('application_number',$application_number);
		$this->db->update('application_form', $data);	
	}

	public function info($app_num)
	{
		$this->db->select('first_name,last_name,email_id');
		$this->db->from('application_form');
		$this->db->where('application_number',$app_num);
		$query = $this->db->get();
		/*print_r($query->row_array());
		exit();*/
		if(count($query->result() == 1)){
			return $query->row_array();
		}
	}

	/*public function room_status_ac($guesthousenum)
	{
		$this->db->select('*')
		->from('rooms')
		->where('guest_house_number',$guesthousenum)
		->where('room_type','AC')
		//->group_start()
		->where('status','Empty');
			//->or_where('check_out_date <=',$chkin)
		//->group_end();
		$query = $this->db->get();
		return $query->result_array();
	}*/

	/*public function guesthousenum($guesthousename)
	{
		$this->db->select('guest_house_number')
		->from('guesthouse')
		->where('guest_house_name',$guesthousename);
		$query = $this->db->get();
		$row = $query->row_array();
		return $row['guest_house_number'];
	}*/

	/*public function room_status_dean($chkin,$number,$room_type)
	{
		$sql =	"select distinct r.room_number  
				from application_form af, rooms r
				where r.guesthouse_number = ".$number."
				and r.room_type = '".$room_type."'
				and (r.status = 0
				or (af.application_number = r.application_number 
				and af.application_number <> 0
				and af.check_out_date <='".$chkin."'))";
		$query = $this->db->query($sql);
		return count($query->result_array());
	}*/

	/*public function get_guest_house()
	{
		$this->db->select('*')
		->from('guesthouse');
		$query = $this->db->get();
		return $query->result_array();
	}*/

	/*public function room_status_nac($chkin,$guesthousenum)
	{
		$this->db->select('*')
		->from('rooms')
		->where('guest_house_number',$guesthousenum)
		->where('room_type','Non-AC')
		->group_start()
			->where('status','Empty')
			->or_where('check_out_date <=',$chkin)
		->group_end();
		$query = $this->db->get();
		return $query->result_array();
	}*/

	public function pending_count($type){
		if($type == 'manager'){
			$sql = "select *
					from confirm
					where status = 0";
			$query = $this->db->query($sql);
			return count($query->result_array());		
		}
		else if($type == 'hod'){
			$sql = "select *
					from application_form
					where hod_status = 2";
			$query = $this->db->query($sql);
			return count($query->result_array());
		}
		else if($type == 'faculty'){
			$sql = "select *
					from application_form
					where faculty_status = 2
					and hod_status = 1";
			$query = $this->db->query($sql);
			return count($query->result_array());
		}
	}

	public function get_info($application_number)
	{
		$this->db->select('*');
		$this->db->from('application_form');
		$this->db->where('application_number',$application_number);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_confirm_status($application_number){
		$sql = "select c.status
				from application_form af,confirm c
				where af.application_number = c.application_number
				and af.application_number = ".$application_number."";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function get_booking_status($application_number){
		$sql = "select distinct c.status,b.status,b.check_in_time,b.check_out_time
				from confirm c, booking b,application_form af
				where c.booking_id = b.booking_id
				and af.application_number = c.application_number
				and af.application_number = ".$application_number."";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function get_assigned_rooms($application_number){
		$sql = "select g.guesthouse_name,b.room_number
				from booking b,confirm c,guesthouse g
				where c.application_number = ".$application_number."
				and c.booking_id = b.booking_id
				and b.guesthouse_number = g.guesthouse_number";
		$query = $this->db->query($sql);
		return $query;
	}

	public function get_rooms_count($application_number){
		$sql = "select sum(number_of_ac_rooms) + sum(number_of_non_ac_rooms) as total
				from application_form af
				where application_number = ".$application_number."";
		$query = $this->db->query($sql);
		$count = $query->row_array();
		return $count['total'];
	}

	public function get_booking_id($application_number)
    {
    	$this->db->select('booking_id');
    	$this->db->from('confirm');
    	$this->db->where('application_number',$application_number);
    	$query = $this->db->get();
    	$row = $query->row_array();
    	return $row['booking_id'];
    }

	public function get_check_in_date($application_number)
	{
		$this->db->select('check_in_date')
		->from('application_form')
		->where('application_number',$application_number);
		$query = $this->db->get();
		$row = $query->row_array();
		return $row['check_in_date'];
	}

	public function get_check_out_date($application_number)
	{
		$this->db->select('check_out_date')
		->from('application_form')
		->where('application_number',$application_number);
		$query = $this->db->get();
		$row = $query->row_array();
		return $row['check_out_date'];
	}

	public function reject($chkin,$chkout){
		$sql = "select distinct b.booking_id,af.first_name,af.last_name,af.check_in_date, af.check_out_date,b.status,af.number_of_non_ac_rooms,af.number_of_ac_rooms,af.application_number
				from application_form af,booking b,confirm c
				where af.application_number = c.application_number
				and c.booking_id = b.booking_id
				and ( ('".$chkin."'<=af.check_in_date and '".$chkout."'>=af.check_out_date)
				or ( '".$chkin."' between af.check_in_date and af.check_out_date)
				or ('".$chkout."' between af.check_in_date and af.check_out_date) )
				group by b.status
				order by b.alloted_on";
		$query = $this->db->query($sql);
		return $query;
	}

	public function set_status($application_number,$status){
		$sql = "update application_form
				set status = ".$status."
				where application_number = ".$application_number."";
		$query = $this->db->query($sql);
	}

	public function delete_row($booking_id){
		$sql = "delete from confirm
				where booking_id = '".$booking_id."'";
		$query = $this->db->query($sql);
	}

	public function set_faculty_status($application_number){
		$sql = "update application_form
				set faculty_status = 0
				where application_number = ".$application_number."";
		$query = $this->db->query($sql);
	}

	public function get_application_number($booking_id){
		$sql = "select application_number
				from confirm
				where booking_id = '".$booking_id."'";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		return $row['application_number'];
	}

	public function get_guest_status($application_number)
	{
		$this->db->select('status')
		->from('application_form')
		->where('application_number',$application_number);
		$query = $this->db->get();
		$row = $query->row_array();
		return $row['status'];
	}

	

	/*public function booking($application_number)
	{
		$row = $this->public_model->get_info($application_number);
		$var1 = $this->public_model->get_count() + 1;
		$var2 = strval($var1);
		$var3 = str_pad($var2, 5, "0", STR_PAD_LEFT );
		$app_data = array(
        	
        	'booking_id' => 'GH'.$var3,
        	'application_number' => $application_number,
        	'first_name' => $row['first_name'],
        	'last_name' => $row['last_name'],
        	'check_in_date' => $this->input->post('chkin1'),
        	'check_out_date' => $this->input->post('chkout1'),
        	'guest_house_name_ac' => ' ',
        	'room_number_ac' => ' ',
        	'guest_house_name_non_ac' => ' ', 
        	'room_number_non_ac' => ' ',
        );
        $insert = $this->db->insert('application_form',$app_data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
	}*/

	public function get_booking_count()
	{
		$sql = "select distinct application_number
				from booking";
		$query = $this->db->query($sql);
		return count($query->result());
	}

	public function get_number_of_room_ac($application_number){
		$this->db->select('number_of_ac_rooms')
		->from('application_form')
		->where('application_number',$application_number);
		$query = $this->db->get();
		$row = $query->row_array();
		return $row['number_of_ac_rooms'];
		//return $query->result_array();
	}

	public function get_number_of_room_nac($application_number){
		$this->db->select('number_of_non_ac_rooms')
		->from('application_form')
		->where('application_number',$application_number);
		$query = $this->db->get();
		$row = $query->row_array();
		return $row['number_of_non_ac_rooms'];
	}

	public function booking($booking_id,$application_number){
		$app_data = array(	
        	'booking_id' => 'GH'.$booking_id,
        	'application_number' => $application_number,
        	'status' => 0,
        );
        $insert = $this->db->insert('confirm',$app_data);
	}

	/*public function booking($booking_id,$guesthousenumber,$room_type,$number_of_rooms,$application_number)
	{
		$app_data = array(	
        	'booking_id' => 'GH'.$booking_id,
        	'application_number' => $application_number,
        	'guesthouse_number' => $guesthousenumber,
        	'room_type' => $room_type,
        	'number_of_rooms' => $number_of_rooms,
        	'status' => 0,
        	'confirmed_on' => date('Y-m-d H:i:s'),
        );
        $insert = $this->db->insert('booking',$app_data);
	}*/

	public function booking_info($application_number)
	{
		$sql = "select * 
				from booking b, guesthouse g
				where g.guesthouse_number = b.guesthouse_number
				and b.application_number = ".$application_number."";
		$query = $this->db->query($sql);
		return $query;
	}

	public function total(){
		$sql = "select * 
				from rooms r,guesthouse g
				where r.guesthouse_number = g.guesthouse_number";
		$query = $this->db->query($sql);
		return $query;
	}

	public function booked($chkin,$chkout){
		$sql = "select r.room_number,r.guesthouse_number,r.room_type
				from rooms r,application_form af
				where af.application_number = r.application_number
				and ( ('".$chkin."'<=af.check_in_date and '".$chkout."'>=af.check_in_date)
				or ( '".$chkin."' >= af.check_in_date and '".$chkout."' <= af.check_out_date)
				or ('".$chkin."' <= af.check_in_date and '".$chkout."' >= af.check_out_date) )";
		$query = $this->db->query($sql);
		return $query;
	}

	public function empty_room($guesthousenumber,$chkin,$chkout){
		$sql = "select room_number,guesthouse_number,room_type
				from rooms
				where guesthouse_number = ".$guesthousenumber."
				and room_number not in (
				select r.room_number
				from application_form af,rooms r
				where af.application_number = r.application_number
				and r.guesthouse_number = ".$guesthousenumber."
				and ( ('".$chkin."'<=af.check_in_date and '".$chkout."'>=af.check_in_date)
				or ( '".$chkin."' >= af.check_in_date and '".$chkout."' <= af.check_out_date)
				or ('".$chkin."' <= af.check_in_date and '".$chkout."' >= af.check_out_date) )
				)";
		$query = $this->db->query($sql);
		return $query;
	}

	/*public function room_number($chkin)
	{
		$sql = "select distinct r.guesthouse_number,r.room_number,r.room_type
				from booking b,rooms r,guesthouse g,application_form af
				where af.application_number = r.application_number
				and b.guesthouse_number = g.guesthouse_number
				and g.guesthouse_number = r.guesthouse_number
				and (r.status = 0 or af.check_out_date <='".$chkin."')";
		$query = $this->db->query($sql);
		return $query;
	}
*/
	public function room_number($t1,$t2)
	{
		$sql = "select distinct r.guesthouse_number,r.room_number,r.room_type
				from booking b,rooms r,guesthouse g,application_form af
				where af.application_number = r.application_number
				and b.guesthouse_number = g.guesthouse_number
				and g.guesthouse_number = r.guesthouse_number
				and ( ('".$t1."'<=af.check_in_date and '".$t2."'>=af.check_in_date)
				or ( '".$t1."' between af.check_in_date and af.check_out_date)
				or ('".$t2."' between af.check_in_date and af.check_out_date) )";
		$query = $this->db->query($sql);
		return $query;
	}

	public function ac_room($chkin,$guesthousenumber)
	{
		$sql = "select room_number,guesthouse_number
				from rooms
				where guesthouse_number = ".$guesthousenumber."
				and room_type = 'AC'
				and (r.status = 0 or af.check_out_date <='".$chkin."')";
		$query = $this->db->query($sql);
		return $query;
	}

	public function nac_room($chkin,$guesthousenumber)
	{
		$sql = "select room_number,guesthouse_number
				from rooms
				where guesthouse_number = ".$guesthousenumber."
				and room_type = 'Non-AC'
				and (r.status = 0 or af.check_out_date <='".$chkin."')";
		$query = $this->db->query($sql);
		return $query;
	}

	/*public function set_booking_status($application_number,$status)
	{
		$data = array(
			'status' => $status,
		);
		$this->db->where('application_number',$application_number);
		$this->db->update('booking', $data);

		$data = array(
			'application_number' => $application_number,
			'check_in_date_time' => '0000-00-00 00:00:00',
			'check_out_date_time' => '0000-00-00 00:00:00',
			'document' => '',
			'status' => 0,
		);
		$this->db->insert('caretaker',$data);
	}*/

	public function allot_room($room_number,$guesthousenumber,$booking_id){
		$data = array(
			'booking_id' => $booking_id,
			'guesthouse_number' => $guesthousenumber,
			'room_number' => $room_number,
			'check_in_time' => '00:00:00',
			'check_out_time' => '00:00:00',
			'alloted_on' => date('Y-m-d H:i:s'),
			'document' => ' ',
			'status' => 0,
		);
		$this->db->insert('booking',$data);

		$data = array(
			'status' => 1,
		);
		$this->db->where('booking_id',$booking_id);
		$this->db->update('confirm',$data);
	}

	public function check_in($application_number,$document)
	{
		$booking_id = $this->public_model->get_booking_id($application_number);
		$data = array(
			'document' => $document,
			'check_in_time' => date('H:i:s'),
			'status' => 1,
		);
		$this->db->where('booking_id',$booking_id);
		$this->db->update('booking',$data);
	}
	public function check_out($application_number)
	{
		$booking_id = $this->public_model->get_booking_id($application_number);
		$data = array(
			'check_out_time' => date('H:i:s')
		);
		$this->db->where('booking_id',$booking_id);
		$this->db->update('booking',$data);
	}

	public function cancel_booking($application_number){
		$booking_id = $this->public_model->get_booking_id($application_number);
		$this->public_model->delete_row($booking_id);
	}

	public function get_guest_id($application_number)
		{	$booking_id = $this->public_model->get_booking_id($application_number);
			$sql = "select distinct document
				from booking
				where booking_id = '".$booking_id."'";
			$query = $this->db->query($sql);
			$row = $query->row_array();
			return $row['document'];
		}

	public function get_id($application_number)
	{
		$this->db->select('booking_id')
		->from('booking')
		->where('application_number',$application_number);
		$query = $this->db->get();
		$row = $query->row_array();
		return $row['booking_id'];
	}

	

	public function rooms($application_number)
	{
		$sql = "select gh.guesthouse_name,r.room_number,r.room_type
				from guesthouse gh, rooms r
				where gh.guesthouse_number = r.guesthouse_number
				and r.application_number = ".$application_number;
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/*public function dean_reject($chkin,$chkout)
	{
		$sql = "select distinct af.application_number,af.first_name,af.last_name,af.number_of_ac_rooms
				,af.number_of_non_ac_rooms, af.check_in_date,af.check_out_date
				from application_form af,booking b,caretaker c
				where af.application_number =  b.application_number
				and ( b.status = 0 or (af.application_number = c.application_number
					and b.status = 1
					and c.check_in_date_time = '0000-00-00 00:00:00'
					and af.dean_status = 1))
				and (af.check_in_date between '".$chkin."' and '".$chkout."'
				or af.check_out_date between '".$chkin."' and '".$chkout."')";

		$query = $this->db->query($sql);
		return $query->result_array();
	}*/

	/*public function delete_row($application_number)
	{
		$sql = "delete from caretaker
				where application_number = ".$application_number."";
		$this->db->query($sql);

		$sql = "delete from booking
				where application_number = ".$application_number."";
		$this->db->query($sql);
	}*/

	public function set_room_zero($application_number)
	{
		$data = array(
			'dean_status' => 0,
		);
		$this->db->where('application_number',$application_number);
		$this->db->update('application_form',$data);
	}

	public function set_dean_zero($application_number)
	{
		$data = array(
			'application_number' => 0,
			'status' => 0,
		);
		$this->db->where('application_number',$application_number);
		$this->db->update('rooms',$data);
	}

	public function check_availability_extension($chkin,$chkout,$rooms)
	{
		$sql = " ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


	public function get_guesthousenumber($application_number)
	{
		$sql = "select guesthouse_number
				from rooms
				where application_number = ".$application_number."";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

}
?>