<?php

// JOIN users ON posts.author_id = user.id 

include 'partials/header.php';

$sn = 1;
$current_user = $_SESSION['user-id'];
$sql  = "SELECT id, title category_id FROM posts WHERE author_id=$current_user ORDER BY id DESC";

$res = mysqli_query($conn, $sql);
?>

<section>
  <div class="category-container">

    <div class="container d-flex gap-5 pt-3 flex-c">
      <div class="account-sidebar">
        <div class="sidebar-profile-menu">
          <h6 class="mb-3 border-bottom border-dark">Account</h6>
          <div class="sidebar-category-link mt-4">

            <a href="add-post.php" class="d-flex ms-2 mb-3 text-color" style="font-size: 16px;">
              <i class="ri-pencil-line me-2" style="font-size: 18px;"></i>
              <p>Add Post</p>
            </a>

            <a href="index.php" class="d-flex ms-2 mb-3 text-color" style="font-size: 16px;">
              <i class="ri-edit-line me-2" style="font-size: 18px;"></i>
              <p>Manage Post</p>
            </a>

            <?php if (isset($_SESSION['user-is-admin'])) : ?>

              <a href="add-user.php" class="d-flex ms-2 mb-3 text-color" style="font-size: 16px;">
                <i class="ri-user-add-line me-2" style="font-size: 18px;"></i>
                <p>Add User</p>
              </a>

              <a href="manage-users.php" class="d-flex ms-2 mb-3 text-color" style="font-size: 16px;">
                <i class="ri-user-settings-line me-2" style="font-size: 18px;"></i>
                <p>Manage User</p>
              </a>

              <a href="add-category.php" class="d-flex ms-2 mb-3 text-color" style="font-size: 16px;">
                <i class="ri-play-list-add-fill me-2" style="font-size: 18px;"></i>
                <p>Add Categories</p>
              </a>

              <a href="manage-categories.php" class="d-flex ms-2 mb-3 text-color" style="font-size: 16px;">
                <i class="ri-list-settings-line me-2" style="font-size: 18px;"></i>
                <p>Manage Categories</p>
              </a>

            <?php endif ?>

            <a href="logout.php" class="d-flex ms-2 text-color" style="font-size: 16px;">
              <i class="ri-logout-circle-r-line me-2" style="font-size: 18px;"></i>
              <p>Logout</p>
            </a>

          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">

          <div class="col-12 mb-4">
            <h3 class="text-color">Manage Posts</h3>

            <div id="user-table">

              <?php if (mysqli_num_rows($res) > 0) : ?>

                <table class="table shadow p-3 mb-5 bg-body">
                  <thead class="bg-color text-white shadow p-3 mb-5">
                    <tr>
                      <th>S.No</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Delete</th>
                      <th>Admin</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($post = mysqli_fetch_assoc($res)) : ?>

                      <?php
                      $category_id = $_POST['category_id'];
                      $sql1 = "SELECT title FROM categories WHERE id = $category_id";
                      $res1 = mysqli_query($conn, $sql1);
                      $category = mysqli_fetch_assoc($res1);

                      ?>
                      <tr>
                        <td data-title="S.No"><?= $sn++ ?></td>
                        <td data-title="Title"><?= $post['title'] ?></td>
                        <td data-title="Category"><?= $category['title'] ?></td>
                        <td data-title="Edit"><a href="edit-post.php" class="bg-color edit-btn px-3 py-1 rounded text-white">Edit</a></td>
                        <td data-title="Delete"><a href="delete-post.php" class="delete-btn delete-btn px-3 py-1 rounded text-white">Delete</a></td>
                      </tr>
                    <?php endwhile ?>


                  </tbody>
                </table>
              <?php else : ?>
                <p class="text-danger"><?= "No post found" ?></p>
              <?php endif ?>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<?php

include('../partials/footer.php');
?>