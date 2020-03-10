<?
    $bid = $_REQUEST['bid'];
    $round = $_REQUEST['round'];
    $sort = $_REQUEST['sort'];

    $query = $mysqli->prepare("SELECT id, name, lastupdate FROM m_events WHERE id = ? AND starttime <= NOW()");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $query->bind_result($b_id, $b_name, $b_updated);

    if ($query->num_rows == 0) {
    ?>
    <div class="container">
        <div class="jumbotron">
            <p class="lead">
                The requested pool does not exist or is not eligible for viewing picks and standings because the March Madness season has not yet begun.  If you feel that this is an error, please contact the Contest Administrator.
            </p>
        </div>
    </div>
    <?
        $query->close();
    } else {
        $query->fetch();
        $query->close();

        $r_name = "";


        switch ($round) {
            case 0:
                $r_name = "All Picks";
                break;
            case 1:
                $r_name = "Round of 32 Remaining Picks";
                break;
            case 2:
                $r_name = "Sweet Sixteen Remaining Picks";
                break;
            case 3:
                $r_name = "Elite Eight Remaining Picks";
                break;
            case 4:
                $r_name = "Final Four Remaining";
                break;
            case 5:
                $r_name = "Top Two Picks";
                break;
            case 6:
                $r_name = "Final Pick";
                break;
        }
?>
  <div class="container">
    <div class="jumbotron">
        <h1 class="title">
            <? echo $r_name; ?> and Point Standings
        </h1>
        <p class="text-muted">
            Last Updated <? echo date('l, F j, Y @ g:i A', strtotime($b_updated)); ?>
        </p>
        <p class="lead">
            This page has picks that each person or entry has remaining in this pool, based on the version of the page you chose to load.  Each entry appears in its own row, and each of the remaining teams (or all, in the case of all picks) appears across the top.  If an entry has the team corresponding to a particular column, that team's name is repeated in that entry's row.  Finally, numbers appear next to each team that has 1 or more wins; the format (X/Y) means, for a given team, it has X wins, which according to our March Madness rules, grants Y points to that entry.<br><br>Note that, with the exception of "all" picks which are sorted by display name, entries are sorted by current points, remaining number of teams (for a given round), and then by username.<br><br>* The points possible column is experimental; results may very and presented as-is.  No warranty available.<br><br>** The 'Initial FTE EV' column is the initial expected number of points for each person, based on Nate Silver's predictions at FiveThirtyEight.Com, and the 'Live FTE EV' column uses the most recent data from 538.
        </p>
    </div>

    <table style="font-size: 80%;" align="center" border="1">
        <tr>
            <td align="center"><b><a href="./index.php?action=viewstandings&bid=<? echo $bid; ?>&round=<? echo $round; ?>&sort=1">Username</a></b></td>
            <td align="center"><b><a href="./index.php?action=viewstandings&bid=<? echo $bid; ?>&round=<? echo $round; ?>&sort=2">Points</a></b></td>
            <td align="center"><b><a href="./index.php?action=viewstandings&bid=<? echo $bid; ?>&round=<? echo $round; ?>&sort=3">Remaining<br>Teams</a></b></td>
			<td align="center"><b><a href="./index.php?action=viewstandings&bid=<? echo $bid; ?>&round=<? echo $round; ?>&sort=4">Possible<br>Points*</a></b></td>
			<td align="center"><b><a href="./index.php?action=viewstandings&bid=<? echo $bid; ?>&round=<? echo $round; ?>&sort=5">Initial<br>FTE EV**</a></b></td>
			<td align="center"><b><a href="./index.php?action=viewstandings&bid=<? echo $bid; ?>&round=<? echo $round; ?>&sort=6">Live FTE<br>EV**</a></b></td>
<?
        $query = $mysqli->prepare("SELECT name, wins, inactive FROM m_teams WHERE mid = ? AND wins >= ? ORDER BY seed ASC, lid ASC");
        $query->bind_param('ss',$bid,$round);
        $query->execute();
        $query->store_result();
        $query->bind_result($t_name, $t_wins, $t_inactive);

        while ($query->fetch()) {
            $pts = 0;
            if ($t_wins > 0) { $pts = $t_wins*$t_wins; }
            if ($t_wins == 6) { $pts = 37; }
?>
            <td align="center"<? if ($t_inactive == 1) { ?> style="color: #cccccc"<? } ?>><b><? echo $t_name; ?> <? if ($t_wins > 0) { echo "(" . $t_wins . "/" . $pts . ")"; } ?></b></td>
<?
        }
        $query->close();
?>
        </tr>
<?
        $sort_string = "points DESC, remaining DESC, displayname ASC";
        if ($sort == 1) {
            $sort_string = "displayname ASC";
        } else if ($sort == 3) {
            $sort_string = "remaining DESC, points DESC, displayname ASC";
        } else if ($sort == 4) {
            $sort_string = "possible DESC, points DESC, remaining DESC, displayname ASC";
        } else if ($sort == 5) {
            $sort_string = "fte_ev DESC, points DESC, remaining DESC, displayname ASC";
        } else if ($sort == 6) {
            $sort_string = "fte_live_ev DESC, points DESC, remaining DESC, displayname ASC";
        }
        
        $query = $mysqli->prepare("SELECT id, displayname, points, remaining, possible, fte_ev, fte_live_ev FROM m_entries WHERE mid = ? ORDER BY " . $sort_string);
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($e_id, $e_dname, $e_points, $e_remaining, $e_possible, $e_fte, $e_live);

        while ($query->fetch()) {
?>
        <tr>
            <td align="center"><? echo $e_dname; ?></td>
            <td align="center"><? echo $e_points; ?></td>
            <td align="center"><? echo $e_remaining; ?></td>
			<td align="center"><? echo $e_possible; ?></td>
			<td align="center"><? echo round($e_fte, 2); ?></td>
			<td align="center"><? echo round($e_live, 2); ?> </td>
<?
            $query2 = $mysqli->prepare("SELECT name, wins, id, inactive FROM m_teams WHERE mid = ? AND wins >= ? ORDER BY seed ASC, lid ASC");
            $query2->bind_param('ss',$bid,$round);
            $query2->execute();
            $query2->store_result();
            $query2->bind_result($t_name, $t_wins, $t_id, $t_inactive);

            while ($query2->fetch()) {

                $pts = 0;
                if ($t_wins > 0) { $pts = $t_wins*$t_wins; }
                if ($t_wins == 6) { $pts = 37; }
                $query3 = $mysqli->prepare("SELECT id FROM m_entries_data WHERE eid = ? AND tid = ? AND mid = ?");
                $query3->bind_param('sss',$e_id,$t_id,$bid);
                $query3->execute();
                $query3->store_result();
                $num_rows = $query3->num_rows;
                $query3->close();

                if ($num_rows == 1) {
?>
            <td align="center"<? if ($t_inactive == 1) { ?> style="color: #cccccc"<? } ?>><? echo $t_name; ?> <? if ($t_wins > 0) { echo "(" . $t_wins . "/" . $pts . ")"; } ?></td>
<?
                } else {
                    echo "<td></td>";
                }
            }
?>
        </tr>
<?
        }
?>
    </table>
  </div>
<?
    }
