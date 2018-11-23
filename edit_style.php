<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="edit_style.css" />
<script type="text/javascript">
var xhr = new XMLHttpRequest();

// ハンドラの登録
xhr.onreadystatechange = function() {
    switch (xhr.readyState) {
        case 0:
            // 未初期化状態.
            console.log('uninitialized!');
            break;
        case 1: // データ送信中.
            console.log('loading...');
            break;
        case 2: // 応答待ち.
            console.log('loaded.');
            break;
        case 3: // データ受信中.
            console.log('interactive... '+xhr.responseText.length+' bytes.');
            break;
        case 4: // データ受信完了.
            if(xhr.status == 200 || xhr.status == 304) {
                var data = xhr.responseText; // responseXML もあり
                console.log('COMPLETE! :'+data);
            } else {
                console.log('Failed. HttpStatus: '+xhr.statusText);
            }
            break;
    }
};

// スタイルの変更
var change_style = function(place, item, val) {
    console.log(place + item + val);

    xhr.open('POST', 'change_style.php', false);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('place=' + place + '&item=' + item + '&val=' + val);
    xhr.abort();

    reload_iframe();
};
// iframeのりロード
var reload_iframe = function() {
    document.getElementById("blog_frame").contentWindow.location.reload();
};

</script>

</head>

<body>

<!--  編集前のスタイルファイルを別名で保存 -->
<?php
$file = 'style.css';
$prev_file = 'style_pre.css';
system('chmod 0666 edit_style.php');

if (!copy($file, $prev_file)){
    echo "スタイルファイルのコピーに失敗しました。\n";
}

//chmod('blog_style_pre.css', 0666);
?>
<script src="jscolor.js"></script>
<div class="tabs">
    <input id="header" type="radio" name="tab_item" checked>
    <label class="tab_item" for="header">ヘッダー</label>
    <input id="menu" type="radio" name="tab_item">
    <label class="tab_item" for="menu">メニュー</label>
    <input id="all" type="radio" name="tab_item">
    <label class="tab_item" for="all">本文</label>
	<!-- ヘッダーの中身 -->
	<div class="tab_content" id="header_content">
	<div class="tab_content_description">
	<p class="c-txtsp">
			<p><h3>サイトロゴ</h3>
	文字サイズ <input type="number" style="width: 40px;" onchange="change_style('#header h1','font-size',this.value+'px')" min="10" value="24"> 文字色 <input class="jscolor" onchange="change_style('#header h1 a','color','#'+this.jscolor)" value="#000000">
</p><p>
	<p><h3>説明文</h3>
	文字サイズ <input type="number" style="width: 40px;" onchange="change_style('#header #pr p','font-size',this.value+'px')" min="10" value="11"> 文字色 <input class="jscolor" onchange="change_style('#header #pr p','color','#'+this.jscolor)" value="#000000">
</p>
</p>
	</div>
	</div>
	<!-- メニューの中身 -->
	<div class="tab_content" id="menu_content">
	<div class="tab_content_description">
	<p class="c-txtsp">
		<p><h3>トップメニュー</h3>
	背景色 <input class="jscolor" onchange="change_style('#menu li a','background','#'+this.jscolor)" value="#969696"> 文字色 <input class="jscolor" onchange="change_style('#menu li a','color','#'+this.jscolor)" value="#ffffff"><br>
角丸 <input type="radio" onchange="change_style('#menu li a','border-radius','15px 15px 15px 15px')" name="carved" checked="checked"> あり <input type="radio" onchange="change_style('#menu li a','border-radius','0px 0px 0px 0px')" name="carved"> なし<br>
	マウスオーバー時背景色 <input class="jscolor" onchange="change_style('#menu li a:hover','background','#'+this.jscolor)" value="#969696"> 文字色 <input class="jscolor" onchange="change_style('#menu li a:hover','color','#'+this.jscolor)" value="#ffffff"><br>
	アクティブページ背景色 <input class="jscolor" onchange="change_style('#menu li a.active','background','#'+this.jscolor)" value="#969696"> 文字色 <input class="jscolor" onchange="change_style('#menu li a.active','color','#'+this.jscolor)" value="#ffffff"><br></p>
	<p><h3>サブメニュー</h3>
	タイトル色 <input class="jscolor" onchange="change_style('#sub h3','background','#'+this.jscolor);change_style('#sub li a:hover','border-left','5px solid #'+this.jscolor)" value="#969696"> タイトル文字色 <input class="jscolor" onchange="change_style('#sub h3','color','#'+this.jscolor)" value="#ffffff"><br>
	背景色 <input class="jscolor" onchange="change_style('#sub li','background','#'+this.jscolor)" value="#ffffff"> 文字色 <input class="jscolor" onchange="change_style('#sub li a','color','#'+this.jscolor)" value="#292929"><br>
</p>
	</p>
	</div>
	</div>
	<!-- 本文の中身 -->
	<div class="tab_content" id="all_content">
	<div class="tab_content_description">
	<p class="c-txtsp">
		<p><h3>見出し1</h3>
	タイプ1 <input type="radio" onchange="change_style('#main h2','border-left','0px solid #0089a1');change_style('#main h2','border-bottom','3px double #999')" name="midasi1" checked="checked"> タイプ2 <input type="radio" onchange="change_style('#main h2','border-left','5px solid #0089a1');change_style('#main h2','border-bottom','1px dotted #999')" name="midasi1"><br>
	文字サイズ <input type="number" style="width: 40px;" onchange="change_style('#main h2','font-size',this.value+'px')" min="10" value="16"> 文字色 <input class="jscolor" onchange="change_style('#main h2','color','#'+this.jscolor)" value="#292929"><br>
		<h3>見出し2</h3>
	タイプ1 <input type="radio" onchange="change_style('#main h3','border-left','0px solid #0089a1');change_style('#main h3','border-bottom','3px double #999')" name="midasi2"> タイプ2 <input type="radio" onchange="change_style('#main h3','border-left','5px solid #0089a1');change_style('#main h3','border-bottom','1px dotted #999')" name="midasi2" checked="checked"><br>
	文字サイズ <input type="number" style="width: 40px;" onchange="change_style('#main h3','font-size',this.value+'px')" min="10" value="16"> 文字色 <input class="jscolor" onchange="change_style('#main h3','color','#'+this.jscolor)" value="#292929"><br>
		</p>
		<p><h3>本文</h3>
		リンク色 <input class="jscolor" onchange="change_style('#main a','color','#'+this.jscolor)" value="#008888"><br></p>
	</p>
	</div>
	</div>

<p>
<form action="save_style.php" method="post">

<center>
    <button type="submit" name="action" value="save">適用</button>
    <button type="submit" name="action" value="cancel">キャンセル</button>
</center>
</form>

<!-- ブログ本体-->
<iframe src="blog_preview.php" id="blog_frame" width="100%" height="90%">iframe未対応？</iframe>

</body>
</html>
