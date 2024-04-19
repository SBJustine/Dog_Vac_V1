<style>
        .arrow {
            float: right;
        }
        .arrow {
        float: right;
        }
        
        /* Add column lines */
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }
    </style>
<main>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded-top p-4">
            <div class="row">
                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">List of Appointments</h6>
                        <div class="table-responsive">

                            <div class="table text-start align-middle table-bordered table-hover mb-0" >
                                <table class="table datanew" id="appointmentList">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name of Owner</th>
                                            <th scope="col">Client Address</th>
                                            <th scope="col">Contact Number</th>
                                            <th scope="col">Name of Pet</th>
                                            <th scope="col">Pet Breed</th>
                                            <th scope="col">Type of Service</th>
                                            <th scope="col">Appointment Date<span class="arrow"></span></th>
                                            <th scope="col">Appointment Time</th>
                                            <th scope="col">Status</th>
                                            <th scope="col" colspan="2">Action</th>
                                            <th scope="col" colspan="2">Next Appointment</th>
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
                                                <td>
                                                    <button  class="btn btn-primary btn-sm reschedule-btn" value="<?php echo $appointments['appointmentId'] ?>">Reschedule</button>
                                                </td>

                                                <td>
                                                    <button class="btn btn-primary btn-sm approve-btn" value="<?php echo $appointments['appointmentId'] ?>">Approve</button>
                                                </td>
                                                <td>
                                                    <!-- <a class="btn btn-primary btn-sm" href="<?= base_url()?>index.php/next_appointment" >Add</a> -->
                                                  
                                                    <a class="btn btn-primary btn-sm" href="<?= base_url()?>index.php/next_appointment?appointmentId=<?= $appointments['appointmentId'] ?>">Add</a>
                                               

                                                </td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm ">View</button>
                                                </td>
                                                
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
</main>

<script>
        document.addEventListener('DOMContentLoaded', function() {

            
            var approveButtons = document.querySelectorAll('.approve-btn');
            approveButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    // Get the value of the clicked button
                    var id = button.value;

                    alert("Are you sure you want to approve this appointment?");

                    // Redirect to a specific URL with the button value as a parameter
                    window.location.href = '<?php echo base_url("index.php/approve_appointment/") ?>' + id;
                });
            });


            var rescheduleButtons = document.querySelectorAll('.reschedule-btn');
            rescheduleButtons.forEach(function(button){
                button.addEventListener('click', function(){
                    var id = button.value;
                    alert("An SMS is sent to the client with the rescheduled date!");

                    window.location.href = '<?php echo base_url("index.php/reschedule_appointment/") ?>' + id;
                });
            });
        });
</script>
