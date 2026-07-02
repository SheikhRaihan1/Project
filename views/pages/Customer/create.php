
<div class="card">
    <div class="card-body">
        <h3>Create Customer</h3>

        <form method="post" action="<?php echo $base_url; ?>/customer/save">

            <div class="mb-3">
                <label for="name" class="form-label">Customer Name</label>
                <input type="number" name="name" class="form-control" id="name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Customer Email</label>
                <input type="number" name="email" class="form-control" id="email" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="date" name="phone" class="form-control" id="phone" required>
            </div>

            <div class="mb-3">
                <label for="passport_no" class="form-label">Persons</label>
                <input type="number" name="passport_no" class="form-control" id="passport_no" required>
            </div>

            <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" class="form-control" rows="4"></textarea>
             </div>

            <button type="submit" name="btn_submit" class="btn btn-primary">
                Save Customer
            </button>

        </form>
    </div>
</div>

