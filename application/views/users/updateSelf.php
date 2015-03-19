<form action="../users/update" method="post">

<input type="hidden" name="id" value = "<?php echo trim($_SESSION['id']);  ?>"> <br>
<input type="email" required placeholder="email address" name="email_address" value = "<?php echo trim($_SESSION['email_address']);  ?>"> <br><br>
<input type="text" required placeholder="first name" name="first_name" value = "<?php echo trim($_SESSION['first_name']);  ?>"> <br><br>
<input type="text" required placeholder="middle name" name="middle_name" value = "<?php echo trim($_SESSION['middle_name']);  ?>"> <br><br>
<input type="text" required placeholder="last name" name="last_name" value = "<?php echo trim($_SESSION['last_name']);  ?>"> <br><br>
<input type="text" required placeholder="address" name="address" value = "<?php echo trim($_SESSION['address']);  ?>"> <br><br>
<input type="number" required placeholder="contact number" name="contact_number" value = "<?php echo trim($_SESSION['contact_number']);  ?>"> <br><br>

type: <select name = "type">
  <option value="user" <?php if(trim($_SESSION['type']) == 'user') echo 'selected' ?>; >user</option>
  <option value="admin"  <?php if(trim($_SESSION['type']) == 'admin') echo 'selected'; ?> >admin</option>
</select><br><br>
<input type="submit" value="Update" name = "submit">


<br>

</form>