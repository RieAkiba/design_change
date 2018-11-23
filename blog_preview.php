<?php

header('Content-Type: text/html; charset=UTF-8');
	// 変更すべき行
	$object = '<link rel=\"stylesheet\" type=\"text\/css\" href=\"style.css\"';
	$object2 = '<link rel="stylesheet" type="text/css" href=';

	// 変更後の値
	$value = "\"style_pre.css\">";

$html_file = fopen('index.html', 'r');

// スタイルファイルを1行ずつ読み込んで
// 変更する行が見つかったらそれを変更する
while (! feof($html_file)) {
	$line = fgets($html_file);

	// 変更する行かどうかチェック
	if (preg_match('/^'."$object".'/', $line)) {
		echo("$object2"."$value"."\n");
	} else {
		echo("$line");
	}
}
fclose($html_file);
?>
