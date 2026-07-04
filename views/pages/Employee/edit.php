
<?php 

 print_r($data);


?>

<div class="card">
    <div class="card-body">
        <form method="post" action="<?php echo $base_url?>/employee/update">
            <div class="mb-3">
                <label for="name" class="form-label"> Name</label>
                <input hidden type="text" name="id" class="form-control"  value="<?php echo $data->id; ?>" required>  
                <input type="text" name="name" class="form-control" id="name" value="<?php echo $data->name; ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input value="<?php echo $data->phone ?? "" ?>" type="text"  name="phone" class="form-control" id="phone">
            </div>
              <div class="mb-3">
                    <label for="designation" class="form-label">Designation</label>
                    <input value="<?php echo $data->address ?? "" ?>" type="text"  name="designation" class="form-control" ></input>
             </div>
            <input type="submit"   name="btn_submit" class="btn btn-primary" >
        </form>
    </div>
</div>