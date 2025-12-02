<?php
include 'php_functions/database.php'; // DB connection

$success = "";
$error = "";

// SIGNUP LOGIC
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = trim($_POST['fullname']);
    $email    = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // CHECK IF EMAIL OR USERNAME ALREADY EXISTS
    $check = $conn->prepare("SELECT * FROM users WHERE email = ? OR full_name = ?");
    $check->bind_param("ss", $email, $username);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        $error = "Email or username already exists!";
    } else {
        // INSERT NEW USER
        $sql = $conn->prepare("INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)");
        $sql->bind_param("sss", $fullname, $email, $password);

        if ($sql->execute()) {
            $success = "Account created successfully!";
            header("refresh:2; url=login.php"); // redirect after 2 seconds
        } else {
            $error = "Something went wrong. Please try again.";
        }
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
    <link rel="stylesheet" href="css/signup.css" />
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

          <form class="signup-box" action="signup.php" method="POST">

            <img src="src/icons/logo.png" />
            <h2>Flair & Blooms</h2>

            <?php if (!empty($error)) { ?>
              <p style="color: red; font-size: 14px; margin-bottom: 10px;">
                <?php echo $error; ?>
              </p>
            <?php } ?>

            <?php if (!empty($success)) { ?>
              <p style="color: green; font-size: 14px; margin-bottom: 10px;">
                <?php echo $success; ?>
              </p>
            <?php } ?>

            <p>Create an account and get your high quality flowers!</p>

            <input
              type="text"
              name="fullname"
              placeholder="full name"
              required
            />
            <br />

            <input
              type="email"
              name="email"
              placeholder="email"
              required
            />
            <br />

            <input
              type="text"
              name="username"
              placeholder="username"
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

            <button class="create-account" type="submit">CREATE ACCOUNT</button>

            <p>Already have an account? <a href="login.php">Sign in</a></p>
          </form>
        </div>

        <div class="right-div">
          <img src="src/images/signin.jpg" alt="Flowers" />
        </div>

      </div>
    </div>
  </body>
  <footer></footer>
</html>
