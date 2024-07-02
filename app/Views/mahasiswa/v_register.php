<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .register-container {
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 600px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 28px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 16px;
        }
        .register-button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(45deg, #2196F3, #21CBF3);
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 18px;
            transition: background 0.3s;
        }
        .register-button:hover {
            background: linear-gradient(45deg, #1976D2, #1E88E5);
        }
        .sign-in-link {
            text-align: center;
            margin-top: 25px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <?php
    $nama = [
        'name' => 'nama',
        'id' => 'nama',
        'class' => 'form-control',
        'placeholder' => 'Enter your name'
    ];
    $nim = [
        'name' => 'nim',
        'id' => 'nim',
        'class' => 'form-control',
        'placeholder' => 'Enter your NIM'
    ];
    $password = [
        'name' => 'password',
        'id' => 'password',
        'class' => 'form-control',
        'type' => 'password',
        'placeholder' => 'Enter your password'
    ];
    ?>

    <div class="register-container">
        <h2>Register</h2>
        
        <?php if (session()->has('errors')): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                <?php foreach (session('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

        <?= form_open('register', 'class="needs-validation" novalidate') ?>
            <div class="form-group">
                <label for="nama">Name </label>
                <?= form_input($nama, set_value('nama')) ?>
            </div>
            <div class="form-group">
                <label for="nim">NIM </label>
                <?= form_input($nim, set_value('nim')) ?>
            </div>
            <div class="form-group">
                <label for="password">Password </label>
                <?= form_input($password) ?>
            </div>
            
            <?= form_submit('submit', 'Register', ['class' => 'register-button']) ?>
        <?= form_close() ?>

        <div class="sign-in-link">
            Already have an account? <a href="login">Sign in</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
