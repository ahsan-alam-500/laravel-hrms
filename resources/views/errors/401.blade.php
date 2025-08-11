<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>401 Unauthorized</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            overflow: hidden;
        }

        .container {
            text-align: center;
            animation: fadeIn 1.2s ease-in-out;
        }

        .error-code {
            font-size: 8rem;
            font-weight: 800;
            margin-bottom: 10px;
            position: relative;
        }

        .error-code span {
            animation: glow 2s infinite alternate;
        }

        .message {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
            padding: 12px 25px;
            background: #ff4d4d;
            color: #fff;
            font-weight: bold;
            border-radius: 8px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            transition: 0.3s;
        }

        a:hover {
            background: #ff1a1a;
            transform: scale(1.05);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes glow {
            from {
                text-shadow: 0 0 10px #ff6b6b, 0 0 20px #ff4d4d;
            }

            to {
                text-shadow: 0 0 20px #ff4d4d, 0 0 40px #ff1a1a;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="error-code"><span>401</span></div>
        <div class="message">Oops! You are not authorized to access this page.</div>
    </div>

</body>

</html>
