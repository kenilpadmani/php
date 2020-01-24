<form method="post" action="calender.php">
    Month : <input type="number" name="month"><br>
    Year : <input type="number" name="year"><br>
    <input type="submit" name="submit">
</form>






<?php

session_start();

if (isset($_POST['submit'])) {
    if (isset($_POST['month'])) {
        if (isset($_POST['year'])) {
            $_SESSION['storeMonthSession'] = $_POST['month'];
            $_SESSION['storeYearSession'] = $_POST['year'];
            $days = cal_days_in_month(CAL_GREGORIAN, $_SESSION['storeMonthSession'], $_SESSION['storeYearSession']);
            echo $days." day of ".$_SESSION['storeMonthSession']." Month in ".$_SESSION['storeYearSession']." year<br>";
            $firstDay = date('w', mktime(0, 0, 0, $_SESSION['storeMonthSession'], 1, $_SESSION['storeYearSession']));
            echo "First Day : ".$firstDay;
            echo "<table><tr>";
            echo "<th>Sun</th>";
            echo "<th>Mon</th>";
            echo "<th>Tue</th>";
            echo "<th>Wed</th>";
            echo "<th>Thu</th>";
            echo "<th>Fri</th>";
            echo "<th>Sat</th>";
            echo "</tr>";
            $d = 1;
            for ($outerLoopVariable = 0; $outerLoopVariable < 6; $outerLoopVariable++) {
                echo "<tr>";
                for ($innerLoopVariable = 0; $innerLoopVariable < 7; $innerLoopVariable++) {
                    if ($outerLoopVariable == 0) {
                        if ($innerLoopVariable < $firstDay) {
                            echo "<td></td>";
                        }
                        else {
                            echo "<td>".$d."</td>";
                            $d++;
                        }
                    } else {
                        if ($d <= $days) {
                            if ($d != 1) {
                                echo "<td>".$d."</td>";
                                $d++;
                            } else {
                                echo "<td></td>";
                            }
                        }
                    }
                    if ($d > $days) {
                        if($outerLoopVariable == 4) {
                            $outerLoopVariable = $outerLoopVariable + 5;
                        }
                    }
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Year field is blank<br>";
        }
    } else {
        echo "month field is blank<br>";
    }
} else {
    calender($_SESSION['storeMonthSession'], $_SESSION['storeYearSession']);
}

function calender($month, $year) {
    $days = cal_days_in_month(CAL_GREGORIAN, $_SESSION['storeMonthSession'], $_SESSION['storeYearSession']);
    echo $days." day of ".$_SESSION['storeMonthSession']." Month in ".$_SESSION['storeYearSession']." year<br>";
    $firstDay = date('w', mktime(0, 0, 0, $_SESSION['storeMonthSession'], 1, $_SESSION['storeYearSession']));
    echo "First Day : ".$firstDay;
    echo "<table><tr>";
    echo "<th>Sun</th>";
    echo "<th>Mon</th>";
    echo "<th>Tue</th>";
    echo "<th>Wed</th>";
    echo "<th>Thu</th>";
    echo "<th>Fri</th>";
    echo "<th>Sat</th>";
    echo "</tr>";
    $d = 1;
    for ($outerLoopVariable = 0; $outerLoopVariable < 6; $outerLoopVariable++) {
        echo "<tr>";
        for ($innerLoopVariable = 0; $innerLoopVariable < 7; $innerLoopVariable++) {
            if ($outerLoopVariable == 0) {
                if ($innerLoopVariable < $firstDay) {
                    echo "<td></td>";
                }
                else {
                    echo "<td>".$d."</td>";
                    $d++;
                }
            } else {
                if ($d <= $days) {
                    if ($d != 1) {
                        echo "<td>".$d."</td>";
                        $d++;
                    } else {
                        echo "<td></td>";
                    }
                }
            }
            if ($d > $days) {
                if($outerLoopVariable == 4) {
                    $outerLoopVariable = $outerLoopVariable + 5;
                }
            }
        }
        echo "</tr>";
    }
    echo "</table>";
}






?>

<style>
table {
    border : 1px solid black;
}

th,td,tr {
    border : 1px solid black;
    text-align : center;
    width : 40px;
    height :40px;
}
</style>

