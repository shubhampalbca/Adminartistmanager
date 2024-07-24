
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
        @import 'https://static.stayjapan.com/assets/dashboard/application-33c1a06b7784b53cd746d479718b6295c0fcefebb696e78dcee7c68efc92fada.css';
 .horizontal-container {
     margin: 0 auto;
     width: 100%;
    /* Create circle */
    /* Create line */
    /* Custom progress bar */
}
 @media (min-width: 768px) {
     .horizontal-container {
         width: 500px;
    }
}

 .horizontal-container .horizontal-form-box {
     background-color:#9685850a;
     border: 1px solid #e5e5e5;
     height: 466px;
     padding: 30px;
}
 .horizontal-container .horizontal-form-box .horizontal-info-container img {
     height: 120px;
/*   margin-bottom: 20px;*/
     width: 40%;
}
 .horizontal-container .horizontal-form-box .horizontal-info-container .horizontal-heading {
     color: #000;
     font-size: 22px;
     font-weight: bold;
     text-transform: capitalize;
}
 .horizontal-container .horizontal-form-box .horizontal-info-container .horizontal-subtitle {
     letter-spacing: 1px;
     margin-bottom: 20px;
     text-align: left;
}
 .horizontal-container .horizontal-form-box .horizontal-form label, .horizontal-container .horizontal-form-box .horizontal-form button {
     text-transform: capitalize;
}
 .horizontal-container .horizontal-form-box .horizontal-form label {
     color: #000;
     font-weight:600;
}
.o3-btn-primary {
    background-color: #f7941d;
    border-color: #f7941d;
    color: white;
}
.o3-btn-primary:hover {
    background-color: #f7941d;
    border-color: #f7941d;
    color: white;
}
 
    </style>
</head>
<body>
    <div class="container" style="margin-top: 40px;">
  <div class="row">
    <div class="col-sm-12">
      <div class="horizontal-container">
        
        <div class="horizontal-form-box">
          <div class="horizontal-info-container text-center">
            <img src="{{asset('resume/logo.png')}}" />
            <p class="horizontal-heading">Reset your password</p>
            <p>Forgot your password ,Reset your password please <a href="{{ $data['url'] }}">click here</a></p>
           
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>



