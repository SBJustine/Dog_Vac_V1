<main>
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 justify-content-center">
            <div class="col-md-6">
                <div class="bg-light rounded h-100 p-4">
                    <form action="<?= base_url() ?>index.php/salary_form" method="post">
                        <div class="row mb-3">
                            <div class="col-md-9">
                                <!-- Back Button -->
                                <a href="<?= base_url() ?>index.php/attendance_table" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-9">
                                <div class="form-floating">
                                    <?php
                                    // Retrieve the number of days present from the URL parameter
                                    $numOfDaysPresent = isset($_GET['numOfDaysPresent']) ? $_GET['numOfDaysPresent'] : null;
                                    ?>

                                    <?php
                                    // Initialize $numOfDaysPresent to 0 by default
                                    if (!empty($recent_datePaid)) {
                                        $numOfDaysPresent = 0;
                                        $currentDate = new DateTime(); // Get current date
                                        $recentDatePaid = new DateTime($recent_datePaid); // Convert recent_datePaid to a DateTime object

                                        // Calculate the difference in days between current date and recentDatePaid
                                        $diff = $currentDate->diff($recentDatePaid);
                                        $numOfDaysPresent = $diff->days;
                                    }
                                    ?>
                                    <input type="text" name="numOfDaysPresent" class="form-control" id="numOfDaysPresent" placeholder="" value="<?= $numOfDaysPresent ?>" readonly>
                                    <label for="numOfDaysPresent">Days Present</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="employeeSalary" class="form-control" id="employeeSalary" placeholder="">
                            <label for="employeeSalary">Employee Salary</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="total_salary" class="form-control" id="total_salary" placeholder="" readonly>
                            <label for="total_salary">Total</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="datetime-local" name="datePaid" class="form-control" id="datePaid" value="<?php echo date('Y-m-d\TH:i'); ?>" required readonly>
                            <label for="datePaid">Date Paid</label>
                        </div>
                        <div class="modal-footer d-flex">
                            <input type="hidden" name="employeeID" class="form-control" id="" placeholder="" value="<?= $employeeID ?>">
                            <input type="hidden" name="attendanceID" value="<?= isset($_GET['attendanceID']) ? $_GET['attendanceID'] : '' ?>">
                            <input type="hidden" name="employeeID" value="<?= $id ?>">
                            <input type="submit" class="btn btn-primary" value="PAY" <?= $numOfDaysPresent == 0 ? 'disabled' : '' ?>>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Calendar Reminder</h6>
                        <a href="#">Show All</a>
                    </div>
                    <div id="calendar"></div>
                </div>
            </div>

        </div>
    </div>
</main>

<script>
    // Add event listener to calculate total salary when the page is loaded and when the salary input changes
    document.addEventListener('DOMContentLoaded', calculateTotalSalary);
    document.getElementById('employeeSalary').addEventListener('input', calculateTotalSalary);

    function calculateTotalSalary() {
        const numOfDaysPresent = parseInt(document.getElementById('numOfDaysPresent').value.replace(/,/g, '')) || 0;
        const employeeSalary = parseFloat(document.getElementById('employeeSalary').value.replace(/,/g, '')) || 0;
        const totalSalary = numOfDaysPresent * employeeSalary;
        document.getElementById('total_salary').value = totalSalary.toLocaleString(); // Convert to localized string
    }
</script>


