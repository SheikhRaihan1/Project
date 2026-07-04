<?php
// print_r($data);
?>


<div class="card">
    <div class="card-header">
        <h3>Employee List</h3>
        <a href="<?php echo $base_url; ?>/employee/create" class="btn btn-primary">
            Add New employee
        </a>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Designation</th>
                    <th width="150">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($employee)) { ?>
                    <?php foreach ($data as $key => $employee) { ?>
                        <tr>
                            <td><?php echo $employee->id; ?></td>
                            <td><?php echo $employee->name; ?></td>
                            <td><?php echo $employee->phone; ?></td>
                            <td><?php echo $employee->designation; ?></td>
                            <td>
                                <a href="<?php echo $base_url; ?>/employee/edit/<?php echo $employee->id; ?>"
                                    class="btn btn-sm btn-warning">
                                    Edit
                                </a>
                                <a href="<?php echo $base_url; ?>/employee/delete/<?php echo $employee->id; ?>"
                                    class="btn btn-sm btn-secondary">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="9" class="text-center">
                            No employee found.
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>