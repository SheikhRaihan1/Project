
<?php 

 print_r($data);


?>

<div class="card">
    <div class="card-body">
        <form method="post" action="<?php echo $base_url?>/booking/update">
            <div class="mb-3">
                <label for="user_id" class="form-label">User ID</label> 
                <input hidden type="text" name="id" class="form-control"  value="<?php echo $data->id; ?>" required> 
                <input type="number" name="user_id" class="form-control" id="user_id" value="<?php echo $data->user_id; ?>" required>
            </div>
            <div class="mb-3">
                <label for="package_id" class="form-label">Package ID</label>
                <input value="<?php echo $data->package_id ?? "" ?>" type="text"  name="package_id" class="form-control" id="package_id">
            </div>
            <div class="mb-3">
                <label for="travel_date" class="form-label">Travel Date</label>
                <input value="<?php echo $data->travel_date ?? "" ?>" type="text"  name="travel_date" class="form-control" id="travel_date">
            </div>
            <div class="mb-3">
                <label for="persons" class="form-label">Persons</label>
                <input value="<?php echo $data->persons ?? "" ?>" type="text"  name="persons" class="form-control" id="persons">
            </div>
            <div class="mb-3">
                <label for="total_price" class="form-label">Total Price</label>
                <input value="<?php echo $data->total_price ?? "" ?>" type="text"  name="total_price" class="form-control" id="total_price">
            </div>

          <div class="mb-3"> 
            <label for="status" class="form-label">Status</label>
             <select name="status" class="form-control" id="status"> 
                <option value="pending" <?php if($data->status=='pending') echo 'selected'; ?>> Pending </option>
                <option value="confirmed" <?php if($data->status=='confirmed') echo 'selected'; ?>> Confirmed </option> 
                <option value="cancelled" <?php if($data->status=='cancelled') echo 'selected'; ?>> Cancelled </option>
             </select>
         </div>
            <input type="submit"   name="btn_submit" class="btn btn-primary" >
        </form>
    </div>
</div>