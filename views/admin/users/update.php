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
                    <select>
                        <option value="admin" selected="<?= $user["role"] == "user" ? "selected" : "" ?>">User</option>
                        <option value="admin" selected="<?= $user["role"] == "admin" ? "selected" : "" ?>">Admin</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <input type="submit" class="btn btn-primary" value="Edit category"/>
                </div>
            </div>
        </fieldset>
    </form>
</div>