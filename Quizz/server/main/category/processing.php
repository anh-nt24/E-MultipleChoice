<?php
include('../../conn.php');
$category = $_POST['category'];
if(isset($_POST['add'])){
    //add

    $sql = "INSERT INTO category (name) VALUE('$category')";

    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
        ?>
        <script>
            window.location.replace("../../index.php?action=category&query=add");
        </script>       
        <?php
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
}elseif(isset($_POST['repair'])){
    //repair

    $sql = "UPDATE category SET name='$category' WHERE categoryId='$_GET[category_id]'";

    if ($conn->query($sql) === TRUE) {
        //echo "Record updated successfully";
        ?>
        <script>
            window.location.replace("../../index.php?action=category&query=add");
        </script>       
        <?php
    } else {
        //echo "Error updating record: " . $conn->error;
    }

}
?>