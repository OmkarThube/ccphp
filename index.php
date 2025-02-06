<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card-hover:hover {
            transform: scale(1.05);
            transition: 0.3s ease-in-out;
        }
    </style>
</head>
<body>
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
                <div class="card card-hover mb-4 shadow-sm">
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
                <div class="card card-hover mb-4 shadow-sm">
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
                            <button type="submit" class="btn btn-success w-100">Enroll</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
