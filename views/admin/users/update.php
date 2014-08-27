<div class="well bs-component">
    <form method="post" class="form-horizontal">
        <fieldset>
            <legend>Edit user</legend>

            <div class="form-group">
                <label for="username" class="col-lg-2 control-label">Username</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="username" name='username' value="<?= $user["username"] ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                    <input type="email" class="form-control" id="email" name='email' value="<?= $user["email"] ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="role" class="col-lg-2 control-label">Role</label>
                <div class="col-lg-10">
                    <select class="form-control" name="role">
                        <option value="admin" <?= $user["role"] == "admin" ? "selected" : "" ?>>Admin</option>
                        <option value="user" <?= $user["role"] == "user" ? "selected" : "" ?>>User</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <input type="submit" class="btn btn-primary" value="Edit user"/>
                </div>
            </div>
        </fieldset>
    </form>
</div>