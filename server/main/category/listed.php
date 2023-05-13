<div class="alert alert-success alert-dismissable" style="display: none; position: absolute; right: 10px; top: 50%; z-index:100">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success! </strong> Category has been removed.
</div>

<style>
    #table-body > tr:nth-child(even) {
        background-color: rgba(0,0,0,0.03);
    }
</style>

<div class="col-lg-9 my-5">
    <h6 class="text-uppercase text-center"><b>Categories</b></h6>
    <div style="background-color: #FDF0F1;" class="bg-white rounded mt-3">
        <table class="table mt-2 table-borderless">
            <thead class="text-center thead-light">
                <tr>
                    <th class="align-middle w-50">Category name</th>
                    <th class="align-middle w-15">In use</th>
                    <th class="align-middle w-35">Action</th>
                </tr>
            </thead>
            <tbody id="table-body" class="text-center">
                <?php
                $sql = "select * from Category where status=1";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_array()) {
                        $ctid = $row['Category_id'];
                        $sql = "select count(*) as amount from Quiz where Category_id='$ctid' and active=1";
                        $result2 = $conn->query($sql);
                        $amount = $result2->fetch_array()['amount'];
                ?>
                        <tr>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $amount ?></td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="displayEdit('<?php echo $row['Category_id'] ?>', '<?php echo $row['name'] ?>')">Edit</button>
                                <button class="btn btn-sm btn-danger" onclick="confirmRemoval(this, '<?php echo $row['Category_id'] ?>')">Delete</button>
                            </td>
                        </tr>

                <?php
                    }
                }
                ?>
        </table>
    </div>
</div>

<div class="modal fade" id="confirm-removal-modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Remove category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Are you sure to remove <strong id="producer-name">My Tam</strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="delete-button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>



<script src="main/category/category.js"></script>