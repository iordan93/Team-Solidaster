<div class="jumbotron">
    <form method="post">
        <fieldset>
            <legend>Add Answer:</legend>
            <textarea rows="15" name="answerText" class="col-sm-11"></textarea>
        </fieldset>
        &nbsp;

        <fieldset>
            <div class="form-group col-sm-12 row-lg-offset-2">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-default"
                   href="<?= ABS_ROOT_URL ?>questions/details/<?= $question["id"] ?>">Cancel</a>
            </div>
        </fieldset>
    </form>
</div>