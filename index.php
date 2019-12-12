<?php
    require_once "connection.php";
    $query = $db->prepare("SELECT * FROM data");
    $query->execute();
    $data = $query->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
    <title>Index Data</title>
</head>
<body>
    <table class="table" border="1">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Destination</th>
      <th scope="col">Action</th>
    </tr>
    <?php $no=1; ?>
  </thead>
  <tbody>
      <?php foreach ($data as $value): ?>  
    <tr>
        <td>
      <?php echo $no ?>
  </td>
        <td>
        <?php echo $value['email'] ?>
       </td>
        <td>
       <?php echo $value['address'] ?>
   </td>
        <td>
       <?php echo $value['desination'] ?>
   </td>
        <td>
            <a href="edit.php?id=<?php echo $value['id']?>">Edit</a>
            <a href="#">Delete</a>
        </td>
    </tr>
  </tbody>
    <?php endforeach; ?>
</table>
</table>
</body>
</html>