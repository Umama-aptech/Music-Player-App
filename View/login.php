<?php
session_start();

$connect = mysqli_connect("localhost", "root", "", "music");
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$error = '';
if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $select = "SELECT * FROM newusers WHERE email = '" . mysqli_real_escape_string($connect, $email) . "' AND password = '" . mysqli_real_escape_string($connect, $password) . "'";
    $result = mysqli_query($connect, $select);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];
        header("Location: ../index.html");
        exit();
    } else {
        $error = 'Email or password is incorrect.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | UA Music Player</title>
    <link rel="stylesheet" href="../Styling/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            background: #0e0d0d;
            color: #fff;
            font-family: "Poppins", sans-serif;
        }
        .auth-shell {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 24px;
        }
        .auth-card {
            width: 100%;
            max-width: 420px;
            background: #171616;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 28px;
            padding: 32px;
            box-shadow: 0 24px 60px rgba(0, 0, 0, 0.35);
        }
        .auth-card h1 {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        .auth-card p {
            color: #c9c9c9;
            margin-bottom: 24px;
            line-height: 1.5;
        }
        .auth-card label {
            display: block;
            margin-bottom: 10px;
            color: #e6e6e6;
            font-size: 0.95rem;
        }
        .auth-card input {
            width: 100%;
            padding: 14px 16px;
            margin-bottom: 18px;
            border-radius: 14px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            background: #111;
            color: #fff;
        }
        .auth-card input:focus {
            outline: none;
            border-color: #1fdf64;
            box-shadow: 0 0 0 4px rgba(31, 223, 100, 0.12);
        }
        .auth-card .btn-primary {
            width: 100%;
            padding: 14px 18px;
            border-radius: 999px;
            border: none;
            background: #1fdf64;
            color: #000;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s ease;
        }
        .auth-card .btn-primary:hover {
            background: #18c957;
        }
        .auth-card .link-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 18px;
        }
        .auth-card .link-row a {
            color: #1fdf64;
            text-decoration: none;
            font-weight: 600;
        }
        .auth-card .error-message {
            margin-top: 10px;
            color: #ff6b6b;
            font-size: 0.95rem;
        }
        @media (max-width: 520px) {
            .auth-card {
                padding: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="auth-shell">
        <div class="auth-card">
            <h1>Welcome back</h1>
            <p>Log in and continue enjoying your favorite music on UA Music Player.</p>
            <form action="" method="post">
                <label for="email">Email address</label>
                <input id="email" name="email" type="email" placeholder="name@domain.com" required>
                <label for="password">Password</label>
                <input id="password" name="password" type="password" placeholder="Password" required>
                <button type="submit" name="login" class="btn-primary">Continue</button>
            </form>
            <?php if (!empty($error)): ?>
                <p class="error-message"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
            <div class="link-row">
                <span class="gray">Need an account?</span>
                <a href="signup.html">Sign up</a>
            </div>
        </div>
    </div>
</body>
</html>
