<?php
// print_r($data);
?>


<div class="card">
    <div class="card-header">
        <h3>customer List</h3>
        <a href="<?php echo $base_url; ?>/customer/create" class="btn btn-primary">
            Add New customer
        </a>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Passport No</th>
                    <th>Password</th>
                    <th width="150">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($customer)) { ?>
                    <?php foreach ($data as $key => $customer) { ?>
                        <tr>
                            <td><?php echo $customer->id; ?></td>
                            <td><?php echo $customer->name; ?></td>
                            <td><?php echo $customer->email; ?></td>
                            <td><?php echo $customer->phone; ?></td>
                            <td><?php echo $customer->passport_no; ?></td>
                            <td><?php echo $customer->address; ?></td>
                            <td>
                                <a href="<?php echo $base_url; ?>/customers/edit/<?php echo $customer->id; ?>"
                                    class="btn btn-sm btn-warning">
                                    Edit
                                </a>
                                <a href="<?php echo $base_url; ?>/customers/delete/<?php echo $customer->id; ?>"
                                    class="btn btn-sm btn-secondary">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="9" class="text-center">
                            No customer found.
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>