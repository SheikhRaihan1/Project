<?php
// print_r($data);
?>


<div class="card">
    <div class="card-header">
        <h3>hotel List</h3>
        <a href="<?php echo $base_url; ?>/hotel/create" class="btn btn-primary">
            Add New hotel
        </a>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>Rating</th>
                    <th>price_per_night No</th>
                    <th width="150">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($hotel)) { ?>
                    <?php foreach ($data as $key => $hotel) { ?>
                        <tr>
                            <td><?php echo $hotel->id; ?></td>
                            <td><?php echo $hotel->name; ?></td>
                            <td><?php echo $hotel->city; ?></td>
                            <td><?php echo $hotel->rating; ?></td>
                            <td><?php echo $hotel->price_per_night; ?></td>
                            <td>
                                <a href="<?php echo $base_url; ?>/hotel/edit/<?php echo $hotel->id; ?>"
                                    class="btn btn-sm btn-warning">
                                    Edit
                                </a>
                                <a href="<?php echo $base_url; ?>/hotel/delete/<?php echo $hotel->id; ?>"
                                    class="btn btn-sm btn-secondary">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="9" class="text-center">
                            No hotel found.
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>