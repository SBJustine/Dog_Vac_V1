<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Orig | VetCare </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url();?>assets/img1/favicon.ico">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="<?= base_url();?>assets/css/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url();?>assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url();?>assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url();?>assets/css/style.css" rel="stylesheet">

    
    
</head>


<body >

    <div class="container-xxl position-relative bg-white d-flex p-0" style="background-image: url('<?= base_url();?>assets/img1/gallery/login10.jpg'); background-size: cover; background-position: center;">
        <!-- Sign In Start -->    
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-6">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-center mb-3">
                    <form action="<?= base_url(); ?>index.php/register" method="post">
                        <div class="text-center"> <!-- Center content -->
                            <h3 class="text-primary"><i class="fa fa-user me-2" style="color: maroon;"></i></h3>
                            <h3 style="color: maroon;">Sign up</h3>
                        </div>                  
                        </div>
                        <div class="row">
                            <!-- First Column -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" name="client_fullname" class="form-control" id="client_fullname" placeholder="">
                                    <label for="floatingInput">Fullname</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="client_address" class="form-control" id="client_address" placeholder="">
                                    <label for="floatingInput">Address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="client_email" placeholder="name@example.com" required />
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="datetime-local" name="date_added" class="form-control" id="date_added" value="<?php echo date('Y-m-d\TH:i'); ?>" required>
                                    <label for="floatingInput">Date & Time</label>
                                </div>
                            </div>
                            <!-- Second Column -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" name="sex" id="sex" aria-label="Floating label select example">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <label for="sex">Sex</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="">
                                    <label for="floatingInput">Phone Number</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required />
                                    <label for="floatingPassword">Password</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <select class="form-select" name="client_status" id="client_status" aria-label="Floating label select example">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                    <label for="client_status">Status</label>
                                </div>
                            </div>
                        </div>
                
                        <button style= " background-color: maroon;" type="submit" name="create_btn" class="btn btn-primary py-3 w-100 mb-4" >Register</button>
                        
                        
                        <p class="text-center mb-0">Already have an Account? <a href="<?= base_url();?>index.php/login_client"style= " color: maroon;">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>
    

    
</body>

</html>
