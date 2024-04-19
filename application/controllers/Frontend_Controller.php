<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_Controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Users_model');
		$this->load->model('Appointment_model');
		$this->load->library('session');

	}

	public function index()
	{
		if (isset($_POST['login_btn_client'])) {
			$email = $this->input->post('user_email');
			$pw = $this->input->post('user_password');

			$user_data = $this->Users_model->authenticateclient($email);

			if (!empty($user_data)) {

				// Assuming client_id and client_fullname are keys in the returned array
				$client_id = $user_data[0]['client_id'];
				$client_fullname = $user_data[0]['client_fullname'];

				if ($user_data[0]['password'] == $pw) {
					$userdata = array(
						'client_id' => $client_id,
						'client_fullname' => $client_fullname
					);

					$this->session->set_userdata($userdata);
					redirect('welcomeAcc');
				} else {
					$this->session->set_flashdata('msg_login', 'Invalid Password. Please try again.');
				}
			} else {
				$this->session->set_flashdata('msg_login', 'Account not found. Please try again.');
			}
		}
		$this->load->view('frontend/page/login_client');
	}


	function logout_client(){
		$this->session->unset_userdata('userdata');
		redirect('login_client');
	}


	function authenticateclient($email)
	{
		$query = $this->db->query("SELECT * FROM `client_users` where client_email='$email'");
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return array(); // Return an empty array if no user found
	}



// REGISTER CONTROLLER
public function register(){

    if (isset($_POST['create_btn'])) {
        // Process form data
        $data['client_fullname'] = $this->input->post('client_fullname');
        $data['client_address'] = $this->input->post('client_address');
        $data['phone_number'] = $this->input->post('phone_number');
        $data['client_email'] = $this->input->post('client_email');
        $data['password'] = $this->input->post('password');
        $data['sex'] = $this->input->post('sex');
        $data['client_status'] = $this->input->post('client_status'); // Set status to inactive
        $data['date_added'] = $this->input->post('date_added');

        $response = $this->Users_model->register($data);

        if($response){
            $this->session->set_flashdata('msg_settings','Record Inserted Successfully');
        } else {
            $this->session->set_flashdata('msg_settings_error','Failed to Insert');
        }

        // Redirect after processing form data
        redirect('login_client');
    } else {
        // Load the register view
        $this->load->view('frontend/page/register');
    }
}


