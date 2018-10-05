<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function general()
	{
		$data['layout'] = 'public/layout';
		$data['header'] = 'public/header1';
		$data['footer'] = 'public/footer';
		return $data;
	}

	public function index()
	{
		/*$data = $this->general();*/
		$data['pagename'] = 'Home';
		$data['pagetitle'] = 'Home';
		$data['metadesc'] = '';
		$data['metakey'] = '';
		$data['content'] = 'public/landingpage';
		$this->load->view('public/mainpage',$data);
	}

	public function login(){
		if($this->session->userdata('userid') != ''){
			redirect('book');
		}
		/*$data = $this->general();*/
		if($this->input->post('submit')){
			$msg = $this->public_model->login(trim($this->input->post('id')),trim($this->input->post('pwd')));

			if($this->session->userdata('type') == 'Student')
			{
				redirect('home');
			}
			else if($this->session->userdata('type') == 'Guesthouse Manager')
			{
				redirect('manager');
			}
			else if($this->session->userdata('type') == 'HOD')
			{
				redirect('hod');
			}
			else if($this->session->userdata('type') == 'Faculty Advisor')
			{
				redirect('faculty');
			}
			else{
				$this->session->set_flashdata('message','Invalid credentials. Please login again.');
				redirect('/');
			}
		}
		$data['pagename'] = 'Login';
		$data['pagetitle'] = 'Login';
		$data['metadesc'] = '';
		$data['metakey'] = '';
		$data['content'] = 'public/login1';
		$this->load->view('public/mainpage',$data);
	}

	public function logout()
	{
		$this->public_model->logout();
		redirect('/','refresh');
	}

	public function home()
	{
		if($this->session->userdata('userid') == ''){
			redirect('login');
		}
		$status1= 0;
		$status2= 0;
		/*$data = $this->general();*/
		$st1 = new DateTime($this->input->post('chkin'));
		$st2 = new DateTime($this->input->post('chkout'));
		if($this->input->post('submit'))
		{
			if($st1 < $st2){
				$t1 = date_format($st1,'Y-m-d');
				$t2 = date_format($st2,'Y-m-d');
				$this->session->set_userdata('chkin',$t1); 
				$this->session->set_userdata('chkout',$t2);
				
				$status1 = $this->public_model->total_rooms_all('AC');
				$confirmed_ac = $this->public_model->confirmed_ac($t1,$t2);
				$status1 = $status1 - $confirmed_ac;

				$status2 = $this->public_model->total_rooms_all('Non-AC');
				$confirmed_nac = $this->public_model->confirmed_nac($t1,$t2);
				$status2 = $status2 - $confirmed_nac;

				$pending = $this->public_model->pending_applications($t1,$t2);
				$data['pending'] = $pending; 
				if($status1 == 0 &&  $status2 == 0)
					$this->session->set_flashdata('message','No rooms available.');
			}
			else{
			$this->session->set_flashdata('message','Check out date should be greater.');
			redirect('home');
			}
		}
		
		$data['status1'] = $status1;
		$data['status2'] = $status2;
		$data['pagename'] = 'Home';
		$data['pagetitle'] = 'Home';
		$data['metadesc'] = '';
		$data['metakey'] = '';
		$data['content'] = 'public/home';
		$this->load->view('public/mainpage',$data);
	}

	public function application_form()
	{
		if($this->session->userdata('userid') == ''){
			redirect('login');
		}
		/*$data = $this->general();*/

		if($this->input->post('submit')){
           
        	//'booking_id' => 'GH'.$var3,
        	$this->session->set_flashdata('fname',$this->input->post('fname'));
        	$this->session->set_flashdata('lname',$this->input->post('lname'));
        	$this->session->set_flashdata('gender',$this->input->post('gender'));
        	$this->session->set_flashdata('id_type',$this->input->post('id_type'));
        	$this->session->set_flashdata('id_number',$this->input->post('id_number'));
        	$this->session->set_flashdata('address',$this->input->post('address'));
        	$this->session->set_flashdata('username',$this->session->userdata('username'));
        	$this->session->set_flashdata('chkin',$this->input->post('chkin1'));
        	$this->session->set_flashdata('chkout',$this->input->post('chkout1'));
        	$this->session->set_flashdata('dist',$this->input->post('dist'));
        	$this->session->set_flashdata('state',$this->input->post('state'));
        	$this->session->set_flashdata('country',$this->input->post('country'));
        	$this->session->set_flashdata('pincode',$this->input->post('pincode'));
        	$this->session->set_flashdata('room_ac',$this->input->post('room_ac'));
        	$this->session->set_flashdata('room_non_ac',$this->input->post('room_non_ac'));
        	$this->session->set_flashdata('persons',$this->input->post('persons'));
        	$this->session->set_flashdata('relation',$this->input->post('relation'));
        	$this->session->set_flashdata('optradio',$this->input->post('optradio'));
        	//$this->session->set_flashdata => $picture,
        	$this->session->set_flashdata('contact_number',$this->input->post('contact_number'));
        	$this->session->set_flashdata('email_id',$this->input->post('email_id'));

            //Check whether user upload picture

            if(!empty($_FILES['document']['name'])){
                $config['upload_path'] = 'uploads/documents/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
                $config['file_name'] = $_FILES['document']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('document')){
                    $uploadData = $this->upload->data();
                    $document = $uploadData['file_name'];
                }else{
                	$this->session->set_flashdata('message','File upload error.');
                    $document = '';
                }
            }else{
            	//$this->session->set_flashdata('error','File upload error.');
                $document = '';
            }
           	$insertUserData = $this->public_model->insert($document);
            //Storing insertion status message.
            if($insertUserData){
                $this->session->set_flashdata('message', 'User data have been added successfully.');
                redirect('confirm');
            }else{
                $this->session->set_flashdata('message', 'Some problems occured, please try again.');
                redirect('application_form');
            }
        }

        $data['pagename'] = 'Application Form';
		$data['pagetitle'] = 'Application Form';
		$data['metadesc'] = '';
		$data['metakey'] = '';
		$data['content'] = 'public/application_form';
		$this->load->view('public/mainpage',$data);
    }

    public function confirm()
	{
		if($this->session->userdata('userid') == ''){
			redirect('login');
		}
		/*$data = $this->general();*/
		$data['pagename'] = 'Confirmed';
		$data['pagetitle'] = 'Confirmed';
		$data['metadesc'] = '';
		$data['metakey'] = '';
		$data['content'] = 'public/confirm';
		$this->load->view('public/mainpage',$data);
	}

	public function hod()
	{
		if($this->session->userdata('userid') != '' && $this->session->userdata('type') == 'HOD')
		{
			/*$data = $this->general();*/
			$data['pagename'] = 'HOD';
			$data['pagetitle'] = 'HOD';
			$action = $this->input->post('action');
			$data['page'] = 'pending';
			$data['pending_count'] = $this->public_model->pending_count('hod');

			//$data['guest_house'] = $this->public_model->get_guest_house();
			if($action == 'Pending'){
				$data['official'] = $this->public_model->page(2,'hod','application_form','Official');
				$data['non_official'] = $this->public_model->page(2,'hod','application_form','Non-official');
				$data['button1'] = "red";
				$data['button2'] = " ";
				$data['button3'] = " ";
			}
			else if($action == 'Approved'){
				$data['official'] = $this->public_model->page(1,'hod','application_form','Official');
				$data['non_official'] = $this->public_model->page(1,'hod','application_form','Non-official');
				$data['page'] = 'approved';
				$data['button2'] = "red";
				$data['button1'] = " ";
				$data['button3'] = " ";
			}
			else if($action == 'Disapproved'){
				$data['page'] = 'disapproved';
				$data['official'] = $this->public_model->page(0,'hod','application_form','Official');
				$data['non_official'] = $this->public_model->page(0,'hod','application_form','Non-official');
				$data['button3'] = "red";
				$data['button1'] = " ";
				$data['button2'] = " ";
			}
			else
			{
				$data['official'] = $this->public_model->page(2,'hod','application_form','Official');
				$data['non_official'] = $this->public_model->page(2,'hod','application_form','Non-official');
				$data['button1'] = "red";
				$data['button2'] = " ";
				$data['button3'] = " ";
			}	

			if( ($this->input->post('approve')) || ($this->input->post('disapprove')) ){
				$app_num = $this->input->post('approve');
				
				$info = $this->public_model->info($app_num);
				$this->email->initialize(array(
	  				'protocol' => 'smtp',
	  				'mailtype' => 'html',
	  				'smtp_host' => 'smtp.sendgrid.net',
	  				'smtp_user' => '',
	  				'smtp_pass' => '',
	  				'smtp_port' => 587,
	  				'crlf' => "\r\n",
	  				'newline' => "\r\n"
				));
				$this->email->from('', 'Employee');
				if($this->input->post('approve')){
					$app_num = $this->input->post('approve');
					$info = $this->public_model->info($app_num);
					$this->public_model->status('approve','hod',$app_num);
					$this->email->to('');
					$this->email->subject('Regarding status of application form for room at NITK Guesthouse '.date('Y-m-d H:i:s'));
					$this->email->message("Dear ".$info['first_name']." ".$info['last_name']." , your application form has been approved by the HOD. It has been sent to the Faculty Advisor for confirmation. After confirmation you'll be allocated rooms. Please wait for an confirmation email. Thanking you.");
					$this->email->send();
					echo "<script>alert('Application approved.');</script>";
					redirect('hod','refresh');
				}
				else if($this->input->post('disapprove')){
					$app_num = $this->input->post('disapprove');
					$info = $this->public_model->info($app_num);
					$this->public_model->status('disapprove','hod',$app_num);

					$this->email->to('');
					$this->email->subject('Regarding status of application form for room at NITK Guesthouse '.date('Y-m-d H:i:s'));
					$this->email->message("Dear ".$info['first_name']." ".$info['last_name']." , your application form has been disapproved by the HOD. It has been sent to the Dean for confirmation. After confirmation you'll be allocated rooms. Please wait for an confirmation email. Thanking you.");
					$this->email->send();
					echo "<script>alert('Application disapproved.');</script>";
					redirect('hod','refresh');
				}	
			}
			$data['metadesc'] = '';
			$data['metakey'] = '';
			$data['content'] = 'public/hodtest1';
			$this->load->view('public/mainpage',$data);
		}
		else
			redirect('login');
	}

	public function faculty()
	{
		if($this->session->userdata('userid') != '' && $this->session->userdata('type') == 'Faculty Advisor')
		{
			/*$data = $this->general();*/
			$data['pagename'] = 'Faculty Advisor';
			$data['pagetitle'] = 'Faculty Advisor';
			$action = $this->input->post('action');
			$data['page'] = 'pending'; 
			$data['pending_count'] = $this->public_model->pending_count('faculty');

			if($action == 'Pending'){
				$data['official'] = $this->public_model->page(2,'faculty','application_form','Official');
				$data['non_official'] = $this->public_model->page(2,'faculty','application_form','Non-official');
				$data['button1'] = "red";
				$data['button2'] = " ";
				$data['button3'] = " ";
			}
			else if($action == 'Approved'){
				$data['official'] = $this->public_model->page(1,'faculty','application_form','Official');
				$data['non_official'] = $this->public_model->page(1,'faculty','application_form','Non-official');
				$data['page'] = 'approved';
				$data['button2'] = "red";
				$data['button1'] = " ";
				$data['button3'] = " ";
			}
			else if($action == 'Disapproved'){
				$data['page'] = 'disapproved';
				$data['official'] = $this->public_model->page(0,'faculty','application_form','Official');
				$data['non_official'] = $this->public_model->page(0,'faculty','application_form','Non-official');
				$data['button3'] = "red";
				$data['button1'] = " ";
				$data['button2'] = " ";
			}
			else{
				$data['official'] = $this->public_model->page(2,'faculty','application_form','Official');
				$data['non_official'] = $this->public_model->page(2,'faculty','application_form','Non-official');
				$data['button1'] = "red";
				$data['button2'] = " ";
				$data['button3'] = " ";
			}
		}
		else
		{
			redirect('login');
		}
		$data['metadesc'] = '';
		$data['metakey'] = '';
		$data['content'] = 'public/faculty';
		$this->load->view('public/mainpage',$data);
	}

	public function faculty_modal($application_number)
	{
		if($this->session->userdata('userid') != '' && $this->session->userdata('type') == 'Faculty Advisor')
		{
			/*$data = $this->general();*/
			$data['status'] = $this->public_model->get_guest_status($application_number);
			$data['detail'] = $this->public_model->get_info($application_number);
			$check_in_date = $this->public_model->get_check_in_date($application_number);
			$check_out_date = $this->public_model->get_check_out_date($application_number);
			
			$total_ac = $this->public_model->total_rooms_all('AC');
			$confirmed_ac = $this->public_model->confirmed_ac($check_in_date,$check_out_date);
			$data['available_ac'] = $total_ac - $confirmed_ac;

			$total_nac = $this->public_model->total_rooms_all('Non-AC');
			$confirmed_nac = $this->public_model->confirmed_nac($check_in_date,$check_out_date);
			$data['available_nac'] = $total_nac - $confirmed_nac;

			$this->email->initialize(array(
					'protocol' => 'smtp',
					'mailtype' => 'html',
					'smtp_host' => 'smtp.sendgrid.net',
					'smtp_user' => '',
					'smtp_pass' => '',
					'smtp_port' => 587,
					'crlf' => "\r\n",
					'newline' => "\r\n"
				));
			$this->email->from('', 'Employee');
			$this->email->to('');

			if($this->input->post('approve'))
			{
				$this->public_model->status('approve','faculty',$application_number);
				$info = $this->public_model->info($application_number);
				$booking_id = str_pad($application_number, 4, "0", STR_PAD_LEFT );
				$this->public_model->booking($booking_id,$application_number);

				$this->email->to('');
				$this->email->subject('Regarding status of application form for room at NITK Guesthouse '.date('Y-m-d H:i:s'));
				$this->email->message("Dear ".$info['first_name']." ".$info['last_name']." , your application form has been approved by the Faculty Advisor. You will get a confirmation email after the rooms have been allocated to you. Thanking you.");
				$this->email->send();
				echo "<script>alert('Application approved.');</script>";
				//echo "<script>window.close();</script>";
				redirect('faculty','refresh');
			}

			else if($this->input->post('disapprove'))
			{
				$this->public_model->status('disapprove','faculty',$application_number);

				$this->email->to('');
				$this->email->subject('Regarding status of application form for room at NITK Guesthouse '.date('Y-m-d H:i:s'));
				$this->email->message("Dear ".$info['first_name']." ".$info['last_name']." , your application form has been disapproved by the Faculty Advisor as the rooms are not available for the selected date. Please find some other options for your stay.");
				$this->email->send();
				echo "<script>alert('Application disapproved.');</script>";
				//echo "<script>window.close();</script>";
				redirect('faculty','refresh');
			}
			else if($this->input->post('back')){
				redirect('faculty','refresh');
			}
			$data['pagename'] = 'Faculty Modal';
			$data['pagetitle'] = 'Faculty Modal';
			$data['metadesc'] = '';
			$data['metakey'] = '';
			$data['content'] = 'public/faculty_modal';
			$this->load->view('public/mainpage',$data);
		}
		else
		{
			redirect('login');
		}
	}

	public function manager()
	{
		if($this->session->userdata('userid') != '' && $this->session->userdata('type') == 'Guesthouse Manager')
		{
			/*$data = $this->general();*/
			$data['pagename'] = 'Guesthouse Manager';
			$data['pagetitle'] = 'Guesthouse Manager';
			$action = $this->input->post('action');
			$data['page'] = 'pending'; 
			$data['pending_count'] = $this->public_model->pending_count('manager');

			if($action == 'Pending'){
				//$data['official'] = $this->public_model->manager_pending(0);
				$data['official'] = $this->public_model->manager_pending(0,'Official');
				$data['non_official'] = $this->public_model->manager_pending(0,'Non-official');
				$data['page'] = 'pending';
				$data['button1'] = "red";
				$data['button2'] = " ";
				$data['button3'] = " ";
				$data['button4'] = " ";
				$data['button5'] = " ";
			}
			else if($action == 'Approved'){
				//$data['official'] = $this->public_model->manager_page(1,0);
				$data['official'] = $this->public_model->manager_page(1,0,'Official');
				$data['non_official'] = $this->public_model->manager_page(1,0,'Non-official');
				$data['page'] = 'approved';
				$data['button1'] = " ";
				$data['button2'] = "red";
				$data['button3'] = " ";
				$data['button4'] = " ";
				$data['button5'] = " ";
			}
			else if($action == 'Checked In'){
				$data['official'] = $this->public_model->manager_page_checked_in('Official');
				$data['non_official'] = $this->public_model->manager_page_checked_in('Non-official');
				$data['page'] = 'checkedin';
				$data['button1'] = " ";
				$data['button2'] = " ";
				$data['button3'] = "red";
				$data['button4'] = " ";
				$data['button5'] = " ";
			}
			else if($action == 'Checked Out'){
				$data['official'] = $this->public_model->manager_page_checked_out('Official');
				$data['non_official'] = $this->public_model->manager_page_checked_out('Non-official');
				$data['page'] = 'checkedout';
				$data['button1'] = " ";
				$data['button2'] = " ";
				$data['button3'] = " ";
				$data['button4'] = "red";
				$data['button5'] = " ";
			}
			else if($action == 'Cancelled'){
				$data['official'] = $this->public_model->manager_cancelled('Official');
				$data['non_official'] = $this->public_model->manager_cancelled('Non-official');
				$data['page'] = 'cancelled';
				$data['button1'] = " ";
				$data['button2'] = " ";
				$data['button3'] = " ";
				$data['button4'] = " ";
				$data['button5'] = "red";
			}
			else
			{
				$data['official'] = $this->public_model->manager_pending(0,'Official');
				$data['non_official'] = $this->public_model->manager_pending(0,'Non-official');
				$data['page'] = 'pending';
				$data['button1'] = "red";
				$data['button2'] = " ";
				$data['button3'] = " ";
				$data['button4'] = " ";
				$data['button5'] = " ";
			}
		}
		else
		{
			redirect('login');
		}
		$data['metadesc'] = '';
		$data['metakey'] = '';
		$data['content'] = 'public/testing';
		$this->load->view('public/mainpage',$data);
	}

	public function manager_modal($application_number)
	{
		if($this->session->userdata('userid') != '' && $this->session->userdata('type') == 'Guesthouse Manager')
		{
			/*$data = $this->general();*/
			$data['detail'] = $this->public_model->get_info($application_number);
			$data['confirm_status'] = $this->public_model->get_confirm_status($application_number);
			$data['booking_status'] = $this->public_model->get_booking_status($application_number);
			$data['status'] = $this->public_model->get_guest_status($application_number);
			$data['document'] = $this->public_model->get_guest_id($application_number);
			$check_in_date = $this->public_model->get_check_in_date($application_number);
			$check_out_date = $this->public_model->get_check_out_date($application_number);
			
			$data['gh1g'] = $this->public_model->get_rooms(1,'Ground',$check_in_date,$check_in_date);
			$data['gh1f'] = $this->public_model->get_rooms(1,'First',$check_in_date,$check_in_date);
			$data['gh1s'] = $this->public_model->get_rooms(1,'Second',$check_in_date,$check_in_date);

			$data['gh2g'] = $this->public_model->get_rooms(2,'Ground',$check_in_date,$check_in_date);
			$data['gh2f'] = $this->public_model->get_rooms(2,'First',$check_in_date,$check_in_date);

			$data['gh3g'] = $this->public_model->get_rooms(3,'Ground',$check_in_date,$check_in_date);
			$data['gh3f'] = $this->public_model->get_rooms(3,'First',$check_in_date,$check_in_date);

			$data['gh4g'] = $this->public_model->get_rooms(4,'Ground',$check_in_date,$check_in_date);
			$data['gh4f'] = $this->public_model->get_rooms(4,'First',$check_in_date,$check_in_date);

			$data['gh5g'] = $this->public_model->get_rooms(5,'Ground',$check_in_date,$check_in_date);
			$data['gh5f'] = $this->public_model->get_rooms(5,'First',$check_in_date,$check_in_date);
			$data['gh5s'] = $this->public_model->get_rooms(5,'Second',$check_in_date,$check_in_date);

			$data['assigned_rooms'] = $this->public_model->get_assigned_rooms($application_number);

			if($this->input->post('action'))
			{
				$action = $this->input->post('action');
				if($action == 'Allot Rooms'){
					if(!empty($_POST['room'])){
						$room_count = $this->public_model->get_rooms_count($application_number);
						$count = count($_POST['room']);
						if($count != $room_count)
						{
							$this->session->set_flashdata('message','Number of selected rooms is not same as number of rooms required. Please select again.');
							redirect('manager_modal/'.$application_number);
						}
						else{
							$booking_id = $this->public_model->get_booking_id($application_number);
							foreach($_POST['room'] as $selected){
								$var = $selected;
								$guesthousenumber = substr($var,0,1);
								$room_number = substr($var,1);
								$this->public_model->allot_room($room_number,$guesthousenumber,$booking_id);
							}
							$info = $this->public_model->info($application_number);

							$this->email->initialize(array(
								'protocol' => 'smtp',
								'mailtype' => 'html',
								'smtp_host' => 'smtp.sendgrid.net',
								'smtp_user' => '',
								'smtp_pass' => '',
								'smtp_port' => 587,
								'crlf' => "\r\n",
								'newline' => "\r\n"
							));
							$this->email->from('', 'Employee');
							$this->email->to('');
							$this->email->subject('Regarding status of application form for room at NITK Guesthouse '.date('Y-m-d H:i:s'));
							$this->email->message("Dear ".$info['first_name']." ".$info['last_name']." , rooms have been alloted to you.");
							$this->email->send();

							echo "<script>alert('Rooms alloted.');</script>";
							//echo "<script>window.close();</script>";
							redirect('manager','refresh');
						}
					}
					else{
						$this->session->set_flashdata('message','Please select rooms.');
						redirect('manager_modal/'.$application_number);
					}
				}
				else if($action == 'Check In'){

				if(!empty($_FILES['document']['name'])){
		                $config['upload_path'] = 'uploads/documents/';
		                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
		                $config['file_name'] = $_FILES['document']['name'];
		                
		                $this->load->library('upload',$config);
		                $this->upload->initialize($config);
		                
		                if($this->upload->do_upload('document')){
		                    $uploadData = $this->upload->data();
		                    $document = $uploadData['file_name'];
		                    $this->public_model->check_in($application_number,$document);
		                    echo "<script>alert('Guest checked in.');</script>";
							redirect('manager','refresh');
		                }else{
		                	$this->session->set_flashdata('message','Error.');
		                    $document = '';
		                }
						
		            }else{
		            	$this->session->set_flashdata('error','Upload Guest ID');
		               	redirect('manager_modal/'.$application_number);
		            }

				}
				else if($action == 'Check Out'){
					$this->public_model->check_out($application_number);
					echo "<script>alert('Guest checked out.');</script>";
					redirect('manager','refresh');
				}
				else if($action == 'Cancel Booking'){
					$this->public_model->set_status($application_number,1);
					$this->public_model->cancel_booking($application_number);

					$info = $this->public_model->info($application_number);
					$this->email->initialize(array(
						'protocol' => 'smtp',
						'mailtype' => 'html',
						'smtp_host' => 'smtp.sendgrid.net',
						'smtp_user' => '',
						'smtp_pass' => '',
						'smtp_port' => 587,
						'crlf' => "\r\n",
						'newline' => "\r\n"
					));
					$this->email->from('', 'Employee');
					
					$this->email->to('');
					$this->email->subject('Regarding status of application form for room at NITK Guesthouse '.date('Y-m-d H:i:s'));
					$this->email->message("Dear ".$info['first_name']." ".$info['last_name']." , your booking has been cancelled.");
					$this->email->send();
					echo "<script>alert('Booking Cancelled.');</script>";
					redirect('manager','refresh');
				}
			}
			else if($this->input->post('back')){
				redirect('manager','refresh');
			}
			$data['pagename'] = 'Manager Modal';
			$data['pagetitle'] = 'Manager Modal';
			$data['metadesc'] = '';
			$data['metakey'] = '';
			$data['content'] = 'public/manager_modal';
			$this->load->view('public/mainpage',$data);
		}
		else
		{
			redirect('login');
		}
	}

	public function availability_manager(){
		if($this->session->userdata('userid') != '' && $this->session->userdata('type') == 'Guesthouse Manager'){
			/*$data = $this->general();*/
			$status1 = 0;
			$status2 = 0;
			$st1 = new DateTime($this->input->post('chkin'));
			$st2 = new DateTime($this->input->post('chkout'));
			if($this->input->post('submit'))
			{
				if($st1 < $st2){
					$t1 = date_format($st1,'Y-m-d');
					$t2 = date_format($st2,'Y-m-d');	
					if($this->session->userdata('type') == 'Guesthouse Manager'){
						redirect('test4/'.$t1.'/'.$t2);
					}			
				}
				else{
				$this->session->set_flashdata('message','Check out date should be greater than check in date.');
				redirect('availability_manager');
				}
			}
			$data['status1'] = $status1;
			$data['status2'] = $status2;
			$data['pagename'] = 'Room Availability';
			$data['pagetitle'] = 'Room Availability';
			$data['metadesc'] = '';
			$data['metakey'] = '';
			$data['content'] = 'public/availability_manager';
			$this->load->view('public/mainpage',$data);
		}
		else
		{
			redirect('login');
		}
	}

	public function test4($t1,$t2)
	{
		if($this->session->userdata('userid') != '' && $this->session->userdata('type') == 'Guesthouse Manager'){
			/*$data = $this->general();*/

			$status1 = $this->public_model->total_rooms_all('AC');
			$confirmed_ac = $this->public_model->confirmed_ac($t1,$t2);
			$status1 = $status1 - $confirmed_ac;

			$status2 = $this->public_model->total_rooms_all('Non-AC');
			$confirmed_nac = $this->public_model->confirmed_nac($t1,$t2);
			$status2 = $status2 - $confirmed_nac;

			$pending = $this->public_model->pending_applications($t1,$t2);
			$data['pending'] = $pending; 
			if($status1 == 0 &&  $status2 == 0){
				$this->session->set_flashdata('rooms','No rooms available.');
			}
			$data['status1'] = $status1;
			$data['status2'] = $status2;
			$data['info'] = $this->public_model->reject($t1,$t2);

			//$data['info'] = $this->public_model->dean_reject($t1,$t2);
			$data['chkin'] = $t1;
			$data['chkout'] = $t2;

			if($this->input->post('action')){
				if($this->input->post('action') == 'submit')
					redirect('application_form');
				else if($this->input->post('action') == 'reject')
					redirect('reject/'.$t1."/".$t2);
			}

			$data['pagename'] = 'Manager Availability';
			$data['pagetitle'] = 'Manager Availability';
			$data['metadesc'] = '';
			$data['metakey'] = '';
			$data['content'] = 'public/test4';
			$this->load->view('public/mainpage',$data);
		}
		else{
			redirect('login');
		}
	}

	public function reject($chkin,$chkout){
		if($this->session->userdata('userid') != '' && $this->session->userdata('type') == 'Guesthouse Manager'){
			/*$data = $this->general();*/

			$data['info'] = $this->public_model->reject($chkin,$chkout);

			if($this->input->post('reject'))
			{
				$booking_id = $this->input->post('reject');
				$application_number = $this->public_model->get_application_number($booking_id);
				$this->public_model->set_status($application_number,1);
				$this->public_model->delete_row($booking_id);
				$this->public_model->set_faculty_status($application_number);
				$info = $this->public_model->info($application_number);

				$this->email->initialize(array(
					'protocol' => 'smtp',
					'mailtype' => 'html',
					'smtp_host' => 'smtp.sendgrid.net',
					'smtp_user' => '',
					'smtp_pass' => '',
					'smtp_port' => 587,
					'crlf' => "\r\n",
					'newline' => "\r\n"
				));
				$this->email->from('', 'Employee');
				$this->email->to('');
				$this->email->to('');
				$this->email->subject('Regarding status of application form for room at NITK Guesthouse '.date('Y-m-d H:i:s'));
				$this->email->message("Dear ".$info['first_name']." ".$info['last_name']." , we are sorry to inform you that due to some unavoidable circumstances , we have to cancel your booking at NITK Guest House. Please look for other options for your stay. We regret any inconvenience caused by us.");
				$this->email->send();

				echo "<script>alert('Booking cancelled.');</script>";
				redirect('reject/'.$chkin.'/'.$chkout,'refresh');
			}

			$data['chkin'] = $chkin;
			$data['chkout'] = $chkout;
			$data['pagename'] = 'Reject';
			$data['pagetitle'] = 'Reject';
			$data['metadesc'] = '';
			$data['metakey'] = '';
			$data['content'] = 'public/reject';
			$this->load->view('public/mainpage',$data);
		}
		else{
			redirect('login');
		}
	}

	/*public function test1($application_number)
	{
		if($this->session->userdata('userid') != '' && $this->session->userdata('type') == 'dean')
		{
			$data = $this->general();
			$data['detail'] = $this->public_model->get_info($application_number);
			$check_in_date = $this->public_model->get_check_in_date($application_number);
			$data['guest_status'] = $this->public_model->get_guest_status($application_number);
			if($this->input->post('approve'))
			{
				if(!empty($_POST['guesthouse'])){
					$this->public_model->status('approve','faculty',$application_number);
					$info = $this->public_model->info($application_number);
					$var1 = $this->public_model->get_booking_count() + 1;
					$var2 = strval($var1);
					$booking_id = str_pad($var2, 5, "0", STR_PAD_LEFT );
					foreach($_POST['guesthouse'] as $selected){
						//print_r($selected);
						$var = $selected;
						$guesthousenumber = substr($var,0,1);
						$room_type = substr($var,1);
						if($room_type = 'AC'){
							$number_of_rooms = $this->public_model->get_number_of_room_ac($application_number);
						}
						else if($room_type = 'Non-AC'){
							$number_of_rooms = $this->public_model->get_number_of_room_nac($application_number);
						}
						$this->public_model->booking($booking_id,$guesthousenumber,$room_type,$number_of_rooms,$application_number);
					}
					$this->email->initialize(array(
						'protocol' => 'smtp',
						'mailtype' => 'html',
						'smtp_host' => 'smtp.sendgrid.net',
						'smtp_user' => '',
						'smtp_pass' => '',
						'smtp_port' => 587,
						'crlf' => "\r\n",
						'newline' => "\r\n"
					));
					$this->email->from('', 'Employee');
					$this->email->to('');
					$this->email->subject('Regarding status of application form for room at NITK Guesthouse '.date('Y-m-d H:i:s'));
					$this->email->message("Dear ".$info['first_name']." ".$info['last_name']." , your application form has been approved by the Dean. You will get a confirmation email after the rooms have been allocated to you. Thanking you.");
					$this->email->send();
					redirect('dean');
				}
				else{
					$this->session->set_flashdata('message','Please select rooms.');
					redirect('test1/'.$application_number);
				}
			}
			else if($this->input->post('disapprove'))
			{
				$this->public_model->status('disapprove','dean',$application_number);
				redirect('dean');
			}
			$data['pagename'] = 'Test1';
			$data['pagetitle'] = 'Test1';
			$data['metadesc'] = '';
			$data['metakey'] = '';
			$data['content'] = 'public/test1';
			$this->load->view('public/mainpage',$data);
		}
		else
		{
			redirect('/');
		}
	}*/


	/*	public function hod()
	{
		if($this->session->userdata('userid') != '' && $this->session->userdata('type') == 'HOD')
		{
			$data = $this->general();
			$data['pagename'] = 'HOD';
			$data['pagetitle'] = 'HOD';
			$action = $this->input->post('action');
			$data['page'] = 'pending';
			//$data['guest_house'] = $this->public_model->get_guest_house();
			if($action == 'Pending'){
				$data['official'] = $this->public_model->page(2,'hod','application_form','Official');
				$data['non_official'] = $this->public_model->page(2,'hod','application_form','Non-official');
			}
			else if($action == 'Approved'){
				$data['official'] = $this->public_model->page(1,'hod','application_form','Official');
				$data['non_official'] = $this->public_model->page(1,'hod','application_form','Non-official');
				$data['page'] = 'approved';
			}
			else if($action == 'Disapproved'){
				$data['page'] = 'disapproved';
				$data['official'] = $this->public_model->page(0,'hod','application_form','Official');
				$data['non_official'] = $this->public_model->page(0,'hod','application_form','Non-official');
			}
			else if($action == 'Book')
			{
				redirect('home');
			}
			else
			{
				$data['official'] = $this->public_model->page(2,'hod','application_form','Official');
				$data['non_official'] = $this->public_model->page(2,'hod','application_form','Non-official');
			}
			if($this->input->post('approve'))
			{
				$app_num = $this->input->post('approve');
				$this->public_model->status('approve','hod',$app_num);
				$info = $this->public_model->info($app_num);
				$this->email->initialize(array(
	  				'protocol' => 'smtp',
	  				'mailtype' => 'html',
	  				'smtp_host' => 'smtp.sendgrid.net',
	  				'smtp_user' => '',
	  				'smtp_pass' => '',
	  				'smtp_port' => 587,
	  				'crlf' => "\r\n",
	  				'newline' => "\r\n"
				));

				$this->email->from('', 'Employee');
				$this->email->to('');
				$this->email->subject('Regarding status of application form for room at NITK Guesthouse '.date('Y-m-d H:i:s'));
				$this->email->message("Dear ".$info['first_name']." ".$info['last_name']." , your application form has been approved by the HOD. It has been sent to the Dean for confirmation. After confirmation you'll be allocated rooms. Please wait for an confirmation email. Thanking you.");
				$this->email->send();
				//redirect('hod','refresh');
			}	
			else if($this->input->post('disapprove'))
			{
				$app_num = $this->input->post('disapprove');
				$this->public_model->status('disapprove','hod',$app_num);
				$info = $this->public_model->info($app_num);
				$this->email->initialize(array(
	  				'protocol' => 'smtp',
	  				'mailtype' => 'html',
	  				'smtp_host' => 'smtp.sendgrid.net',
	  				'smtp_user' => '',
	  				'smtp_pass' => '',
	  				'smtp_port' => 587,
	  				'crlf' => "\r\n",
	  				'newline' => "\r\n"
				));

				$this->email->from('', 'Employee');
				$this->email->to('');
				$this->email->subject('Regarding status of application form for room at NITK Guesthouse '.date('Y-m-d H:i:s'));
				$this->email->message("Dear ".$info['first_name']." ".$info['last_name']." your application form has been rejected by the HOD.");
				$this->email->send();
				//redirect('hod','refresh');
			}
			$data['metadesc'] = '';
			$data['metakey'] = '';
			$data['content'] = 'public/hod';
			$this->load->view('public/mainpage',$data);
		}
		else
			redirect('home');
	}*/



	/*public function test5()
	{
		if($this->input->post('reject'))
		{
			$application_number = $this->input->post('reject');
			$this->public_model->set_room_zero($application_number);
			$this->public_model->set_dean_zero($application_number);
			$this->public_model->delete_row($application_number);
			redirect('home');
		}
	}*/
	
	/*public function details($id)
	{
		if($this->session->userdata('userid') == ''){
			redirect('/');
		}
		$data['userdetail'] = $this->public_model->get_user_detail($id);
		if($this->input->post('submit')){
			$msg = $this->public_model->booking($id);
			if($msg){
				$this->session->set_flashdata('message','Room allocated.');
				redirect('details/'.$id);
			}
			else{
				$this->session->set_flashdata('message','Room allocation failed. Try again.');
				redirect('details/'.$id);
			}
		}
		$data = $this->general();
		$data['userdetail'] = $this->public_model->get_user_detail($id);
		$data['pagename'] = 'Details';
		$data['pagetitle'] = 'Details';
		$data['metadesc'] = '';
		$data['metakey'] = '';
		$data['content'] = 'public/details';
		$this->load->view('public/mainpage',$data);
	}

	public function booking_id()
	{
		if($this->session->userdata('userid') != '' && $this->session->userdata('type') == 'Caretaker')
		{
			$data = $this->general();

			if($this->input->post('submit')){
				$id = $this->input->post('id');
				$msg = $this->public_model->get_booking_id($id);
				if($msg){
					redirect('details/'.$id);
				}
				else{
					$this->session->set_flashdata('message','Booking ID invalid. Please try again.');
					redirect('booking_id');
				}
			}

			$data['pagename'] = 'Booking Pass';
			$data['pagetitle'] = 'Booking Pass';
			$data['metadesc'] = '';
			$data['metakey'] = '';
			$data['content'] = 'public/booking_id';
			$this->load->view('public/mainpage',$data);
		}
	}*/



	/*public function dean()
	{
		if($this->session->userdata('userid') != '' && $this->session->userdata('type') == 'Dean')
		{
			$data = $this->general();
			$data['pagename'] = 'Dean';
			$data['pagetitle'] = 'Dean';
			$action = $this->input->post('action');
			$data['page'] = 'pending'; 

			if($action == 'Pending'){
				$data['official'] = $this->public_model->page(2,'dean','application_form','Official');
				$data['non_official'] = $this->public_model->page(2,'dean','application_form','Non-official');
			}
			else if($action == 'Approved'){
				$data['official'] = $this->public_model->page(1,'dean','application_form','Official');
				$data['non_official'] = $this->public_model->page(1,'dean','application_form','Non-official');
				$data['page'] = 'approved';
			}
			else if($action == 'Disapproved'){
				$data['page'] = 'disapproved';
				$data['official'] = $this->public_model->page(0,'dean','application_form','Official');
				$data['non_official'] = $this->public_model->page(0,'dean','application_form','Non-official');
			}
			else if($action == 'Book')
			{
				redirect('home');
			}
			else
			{
				$data['official'] = $this->public_model->page(2,'dean','application_form','Official');
				$data['non_official'] = $this->public_model->page(2,'dean','application_form','Non-official');
			}
		}
		else
		{
			redirect('/');
		}
		$data['metadesc'] = '';
		$data['metakey'] = '';
		$data['content'] = 'public/dean';
		$this->load->view('public/mainpage',$data);
	}*/

	public function status($var)
	{
		$this->public_model->status($var);
		redirect('hod','refresh');
	}

	public function get_booking_id()
	{
		$var = $this->input->post('number');
		$id = $this->public_model->get_id($var);
		echo json_encode(array('id' => $id,));
	}

	/*public function test8($guesthousenumber,$check_in_date,$check_out_date){
		echo $guesthousenumber." ";
		echo $check_in_date." ";
		echo $check_out_date." ";
		exit();
	}*/

	/*public function room_status_ac_dean($guesthousenumber,$check_in_date,$check_out_date)
	{
		$total_rooms = $this->public_model->total_rooms($guesthousenumber,'AC');

		$booked_rooms = $this->public_model->booked_ac($guesthousenumber,$check_in_date,$check_out_date);

		$empty_rooms = $total_rooms - $booked_rooms; 
		echo json_encode(array('count' => $empty_rooms,));
	}

	public function room_status_non_ac_dean($guesthousenumber,$check_in_date,$check_out_date)
	{
		$total_rooms = $this->public_model->total_rooms($guesthousenumber,'Non-AC');
		$booked_rooms = $this->public_model->booked_ac($guesthousenumber,$check_in_date,$check_out_date);
		$empty_rooms = $total_rooms - $booked_rooms;
		echo json_encode(array('count' => $empty_rooms,));
	}*/

	

	/*public function test2($application_number)
	{
		if($this->session->userdata('userid') != '' && $this->session->userdata('type') == 'Faculty Incharge')
		{
			$data = $this->general();
			$data['info'] = $this->public_model->get_info($application_number);
			$data['booking_info'] = $this->public_model->booking_info($application_number);
			$chkin = $this->public_model->get_check_in_date($application_number);
			$chkout = $this->public_model->get_check_out_date($application_number);
			//$data['total_rooms'] = $this->public_model->total();
			//$data['booked_rooms'] = $this->public_model->booked($chkin,$chkout);
			//$data['room_number'] = $this->public_model->room_number($chkin,$chkout);

			$data['guesthouse1'] = $this->public_model->empty_room(1,$chkin,$chkout);
			$data['guesthouse2'] = $this->public_model->empty_room(2,$chkin,$chkout);
			$data['guesthouse3'] = $this->public_model->empty_room(3,$chkin,$chkout);
			$data['guesthouse4'] = $this->public_model->empty_room(4,$chkin,$chkout);
			if($this->input->post('submit')){
				if(!empty($_POST['room'])){
					/*$room_count = $this->input->post('room_count');
					$count = count($_POST['room']);
					if($count != $room_count)
					{
						$this->session->set_flashdata('message','Number of selected rooms is not same as number of rooms required. Please select again.');
						redirect('test2/'.$application_number);
					}*/
					/*else{
						foreach($_POST['room'] as $selected){
							$var = $selected;
							$guesthousenumber = substr($var,0,1);
							$room_number = substr($var,1);
							$this->public_model->allot_room($room_number,$guesthousenumber,$application_number);
						}

						$this->public_model->set_booking_status($application_number,1);
						$info = $this->public_model->info($application_number);
						$this->email->initialize(array(
							'protocol' => 'smtp',
							'mailtype' => 'html',
							'smtp_host' => 'smtp.sendgrid.net',
							'smtp_user' => '',
							'smtp_pass' => '',
							'smtp_port' => 587,
							'crlf' => "\r\n",
							'newline' => "\r\n"
						));
						$this->email->from('', 'Employee');
						$this->email->to('');
						$this->email->subject('Regarding status of application form for room at NITK Guesthouse '.date('Y-m-d H:i:s'));
						$this->email->message("Dear ".$info['first_name']." ".$info['last_name']." , rooms have been alloted to you. Ask for your room numbers at the counter. Have a pleasant stay.");
						$this->email->send();
						redirect('faculty_incharge');
						
					/*}	
				}
				else{
					$this->session->set_flashdata('message','Please select the rooms before submitting.');
					redirect('test2/'.$application_number);
				}
			}
			$data['pagename'] = 'Test2';
			$data['pagetitle'] = 'Test2';
			$data['metadesc'] = '';
			$data['metakey'] = '';
			$data['content'] = 'public/test2';
			$this->load->view('public/mainpage',$data);	
		}
		else
			redirect('/');
	}	*/

	/*public function faculty_incharge()
	{
		if($this->session->userdata('userid') != '' && $this->session->userdata('type') == 'Faculty Incharge')
		{
			$data = $this->general();
			$action = $this->input->post('action');
			$data['page'] = 'Pending';
			//$data['guest_house'] = $this->public_model->get_guest_house();
			if($action == 'Pending'){
				$data['official'] = $this->public_model->page(0,'faculty_incharge','booking','Official');
				$data['non_official'] = $this->public_model->page(0,'faculty_incharge','booking','Non-official');
			}
			else if($action == 'Alloted'){
				$data['official'] = $this->public_model->page(1,'faculty_incharge','booking','Official');
				$data['non_official'] = $this->public_model->page(1,'faculty_incharge','booking','Non-official');
				$data['page'] = 'alloted';
			}
			else if($action == 'Book')
			{
				redirect('home');
			}
			else
			{
				$data['official'] = $this->public_model->page(0,'faculty_incharge','booking','Official');
				$data['non_official'] = $this->public_model->page(0,'faculty_incharge','booking','Non-official');
			}
			$data['pagename'] = 'Faculty Incharge';
			$data['pagetitle'] = 'Faculty Incharge';
			$data['metadesc'] = '';
			$data['metakey'] = '';
			$data['content'] = 'public/incharge';
			$this->load->view('public/mainpage',$data);
		}
		else
			redirect('/');
	}

	public function caretaker()
	{
		if($this->session->userdata('userid') != '' && $this->session->userdata('type') == 'Caretaker')
		{
			$data = $this->general();
			$action = $this->input->post('action');
			$data['page'] = 'not_arrived';
			//$data['date_time'] = $this->public_model->get_date_time();
			//$data['guest_house'] = $this->public_model->get_guest_house();
			if($action == 'Not Arrived'){
				$data['official'] = $this->public_model->caretaker(0,'Official','not_arrived');
				$data['non_official'] = $this->public_model->caretaker(0,'Non-official','not_arrived');

			}
			else if($action == 'Arrived'){
				$data['official'] = $this->public_model->caretaker(1,'Official','arrived');
				$data['non_official'] = $this->public_model->caretaker(1,'Non-official','arrived');
				$data['page'] = 'arrived';
				//$data['date_time'] = $this->public_model->get_date_time();
			}
			else if($action == 'Left'){
				$data['official'] = $this->public_model->caretaker(1,'Official','left');
				$data['non_official'] = $this->public_model->caretaker(1,'Non-official','left');
				$data['page'] = 'left';
				//$data['date_time'] = $this->public_model->get_date_time();
			}
			else if($action == 'Book')
			{
				redirect('home');
			}
			else
			{
				$data['official'] = $this->public_model->caretaker(0,'Official','not_arrived');
				$data['non_official'] = $this->public_model->caretaker(0,'Non-official','not_arrived');
			}*/

			/*if($this->input->post('check_in')){
				if(!empty($_FILES['document']['name'])){
	                $config['upload_path'] = 'uploads/documents/';
	                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
	                $config['file_name'] = $_FILES['document']['name'];
	                
	                //Load upload library and initialize configuration
	                $this->load->library('upload',$config);
	                $this->upload->initialize($config);
	                
	                if($this->upload->do_upload('document')){
	                    $uploadData = $this->upload->data();
	                    $document = $uploadData['file_name'];
	                }else{
	                	$this->session->set_flashdata('message','Error.');
	                    $document = '';
	                }
	            }else{
	            	$this->session->set_flashdata('error','File upload error.');
	                $document = '';
	            }
	            $application_number = $this->input->post('check_in');
	            $this->public_model->check_in($application_number,$document);
	            redirect('caretaker');
			}
			else if($this->input->post('check_out')){
				$application_number = $this->input->post('check_out');
				$this->public_model->check_out($application_number);
				redirect('caretaker');
			}*/

