<main>
    <style>
        .arrow {
            float: right;
        }
    </style>
  <div class="content" style="background-image: url('<?= base_url();?>assets/img1/gallery/section_bg02.png'); background-size: cover; background-position: center;">
            <!-- Chart Start -->
            <div class="container-fluid pt-4 px-4">
                
            
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4" style="margin-top:80px">
                    <div class="row">
                        <div class="col-12">
                            <div class="bg-light rounded h-100 p-4" >

                                <div class="row">
                                    <div class="col-md-3"> <!-- Adjusted column size to one-fourth -->
                                        <!-- Search Bar -->
                                        <div class="mb-3">
                                            <h6 class="mb-4">My Purchased Products</h6>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-3" style="padding-left:600px">
                                        <a href="<?= base_url() ?>index.php/product_table" class="btn btn-primary">Back</a>
                                    </div> -->
                                </div>
                                <div class="table-responsive">
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
    $(document).ready(function () {
        var productID;

        $('table.datanew tbody').on('click', 'tr', function () {
            productID = $(this).data('product-id');
            $('#updateProductModal').modal('show');

            $.ajax({
                type: "POST",
                url: "Admin_Controller/view_product",
                data: { productID: productID },
                success: function (response) {
                    var productData = JSON.parse(response);
                    if (productData && !$.isEmptyObject(productData)) {
                        console.log("Product data:", productData);
                        $('#productName').val(productData.productName);
                        $('#cost').val(productData.cost);
                        $('#quantity').val(productData.quantity);
                        $('#category').val(productData.category);
                        $('#dateAdded').val(productData.dateAdded);
                    } else {
                        console.error('Empty product data received');
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });

        $('#update_button').click(function () {
            var productName = $('#productName').val();
            var cost = $('#cost').val();
            var quantity = $('#quantity').val();
            var category = $('#category').val();
            var dateAdded = $('#dateAdded').val();

            $.ajax({
                type: "POST",
                url: "Admin_Controller/update_product",
                data: {
                    productID: productID,
                    productName: productName,
                    cost: cost,
                    quantity: quantity,
                    category: category,
                    dateAdded: dateAdded
                },
                success: function (response) {
                    console.log("Product updated successfully:", response);
                    $('#updateProductModal').modal('hide');
                    location.reload(); // Reload the page
                },
                error: function (xhr, status, error) {
                    console.error('Error updating product:', error);
                    // Optionally, handle errors
                }
            });
        });

        $('#update_cancel').click(function () {
            $('#updateProductModal').modal('hide');
        });
    });
</script>


    
    
    <script>
        function sortTable(tableId, columnIndex) {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById(tableId);
            switching = true;
            var sortOrder = table.rows[0].getElementsByTagName("th")[columnIndex].querySelector(".arrow").getAttribute("data-sort");
            
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("td")[columnIndex];
                    y = rows[i + 1].getElementsByTagName("td")[columnIndex];
                    
                    if (columnIndex === 0 || columnIndex === 2 || columnIndex === 3) {
                        // For numeric sorting
                        if (sortOrder === "asc") {
                            if (parseFloat(x.innerHTML) > parseFloat(y.innerHTML)) {
                                shouldSwitch = true;
                                break;
                            }
                        } else {
                            if (parseFloat(x.innerHTML) < parseFloat(y.innerHTML)) {
                                shouldSwitch = true;
                                break;
                            }
                        }
                    } else {
                        // For string sorting
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
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
            // Toggle sorting order
            var newSortOrder = sortOrder === "asc" ? "desc" : "asc";
            table.rows[0].getElementsByTagName("th")[columnIndex].querySelector(".arrow").setAttribute("data-sort", newSortOrder);
            
            // Update arrow icon
            var arrow = table.rows[0].getElementsByTagName("th")[columnIndex].querySelector(".arrow");
            if (newSortOrder === "asc") {
                arrow.innerHTML = "&#9650;";
            } else {
                arrow.innerHTML = "&#9660;";
            }
        }

        // Search Function
        document.getElementById("searchProductInput").addEventListener("input", function() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchProductInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("productTable");
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

    <script>
        $(document).ready(function () {
            $('#productTable').DataTable();
        });
    </script>
