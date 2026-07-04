

<?php 

 print_r($data);


?>

<div class="card">
    <div class="card-body">
        <form method="post" action="<?php echo $base_url?>/flight/update">
            <div class="mb-3">
                <label for="airline" class="form-label"> Airline</label>
                <input hidden type="text" name="id" class="form-control"  value="<?php echo $data->id; ?>" required> 
                <input type="text" name="airline" class="form-control" id="airline"  value="<?php echo $data->airline; ?>" required>
            </div>
            <div class="mb-3">
                <label for="flight_no" class="form-label">flight_no</label>
                <input value="<?php echo $data->flight_no ?? "" ?>" type="text"  name="flight_no" class="form-control" id="flight_no">
            </div>
            <div class="mb-3">
                <label for="source" class="form-label">flight_no</label>
                <input value="<?php echo $data->flight_no ?? "" ?>" type="text"  name="flight_no" class="form-control" id="flight_no">
            </div>
            <div class="mb-3">
                <label for="destination" class="form-label">destination </label>
                <input value="<?php echo $data->destination ?? "" ?>" type="text"  name="destination" class="form-control" id="destination">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price </label>
                <input value="<?php echo $data->price ?? "" ?>" type="text"  name="price" class="form-control" id="price">
            </div>
            <input type="submit"   name="btn_submit" class="btn btn-primary" >
        </form>
    </div>
</div>