<main>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded-top p-4">
            <div class="row">
                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">REGISTERED ADMIN</h6>
                        <div class="row">
                            <div class="col-md-3"> <!-- Adjusted column size to one-fourth -->
                                <!-- Search Bar -->
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="searchInput" placeholder="Search...">
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table datanew" id="adminTable">
                                <thead>
                                    <tr>
                                        <th scope="col" onclick="sortTable(0)">
                                            <div class="d-flex justify-content-between align-items-center">
                                                # 
                                                <span class="arrow">&#9650;</span>
                                            </div>
                                        </th>

                                        <th>
                                            <div class="d-flex justify-content-between align-items-center">
                                                Admin Picture
                                                <span class="arrow"></span>
                                            </div>
                                        </th>
                                        
                                        
                                        <th scope="col" onclick="sortTable(1)" data-sort="asc">
                                            <div class="d-flex justify-content-between align-items-center">
                                                Fullname
                                                <span class="arrow">&#9650;</span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex justify-content-between align-items-center">
                                                Email
                                                <span class="arrow"></span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex justify-content-between align-items-center">
                                                Password
                                                <span class="arrow"></span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex justify-content-between align-items-center">
                                                Contact Number
                                                <span class="arrow"></span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex justify-content-between align-items-center">
                                                Date_Added
                                                <span class="arrow"></span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex justify-content-between align-items-center">
                                                Position
                                                <span class="arrow"></span>
                                            </div>
                                        </th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($adminUsers as $key => $user): ?>
                                    <tr class="<?php echo $key % 2 === 0 ? 'bg-light' : 'bg-white'; ?>"   data-admin-id="<?= $user->admin_id; ?>">
                                        <td><?php echo $user->admin_id; ?></td>
                                        <td>
                                            <a>
                                            <?php if ($user->admin_pic): ?>
                                                <img src="<?php echo base_url('uploads/pictures/' .$user->admin_pic);?>" class="admin-pic" >
                                            <?php else: ?>
                                                <img src="<?=base_url();?>/assets/img1/gallery/Vet1.jpg" class="admin-pic" >
                                            <?php endif; ?>
                                            </a>
                                        </td>
                                        <td><?php echo $user->fullname; ?></td>
                                        <td><?php echo $user->email; ?></td>
                                        <td><?php echo $user->password; ?></td>
                                        <td><?php echo $user->adminContactNumber; ?></td>
                                        <td><?php echo $user->date_added; ?></td>
                                        <td><?php echo $user->type; ?></td>
                                        <td>
                                            <button class="btn btn-primary">Update</button>
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
</main>

<style>
        .btn-maroon {
            background-color: maroon;
            color: white;
        }

        /* CSS for the admin picture */
        .admin-pic {
            height: 80px;
            width: 80px;
        }
</style>


<div id="updateadminModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Admin Information</h4>
            </div>
            <div class="modal-body">
                <!-- form info -->
                <form autocomplete="off" class="form" role="form" action="<?= base_url(); ?>index.php/update_admin" method="post" id="admin">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fullname">Fullname</label>
                                <input type="text" class="form-control" name="fullname" id="fullname" value="<?= $property->fullname ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email" value="<?= $property->email ?? '' ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_added">Date Added</label>
                                <input type="date" class="form-control" name="date_added" id="date_added" value="<?= $property->date_added ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" name="password" id="password" value="<?= $property->password ?? '' ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="admin_pic">Admin Picture</label>
                                <input type="file" name="admin_pic" class="form-control" id="admin_pic" accept=".gif, .jpeg, .jpg, .png" value="<?= $property->admin_pic ?? '' ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="adminContactNumber">Contact Number</label>
                                <input type="text" class="form-control" name="adminContactNumber" id="adminContactNumber" value="<?= $property->adminContactNumber ?? '' ?>">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" title="Update" class="btn btn-primary" id="update_button">Update</button>
                <button type="button" title="Cancel" class="btn btn-secondary" id="update_cancel">Cancel</button>
            </div>
        </div>
    </div>
</div>





<script>
    var adminID;

    $(document).ready(function() {
        $('table.datanew tbody').on('click', 'tr', function() {
            adminID = $(this).data('admin-id');
            $('#updateadminModal').modal('show');

        $.ajax({
            type: "POST",
            url: "Admin_Controller/view_admin",
            data: { adminID: adminID },
            success: function(response) {
                var adminData = JSON.parse(response);
                if (adminData && !$.isEmptyObject(adminData)) {
                    console.log("Admin data:", adminData);
                    $('#fullname').val(adminData.fullname);
                    $('#email').val(adminData.email);
                    $('#password').val(adminData.password);
                    // Format the date as needed before assigning it to the input field
                    var formattedDate = formatDate(adminData.date_added); // Assuming you have a function to format the date
                    $('#date_added').val(formattedDate);
                    $('#admin_pic').val(adminData.admin_pic);
                    $('#adminContactNumber').val(adminData.adminContactNumber);
                } else {
                    console.error('Empty admin data received');
                }
            },

            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });

    $('#update_button').click(function() {
        var fullname = $('#fullname').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var date_added = $('#date_added').val();
        var admin_pic = $('#admin_pic').val();
        var  adminContactNumber = $('#adminContactNumber').val();
        var updateadminID = adminID;

        $.ajax({
            type: "POST",
            url: "Admin_Controller/update_admin",
            data: {
                fullname: fullname,
                email: email,
                password: password,
                date_added: date_added,
                admin_pic: admin_pic, 
                adminContactNumber: adminContactNumber, 
                adminID: updateadminID,
            },
            success: function(response) {
                console.log("Admin updated successfully:", response);
                $('#updateadminModal').modal('hide');
                $('#updateSuccessModal').modal('show');
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error('Error updating admin:', error);
                $('#updateErrorModal').modal('show');
            }
        });
    });

    $('#update_cancel').click(function() {
        $('#updateadminModal').modal('hide');
    });
});

</script>

<script>
    function sortTable(columnIndex) {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById("adminTable");
        switching = true;
        var sortOrder = table.rows[0].getElementsByTagName("th")[columnIndex].getAttribute("data-sort");
        
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
        // Toggle sorting order
        var newSortOrder = sortOrder === "asc" ? "desc" : "asc";
        table.rows[0].getElementsByTagName("th")[columnIndex].setAttribute("data-sort", newSortOrder);
        
        // Update arrow icon
        var arrow = table.rows[0].getElementsByTagName("th")[columnIndex].querySelector(".arrow");
        if (newSortOrder === "asc") {
            arrow.innerHTML = "&#9650;"; // Up arrow
        } else {
            arrow.innerHTML = "&#9660;"; // Down arrow
        }
    }

    // Search Function
document.getElementById("searchInput").addEventListener("input", function() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("adminTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2]; // Adjusted index to search in the "Fullname" column (index 2)
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