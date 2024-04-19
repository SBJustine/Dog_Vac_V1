<main>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded-top p-4">
            <div class="row">
                <div class="col-12">
                <div class="col-md-3"  style="padding-left:850px" > <!-- Adjusted column size to one-fourth -->
                                <!-- Back Button -->
                                <a href="<?= base_url()?>index.php/product_table" class="btn btn-primary ">Back</a>
                            </div>
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Add Product</h6>
                        <form action="<?= base_url() ?>index.php/add_product" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="productName" class="form-control" id="productName" placeholder="">
                                        <label for="productName">Product Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="category" id="category" aria-label="Floating label select example">
                                            <option value="Dog">Dog</option>
                                            <option value="Cat">Cat</option>
                                        </select>
                                        <label for="category">Category</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="cost" class="form-control" id="cost" placeholder="">
                                        <label for="cost">Cost</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="quantity" class="form-control" id="quantity" placeholder="">
                                        <label for="quantity">Quantity</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="datetime-local" name="dateAdded" class="form-control" id="dateAdded" value="<?php echo date('Y-m-d\TH:i'); ?>" required>
                                        <label for="dateAdded">Date Added</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="file" name="product_pic" class="form-control" id="product_pic" accept=".gif, .jpeg, .jpg, .png" required>
                                        <label for="product_pic">Admin Picture</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex">
                                <style>
                                    /* Custom CSS to change the button color to maroon */
                                    .btn-maroon {
                                        background-color: maroon;
                                        color: white;
                                    }
                                </style>
                                <input type="submit" class="btn btn-maroon custom-button" value="Create">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
