<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
<body>

<?php
if ($_POST['action'] == 'save') {
    // 新しいスタイルシートに置き換え
    unlink('style.css');
    copy('style_pre.css', 'style.css');
    print("<p>スタイルを変更しました。\n");
} else if ($_POST['action'] == 'cancel') {
    // 元のスタイルシートに戻す
    print("<p>スタイルを変更しませんでした。\n");
}
?>

<p>
<a href="edit_top.html">ブログに戻る</a>

</body>

</html>
