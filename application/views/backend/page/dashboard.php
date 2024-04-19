

            
<!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Number of Clients</p>
                                <h6>
                                     <?php
                                     $connection = mysqli_connect("localhost","root","","vaccine");

                                     $query = "SELECT client_id FROM client_users ORDER BY client_id";
                                     $query_run = mysqli_query($connection,$query);
                                     $row = mysqli_num_rows($query_run);

                                     echo '<h1>'.$row.'</h1>';
                                     ?>
                                    
                                    </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Pets Registered</p>
                                <h6>
                                <?php
                                     $connection = mysqli_connect("localhost","root","","vaccine");

                                     $query = "SELECT pet_id FROM pet_users ORDER BY pet_id";
                                     $query_run = mysqli_query($connection,$query);
                                     $row = mysqli_num_rows($query_run);

                                     echo '<h1>'.$row.'</h1>';
                                     ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Appointments</p>
                                <h6>
                                <?php
                                     $connection = mysqli_connect("localhost","root","","vaccine");

                                     $query = "SELECT appointmentId FROM appointments ORDER BY appointmentId";
                                     $query_run = mysqli_query($connection,$query);
                                     $row = mysqli_num_rows($query_run);

                                     echo '<h1>'.$row.'</h1>';
                                     ?>

                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Employees</p>
                                <h6>
                                <?php
                                     $connection = mysqli_connect("localhost","root","","vaccine");

                                     $query = "SELECT employeeID FROM employee_table ORDER BY employeeID";
                                     $query_run = mysqli_query($connection,$query);
                                     $row = mysqli_num_rows($query_run);

                                     echo '<h1>'.$row.'</h1>';
                                     ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->

    
            
    <style>
        .arrow {
            float: right;
        }
    </style>
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded-top p-4">
        <div class="row">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="row align-items-center">
                        <div class="col-10">
                            <h6 class="mb-4 d-inline">Today's Appointments</h6>
                        </div>
                        <div class="col-2 d-flex align-items-end justify-content-end">
                            <a href="<?= base_url()?>index.php/appointment_list" class="btn btn-primary">Show All</a>
                        </div>
                    </div>
                    <div class="table-responsive" style="margin-top:20px">
                    
                        <table class="table text-start align-middle table-bordered table-hover mb-0" id="appointmentList">
                        <thead>
                                    <tr>
                                        <th scope="col" onclick="sortTableAppointment(0)">
                                            <div class="d-flex justify-content-between align-items-center">#<span class="arrow">&#9650;</span></div>
                                        </th>
                                        <th scope="col" onclick="sortTableAppointment(1)">
                                            <div class="d-flex justify-content-between align-items-center">Name of Owner<span class="arrow">&#9650;</span></div>
                                        </th>
                                        <th scope="col">Client Address</th>
                                        <th scope="col">Conctact Number</th>
                                        <th scope="col">Name of Pet</th>
                                        <th scope="col">Pet Breed</th>
                                        <th scope="col">Type of Service</th>
                                        <th scope="col">Appointment Date<span class="arrow"></span></th>
                                        <th scope="col">Appointment Time</th>
                                        <th scope="col">Status</th>                                        
                                    </tr>
                                </thead>
                            <tbody>
                            <?php foreach ($appointmentUsers as $key => $appointments) { ?>
                            <tr>
                                <td><?php echo $key + 1?></td>
                                <td><?php echo $appointments['client_fullname'] ?></td>
                                <td><?php echo $appointments['client_address'] ?></td>
                                <td><?php echo $appointments['phone_number'] ?></td>
                                <td><?php echo $appointments['appointmentPetName'] ?></td>
                                <td><?php echo $appointments['petBreed'] ?></td>
                                <td><?php echo $appointments['service'] ?></td>
                                <td><?php echo $appointments['appointmentDate'] ?></td>
                                <td><?php echo $appointments['appointmentTime'] ?></td>
                                <td><?php echo $appointments['appointmentStatus'] ?></td>
                                
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





    
            
        