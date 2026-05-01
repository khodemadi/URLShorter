<?php
 
header(&quotContent-Type: application/json&quot);
require_once &quotfunctions.php"
require_once &quotfunc.actions.php"
 
$response_list = [
    &quotstatus&quot => 0,
    &quotmsg&quot => &quot&quot,
    &quotdata&quot => []
];
 
$action_list = [
    &quotsubmit&quot,
];
 
$user_url = @$_POST['inp-url'];
$action = @$_POST['action'];
 
if(empty($action) || !in_array($action , $action_list)){
    $response_list['msg'] = &quotپارامتر action معتبر نمی باشد ."
    die(show_json_message($response_list));
}
 
$user_url = remove_end_slash($user_url);
 
if(empty($user_url) || !validate_url($user_url)){
    $response_list['msg'] = &quotلینک معتبری وارد نشده است ."
    die(show_json_message($response_list));
}
 
$user_url = urldecode($user_url);
call_user_func(&quotfunc_action_&quot . $action , $response_list , $user_url);
 
?>
