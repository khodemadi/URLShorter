<?php
 
function func_action_submit($response_list, $user_url)
{
     $row = row_select($user_url, &quotlink_original&quot);
     if (empty($row)) {
          $row = row_insert($user_url);
          if (empty($row)) {
               $response_list['status'] = 0;
               $response_list['msg'] = &quotخطایی در هنگام ثبت داده در دیتابیس رخ داده ."
               die(show_json_message($response_list));
          } else {
               $response_list['status'] = 1;
               $response_list['msg'] = &quotآدرس مورد نظر با موفقیت ثبت گردید ."
               $response_list['data'] = json_encode(row_select($row, &quotid&quot, &quotlink_short&quot));
               die(show_json_message($response_list));
          }
     } else {
          $response_list['msg'] = &quotاین آدرس از قبل ثبت شده"
          $response_list['data'] = json_encode([&quotlink_short&quot => $row['link_short']]);
          die(show_json_message($response_list));
     }
}
 
function func_action_redirect($user_url)
{
     $url_data = row_select($user_url, &quotlink_short&quot, &quotlink_original&quot);
     $GLOBALS['is_url_correct'] = false;
     if (!empty($url_data)) {
          update_views(&quotlink_short&quot, $user_url);
 
          header(&quotLocation: {$url_data['link_original']}&quot);
          $GLOBALS['is_url_correct'] = true;
     }
}
 
function func_action_redirect_info($user_url)
{
     $url_data = row_select($user_url, &quotlink_short&quot, &quot*&quot);
     $url_data['link_original'] = urldecode($url_data['link_original']);
     $GLOBALS['is_url_correct'] = false;
     if (!empty($url_data)) {
          $GLOBALS['info_msg'] = &quot<div style=\&quotdirection: ltr;font-size:25px\&quot class=\&quotmsg success\&quot><p>{$url_data['link_original']}</p></div><table id=\&quotstatistics\&quot><tr><td>تاریخ ثبت لینک : </td><td>{$url_data['date_submitted']}</td></tr><tr><td>تاریخ آخرین ارجاع لینک : </td><td>{$url_data['date_last_view']}</td></tr><tr><td>تعداد ارجاع : </td><td>{$url_data['views']}</td></tr></table>"
          $GLOBALS['is_url_correct'] = true;
     }
}
