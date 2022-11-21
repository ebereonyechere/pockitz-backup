<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h1 class="card-title">Page Creator</h1>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <?php if(validation_errors()): ?>
                        <div class="alert alert-danger" role="alert" style="color: #721c24; background-color: #f8d7da; border-color: #f5c6cb;">
                            <?php echo validation_errors(); ?>
                        </div>
                    <?php endif; ?>

                    <?php echo form_open('page-creator/store'); ?>
                        <ul class="nav nav-pills" style="margin-bottom: 16px;">
                            <li role="presentation" class="active" id="page"><a href="javascript:void(0)" id="page" style="border-bottom: none; margin-right: 8px;">Page | </a></li>
                            <li role="presentation" id="link"><a href="javascript:void(0)" id="link" style="border-bottom: none;">Redirect to Another Link</a></li>
                        </ul>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title"
                                   placeholder="Title (English)" name="title">
                        </div>
                        <div id="pageForm">
                            <div class="form-group">
                                <label for="content">Description</label>
                                <textarea class="form-control" id="content" name="content"></textarea>
                            </div>
                        </div>
                        <div id="linkForm">
                            <input type="hidden" name="is_redirect" value="1" id="is_redirect">
                            <label for="redirect_link">Redirect Link:</label>
                            <input type="text" class="form-control" id="redirect_link"
                                   placeholder="Link to redirect to in this form (www.example.com)" name="redirect_link">
                        </div>
                        <div class="form-group">
                            <label for="is_published">Pubished</label>
                            <select class="form-control" id="is_published" name="is_published">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-bottom: 40px;">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('#linkForm').hide();
        $('#is_redirect').val(0);

        $('#link').click(function() {
            $('#pageForm').hide();
            $('#linkForm').show();
            $('#is_redirect').val(1);
            $('#pageLi').removeClass('active');
            $('#linkLi').addClass('active');
        });

        $('#page').click(function() {
            $('#linkForm').hide();
            $('#pageForm').show();
            $('#is_redirect').val(0);
            $('#linkLi').removeClass('active');
            $('#pageLi').addClass('active');
        });
    })
</script>
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content')
</script>