<link rel="stylesheet" href="styles.css">
<table>
<tr class="table-head">
    <th>Id</th>
    <th>Username</th>
    <th>E-mail</th>
    <th>Address</th>
    <th>Comment</th>
    <th>Timestamp</th>
    
</tr>
<?php
    try {
        $dsn = 'mysql:host=localhost;dbname=git-test-V';
        $username = 'root';
        $password = '';

        $con = new PDO($dsn, $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $con->query('SELECT * FROM comments ORDER BY id DESC LIMIT 15');
        if (!$stmt) {
            exit('クエリの実行に失敗しました。');
        }

        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $data['id'];

            echo '<tr><td>'. $id . '</td>';
            echo '<td>' . $data['username'] . '</td><td>' . $data['email'] . '</td><td> '. $data['address'] .'</td><td>' . $data['comment'] . '</td>';
            echo '<td>' . $data['timestamp'] . '</td>';
            echo '</tr>';
        }
        } catch(PDOException $e) {
        exit('データベースに接続できませんでした。');
         }

        $con = null;
        ?>
</table>
