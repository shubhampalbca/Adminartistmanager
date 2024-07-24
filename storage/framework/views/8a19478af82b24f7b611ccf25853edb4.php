

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
            background-color: #f4f4f4;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h4 {
            color: #333;
        }

        h2 {
            color: #007BFF;
            margin-top: 20px;
        }
        h3 {
      color: #fff;
    }

        p {
            font-size: 16px;
            color: #555;
        }

        strong {
            font-size: 18px;
            color: #007BFF;
        }

        .signature {
            text-align: right;
            font-style: italic;
            color: #888;
        }
        .header {
          background-color: #007bff;
          color: #fff;
          padding: 20px 0;
          text-align: center;
          border-top-left-radius: 5px;
          border-top-right-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">

                <div class="header">
                <h3>Bhajan App Services Account</h3>
               </div>
             
                <h2>Verify Your Email Address</h2>
                <p>To finish setting up your Bhajan App Service account, we just need to make sure that this email address is yours.</p>
                <p>To verify your email address, use this security code: <strong><?php echo e($mailData['otp']); ?></strong></p>
                <p>If you didn't request this code, you can safely ignore this email. Someone else might have typed your email address by mistake.</p>
                <p class="signature"><?php echo e($mailData['name']); ?></p>
            </div>
        </div>
    </div>
</body>

</html>
<?php /**PATH C:\wamp64\www\adminartimanager\resources\views/emails/demoMail.blade.php ENDPATH**/ ?>