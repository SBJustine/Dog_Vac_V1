<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Users_model');
		$this->load->model('Attendance_model');
		$this->load->library('session');
		$this->load->library('form_validation');

	}

	public function index()
	{
		if (isset($_POST['login_btn'])) {
			$email= $this->input->post('user_email');
			$pw= $this->input->post('user_password');

			$user_data=$this->Users_model->authenticate($email);

			if (!empty($user_data)== TRUE) {
				if ($user_data[0]->password == $pw) {
					$data = array(
										'user_id' 			=> $user_data[0]->admin_id,
										'fullname' 			=> $user_data[0]->fullname,
										'email'				=> $user_data[0]->email,
									);

									if ($user_data[0]->type == "admin") {
										$user_data['user_type'] = "admin";
									} elseif ($user_data[0]->type == "useradmin") {
										$user_data['user_type'] = "useradmin";
									}
					$this->session->set_userdata($data);

					if ($user_data[0]->type == "admin"){
						redirect('dashboard');
					}
					elseif ($user_data[0]->type == "useradmin"){
						redirect('dashboard');
					}
					
				}else {
					$this->session->set_flashdata('msg_login','Invalid Password. Please try again.');
				}

			}else {
				$this->session->set_flashdata('msg_login','Account not found. Please try again.');
				// code...
			}
		}

		$this->load->view('backend/page/login');
	}


	public function logout()
	{
		$this->session->unset_userdata('data');
		redirect('admin');
	}

	// public function approve_appointment() {
	// 	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// 		if (!isset($_POST['appointmentId'])) {
	// 			echo json_encode(['error' => 'Appointment ID is not provided']);
	// 			return;
	// 		}
			
	// 		$appointmentId = $_POST['appointmentId'];
	
	// 		// Update the appointment status
	// 		$update_result = $this->Users_model->approve_appointment($appointmentId);
	
	// 		if ($update_result) {
	// 			echo json_encode(['success' => true]);
	// 		} else {
	// 			echo json_encode(['error' => 'Failed to approve appointment']);
	// 		}
	// 	} else {
	// 		echo json_encode(['error' => 'Invalid request method']);
	// 	}
	// }
	
	// public function reschedule_appointment() {
	// 	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// 		if (!isset($_POST['appointmentId'])) {
	// 			echo json_encode(['error' => 'Appointment ID is not provided']);
	// 			return;
	// 		}
			
	// 		$appointmentId = $_POST['appointmentId'];
	
	// 		// Update the appointment status
	// 		$update_result = $this->Users_model->reschedule_appointment($appointmentId);
	
	// 		if ($update_result) {
	// 			echo json_encode(['success' => true]);
	// 		} else {
	// 			echo json_encode(['error' => 'Failed to reschedule appointment']);
	// 		}
	// 	} else {
	// 		echo json_encode(['error' => 'Invalid request method']);
	// 	}
	// }
	
	

	

	
	public function view_admin() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (!isset($_POST['adminID'])) {
				echo json_encode(['error' => 'AdminID is not provided']);
				return;
			}
			
			$id = $_POST['adminID'];
			
			$admin = $this->Users_model->get_info($id);
			
			if ($admin) {
				echo json_encode($admin[0]); // Assuming you expect only one result
			} else {
				echo json_encode(['error' => 'Admin not found']);
			}
		} else {
			echo json_encode(['error' => 'Invalid request method']);
		}
	}
	
	public function update_admin() {
		$adminID = $this->input->post('adminID');
		
		$data = array();
	
		$fullname = $this->input->post('fullname');
		if ($fullname !== null) {
			$data['fullname'] = $fullname;
		}
	
		$email = $this->input->post('email');
		if ($email !== null) {
			$data['email'] = $email;
		}
	
		$password = $this->input->post('password');
		if ($password !== null) {
			$data['password'] = $password;
		}
	
		$date_added = $this->input->post('date_added');
		if ($date_added !== null) {
			$data['date_added'] = $date_added;
		}
		$admin_pic = $this->input->post('admin_pic');
		if ($admin_pic !== null) {
			$data['admin_pic'] = $admin_pic;
		}
		$adminContactNumber = $this->input->post('adminContactNumber');
		if ($adminContactNumber !== null) {
			$data['adminContactNumber'] = $adminContactNumber;
		}
	
		$update_result = $this->Users_model->update_admin($adminID, $data);
	
		if ($update_result) {
			echo json_encode(array('success' => true));
		} else {
			$error_message = $this->db->error()['message'];
			echo json_encode(array('error' => true, 'message' => 'Failed to update admin: ' . $error_message));
		}
	}


	// employee table update

	public function view_employee() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (!isset($_POST['employeeID'])) {
				echo json_encode(['error' => 'Employee ID is not provided']);
				return;
			}
	
			$id = $_POST['employeeID'];
	
			$employee = $this->Users_model->get_infoemployee($id);
	
			if ($employee) {
				echo json_encode($employee);
			} else {
				echo json_encode(['error' => 'Employee not found']);
			}
		} else {
			echo json_encode(['error' => 'Invalid request method']);
		}
	}
	
	public function update_employee() {
		$employeeID = $this->input->post('employeeID');
		// Retrieve other posted data similarly for other fields
	
		$data = array(
			'employeeName' => $this->input->post('employeeName'),
			'employeePosition' => $this->input->post('employeePosition'),
			'employeeAddress' => $this->input->post('employeeAddress'),
			'employeeAge' => $this->input->post('employeeAge'),
			'employeeSex' => $this->input->post('employeeSex'),
			'employeePhoneNum' => $this->input->post('employeePhoneNum'),
			'employeeStatus' => $this->input->post('employeeStatus'),
			'employeeAdded' => $this->input->post('employeeAdded')
		);
	
		$update_result = $this->Users_model->update_employee($employeeID, $data);
	
		if ($update_result) {
			echo json_encode(array('success' => true));
		} else {
			$error_message = $this->db->error()['message'];
			echo json_encode(array('error' => true, 'message' => 'Failed to update employee: ' . $error_message));
		}
	}
	
//client update

	public function view_client() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (!isset($_POST['client_id'])) {
				echo json_encode(['error' => 'Client ID is not provided']);
				return;
			}

			$id = $_POST['client_id'];

			$client = $this->Users_model->get_client_info($id);

			if ($client) {
				echo json_encode($client);
			} else {
				echo json_encode(['error' => 'Client not found']);
			}
		} else {
			echo json_encode(['error' => 'Invalid request method']);
		}
	}

	public function update_client() {
		$client_id = $this->input->post('client_id');
		// Retrieve other posted data similarly for other fields

		$data = array(
			'client_fullname' => $this->input->post('clientName'),
			'client_address' => $this->input->post('clientAddress'),
			'phone_number' => $this->input->post('clientPhoneNumber'),
			'sex' => $this->input->post('clientSex'),
			'client_email' => $this->input->post('clientEmail'),
			'password' => $this->input->post('clientPassword'),
			'client_status' => $this->input->post('clientStatus'),
			'date_added' => $this->input->post('clientAdded')
		);

		$update_result = $this->Users_model->update_client($client_id, $data);

		if ($update_result) {
			echo json_encode(array('success' => true));
		} else {
			$error_message = $this->db->error()['message'];
			echo json_encode(array('error' => true, 'message' => 'Failed to update client: ' . $error_message));
		}
	}


// pet update 

	public function view_pet() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (!isset($_POST['pet_id'])) { // Fixing the key name to check for pet_id
				echo json_encode(['error' => 'Pet ID is not provided']);
				return;
			}

			$id = $_POST['pet_id']; // Fixing the variable name to pet_id

			$pet = $this->Users_model->get_pet_info($id);

			if ($pet) {
				echo json_encode($pet);
			} else {
				echo json_encode(['error' => 'Pet not found']);
			}
		} else {
			echo json_encode(['error' => 'Invalid request method']);
		}
	}

	public function update_pet() {
		$pet_id = $this->input->post('pet_id'); // Fixing the variable name to pet_id
		// Retrieve other posted data similarly for other fields

		$data = array(
			'pet_name' => $this->input->post('pet_name'),
			'pet_breed' => $this->input->post('pet_breed'),
			'pet_age' => $this->input->post('pet_age'),
			'pet_gender' => $this->input->post('pet_gender'),
			'pet_species' => $this->input->post('pet_species'),
			'pet_color' => $this->input->post('pet_color'),
			// Add other fields as needed
		);

		$update_result = $this->Users_model->update_pet($pet_id, $data);

		if ($update_result) {
			echo json_encode(array('success' => true));
		} else {
			$error_message = $this->db->error()['message'];
			echo json_encode(array('error' => true, 'message' => 'Failed to update pet: ' . $error_message));
		}
	}

// product update 

	public function view_product() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (!isset($_POST['productID'])) {
				echo json_encode(['error' => 'Product ID is not provided']);
				return;
			}

			$id = $_POST['productID'];

			$product = $this->Users_model->get_product_info($id);

			if ($product) {
				echo json_encode($product);
			} else {
				echo json_encode(['error' => 'Product not found']);
			}
		} else {
			echo json_encode(['error' => 'Invalid request method']);
		}
	}

	public function update_product() {
		$productID = $this->input->post('productID');

		$data = array(
			'productName' => $this->input->post('productName'),
			'cost' => $this->input->post('cost'),
			'quantity' => $this->input->post('quantity'),
			'category' => $this->input->post('category'),
			'dateAdded' => $this->input->post('dateAdded')
		);

		$update_result = $this->Users_model->update_product($productID, $data);

		if ($update_result) {
			echo json_encode(array('success' => true));
		} else {
			echo json_encode(array('error' => true, 'message' => 'Failed to update product'));
		}
	}


//purchase update 

	public function view_purchase() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (!isset($_POST['productID'])) {
				echo json_encode(['error' => 'Product ID is not provided']);
				return;
			}

			$id = $_POST['productID'];

			$purchase = $this->Users_model->get_purchase_info($id);

			if ($purchase) {
				echo json_encode($purchase);
			} else {
				echo json_encode(['error' => 'Purchase not found']);
			}
		} else {
			echo json_encode(['error' => 'Invalid request method']);
		}
	}

	public function update_purchase() {
		$productID = $this->input->post('productID');

		$data = array(
			'total_cost' => $this->input->post('total_cost'),
			'quantity_purchased' => $this->input->post('quantity_purchased'),
			'date_purchased' => $this->input->post('date_purchased')
		);

		$update_result = $this->Users_model->update_purchase($productID, $data);

		if ($update_result) {
			echo json_encode(array('success' => true));
		} else {
			$error_message = $this->db->error()['message'];
			echo json_encode(array('error' => true, 'message' => 'Failed to update purchase: ' . $error_message));
		}
	}


	
	public function dashboard(){

		if (!$this->session->has_userdata('user_id')) {
			redirect('admin'); // Redirect to login page if not logged in
		}

		// Fetch the data using the fetch_all() function
		$todaysAppointments = $this->Users_model->fetchAllTodaysAppointments();
		// Pass the fetched data to the view
		$data['appointmentUsers'] = $todaysAppointments ;
	
		$this->load->view('backend/include/header');
		$this->load->view('backend/page/dashboard',$data);
		$this->load->view('backend/include/nav');
		$this->load->view('backend/include/footer');	
	
}


