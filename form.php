<link rel="stylesheet" href="styles.css">
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $dsn = 'mysql:host=localhost;dbname=git-test-V';
        $username = 'root';
        $password = '';

        $con = new PDO($dsn, $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute the insert statement
        $username = $_POST['username'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $comment = $_POST['comment'];
     

        $stmt = $con->prepare("INSERT INTO comments (username, email, address, comment, timestamp) VALUES (?, ?, ?, ?, NOW())");
        $stmt->execute([$username, $email, $address, $comment]);

        if ($stmt->rowCount() > 0) {
            // Insertion successful
            header('Location: index.php');
            exit;
        } else {
            // Insertion failed
            echo "Error: Insertion failed.";
        }

        $stmt = null;
    } catch (PDOException $e) {
        exit('データベースに接続できませんでした。Error: ' . $e->getMessage()); // Display the actual error message for debugging
    } finally {
        $con = null;
    }
}
?>

<form id="postForm" method="POST" action="index.php">
                <label for="username">Name:</label>
                <input name="username" type="text" id="username" minlength="4" maxlength="15" placeholder="ニックネーム"/><br />
                <label for="email">E-mail:</label>
                <input name="email" type="email" id="email" placeholder="メールアドレス"/><br />
                <label for="address">Address:</label>
                <input name="address" type="text" id="address" placeholder="住所を入力してください"/><br />
                <label for="comment">Comment:</label><br />
                <textarea id="comment" name="comment" placeholder="内容"></textarea>
                <input type="submit" value="Submit"  class="submit-button" id="btnSubmit">
</form>