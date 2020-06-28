<?php 
  
  $pruductOrders = OrderDao::GetOrders();
  
  if(isset($_POST['newpassword'])){
      AdminDAO::UpdateAdminPassword($_POST['newpassword']);
  }
  if(isset($_POST['submitnewadmin'])){
      AdminDAO::AddAdmin($_POST['login'], $_POST['password'], $_POST['email']);
  }
  if(isset($_POST['submit'])){
      $admin = AdminDAO::GetAdmin();
      if($_POST['password'] == $admin['password'] & $_POST['login'] == $admin['login'])
      {
          session_start();     
          $_SESSION['id'] = $admin['id'];
      }else{
          echo 'No correct field';
      }
      
  }
?>
<?php include 'Views/Layout/Header.php';?>
        <div class="container">
            <div class="row">
                <?php if(isset($_SESSION['id'])):?>
                <table class="table">
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Phone</td>
                        <td>Email</td>
                        <td><a>Delete</a></td>
                    </tr>
                    <?php foreach ($pruductOrders as $order): ?>
                        <tr>
                            <td><?php echo $order['id']; ?></td>
                            <td><?php echo $order['name']; ?></td>
                            <td><?php echo $order['mobile']; ?></td>
                            <td><?php echo $order['email']; ?></td>
                            <td style="cursor: pointer; text-decoration: underline" class="delete_btn" id="<?php echo $order['id']; ?>">Delete</td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <form class="" action="#" method="post">                            
                    <input type="password" name="newpassword"/>
                        <input type="submit" name="submitnewpassword" value="Change admin password"/>
                    </form>
                <?php else: ?>
                    <div class="offset-3">
                        <h1 class="h1">Подтверждение прав</h1>
                        <form class="" action="#" method="post">
                            <input type="text" name="login" value="Login"/>
                            <input type="password" name="password"/>
                            <input type="submit" name="submit" value="Log in"/>
                        </form>
                    </div>

                <?php endif; ?>
                <div class="offset-3">
                        <h1 class="h1">Add administrator</h1>
                        <form class="" action="#" method="post">
                            <input type="text" name="login" placeholder="Login"/>
                            <input type="password" name="password"/>
                            <input type="email" name="email" placeholder="email"/>
                            <input type="submit" name="submitnewadmin" value="Add"/>
                        </form>
                    </div>
            </div>
        </div>
        <script>
            $('.delete_btn').click(function () {
                $(this).parent().css('display', 'none');
                $.post('Delete.php', {id: $(this).attr('id')}, function (data) {

                })
            });
        </script>
    <?php include 'Views/Layout/Footer.php';?>