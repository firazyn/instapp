<?= $this->extend('template/main_template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid gedf-wrapper">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="mr-2">
                        <h5>@<?= session()->get('username') ?></h5>
                        <div class="h7" text-muted><?= session()->get('fullname') ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 gedf-main">



            <!--- Upload Post-->
            <div class="card gedf-card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                            <form action="<?= base_url() ?>/main/uploadPost" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div col-sm-2 margin-bottom="75%">
                                        <img class="img-fluid img-preview">
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?= ($validation->hasError('picture')) ? 'is-invalid' : ''; ?>" id="picture" name="picture" onchange="previews()">
                                        <div class="invalid-feedback">
                                            <?= ($validation->getError('picture')); ?>
                                        </div>
                                        <label class="custom-file-label" for="picture">Upload image</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control <?= ($validation->hasError('caption')) ? 'is-invalid' : ''; ?>" id="caption" name="caption" rows="3" placeholder="What are you thinking?"></textarea>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('caption')); ?>
                                    </div>
                                </div>
                                <div class="btn-toolbar justify-content-between">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-primary">Post</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Upload Post -->

            <?php foreach ($pics as $p) : ?>

                <!--- Posts -->
                <div class="card gedf-card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="ml-2">
                                    <div class="h5 m-0">@<?= $p['username'] ?></div>
                                    <div class="text-muted h7 mb-2"><i class="fa fa-clock-o"></i> <?= $p['created_at'] ?></div>
                                </div>
                            </div>
                            <div>
                                <?php if (session()->get('username') == $p['username'] || session()->get('role') == 1) : ?>
                                    <div class="dropdown">
                                        <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                            <div class="h6 dropdown-header">Options</div>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div col-sm-2>
                            <img src="/img/pics/<?= $p['picture'] ?>" class="img-fluid">
                        </div>
                        <p class="card-text">
                            <?= $p['caption'] ?>
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
                        <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                        <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
                    </div>
                </div>
                <!-- Posts -->

            <?php endforeach ?>

        </div>
    </div>
</div>

<script>
    function previews() {
        const picture = document.querySelector('#picture');
        const preview = document.querySelector('.img-preview');
        const pictureName = document.querySelector('.custom-file-label');

        pictureName.textContent = picture.files[0].name;

        const filePic = new FileReader();
        filePic.readAsDataURL(picture.files[0]);

        filePic.onload = function(e) {
            preview.src = e.target.result;
        }
    }
</script>

<?= $this->endSection(); ?>