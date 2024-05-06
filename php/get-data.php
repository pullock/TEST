<?php
    include 'connect-db.php';
    include 'create-select.php';

    $stmt = $conn->prepare("SELECT id, name FROM users");
    $stmt->execute();

    $select = new Users;

    foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $k=>$name_user) {
        $id = $name_user['id'];

        $stmt = $conn->prepare("SELECT id FROM transactions WHERE account_from=$id OR account_to=$id");
        $stmt->execute();
        
        if ($stmt->setFetchMode(PDO::FETCH_ASSOC)) {
            $select->createSelect($name_user);
        }
    }

    $conn = null;
?>