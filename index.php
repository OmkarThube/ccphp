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
</head>
<body>
    <h2>Welcome to Student Portal</h2>
    
    <h3>Your Enrolled Courses</h3>
    <ul>
        <?php foreach ($enrolled_courses as $course_id => $course_data): ?>
            <li>
                <?php echo $course_data['course_name']; ?>
                <ul>
                    <h4>Attendance</h4>
                    <?php foreach ($course_data['attendance'] as $date => $status): ?>
                        <li><?php echo $date . " - " . $status; ?></li>
                    <?php endforeach; ?>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>

    <h3>Available Courses</h3>
    <form method="POST" action="">
        <select name="course_id">
            <?php foreach ($courses as $id => $course): ?>
                <option value="<?php echo $id; ?>"><?php echo $course['course_name']; ?> - <?php echo $course['schedule']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Enroll</button>
    </form>

    <h3>Attendance Record</h3>
    <form method="POST" action="">
        <label for="attend_course">Select Course for Attendance</label>
        <select name="attend_course" id="attend_course">
            <?php foreach ($enrolled_courses as $course_id => $course_data): ?>
                <option value="<?php echo $course_id; ?>"><?php echo $course_data['course_name']; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="attendance_status">Attendance Status</label>
        <select name="attendance_status" id="attendance_status">
            <option value="Present">Present</option>
            <option value="Absent">Absent</option>
        </select>
        <label for="attendance_date">Date</label>
        <input type="date" name="attendance_date" required>
        <button type="submit" name="mark_attendance">Mark Attendance</button>
    </form>

    <?php
    if (isset($_POST['mark_attendance'])) {
        $attend_course = $_POST['attend_course'];
        $attendance_status = $_POST['attendance_status'];
        $attendance_date = $_POST['attendance_date'];

        if (isset($enrolled_courses[$attend_course])) {
            $enrolled_courses[$attend_course]['attendance'][$attendance_date] = $attendance_status;
        }
    }
    ?>

</body>
</html>
