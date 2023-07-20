<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $dsn = 'mysql:host=localhost;dbname=git-test-V';
        $username = 'root';
        $password = '';

        $con = new PDO($dsn, $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute the insert statement
        $username = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['address'];
        $comment = $_POST['comment'];

        $stmt = $con->prepare("INSERT INTO posts (user, email, address, comment) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $address, $comment]);

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