<?php
const conn = new mysqli("db", "user", "user", "chat_room", 3306);
if(conn->connect_error)
    die("so morto" . $conn->connect_error);

const Database = [
    "RoomAlreadyExist" => 1,
    "Success" => 2
];

function GetRooms()
{
    $res = conn->query("SELECT * FROM room;");
    return $res;
}

function WatchRoom($room)
{
    $res = conn->query("SELECT M.username_account, M.date_pub, M.content FROM message M WHERE M.room_name = '$room';");
    return $res;
}

function ExistsRoom($room)
{
    $res = conn->query("SELECT * FROM room WHERE room_name = '$room';");
    if($res->num_rows > 0)
        return true;
    return false;
}

function CreateRoom($room)
{
    if(ExistsRoom($room))
        return Database["RoomAlreadyExist"];

    $res = conn->query("INSERT INTO room (room_name) VALUES ('$room');");
    return Database["Success"];
}

function PostMessage($username, $content, $room)
{
    $res = conn->query("INSERT INTO message (username_account, content, room_name) VALUES ('$username', '$content', '$room');");
}