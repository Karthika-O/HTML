<!DOCTYPE html>
<html>
<head>
    <title>Mark Sheet with Table</title>
</head>
<body>
    <h1>Enter Your Marks</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        <label for="studentName">Student Name:</label>
        <input type="text" name="studentName" id="studentName" required><br><br>

        <label for="studentNo">Roll No:</label>
        <input type="text" name="studentNo" id="studentNo" required><br><br>

        <label for="subject1">ADS: </label>
        <input type="text" name="subject1" id="subject1"><br><br>

        <label for="subject2">ASE: </label>
        <input type text="text" name="subject2" id="subject2"><br><br>

        <label for="subject3">DFCA: </label>
        <input type="text" name="subject3" id="subject3"><br><br>

        <label for="subject4">MFC: </label>
        <input type text="text" name="subject4" id="subject4"><br><br>

        <input type="submit" value="Result">
    </form>

    <h1>Mark Sheet</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $studentName=$_POST['studentName'];
        $studentNo=$_POST['studentNo'];
        $marks = array(
            "ADS" => $_POST["subject1"],
            "ASE" => $_POST["subject2"],
            "DFCA" => $_POST["subject3"],
            "MFC" => $_POST["subject4"],
        );

        $grades = array();
        $totalMarks = 0;

        echo "<table border='1' width=480 px>";
        echo "<tr><td>Roll No:</td><td colspan=3>$studentNo</td>";
        echo "<tr><td>Name:</td><td colspan=3>$studentName</td>";
        echo "<tr><th>S No.</th><th>Subject</th><th>Marks</th><th>Grade</th></tr>";
        $serial=1;
        
        foreach ($marks as $subject => $mark) {
            $totalMarks += $mark;
            $grade = getGrade($mark);
            $grades[$subject] = $grade;
            echo "<tr><td>$serial</td><td>$subject</td><td>$mark</td><td>$grade</td></tr>";
            $serial++;
        }

        echo "<tr><td><strong>Total Marks</strong></td><td colspan=3 align=center><strong>$totalMarks</strong></td></tr>";
        echo "</table>";
    }

    function getGrade($mark) {
        if ($mark >= 25) {
            return "P";
        } 
        else {
            return "F";
        }
    }
    ?>
</body>
</html>
