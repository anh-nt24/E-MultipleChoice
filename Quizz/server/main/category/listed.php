<div class="col-lg-9 my-5">
<h6 class="text-uppercase text-center">danh mục</h6>
<div style="background-color: #FDF0F1;" class="bg-white rounded mt-3">
<table class="table mt-2 table-borderless">
  <thead class="text-center thead-light">
    <tr>
      <th class="align-middle">Tên danh mục</th>
      <th class="align-middle">Quản lý</th>
    </tr>
  </thead>
  <tbody class="text-center">
  <?php 
  $sql = "SELECT * FROM category";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_array()) {
  ?>
  <tr>
    <td><?php echo $row['name'] ?></td>
    <td>
        <a class="mx-2" href="?action=category&query=repair&category_id=<?php echo $row['categoryId']?>"><i id="process" class="text-muted fa-solid fa-wrench"></i></a>
    </td>
  </tr>
   
    <?php
    }
    } else {
      //echo "0 results";
    }
    ?>
</table>
</div>
</div>