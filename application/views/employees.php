<html>
        <head>
                <title>Employees</title>
        </head>
        <body>
                <h1>Employees</h1>

                <ul>
                <?php foreach ($employees as $employee):?>

                        <li>
                                <?php echo $employee->name;?>
                                <?php echo $employee->surname1;?>
                                <?php echo $employee->surname2;?>
                                <?php echo $employee->address;?>
                        </li>

                <?php endforeach;?>
                </ul>

        </body>
</html>