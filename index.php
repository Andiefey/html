<?php
include_once("connect.php");
$statement = $conn->prepare("SELECT * FROM studentinfo");
$statement->execute();
$students = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
    <title>Class Recording System</title>
    <style>
        body {
            background-color: #f8f9fa;
            margin: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        .table img.thumbnail {
            width: 50px;
            height: auto;
        }
        .btn-actions {
            display: flex;
            gap: 5px;
        }
        .btn-actions form {
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Andie System</h1>

        <div class="d-flex justify-content-end mb-3">
            <a href="create.php" class="btn btn-success">Add Student</a>
        </div>

        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Student ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Course</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $i => $student): ?>
                    <tr>
                        <th scope="row"><?php echo $i + 1 ?></th>
                        <td><?php echo $student['s_id'] ?></td>
                        <td><img src="<?php echo $student['s_image_dir'] ?>" class="thumbnail" alt="Student Image"></td>
                        <td><?php echo $student['s_firstname'] ?></td>
                        <td><?php echo $student['s_lastname'] ?></td>
                        <td><?php echo $student['s_gender'] ?></td>
                        <td><?php echo $student['s_contact'] ?></td>
                        <td><?php echo $student['s_course'] ?></td>
                        <td class="btn-actions">
                            <a href="view.php?id=<?php echo $student['s_id'] ?>" class="btn btn-sm btn-info">View</a>
                            <a href="update.php?id=<?php echo $student['s_id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                            <form method="POST" action="delete.php">
                                <input type="hidden" name="id" value="<?php echo $student['s_id'] ?>">
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist
