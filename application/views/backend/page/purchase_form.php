<main>
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                <form action="<?= base_url(); ?>index.php/purchase_form?productID=<?php echo $id; ?>" method="post">
                        <input type="hidden" name="productID" class="form-control" placeholder="" value="<?= $productID ?>">
                        <div class="col-md-9" style="margin-left:350px">
                            <!-- Back Button -->
                            <a href="<?= base_url()?>index.php/product_table" class="btn btn-primary">Back</a>                         
                        </div> 
                        
                        <div class="row mb-3" style="margin-top:20px"> 
                            <div class="col-md-9">
                                <div class="form-floating">
                                    <select class="selected form-control" name="client" id="client" value="<?php echo set_value('client_fullname'); ?>" required>
                                        <option value="" disabled selected>Choose Client</option>
                                        <?php foreach ($clientUsers as $clients): ?>
                                            <option value="<?php echo $clients->client_id; ?>"><?php echo $clients->client_fullname; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-9">
                                <div class="form-floating">
                                    <select class="selected form-control" name="product" id="product" required>
                                        <?php foreach ($productUsers as $products): ?>
                                            <option value="<?= $products->productID ?>" data-cost="<?= $products->cost ?>"><?= $products->cost ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-floating mb-3" style="margin-top:20px">
                            <input type="text" name="quantity_purchased" class="form-control" id="quantity_purchased" placeholder="">
                            <label for="quantity_purchased">Quantity</label>
                        </div>
                        <div class="form-floating mb-3" style="margin-top:20px">
                            <input type="text" name="total_cost" class="form-control" id="total_cost" placeholder="" readonly>
                            <label for="total_cost">Total</label>
                        </div>

                        <div class="form-floating">
                            <input type="date" name="date_purchased" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="date_added" required>
                            <label for="floatingInput">Date Purchased</label>
                        </div>
                        
                        <div class="modal-footer d-flex">
                            <input type="submit" class="btn btn-primary" value="Buy">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Calendar Reminder</h6>
                        <a href="">Show All</a>
                    </div>
                    <div id="calender"></div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the product select element and total cost input element
        const productSelect = document.getElementById('product');
        const totalCostInput = document.getElementById('total_cost');

        // Function to update the total cost based on the product cost and quantity
        function updateTotalCost() {
            const selectedOption = productSelect.options[productSelect.selectedIndex];
            const quantity = parseFloat(document.getElementById('quantity_purchased').value) || 0;
            const productCost = parseFloat(selectedOption.dataset.cost) || 0;
            const totalCost = productCost * quantity;
            totalCostInput.value = totalCost.toFixed(2);
        }

        // Update the total cost when the product select or quantity changes
        productSelect.addEventListener('change', updateTotalCost);
        document.getElementById('quantity_purchased').addEventListener('input', updateTotalCost);
    });
</script>
