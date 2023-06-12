<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/ico" href="favicon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/panel.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nibba Hotel Admin Panel</title>
</head>
<body>
<div>
    <div class="container">
        <h1>Nibba Hotel Admin Panel</h1>
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            echo '
            <select class="click-me-dropdown" id="dropdown" onchange="redirectToPage()">
                <option hidden selected>' . $username . '</option>
                <option value="scripts/logout.php">LOGOUT</option>
            </select>
            ';
        } ?>
        <a href="create.php"><button type="button">CREATE</button></a>
        <table class="admin-table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">address</th>
                    <th scope="col">phone</th>
                    <th scope="col">description</th>
                    <th scope="col">image_url</th>
                    <th scope="col">operations</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include('scripts/read.php');
            ?>
            </tbody>
        </table>
    </div>
    <script src="scripts/dropdown-handler.js"></script>
</div>
</body>
</html>