public function next_appointment() {
    $this->load->library('form_validation');
    // Add validation rules as needed

    if (!$this->session->has_userdata('user_id')) {
        redirect('admin'); // Redirect to login page if not logged in
    }

    // Get the appointmentId from the URL query parameter
    $appointmentId = $this->input->get('appointmentId');
    
    // Pass the appointmentId to the view
    $data['appointmentId'] = $appointmentId;

    if ($this->form_validation->run() === FALSE) {
        // Validation failed, load the view with the form
        $this->load->view('backend/include/header');
        $this->load->view('backend/include/nav');
        $this->load->view('backend/page/next_appointment', $data); // Pass appointmentId to the view
        $this->load->view('backend/include/footer');
    } else {
        // Validation succeeded, proceed with data insertion

        $data = array(
            // Retrieve form data here
        );

        $result = $this->Users_model->insert_dataappointmentNext($data);

        if ($result) {
            // Data insertion was successful
            $this->session->set_flashdata('success', 'Data inserted successfully.');
        } else {
            // Data insertion failed
            $this->session->set_flashdata('error', 'Failed to insert data.');
        }

        // Redirect to a suitable page after the form submission
        redirect('next_appointment');
    }
}



// public function next_appointment() {
// 	$this->load->library('form_validation');
	
// 	$this->form_validation->set_rules('nextAppointmentId', 'Next Appointment', 'required');
// 	$this->form_validation->set_rules('appointmentDate', 'Date', 'required');
// 	$this->form_validation->set_rules('pet_name', 'Pet Name', 'required');
// 	$this->form_validation->set_rules('service', 'Service', 'required');
// 	$this->form_validation->set_rules('nextSchedule', 'Date', 'required');
// 	$this->form_validation->set_rules('employeeName', 'Employee Name', 'required');

	
// 	if ($this->form_validation->run() === FALSE) {
// 		// Redirect to create_appointment
// 		redirect('admin');
// 	} else {
// 		// Validation succeeded, proceed with data insertion
// 		$data = array(
			
// 			'nextAppointmentId' => $this->input->post('client_id'),
// 			'appointmentDate' => $this->input->post('client_fullname'), // Change to client_fullname
// 			'pet_name' => $this->input->post('client_address'),
// 			'service' => $this->input->post('appointmentPetName'),
// 			'nextSchedule' => $this->input->post('nextSchedule'),
// 			'employeeName' => $this->input->post('employeeName')
		
// 		);
	
// 		$result = $this->Users_model->insert_dataappointmentNext($data);
	
// 		if ($result) {
// 			// Data insertion was successful
// 			$this->session->set_flashdata('success', 'Data inserted successfully.');
// 		} else {
// 			// Data insertion failed
// 			$this->session->set_flashdata('error', 'Failed to insert data.');
// 		}
	
// 		// Redirect to a suitable page after the form submission
// 		redirect('appointmentSchedule');
// 	}
// }

public function appointment_list() 
	{
	if (!$this->session->has_userdata('user_id')) {
			redirect('admin'); // Redirect to login page if not logged in
		}


	$appointmentUsers = $this->Users_model->fetch_allappointments();

	$data['appointmentUsers'] = $appointmentUsers;
	
	// Load the view to display the table with data
	$this->load->view('backend/include/header');
	$this->load->view('backend/include/nav');
	$this->load->view('backend/page/appointment_list', $data);
	$this->load->view('backend/include/footer');
}




public function approveAppointments($id){

	if($result = $this->Users_model->approveAppointment($id)){
		$this->session->set_flashdata('success', 'This appointments is marked Approved!');
	}else{
		$this->session->set_flashdata('error', 'Failed!');
	}
	redirect('appointment_list');
}


public function reScheduleAppointments($id){
	if($result = $this->Users_model->reScheduleAppointment($id)){
		$this->session->set_flashdata('success', 'This appointments is marked Approved!');
	}else{
		$this->session->set_flashdata('error', 'Failed!');
	}
	redirect('appointment_list');
}

// public function cancelAppointments($id){
// 	if($result = $this->Users_model->cancelAppointment($id)){
// 		$this->session->set_flashdata('success', 'This appointments is marked Cancelled!');
// 	}else{
// 		$this->session->set_flashdata('error', 'Failed!');
// 	}
// 	redirect('appointment_list');
// }




public function appointment_history() {
	if (!$this->session->has_userdata('user_id')) {
			redirect('admin'); // Redirect to login page if not logged in
		}

	$id=1;
	// Fetch the data using the fetch_all() function
	$appointmentHistoryUsers = $this->Users_model->fetch_allappointmentsHistory($id);
	// Pass the fetched data to the view
	$data['appointmentHistoryUsers'] = $appointmentHistoryUsers;
	// Load the view to display the table with data
	$this->load->view('backend/include/header');
	$this->load->view('backend/include/nav');
	$this->load->view('backend/page/appointment_history', $data);
	$this->load->view('backend/include/footer');
}




