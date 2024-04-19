<main>
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
                        <h6 class="mb-4">ATTENDANCE TABLE</h6>
                        <div class="row">
                            <div class="col-md-3"> <!-- Adjusted column size to one-fourth -->
                                <!-- Search Bar -->
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="searchAttendanceInput" placeholder="Search...">
                                </div>
                            </div>
                            <div class="col-md-3"  style="padding-left:600px" > <!-- Adjusted column size to one-fourth -->
                                <!-- Back Button -->
                                <a href="<?= base_url()?>index.php/attendance" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-start align-middle table-bordered table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Employee Name</th>
                                        <th scope="col">Number of Days Present</th>
                                        <th scope="col">Number of Days Absent</th> 
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($attendance_table as $key => $user): ?>
                                        <tr class="<?php echo $key % 2 === 0 ? 'bg-light' : 'bg-white'; ?>">
                                            <td><?php echo $key + 1 ?></td>
                                            <td><?php echo $user->employeeName; ?></td>
                                            <td><?php echo $user->numOfDaysPresent; ?></td>
                                            <td><?php echo $user->numOfDaysAbsent; ?></td>
                                            <td>
                                            <a href="<?= base_url();?>index.php/salary_form?employeeID=<?php echo $user->employeeID; ?>&numOfDaysPresent=<?php echo $user->numOfDaysPresent; ?>&attendanceID=<?php echo $user->attendanceID; ?>" class="btn btn-primary">Pay Salary</a>
                                            <a href="<?= base_url();?>index.php/salary_table?employeeID=<?php echo $user->employeeID; ?>&numOfDaysPresent=<?php echo $user->numOfDaysPresent; ?>&attendanceID=<?php echo $user->attendanceID;?>" class="btn btn-primary">Paid Salary</a>
                                        </td>

                                            </td>
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
    
    <script>
        // Search Function
        document.getElementById("searchAttendanceInput").addEventListener("input", function() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchAttendanceInput");
            filter = input.value.toUpperCase();
            table = document.querySelector(".table");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1]; // Change index to the column you want to search
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        });
    </script>

<script>
    $(document).ready(function() {
        // Retrieve parameters from URL
        const urlParams = new URLSearchParams(window.location.search);
        const employeeID = urlParams.get('employeeID');
        const status = urlParams.get('status');

        if (employeeID && status) {
            // Find the corresponding row in the table and update the attendance status
            const row = $(`tr[data-employeeID="${employeeID}"]`);
            if (row.length > 0) {
                if (status === 'present') {
                    // Update the number of days present
                    const presentDays = parseInt(row.find('.presentDays').text()) + 1;
                    row.find('.presentDays').text(presentDays);
                } else if (status === 'absent') {
                    // Update the number of days absent
                    const absentDays = parseInt(row.find('.absentDays').text()) + 1;
                    row.find('.absentDays').text(absentDays);
                }
            }
        }
    });
</script>


</main>
