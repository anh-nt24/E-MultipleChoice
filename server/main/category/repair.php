<?php
$sql = "SELECT * FROM category WHERE categoryId='$_GET[category_id]' LIMIT 1";
$result = $conn->query($sql);
?>
<div class="container d-flex justify-content-center">
  <div class="col-lg-6 col-9 my-5 text-center">
  <h6 class="text-uppercase py-2">Sửa danh mục</h6>
  <form action="main/category/processing.php?category_id=<?php echo $_GET['category_id'] ?>" method="POST">
    <?php
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_array()) {

    ?>
     
          <div class="input-group my-2">
          <label style="width: 22%;" class="text-muted input-group-text" for="inputGroupSelect09">Tên danh mục</i></label>
          <input type="text" id="inputGroupSelect09" value="<?php echo $row['name']?>" name="category" class="form-control">
          </div>
      

   <button style="border-radius:0.5rem" type="submit" name="repair" class="my-2 btn btn-sm btn-success">Đổi tên danh mục</button></td>
      
    <?php
      }
    } else {
      //echo "0 results";
    }
    ?>
    </form>
    </div>
</div>