<main>
   <!-- Contact form Start -->
<div class="contact-form-main pb-top">
    <div class="container">
        <div class="row justify-content-md-end">
            <div class="col-xl-7 col-lg-7">
                <div class="form-wrapper">
                    <!--Section Tittle  -->
                    <div class="form-tittle">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="section-tittle section-tittle2 mb-70">
                                    <h2></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Section Tittle  -->

                    <!-- Form Box 1 -->
                    <div class="form-box bg-light rounded p-4 mb-4">
                        <form action="<?= base_url()?>index.php/appointment_form" method="post">
                            <div class="row">

                                <input type="hidden" name="client_id" value="<?php echo $client_id ?>">
                                <input type="hidden" name="client_fullname" value="<?php echo $client_fullname; ?>" readonly>
                                <input type="hidden" name="client_address" value="<?php echo $client_address; ?>" readonly>
                                <input type="hidden" name="phone_number" value="<?php echo $phone_number; ?>" readonly>

                                
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="border rounded p-3">
                                        <input type="text" name="client_fullname" id="client_fullname" class="form-control" value="<?php echo $client_fullname; ?>" readonly>
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="border rounded p-3">
                                        <input type="text" name="appointmentPetName" id="appointmentPetName" class="form-control" placeholder="Name of pet">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="border rounded p-3">
                                        <input type="text" name="client_address" id="client_address" class="form-control" value="<?php echo $client_address; ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="border rounded p-3">
                                        <input type="text" name="petBreed" id="petBreed" class="form-control" placeholder="Pet Breed">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="border rounded p-3">
                                        <input type="text" name="phone_number" id="phone_number" class="form-control" value="<?php echo $phone_number; ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="border rounded p-3">
                                        <select class="form-select" name="service" id="service" aria-label="Floating label select example">
                                            <option value="" disabled selected>Select a service</option>
                                            <option value="Vaccination">Vaccination</option>
                                            <option value="Treatment">Treatment/Consultation</option>
                                            <option value="Deworming">Deworming/Antiparasitic</option>
                                            <option value="Grooming">Grooming</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="border rounded p-3">
                                        <input type="date" min="<?= date('Y-m-d');?>" name="appointmentDate" id="appointmentDate" class="form-control" value="">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="border rounded p-3">
                                        <select class="form-select" type="time" name="appointmentTime" id="appointmentTime" aria-label="Floating label select example">
                                            <option value="" disabled selected>Select a time</option>
                                            <option value="9:00-10:00AM">9:00-10:00AM</option>
                                            <option value="10:00-11:00AM">10:00-11:00AM</option>
                                            <option value="11:00-12:00AM">11:00-12:00AM</option>
                                            <option value="1:00-2:00PM">1:00-2:00PM</option>
                                            <option value="2:00-3:00PM">2:00-3:00PM</option>
                                            <option value="3:00-4:00PM">3:00-4:00PM</option>
                                            <option value="4:00-5:00PM">4:00-5:00PM</option>
                                            <option value="5:00-6:00PM">5:00-6:00PM</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="submit-info" style="margin-top:50px">
                                        <button class="btn submit-btn2" type="submit" style="background-color: maroon; color: white;">Submit Now</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <!-- End Form Box 1 -->
                </div>
            </div>
        </div>
    </div>

    <!-- contact left Img-->
    <div class="from-left d-none d-lg-block">
        <img src="<?= base_url();?>assets/img1/gallery/contact_form.png" alt=""> 
    </div>

<!-- Contact form End -->
    





