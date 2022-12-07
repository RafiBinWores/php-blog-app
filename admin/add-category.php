<?php

include('partials/header.php');
?>


<div class="container">
  <div class="category-form-area mx-auto">
    <h1 class="mt-5">Add Category</h1>
    <form method="post" enctype="" action="" class="mt-4">
      <div class="form-group mb-3">
        <label for="category-title">Category Name</label>
        <input type="text" class="form-control mt-2" id="category-title" placeholder="Title">
      </div>
      <div class="form-group">
        <label for="category-desc">Description</label>
        <textarea class="form-control mt-2" name="category-desc" id="category-desc" cols="30" rows="5" placeholder="write something..."></textarea>
      </div>
      <button type="submit" class="btn btn-primary mt-3">Add Category</button>
    </form>
  </div>
</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>