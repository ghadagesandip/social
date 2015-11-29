<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';
$fb = new Facebook\Facebook([
    'app_id' => '970301186359264',
    'app_secret' => '359529f110dc46b70494d9e0089320cf',
    'default_graph_version' => 'v2.4',
]);

$helper = $fb->getRedirectLoginHelper();
try {
    $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

if (isset($accessToken)) {
    // Logged in!
    $_SESSION['facebook_access_token'] = (string) $accessToken;
    // Now you can redirect to another page and use the
    // access token from $_SESSION['facebook_access_token']
}




//We have access token now, we can call graph api to get user data

$fb->setDefaultAccessToken($accessToken);
//911284755593703
try {
    $response = $fb->get('/me');
    $userNode = $response->getGraphUser();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}
echo 'Logged in as ' . $userNode->getName();