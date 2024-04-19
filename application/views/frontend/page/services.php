<main>
    <!-- Our Services Start -->
    <div class="our-services section-padding30">
        <div class="container">
            <div class="row justify-content-sm-center">
                <!-- Section Title -->
                <div class="cl-xl-7 col-lg-8 col-md-10">
                    <div class="section-tittle text-center mb-70">
                        <span>Our Professional Services</span>
                        <h2>Best Pet Care Services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Service Containers -->
                <div class=" col-lg-4 col-md-6 col-sm-6">
                    <div class="single-services text-center mb-30" data-service="grooming">
                        <div class="services-ion">
                            <span class="fa fa-dog me-lg-2"></span>
                        </div>
                        <div class="services-cap">
                            <h5><a href="#">Pet Grooming</a></h5>
                            <p>Orig VetCare offers professional dog grooming services to keep your canine companions clean, healthy, and looking their best.</p>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-4 col-md-6 col-sm-6">
                    <div class="single-services text-center mb-30" data-service="treatment">
                        <div class="services-ion">
                             <span class="fa fa-stethoscope me-lg-2"></span>
                        </div>
                        <div class="services-cap">
                            <h5><a href="#">Pet Treatment</a></h5>
                            <p>Orig VetCare delivers expert dog treatment services, providing compassionate and effective care to ensure the health and happiness of your beloved pets.</p>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-4 col-md-6 col-sm-6">
                    <div class="single-services text-center mb-30" data-service="vaccinations">
                        <div class="services-ion">
                           <span class="fa fa-syringe me-lg-2"></span>
                        </div>
                        <div class="services-cap">
                            <h5><a href="#">Vaccinations</a></h5>
                            <p>Orig VetCare provides comprehensive dog vaccination services to ensure the health and well-being of your furry companions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Services End -->

    <!-- Pet Grooming Modal -->
    <div id="groomingModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
         
            <div class="modal-content-row">
                <div class="modal-content-column">
                    <p style="font-family: Arial, sans-serif;">Here are the steps to avail pet grooming services:</p>
                    <ol style="font-family: Arial, sans-serif;">
                        <li>Step 1: Schedule an appointment with our grooming salon.</li>
                        <li>Step 2: Bring your pet to the salon at the scheduled time.</li>
                        <li>Step 3: Choose the grooming services you'd like for your pet.</li>
                        <li>Step 4: Our professional groomers will groom your pet according to your preferences.</li>
                        <li>Step 5: Collect your pet once grooming is complete and pay for the services.</li>
                    </ol>
                </div>
                <div class="modal-content-column">
                    <div class="sample-images">
                        <img class="sample-image" src="<?= base_url();?>assets/img1/gallery/gallery1.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sample Modal for Pet Treatment -->
    <div id="treatmentModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-content-row">
                <div class="modal-content-column">
                    <p style="font-family: Arial, sans-serif;">Here are the steps to avail pet treatment services:</p>
                    <ol style="font-family: Arial, sans-serif;">
                        <li>Step 1: Bring your pet to our clinic.</li>
                        <li>Step 2: Consult with our veterinarian to assess your pet's condition.</li>
                        <li>Step 3: Follow the prescribed treatment plan provided by the veterinarian.</li>
                        <li>Step 4: Schedule follow-up appointments as recommended.</li>
                    </ol>
                </div>
                <div class="modal-content-column">
                    <div class="sample-images">
                        <img class="sample-image" src="<?= base_url();?>assets/img1/gallery/gallery1.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>


        <!--? Gallery Area Start -->
        <div class="gallery-area section-padding30" style="margin-top:-250px">
            <div class="container fix">
                <div class="row justify-content-sm-center">
                    <div class="cl-xl-7 col-lg-8 col-md-10">
 
                    </div>
                </div>
                <div class="row">
                            <!-- Section Tittle -->
                            <div class="section-tittle text-center mb-70">
                            <span>Our Recent Services</span>
                            <h2>Services Gallery</h2>
                        </div> 
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-gallery mb-30">
                            <!-- <a href="assets/img/gallery/gallery1.png" class="img-pop-up">View Project</a> -->
                            <div class="gallery-img size-img" style="background-image: url(<?= base_url();?>assets/img1/gallery/gallery1.jpg);"></div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-6">
                        <div class="single-gallery mb-30">
                            <div class="gallery-img size-img" style="background-image: url(<?= base_url();?>assets/img1/gallery/gallery2.jpg);"></div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-6">
                        <div class="single-gallery mb-30">
                            <div class="gallery-img size-img" style="background-image: url(<?= base_url();?>assets/img1/gallery/gallery3.jpg);"></div>
                        </div>
                    </div>
                    <div class="col-lg-4  col-md-6 col-sm-6">
                        <div class="single-gallery mb-30">
                            <div class="gallery-img size-img" style="background-image: url(<?= base_url();?>assets/img1/gallery/gallery4.jpg);"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Gallery Area End -->


    <!-- Vaccinations Modal -->
    <div id="vaccinationsModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="modal-content-row">
            <div class="modal-content-column">
                <p style="font-family: Arial, sans-serif;">Here are the steps to avail pet vaccination services:</p>
                <ol style="font-family: Arial, sans-serif;">
                    <li>Step 1: Consult with our veterinarian to determine the necessary vaccinations for your pet.</li>
                    <li>Step 2: Schedule an appointment for vaccination.</li>
                    <li>Step 3: Bring your pet to our clinic at the scheduled time.</li>
                    <li>Step 4: Our veterinarian will administer the required vaccinations.</li>
                    <li>Step 5: Follow any post-vaccination care instructions provided by our veterinarian.</li>
                </ol>
            </div>
            <div class="modal-content-column">
                <div class="sample-images">
                    <img class="sample-image" src="<?= base_url();?>assets/img1/gallery/gallery1.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

</main>

<!-- JavaScript to Handle Modals -->
<script>
    // Get the modal elements
    var groomingModal = document.getElementById("groomingModal");
    var treatmentModal = document.getElementById("treatmentModal");
    var vaccinationsModal = document.getElementById("vaccinationsModal");

    // Get the service containers
    var groomingService = document.querySelector("[data-service='grooming']");
    var treatmentService = document.querySelector("[data-service='treatment']");
    var vaccinationsService = document.querySelector("[data-service='vaccinations']");

    // Function to display the modal for a specific service
    function displayModal(modal) {
        modal.style.display = "block";
    }

    // Function to close the modal
    function closeModal(modal) {
        modal.style.display = "none";
    }

    // Event listeners to show modals when service containers are clicked
    groomingService.addEventListener("click", function() {
        displayModal(groomingModal);
    });
    treatmentService.addEventListener("click", function() {
        displayModal(treatmentModal);
    });
    vaccinationsService.addEventListener("click", function() {
        displayModal(vaccinationsModal);
    });

    // Close the modal when the close button is clicked
    var closeButtons = document.querySelectorAll(".close");
    closeButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            var modal = button.parentElement.parentElement;
            closeModal(modal);
        });
    });
</script>


<style>
    /* Modal Style */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }


.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Adjust width here */
    max-width: 800px; /* Adjust max-width here */
    height: 80%; 
    max-height: 500px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    position: relative;
}

.modal-content-row {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: flex-start;
}

.modal-content-column {
    flex: 1;
    margin-right: 20px;
}

.sample-images {
    display: flex;
    flex-wrap: wrap;
}
.sample-image {
    width: 100%;
    height: auto;
    margin-bottom: 10px;
}


    /* Close Button */
    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }

    /* Close Button Style */
    .close:hover {
        color: #000;
    }
</style>
    