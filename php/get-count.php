<?php
    $id = json_decode($_POST["settingData"]);

    if (!(int)$id){
        exit;
    }

    include 'connect-db.php';
    include 'create-table.php';

    $stmt = $conn->prepare("SELECT account_from, account_to, amount, trdate FROM transactions WHERE account_to=$id OR account_from=$id");
    $stmt->execute();

    $table = new Table;

    foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $k=>$transaction_date) {
        $table->logic($transaction_date, $id);
    }

    $table->logicEnd($result, $id);

    $conn = null;
?>