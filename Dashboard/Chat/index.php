<?php 
  session_start();
  if(isset($_SESSION['username_account'])){
    header("location: users.php");
  }

  $hostname = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'followup';

  $conn = new mysqli($hostname, $username, $password, $database);

  // ตรวจสอบการเชื่อมต่อ
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // สมมติว่าคุณมีพารามิเตอร์ ID เพื่อระบุรายการที่คุณต้องการดึงข้อมูล
  $id_account = isset($_GET['id']) ? $_GET['id'] : null;
  if ($id_account === null) {
      // ไม่พบ ID ใน URL
      // คุณสามารถให้ค่าเริ่มต้นหรือกำหนดการทำงานที่เหมาะสม
  }

  $sql = "SELECT fname FROM account WHERE id_account = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id_account);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $fname = $row["fname"];
  } else {
      echo "0 results";
  }

  $stmt->close();
  $conn->close();
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Realtime Chat App</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First name" required>
          </div>
          <div class="field input">
            <label>First Name</label>
            <!-- ใส่ค่าที่ดึงมาในฟิลด์ input -->
            <input type="text" name="fname" placeholder="First name" value="<?php echo $fname; ?>" required>
        </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last name" required>
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter new password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Select Image</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      <div class="link">Already signed up? <a href="login.php">Login now</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>
</html>