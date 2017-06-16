<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>CRUD</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"
          integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
          crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#insert-user').submit(function(ev) {
        // Stop the browser from submitting the form.
        ev.preventDefault();

        var payload = $(this).serialize();

        var crudRequest = $.ajax({
          type: "POST",
          url: "insert.php",
          dataType: "json", // what the server will return
          data: payload
        });
        crudRequest.done(function(data){ // done is alternative to success
          console.log('Request finished', data);
        });
        crudRequest.fail(function(jqXHR, textStatus, errorThrown){
          console.log( "Something went wrong (" + textStatus + errorThrown + ")." );
        });



      });
    });
  </script>
</head>
<body>
  <div class="wrap">
    <main role="main">
      <form id="insert-user">
        <label for="fname">First name: </label>
        <input type="text" name="fname" id="fname"><br>

        <label for="lname">Last name: </label>
        <input type="text" name="lname" id="lname"><br>

        <label for="uname">Username: </label>
        <input type="text" name="uname" id="uname"><br>

        <label for="email">Email: </label>
        <input type="text" name="email" id="email"><br>

        <label for="pswd">Password: </label>
        <input type="text" name="pswd" id="pswd"><br>

        <input type="submit" value="Submit">
      </form>
    </main>
  </div>
</body>
</html>
