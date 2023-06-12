<?php

$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'hotel_booking';

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die('Failed to connect with database: ' . $conn->connect_error);
}

$query = "SELECT * FROM hotels";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $name = $row['name'];
    $address = $row['address'];
    $phone = $row['phone'];
    $description = $row['description'];
    $image_url = $row['image_url'];
    echo
    '<tr>
        <th scope="row">' . $id . '</th>
        <td>'. $name .'</td>
        <td>'. $address .' </td>
        <td>'. $phone .' </td>
        <td>'. $description .' </td>
        <td>'. $image_url .'</td>
        <td>
            <form id="uform-id-'. $id .'" action="update.php" method="post">
                <input type="hidden" name="hid" value="'. $id .'">
                <button type="submit" form="uform-id-'. $id .'">UPDATE</button>
            </form>
            <form id="dform-id-'. $id .'" action="scripts/delete.php" method="post">
                <input type="hidden" name="hid" value="'. $id .'">
                <button type="submit" form="dform-id-'. $id .'">DELETE</button>
            </form>
        </td>
    </tr>';
}

$conn->close();

?>