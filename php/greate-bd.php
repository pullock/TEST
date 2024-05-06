<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test_db";

    $conn = new PDO("mysql:host=$servername;", $username, $password);

    $sql = "CREATE DATABASE if not exists test_db";
    $conn->exec($sql);

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $sql = "CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) unsigned NOT NULL,
    `name` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
    ) DEFAULT CHARSET=utf8";
    $conn->exec($sql);
    
    $sql = "CREATE TABLE IF NOT EXISTS `user_accounts` (
    `id` int(11) unsigned NOT NULL,
    `user_id` int(11) unsigned NOT NULL,
    PRIMARY KEY (`id`)
    ) DEFAULT CHARSET=utf8";
    $conn->exec($sql);
    
    $sql = "CREATE TABLE IF NOT EXISTS `transactions` (
    `id` int(11) unsigned NOT NULL,
    `account_from` int(11) unsigned NOT NULL,
    `account_to` int(11) unsigned NOT NULL,
    `amount` decimal(5,2) unsigned NOT NULL,
    `trdate` datetime NOT NULL,
    PRIMARY KEY (`id`),
    KEY `account_from` (`account_from`),
    KEY `account_to` (`account_to`)
    ) DEFAULT CHARSET=utf8";
    $conn->exec($sql);
    
    $sql = "INSERT INTO `users` (`id`,`name`)
    VALUES
    (10, 'Alice'),
    (11, 'Bob'),
    (12, 'Tom'),
    (13, 'Mike'),
    (14, 'Kate'),
    (15, 'Jerry')";
    $conn->exec($sql);
    
    $sql = "INSERT INTO `user_accounts` (`id`,`user_id`)
    VALUES
    (10, 10),
    (11, 10),
    (12, 11),
    (13, 11),
    (14, 12),
    (15, 12),
    (16, 13),
    (17, 14),
    (18, 15)";
    $conn->exec($sql);
    
    $sql = "INSERT INTO `transactions` (`id`,`account_from`,`account_to`,`amount`,`trdate`)
    VALUES
    (1, 10, 11, 100.00, '2024-01-01 12:00:00'),
    (2, 11, 10, 50.00, '2024-01-05 12:00:00'),
    (3, 12, 10, 100.00, '2024-01-10 12:00:00'),
    (4, 13, 10, 100.00, '2024-01-15 12:00:00'),
    (5, 14, 10, 100.00, '2024-01-20 12:00:00'),
    (6, 15, 12, 100.00, '2024-01-25 12:00:00'),
    (7, 13, 12, 100.00, '2024-01-30 12:00:00'),
    (8, 11, 15, 50.00, '2024-02-05 12:00:00'),
    (9, 12, 10, 100.00, '2024-02-10 12:00:00'),
    (10, 13, 10, 200.00, '2024-02-15 12:00:00'),
    (11, 14, 11, 50.00, '2024-02-20 12:00:00'),
    (12, 11, 10, 100.00, '2024-02-25 12:00:00'),
    (13, 14, 11, 100.00, '2024-03-05 12:00:00'),
    (14, 12, 10, 100.00, '2024-03-10 12:00:00'),
    (15, 12, 10, 100.00, '2024-03-15 12:00:00'),
    (16, 11, 10, 100.00, '2024-03-20 12:00:00'),
    (17, 10, 11, 50.00, '2024-03-25 12:00:00')";
    $conn->exec($sql);

?>