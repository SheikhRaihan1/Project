
<?php 

 print_r($data);


?>

<div class="card">
    <div class="card-body">
        <form method="post" action="<?php echo $base_url?>/hotel/update">
            <div class="mb-3">
                <label for="name" class="form-label"> Name</label>
                <input hidden type="text" name="id" class="form-control"  value="<?php echo $data->id; ?>" required> 
                <input type="text" name="name" class="form-control" id="name"  value="<?php echo $data->name; ?>" required>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input value="<?php echo $data->email ?? "" ?>" type="text"  name="email" class="form-control" id="city">
            </div>
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <input value="<?php echo $data->phone ?? "" ?>" type="text"  name="rating" class="form-control" id="rating">
            </div>
            <div class="mb-3">
                <label for="price_per_night" class="form-label">Price_per_night </label>
                <input value="<?php echo $data->passport_no ?? "" ?>" type="text"  name="price_per_night" class="form-control" id="price_per_night">
            <input type="submit"   name="btn_submit" class="btn btn-primary" >
        </form>
    </div>
</div>