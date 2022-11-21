<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h1 class="card-title">Page Creator</h1>
                <a href="<?= base_url('page-creator/create') ?>" class="btn btn-success">Create New</a>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <ul class="list-group">
                        <?php foreach($pages as $page): ?>
                            <li class="list-group-item"><?= $page->title ?>
                                <div style="float: right;">
                                    <a href="/pages/<?= $page->slug ?>" class="btn btn-success btn-sm" style="margin-right: 8px;"><span class="glyphicon glyphicon-eye-open"></span> View</a>
                                    <a href="/page-creator/<?= $page->slug ?>/edit" class="btn btn-info btn-sm" style="margin-right: 8px;"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                    <a href="/page-creator/<?= $page->slug ?>/delete" class="btn btn-danger btn-sm" style="margin-right: 8px;"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                </div>

                                <div style="clear: both;"></div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content')
</script>