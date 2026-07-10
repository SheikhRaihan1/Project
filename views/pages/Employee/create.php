
<div class="card">
    <div class="card-body">
        <h3>Create Employee</h3>

        <form method="post" action="<?php echo $base_url; ?>/employee/save">

            <div class="mb-3">
                <label for="name" class="form-label"> Name</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="number" name="phone" class="form-control" id="phone" required>
            </div>

            <div class="mb-3">
                <label for="designation" class="form-label">Designation</label>
                <input type="text" name="designation" class="form-control" id="designation" required>
            </div>

            <button type="submit" name="btn_submit" class="btn btn-primary">
                Save Employee
            </button>

        </form>
    </div>
</div>

