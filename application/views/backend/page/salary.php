<main>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded-top p-4">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <!-- Search Bar -->
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="searchPetOwnerInput" placeholder="Search...">
                            </div>
                        </div>
                        <table class="table text-start align-middle table-bordered table-hover mb-0" id="salaryTable">
                            <thead>
                                <tr>
                                    <th scope="col" onclick="sortTable(0)">
                                        <div class="d-flex justify-content-between align-items-center">
                                            # 
                                            <span class="arrow">&#9650;</span>
                                        </div>
                                    </th>
                                    <th scope="col" onclick="sortTable(1)">
                                        <div class="d-flex justify-content-between align-items-center">
                                            Employee Name
                                            <span class="arrow">&#9650;</span>
                                        </div>
                                    </th>
                                    <th scope="col">
                                        <div class="d-flex justify-content-between align-items-center">
                                            Action 
                                            <span class="arrow"></span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($salary as $key => $user): ?>
                                    <tr class="<?php echo $key % 2 === 0 ? 'bg-light' : 'bg-white'; ?>">
                                        <td><?php echo $user->employeeID; ?></td>
                                        <td><?php echo $user->employeeName; ?></td>
                                        <td>
                                            <a href="<?= base_url();?>index.php/salary_form?employeeID=<?php echo $user->employeeID; ?>" class="btn btn-primary">Pay Salary</a>
                                            <a href="<?= base_url();?>index.php/salary_table?employeeID=<?php echo $user->employeeID; ?>" class="btn btn-primary">View Salary</a>
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

    <script>
        function sortTable(columnIndex) {
            var table, rows, switching, i, x, y, shouldSwitch, sortOrder;
            table = document.getElementById("salaryTable");
            switching = true;
            sortOrder = table.rows[0].getElementsByTagName("th")[columnIndex].getAttribute("data-sort");
            if (!sortOrder) {
                sortOrder = "asc";
            } else {
                sortOrder = sortOrder === "asc" ? "desc" : "asc";
            }
            table.rows[0].getElementsByTagName("th")[columnIndex].setAttribute("data-sort", sortOrder);
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("td")[columnIndex];
                    y = rows[i + 1].getElementsByTagName("td")[columnIndex];
                    if (sortOrder === "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    } else {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
            // Update arrow icon
            var arrow = table.rows[0].getElementsByTagName("th")[columnIndex].querySelector(".arrow");
            if (sortOrder === "asc") {
                arrow.innerHTML = "&#9650;";
            } else {
                arrow.innerHTML = "&#9660;";
            }
        }

        // Search Function
        document.getElementById("searchPetOwnerInput").addEventListener("input", function() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchPetOwnerInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("salaryTable");
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
</main>
