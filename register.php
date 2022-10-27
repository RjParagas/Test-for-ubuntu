<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password], select[type=text] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=date], input[type=number]{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}


input[type=text]:focus, input[type=password]:focus, select[type=text]:focus, input[type=date]:focus, input[type=numer]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form action="registration.php" method="get">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="id"><b>ID</b></label>
    <input type="text" placeholder="Auto Generated ID" name="id" id="id" readonly>

    <label for="fname"><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="fname" id="fname" required>

    <label for="mname"><b>Middle Name</b></label>
    <input type="text" placeholder="Enter Middle Name" name="mname" id="mname">

    <label for="lname"><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="lname" id="lname" required>

    <label for="contact"><b>Contact</b></label>
    <input type="text" placeholder="Enter Contact No." name="contact" id="contact" required>

    <label for="address"><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="address" id="address" required>

    <label for="gender"><b>Gender</b></label>
    <select type="text" placeholder="Enter Password" name="gender" id="gender" required>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>

    <label for="birthday"><b>Birthday</b></label>
    <input type="date" placeholder="Enter Birthday" name="birthday" id="birthday" required>

    <label for="age"><b>Age</b></label>
    <input type="number" placeholder="Enter age" name="age" id="age" required>

    <label for="height"><b>Height</b></label>
    <input type="number" placeholder="Enter Height(cm)" name="height" id="height" required>

    <label for="weight"><b>Weight</b></label>
    <input type="number" placeholder="Enter Weight(kg)" name="weight" id="weight" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Email" name="username" id="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="welcome.php">Sign in</a>.</p>
  </div>
</form>

</body>
</html>