public function calendar(){
	if (!$this->session->has_userdata('user_id')) {
		redirect('admin'); // Redirect to login page if not logged in
	}

	$id=1;
	// Fetch the data using the fetch_all() function
	$calendarUsers = $this->Users_model->fetch_allcalendar($id);
	// Pass the fetched data to the view
	$data['calendarUsers'] = $calendarUsers;
	// Load the view to display the table with data
	$this->load->view('backend/include/header');
	$this->load->view('backend/include/nav');
	$this->load->view('backend/page/calendar', $data);
	$this->load->view('backend/include/footer');
}



public function create_admin() {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('admin_pic', 'Admin Picture', 'callback_file_check');
    $this->form_validation->set_rules('fullname', 'Full Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required');
	$this->form_validation->set_rules('adminContactNumber', 'Number', 'required');
    $this->form_validation->set_rules('date_added', 'Date_Added', 'required');
    $this->form_validation->set_rules('type', 'Type', 'required');

    if (!$this->session->has_userdata('user_id')) {
        redirect('admin'); // Redirect to login page if not logged in
    }

    if ($this->form_validation->run() === FALSE) {
        // Validation failed, redirect back to the form
        $this->load->view('backend/include/header');
        $this->load->view('backend/include/nav');
        $this->load->view('backend/page/create_admin');
        $this->load->view('backend/include/footer');
    } else {
        // File upload configuration
        $config['upload_path'] = './uploads/pictures/';
        $config['allowed_types'] = 'gif|jpeg|jpg|png';
        $config['max_size'] = 1024 * 5;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('admin_pic')) {
            // File upload failed
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('create_admin'); // Redirect back to the form
        }

        // File upload succeeded
        $upload_data = $this->upload->data();
        $new_file = $upload_data['file_name'];

        // Proceed with data insertion
        $data = array(
            'admin_pic' => $new_file,
            'fullname' => $this->input->post('fullname'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'), 
			'adminContactNumber' => $this->input->post('adminContactNumber'),
            'date_added' => $this->input->post('date_added'),
            'type' => $this->input->post('type'),
        );

        $result = $this->Users_model->insert_data($data);

        if ($result) {
            // Data insertion was successful
            $this->session->set_flashdata('success', 'Data inserted successfully.');
            redirect('admin_table');
        } else {
            // Data insertion failed
            $this->session->set_flashdata('error', 'Failed to insert data.');
            redirect('create_admin'); // Redirect back to the form
        }
    }
}

public function file_check() {
    if (empty($_FILES['admin_pic']['name']) && empty($_FILES['product_pic']['name']) && empty($_FILES['employee_pic']['name'])) {
        $this->form_validation->set_message('file_check', 'At least one of the {field} fields is required.');
        return FALSE;
    } else {
        return TRUE;
    }
}


public function admin_table() 
	{
	if (!$this->session->has_userdata('user_id')) {
			redirect('admin'); // Redirect to login page if not logged in
		}

	$id=1;
	// Fetch the data using the fetch_all() function
	$adminUsers = $this->Users_model->fetch_all($id);
	// Pass the fetched data to the view
	$data['adminUsers'] = $adminUsers;
	// Load the view to display the table with data
	$this->load->view('backend/include/header');
	$this->load->view('backend/include/nav');
	$this->load->view('backend/page/admin_table', $data);
	$this->load->view('backend/include/footer');
}




public function add_client() {
	$this->load->library('form_validation');
	$this->form_validation->set_rules('client_fullname', 'Full Name', 'required');
	$this->form_validation->set_rules('client_address', 'Address', 'required');
	$this->form_validation->set_rules('sex', 'Sex', 'required');
	$this->form_validation->set_rules('client_email', 'Email', 'required|valid_email');
	$this->form_validation->set_rules('password', 'Password', 'required');
	$this->form_validation->set_rules('client_status', 'Status', 'required');
	$this->form_validation->set_rules('date_added', 'Date_Added', 'required');
	
	if (!$this->session->has_userdata('user_id')) {
		redirect('admin'); // Redirect to login page if not logged in
	}

	if ($this->form_validation->run() === FALSE) {
		// Validation failed, redirect back to the form
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
		$this->load->view('backend/page/add_client');
		$this->load->view('backend/include/footer');
	} else {
		// Validation succeeded, proceed with data insertion
		$data = array(
			'client_fullname' => $this->input->post('client_fullname'),
			'client_address' => $this->input->post('client_address'),
			'sex' => $this->input->post('sex'),
			'phone_number' => $this->input->post('phone_number'),
			'client_email' => $this->input->post('client_email'),
			'password' => $this->input->post('password'),
			'client_status' => $this->input->post('client_status'),
			'date_added' => $this->input->post('date_added'),	
		);

		$result = $this->Users_model->insert_dataclient($data);

		if ($result) {
			// Data insertion was successful
			$this->session->set_flashdata('success', 'Data inserted successfully.');
		} else {
			// Data insertion failed
			$this->session->set_flashdata('error', 'Failed to insert data.');
		}


		// Redirect to a suitable page after the form submission
		redirect('client_table');
	}

}
public function client_table(){
	if (!$this->session->has_userdata('user_id')) {
			redirect('admin'); // Redirect to login page if not logged in
		}

		$id=1;
		// Fetch the data using the fetch_all() function
		$clientUsers = $this->Users_model->fetch_allclient($id);
		// Pass the fetched data to the view
		$data['clientUsers'] = $clientUsers;
		// Load the view to display the table with data
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
		$this->load->view('backend/page/client_table', $data);
		$this->load->view('backend/include/footer');
}


