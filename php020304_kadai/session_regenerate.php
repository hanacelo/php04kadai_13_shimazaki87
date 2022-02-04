<?php

session_start();

$old_sessionid = session_id();

//新しいセッションIDを発行
session_regenerate_id(true);

//新しいセッションidを取得。上書きしてるんかな
$new_sessionid = session_id();

echo '古いセッション:' . $old_sessionid;
echo '<br>';
echo '新しいセッション:' . $new_sessionid;