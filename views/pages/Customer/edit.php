
<?php 

 print_r($data);


?>

<div class="card">
    <div class="card-body">
        <form method="post" action="<?php echo $base_url?>/customer/update">
            <div class="mb-3">
                <label for="name" class="form-label">Customer Name</label> 
                <input hidden type="text" name="id" class="form-control"  value="<?php echo $data->id; ?>" required>
                <input type="text" name="name" class="form-control" id="name" value="<?php echo $data->name; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Customer Email</label>
                <input value="<?php echo $data->email ?? "" ?>" type="text"  name="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input value="<?php echo $data->phone ?? "" ?>" type="text"  name="phone" class="form-control" id="phone">
            </div>
            <div class="mb-3">
                <label for="passport_no" class="form-label">Passport No</label>
                <input value="<?php echo $data->passport_no ?? "" ?>" type="text"  name="passport_no" class="form-control" id="passport_no">
            </div>
              <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea value="<?php echo $data->address ?? "" ?>" type="text"  name="address" class="form-control" ></textarea>
             </div>
            <input type="submit"   name="btn_submit" class="btn btn-primary" >
        </form>
    </div>
</div>