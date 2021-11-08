<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Employees</title>
</head>
<body>
        <h3>Employees</h3>
                <table class="table">
                <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Surname1</th>
                        <th scope="col">Surname2</th>
                        <th scope="col">Address</th>
                        <th scope="col">Actions</th>
                        </tr>
                </thead>
                <tbody>
                <?php foreach ($employees as $employee):?>
                <tr>
                        <td><?php echo $employee->name;?></td>
                        <td><?php echo $employee->surname1;?></td>
                        <td><?php echo $employee->surname2;?></td>
                        <td><?php echo $employee->address;?></td>
                        <td>
                                <button class="btn btn-success">Create</button>
                                <button class="btn btn-primary">Update</button>
                                <button class="btn btn-danger">Delete</button>
                        </td>
                </tr>
                <?php endforeach;?>
                </tbody>
                </table>
</body>
</html>

