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
                        <?php foreach ($employees as $employee) : ?>
                                <tr>
                                        <td><?php echo $employee->name; ?></td>
                                        <td><?php echo $employee->surname1; ?></td>
                                        <td><?php echo $employee->surname2; ?></td>
                                        <td><?php echo $employee->address; ?></td>
                                        <td>
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-edit" data-new="true">Create</button>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit" data-id="<?= $employee->id ?>">Update</button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete" data-id="<?= $employee->id ?>">Delete</button>
                                        </td>
                                </tr>
                        <?php endforeach; ?>
                </tbody>
        </table>
</body>

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="edit-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title" id="edit-label">Create a new employee</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                                <form id="edit-form" method="post">
                                        <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
                                        </div>
                                        <div class="form-group">
                                                <label for="surname1">Surname 1</label>
                                                <input type="text" name="surname1" class="form-control" id="surname1" placeholder="Surname 1" required>
                                        </div>
                                        <div class="form-group">
                                                <label for="surname2">Surname 2</label>
                                                <input type="text" name="surname2" class="form-control" id="surname2" placeholder="Surname 2" required>
                                        </div>
                                        <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" name="address" class="form-control" id="address" placeholder="Address" required>
                                        </div>
                                        <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                </form>
                        </div>
                </div>
        </div>
</div>

<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="delete-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title" id="delete-label">Are you sure?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <form id="delete-form" method="post">
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Confirm</button>
                                </div>
                        </form>
                </div>
        </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
        const deleteForm = $('#delete-form');
        $('#modal-delete').on('show.bs.modal', function(event) {
                const button = $(event.relatedTarget); // Button that triggered the modal
                const employeeId = button.data('id'); // Extract info from data-* attributes
                deleteForm.attr('action', '/elitech/index.php/employees/delete/' + employeeId);
                // Dynamically set the form's "action" attribute to the endpoint to delete an employee,
                // specifying the employee's id as the last segment in the url.
                // With this we would be calling the "delete" method of the Employees controller.
        });

        const editForm = $('#edit-form');
        $('#modal-edit').on('show.bs.modal', function(event) {
                const button = $(event.relatedTarget); // Button that triggered the modal
                const isNew = button.data('new'); // Extract info from data-* attributes
                if (isNew === true) {
                        $('#edit-label').text('Create a new employee');
                        editForm.attr('action', '/elitech/index.php/employees/create/');
                        editForm.trigger('reset');
                } else {
                        $('#edit-label').text('Update an employee');
                        const employeeId = button.data('id'); // Extract info from data-* attributes
                        editForm.attr('action', '/elitech/index.php/employees/update/' + employeeId);
                        $.get('/elitech/index.php/api/employees/getEmployee/' + employeeId, function(data) {
                                $('#name').val(data.name);
                                $('#surname1').val(data.surname1);
                                $('#surname2').val(data.surname2);
                                $('#address').val(data.address);
                        });
                        // Dynamically set the form's "action" attribute to the endpoint to update an employee,
                        // specifying the employee's id as the last segment in the url.
                        // With this we would be calling the "delete" method of the Employees controller.
                }
        });
</script>

</html>