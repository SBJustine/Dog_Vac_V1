<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	public function __construct(){
		parent::__construct();

	}



		function authenticate($email){
			$query = $this->db->query("SELECT * FROM `admin_users` where email='$email' " );
			if ($query->num_rows() > 0) {
				return $query->result();
			}
				return 0;
		}
		
		
		function authenticateclient($email){
			$query = $this->db->query("SELECT * FROM `client_users` where client_email='$email' " );
			if ($query->num_rows() > 0) {
				return $query->result_array();
			}
				return 0;
		}


		function get_admin_logged_info($id){
			$query = $this->db->query("SELECT *, resident_info.firstname,resident_info.lastname,resident_info.contact_no FROM 'admin_users' inner join resident_info.info' on admin_users.res_id=resident_info.id where admin_users.admin_id='$id'");
			if ($query->num_rows() >0){
				return $query->result();
			} 
			return 0;
	

			
		}



//Display Appointment Client Details Account here


// pet table view
public function getPetByClient($client_id){
	$this->db->where('client_id', $client_id);
	
	$query = $this->db->get('pet_users');

	if($query){
		return $query->result_array();
	}else{
		return false;
	}
}

public function getNextAppointment($appointmentId){
	$this->db->where('appointmentId', $appointmentId);
	
	$query = $this->db->get('next_appointment');

	if($query){
		return $query->result_array();
	}else{
		return false;
	}
}

// purchase table view
public function getPurchaseByClient($client_id){
	$this->db->select('purchase_table.purchaseID, client_users.client_fullname, product_table.productID, product_table.productName, product_table.cost, SUM(purchase_table.quantity_purchased) as quantity_purchased, SUM(purchase_table.total_cost) as total_cost');
	$this->db->from('purchase_table');
	$this->db->join('client_users', 'client_users.client_id = purchase_table.client_id');
	$this->db->join('product_table', 'product_table.productID = purchase_table.productID');
	$this->db->where('purchase_table.client_id', $client_id);
	$this->db->group_by('purchase_table.productID'); // Group by productID to aggregate quantities and total costs
	
	$query = $this->db->get();
	
	if($query->num_rows() > 0){
		return $query->result_array();
	} else {
		return array(); // Return an empty array if no results found
	}
}



public function getAdminProfile($adminId) {
	// Query the database to retrieve the admin's profile data based on the admin ID
	$query = $this->db->get_where('admin_users', array('admin_id' => $adminId));

	// Check if a matching admin record was found
	if ($query->num_rows() > 0) {
		// Return the admin's profile data as an object
		return $query->row();
	} else {
		// If no matching record was found, return false or handle the case accordingly
		return false;
	}
}




		//Display  Account here
		function fetch_all($id){

			$query = $this->db->query("SELECT * FROM `admin_users`   " );
			return $query->result();

		}



		public function getAdminById($admin_id){
			$this->db->where('admin_id', $admin_id);
			$query = $this->db->get('admin_users');

			if($query){
				return $query->row();
			}else{
				return false;
			}
		}

		public function getClientById($client_id){
			$this->db->where('client_id', $client_id);
			$query = $this->db->get('client_users');

			if($query){
				return $query->row();
			}else{
				return false;
			}
		}

		// In your model file (e.g., Users_model.php)

public function updateClientInfo($client_id, $data) {
    $this->db->where('client_id', $client_id);
    $this->db->update('client_users', $data);
}



		
		function fetch_employee_by_name($employeeName) {
			
			$query = $this->db->query("SELECT * FROM `employee_table` WHERE `employeeName` = '". $employeeName."'");
			return $query->result();
		}

		function fetch_employee_by_id($id) {
			
			$query = $this->db->query("SELECT * FROM `employee_table` WHERE `employeeID` = '". $id."'");
			return $query->result();
		}

		

		function fetch_allclient(){

			$query = $this->db->query("SELECT * FROM `client_users`   " );
			return $query->result();

		}
		function fetch_allpetOwner($id){

			$query = $this->db->query("SELECT * FROM `client_users`   " );
			return $query->result();

		}
		function fetch_allpet($id){

			// ONCE NGA NAA NAY ID SA OWNER ANG PET, PWEDE NA MAGFILTER GAMIT ANG where client-ID = $id

			$query = $this->db->query("SELECT * FROM `pet_users`" );
			return $query->result();

		}

		function fetch_allsalaries($id){

			// ONCE NGA NAA NAY ID SA OWNER ANG PET, PWEDE NA MAGFILTER GAMIT ANG where client-ID = $id

			$query = $this->db->query("SELECT * FROM `employee_table`" );
			return $query->result();

		}
		// function fetch_allsalary($id){

		// 	$query = $this->db->query("SELECT * FROM `salary_table`   " );
		// 	return $query->result();

		// }

		public function fetch_allsalary() {
			$this->db->select('salary_table.employeeID,salary_table.salaryID, attendance_table.numOfDaysPresent, salary_table.employeeSalary, salary_table.total_salary');
			$this->db->from('salary_table');
			$this->db->join('attendance_table', 'attendance_table.attendanceID = salary_table.attendanceID');
			$query = $this->db->get();
		
			return $query->result(); // Return an array of objects
		}

		public function get_recent_date_paid($employeeID) {
			$this->db->select('MAX(datePaid) as recent_datePaid');
			$this->db->where('employeeID', $employeeID);
			$query = $this->db->get('salary_table');
		
			return $query->row()->recent_datePaid;
		}


		function fetch_allpurchasedprod_list($id){

			$query = $this->db->query("SELECT * FROM `product_table`   " );
			return $query->result();

		}

		function fetch_allpurchasedlist(){
			

			$query = $this->db->query("SELECT * FROM `purchase_table`" );
			return $query->result();

		}

		public function fetch_allpurchase() {
			$this->db->select('purchase_table.purchaseID, client_users.client_fullname, product_table.productID, product_table.cost, purchase_table.quantity_purchased, purchase_table.total_cost');
			$this->db->from('purchase_table');
			$this->db->join('client_users', 'client_users.client_id = purchase_table.client_id');
			$this->db->join('product_table', 'product_table.productID = purchase_table.productID');
			$query = $this->db->get();
		
			return $query->result(); // Return an array of objects
		}

		function fetch_product_price($id){
			$query = $this->db->query("SELECT * FROM `product_table`  WHERE productID='$id' " );
			return $query->result();
		}

		

		// function fetch_allpurchase($id){

		// 	$query = $this->db->query("SELECT * FROM `purchase_table`" );
		// 	return $query->result();

		// }


		function fetch_allreports($id){

			$query = $this->db->query("SELECT * FROM `reports`   " );
			return $query->result();

		}

		

		function fetch_allappointments(){
			$query = $this->db->query("SELECT * FROM `appointments`");
			return $query->result_array();
		}


		function fetchAllTodaysAppointments(){
			// Set the timezone to Asia/Manila
			date_default_timezone_set('Asia/Manila');
		
			// Get the current date in the format 'Y-m-d'
			$current_date = date('Y-m-d');
		
			// Query appointments where appointmentDate is equal to the current date
			$this->db->where('appointmentDate', $current_date);
			$query = $this->db->get('appointments');
			
			return $query->result_array();
		}
		



		public function fetchAppointmentsById($client_id){
			$this->db->where('client_id', $client_id);
			
			if($query = $this->db->get('appointments')){
				return $query->result_array();
			}else{
				return false;
			}
		}

		public function fetchNextAppointmentsById($appointmentId){
			$this->db->where('appointmentId', $appointmentId);
			
			if($query = $this->db->get('next_appointment')){
				return $query->result_array();
			}else{
				return false;
			}
		}



		public function approveAppointment($id){
			$status = "Approved";

			$data = array(
				'appointmentStatus' => $status
			);

			$this->db->where('appointmentId', $id);
			if($this->db->update('appointments', $data)){
				return true;
			}else{
				return false;
			}
		}


		public function reScheduleAppointment($id){
			$status = "Rescheduled";

			$data = array(
				'appointmentStatus' => $status
			);

			$this->db->where('appointmentId', $id);
			if($this->db->update('appointments', $data)){
				return true;
			}else{
				return false;
			}
		}

		public function cancelAppointment($id){


			$this->db->where('appointmentId', $id);
			if($this->db->delete('appointments')){
				return true;
			}else{
				return false;
			}
		}



		public function countAppointmentsById($client_id){
			$this->db->where('client_id', $client_id);
			
			if($query = $this->db->get('appointments')){
				return $query->num_rows();
			}else{
				return false;
			}
		}



		function get_client_fullname($client_id) {
			$this->db->select('client_fullname');
			$this->db->where('client_id', $client_id);
			$query = $this->db->get('client_users');
			
			if ($query->num_rows() > 0) {
				$row = $query->row();
				return $row->client_fullname;
			} else {
				return false;
			}
		}

		function get_client_address($client_id) {
			$this->db->select('client_address');
			$this->db->where('client_id', $client_id);
			$query = $this->db->get('client_users');
			
			if ($query->num_rows() > 0) {
				$row = $query->row();
				return $row->client_address;
			} else {
				return false;
			}
		}

		function get_client_phone_number($client_id) {
			$this->db->select('phone_number');
			$this->db->where('client_id', $client_id);
			$query = $this->db->get('client_users');
			
			if ($query->num_rows() > 0) {
				$row = $query->row();
				return $row->phone_number;
			} else {
				return false;
			}
		}

		function insert_dataappointmentClient($data)
		{
			$this->db->insert('appointments', $data);
			$affectedRows = $this->db->affected_rows();
			return $affectedRows > 0;
		}


		function get_pet_name($appointmentId) {
			$this->db->select('pet_name');
			$this->db->where('appointmentId', $appointmentId);
			$query = $this->db->get('pet_users');
			
			if ($query->num_rows() > 0) {
				$row = $query->row();
				return $row->client_fullname;
			} else {
				return false;
			}
		}

		function get_service($appointmentId) {
			$this->db->select('service');
			$this->db->where('appointmentId', $appointmentId);
			$query = $this->db->get('appointments');
			
			if ($query->num_rows() > 0) {
				$row = $query->row();
				return $row->client_fullname;
			} else {
				return false;
			}
		}
		
		function insert_dataappointmentNext($data)
		{
			$this->db->insert('next_appointment', $data);
			$affectedRows = $this->db->affected_rows();
			return $affectedRows > 0;
		}
		

		// public function fetch_client_details($user_id) {
		// 	$this->db->select('client_fullname');
		// 	$this->db->from('client_users');
		// 	$this->db->where('client_id', $user_id);
		// 	$query = $this->db->get();
			
		// 	if ($query->num_rows() == 1) {
		// 		return $query->row(); // Return the client details as an object
		// 	} else {
		// 		return null; // Return null if client not found
		// 	}
		// }

		// public function fetch_allappointments() {
		// 	$this->db->select('appointments.appointmentId, client_users.client_fullname, client_users.client_address, client_users.phone_number');
		// 	$this->db->from('appointments');
		// 	$this->db->join('client_users', 'client_users.client_id = appointments.client_id');
		// 	$query = $this->db->get();
		
		// 	return $query->result(); // Return an array of objects
		// }
		
		// function fetch_allappointmentsHistory($id){

		// 	$query = $this->db->query("SELECT * FROM `appointments`   " );
		// 	return $query->result();

		// }

		// function fetch_allappointmentsHistory($id) {
		// 	$query = $this->db->query("SELECT *, 'pending' AS status FROM appointments");
		// 	return $query->result();
		// }
		

		// function update_appointment_status($id, $status) 
		// {
		// 	// Update appointment status in the database
		// 	$this->db->where('appointmentId', $id);
		// 	$this->db->update('appointments', ['status' => $status]);
		// }


		function fetch_allemployee($id){

			$query = $this->db->query("SELECT * FROM `employee_table`   " );
			return $query->result();

		}

		function fetch_allproduct($id){

			$query = $this->db->query("SELECT * FROM `product_table`   " );
			return $query->result();

		}


		function fetch_allattendance($id){

			$query = $this->db->query("SELECT * FROM `employee_table`   " );
			return $query->result();

		}

		function fetch_allattendance_table($id){

			$query = $this->db->query("SELECT * FROM `employee_table`   " );
			return $query->result();

		}
		
		
		function fetch_allowner_pet($id){

			$query = $this->db->query("SELECT * FROM `pet_table`   " );
			return $query->result();

		}

		

		function fetch_allprofile($id){

			$query = $this->db->query("SELECT * FROM `profile`   " );
			return $query->result();

		}
		
		public function update_admin($id, $data) {
			$this->db->where('admin_id', $id);
			$this->db->update('admin_users', $data);
			
			return $this->db->affected_rows() > 0;
		}
		
		function get_info($id) {
			$query = $this->db->select('*')
								->from('admin_users')
								->where('admin_id', $id)
								->get();
		
			return $query->result();
		}

		// //appointment list update
		// public function reschedule_appointment($id) {
		// 	$this->db->where('appointmentId', $id);
		// 	$this->db->update('appointments', ['appointmentStatus' => 'Rescheduled']);
		// 	return $this->db->affected_rows() > 0;
		// }
		
		// public function approve_appointment($id) {
		// 	$this->db->where('appointmentId', $id);
		// 	$this->db->update('appointments', ['appointmentStatus' => 'Approved']);
		// 	return $this->db->affected_rows() > 0;
		// }

		
		// //appointment list update client
		// public function update_appointment($appointmentId, $appointmentDate, $appointmentTime) {
		// 	$data = array(
		// 		'appointmentDate' => $appointmentDate,
		// 		'appointmentTime' => $appointmentTime
		// 	);
		
		// 	$this->db->where('appointmentId', $appointmentId);
		// 	$this->db->update('appointments', $data);
		
		// 	return $this->db->affected_rows() > 0;
		// }
		
		
		public function updateClient($client_id, $update_data) {
			// Update the user information in the database
			$this->db->where('client_id', $client_id);
			$this->db->update('client_users', $update_data);
	
			// Check if the update was successful
			if ($this->db->affected_rows() > 0) {
				return true; // Return true if the update was successful
			} else {
				return false; // Return false if the update failed
			}
		}

		//employee table update

		public function update_employee($id, $data) {  
			$this->db->where('employeeID', $id);
			$this->db->update('employee_table', $data);
			return $this->db->affected_rows() > 0;
		}   
		
		function get_infoemployee($id){
			$query = $this->db->select('*')
							->from('employee_table')
							->where('employeeID', $id)
							->get();
			return $query->row_array();
		}
		
		//client update

		public function update_client($id, $data) {  
			$this->db->where('client_id', $id);
			$this->db->update('client_table', $data);
			return $this->db->affected_rows() > 0;
		}   
		
		public function get_client_info($id){
			$query = $this->db->select('*')
							->from('client_table')
							->where('client_id', $id)
							->get();
			return $query->row_array();
		}

		// pet update 

		public function update_pet($id, $data) {  
        $this->db->where('client_id', $id);
        $this->db->update('pet_users', $data);
        return $this->db->affected_rows() > 0;
    }   
    
    public function get_pet_info($id){
        $query = $this->db->select('*')
                        ->from('pet_users')
                        ->where('client_id', $id)
                        ->get();
        return $query->row_array();
    }


	// product update 

	public function update_product($id, $data) {  
		$this->db->where('productID', $id);
		$this->db->update('product_table', $data);
		return $this->db->affected_rows() > 0;
	}   
	
	public function get_product_info($id){
		$query = $this->db->select('*')
						->from('product_table')
						->where('productID', $id)
						->get();
		return $query->row_array();
	}

	//purchase update 

	public function update_purchase($id, $data) {  
		$this->db->where('productID', $id);
		$this->db->update('product_table', $data);
		return $this->db->affected_rows() > 0;
	}   
	
	public function get_purchase_info($id){
		$query = $this->db->select('*')
						->from('product_table')
						->where('productID', $id)
						->get();
		return $query->row_array();
	}
	

		function fetch_info()
		{
			$query 	= $this->db->query("SELECT * FROM `system_info` " );

			return $query->result();
		}



		//Add Account here


		// REGISTER MODEL
		function register($data)
		{
			$this->db->insert('client_users', $data);
			$afftectedRows = $this->db->affected_rows();
			if ($afftectedRows > 0) {
				return TRUE;
			} else {
				return FALSE;
			}
		}





		function insert_data($data)
		{
			$this->db->insert('admin_users', $data);
			$afftectedRows = $this->db->affected_rows();
	        if ($afftectedRows > 0) {
	            return TRUE;
	        } else {
	            return FALSE;
	        }
		}


		function insert_dataappointments($data){
			$this->db->insert('appointments', $data);
			$afftectedRows = $this->db->affected_rows();
	        if ($afftectedRows > 0) {
	            return TRUE;
	        } else {
	            return FALSE;
	        }
		}

		// function insert_dataappointmentNext($data)
		// {
		// 	$this->db->insert('next_appointment', $data);
		// 	$afftectedRows = $this->db->affected_rows();
	    //     if ($afftectedRows > 0) {
	    //         return TRUE;
	    //     } else {
	    //         return FALSE;
	    //     }
		// }

		
		function insert_dataclient($data)
		{
			$this->db->insert('client_users', $data);
			$afftectedRows = $this->db->affected_rows();
	        if ($afftectedRows > 0) {
	            return TRUE;
	        } else {
	            return FALSE;
	        }
		}


		function insert_datapet($data)
		{
			$this->db->insert('pet_users', $data);
			$afftectedRows = $this->db->affected_rows();
	        if ($afftectedRows > 0) {
	            return TRUE;
	        } else {
	            return FALSE;
	        }
		}


		
		function insert_datasalary($data)
		{
			$this->db->insert('salary_table', $data);
			// $afftectedRows = $this->db->affected_rows();
	        // if ($afftectedRows > 0) {
	        //     return TRUE;
	        // } else {
	        //     return FALSE;
	        // }
		}

		function insert_datapurchase($data)
		{
			$this->db->insert('purchase_table', $data);
			$afftectedRows = $this->db->affected_rows();
	        if ($afftectedRows > 0) {
	            return TRUE;
	        } else {
	            return FALSE;
	        }
		}

		function insert_dataemployee($data)
		{
			$this->db->insert('employee_table', $data);
			$afftectedRows = $this->db->affected_rows();
	        if ($afftectedRows > 0) {
	            return TRUE;
	        } else {
	            return FALSE;
	        }
		}

		//this code below only called when new employee is added
		function insert_pre_employeeAttendance($data)
		{
			$this->db->insert('attendance_table', $data);
			$afftectedRows = $this->db->affected_rows();
	        if ($afftectedRows > 0) {
	            return TRUE;
	        } else {
	            return FALSE;
	        }
		}

		function insert_dataproduct($data)
		{
			$this->db->insert('product_table', $data);
			$afftectedRows = $this->db->affected_rows();
	        if ($afftectedRows > 0) {
	            return TRUE;
	        } else {
	            return FALSE;
	        }
		}


		function insert_dataattendance_table($data)
		{
			$this->db->insert('attendance_table', $data);
			$afftectedRows = $this->db->affected_rows();
	        if ($afftectedRows > 0) {
	            return TRUE;
	        } else {
	            return FALSE;
	        }
		}

		// public function updateAttendance($employeeID, $status) {
		// 	// Update the attendance table based on the status
		// 	if ($status === 'present') {
		// 		// Increment the number of days present for the employee
		// 		// Perform necessary database update operation
		// 	} elseif ($status === 'absent') {
		// 		// Increment the number of days absent for the employee
		// 		// Perform necessary database update operation
		// 	}
		// }
		

		function set_update($table,$id,$data)
		{

			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update('system_info');
			$afftectedRows = $this->db->affected_rows();
	        if ($afftectedRows > 0) {
	            return TRUE;
	        } else {
	            return FALSE;
	        }

		}



}

?>
