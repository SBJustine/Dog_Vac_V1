<main>
    <div class="container-fluid pt-4 px-4">
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
                                        <h2><?php echo $adminDetails->fullname ?></h2>
                                        <p><?php echo $adminDetails->type ?></p>
                                    </div>
                                </div>
                            </div>
                            <!-- Personal Information -->
                            <div class="personal-info" id="personal-info"> <!-- Added ID -->
                                <!-- <div class="col-md-12 text-end"> 
                                    <span class="edit-icon">&#9998; Edit information</span> 
                                </div> -->
                                <div class="row">
                                    <div class="col-md-6"> <!-- Adjust the width as needed -->
                                        <p><strong>Fullname:</strong><?php echo $adminDetails->fullname ?></p>
                                        <p><strong>Position:</strong><?php echo $adminDetails->type ?></p>
                                    </div>
                                    <div class="col-md-6"> <!-- Adjust the width as needed -->
                                    <p><strong>Contact Number:</strong> <?php echo $adminDetails->adminContactNumber ?></p>
                                        <p><strong>Email:</strong> <?php echo $adminDetails->email ?></p>
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

