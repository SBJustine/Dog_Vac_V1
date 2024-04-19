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

                        <div class="row">
                            <div class="col-md-3"> <!-- Adjusted column size to one-fourth -->
                                <!-- Search Bar -->
                                <div class="mb-3">
                                    <h6 class="mb-4">Purchased Products</h6>
                                </div>
                            </div>
                            <div class="col-md-3" style="padding-left:600px"> <!-- Adjusted column size to one-fourth -->
                                <!-- Back Button -->
                                <a href="<?= base_url() ?>index.php/product_table" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table datanew" id="purchaseTable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Client Name</th>
                                        <th scope="col">Cost</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total Cost</th>

                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($purchaseUsers as $key => $user) : ?>
                                        <tr class="<?php echo (int)$key % 2 === 0 ? 'bg-light' : 'bg-white'; ?>">
                                            <?php if ($user->productID == $productID) : ?>
                                                <td><?php echo $user->purchaseID; ?></td>
                                                <td><?php echo $user->client_fullname; ?></td>
                                                <td><?php echo $user->cost; ?></td>
                                                <td><?php echo $user->quantity_purchased; ?></td>
                                                <td><?php echo $user->total_cost; ?></td>


                                                <td>
                                                    <input type="hidden" name="productID" class="form-control" value="<?= $productID ?>">
                                                    <button class="btn btn-primary">Update</button>
                                                </td>
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


    <div id="updatePurchaseModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Purchase Information</h4>
                </div>
                <div class="modal-body">
                    <!-- Form to update purchase information -->
                    <form autocomplete="off" class="form" role="form" id="updatePurchaseForm">
                        <input type="hidden" id="purchaseProductID" value="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="total_cost">Price</label>
                                    <input type="text" class="form-control" name="total_cost" id="total_cost">
                                </div>
                                <div class="form-group">
                                    <label for="quantity_purchased">Quantity</label>
                                    <input type="text" class="form-control" name="quantity_purchased" id="quantity_purchased">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date_purchased">Date Purchased</label>
                                    <input type="date" class="form-control" name="date_purchased" id="date_purchased">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="update_button">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="update_cancel">Cancel</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        var productID;

        $(document).ready(function() {
            $('table.datanew tbody').on('click', 'tr', function() {
                productID = $(this).data('product-id');
                $('#updatePurchaseModal').modal('show');

                $.ajax({
                    type: "POST",
                    url: "Admin_Controller/view_purchase",
                    data: {
                        productID: productID
                    },
                    success: function(response) {
                        var purchaseData = JSON.parse(response);
                        if (purchaseData && !$.isEmptyObject(purchaseData)) {
                            console.log("Purchase data:", purchaseData);
                            $('#purchaseProductID').val(purchaseData.productID);
                            $('#total_cost').val(purchaseData.total_cost);
                            $('#quantity_purchased').val(purchaseData.quantity_purchased);
                            $('#date_purchased').val(purchaseData.date_purchased);
                        } else {
                            console.error('Empty purchase data received');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });

            $('#update_button').click(function() {
                var total_cost = $('#total_cost').val();
                var quantity_purchased = $('#quantity_purchased').val();
                var date_purchased = $('#date_purchased').val();


                $.ajax({
                    type: "POST",
                    url: "Admin_Controller/update_purchase",
                    data: {
                        productID: productID,
                        total_cost: total_cost,
                        quantity_purchased: quantity_purchased,
                        date_purchased: date_purchased

                    },
                    success: function(response) {
                        console.log("Purchase updated successfully:", response);
                        $('#updatePurchaseModal').modal('hide');
                        $('#updateSuccessModal').modal('show');
                        location.reload(); // Optionally reload the page after update
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating purchase:', error);
                        $('#updateErrorModal').modal('show');
                    }
                });
            });
            $('#update_cancel').click(function() {
                $('#updatePurchaseModal').modal('hide');
            });
        });
    </script>




    <!-- <script>
        // Search Function
        document.getElementById("searchPurchasesInput").addEventListener("input", function() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchPurchasesInput");
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
    </script> -->
</main>