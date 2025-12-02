<?php
session_start();
if (isset($_SESSION['login'])) {
    header("Location: dashboard_pengunjung.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Lapas Parepare</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
body {
    background: linear-gradient(135deg, #0b3d91 0%, #0a347a 100%);
    font-family: "Poppins", sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    color: #333;
}

.login-card {
    width: 380px;
    background: #ffffff;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.25);
    animation: fadeIn 0.5s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.logo-box {
    text-align: center;
    margin-bottom: 15px;
}

.logo-box img {
    width: 80px;
    margin-bottom: 10px;
}

.login-card h4 {
    color: #0b3d91;
    font-weight: 700;
}
</style>
</head>

<body>

<div class="login-card">

    <div class="logo-box">
        <img src="logo.png" alt="Logo Lapas">
        <h5 class="fw-bold text-dark">LAPAS KELAS IIA PAREPARE</h5>
    </div>

    <h4 class="text-center mb-4">Admin Login</h4>

    <?php if(isset($_GET['msg'])): ?>
        <div class="alert alert-danger py-2"><?= $_GET['msg'] ?></div>
    <?php endif; ?>

    <form action="cek_login.php" method="POST">
        <div class="mb-3">
            <label class="fw-semibold">Username</label>
            <input type="text" name="username" class="form-control" required autofocus>
        </div>

        <div class="mb-3">
            <label class="fw-semibold">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn w-100 text-white fw-semibold py-2" 
            style="background:#0b3d91; border-radius:8px;">
            LOGIN
        </button>
    </form>
</div>

</body>
</html>
