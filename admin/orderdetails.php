<!DOCTYPE html>
<html>
<head>
<style>
body {
    background-color: white;
    overflow: auto;
}
.cont {
    background-color: black;
    width: 100%;
    height: 40px;
}
input[type='submit'] {
    padding-left: 10px;
    padding-right: 10px;
    border: none;
    outline: none;
    height: 40px;
    width: 200px;
    color: white;
    background: black;
    font-size: 18px;
    font-family: Tahoma;
    font-weight: bold;
}
input[type='submit']:hover {
    background-color: #FF5733;
    color: black;
}
p {
    color: black;
}
table {
    width: 100%;
}
.heading {
    font-weight: bold;
    font-size: 20px;
    font-family: Tahoma;
    text-align: center;
}
td {
    text-align: center;
    font-size: 18px;
    font-family: Tahoma;
}
iframe {
    width: 100%;
    height: 1000px;
}
</style>
</head>

<body>
<table>
<?php
include_once('../dbcon.php');
$res = mysqli_query($con, "SELECT * FROM orders ORDER BY deliverstatus DESC");
echo '<tr>';
echo '<td><p class="heading">Image id</p></td>';
echo '<td><p class="heading">Art Name</p></td>';
echo '<td><p class="heading">Customer Name</p></td>';
echo '<td><p class="heading">Price</p></td>';
echo '<td><p class="heading">Art Type</p></td>';
echo '<td><p class="heading">Date</p></td>';
echo '<td><p class="heading">Deliver Status</p></td>';
echo '<td><p class="heading">Verify</p></td>';
echo '</tr>';

while ($row = mysqli_fetch_array($res)) {
    echo '<tr>';
    echo '<td>' . $row["Imgid"] . '</td>';
    echo '<td>' . $row["artname"] . '</td>';
    echo '<td>' . $row["pusername"] . '</td>';
    echo '<td>' . $row["price"] . '</td>';
    echo '<td>' . $row["Arttype"] . '</td>';
    echo '<td>' . $row["Date"] . '</td>';
    echo '<td>' . $row["Deliverstatus"] . '</td>';
    ?>
    <td>
        <form action="orderdetails.php" method="POST">
            <input type="hidden" name="imgid" value="<?php echo $row["Imgid"]; ?>">
            <input type="submit" name="delivered" value="Change Status">
        </form>
    </td>
    <?php
    echo '</tr>';
}

if (isset($_POST['delivered'])) {
    $imgid = $_POST['imgid'];
    mysqli_query($con, "UPDATE orders SET deliverstatus='delivered' WHERE imgid=$imgid");
    echo '<script>window.location="orderdetails.php";</script>';
}
?>
</table>
</body>
</html>
