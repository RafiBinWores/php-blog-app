<?php

include('partials/header.php');

//fetch user
$current_admin_id = $_SESSION['user-id'];

$sql = "SELECT * FROM users WHERE  NOT id = '$current_admin_id'";

$res = mysqli_query($conn, $sql);

$sn = 1;
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
            <h3 class="text-color">Manage Users</h3>

            <?php
            if (isset($_SESSION['add-user-success'])) : ?>
              <p class="text-success">
                <?= $_SESSION['add-user-success'];
                unset($_SESSION['add-user-success']);
                ?>
              </p>
            <?php elseif (isset($_SESSION['edit-user-success'])) : // edit success 
            ?>
              <p class="text-success">
                <?= $_SESSION['edit-user-success'];
                unset($_SESSION['edit-user-success']);
                ?>
              </p>
            <?php elseif (isset($_SESSION['edit-user'])) : //not success 
            ?>
              <p class="text-success">
                <?= $_SESSION['edit-user'];
                unset($_SESSION['edit-user']);
                ?>
              </p>
            <?php elseif (isset($_SESSION['delete-user'])) : //delete user failed
            ?>
              <p class="text-danger">
                <?= $_SESSION['delete-user'];
                unset($_SESSION['delete-user']);
                ?>
              </p>
            <?php elseif (isset($_SESSION['delete-user-success'])) : //delete user success
            ?>
              <p class="text-success">
                <?= $_SESSION['delete-user-success'];
                unset($_SESSION['delete-user-success']);
                ?>
              </p>
            <?php endif ?>

            <div id="user-table">
              <table class="table shadow p-3 mb-5 bg-body">
                <thead class="bg-color text-white shadow p-3 mb-5">
                  <tr>
                    <th>S.No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Admin</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  while ($user = mysqli_fetch_assoc($res)) : ?>
                    <tr>
                      <td data-title="S.No"><?php echo $sn++ ?></td>
                      <td data-title="Username"><?= $user['username'] ?></td>
                      <td data-title="Email"><?= $user['email'] ?></td>
                      <td data-title="Edit"><a href="<?= ROOT_URL ?>admin/edit-user.php?id=<?= $user['id'] ?>" class="bg-color edit-btn px-3 py-1 rounded text-white">Edit</a></td>
                      <td data-title="Delete"><a href="<?= ROOT_URL ?>admin/delete-user.php?id=<?= $user['id'] ?>" class="delete-btn delete-btn px-3 py-1 rounded text-white">Delete</a></td>
                      <td data-title="Admin"><?= $user['is_admin'] ? 'Yes' : 'No' ?></td>
                    </tr>

                  <?php endwhile ?>

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