<?php
session_start();

// Simulate user login
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 1;  // Simulate a logged-in user with ID 1
}

// Example data for courses and schedules
$courses = [
    1 => ['course_name' => 'Math 101', 'schedule' => 'Mon, Wed, Fri - 10:00 AM to 11:30 AM'],
    2 => ['course_name' => 'Science 101', 'schedule' => 'Tue, Thu - 2:00 PM to 3:30 PM'],
    3 => ['course_name' => 'History 101', 'schedule' => 'Mon, Wed - 1:00 PM to 2:30 PM']
];

// Example enrolled courses (stored as arrays)
$enrolled_courses = [
    1 => ['course_name' => 'Math 101', 'attendance' => ['2025-02-01' => 'Present', '2025-02-03' => 'Absent']],
];

// Simulate adding a course to enrollment
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['course_id'])) {
    $course_id = $_POST['course_id'];
    if (!isset($enrolled_courses[$course_id])) {
        $enrolled_courses[$course_id] = [
            'course_name' => $courses[$course_id]['course_name'],
            'attendance' => []
        ];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Student Portal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="courses.php">Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="attendance.php">Attendance</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <h2 class="text-center mb-4">Welcome to Student Portal</h2>
        
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">Your Enrolled Courses</div>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php foreach ($enrolled_courses as $course_id => $course_data): ?>
                                <li class="list-group-item">
                                    <strong><?php echo $course_data['course_name']; ?></strong>
                                    <ul class="mt-2">
                                        <h6>Attendance</h6>
                                        <?php foreach ($course_data['attendance'] as $date => $status): ?>
                                            <li><?php echo $date . " - " . $status; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header bg-success text-white">Enroll in a Course</div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="mb-3">
                                <select name="course_id" class="form-select">
                                    <?php foreach ($courses as $id => $course): ?>
                                        <option value="<?php echo $id; ?>">
                                            <?php echo $course['course_name']; ?> - <?php echo $course['schedule']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Enroll</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
