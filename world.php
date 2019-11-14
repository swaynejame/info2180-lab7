<?php
$host = getenv('IP');
$username = 'admin';
$password = 'Admin11!';
$dbname = 'world';

$country = $_GET['country'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<table>
<tr>
    <thead>
        <th>Name</th>
        <th>Continent</th>
        <th>Independence</th>
        <th>Head of State</th>
    </thead>
</tr>
    <tbody>
        <?php foreach ($results as $row): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['continent']; ?></td>
                <td><?php echo $row['independence_year']; ?></td>
                <td><?php echo $row['head_of_state']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!--while($row = $result->fetch_assoc()) {-->
<!--echo "<tr><td>" . $row["name"]. "</td><td>" . $row["head_of_state"] . "</td><td>"-->
<!--. $row["continent"]. "</td></tr>";-->
<!--}-->
<!--echo "</table>";-->

<!--<ul>-->
<!--<?php foreach ($results as $row): ?>-->
<!--  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>-->
<!--<?php endforeach; ?>-->
<!--</ul>-->
