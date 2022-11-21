<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Edit <?php echo $page->title ?></h1>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <?php if(validation_errors()): ?>
                        <div class="alert alert-danger" role="alert" style="color: #721c24; background-color: #f8d7da; border-color: #f5c6cb;">
                            <?php echo validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <?php $action = "page-creator/{$page->slug}/update" ?>
                    <?php echo form_open($action); ?>
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title"
                               placeholder="Title (English)" name="title" value="<?= $page->title ?>">
                    </div>
                    <?php if($page->is_redirect == 0): ?>
                        <div id="pageForm">
                            <div class="form-group">
                                <label for="content">Description</label>
                                <textarea class="form-control" id="content" name="content"><?= $page->content ?></textarea>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if($page->is_redirect == 1): ?>
                        <div id="linkForm">
                            <input type="hidden" name="is_redirect" value="1" id="is_redirect">
                            <label for="redirect_link">Redirect Link:</label>
                            <input type="text" class="form-control" id="redirect_link"
                                   placeholder="Link to redirect to in this form (www.example.com)" name="redirect_link" value="<?= $page->redirect_link ?>">
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="is_published">Pubished</label>
                        <select class="form-control" id="is_published" name="is_published">
                            <?php
                            if($page->is_published == 1) $pulished
                            ?>
                            <option value="1" <?php if($page->is_published == 1): ?> selected <?php endif; ?>>Yes</option>
                            <option value="0" <?php if($page->is_published == 0): ?> selected <?php endif; ?>>No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-bottom: 40px;">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content')
</script>