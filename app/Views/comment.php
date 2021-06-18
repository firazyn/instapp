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



            <!--- Posts -->
            <div class="card gedf-card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="ml-2">
                                <div class="h5 m-0">@<?= $content['username'] ?></div>
                                <div class="text-muted h7 mb-2"><i class="fa fa-clock-o"></i> <?= $content['created_at'] ?></div>
                            </div>
                        </div>
                        <div>
                            <?php if (session()->get('username') == $content['username'] || session()->get('role') == 1) : ?>
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
                        <img src="/img/pics/<?= $content['picture'] ?>" class="img-fluid img-post">
                    </div>
                    <p class="card-text">
                        <?= $content['caption'] ?>
                    </p>
                </div>
                <div class="card-footer">
                    <!-- COMMENTS -->
                    <div class="container">
                        <div class="row">
                            <div class="panel panel-default widget">
                                <div class="panel-body">
                                    <ul class="list-group">
                                        <?php foreach ($comments as $c) : ?>
                                            <li class="list-group-item">
                                                <div class="col-xs-10 col-md-11">
                                                    <div class="comment-text">
                                                        <?= $c['comment'] ?>
                                                    </div>
                                                    <div class="mic-info">
                                                        By: <?= $c['user_cmt'] ?> on <?= $c['created_at'] ?>
                                                    </div>
                                                    <div class="action">

                                                        <a href="<?= base_url() ?>/main/deleteComment/<?= $c['id'] ?>" class="btn btn-danger" onclick="return confirm ('Apakah anda yakin?');"><i class="fa fa-trash-o icon-del-team"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- COMMENTS -->
                    <form id="addComment" method="POST">
                        <div class="input-group p-2">
                            <input type="hidden" name="post_id" id="post_id" value="<?= $content['id'] ?>" />
                            <input type="hidden" name="username" id="username" value="<?= session()->get('username') ?>" />
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment" placeholder="Comment here" style="background-color: #eeeeee;border: none;font-size: 9pt;"></textarea>
                            <div class="input-group-append" style="height: 40px;width: 40px;">
                                <button class="btn btn-secondary sends" type="submit" id="submitButton"><i class="fa fa-paper-plane fa-lg" style="color: white;"></i></button>
                            </div>
                        </div>
                        <span class="text-danger" id="comment_error"></span>
                    </form>
                </div>
            </div>
            <!-- Posts -->

        </div>
    </div>
</div>

<script>
    $('#addComment').on('submit', function(event) {
        event.preventDefault();

        $.ajax({
            url: "<?= base_url(); ?>/main/saveComment",
            method: "POST",
            data: $(this).serialize(),
            dataType: "JSON",

            beforeSend: function() {
                $('#submitButton').html('<i class="fa fa-spinner fa-spin" style="color: white;"></i>');
                $('#submitButton').attr('disabled', 'disabled');
            },

            success: function(data) {
                $('#submitButton').html('<i class="fa fa-paper-plane fa-lg" style="color: white;"></i>');
                $('#submitButton').attr('disabled', false);

                if (data.error == 'yes') {
                    //
                } else {
                    setTimeout(location.reload.bind(location));
                }

            }
        })
    })
</script>

<?= $this->endSection(); ?>