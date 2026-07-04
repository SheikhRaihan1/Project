
<div class="card">
    <div class="card-body">
        <h3>Create Flight</h3>

        <form method="post" action="<?php echo $base_url; ?>/flight/save">

            <div class="mb-3">
                <label for="id" class="form-label">Id</label>
                <input type="number" name="id" class="form-control" id="id" required>
            </div>

            <div class="mb-3">
                <label for="airline" class="form-label">Airline</label>
                <input type="text" name="airline" class="form-control" id="airline" required>
            </div>

            <div class="mb-3">
                <label for="flight_no" class="form-label">flight_no</label>
                <input type="text" name="flight_no" class="form-control" id="Flight_no" required>
            </div>

            <div class="mb-3">
                <label for="source" class="form-label">Source</label>
                <input type="text" name="source" class="form-control" id="source" required>
            </div>

            <div class="mb-3">
                    <label for="destination" class="form-label">Destination</label>
                    <input type="text" name="destination" class="form-control" id="destination" required>
             </div>
            <div class="mb-3">
                    <label for="price" class="form-label">price</label>
                    <input type="text" name="despriceination" class="form-control" id="price" required>
             </div>

            <button type="submit" name="btn_submit" class="btn btn-primary">
                Save Customer
            </button>

        </form>
    </div>
</div>

