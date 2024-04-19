<main>
    <style>
        .arrow {
            float: right;
        }
    </style>
    <div class="content" style="background-image: url('<?= base_url();?>assets/img1/gallery/section_bg02.png'); background-size: cover; background-position: center;">
    <!-- Chart Start -->
    <div class="container-fluid pt-4 px-4">

        <div class="container-fluid pt-4 px-4" style="margin-top:100px">
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
                                                <th scope="col">Name of Pet</th>
                                                <th scope="col">Pet Breed</th>
                                                <th scope="col">Type of Service</th>
                                                <th scope="col">Appointment Date<span class="arrow"></span></th>
                                                <th scope="col">Appointment Time</th>
                                                <th scope="col">Status</th>
                                                <th scope="col" colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($appointmentUsers as $key => $appointments) { ?>
                                                <tr>
                                                
                                                    <td><?php echo $key + 1 ?></td>
                                                    <td><?php echo $appointments['appointmentPetName'] ?></td>
                                                    <td><?php echo $appointments['petBreed'] ?></td>
                                                    <td><?php echo $appointments['service'] ?></td>
                                                    <td><?php echo $appointments['appointmentDate'] ?></td>
                                                    <td><?php echo $appointments['appointmentTime']?></td>
                                                    <td><?php echo $appointments['appointmentStatus'] ?></td>

                                                    <?php if($appointments['appointmentStatus'] === "Pending") {?>
                                                        <td style="text-align: center; vertical-align: middle;">
                                                            <span>.</span>
                                                        </td>
                                                    <?php }else{ ?>
                                                        <td>
                                                            <button class="btn btn-primary btn-sm cancel-btn" value="<?php echo $appointments['appointmentId'] ?>">Cancel</button>
                                                        </td>
                                                    <?php } ?>
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

        <div class="container-fluid pt-4 px-4" style="margin-top:5px">
            <div class="bg-light rounded-top p-4">
                <div class="row">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Next Appointments Appointments</h6>
                            <div class="table-responsive">

                                <div class="table text-start align-middle table-bordered table-hover mb-0" >
                                    <table class="table datanew" id="appointmentList">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Name of Pet</th>
                                                <th scope="col">Type of Service</th>
                                                <th scope="col">Next Schedule<span class="arrow"></span></th>
                                                <th scope="col">Veterinarian/Employee</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($next as $index => $appointments): ?>
                                                <tr>
                                                
                                                <td><?php echo $index + 1 ?></td>
                                                <td><?php echo $appointments['appointmentDate']; ?></td>
                                                <td><?php echo $appointments['pet_name']; ?></td>
                                                <td><?php echo $appointments['service']; ?></td>
                                                <td><?php echo $appointments['nextSchedule']; ?></td>
                                                <td><?php echo $appointments['employeeName']; ?></td>
                                                    
                                                </tr>
                                                <?php endforeach; ?>
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

</main>


<script>
        document.addEventListener('DOMContentLoaded', function() {

            
            var cancelButtons = document.querySelectorAll('.cancel-btn');
            cancelButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    // Get the value of the clicked button
                    var id = button.value;

                    alert("Are you sure you want to cancel this appointment?");

                    // Redirect to a specific URL with the button value as a parameter
                    window.location.href = '<?php echo base_url("index.php/cancel_appointment/") ?>' + id;
                });
            });
        });
</script>