/*			$data['pagename'] = 'Caretaker';
			$data['pagetitle'] = 'Caretaker';
			$data['metadesc'] = '';
			$data['metakey'] = '';
			$data['content'] = 'public/caretaker';
			$this->load->view('public/mainpage',$data);
		}
		else
			redirect('/');
	}*/

	public function test3($application_number)
	{
		if($this->session->userdata('userid') != '' && $this->session->userdata('type') == 'Caretaker')
		{
			$data = $this->general();
			$data['info'] = $this->public_model->get_info($application_number);
			$data['booking_id'] = $this->public_model->get_id($application_number);
			$data['document'] = $this->public_model->get_caretaker_info($application_number);
			$data['rooms'] = $this->public_model->rooms($application_number);

			if($this->input->post('check_in')){
				if(!empty($_FILES['document']['name'])){
	                $config['upload_path'] = 'uploads/documents/';
	                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
	                $config['file_name'] = $_FILES['document']['name'];
	                
	                //Load upload library and initialize configuration
	                $this->load->library('upload',$config);
	                $this->upload->initialize($config);
	                
	                if($this->upload->do_upload('document')){
	                    $uploadData = $this->upload->data();
	                    $document = $uploadData['file_name'];
	                }else{
	                	$this->session->set_flashdata('message','Error.');
	                    $document = '';
	                }
	            }else{
	            	$this->session->set_flashdata('error','File upload error.');
	                $document = '';
	            }
	            $application_number = $this->input->post('check_in');
	            $this->public_model->check_in($application_number,$document);
	            redirect('caretaker');
			}
			else if($this->input->post('check_out')){
				$application_number = $this->input->post('check_out');
				$this->public_model->check_out($application_number);
				redirect('caretaker');
			}

			else if($this->input->post('extend')){
				redirect('extend/'.$application_number);
			}

			$data['pagename'] = 'Caretaker';
			$data['pagetitle'] = 'Caretaker';
			$data['metadesc'] = '';
			$data['metakey'] = '';
			$data['content'] = 'public/test3';
			$this->load->view('public/mainpage',$data);
		}
		else
			redirect('/');
	}

	public function extend($application_number){
		if($this->session->userdata('userid') != '' && $this->session->userdata('type') == 'Caretaker')
		{
			$data = $this->general();
			$data['ac'] = 0;
			$data['nac'] = 0;
			$data['application_number'] = $application_number;
			$var = $this->public_model->get_guesthousenumber($application_number);
			if($this->input->post('check_availability')){
				$chkin = $this->input->post('chkin');
				$chkout = $this->input->post('chkout');
				//$rooms = $this->input->post('rooms');
				$var = $this->public_model->get_guesthousenumber($application_number);
				$ac = $this->public_model->booked_rooms($var[0]['guesthouse_number'],'AC',$chkin,$chkout);
				$nac = $this->public_model->booked_rooms($var[0]['guesthouse_number'],'Non-AC',$chkin,$chkout);
				$totalac = $this->public_model->total_rooms($var[0]['guesthouse_number'],'AC');
				$totalnac = $this->public_model->total_rooms($var[0]['guesthouse_number'],'Non-AC'); 

				
				if(($totalac - $ac) == 0 || ($totalnac - $nac) == 0){
					$this->session->set_flashdata('message','Rooms are not available for the selected date.');
					redirect('extend/'.$application_number);
				}
				else{
					$data['ac'] = $totalac - $ac;
					$data['nac'] = $totalnac - $nac;
					$data['pagename'] = 'Extend Stay';
					$data['pagetitle'] = 'Extend Stay';
					$data['metadesc'] = '';
					$data['metakey'] = '';
					$data['content'] = 'public/extend';
					$this->load->view('public/mainpage',$data);
				}

				if($this->input->post('apply_rooms')){
					$data = $this->general();

					$chkin = $this->input->post('chkin');
					$data['application_number'] = $application_number;
					$data['ac_room'] = $this->public_model->ac_room($chkin,$var[0]['guesthouse_number']);
 					$data['nac_room'] = $this->public_model->nac_room($chkin,$var[0]['guesthouse_number']);
					$data['pagename'] = 'New Rooms';
					$data['pagetitle'] = 'New Rooms';
					$data['metadesc'] = '';
					$data['metakey'] = '';
					$data['content'] = 'public/extend_stay';
					$this->load->view('public/mainpage',$data);
				}
				
				//$data['availability'] = $this->public_model->check_availability_extension($chkin,$chkout,$rooms);
			}

			$data['pagename'] = 'Extend Stay';
			$data['pagetitle'] = 'Extend Stay';
			$data['metadesc'] = '';
			$data['metakey'] = '';
			$data['content'] = 'public/extend';
			$this->load->view('public/mainpage',$data);
		}
		else
			redirect('home');
	}

	public function extend_stay($application_number){
		if($this->input->post('submit')){
			if(!empty($_POST['room'])){
				/*$room_count = $this->input->post('room_count');
				$count = count($_POST['room']);
				if($count != $room_count)
				{
					$this->session->set_flashdata('message','Number of selected rooms is not same as number of rooms required. Please select again.');
					redirect('test2/'.$application_number);
				}*/
				/*else{*/
					foreach($_POST['room'] as $selected){
						$var = $selected;
						$guesthousenumber = substr($var,0,1);
						$room_number = substr($var,1);
						$this->public_model->allot_room($room_number,$guesthousenumber,$application_number);
					}

					$this->public_model->set_booking_status($application_number,1);
					$info = $this->public_model->info($application_number);
					$this->email->initialize(array(
						'protocol' => 'smtp',
						'mailtype' => 'html',
						'smtp_host' => 'smtp.sendgrid.net',
						'smtp_user' => '',
						'smtp_pass' => '',
						'smtp_port' => 587,
						'crlf' => "\r\n",
						'newline' => "\r\n"
					));
					$this->email->from('', 'Employee');
					$this->email->to('');
					$this->email->subject('Regarding status of application form for room at NITK Guesthouse '.date('Y-m-d H:i:s'));
					$this->email->message("Dear ".$info['first_name']." ".$info['last_name']." , rooms have been alloted to you. Ask for your room numbers at the counter. Have a pleasant stay.");
					$this->email->send();
					redirect('faculty_incharge');
					
				/*}*/	
			}
			else{
				$this->session->set_flashdata('message','Please select the rooms before submitting.');
				redirect('test2/'.$application_number);
			}
		}
	}

}
