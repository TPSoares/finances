<div class="container">
    <div class="row justify-content-center">
        <div class="col-4">
            <form method="POST" action="<?php echo BASE_URL; ?>dashboard">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
            <a href="<?php echo BASE_URL; ?>signup" class="btn btn-secondary">Sign up</a>

            </form>
        </div>
    </div>
</div>