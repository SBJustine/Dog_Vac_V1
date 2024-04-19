
<style>
        body,
        h4,
        p,
        th,
        td {
            color: black;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container-fluid {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .row {
            margin-bottom: 20px;
        }

        .card-body {
            padding: 20px;
        }

        .print-btn {
            text-align: right;
        }

        .centered {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .column {
            flex-basis: 50%;
        }


        .centered {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    }

</style>

<main>
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light rounded-top p-4">
            <div class="row mb-3">
            <div class="col-md-6">
            
                
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-center">
                <!-- Download and Print buttons -->
                <div>
                <a class="btn btn-primary mr-2" id="downloadButton">Download</a>
                    <a class="btn btn-primary" id="printButton">Print</a>
                </div>
            </div>
        </div>


                
                <!-- Content body start -->
                <div class="content-body">
                    <div class="container-fluid">
                   
                        <!-- row -->
                        <div class="row">
                            
                            <div class="col-xl-12 col-xxl-12">
                                
                                <div class="card">

                                <div id="printContent">
                                    <div class="card-body">
                                        <div style="display: flex; flex-direction: column;">
                                            <div class="centered" id="headerContainer">
                                                <div id="headerContent">
                                                    <h4>Municipality of Tagbilaran</h4>
                                                    <h4>Ubujan District, Tagbilaran, Bohol</h4>
                                                    <h4>Orig Vetcare</h4>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><strong>Report:</strong> Monthly Summary</p>
                                                    <p><strong>Date:</strong> <span id="currentDate"></span></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">


                                                    <h4>I. Approved Appointments</h4>
                                                    <table class="table text-start align-middle table-bordered table-hover mb-0" id="appointmentList">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" onclick="sortTableAppointment(0)">
                                                                    <div class="d-flex justify-content-between align-items-center">#</div>
                                                                </th>
                                                                <th scope="col" onclick="sortTableAppointment(1)">
                                                                    <div class="d-flex justify-content-between align-items-center">Name of Owner</div>
                                                                </th>
                                                                <th scope="col">Name of Pet</th>
                                                                <th scope="col">Type of Service</th>
                                                                <th scope="col">Appointment Date<span class="arrow"></span></th>
                                                                <th scope="col">Contact Number</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach ($appointmentUsers as $key => $appointments) { ?>
                                                <tr>
                                                
                                                    <td><?php echo $key + 1 ?></td>
                                                    <td><?php echo $appointments['client_fullname'] ?></td>
                                                    <td><?php echo $appointments['appointmentPetName'] ?></td>
                                                    <td><?php echo $appointments['service'] ?></td>
                                                    <td><?php echo $appointments['appointmentDate'] ?></td>
                                                    <td><?php echo $appointments['phone_number']?></td>
                                                    
                                                </tr>
                                            <?php } ?>
                                                        </tbody>
                                                    </table>


                                                    <h4>II. Purchased Products</h4>
                                                    <table class="table datanew" id="purchaseTable">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Product Name</th>
                                                                <th scope="col">Cost</th>
                                                                <th scope="col">Quantity</th>
                                                                <th scope="col">Total Cost</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach ($purchases as $index => $purchase): ?>
                                                <tr>
                                                    <td><?php echo $index + 1 ?></td>
                                                    <td><?php echo $purchase['productName']; ?></td>
                                                    <td><?php echo $purchase['cost']; ?></td>
                                                    <td><?php echo $purchase['quantity_purchased']; ?></td>
                                                    <td><?php echo $purchase['total_cost']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>


                                                    <h4>III. List of Registered Pets</h4>
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
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach ($pets as $index => $myPets): ?>
                                        <tr>
                                            <td><?php echo $index + 1 ?></td>
                                            <td><?php echo $myPets['pet_name']; ?></td>
                                            <td><?php echo $myPets['pet_breed']; ?></td>
                                            <td><?php echo $myPets['pet_age']; ?></td>
                                            <td><?php echo $myPets['pet_gender']; ?></td>
                                            <td><?php echo $myPets['pet_species']; ?></td>
                                            <td><?php echo $myPets['pet_color']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                                        </tbody>
                                                    </table>

                                                    <h4>IV. Overall Summary</h4>
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Category</th>
                                                                <th>Total</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Approved Appointments</td>
                                                                <td>
                                                                    <?php echo count($appointmentUsers); ?>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>Purchased Products</td>
                                                                <td>
                                                                    <?php echo count($purchases); ?>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>List of Registered Pets</td>
                                                                <td>
                                                                    <?php echo count($pets); ?>
                                                                </td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
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
        </div>

</main>

<script>
    document.getElementById('printButton').addEventListener('click', function() {
        var printContent = document.getElementById('printContent').innerHTML;
        var originalContent = document.body.innerHTML;
        
        document.body.innerHTML = printContent;

        window.print();

        document.body.innerHTML = originalContent;
    });

    
</script>
<script>
    document.getElementById('downloadButton').addEventListener('click', function() {
    // Get the content inside <div id="printContent">
    var printContent = document.getElementById('printContent').innerPDF;

    // Create a new Blob containing the HTML content
    var blob = new Blob([printContent], { type: "text/pdf" });

    // Create a temporary link element
    var link = document.createElement("a");
    
    // Set the href attribute of the link to a URL representing the Blob content
    link.href = URL.createObjectURL(blob);
    
    // Set the download attribute of the link to the desired filename
    link.download = "report.pdf";

    // Append the link to the document body
    document.body.appendChild(link);

    // Simulate a click on the link to trigger the download
    link.click();

    // Remove the link from the document body
    document.body.removeChild(link);
});

</script>




<script>
        // Function to get current date and display it
        function getCurrentDate() {
            var currentDate = new Date();
            var day = currentDate.getDate();
            var month = currentDate.getMonth() + 1;
            var year = currentDate.getFullYear();
            var formattedDate = month + '-' + day + '-' + year;
            document.getElementById('currentDate').textContent = formattedDate;
        }

        // Call the function when the page loads
        getCurrentDate();
</script>



    