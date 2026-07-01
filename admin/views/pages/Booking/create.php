
<div class="card">
    <div class="card-body">
        <h3>Create Booking</h3>

        <form method="post" action="<?php echo $base_url; ?>/bookings/save">

            <div class="mb-3">
                <label for="user_id" class="form-label">User ID</label>
                <input type="number" name="user_id" class="form-control" id="user_id" required>
            </div>

            <div class="mb-3">
                <label for="package_id" class="form-label">Package ID</label>
                <input type="number" name="package_id" class="form-control" id="package_id" required>
            </div>

            <div class="mb-3">
                <label for="travel_date" class="form-label">Travel Date</label>
                <input type="date" name="travel_date" class="form-control" id="travel_date" required>
            </div>

            <div class="mb-3">
                <label for="persons" class="form-label">Persons</label>
                <input type="number" name="persons" class="form-control" id="persons" value="1" min="1" required>
            </div>

            <div class="mb-3">
                <label for="total_price" class="form-label">Total Price</label>
                <input type="number" step="0.01" name="total_price" class="form-control" id="total_price" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-control" id="status">
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>

            <button type="submit" name="btn_submit" class="btn btn-primary">
                Save Booking
            </button>

        </form>
    </div>
</div>

