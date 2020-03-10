        <div class="container">
            <div class="jumbotron">
                <p class="lead">
                    Welcome to the Roanoke College March Madness Pool System!  On this page, you can submit your entry for the current year's pool up until the start of the initial round of March Madness for this year (see below for open pools), view picks and standings for this year's pool (after the first round has started), and also view picks and standings for previous pools (spring 2016 and beyond).
                </p>
            </div>

        <table width="60%" border="1" align="center">
                <tr>
                    <td colspan="3" align="left"><b>open pools</b></td>
                </tr>
<?
        $query = $mysqli->prepare("SELECT id, name, starttime FROM m_events WHERE starttime >= NOW() ORDER BY starttime DESC");
        $query->execute();
        $query->store_result();
        $query->bind_result($b_id, $b_name, $b_startdate);

        if ($query->num_rows == 0) {
            ?>
                <tr>
                    <td colspan="3" align="center">no open pools</td>
                </tr>
            <?
        } else {

            while($query->fetch()) {
            ?>
                <tr>
                    <td align="left"><? echo $b_name; ?></td>
                    <td align="center">Enrollment Ends <? echo date('l, F j, Y @ g:i A', strtotime($b_startdate)); ?></td>
                    <td align="center"><a href="./index.php?action=enroll1&bid=<? echo $b_id; ?>">enroll now</a></td>
                </tr>
            <?
            }
        }

        $query->close();
?>
        </table>

        <br><br>

        <table width="60%" border="1" align="center">
            <tr>
                <td colspan="3" align="left"><b>active pools</b></td>
            </tr>
            <?
            $query = $mysqli->prepare("SELECT id, name, starttime, round FROM m_events WHERE (starttime <= NOW()) AND (NOW() <= endtime) ORDER BY starttime DESC");
            $query->execute();
            $query->store_result();
            $query->bind_result($b_id, $b_name, $b_startdate, $b_round);

            if ($query->num_rows == 0) {
                ?>
                <tr>
                    <td colspan="3" align="center">no active pools</td>
                </tr>
                <?
            } else {

                while($query->fetch()) {
                    ?>
                    <tr>
                        <td align="left"><? echo $b_name; ?></td>
                        <td align="center"><a href="./index.php?action=comments&bid=<? echo $b_id; ?>">discussion board</a></td>
                        <td align="center">picks/standings:
<?
                    switch ($b_round) {
                        case 6:
?>
                            <a href="./index.php?action=viewstandings&bid=<? echo $b_id; ?>&round=6">final</a>&nbsp;&nbsp;|&nbsp;&nbsp;
<?
                        case 5:
?>
                            <a href="./index.php?action=viewstandings&bid=<? echo $b_id; ?>&round=5">2</a>&nbsp;&nbsp;|&nbsp;&nbsp;
<?
                        case 4:
?>
                            <a href="./index.php?action=viewstandings&bid=<? echo $b_id; ?>&round=4">4</a>&nbsp;&nbsp;|&nbsp;&nbsp;
<?
                        case 3:
?>
                            <a href="./index.php?action=viewstandings&bid=<? echo $b_id; ?>&round=3">8</a>&nbsp;&nbsp;|&nbsp;&nbsp;
<?
                        case 2:
?>
                            <a href="./index.php?action=viewstandings&bid=<? echo $b_id; ?>&round=2">16</a>&nbsp;&nbsp;|&nbsp;&nbsp;
<?
                        case 1:
?>
                            <a href="./index.php?action=viewstandings&bid=<? echo $b_id; ?>&round=1">32</a>&nbsp;&nbsp;|&nbsp;&nbsp;
<?
                        case 0:
?>
                            <a href="./index.php?action=viewstandings&bid=<? echo $b_id; ?>&round=0">all</a>
<?
                            break;
                    }
?>

                        </td>
                    </tr>
                    <?
                }
            }

            $query->close();
            ?>
        </table>

        <br><br>

        <table width="60%" border="1" align="center">
            <tr>
                <td colspan="3" align="left"><b>past pools</b></td>
            </tr>
            <?
            $query = $mysqli->prepare("SELECT id, name, starttime FROM m_events WHERE NOW() >= endtime ORDER BY endtime DESC");
            $query->execute();
            $query->store_result();
            $query->bind_result($b_id, $b_name, $b_startdate);

            if ($query->num_rows == 0) {
                ?>
                <tr>
                    <td colspan="3" align="center">no active pools</td>
                </tr>
                <?
            } else {

                while($query->fetch()) {
                    ?>
                    <tr>
                        <td align="left"><? echo $b_name; ?></td>
                        <td align="center"><a href="./index.php?action=comments&bid=<? echo $b_id; ?>">discussion board</a></td>
                        <td align="center">picks/standings:
                            <a href="./index.php?action=viewstandings&bid=<? echo $b_id; ?>&round=6">final</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="./index.php?action=viewstandings&bid=<? echo $b_id; ?>&round=5">2</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="./index.php?action=viewstandings&bid=<? echo $b_id; ?>&round=4">4</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="./index.php?action=viewstandings&bid=<? echo $b_id; ?>&round=3">8</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="./index.php?action=viewstandings&bid=<? echo $b_id; ?>&round=2">16</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="./index.php?action=viewstandings&bid=<? echo $b_id; ?>&round=1">32</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="./index.php?action=viewstandings&bid=<? echo $b_id; ?>&round=0">all</a>
                        </td>
                    </tr>
                    <?
                }
            }

            $query->close();
            ?>
        </table>

        </div>
