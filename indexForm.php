<!DOCTYPE html>
<html>
<body>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

 
<div class="container">
  <h2>Substance Database</h2>
  <div class="panel panel-default">
  </div>
</div>

<div class="container">
  <form action="/database.php">
    <div class="form-group">
      <label for="email">Please enter a EC or CAS identifier:</label>
      <input type="text" class="form-control" id ="identifier" placeholder="EC or CAS identifier" name="name">
    </div>
    <button type="submit" class="btn btn-default">Search</button>
  </form>
</div>


</body>
</html>



