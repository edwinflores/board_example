<h2><font style="font-size: 40px">Registration Page</font></h2>

<?php if ($user->hasError()): ?>
    <div class="alert alert-block">
        <h4 class="alert-heading">Validation error</h4>

        <?php if ($user->validation_errors['username']['length']): ?>
            <div>
                <em>Username</em> must be between
                <?php encode_string($user->validation['username']['length'][1]) ?> and
                <?php encode_string($user->validation['username']['length'][2]) ?> characters in length.
            </div>
        <?php endif ?>

        <?php if ($user->validation_errors['password']['length']): ?>
            <div>
                <em>Password</em> must be between
                <?php encode_string($user->validation['password']['length'][1]) ?>
                and
                <?php encode_string($user->validation['password']['length'][2]) ?>.
            </div>
        <?php endif ?>

        <?php if ($user->validation_errors['username']['duplicate']): ?>
            <div>
                The username
                <em><?php encode_string($user->username) ?></em>
                is already registered, please use another.
            </div>
        <?php endif ?>

        <?php if ($user->validation_errors['email']['duplicate']): ?>
            <div>
                The email address 
                <em><?php encode_string($user->email) ?></em>
                is already used.
            </div>
        <?php endif ?>

        <?php if ($user->validation_errors['username']['format']): ?>
            <div>
               Username must be alphanumeric characters only.
            </div>
        <?php endif ?>
    </div>
<?php endif ?>

<form class="well" method="POST" action="<?php encode_string(url('user/register')) ?>">
    <label><font style="font-size: 18px">Username:</font></label>
    <input type="text" class="span3" name="username" required><br />

    <label><font style="font-size: 18px">Password:</font></label>
    <input type="password" class="span3" name="password" required><br />

    <label><font style="font-size: 18px">Email Address:</font></label>
    <input type="email" class="span3" name="email" required><br />

    <input type="hidden" name="page_next" value="register_end">
    <button type="submit" class="btn btn-primary">Register</button>
</form>

<div>
    <em><font style="font-size: 15px">If you already have an account, log-in here:</font></em><br />
    <a class="btn btn-danger" href="<?php encode_string(url('user/login')) ?>">Login</a>
</div>