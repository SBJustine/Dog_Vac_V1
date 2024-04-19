<main>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded-top p-4">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <!-- Select List of Categories and Search Bar -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <!-- Replace dropdown with form-select -->
                                <select class="form-select" id="categorySelect">
                                    <option disabled selected>Select Category</option>
                                    <option value="appointment_table">Appointments</option>
                                    <option value="salary_table">Salary</option>
                                    <option value="purchase_table">Purchased Products</option>
                                </select>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <!-- Download and Print buttons -->
                                <a class="btn btn-primary mr-2" id="downloadButton">Download</a>
                                <a class="btn btn-primary" id="printButton">Print</a>
                            </div>
                        </div>

                        <!-- Tables for different categories -->
                        <div class="table-responsive" id="appointment_table_div" style="display: none;">
                            <table class="table text-start align-middle table-bordered table-hover mb-0" id="appointment_table">
                                <!-- Table content here -->
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($appointmentUsers as $key => $user): ?>
                                    <tr class="<?php echo $key % 2 === 0 ? 'bg-light' : 'bg-white'; ?>"   data-appointment-id="<?= $user->appointmentId; ?>">
                                        <td><?php echo $user->appointmentId; ?></td>
                                        <td><?php echo $user->appointmentName; ?></td>
                                        <td><?php echo $user->appointmentAddress; ?></td>
                                        <td><?php echo $user->appointmentContactNumber; ?></td>
                                        <td><?php echo $user->appointmentPetName; ?></td>
                                        <td><?php echo $user->petBreed; ?></td>
                                        <td><?php echo $user->vaccine; ?></td>
                                        <td><?php echo $user->appointmentDate; ?></td>
                                        <td><?php echo $user->appointmentTime; ?></td>
                                        <td><?php echo $user->appointmentStatus; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            </table>
                        </div>

                        <div class="table-responsive" id="salary_table_div" style="display: none;">
                            <table class="table datanew" id="salary_table">
                                <!-- Table content here -->
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Days Present</th>
                                    <th scope="col">Salary</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($salaryUsers as $key => $user): ?>
                                    <tr class="<?php echo (int)$key % 2 === 0 ? 'bg-light' : 'bg-white'; ?>" data-employee-id="<?= $user->employeeID; ?>">
                                        <?php if($user->employeeID==$employeeID): ?>
                                            <td><?php echo $user->salaryID; ?></td>
                                            <td><?php echo $user->numOfDaysPresent; ?></td>
                                            <td><?php echo $user->employeeSalary; ?></td>
                                            <td><?php echo $user->total_salary; ?></td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            </table>
                        </div>

                        <div class="table-responsive" id="purchase_table_div" style="display: none;">
                            <table class="table datanew" id="purchase_table">
                                <!-- Table content here -->
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Client Name</th>
                                    <th scope="col">Cost</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total Cost</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($purchaseUsers as $key => $user) : ?>
                                    <tr class="<?php echo (int)$key % 2 === 0 ? 'bg-light' : 'bg-white'; ?>">
                                        <?php if ($user->productID == $productID) : ?>
                                            <td><?php echo $user->purchaseID; ?></td>
                                            <td><?php echo $user->client_fullname; ?></td>
                                            <td><?php echo $user->cost; ?></td>
                                            <td><?php echo $user->quantity_purchased; ?></td>
                                            <td><?php echo $user->total_cost; ?></td>
                                            <td>
                                                <input type="hidden" name="productID" class="form-control" value="<?= $productID ?>">
                                                <button class="btn btn-primary">Update</button>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .arrow {
            float: right;
        }
    </style>

    <script>
        document.getElementById('categorySelect').addEventListener('change', function() {
            var selectedCategory = this.value;

            // Hide all tables
            document.querySelectorAll('.table-responsive').forEach(function(table) {
                table.style.display = 'none';
            });

            // Show the selected table
            if (selectedCategory !== '') {
                document.getElementById(selectedCategory + '_div').style.display = 'block';
            }
        });
    </script>
</main>
