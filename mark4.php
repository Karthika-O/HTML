<!DOCTYPE html>
<html>
<head>
    <title>Internal Assessment Mark Sheet</title>
</head>
<body>
    <h1>Internal Assessment Mark Sheet</h1>
    <?php
    // Initialize an empty array for storing student data
    $students = array();

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the student name and subject details from the form
        $studentName = $_POST["student_name"];
        $subjects = $_POST["subjects"];

        // Initialize an array to store subject-wise marks for the student
        $subjectMarks = array();

        foreach ($subjects as $index => $subject) {
            $attendancePercentage = (float)$_POST["attendance_percentage"][$index];
            $assignments = (int)$_POST["assignments"][$index];
            $examMarks = (int)$_POST["exam_marks"][$index];

            // Calculate attendance marks (convert percentage to an 8-point scale)
            $attendanceMarks = calculateAttendanceMarks($attendancePercentage);

            // Convert exam marks to a scale of 20 (out of 50)
            $examMarksScaled = ($examMarks / 50) * 20;

            // Define weights for each component (e.g., 0.2 for attendance, 0.3 for assignments, and 0.5 for exams)

            // Calculate the internal mark using the weighted average formula
            $internalMark = ($attendanceMarks) + ($assignments) + ($examMarksScaled);

            // Store subject-wise marks
            $subjectMarks[$subject] = array(
                "Attendance" => $attendancePercentage . '%',
                "Attendance Marks" => $attendanceMarks,
                "Assignments" => $assignments,
                "Exam Marks (scaled)" => $examMarksScaled,
                "Internal Mark" => $internalMark
            );
        }

        // Add the student and their subject-wise marks to the array
        $students[$studentName] = $subjectMarks;
    }

    function calculateAttendanceMarks($percentage) {
        // Map the attendance percentage to an 8-point scale (adjust as needed)
        if ($percentage >= 90) {
            return 8;
        } elseif ($percentage >= 80) {
            return 7;
        } elseif ($percentage >= 70) {
            return 6;
        } elseif ($percentage >= 60) {
            return 5;
        } elseif ($percentage >= 50) {
            return 4;
        } elseif ($percentage >= 40) {
            return 3;
        } elseif ($percentage >= 30) {
            return 2;
        } else {
            return 1;
        }
    }
    ?>

    <!-- Display the current mark sheet -->
    <?php if (!empty($students)) : ?>
        <?php foreach ($students as $student => $subjectMarks) : ?>
            <h2><?php echo $student; ?></h2>
            <?php foreach ($subjectMarks as $subject => $data) : ?>
                <h3><?php echo $subject; ?></h3>
                <table border='1'>
                    <tr><th>Component</th><th>Mark</th></tr>
                    <?php foreach ($data as $component => $mark) : ?>
                        <tr>
                            <td><?php echo $component; ?></td>
                            <td><?php echo $mark; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endforeach; ?>
        <?php endforeach; ?>
    <?php endif; ?>

        <h3>Subjects:</h3>
        <div id="subjects">
            <div class="subject">
                <label for="subjects[]">Subject Name:</label>
                <input type="text" name="subjects[]" required><br>
                <label for="attendance_percentage[]">Attendance (%):</label>
                <input type="number" step="0.01" name="attendance_percentage[]" required><br>
                <label for="assignments[]">Assignments (out of 12):</label>
                <input type="number" name="assignments[]" required><br>
                <label for="exam_marks[]">Exam Marks (out of 50):</label>
                <input type="number" name="exam_marks[]" required><br>
            </div>
        </div>
        <input type="submit" value="Add Subject">
    </form>
</body>
</html>
