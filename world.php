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

<?php if($_GET['context']!="cities"):?>

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

<?php elseif($_GET['context']=="cities"):?>
    <?php $stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities JOIN countries ON cities.country_code = countries.code WHERE countries.name LIKE '%$country%'");
     $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    
    <table>
<tr>
    <thead>
        <th>Name</th>
        <th>District</th>
        <th>Population</th>
    </thead>
</tr>
    <tbody>
        <?php foreach ($results as $row): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['district']; ?></td>
                <td><?php echo $row['population']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    
<?php endif;?>