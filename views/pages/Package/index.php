<?php
// print_r($data);
?>


<div class="card">
    <div class="card-header">
        <h3>package List</h3>
        <a href="<?php echo $base_url; ?>/package/create" class="btn btn-primary">
            Add New package
        </a>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Destination</th>
                <th>Hotel ID</th>
                <th>Transport ID</th>
                <th>Flight ID</th>
                <th>Duration</th>
                <th>Price</th>
                <th>Max Persons</th>
                <th>Status</th>
                <th width="170">Action</th>
            </tr>
            </thead>

            <tbody>
                <?php if (!empty($package)) { ?>
                    <?php foreach ($data as $key => $package) { ?>
                        <tr>
                            <td><?php echo $package->id; ?></td>
                            <td> <img src="uploads/<?php echo $package->image; ?> width="80"></td>
                            <td><?php echo $package->title; ?></td>
                            <td><?php echo $package->description; ?></td>
                            <td><?php echo $package->destination; ?></td>
                            <td><?php echo $package->hotel_id; ?></td>
                            <td><?php echo $package->transport_id; ?></td>
                            <td><?php echo $package->flight_id; ?></td>
                            <td><?php echo $package->duration; ?></td>
                            <td><?php echo $package->price; ?></td>
                            <td><?php echo $package->max_persons; ?></td>
                            <td><?php echo ucfirst($package->status); ?></td>
                            <td><?php echo $package->created_at; ?></td>
                            <td>
                                <a href="<?php echo $base_url; ?>/package/edit/<?php echo $package->id; ?>"
                                    class="btn btn-sm btn-warning">
                                    Edit
                                </a>
                                <a href="<?php echo $base_url; ?>/package/delete/<?php echo $package->id; ?>"
                                    class="btn btn-sm btn-secondary">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="9" class="text-center">
                            No package found.
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>