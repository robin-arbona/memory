<?php

?>

<div class="container">
<form class="row justify-content-center" method="post" action="index.php?view=signup">
    <h1>Sign Up</h1>
    <div class="col-11 col-sm-10 col-md-8 col-lg-6 m-5">
        <label for="login" class="form-label">Login</label>
        <input name="login" type="text" class="form-control" id="login">
    </div>
    <div class="col-11 col-sm-10 col-md-8 col-lg-6 m-5">
        <label for="password" class="form-label">Password</label>
        <input name="password" type="password" class="form-control" id="password">
    </div>
    <button  name="submit" type="submit" class="btn btn-primary w-50">Submit</button>
</form>
</div>
