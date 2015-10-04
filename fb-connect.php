<?php
    session_start();
    require_once __DIR__ . '/vendor/autoload.php';
    $fb = new Facebook\Facebook([
        'app_id' => '970301186359264',
        'app_secret' => '359529f110dc46b70494d9e0089320cf',
        'default_graph_version' => 'v2.4',
    ]);

    $helper = $fb->getRedirectLoginHelper();

    $permissions = ['email', 'user_likes']; // Optional permissions
    $loginUrl = $helper->getLoginUrl('http://localhost/social/login-callback.php', $permissions);




?>
<html>
    <head>
        <title>FB Login</title>
    </head>
    <body>hello
        <?php
            echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
        ?>
    </body>
</html>
