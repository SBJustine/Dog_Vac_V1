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
                        <h6 class="mb-4">Create Admin</h6>
                        <form action="<?= base_url() ?>index.php/create_admin" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="fullname" class="form-control" id="fullname" placeholder="">
                                        <label for="floatingInput">Fullname</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="type" id="type" aria-label="Floating label select example">
                                            <option value="admin">Admin</option>
                                            <option value="useradmin">Useradmin</option>
                                        </select>
                                        <label for="floatingInput">Type</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="">
                                        <label for="floatingInput">Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                        <label for="floatingPassword">Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="date" name="date_added" class="form-control" id="date_added" value="<?php echo date('Y-m-d'); ?>" required>
                                        <label for="floatingInput">Date</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="file" name="admin_pic" class="form-control" id="admin_pic" accept=".gif, .jpeg, .jpg, .png" required>
                                        <label for="admin_pic">Admin Picture</label>
                                    </div>
                                </div>
                                
                            <div class="row mb-3">
                                <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" name="adminContactNumber" class="form-control" id="adminContactNumber" placeholder="Contact Number">
                                            <label for="floatingPassword">Contact Number</label>
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
        function validateForm() {
            var fullnameInput = document.getElementById('fullname');
            var fullnameValue = fullnameInput.value.trim();
            var isValid = /^[A-Za-z\s]+$/.test(fullnameValue); // Regex pattern to allow only letters and spaces
            
            if (!isValid) {
                alert('Please enter a valid fullname with only letters and spaces.');
                return false;
            }
            return true;
        }
    </script>