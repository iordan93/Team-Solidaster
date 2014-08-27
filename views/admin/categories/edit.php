<div class="well bs-component">
    <form method="post" class="form-horizontal">
        <fieldset>
            <legend>Select a category to edit</legend>
            <div class="form-group">
                <select name="categoryId" id="category-id" class="form-control">
                    <?php
                    foreach ($categories as $category) {
                        echo "<option value='{$category["id"]}'>{$category["name"]}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <input type="submit" class="btn btn-primary" value="Edit category"/>
                </div>
            </div>
        </fieldset>
    </form>
</div>