<main>
    <style>
        .btn-maroon {
            background-color: maroon;
            color: white;
        }
    </style>
    
    <div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded-top p-4">
        <div class="row">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Add Next Appointment</h6>
                    <form action="<?= base_url() ?>index.php/next_appointment" method="post" onsubmit="return validateClientForm()">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" name="appointmentDate" class="form-control" id="appointmentDate" value="<?php echo date('Y-m-d'); ?>" required>
                                    <label for="floatingInput">Date</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="pet_name" class="form-control" id="pet_name" placeholder="">
                                    <label for="floatingInput">Pet Name</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="service" id="service" aria-label="Floating label select example">
                                        <option value="Vaccination">Vaccination</option>
                                        <option value="Treatment">Treatment</option>
                                        <option value="Deworming">Deworming</option>
                                        <option value="Grooming">Grooming</option>
                                    </select>
                                    <label for="sex">Service</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" name="nextSchedule" class="form-control" id="nextSchedule" value="<?php echo date('Y-m-d'); ?>" required>
                                    <label for="floatingInput">Next Schedule</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="employeeName" class="form-control" id="employeeName" placeholder="">
                                    <label for="floatingInput">Employee</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-footer d-flex">
                        <input type="text" name="appointmentId" class="form-control" id="appointmentId" placeholder="" value="<?= $appointmentId ?>">
                            <input type="submit" class="btn btn-maroon custom-button" value="Add">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</main>