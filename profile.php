<?php
session_start();
$user_profile = [
    'name' => 'John Doe',
    'email' => 'john.doe@example.com',
    'student_id' => 'S1234567',
    'enrolled_courses' => ['Math 101', 'Science 101']
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php include 'navbar.php'; ?>
    <div class="container py-5">
        <h2 class="text-center">Student Profile</h2>
        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $user_profile['name']; ?></h5>
                <p class="card-text"><strong>Email:</strong> <?php echo $user_profile['email']; ?></p>
                <p class="card-text"><strong>Student ID:</strong> <?php echo $user_profile['student_id']; ?></p>
                <h6>Enrolled Courses</h6>
                <ul>
                    <?php foreach ($user_profile['enrolled_courses'] as $course): ?>
                        <li><?php echo $course; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
