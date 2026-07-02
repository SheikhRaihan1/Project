<?php
// print_r($data);
?>


<div class="card">
    <div class="card-header">
        <h3>flight List</h3>
        <a href="<?php echo $base_url; ?>/flight/create" class="btn btn-primary">
            Add New Flight
        </a>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Airline</th>
                    <th>Flight_no</th>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>Price</th>
                    <th width="150">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($flight)) { ?>
                    <?php foreach ($data as $key => $flight) { ?>
                        <tr>
                            <td><?php echo $flight->id; ?></td>
                            <td><?php echo $flight->airline; ?></td>
                            <td><?php echo $flight->flight_no; ?></td>
                            <td><?php echo $flight->source; ?></td>
                            <td><?php echo $flight->destination; ?></td>
                            <td><?php echo $flight->price; ?></td>
                            <td>
                                <a href="<?php echo $base_url; ?>/flights/edit/<?php echo $flight->id; ?>"
                                    class="btn btn-sm btn-warning">
                                    Edit
                                </a>
                                <a href="<?php echo $base_url; ?>/flights/delete/<?php echo $flight->id; ?>"
                                    class="btn btn-sm btn-secondary">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="9" class="text-center">
                            No flight found.
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>