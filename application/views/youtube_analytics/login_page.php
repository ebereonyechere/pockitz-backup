<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">

            </div>

            <div class="card-content">
                <div class="card-body">
                    <?php if(isset($limit_cross)) : ?>
                        <h4><div class="alert alert-danger text-center"><?php echo $limit_cross; ?></div></h4>
                    <?php else : ?>
                        <div class="text-center"><?php echo $login_button; ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</div>