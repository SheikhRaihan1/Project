
<?php 

 print_r($data);


?>

<div class="card">
    <div class="card-body">
        <form method="post" action="<?php echo $base_url?>/employee/update">
            <div class="mb-3">
                <label for="airline" class="form-label"> Airline</label> 
                <input type="text" name="airline" class="form-control" id="airline" value="<?php echo $data['airline']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label"> Name</label> 
                <input type="text" name="name" class="form-control" id="name" value="<?php echo $data['name']; ?>" required>
            </div>
            
            <input type="submit"   name="btn_submit" class="btn btn-primary" >
        </form>
    </div>
</div>