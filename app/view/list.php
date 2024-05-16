<style>
    body {
        font-family: Arial, sans-serif;
    }
    h1 {
        color: #333;
        text-align: center;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }
    th, td {
        border: 1px solid #999;
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: #f3f3f3;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>

<h1>Messages reçu :</h1>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Date</th>
        <th>Message</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($messages as $row) { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['message']; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>