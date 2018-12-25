# design_change
2017年 情報メディア特別演習 (GC27102) で作成したCSS更新によるデザイン変更Webインターフェース
[古瀬一隆](http://wombat.cc.tsukuba.ac.jp/~furuse/)先生にアドバイザー教員になっていただいた

 - CSSの知識がなくてもWebサイトのデザインを変更できる
 - 編集ページで項目を選択するとプレビューが更新される
 - 視覚的にデザインの変更ができる
 - 編集TOPページ : edit_style.php
## 工夫点
 - [js.color](http://jscolor.com/)を使用
 - [デザインテンプレート](http://www.coolwebwindow.com/)を使用
 - JavaScriptを使用して非同期通信することで、ページ全体をリロードせずにインラインフレーム内だけリロードするようにした点
 - 編集したい場所ごとにフォームをタブでわけた点
 
 ## 参照
 edit_style.php内のイベントハンドラの登録は以下を参照した
 - [https://qiita.com/sirone/items/412b2a171dccb11e1bb6](https://qiita.com/sirone/items/412b2a171dccb11e1bb6)
