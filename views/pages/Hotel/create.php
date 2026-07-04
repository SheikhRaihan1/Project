
<div class="card">
    <div class="card-body">
        <h3>Add Hotel</h3>

        <form method="post" action="<?php echo $base_url; ?>/hotel/save">

            <div class="mb-3">
                <label for="name" class="form-label"> Name</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>

            <div class="mb-3">
                <label for="city" class="form-label">city Email</label>
                <input type="text" name="city" class="form-control" id="city" required>
            </div>

            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <input type="text" name="rating" class="form-control" id="rating" required>
            </div>

            <div class="mb-3">
                <label for="pricr_per_night" class="form-label">pricr_per_night</label>
                <input type="text" name="pricr_per_night" class="form-control" id="pricr_per_night" required>
            </div>

            <button type="submit" name="btn_submit" class="btn btn-primary">
                Save Customer
            </button>

        </form>
    </div>
</div>

