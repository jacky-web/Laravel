<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>vendor registration</h2>
  <form action="{{ route('vendor.form.submit') }}">
    <div class="form-group">
      <label for="Company Name">Company Name</label>
      <input type="text" class="form-control" placeholder="Enter company name" name="company_name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="contact email" name="contact_email">
    </div>
    <div class="form-group">
      <label for="pwd">Name</label>
      <input type="password" class="form-control" placeholder="Enter Name" name="name">
    </div>
     <div class="form-group">
      <label for="email">mail for qr</label>
      <input type="email" class="form-control"  placeholder="email for qr" name="mail_qr">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</body>
</html>
