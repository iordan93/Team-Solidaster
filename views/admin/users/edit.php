<div class="well bs-component">
    <form method="post" class="form-horizontal">
        <fieldset>
            <legend>Select a user to edit</legend>
            <div class="form-group">
                <select name="userId" id="user-id" class="form-control">
                    <?php
                    foreach ($users as $user) {
                        echo "<option value='{$user["id"]}'>{$user["username"]} (" . ucfirst($user["role"]) . ")</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <input type="submit" class="btn btn-primary" value="Edit user"/>
                </div>
            </div>
        </fieldset>
    </form>
</div>