        <!-- Content Start -->
        <div class="content" style="background-image: url('<?= base_url();?>assets/img1/gallery/section_bg02.png'); background-size: cover; background-position: center;">
            <!-- Chart Start -->
            <div class="container-fluid pt-4 px-4">
                
            
        <!-- Slider Single -->

                <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4" style="margin-top:100px">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Appointments</p>
                                <center><h1><?php echo $countAppointments ?></h1></center>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">My Products</p>
                                <h6>
                                <?php
                                    // Connect to the database
                                    $connection = mysqli_connect("localhost","root","","vaccine");

                                    // Check if the connection is successful
                                    if($connection){
                                        // Retrieve client_id from session data
                                        $client_id = $this->session->userdata('client_id');

                                        // Query to count the distinct productIDs purchased by the client
                                        $query = "SELECT COUNT(DISTINCT productID) as num_products FROM purchase_table WHERE client_id = $client_id";

                                        // Execute the query
                                        $query_run = mysqli_query($connection,$query);

                                        // Check if the query was successful
                                        if($query_run){
                                            // Fetch the result as an associative array
                                            $row = mysqli_fetch_assoc($query_run);

                                            // Display the number of unique products purchased by the client
                                            echo '<h1>' . $row['num_products'] . '</h1>';
                                        } else {
                                            // Display an error message if the query fails
                                            echo 'Error fetching data';
                                        }
                                    } else {
                                        // Display an error message if the database connection fails
                                        echo 'Database connection error';
                                    }
                                ?>
                                </h6>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">My Pets</p>
                                <h6>
                                <?php
                                    // Connect to the database
                                    $connection = mysqli_connect("localhost","root","","vaccine");

                                    // Check if the connection is successful
                                    if($connection){
                                        // Retrieve client_id from session data
                                        $client_id = $this->session->userdata('client_id');

                                        // Query to count the number of pets owned by the client
                                        $query = "SELECT COUNT(*) as num_pets FROM pet_users WHERE client_id = $client_id";

                                        // Execute the query
                                        $query_run = mysqli_query($connection,$query);

                                        // Check if the query was successful
                                        if($query_run){
                                            // Fetch the result as an associative array
                                            $row = mysqli_fetch_assoc($query_run);

                                            // Display the number of pets owned by the client
                                            echo '<h1>' . $row['num_pets'] . '</h1>';
                                        } else {
                                            // Display an error message if the query fails
                                            echo 'Error fetching data';
                                        }
                                    } else {
                                        // Display an error message if the database connection fails
                                        echo 'Database connection error';
                                    }
                                ?>
                                </h6>
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
                                    <h6 class="mb-4 d-inline">Appointments</h6>
                                </div>
                                <div class="col-2 d-flex align-items-end justify-content-end">
                                    <a href="<?= base_url()?>index.php/appointmentSchedule" class="btn btn-primary">Action</a>
                                </div>
                            </div>
                                <div class="table-responsive" style="margin-top:20px">
                                    <table class="table text-start align-middle table-bordered table-hover mb-0" id="appointmentList">
                                        <thead>
                                            <tr>
                                                <th scope="col" onclick="sortTableAppointment(0)">
                                                    <div class="d-flex justify-content-between align-items-center">#</div>
                                                </th>
                                                <th scope="col" onclick="sortTableAppointment(1)">
                                                    <div class="d-flex justify-content-between align-items-center">Name of Owner</div>
                                                </th>
                                                <th scope="col">Type of Service</th>
                                                <th scope="col">Appointment Date<span class="arrow"></span></th>
                                                <th scope="col">Contact Number</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($appointmentUsers as $key => $appointments) { ?>
                                                <tr>
                                                
                                                    <td><?php echo $key + 1 ?></td>
                                                    <td><?php echo $appointments['appointmentPetName'] ?></td>
                                                    <td><?php echo $appointments['service'] ?></td>
                                                    <td><?php echo $appointments['appointmentDate'] ?></td>
                                                    <td><?php echo $appointments['phone_number']?></td>
                                                    
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



            
        
        </div>
    </div>
    </div>
    </div>
