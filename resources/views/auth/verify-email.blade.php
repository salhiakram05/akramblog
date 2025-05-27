<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Email Verification</title>
  <style>
    body {
      background-color: #f9fafb;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      color: #333;
    }
    .container {
      background-color: #fff;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      max-width: 400px;
      text-align: center;
    }
    h1 {
      color: #2c3e50;
      margin-bottom: 20px;
    }
    p {
      font-size: 1.1rem;
      margin-bottom: 30px;
      line-height: 1.5;
    }
    .btn {
      background-color: #3490dc;
      color: #fff;
      padding: 12px 25px;
      font-weight: 600;
      border-radius: 6px;
      transition: background-color 0.3s ease;
      border: none;
      cursor: pointer;
    }
    .btn:hover {
      background-color: #2779bd;
    }
    .notice {
      margin-top: 20px;
      font-size: 0.9rem;
      color: #666;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>Verify Your Email</h1>
    <p>
      Thank you for registering! We've sent you an email verification link.<br />
      Please check your inbox (or spam folder) and click the link to activate your account.
    </p>

    <form method="POST" action="{{ route('verification.send') }}">
      @csrf
      <button type="submit" class="btn">
        Resend Verification Link
      </button>
    </form>

    <div class="notice">
      If you didn’t receive the email, check your spam settings or contact us.
    </div>
  </div>

</body>
</html>
