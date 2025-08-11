<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>405 Method Not Allowed</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #1f2937;
      color: #f9fafb;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .error-box {
      text-align: center;
      padding: 2rem;
      background-color: #374151;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0,0,0,0.3);
      max-width: 400px;
    }

    .error-code {
      font-size: 5rem;
      font-weight: bold;
      color: #ef4444;
    }

    .error-title {
      font-size: 1.5rem;
      margin: 1rem 0;
    }

    .error-message {
      font-size: 1rem;
      color: #d1d5db;
    }

    a {
      display: inline-block;
      margin-top: 1.5rem;
      padding: 0.6rem 1.2rem;
      background-color: #3b82f6;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      transition: background-color 0.3s;
    }

    a:hover {
      background-color: #2563eb;
    }
  </style>
</head>
<body>
  <div class="error-box">
    <div class="error-code">405</div>
    <div class="error-title">Method Not Allowed</div>
    <div class="error-message">
      The method is not allowed for the requested URL.
    </div>
  </div>
</body>
</html>
