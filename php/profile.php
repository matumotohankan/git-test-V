<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Git/PHP/SQL test assignment</title>
</head>
<body>
    <h1>Git・PHP・SQL テスト課題</h1>
    <div class ="container">
        <section class="container-profile">
        <div class="container-profile-photo">
          <img src="../images/img_e9c1455da650b345b11e216d4f018093245490.jpg">
        </div><!-- container-profile-photo -->
        <div class="container-profile-text">
          <p>名前：松本 ハンカンdwhfjhasj</p>
          <p></p>
        </div><!-- container-profile-text -->
</div>

        </section><!-- container-profile -->
        <section class="container-form">

        <form action="process_form.php" method="post">
        <label for="name">名前:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">メールアドレス:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="message">お問い合わせ内容:</label><br>
        <textarea id="message" name="message" rows="4" required></textarea><br>

        <input type="submit" value="送信">
    </form>

    <?php

// データベース接続情報を設定
$servername = "localhost"; // 例: localhost
$username = "root"; // 例: root
$password = "";
$dbname = "git-toiawase";

// データベースに接続
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続エラーの確認
if ($conn->connect_error) {
    die("データベース接続エラー: " . $conn->connect_error);
}



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // フォームから送信されたデータを取得
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // データベースにデータを挿入するクエリを作成
    $sql = "INSERT INTO contact_form (name, email, message) VALUES ('$name', '$email', '$message')";

    // クエリを実行してデータをデータベースに挿入
    if ($conn->query($sql) === TRUE) {
        // データの挿入に成功した場合の処理（例：完了ページへのリダイレクトなど）
        header("Location: thank_you.php");
        exit;
    } else {
        // データの挿入に失敗した場合の処理（例：エラーメッセージの表示など）
        echo "データの挿入に失敗しました。" . $conn->error;
    }
}

// データベース接続を閉じる
$conn->close();
?>
</body>
</html>