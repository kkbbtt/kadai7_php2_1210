<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>クボシュラン・ガイド</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
    div {
            padding: 10px;
            font-size: 16px;
        }
    .top-bar {
            background-color: #d7003a ;
            color: #ffffff ;
        }
    div.c {
            background-color: #dd4814;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <form method="post" action="insert.php">
        <div>
        <img src="img/bib-michelin-man-footer.svg" style="float: left; width:150px; padding:10px 25px 0px 0px; ">
        <fieldset style="color:#000000 ;" >
                <legend>レストラン情報の登録</legend>
                <label>店　　名：<input type="text" name="name"></label><br>
                <label>ジャンル：<input type="text" name="genre"></label><br>
                <label>点　　数：<input type="text" name="point"></label><br>
                ▼コメント<br>
                <label><textArea name="comment" rows="7" cols="80"></textArea></label><br>
                <input type="submit" value="送信">
        </fieldset>
        </div>
    </form>
</body>

</html>
