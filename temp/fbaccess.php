<?php
$appID = '614314851936784';
$appSecret = 'd22eb210cf1930ad09da5276fbf7f19a';

require("facebook-sdk/src/facebook.php");

$facebook = new Facebook(array(
    'appId' => $appID,
    'secret' => $appSecret,
));
$user = $facebook->getUser();
if($user){
    try{
        // Proceed knowing you have a logged in user who's authenticated.
        $user_profile = $facebook->api('/me');
    }catch(FacebookApiException $e){
        error_log($e);
        $user = NULL;
    }
}

if($user){
    // Get logout URL
    $logoutUrl = $facebook->getLogoutUrl();
}
else{
    // Get login URL
    $loginUrl = $facebook->getLoginUrl(array(
        'scope'		=> 'publish_stream, email',
    ));
}

if($user){
    $queries = array(
        array('method' => 'GET', 'relative_url' => '/'.$user),
        array('method' => 'GET', 'relative_url' => '/'.$user.'/email')
    );

    // POST your queries to the batch endpoint on the graph.
    try{
        $batchResponse = $facebook->api('?batch='.json_encode($queries), 'POST');
    }catch(Exception $o){
        error_log($o);
    }

    //Return values are indexed in order of the original array, content is in ['body'] as a JSON
    //string. Decode for use as a PHP array.
    $user_info		= json_decode($batchResponse[0]['body'], TRUE);
    $email			= json_decode($batchResponse[1]['body'], TRUE);

    // Update user's status using graph api
    /*
    if(isset($_POST['publish'])){
        try{
            $publishStream = $facebook->api("/$user/feed", 'post', array(
                'message'		=> 'Check out 25 labs',
                'link'			=> 'http://25labs.com',
                'picture'		=> 'http://25labs.com/images/25-labs-160-160.jpg',
                'name'			=> '25 labs',
                'caption'		=> '25labs.com',
                'description'		=> 'A Technology Laboratory. Highly Recomented technology blog.',
            ));
        }catch(FacebookApiException $e){
            error_log($e);
        }
    }

    // Update user's status using graph api
    if(isset($_POST['status'])){
        try{
            $statusUpdate = $facebook->api("/$user/feed", 'post', array('message'=> $_POST['status']));
        }catch(FacebookApiException $e){
            error_log($e);
        }
    }
    */
}
?>