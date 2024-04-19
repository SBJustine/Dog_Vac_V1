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
                        <h6 class="mb-4">REGISTERED PETS</h6>
                        <div class="row">
                            <div class="col-md-3"> <!-- Adjusted column size to one-fourth -->
                                <!-- Search Bar -->
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="searchPetsInput" placeholder="Search...">
                                </div>
                            </div>
                            <div class="col-md-3"  style="padding-left:550px" > <!-- Adjusted column size to one-fourth -->
                                <!-- Back Button -->

                                <a href="<?= base_url()?>index.php/add_pet?client_id=<?= $client_id ?>" class="btn btn-primary">AddPet</a>
                                <!-- <a href="<?= base_url()?>index.php/client_table" class="btn btn-primary">Back</a> -->

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table datanew" id="petTable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Breed</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Species</th>
                                        <th scope="col">Color</th>
                                        <!-- <th scope="col">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($petUsers as $key => $user): ?>
                                        <tr class="<?php echo $key % 2 === 0 ? 'bg-light' : 'bg-white'; ?>" data-client-id="<?= $user->client_id; ?>">
                                            <?php if($user->client_id==$client_id): ?>
                                                <td><?php echo $user->client_id; ?></td>
                                                <td><?php echo $user->pet_name; ?></td>
                                                <td><?php echo $user->pet_breed; ?></td>
                                                <td><?php echo $user->pet_age; ?></td>
                                                <td><?php echo $user->pet_gender; ?></td>
                                                <td><?php echo $user->pet_species; ?></td>
                                                <td><?php echo $user->pet_color; ?></td>
                                                <!-- <td>
                                                    <a href="<?= base_url();?>index.php/pet_table?client_id=<?php echo $user->client_id; ?>" class="btn btn-primary update-pet" data-pet-id="<?= $user->client_id ?>">Update</a>
                                                    
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
                    // Update only the corresponding row in the table
                    var row = $('table.datanew tbody tr[data-client-id="' + updatepet_id + '"]');
                    row.find('td:nth-child(2)').text(pet_name);
                    row.find('td:nth-child(3)').text(pet_breed);
                    row.find('td:nth-child(4)').text(pet_age);
                    row.find('td:nth-child(5)').text(pet_gender);
                    row.find('td:nth-child(6)').text(pet_species);
                    row.find('td:nth-child(7)').text(pet_color);
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
