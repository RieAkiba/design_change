<?php

header('Content-Type: text/html; charset=UTF-8');

$place = $_POST['place'];
$item = $_POST['item'];
$value = $_POST['val'];
$object = "$place"." { "."$item".": ";

// ログファイルの用意
$log = 'change_style.log';

if(!file_exists($log)){
    touch($log);
    chmod($log, 0666);
}

$log_file = fopen($log, 'a+');

// ログファイルに記録
fputs($log_file, "place: $place\n");
fputs($log_file, "item: $item\n");
fputs($log_file, "value: $value\n");
fputs($log_file, "object: $object\n\n");

// 新しい空のスタイルファイルの作成
if (file_exists('style_pre.css.new')){
	unlink('style_pre.css.new');
}
touch('style_pre.css.new');
chmod('style_pre.css.new', 0666);

// 新旧スタイルファイルのオープン
$old_file = fopen('style_pre.css', 'r');
$new_file = fopen('style_pre.css.new', 'a+');

// スタイルファイルを1行ずつ読み込んで
// 変更する行が見つかったらそれを変更する
while (! feof($old_file)) {
    $line = fgets($old_file);

    // 変更する行かどうかチェック
    if (preg_match('/^'."$object".'/', $line)) {
		fputs($new_file, "$object"."$value"."; }\n");
    } else {
        fputs($new_file, $line);
    }
}

// スタイルファイルのクローズ
fclose($old_file);
fclose($new_file);

// スタイルファイルの置き換え
unlink('style_pre.css');
rename('style_pre.css.new', 'style_pre.css');

// ログファイルのクローズ
fclose($log_file);
?>