public function add_employee() 
	{
	$this->load->library('form_validation');
	$this->form_validation->set_rules('employee_pic', 'Employee Picture', 'callback_file_check');
	$this->form_validation->set_rules('employeeAdded', 'Date Added', 'required');
	$this->form_validation->set_rules('employeeName', 'Full Name', 'required');
	$this->form_validation->set_rules('employeePosition', 'Position', 'required');
	$this->form_validation->set_rules('employeeAddress', 'Address', 'required');
	$this->form_validation->set_rules('employeeAge', 'Age', 'required');
	$this->form_validation->set_rules('employeeSex', 'Sex', 'required');
	$this->form_validation->set_rules('employeePhoneNum', 'Phone Number', 'required');
	$this->form_validation->set_rules('employeeStatus', 'Status', 'required');
	
	
	if (!$this->session->has_userdata('user_id')) {
		redirect('admin'); // Redirect to login page if not logged in
	}

	if ($this->form_validation->run() === FALSE) {
		// Validation failed, redirect back to the form
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
		$this->load->view('backend/page/add_employee');
		$this->load->view('backend/include/footer');
	} else {
		// File upload configuration
        $config['upload_path'] = './uploads/pictures/';
        $config['allowed_types'] = 'gif|jpeg|jpg|png';
        $config['max_size'] = 1024 * 5;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('employee_pic')) {
            // File upload failed
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('add_employee'); // Redirect back to the form
        }

        // File upload succeeded
        $upload_data = $this->upload->data();
        $new_file = $upload_data['file_name'];
		// Validation succeeded, proceed with data insertion
		$data = array(
			'employee_pic' => $new_file,
			'employeeAdded' => $this->input->post('employeeAdded'),
			'employeeName' => $this->input->post('employeeName'),
			'employeePosition' => $this->input->post('employeePosition'),
			'employeeAddress' => $this->input->post('employeeAddress'),
			'employeeAge' => $this->input->post('employeeAge'),
			'employeeSex' => $this->input->post('employeeSex'),
			'employeePhoneNum' => $this->input->post('employeePhoneNum'),
			'employeeStatus' => $this->input->post('employeeStatus'),
				
		);

		$result = $this->Users_model->insert_dataemployee($data);

		if ($result) {
			// Data insertion was successful
			$this->session->set_flashdata('success', 'Data inserted successfully.');
			
			//when employee is added we will create a pre attendance record for update purposes
			$employeeID = $this->Users_model->fetch_employee_by_name($data['employeeName']);
			echo "id". $employeeID[0]->employeeID. " name ".$data['employeeName'];
			
			$dataAttendance = array(
				'employeeID' => $employeeID[0]->employeeID,
				'employeeName' => $this->input->post('employeeName'),
				'numOfDaysPresent' => 0,
				'numOfDaysAbsent' => 0
			);

			$resultAttendance = $this->Users_model->insert_pre_employeeAttendance($dataAttendance);
			
			if ($resultAttendance) {
				// Data insertion was successful
				$this->session->set_flashdata('success', 'Data inserted successfully.');
			} else {
				// Data insertion failed
				$this->session->set_flashdata('error', 'Failed to insert data.');
			}

		} else {
			// Data insertion failed
			$this->session->set_flashdata('error', 'Failed to insert data.');
		}

		//add
		


		// Redirect to a suitable page after the form submission
		redirect('employee_table');
	}


}
public function employee_table(){
	if (!$this->session->has_userdata('user_id')) {
			redirect('admin'); // Redirect to login page if not logged in
		}

		$id=1;
		// Fetch the data using the fetch_all() function
		$employeeUsers = $this->Users_model->fetch_allemployee($id);
		// Pass the fetched data to the view
		$data['employeeUsers'] = $employeeUsers;
		// Load the view to display the table with data
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
		$this->load->view('backend/page/employee_table', $data);
		$this->load->view('backend/include/footer');
}







public function add_product() {
	$this->load->library('form_validation');
	$this->form_validation->set_rules('product_pic', 'Product Picture', 'callback_file_check');
	
	$this->form_validation->set_rules('productName', 'Product Name', 'required');
	$this->form_validation->set_rules('cost', 'Cost', 'required');
	$this->form_validation->set_rules('quantity', 'Quantity', 'required');
	$this->form_validation->set_rules('category', 'Category', 'required');
	$this->form_validation->set_rules('dateAdded', 'Date Added', 'required');
	
	
	if (!$this->session->has_userdata('user_id')) {
		redirect('admin'); // Redirect to login page if not logged in
	}

	if ($this->form_validation->run() === FALSE) {
		// Validation failed, redirect back to the form
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
		$this->load->view('backend/page/add_product');
		$this->load->view('backend/include/footer');
	} else {
		// File upload configuration
        $config['upload_path'] = './uploads/pictures/';
        $config['allowed_types'] = 'gif|jpeg|jpg|png';
        $config['max_size'] = 1024 * 5;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('product_pic')) {
            // File upload failed
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('add_product'); // Redirect back to the form
        }

        // File upload succeeded
        $upload_data = $this->upload->data();
        $new_file = $upload_data['file_name'];
		// Validation succeeded, proceed with data insertion
		$data = array(
			'product_pic' => $new_file,
			
			'productName' => $this->input->post('productName'),
			'cost' => $this->input->post('cost'),
			'quantity' => $this->input->post('quantity'),
			'category' => $this->input->post('category'),
			'dateAdded' => $this->input->post('dateAdded'),
				
		);

		$result = $this->Users_model->insert_dataproduct($data);

		if ($result) {
			// Data insertion was successful
			$this->session->set_flashdata('success', 'Data inserted successfully.');
		} else {
			// Data insertion failed
			$this->session->set_flashdata('error', 'Failed to insert data.');
		}


		// Redirect to a suitable page after the form submission
		redirect('product_table');
	}

}


