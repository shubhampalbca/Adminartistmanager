<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Verify Email</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
    }

    .container {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin: 30px auto;
      max-width: 600px;
    }

    .header {
      background-color: #007bff;
      color: #fff;
      padding: 20px 0;
      text-align: center;
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
    }

    h2 {
      color: #fff;
    }

    p {
      color: #333;
      margin: 10px 0;
    }

    .text-right {
      text-align: right;
    }

  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-lg-12">
        <div class="header">
          <h2>Verify Your Email Address</h2>
        </div>
      
        <p>User Id: {{ $successData['id'] }}</p>
        <p>Name: {{ $successData['name'] }}</p>
        <p>Email: {{ $successData['email'] }}</p>
     
        <p>Thank you for registering for the  Bhajan App...</p>
        <p class="text-right">Registration successful!</p>

      </div>
    </div>
  </div>
</body>

</html>
