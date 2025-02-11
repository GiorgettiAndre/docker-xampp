<?php
require_once "includes/presets.php";
require_once "includes/roomdb_conn.php";

$res = 0;
if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['room']))
{
    $room = $_GET['room'];
    $res = CreateRoom($room);
}

echo $header;
?>

<div class="login-container">
    <form action="Room.php" method="get">
        <div class="form-group">
            <label>Entra in una Chat Room!</label>
            <br><br>
            <?php 
            $rooms = GetRooms();
            if($rooms->num_rows == 0)
                echo '<label>Nessuna stanza disponibile</label>';
            else
            {
                while ($room = $rooms->fetch_assoc()) //va finchè diventa null (righe finite)
                {
                    $name_room = $room['room_name'];
                    echo '<input class="login-button" type="submit" name="room" value="'.$name_room.'" >';
                }
            }
            ?>
        </div>
    </form>
</div>



<div class="login-container">
    <form name="CreateRoom" action="<?php echo $filename ?>" method="get">
        <div class="form-group">
            <?php
            if($res == Database["RoomAlreadyExist"])
                echo '<label style="color: red;" for="Room">Crea una stanza - nome stanza gia esistente:</label><br>';
            else
                echo '<label for="Room">Crea una stanza:</label><br>';
            ?>
            <input type="text" id="Room" name="room" required>
        </div>
        <button type="submit" class="login-button">Crea</button>
    </form>
</div>
<?php
echo $footer;