<html>
<head>
        <title>Employees</title>
</head>
<body>
        <h1>Employees</h1>

        <ul>
        <?php foreach ($employees as $employee):?>

                <li><?php echo $employee->name;?></li>

        <?php endforeach;?>
        </ul>

</body>
</html>