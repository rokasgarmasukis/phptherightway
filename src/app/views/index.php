Home Page


<?php if (!empty($invoice)) : ?>
  <p>Invoice Id: <?php echo htmlspecialchars($invoice['id'], ENT_QUOTES) ?></p>
  <p>Invoice Amount: <?php echo htmlspecialchars($invoice['amount'], ENT_QUOTES)  ?></p>
  <p>User: <?php echo htmlspecialchars($invoice['full_name'], ENT_QUOTES)  ?></p>
<?php endif ?>



<form action="upload" method="post" enctype="multipart/form-data">
  <label for="receipt"></label>
  <input type="file" name="receipt" id="receipt">
  <button type="submit">Upload</button>

</form>