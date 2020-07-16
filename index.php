<?php
session_start();
if ( !isset( $_SESSION['user_email'] ) ) {
    
} else {
    // Redirect them to the feed page
    header("Location: feed.php");
}
?>
<!DOCTYPE html>

<head>
    <title>Network</title>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js" integrity="sha512-VZ6m0F78+yo3sbu48gElK4irv2dzPoep8oo9LEjxviigcnnnNvnTOJRSrIhuFk68FMLOpiNz+T77nNY89rnWDg==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>



<body>

    <div id="app" class="app">
        <div id="formulario">
            <h1>{{message}}</h1>
            <form v-if="!formState">
                <div class="form-group">
                    <input type="email" class="form-control" name="i1" id="inputSuccess1" v-model="email" required placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="i2" required id="inputSuccess2" v-model="pass" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary" v-on:click="login(email,pass)">Login</button><br>
                Don't have an account? <a href="#" v-on:click="function(){formState = true}">Sign Up</a>
            </form>
            <form v-if="formState">
                <div class="form-group">
                    <input type="text" class="form-control" name="i2" id="inputSuccess1" v-model="username" required placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="i1" id="inputSuccess2" v-model="email" required placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="i3" required id="inputSuccess3" v-model="pass" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="i4" required id="inputSuccess4" v-model="pass2" placeholder="Repeat Password">
                </div>
                <button type="submit" class="btn btn-primary" v-on:click="register(username,email,pass,pass2)">Register</button><br>
                Already have an account? <a href="#" v-on:click="function(){formState = false}">Login</a>
            </form>
        </div>
    </div>

</body>
<script src="app.js"></script>
</html>