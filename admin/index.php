<?php

include 'partials/header.php';
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

            <a href="#" class="d-flex ms-2 text-color" style="font-size: 16px;">
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
                  <tr>
                    <td data-title="S.No">1</td>
                    <td data-title="Title">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione, recusandae.</td>
                    <td data-title="Category">Food</td>
                    <td data-title="Edit"><a href="edit-post.php" class="bg-color edit-btn px-3 py-1 rounded text-white">Edit</a></td>
                    <td data-title="Delete"><a href="delete-post.php" class="delete-btn delete-btn px-3 py-1 rounded text-white">Delete</a></td>
                  </tr>
                  <tr>
                    <td data-title="S.No">2</td>
                    <td data-title="Title">Lorem ipsum dolor sit amet consectetur adipisicing elit. At totam, illo accusamus consequuntur et earum recusandae veritatis dolorem quisquam deleniti sequi molestiae ipsum possimus.</td>
                    <td data-title="Category">Wild</td>
                    <td data-title="Edit"><a href="edit-post.php" class="bg-color edit-btn px-3 py-1 rounded text-white">Edit</a></td>
                    <td data-title="Delete"><a href="delete-post.php" class="delete-btn delete-btn px-3 py-1 rounded text-white">Delete</a></td>
                  </tr>

                </tbody>
              </table>
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