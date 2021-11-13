<?php require 'App/views/partials/header.php'; ?>
    <div class="col-md-4 offset-md-4 text-center mt-5">
        <!-- Shows error on the login form -->
        <?php 
        if (isset($_GET['result'])) {
            ?>
            <div class="alert alert-danger" role="alert"><?php echo $_GET['result'] ?></div>
            <?php
        };
        ?>
        <div class="h2">Please log in</div>
        <form action="/login" method="POST" class="was-validated">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control is-invalid" id="username" aria-describedby="emailHelp"  required>
                <div id="emailHelp" class="form-text">Enter your email or username.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Submit</button>
        </form>
    </div>

<?php require 'App/views/partials/footer.php'; ?>