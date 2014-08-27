<div class="well bs-component">
    <form method="post" class="form-horizontal">
        <fieldset>
            <legend>Select a tag to edit</legend>
            <div class="form-group">
                <select name="tagId" id="tag-id" class="form-control">
                    <?php
                    foreach ($tags as $tag) {
                        echo "<option value='{$tag["id"]}'>{$tag["name"]}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <input type="submit" class="btn btn-primary" value="Edit tag"/>
                </div>
            </div>
        </fieldset>
    </form>
</div>