<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./responsive.css">
    <title>VLearn-Transfoming Online Education</title>
</head>
<nav class="navbar  navheight-resp">
        <ul class="nav-list  vclass-resp">
            <div class="logo"><img src="./img.jpg" alt="logo"></div>
            <li><a href="/" id="home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="./index.php">Contact Us</a></li>
        </ul>
        <div class="rightnav vclass-resp">
            <input type="text" name="search" id="search">
            <button class="search btn btn-sm">search</button>
        </div>
        <div class="burger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </nav>
<section class="contact" id="contact">
        <h2 class="textcenter">Contact Us</h2>
        <?php
        if (isset($_POST['submit'])) {
            // Checking for a POST request
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = test_input($_POST["name"]);
                $phonenumber = test_input($_POST["phonenumber"]);
                $email = test_input($_POST["email"]);
                $message = test_input($_POST["text"]);
                $hide = 1;
            }

            if (empty($name)) {
                $nameErr = "Name is required";
            } else {
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                    $nameErr = "invalid Name ";
                }
            }

            if (empty($email)) {
                $emailErr = "Email is required";
            } else {
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email";
                }
            }

            if (empty($phonenumber)) {
                $phErr = "Phonenumber is required";
            } else {
                // check if e-mail address is well-formed
                if (!preg_match("/^[0-9]*$/", $phonenumber)) {
                    $phErr = "Invalid phonenumber";
                }
                if (strlen($phonenumber) != 10) {
                    $phoErr = "Mobile no must contain 10 digits.";
                }
            }
            $displayStyle = $hide ? "display: block;" : "display: none;";
        }
        // Removing the redundant HTML characters if any exist.
        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
        <div style="<?php echo $displayStyle; ?>" class="tq">
            <?php echo "Thank you, $name, for contacting us! We'll be in touch shortly."; ?>
        </div>
        <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input class="forminput" type="text" name="name" id="name" placeholder="Enter Your Name" required>
            <input class="forminput" type="phonenumber" name="phonenumber" id="phonenumber"
                placeholder="Enter Your Phone Number" required minlength="10">
            <input class="forminput" type="email" name="email" id="email" placeholder="Enter Your Email" required>
            <textarea class="forminput" name="text" id="text" cols="30" rows="10"
                placeholder="Tell Your Concerns"></textarea>
            <button class="btn s-btn btn-sm btn-dark" name="submit">Submit</button>
        </form>
    </section>
</body>
<script src="index.js"></script>

</html>