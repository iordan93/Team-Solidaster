<div class="well bs-component">
    <form method="post" class="form-horizontal">
        <fieldset>
            <legend>Add question</legend>
            <div class="form-group">
                <div class="col-lg-10">
                    <input type="text" class="form-control"  name='title' placeholder="Title" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10">
                    <textarea  class="form-control"  name='text' placeholder="Ask question.." required ></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 ">
                    <input type="text" class="form-control" name="tag" placeholder="Add tag" required/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10">
                    <select name="category" class="form-control">
                        <option value="" selected disabled>Category</option>
                        <option value="1">Computer networking</option>
                        <option value="2">Software</option>
                        <option value="3">Internet</option>
                        <option value="4">Security</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <input type="submit" class="btn btn-primary" value="Add question"/>
                </div>
            </div>
        </fieldset>
    </form>
</div>