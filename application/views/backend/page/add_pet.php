<main>
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded-top p-4">
        <div class="row">
            <div class="col-12">                  
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Add Pet</h6>
                        <!-- Back Button -->
                        <!-- <a href="<?= base_url() ?>index.php/pet_table" class="btn btn-primary">Back</a> -->
                        <a href="<?= base_url()?>index.php/pet_table?client_id=<?= $client_id ?>" class="btn btn-primary">Back</a>
                    </div>
                    <form action="<?= base_url() ?>index.php/add_pet" method="post">
                    
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="" name="pet_name" class="form-control" id="pet_name" placeholder="">
                                    <label for="floatingInput">Name of Pet</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="pet_species" id="pet_species" aria-label="Floating label select example">
                                        <option value="Dog">Dog</option>
                                        <option value="Cat">Cat</option>                                  
                                    </select>
                                    <label for="vaccine">Species</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="" name="pet_breed" class="form-control" id="pet_breed" placeholder="">
                                    <label for="floatingInput">Breed</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="" name="pet_age" class="form-control" id="pet_age" placeholder="">
                                    <label for="floatingInput">Age</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="pet_gender" id="pet_gender" aria-label="Floating label select example">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>                               
                                    </select>
                                    <label for="vaccine">Gender</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="" name="pet_color" class="form-control" id="pet_color" placeholder="">
                                    <label for="floatingInput">Color</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex">
                            <input type="hidden" name="client_id" class="form-control" id="" placeholder="" value="<?= $client_id ?>">
                            <input type="submit" class="btn btn-primary" value="ADD">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>