public function product_table() 
	{
	if (!$this->session->has_userdata('user_id')) {
			redirect('admin'); // Redirect to login page if not logged in
		}

	$id=1;
	
	$product_id = $this->input->get('product_id');

	// Use $user_id as needed in your controller logic

	// Optionally, you can pass it to the view
	$data['product_id'] = $product_id;

	//Fetch the data using the fetch_all() function
	$productUsers = $this->Users_model->fetch_allproduct($id);
	
	$data['productUsers'] = $productUsers;
	
	$this->load->view('backend/include/header');
	$this->load->view('backend/include/nav');
	$this->load->view('backend/page/product_table', $data);
	$this->load->view('backend/include/footer');
}




public function attendance() 
	{
	if (!$this->session->has_userdata('user_id')) {
			redirect('admin'); // Redirect to login page if not logged in
		}

	$id=1;
	// Fetch the data using the fetch_all() function
	$attendance = $this->Attendance_model->fetch_allattendance_date(date('Y-m-d'));
	// Pass the fetched data to the view
	$data['attendance'] = $attendance;
	// Load the view to display the table with data
	$this->load->view('backend/include/header');
	$this->load->view('backend/include/nav');
	$this->load->view('backend/page/attendance', $data);
	$this->load->view('backend/include/footer');
}
public function attendance_table() 
	{
	if (!$this->session->has_userdata('user_id')) {
			redirect('admin'); // Redirect to login add if not logged in
		}

	$id=1;
	// Fetch the data using the fetch_all() function
	$attendance_table = $this->Attendance_model->fetch_allattendance_table($id);
	// Pass the fetched data to the view
	$data['attendance_table'] = $attendance_table;
	// Load the view to display the table with data
	$this->load->view('backend/include/header');
	$this->load->view('backend/include/nav');
	$this->load->view('backend/page/attendance_table', $data);
	$this->load->view('backend/include/footer');
}


public function attendance_check()
	{
	if (!$this->session->has_userdata('user_id')) {
		redirect('admin'); // Redirect to login page if not logged in
	}
	$employeeID = $this->input->get('employeeID');
	$status = $this->input->get('status');

	$attendanceResult= $this->Users_model->fetch_employee_by_id($employeeID);
	
	if($attendanceResult[0]->employeeLastTimeUpdated != date('Y-m-d')) {
		$result = $this->Attendance_model->updateAttendance($employeeID,$status);

		if ($result) {
			// Data insertion was successful
			$this->Attendance_model->updateTimeUpdated($employeeID);
			$this->session->set_flashdata('success', 'Data inserted successfully.');

			 //updatee lastTimeInDate
			 
		} else {
			// Data insertion failed
			$this->session->set_flashdata('error', 'Failed to insert data.');
		}

	}

	

		// Redirect to a suitable page after the form submission
		redirect('attendance');

}
public function attendance_absent()
	{
	if (!$this->session->has_userdata('user_id')) {
		redirect('admin'); // Redirect to login page if not logged in
	}


}



public function salary() 
	{
	if (!$this->session->has_userdata('user_id')) {
			redirect('admin'); // Redirect to login page if not logged in
		}
	$id=1;
	// Fetch the data using the fetch_all() function
	$salary = $this->Users_model->fetch_allsalaries($id);
	// Pass the fetched data to the view
	$data['salary'] = $salary;
	// Load the view to display the table with data
	$this->load->view('backend/include/header');
	$this->load->view('backend/include/nav');
	$this->load->view('backend/page/salary', $data);
	$this->load->view('backend/include/footer');
}
public function salary_form() {
	$this->load->library('form_validation');
	
	//	carga ang id number ni client-user pra ma trace kinsay tag iya sa pet


	$id = $this->input->get('employeeID');
	// Fetch the data using the fetch_all() function
	$attendance_table = $this->Attendance_model->fetch_allattendance_table($id);
	$last_paid = $this->Users_model->get_recent_date_paid($id);
	 // Pass the fetched data to the view
	 $data['attendance_table'] = $attendance_table;
	 $data['recent_datePaid'] = $last_paid;
	 $data['id'] = $this->input->get('employeeID');
	 //
	$employeeID = $this->input->get('employeeID');
	$totalSalary = $this->input->get('total_salary');


	// Fetch the data using the fetch_all() function
	$attendance = $this->Attendance_model->fetch_allattendance_date(date('Y-m-d'));
	 // Pass the fetched data to the view
	 $data['attendance'] = $attendance;
	
	$this->form_validation->set_rules('numOfDaysPresent', 'Required', 'required');
	$this->form_validation->set_rules('employeeSalary', 'Employee Salary', 'required');
	$this->form_validation->set_rules('total_salary', 'Total', 'required');
	$this->form_validation->set_rules('datePaid', 'Date Paid', 'required');
	

	if (!$this->session->has_userdata('user_id')) {
		redirect('admin'); // Redirect to login page if not logged in
	}

	if ($this->form_validation->run() === FALSE) {
		// Validation failed, redirect back to the form
		$employeeID = $this->input->get('employeeID');

        // Use $user_id as needed in your controller logic

        // Optionally, you can pass it to the view
        $data['employeeID'] = $employeeID;
        // $this->load->view('your_view', $data);
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
		$this->load->view('backend/page/salary_form',$data);
		$this->load->view('backend/include/footer');
	} else {
		// Validation succeeded, proceed with data insertion
		$data = array(
			
			// 'salaryID' => $this->input->post('salaryID'),
			'employeeID' => $this->input->post('employeeID'),
			'attendanceID' => $this->input->post('attendanceID'),
			'employeeSalary' => $this->input->post('employeeSalary'),
			'total_salary' => $this->input->post('total_salary'),
			'datePaid' => $this->input->post('datePaid'),
			
		);

		$result = $this->Users_model->insert_datasalary($data);

		if ($result) {
			// Data insertion was successful
			$this->session->set_flashdata('success', 'Data inserted successfully.');
		} else {
			// Data insertion failed
			$this->session->set_flashdata('error', 'Failed to insert data.');
		}

		// Redirect to a suitable page after the form submission
		redirect('salary_table?employeeID=' .  $this->input->post('employeeID'));
	}

}
public function salary_table() 
	{
	if (!$this->session->has_userdata('user_id')) {
			redirect('admin'); // Redirect to login page if not logged in
		}

	$id = $this->input->get('employeeID');
	$data['employeeID'] = $this->input->get('employeeID');

	// Fetch the data using the fetch_all() function
	$attendance_table = $this->Attendance_model->fetch_allattendance_table($id);
	// Pass the fetched data to the view
	$data['attendance_table'] = $attendance_table;
	
	//Fetch the data using the fetch_all() function
	$salaryUsers = $this->Users_model->fetch_allsalary($id);
	
	$data['salaryUsers'] = $salaryUsers;
	
	$this->load->view('backend/include/header');
	$this->load->view('backend/include/nav');
	$this->load->view('backend/page/salary_table', $data);
	$this->load->view('backend/include/footer');
}


