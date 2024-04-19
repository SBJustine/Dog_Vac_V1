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
                        <h6 class="mb-4">SALARY</h6>
                        <div class="row">
                            <div class="col-md-3"> <!-- Adjusted column size to one-fourth -->
                                <!-- Search Bar -->
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="searchPetsInput" placeholder="Search...">
                                </div>
                            </div>
                            <div class="col-md-3"  style="padding-left:600px" > <!-- Adjusted column size to one-fourth -->
                                <!-- Back Button -->
                                <a href="<?= base_url()?>index.php/attendance_table" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table datanew" id="salaryTable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <!-- <th scope="col">Name</th> -->
                                        <th scope="col">Days Present</th>
                                        <th scope="col">Salary</th>
                                        <th scope="col">Total</th>
                                        <!-- <th scope="col">Date Paid</th> -->
                                        <!-- <th scope="col">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($salaryUsers as $key => $user): ?>
                                        <tr class="<?php echo (int)$key % 2 === 0 ? 'bg-light' : 'bg-white'; ?>" data-employee-id="<?= $user->employeeID; ?>">
                                            <?php if($user->employeeID==$employeeID): ?>
                                                <td><?php echo $key + 1 ?></td>
                                                <td><?php echo $user->numOfDaysPresent; ?></td>
                                                <td><?php echo $user->employeeSalary; ?></td>
                                                <td><?php echo $user->total_salary; ?></td>
                                                <!-- <td><?php echo $user->datePaid; ?></td> -->
                                                <!-- <td>
                                                    <button class="btn btn-primary update-pet" data-employee-id="<?= $user->employeeID ?>">Update</button>
                                                </td> -->
                                            <?php endif; ?>
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

    <!-- Update Pet Modal -->
    <!-- <div id="updatePetModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Pet Information</h4>
                </div>
                <div class="modal-body">	
                    
                    <form autocomplete="off" class="form" role="form" id="updatePetForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pet_name">Name</label>
                                    <input type="text" class="form-control" name="pet_name" id="pet_name" value="<?= $property->pet_name ?? '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="pet_breed">Breed</label>
                                    <input type="text" class="form-control" name="pet_breed" id="pet_breed" value="<?= $property->pet_breed ?? '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="pet_age">Age</label>
                                    <input type="text" class="form-control" name="pet_age" id="pet_age" value="<?= $property->pet_age ?? '' ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pet_gender">Gender</label>
                                    <select class="form-control" name="pet_gender" id="pet_gender" value="<?= $property->pet_gender ?? '' ?>">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pet_species">Species</label>
                                    <input type="text" class="form-control" name="pet_species" id="pet_species" value="<?= $property->pet_species ?? '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="pet_color">Color</label>
                                    <input type="text" class="form-control" name="pet_color" id="pet_color" value="<?= $property->pet_color ?? '' ?>">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" title="Update" class="btn btn-primary" id="update_button">Update</button>
                    <button type="button" title="Cancel" class="btn btn-secondary" data-dismiss="modal" id="update_cancel">Cancel</button>
                </div>
            </div>
        </div>
    </div> -->




<!-- <script>
    var pet_id;

    $(document).ready(function() {
    $('table.datanew tbody').on('click', 'tr', function() {
        pet_id = $(this).data('client-id');
        $('#updatePetModal').modal('show');

        $.ajax({
            type: "POST",
            url: "Admin_Controller/view_pet",
            data: { pet_id: pet_id },
            success: function(response) {
                var petData = JSON.parse(response);
                if (petData && !$.isEmptyObject(petData)) {
                    console.log("Pet data:", petData);
                    $('#pet_name').val(petData.pet_name);
                    $('#pet_breed').val(petData.pet_breed);
                    $('#pet_age').val(petData.pet_age);
                    $('#pet_gender').val(petData.pet_gender);
                    $('#pet_species').val(petData.pet_species);
                    $('#pet_color').val(petData.pet_color);
                } else {
                    console.error('Empty pet data received');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });

    $('#update_button').click(function() {
        var pet_name = $('#pet_name').val();
        var pet_breed = $('#pet_breed').val();
        var pet_age = $('#pet_age').val();
        var pet_gender = $('#pet_gender').val();
        var pet_species = $('#pet_species').val();
        var pet_color = $('#pet_color').val();
        var updatepet_id = pet_id;

        $.ajax({
            type: "POST",
            url: "Admin_Controller/update_pet",
            data: {
                
                pet_name: pet_name,
                pet_breed: pet_breed,
                pet_age: pet_age,
                pet_gender: pet_gender,
                pet_species: pet_species,
                pet_color: pet_color,
                pet_id: updatepet_id,
            },
            success: function(response) {
                console.log("Pet updated successfully:", response);
                $('#updatePetModal').modal('hide');
                $('#updateSuccessModal').modal('show');
                location.reload();
                // Optionally, perform any additional actions after updating
            },
            error: function(xhr, status, error) {
                console.error('Error updating pet:', error);
                $('#updateErrorModal').modal('show');
            }
        });
    });


    $('#update_cancel').click(function() {
        $('#updatePetModal').modal('hide');
    });
});


</script> -->

    
    <script>
        // Search Function
        document.getElementById("searchPetsInput").addEventListener("input", function() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchPetsInput");
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
</main>
