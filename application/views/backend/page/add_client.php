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
                    <h6 class="mb-4">Create Client</h6>
                    <form action="<?= base_url() ?>index.php/add_client" method="post" onsubmit="return validateClientForm()">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="client_fullname" class="form-control" id="client_fullname" placeholder="">
                                    <label for="floatingInput">Fullname</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="client_address" class="form-control" id="client_address" placeholder="">
                                    <label for="floatingInput">Address</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="sex" id="sex" aria-label="Floating label select example">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <label for="sex">Sex</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="">
                                    <label for="floatingInput">Phone Number</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="client_email" class="form-control" id="client_email" placeholder="">
                                    <label for="floatingInput">Email Address</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    <label for="floatingPassword">Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="client_status" id="client_status" aria-label="Floating label select example">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                    <label for="client_status">Status</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="datetime-local" name="date_added" class="form-control" id="appointmentDateTime" value="<?php echo date('Y-m-d\TH:i'); ?>" required>
                                    <label for="floatingInput">Date & Time</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex">
                            <input type="submit" class="btn btn-maroon custom-button" value="Create">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</main>

<script>
        function validateClientForm() {
            var fullnameInput = document.getElementById('client_fullname');
            var fullnameValue = fullnameInput.value.trim();
            var isValidFullname = /^[A-Za-z\s]+$/.test(fullnameValue); // Regex pattern to allow only letters and spaces
            
            if (!isValidFullname) {
                alert('Please enter a valid fullname with only letters and spaces.');
                return false;
            }
            return true;
        }
    </script>