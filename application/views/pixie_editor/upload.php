<link rel="stylesheet" href="/pixie/styles.min.css?v34">
<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Upload Thumbnail</h1>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="<?= base_url('thumbnail-creator/do_upload') ?>" enctype="multipart/form-data" target="_blank">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" >Video ID
                                    </label>
                                    <input name="video_id" id="video_id" placeholder="EG. vDJOE3Zc070"  class="form-control" type="text" required />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" >Thumbnail File (max 2MB)
                                    </label>
                                    <input type="file" name="thumbnail" id="thumbnail" class="form-control-file" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Upload to Youtube</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
