<div class="well bs-component">
    <form method="post" class="form-horizontal">
        <fieldset>
            <legend>Edit tag</legend>
            <div class="form-group">
                <label for="tagName" class="col-lg-2 control-label">Tag name</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="tagName" name='tagName' value="<?= $tag["name"] ?>" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <input type="submit" class="btn btn-primary" value="Edit tag"/>
                </div>
            </div>
        </fieldset>
    </form>
</div>