public function welcomeAcc()
{
	$data['website_info'] = $this->Users_model->fetch_all("website_info");
	$this->load->view('frontend/include/header1',$data);
	$this->load->view('frontend/page/welcomeAcc',$data);
	$this->load->view('frontend/include/footer',$data);
}

	public function home(){
		$data['website_info'] = $this->Users_model->fetch_all("website_info");
		$this->load->view('frontend/include/header',$data);
		$this->load->view('frontend/page/home',$data);
		$this->load->view('frontend/include/footer',$data);
	}

	public function home1(){
		$data['website_info'] = $this->Users_model->fetch_all("website_info");
		$this->load->view('frontend/include/header1',$data);
		$this->load->view('frontend/page/home1',$data);
		$this->load->view('frontend/include/footer1',$data);
	}
	public function about(){
		$data['website_info'] = $this->Users_model->fetch_all("website_info");
		$this->load->view('frontend/include/header',$data);
		$this->load->view('frontend/page/about',$data);
		$this->load->view('frontend/include/footer',$data);
	}
	public function about1(){
		$data['website_info'] = $this->Users_model->fetch_all("website_info");
		$this->load->view('frontend/include/header1',$data);
		$this->load->view('frontend/page/about1',$data);
		$this->load->view('frontend/include/footer1',$data);
	}
	public function services(){
		$data['website_info'] = $this->Users_model->fetch_all("website_info");
		$this->load->view('frontend/include/header',$data);
		$this->load->view('frontend/page/services',$data);
		$this->load->view('frontend/include/footer',$data);
	}
	public function services1(){
		$data['website_info'] = $this->Users_model->fetch_all("website_info");
		$this->load->view('frontend/include/header1',$data);
		$this->load->view('frontend/page/services1',$data);
		$this->load->view('frontend/include/footer1',$data);
	}
	public function contact(){
		$data['website_info'] = $this->Users_model->fetch_all("website_info");
		$this->load->view('frontend/include/header',$data);
		$this->load->view('frontend/page/contact',$data);
		$this->load->view('frontend/include/footer',$data);
	}
	public function contact1(){
		$data['website_info'] = $this->Users_model->fetch_all("website_info");
		$this->load->view('frontend/include/header1',$data);
		$this->load->view('frontend/page/contact1',$data);
		$this->load->view('frontend/include/footer1',$data);
	}

	public function create_appointment(){
		$client_id = $this->session->userdata('client_id');
		
		// Fetch the client's fullname based on the client_id
		$client_fullname = $this->Users_model->get_client_fullname($client_id);
		$client_address = $this->Users_model->get_client_address($client_id);
		$phone_number = $this->Users_model->get_client_phone_number($client_id);
		
		// Pass both client_id and client_fullname to the view
		$data['client_id'] = $client_id;
		$data['client_fullname'] = $client_fullname;
		$data['client_address'] = $client_address;
		$data['phone_number'] = $phone_number;
		// Load the view with the data
		$this->load->view('frontend/include/header1', $data);
		$this->load->view('frontend/page/create_appointment', $data);
		$this->load->view('frontend/include/footer1', $data);
	}
	


	public function appointment_form() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('client_id', 'Client', 'required');
		$this->form_validation->set_rules('client_fullname', 'Client Fullname', 'required');
		$this->form_validation->set_rules('client_address', 'Address', 'required');
		$this->form_validation->set_rules('appointmentPetName', 'Name of Pet', 'required');
		$this->form_validation->set_rules('petBreed', 'Breed', 'required');
		$this->form_validation->set_rules('service', 'Service', 'required');
		$this->form_validation->set_rules('appointmentDate', 'Date', 'required');
		$this->form_validation->set_rules('phone_number', 'Contact Number', 'required');
		$this->form_validation->set_rules('appointmentTime', 'Time', 'required');
		
		if ($this->form_validation->run() === FALSE) {
			// Redirect to create_appointment
			redirect('create_appointment');
		} else {
			// Validation succeeded, proceed with data insertion
			$data = array(
				
				'client_id' => $this->input->post('client_id'),
				'client_fullname' => $this->input->post('client_fullname'), // Change to client_fullname
				'client_address' => $this->input->post('client_address'),
				'appointmentPetName' => $this->input->post('appointmentPetName'),
				'petBreed' => $this->input->post('petBreed'),
				'service' => $this->input->post('service'),
				'appointmentDate' => $this->input->post('appointmentDate'),
				'phone_number' => $this->input->post('phone_number'),
				'appointmentTime' => $this->input->post('appointmentTime')
			
			);
		
			$result = $this->Users_model->insert_dataappointmentClient($data);
		
			if ($result) {
				// Data insertion was successful
				$this->session->set_flashdata('success', 'Data inserted successfully.');
			} else {
				// Data insertion failed
				$this->session->set_flashdata('error', 'Failed to insert data.');
			}
		
			// Redirect to a suitable page after the form submission
			redirect('appointmentSchedule');
		}
	}
	
	

	
public function myAccount(){

	$client_id = $this->session->userdata('client_id');
	$data['client_id'] = $client_id;
	// Fetch the data using the fetch_all() function
	$appointmentUsers = $this->Users_model->fetchAppointmentsById($client_id);
	$countAppointments = $this->Users_model->countAppointmentsById($client_id);
	// Pass the fetched data to the view
	$data['appointmentUsers'] = $appointmentUsers;
	$data['countAppointments'] = $countAppointments;


	$data['website_info'] = $this->Users_model->fetch_all("website_info");
	$this->load->view('frontend/include/header1',$data);
	$this->load->view('frontend/include/navClient',$data);
	$this->load->view('frontend/page/myAccount',$data);
	// $this->load->view('frontend/include/footer',$data);
}



	
public function appointmentSchedule() {

	$client_id = $this->session->userdata('client_id');
	$appointmentId = $this->session->userdata('appointmentId');


	$appointmentUsers = $this->Users_model->fetchAppointmentsById($client_id);
	$nextData = $this->Users_model->getNextAppointment($appointmentId);


	// Pass the fetched data to the view
	$data['appointmentUsers'] = $appointmentUsers;
	$data['next'] = $nextData;
	// Load the view to display the table with data
	$this->load->view('frontend/include/header1');
	$this->load->view('frontend/include/navClient');
	$this->load->view('frontend/page/appointmentSchedule', $data);

}

