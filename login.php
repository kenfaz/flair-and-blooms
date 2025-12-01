<?php
session_start();
include 'php_functions/database.php'; // MySQL connection file

// LOGIN LOGIC
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Try match either full_name or email
    $sql = "SELECT * FROM users WHERE full_name = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // If user found
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify hashed password
        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['full_name'] = $user['full_name'];

            header("Location: index.php"); 
            exit;

        } else {
            $error = "Incorrect password.";
        }

    } else {
        $error = "User not found.";
    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta
      charset="utf-8"
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    <title>Flair & Blooms</title>
    <link rel="stylesheet" href="css/login.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato:wght@300;400&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" href="src/icons/logo.png" />
  </head>

  <body>
    <div class="main-div">
      <div class="form-container">
        <div class="left-div">
          <form class="login-box" action="login.php" method="POST">
            
            <img src="src/icons/logo.png" />
            <h2>Flair & Blooms</h2>

            <?php if (!empty($error)) { ?>
              <p style="color: red; font-size: 14px; margin-bottom: 10px;">
                <?php echo $error; ?>
              </p>
            <?php } ?>

            <p>Log in and get your high quality flowers!</p>

            <input
              type="text"
              name="username"
              placeholder="username or email"
              required
            />
            <br />

            <input
              type="password"
              name="password"
              placeholder="password"
              required
            />
            <br />

            <button class="sign-in" type="submit">SIGN IN</button>

            <p>
              Don't have an account?
              <a href="signup.php">Sign up</a>
            </p>

          </form>
        </div>

        <div class="right-div">
          <img src="src/images/background_flowers.jpg" alt="Green Flowers" />
        </div>
      </div>
    </div>
  </body>
  <footer></footer>
</html>
