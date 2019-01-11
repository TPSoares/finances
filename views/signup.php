<div class="container wrapper">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <form method="POST" action="<?php echo BASE_URL; ?>signup/create">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="nome" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-success">Register</button>
            <a href="<?php echo BASE_URL; ?>" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
</div>