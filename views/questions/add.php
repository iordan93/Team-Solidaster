<form method="post">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" />
    <label for="content">Content</label>
    <textarea rows="10" name="content" id="content"></textarea>
    <select name="categoryId">
        <?php
        foreach($categories as $category) {
            echo "<option value='{$category["id"]}'>{$category["name"]}</option>";
        }
        ?>
    </select>
    <label for="tags">Tags</label>
    <input type="text" name="tags" id="tags">
    <input type="submit" value="Ask question"/>
</form>