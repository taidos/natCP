<?php
// DO NOT MODIFY UNLESS YOU KNOW WHAT YOU'RE DOING.
// FAILIURE TO COMPLY MAY RESULT IN AN INOPERABLE SYSTEM.

require 'manager/db.php';

function generatePassword($length = 8) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }

    return $result;
}

$sql = 'INSERT INTO users (user_name, user_password_hash, user_email, permission_level) VALUES (:username, :password, :email, :rank)';
$tmpPass = generatePassword(8);
$adduser = $dbh->prepare($sql);
$user = 'admin';
$email = 'tmpemail@tmpemail.com';
$rank = 'admin';
$adduser->bindParam(':username', $user);
$adduser->bindParam(':password', password_hash($tmpPass, PASSWORD_DEFAULT));
$adduser->bindParam(':email', $email);
$adduser->bindParam(':rank', $rank);
$adduser->execute();

echo "\n";
echo "A user was created for you.\n";
echo "Username: admin \n";
echo "Password: " . $tmpPass . "\n";
echo "Copy this down, and delete this file after you're done.";
?>