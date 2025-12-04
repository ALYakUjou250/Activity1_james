<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name  = mysqli_real_escape_string($conn, $_POST["name"]);
    $agent = mysqli_real_escape_string($conn, $_POST["agent"]);
    $map   = mysqli_real_escape_string($conn, $_POST["map"]);
    $skins = mysqli_real_escape_string($conn, $_POST["skins"]);
    $guns  = mysqli_real_escape_string($conn, $_POST["guns"]);
    $mode  = mysqli_real_escape_string($conn, $_POST["mode"]);

    $sql = "INSERT INTO players (name, agent, map, skins, guns, mode)
            VALUES ('$name', '$agent', '$map', '$skins', '$guns', '$mode')";

    if (mysqli_query($conn, $sql)) {
        header("Location: success.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Valorant Player Form</title>
    <style>
        body {
            font-family: Arial;
            background: #1a1a1a;
            color: white;
        }
        .container {
            width: 400px;
            margin: auto;
            background: #252525;
            padding: 20px;
            border-radius: 10px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 7px 0;
            border-radius: 5px;
            border: none;
        }
        button {
            width: 100%;
            padding: 10px;
            background: red;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }
        button:hover {
            background: #cc0000;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Valorant Player Form</h2>

    <form method="POST">

        <label>Name:</label>
        <input type="text" name="name" required>

        <label>Favorite Agent:</label>
        <select name="agent" required>
            <option value="">Select Agent</option>
            <option>Jett</option>
            <option>Reyna</option>
            <option>Yoru</option>
            <option>Sage</option>
            <option>Fade</option>
            <option>Killjoy</option>
            <option>Omen</option>
            <option>Raze</option>
        </select>

        <label>Favorite Map:</label>
        <select name="map" required>
            <option value="">Select Map</option>
            <option>Ascent</option>
            <option>Bind</option>
            <option>Haven</option>
            <option>Lotus</option>
            <option>Split</option>
            <option>Pearl</option>
        </select>

        <label>Favorite Skins:</label>
        <input type="text" name="skins" placeholder="Reaver, Ion, Prime">

        <label>Favorite Guns:</label>
        <input type="text" name="guns" placeholder="Vandal, Phantom">

        <label>Preferred Mode:</label>
        <select name="mode" required>
            <option>Competitive</option>
            <option>Unrated</option>
            <option>Swiftplay</option>
            <option>Spike Rush</option>
            <option>Deathmatch</option>
        </select>

        <button type="submit">Submit</button>

    </form>
</div>

</body>
</html>