public function petOwner() 
	{
	if (!$this->session->has_userdata('user_id')) {
			redirect('admin'); // Redirect to login page if not logged in
		}
	$id=1;
	// Fetch the data using the fetch_all() function
	$petOwner = $this->Users_model->fetch_allpetOwner($id);
	// Pass the fetched data to the view
	$data['petOwner'] = $petOwner;
	// Load the view to display the table with data
	$this->load->view('backend/include/header');
	$this->load->view('backend/include/nav');
	$this->load->view('backend/page/petOwner', $data);
	$this->load->view('backend/include/footer');
}

public function add_pet() {
	$this->load->library('form_validation');
	//	carga ang id number ni client-user pra ma trace kinsay tag iya sa pet
	
	$this->form_validation->set_rules('client_id', 'Client', 'required');
	$this->form_validation->set_rules('pet_name', 'Name', 'required');
	$this->form_validation->set_rules('pet_breed', 'Breed', 'required');
	$this->form_validation->set_rules('pet_age', 'Age', 'required');
	$this->form_validation->set_rules('pet_gender', 'Gender', 'required');
	$this->form_validation->set_rules('pet_species', 'Species', 'required');
	$this->form_validation->set_rules('pet_color', 'Color', 'required');
	

	if (!$this->session->has_userdata('user_id')) {
		redirect('admin'); // Redirect to login page if not logged in
	}

	if ($this->form_validation->run() === FALSE) {
		// Validation failed, redirect back to the form
		$client_id = $this->input->get('client_id');

        // Use $user_id as needed in your controller logic

        // Optionally, you can pass it to the view
        $data['client_id'] = $client_id;
        // $this->load->view('your_view', $data);
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
		$this->load->view('backend/page/add_pet',$data);
		$this->load->view('backend/include/footer');
	} else {
		// Validation succeeded, proceed with data insertion
		$data = array(
			
			'client_id' => $this->input->post('client_id'),
			'pet_name' => $this->input->post('pet_name'),
			'pet_breed' => $this->input->post('pet_breed'),
			'pet_age' => $this->input->post('pet_age'),
			'pet_gender' => $this->input->post('pet_gender'),
			'pet_species' => $this->input->post('pet_species'),
			'pet_color' => $this->input->post('pet_color'),
			
		);

		$result = $this->Users_model->insert_datapet($data);

		if ($result) {
			// Data insertion was successful
			$this->session->set_flashdata('success', 'Data inserted successfully.');
			
		} else {
			// Data insertion failed
			$this->session->set_flashdata('error', 'Failed to insert data.');

		}
		redirect('pet_table?client_id='.$this->input->post('client_id'));
		// Redirect to a suitable page after the form submission
		
	}

}

public function pet_table() 
	{
	if (!$this->session->has_userdata('user_id')) {
			redirect('admin'); // Redirect to login page if not logged in
		}

	$id=1;
	
	$client_id = $this->input->get('client_id');

	// Use $user_id as needed in your controller logic

	// Optionally, you can pass it to the view
	$data['client_id'] = $client_id;

	//Fetch the data using the fetch_all() function
	$petUsers = $this->Users_model->fetch_allpet($id);
	
	$data['petUsers'] = $petUsers;
	
	$this->load->view('backend/include/header');
	$this->load->view('backend/include/nav');
	$this->load->view('backend/page/pet_table', $data);
	$this->load->view('backend/include/footer');
}

public function purchasedprod_list() 
	{
	if (!$this->session->has_userdata('user_id')) {
			redirect('admin'); // Redirect to login page if not logged in
		}
	$id=1;
	// Fetch the data using the fetch_all() function
	$purchasedprod_list = $this->Users_model->fetch_allpurchasedprod_list($id);
	// Pass the fetched data to the view
	$data['purchasedprod_list'] = $purchasedprod_list;
	// Load the view to display the table with data
	$this->load->view('backend/include/header');
	$this->load->view('backend/include/nav');
	$this->load->view('backend/page/purchasedprod_list', $data);
	$this->load->view('backend/include/footer');
}

