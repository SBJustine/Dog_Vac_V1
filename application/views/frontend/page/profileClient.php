<main>
    <!-- Content Start -->
    <div class="content" style="background-image: url('<?= base_url();?>assets/img1/gallery/section_bg02.png'); background-size: cover; background-position: center;">
        <!-- Chart Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="container-fluid pt-4 px-4" style="margin-top:100px">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="bg-light rounded h-100 p-4">
                                <div class="container">
                                    <div class="row align-items-center"> <!-- Changed here -->
                                        <div class="col-md-4">
                                            <!-- Profile Photo -->
                                            <img src="<?= base_url();?>assets/img1/gallery/maroon admin.png" alt="Profile Photo" class="profile-photo">
                                        </div>
                                        <div class="col-md-8">
                                            <!-- Profile Information -->
                                            <div class="profile-info">
                                                <h2><?php echo $clientDetails->client_fullname ?></h2>
                                                <p><?php echo $clientDetails->client_address ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Personal Information -->
                                    <div class="personal-info" id="personal-info"> <!-- Added ID -->
                                        <div class="col-md-12 text-end"> 
                                            <span class="edit-icon" data-toggle="modal" data-target="#editModal">&#9998; Edit information</span> 
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"> <!-- Adjust the width as needed -->
                                                <p><strong>Fullname:</strong><?php echo $clientDetails->client_fullname ?></p>
                                                <p><strong>Address:</strong><?php echo $clientDetails->client_address ?></p>
                                            </div>
                                            <div class="col-md-6"> <!-- Adjust the width as needed -->
                                                <p><strong>Contact Number:</strong> <?php echo $clientDetails->phone_number ?></p>
                                                <p><strong>Email:</strong> <?php echo $clientDetails->client_email ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal HTML structure -->
<div class="modal" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" class="form-control" id="fullname" value="<?php echo $clientDetails->client_fullname ?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" value="<?php echo $clientDetails->client_address ?>">
                    </div>
                    <div class="form-group">
                        <label for="contactNumber">Contact Number</label>
                        <input type="text" class="form-control" id="contactNumber" value="<?php echo $clientDetails->phone_number ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" value="<?php echo $clientDetails->client_email ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>



<style>
        /* Styling for the profile photo */
        .profile-photo {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        /* Styling for the profile information */
        .profile-info {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Styling for the personal information section */
        .personal-info {
            margin-top: 40px;
            border-top: 1px solid #ccc;
            padding-top: 20px;
        }

        /* Styling for the edit icon */
        .edit-icon {
            color: blue;
            cursor: pointer;
        }
</style>

