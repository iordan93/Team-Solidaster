<div class="well bs-component">
    <form method="post" class="form-horizontal">
        <fieldset>
            <legend>Edit category</legend>
            <div class="form-group">
                <label for="catName" class="col-lg-2 control-label">Category name</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" ID="catName" name='catName' value="<?= $category["name"] ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label for="catDescription" class="col-lg-2 control-label">Category description</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="catDescription" name='catDescription' value="<?= $category["description"] ?>" required>
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