public function purchase_form() {

	$id = $this->input->get('productID');
	// Fetch the data using the fetch_all() function
	$clientUsers = $this->Users_model->fetch_allclient();
	 // Pass the fetched data to the view
	 $data['clientUsers'] = $clientUsers;

	  //Fetch the data using the fetch_all() function
	$productUsers = $this->Users_model->fetch_product_price($id);
	
	$data['productUsers'] = $productUsers;
	$data['id'] = $this->input->get('productID');
	//	carga ang id number ni client-user pra ma trace kinsay tag iya sa pet
	
	$this->form_validation->set_rules('client', 'Client', 'required');
	$this->form_validation->set_rules('date_purchased', 'Date Purchased', 'required');
	$this->form_validation->set_rules('quantity_purchased', 'Quantity', 'required');
	$this->form_validation->set_rules('total_cost', 'Cost', 'required');
	
	

	if (!$this->session->has_userdata('user_id')) {
		redirect('admin'); // Redirect to login page if not logged in
	}


        // Use $user_id as needed in your controller logic

		if ($this->form_validation->run() === FALSE) {
			// Validation failed, redirect back to the form
			$productID = $this->input->get('productID');
	
			// Use $user_id as needed in your controller logic
	
			// Optionally, you can pass it to the view
			$data['productID'] = $productID;

        
        // $this->load->view('your_view', $data);
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
		$this->load->view('backend/page/purchase_form',$data);
		$this->load->view('backend/include/footer');
	} else {
		// Validation succeeded, proceed with data insertion
		$data = array(
			//'purchaseID' => will be generated by mysql since its primary key
			'productID' => $this->input->post('productID'),
			'client_id' => $this->input->post('client'),
			'date_purchased' => $this->input->post('date_purchased'),
			'quantity_purchased' => $this->input->post('quantity_purchased'),
			'total_cost' => $this->input->post('total_cost'),
			
			
		);

		$result = $this->Users_model->insert_datapurchase($data);

		if ($result) {
			// Data insertion was successful
			$this->session->set_flashdata('success', 'Data inserted successfully.');
		} else {
			// Data insertion failed
			$this->session->set_flashdata('error', 'Failed to insert data.');
		}

		// Redirect to a suitable page after the form submission
		redirect('purchase_table?productID=' . $id);
	}

}




public function purchase_table() 
	{

		//continue here
	if (!$this->session->has_userdata('user_id')) {
			redirect('admin'); // Redirect to login page if not logged in
		}

	$clientUsers = $this->Users_model->fetch_allclient();
	$data['clientUsers'] = $clientUsers;
	
	$productID = $this->input->get('productID');

	// Use $user_id as needed in your controller logic

	// Optionally, you can pass it to the view
	$data['productID'] = $this->input->get('productID');

	//Fetch the data using the fetch_all() function
	$purchaseUsers = $this->Users_model->fetch_allpurchase($productID);
	
	$data['purchaseUsers'] = $purchaseUsers;
	
	$this->load->view('backend/include/header');
	$this->load->view('backend/include/nav');
	$this->load->view('backend/page/purchase_table', $data);
	$this->load->view('backend/include/footer');
}



public function reports() {
	if (!$this->session->has_userdata('user_id')) {
			redirect('admin'); // Redirect to login page if not logged in
		}
	$id=1;

        // Fetch the data using the fetch_all() function
		$appointmentUsers = $this->Users_model->fetch_allappointments($id);
		// Pass the fetched data to the view
		$data['appointmentUsers'] = $appointmentUsers;

		$purchaseData = $this->Users_model->getPurchaseByClient($id);

		// Pass the fetched data to the view
		$data['purchases'] = $purchaseData;

		$petData = $this->Users_model->getPetByClient($id);

		// Pass the fetched data to the view
		$data['pets'] = $petData;

	// Fetch the data using the fetch_all() function
		$reports = $this->Users_model->fetch_allreports($id);
		// Pass the fetched data to the view
		$data['reports'] = $reports;
		// Load the view to display the table with data
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
		$this->load->view('backend/page/reports', $data);
		$this->load->view('backend/include/footer');
}



public function profile(){

	$admin_id = $this->session->userdata('user_id');

	$data['adminDetails'] =  $this->Users_model->getAdminById($admin_id);

	$this->load->view('backend/include/header',$data);
	$this->load->view('backend/include/nav',$data);
	$this->load->view('backend/page/profile',$data);
	

}

	public function settings(){
		$data['website_info'] = $this->Users_model->fetch_all("website_info");	
		$this->load->view('backend/page/settings',$data);	
		$this->load->view('backend/include/header', $data);
		$this->load->view('backend/include/nav');
	}
	
	
public function insertFromSettings(){

		if (isset($_POST['settings_btn'])) {
			
			$insertArray=array(
				'site_name' => $this->input->post('site_info'),
				'about' => $this->input->post('about_info'),
				'contact' => $this->input->post('contact_info'),
				'email' => $this->input->post('email_info'),
				'location' => $this->input->post('location_info')
			);
			
			//echo "<script>console.log('Debug Objects: " . $site,$about,$contact,$email,$location . "' );</script>";
			$result=$this->Users_model->set_update('website_info',3,$insertArray);
			if($result){
				echo "<script>console.log('Debug Objects: " . "Record Added" . "' );</script>";
				$this->session->set_flashdata('msg_settings','Website Updated Successfully');
				
			}
			else{
				$this->session->set_flashdata('msg_settings_error','Failed to Update');
			}
		}
		redirect('Settings');
	}
	

	
}