public function cancelAppointments($id){
	if($result = $this->Users_model->cancelAppointment($id)){
		$this->session->set_flashdata('success', 'This appointments is Cancelled!');
	}else{
		$this->session->set_flashdata('error', 'Failed!');
	}
	redirect('appointmentSchedule');
}




public function update_appointment() {
    $appointmentId = $this->input->post('appointmentId');
    $appointmentDate = $this->input->post('appointmentDate');
    $appointmentTime = $this->input->post('appointmentTime');

    // Call the method in the model to update the appointment
    $update_result = $this->Users_model->update_appointment($appointmentId, $appointmentDate, $appointmentTime);

    if ($update_result) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('error' => true, 'message' => 'Failed to reschedule appointment'));
    }
}



public function prodPurchased(){
    // Retrieve client_id from session data
    $client_id = $this->session->userdata('client_id');

    // Fetch purchase data based on client_id
    $purchaseData = $this->Users_model->getPurchaseByClient($client_id);

    // Pass the fetched data to the view
    $data['purchases'] = $purchaseData;


    $this->load->view('frontend/include/navClient');
    $this->load->view('frontend/include/header1',$data);
    $this->load->view('frontend/page/prodPurchased',$data);

}



public function myPets(){
    // Retrieve user_id from session data
    $client_id = $this->session->userdata('client_id');

    // Fetch pet data based on client_id
    $petData = $this->Users_model->getPetByClient($client_id);

    // Pass the fetched data to the view
    $data['pets'] = $petData;

    $this->load->view('frontend/include/navClient');
    $this->load->view('frontend/include/header1',$data);
    $this->load->view('frontend/page/myPets',$data);

}


public function profileClient(){

	$client_id = $this->session->userdata('client_id');

	$data['clientDetails'] =  $this->Users_model->getClientById($client_id);


    $this->load->view('frontend/include/navClient');
    $this->load->view('frontend/include/header1',$data);
    $this->load->view('frontend/page/profileClient',$data);
	

}

public function updateProfile() {
    // Check if the request is an AJAX request
    if ($this->input->is_ajax_request()) {
        // Get the updated user information from the AJAX request
        $client_id = $this->session->userdata('client_id');
        $fullname = $this->input->post('fullname');
        $address = $this->input->post('address');
        $contact_number = $this->input->post('contact_number');
        $email = $this->input->post('email');

        // Update the user information in the database
        $update_data = array(
            'client_fullname' => $fullname,
            'client_address' => $address,
            'phone_number' => $contact_number,
            'client_email' => $email
        );

        // Call the model method to update the user information
        $result = $this->Users_model->updateClient($client_id, $update_data);

        // Check if the update was successful
        if ($result) {
            // Return success response
            $response['status'] = 'success';
            $response['message'] = 'Profile updated successfully.';
        } else {
            // Return error response
            $response['status'] = 'error';
            $response['message'] = 'Failed to update profile.';
        }

        // Convert the response array to JSON and echo it
        echo json_encode($response);
    } else {
        // If the request is not AJAX, redirect to an error page or show an error message
        show_error('Invalid request', 400);
    }
}




// In your controller file (e.g., Client.php)

public function updateClientInfo() {
    // Check if the form is submitted
    if ($this->input->post()) {
        // Get form data
        $client_id = $this->session->userdata('client_id');
        $fullname = $this->input->post('fullname');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');

        // Update client information in the database
        $data = array(
            'client_fullname' => $fullname,
            'client_address' => $address,
            'phone_number' => $phone,
            'client_email' => $email
        );
        $this->Users_model->updateClientInfo($client_id, $data);

        // Optionally, you can redirect the user to a success page or back to the profile page
        redirect('client/profile');
    } else {
        // If the form is not submitted, redirect the user to the profile page
        redirect('client/profile');
    }
}



}

