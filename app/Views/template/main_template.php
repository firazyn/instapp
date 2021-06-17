<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>/style.css">

    <!-- JS -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>





</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Branding Laundry -->
            <a class="navbar-brand li-head" href="<?= base_url() ?>/">InstaApp</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link li-head" href="<?= base_url() ?>/">
                        <span class="admin">Home</span>
                    </a>
                </li>
                <?php if (session()->get('role') == 1) : ?>
                    <li class="nav-item">
                        <a class="nav-link li-head" href="<?= base_url() ?>/admin">
                            <span class="admin">Administrator</span>
                        </a>
                    </li>
                <?php endif ?>
            </ul>

            <ul class="navbar-nav ml-auto">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <li class="nav-item">
                        <a class="nav-link li-head" href="<?= base_url() ?>/user">
                            <img src="<?= base_url() ?>/img/user-icons.png" alt="User">
                            <span class="user"><?= session()->get('username') ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link li-head" href="<?= base_url() ?>/auth/logout" style="font-size: 12pt;">
                            <img src="<?= base_url() ?>/img/exit.png" alt="Log Out" style="margin-top: -2px;margin-right: 5px;">
                            <span class="quit">Log out</span>
                        </a>
                    </li>
                </div>
            </ul>


        </div>
    </nav>

    <?= $this->renderSection('content'); ?>
</body>

</html>