
<div class="card">
    <div class="card-body">
        <h3>Create Package</h3>

        <form method="post" action="<?php echo $base_url; ?>/package/save">

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" class="form-control" id="description" required>
            </div>

            <div class="mb-3">
                <label for="destination" class="form-label">Destination</label>
                <input type="text" name="destination" class="form-control" id="destination" required>
            </div>
            <div class="mb-3">
                <label for="hotel_id" class="form-label">Hotel_id</label>
                <input type="number" name="hotel_id" class="form-control" id="hotel_id" required>
            </div>
            <div class="mb-3">
                <label for="transport_id" class="form-label">Transport_id</label>
                <input type="number" name="transport_id" class="form-control" id="transport_id" required>
            </div>
            <div class="mb-3">
                <label for="flight_id" class="form-label">Flight_id</label>
                <input type="number" name="flight_id" class="form-control" id="flight_id" required>
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">duration</label>
                <input type="number" name="duration" class="form-control" id="duration" value="1" min="1" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label"> Price</label>
                <input type="number" step="0.01" name="price" class="form-control" id="price" required>
            </div>
            
            <div class="mb-3">
                <label for="max_persons" class="form-label">Max_persons</label>
                <input type="number" name="max_persons" class="form-control" id="max_persons" value="1" min="1" required>
            </div>
              <div class="mb_3">
                       <label for="image" class="form-label">Image</label>
                       <input  type="file" name="image" class="form_control">
             </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-control" id="status">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <button type="submit" name="btn_submit" class="btn btn-primary">
                Save package
            </button>

        </form>
    </div>
</div>

