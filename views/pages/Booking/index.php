<?php
// print_r($data);
?>


<div class="card">
    <div class="card-header">
        <h3>Booking List</h3>
        <a href="<?php echo $base_url; ?>/booking/create" class="btn btn-primary">
            Add New Booking
        </a>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Package ID</th>
                    <th>Travel Date</th>
                    <th>Persons</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th width="150">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($booking)) { ?>
                    <?php foreach ($data as $key => $booking) { ?>
                        <tr>
                            <td><?php echo $booking->id; ?></td>
                            <td><?php echo $booking->user_id; ?></td>
                            <td><?php echo $booking->package_id; ?></td>
                            <td><?php echo $booking->travel_date; ?></td>
                            <td><?php echo $booking->persons; ?></td>
                            <td><?php echo $booking->total_price; ?></td>
                            <td><?php echo ucfirst($booking->status); ?></td>
                            <td><?php echo $booking->created_at; ?></td>
                            <td>
                                <a href="<?php echo $base_url; ?>/bookings/edit/<?php echo $booking->id; ?>"
                                    class="btn btn-sm btn-warning">
                                    Edit
                                </a>
                                <a href="<?php echo $base_url; ?>/bookings/delete/<?php echo $booking->id; ?>"
                                    class="btn btn-sm btn-secondary">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="9" class="text-center">
                            No booking found.
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>