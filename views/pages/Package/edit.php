
<?php 

 print_r($data);


?>

<div class="card">
    <div class="card-body">
        <form method="post" action="<?php echo $base_url?>/package/update" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label"> Title</label> 
                <input hidden type="text" name="id" class="form-control"  value="<?php echo $data->id; ?>" required>
                <input type="text" name="title" class="form-control" id="title" value="<?php echo $data->title; ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description </label>
                <input value="<?php echo $data->email ?? "" ?>" type="text"  name="description" class="form-control" id="description">
            </div>
            <div class="mb-3">
                <label for="destination" class="form-label">Destination</label>
                <input value="<?php echo $data->destination ?? "" ?>" type="text"  name="destination" class="form-control" id="destination">
            </div>
            <div class="mb-3">
                <label for="hotel_id" class="form-label">Hotel_id</label>
                <input value="<?php echo $data->hotel_id ?? "" ?>" type="text"  name="hotel_id" class="form-control" id="hotel_id">
            </div>
            <div class="mb-3">
                <label for="transport_id" class="form-label">Transport_id</label>
                <input value="<?php echo $data->transport_id ?? "" ?>" type="text"  name="transport_id" class="form-control" id="transport_id">
            </div>
            <div class="mb-3">
                <label for="flight_id" class="form-label">Flight_id</label>
                <input value="<?php echo $data->hoteflight_idl_id ?? "" ?>" type="text"  name="flight_id" class="form-control" id="flight_id">
            </div>
            <div class="mb-3">
                <label for="duration" class="form-label">Duration (Days) </label>
                <input value="<?php echo $data->duration ?? "" ?>" type="number"  name="duration" class="form-control" id="duration">
            </div>
              <div class="mb-3">
                    <label for="price" class="form-label">price</label>
                    <input value="<?php echo $data->price ?? "" ?>" type="number"  name="price" class="form-control" ></input>
             </div>
              <div class="mb-3">
                    <label for="max_persons" class="form-label">Max Persons</label>
                    <input value="<?php echo $data->max_persons ?? "" ?>" type="text"  name="max_persons" class="form-control" ></input>
             </div>
             <div class="mb_3">
                       <label for="image" class="form-label">Image</label>
                       <input value="<?php echo $data->image ?? "" ?>" type="file" name="image" class="form_control">
             </div>
              <div class="mb-3">
            <label>Status</label>

            <select name="status" class="form-select">

                <option value="active"<?= $data->status=="active" ? "selected" : "" ?>>Active</option>

                <option value="inactive" <?= $data->status=="inactive" ? "selected" : "" ?>>Inactive </option>

            </select>

        </div>
            <input type="submit"   name="btn_submit" class="btn btn-primary" >
        </form>
    </div>
</div>