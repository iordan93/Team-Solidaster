<div class="well bs-component">
    <form method="post" class="form-horizontal">
        <fieldset>
            <legend>New question</legend>
            <div class="form-group">
                <label for="title" class="col-lg-2 control-label">Title</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                </div>
            </div>
            <div class="form-group">
                <label for="content" class="col-lg-2 control-label">Content</label>
                <div class="col-lg-10">
                    <textarea rows="15" class="form-control" id="content" name="content" placeholder="Content"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="categoryId" class="col-lg-2 control-label"">Category</label>
                <div class="col-lg-10">
                    <select class="form-control" name="categoryId" id="categoryId">
                        <?php
                        foreach($categories as $category) {
                            echo "<option value='{$category["id"]}'>{$category["name"]}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="tags" class="col-lg-2 control-label">Tags</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="tags" name="tags" placeholder="Tags" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <input type="submit" class="btn btn-primary" value="Ask question"/>
                </div>
            </div>
        </fieldset>
    </form>
</div>