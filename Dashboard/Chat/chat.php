<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['username_account'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $username_account = mysqli_real_escape_string($conn, $_GET['username_account']); // เปลี่ยน unique_id เป็น username_account
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE username_account = '{$username_account}'"); // เปลี่ยน unique_id เป็น username_account
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="php/images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $username_account; ?>" hidden> <!-- เปลี่ยน incoming_id จาก user_id เป็น username_account -->
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>

</body>
</html>
