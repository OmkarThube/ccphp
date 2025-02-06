<?php
session_start();
$courses = [
    1 => ['course_name' => 'Math 101', 'schedule' => 'Mon, Wed, Fri - 10:00 AM to 11:30 AM'],
    2 => ['course_name' => 'Science 101', 'schedule' => 'Tue, Thu - 2:00 PM to 3:30 PM'],
    3 => ['course_name' => 'History 101', 'schedule' => 'Mon, Wed - 1:00 PM to 2:30 PM']
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php include 'navbar.php'; ?>
    <div class="container py-5">
        <h2 class="text-center">Available Courses</h2>
        <ul class="list-group mt-3">
            <?php foreach ($courses as $id => $course): ?>
                <li class="list-group-item">
                    <strong><?php echo $course['course_name']; ?></strong> - <?php echo $course['schedule']; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
