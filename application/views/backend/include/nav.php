<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light" >
                
                <a href="<?= base_url();?>index.php/dashboard" style="margin-left:20px"><img src="<?= base_url();?>assets/img1/logo/vetlogo.png" alt=""></a>  
              
                
                <div class="navbar-nav w-100">

                <div class="nav-item dropdown" style= "margin-top:30px">
                    <a href="<?= base_url();?>index.php/dashboard" class="nav-item nav-link" ><i class="fa fa-tachometer-alt me-2" ></i>Dashboard</a>
                    </div> 
<!-- 
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user me-2"></i>Appointments</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="<?= base_url();?>index.php/appointment_list"  class="dropdown-item">Approve/Reschedule</a>
                    <a href="<?= base_url();?>index.php/next_appointment"  class="dropdown-item">Next Appointment</a>
                </div>
            </div> -->
                
            <a href="<?= base_url();?>index.php/appointment_list" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Appointments</a>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user me-2"></i>Admin Users</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="<?= base_url();?>index.php/create_admin"  class="dropdown-item">Add New Admin</a>
                        <a href="<?= base_url();?>index.php/admin_table"  class="dropdown-item">Admin Users</a>
                    </div>
                </div>



                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user me-2"></i>Employee</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="<?= base_url();?>index.php/add_employee"  class="dropdown-item">Add Employee</a>
                        <a href="<?= base_url();?>index.php/employee_table"  class="dropdown-item">List of employees</a>
                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user me-2"></i>Client/Pet</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="<?= base_url();?>index.php/add_client" class="dropdown-item">Add New Client</a>
                        <a href="<?= base_url();?>index.php/client_table" class="dropdown-item">List of Client/Add Pet</a>
                    </div>
                </div>
                
                <a href="<?= base_url();?>index.php/attendance" class="nav-item nav-link"><i class="fa fa-laptop me-2"></i>Attendance/Salary</a> 

                <a href="<?= base_url();?>index.php/product_table" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Product/Purchase</a>

                <a href="<?= base_url();?>index.php/reports" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Reports</a>        
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->