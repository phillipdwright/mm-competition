<?

    $bid = $_REQUEST['bid'];

    $query = $mysqli->prepare("SELECT id FROM m_events WHERE id = ? AND starttime >= NOW()");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $query->bind_result($b_id);

    if ($query->num_rows == 0) {
        include "incl_header.php";
        include "incl_body.php";
?>
<br><br>

    <table width="70%" align="center" border="1">
        <tr>
            <td align="left">The requested pool does not exist or is not eligible for enrollment because the March Madness season has already begun.  If you feel that this is an error, please contact the Contest administrator.</td>
        </tr>
    </table>
<?
        $query->close();
    } else {
        $query->fetch();
        $query->close();

        $b_fname = $_REQUEST['b_fname'];
        $b_lname = $_REQUEST['b_lname'];
        $b_dname = $_REQUEST['b_dname'];
        $b_email = $_REQUEST['b_email'];

        if ($b_dname == '') { $b_dname = $b_fname . ' ' . $b_lname; }

        $query = $mysqli->prepare("SELECT id FROM m_entries WHERE mid = ? AND displayname = ?");
        $query->bind_param('ss',$bid, $b_dname);
        $query->execute();
        $query->store_result();
        $query->bind_result($e_id);
        $qnr = $query->num_rows;
        $query->close();

        if ($qnr > 0) {
            include "incl_header.php";
            include "incl_body.php";
?>
            <br><br>

            <table width="70%" align="center" border="1">
                <tr>
                    <td align="left">You may only have one entry for this March Madness contest per display name; if you wish to have multiple entries, please change your display name to something else for this entry on the previous page.
                    </td>
                </tr>
            </table>
<?
        } else if (($b_fname == '') || ($b_lname == '') || ($b_email == '')) {
            include "incl_header.php";
            include "incl_body.php";
?>
            <br><br>

            <table width="70%" align="center" border="1">
                <tr>
                    <td align="left">One or more required fields on the previous page were not entered; please return to
                        that page using your browser's back button and try again. Note that only the display name is
                        optional.
                    </td>
                </tr>
            </table>
<?
        } else {
            include "incl_header.php";
?>
                <script>
                        function activateTeam(m_row, m_team) {
                                var name = 'row_';
                                var name_team = name.concat(m_row.toString(),'_',m_team.toString());
                                var name_teamc = name.concat(m_row.toString(),'_',m_team.toString(),'c');

                                if (document.getElementById(name_teamc).checked == true) {
                                        document.getElementById(name_teamc).checked = false;
                                } else {
                                        document.getElementById(name_teamc).checked = true;
                                }
                                checkValues();
                        }

                        function checkValues() {

                                var name = 'row_';
                                var all_okay = true;
                                for (i = 1; i <= 6; i++) {
                                        var tj = 4;
                                        var tn = 2;
                                        if (i == 2) { tj = 8; tn = 3; }
                                        else if (i == 3) { tj = 12; tn = 4; }
                                        else if (i == 4) { tj = 16; tn = 5; }
                                        else if (i == 5) { tj = 8; tn = 4; }
										else if (i == 6) { tj = 16; tn = 4; }
                                        var total = 0;
                                        for (j = 1; j <= tj; j++) {
                                                var name_teamc = name.concat(i.toString(),'_',j.toString(),'c');
                                                if (document.getElementById(name_teamc).checked == true) {
                                                        total++;
                                                }
                                        }
                                        var remain = tn - total;
                                        var name_row = name.concat(i.toString());
                                        document.getElementById(name_row).innerHTML = remain.toString();
                                        if (remain == 0) {
                                                document.getElementById(name_row).style.backgroundColor = 'lightgreen';
                                        } else {
                                                document.getElementById(name_row).style.backgroundColor = '#ff6347';
                                                all_okay = false;
                                        }
                                        for (j = 1; j <= tj; j++) {
                                                var name_team = name.concat(i.toString(),'_',j.toString());
                                                var name_teamc = name.concat(i.toString(),'_',j.toString(),'c');
                                                if (document.getElementById(name_teamc).checked == true) {
                                                        if (remain == 0) {
                                                                document.getElementById(name_team).style.backgroundColor = 'lightgreen';
                                                        } else {
                                                                document.getElementById(name_team).style.backgroundColor = 'yellow';
                                                        }
                                                } else {
                                                        document.getElementById(name_team).style.backgroundColor = 'white';
                                                }
                                        }

                                }
                                if (all_okay) {
                                        document.getElementById('submit').disabled = false;
                                } else {
                                        document.getElementById('submit').disabled = true;
                                }

                        }
                </script>


        </head>
        <body onload="checkValues();">

<h1><a href="./index.php">Roanoke College March Madness Pool</a></h1>

<br><br>

                <table width="80%" align="center" border="1">
                        <tr>
                                <td>Please make your selections below.  Pick 2 teams from the first row, 3 teams from the second row, 4 teams from the third row, 5 teams from the fourth row, 4 teams from the fifth row, and 4 teams from the sixth row.  The column on the right will keep track of the number of picks remaining in each row.  First round winners get 1 point, second round winners get 3 points, third round winners get 5 points, fourth round winners get 7 points, fifth round winners get 9 points, and the final round winner gets 12 points.<br><br>Top two point totals and the lowest point total at the end will win; tiebreaker is the number of teams in the final 2, the final 4, and so on.<br><br>Information on submitting your donation of $1.00 will be on your confirmation page after enrollment is complete.</td>
                        </tr>
                </table>

                <br><br>
        <form action="./index.php?action=enroll3" method="post">
        <input type="hidden" name="bid" value="<? echo $b_id; ?>">
        <input type="hidden" name="b_fname" value="<? echo $b_fname; ?>">
        <input type="hidden" name="b_lname" value="<? echo $b_lname; ?>">
        <input type="hidden" name="b_dname" value="<? echo $b_dname; ?>">
        <input type="hidden" name="b_email" value="<? echo $b_email; ?>">

                <table width="80%" align="center" border="1">
                        <tr>
                                <td></td>
                                <td align="center"><b>Seed</b></td>
                                <td align="center"><b>Midwest</b></td>
                                <td align="center"><b>West</b></td>
                                <td align="center"><b>East</b></td>
                                <td align="center"><b>South</b></td>
                                <td align="center"><b>Picks Left</b></td>
                        </tr>
                        <tr>
                                <td align="center"><b>Pick 2 Teams</b></td>
                                <td align="center">1</td>
<?
    $query = $mysqli->prepare("SELECT id, name FROM m_teams WHERE mid = ? AND seed = 1 ORDER BY lid ASC");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $query->bind_result($t_id, $t_name);
    $i = 1;
    while ($query->fetch()) {
?>
                                <td align="left" id="row_1_<? echo $i; ?>" onclick="activateTeam(1,<? echo $i; ?>);">
                                        <input id="row_1_<? echo $i; ?>c" type="checkbox" name="team_<? echo $t_id; ?>" value="1" onClick="activateTeam(1,<? echo $i; ?>);"> <? echo $t_name; ?>
                                </td>
<?
        $i++;
    }
    $query->close();
?>
                                <td id="row_1" align="center"></td>
                        </tr>
                </table>
                <br>
                <table width="80%" align="center" border="1">
                        <tr>
                                <td></td>
                                <td align="center"><b>Seed</b></td>
                                <td align="center"><b>Midwest</b></td>
                                <td align="center"><b>West</b></td>
                                <td align="center"><b>East</b></td>
                                <td align="center"><b>South</b></td>
                                <td align="center"><b>Picks Left</b></td>
                        </tr>
                        <tr>
                                <td align="center" rowspan="2"><b>Pick 3 Teams</b></td>
                                <td align="center">2</td>
<?
    $query = $mysqli->prepare("SELECT id, name FROM m_teams WHERE mid = ? AND seed = 2 ORDER BY lid ASC");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $query->bind_result($t_id, $t_name);
    $i = 1;
    while ($query->fetch()) {
?>
                                <td align="left" id="row_2_<? echo $i; ?>" onclick="activateTeam(2,<? echo $i; ?>);">
                                        <input id="row_2_<? echo $i; ?>c" type="checkbox" name="team_<? echo $t_id; ?>" value="1" onClick="activateTeam(2,<? echo $i; ?>);"> <? echo $t_name; ?>
                                </td>
<?
        $i++;
    }
?>
                                <td id="row_2" align="center" rowspan="2"></td>
                        </tr>
                        <tr>
                                <td align="center">3</td>
<?
    $query = $mysqli->prepare("SELECT id, name FROM m_teams WHERE mid = ? AND seed = 3 ORDER BY lid ASC");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $query->bind_result($t_id, $t_name);
    while ($query->fetch()) {
?>
                                <td align="left" id="row_2_<? echo $i; ?>" onclick="activateTeam(2,<? echo $i; ?>);">
                                        <input id="row_2_<? echo $i; ?>c" type="checkbox" name="team_<? echo $t_id; ?>" value="1" onClick="activateTeam(2,<? echo $i; ?>);"> <? echo $t_name; ?>
                                </td>
<?
        $i++;
    }
?>
                        </tr>
                </table>
                <br>
                <table width="80%" align="center" border="1">
                        <tr>
                                <td></td>
                                <td align="center"><b>Seed</b></td>
                                <td align="center"><b>Midwest</b></td>
                                <td align="center"><b>West</b></td>
                                <td align="center"><b>East</b></td>
                                <td align="center"><b>South</b></td>
                                <td align="center"><b>Picks Left</b></td>
                        </tr>
                        <tr>
                                <td align="center" rowspan="3"><b>Pick 4 Teams</b></td>
                                <td align="center">4</td>
<?
    $query = $mysqli->prepare("SELECT id, name FROM m_teams WHERE mid = ? AND seed = 4 ORDER BY lid ASC");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $query->bind_result($t_id, $t_name);
    $i = 1;
    while ($query->fetch()) {
?>
                                <td align="left" id="row_3_<? echo $i; ?>" onclick="activateTeam(3,<? echo $i; ?>);">
                                        <input id="row_3_<? echo $i; ?>c" type="checkbox" name="team_<? echo $t_id; ?>" value="1" onClick="activateTeam(3,<? echo $i; ?>);"> <? echo $t_name; ?>
                                </td>
<?
        $i++;
    }
?>
                                <td id="row_3" align="center" rowspan="3"></td>
                        </tr>
                        <tr>
                                <td align="center">5</td>
<?
    $query = $mysqli->prepare("SELECT id, name FROM m_teams WHERE mid = ? AND seed = 5 ORDER BY lid ASC");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $query->bind_result($t_id, $t_name);
    while ($query->fetch()) {
?>
                                <td align="left" id="row_3_<? echo $i; ?>" onclick="activateTeam(3,<? echo $i; ?>);">
                                        <input id="row_3_<? echo $i; ?>c" type="checkbox" name="team_<? echo $t_id; ?>" value="1" onClick="activateTeam(3,<? echo $i; ?>);"> <? echo $t_name; ?>
                                </td>
<?
        $i++;
    }
?>
                        </tr>
                        <tr>
                                <td align="center">6</td>
<?
    $query = $mysqli->prepare("SELECT id, name FROM m_teams WHERE mid = ? AND seed = 6 ORDER BY lid ASC");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $query->bind_result($t_id, $t_name);
    while ($query->fetch()) {
?>
                                <td align="left" id="row_3_<? echo $i; ?>" onclick="activateTeam(3,<? echo $i; ?>);">
                                        <input id="row_3_<? echo $i; ?>c" type="checkbox" name="team_<? echo $t_id; ?>" value="1" onClick="activateTeam(3,<? echo $i; ?>);"> <? echo $t_name; ?>
                                </td>
<?
        $i++;
    }
?>
                        </tr>
                </table>
                <br>
                <table width="80%" align="center" border="1">
                        <tr>
                                <td></td>
                                <td align="center"><b>Seed</b></td>
                                <td align="center"><b>Midwest</b></td>
                                <td align="center"><b>West</b></td>
                                <td align="center"><b>East</b></td>
                                <td align="center"><b>South</b></td>
                                <td align="center"><b>Picks Left</b></td>
                        </tr>
                        <tr>
                                <td align="center" rowspan="4"><b>Pick 5 Teams</b></td>
                                <td align="center">7</td>
<?
    $query = $mysqli->prepare("SELECT id, name FROM m_teams WHERE mid = ? AND seed = 7 ORDER BY lid ASC");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $query->bind_result($t_id, $t_name);
    $i = 1;
    while ($query->fetch()) {
?>
                                <td align="left" id="row_4_<? echo $i; ?>" onclick="activateTeam(4,<? echo $i; ?>);">
                                        <input id="row_4_<? echo $i; ?>c" type="checkbox" name="team_<? echo $t_id; ?>" value="1" onClick="activateTeam(4,<? echo $i; ?>);"> <? echo $t_name; ?>
                                </td>
<?
        $i++;
    }
?>
                                <td id="row_4" align="center" rowspan="4"></td>
                        </tr>
                        <tr>
                                <td align="center">8</td>
<?
    $query = $mysqli->prepare("SELECT id, name FROM m_teams WHERE mid = ? AND seed = 8 ORDER BY lid ASC");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $query->bind_result($t_id, $t_name);
    while ($query->fetch()) {
?>
                                <td align="left" id="row_4_<? echo $i; ?>" onclick="activateTeam(4,<? echo $i; ?>);">
                                        <input id="row_4_<? echo $i; ?>c" type="checkbox" name="team_<? echo $t_id; ?>" value="1" onClick="activateTeam(4,<? echo $i; ?>);"> <? echo $t_name; ?>
                                </td>
<?
        $i++;
    }
?>
                        </tr>
                        <tr>
                                <td align="center">9</td>
<?
    $query = $mysqli->prepare("SELECT id, name FROM m_teams WHERE mid = ? AND seed = 9 ORDER BY lid ASC");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $query->bind_result($t_id, $t_name);
    while ($query->fetch()) {
?>
                                <td align="left" id="row_4_<? echo $i; ?>" onclick="activateTeam(4,<? echo $i; ?>);">
                                        <input id="row_4_<? echo $i; ?>c" type="checkbox" name="team_<? echo $t_id; ?>" value="1" onClick="activateTeam(4,<? echo $i; ?>);"> <? echo $t_name; ?>
                                </td>
<?
        $i++;
    }
?>
                        </tr>
                        <tr>
                                <td align="center">10</td>
<?
    $query = $mysqli->prepare("SELECT id, name FROM m_teams WHERE mid = ? AND seed = 10 ORDER BY lid ASC");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $query->bind_result($t_id, $t_name);
    while ($query->fetch()) {
?>
                                <td align="left" id="row_4_<? echo $i; ?>" onclick="activateTeam(4,<? echo $i; ?>);">
                                        <input id="row_4_<? echo $i; ?>c" type="checkbox" name="team_<? echo $t_id; ?>" value="1" onClick="activateTeam(4,<? echo $i; ?>);"> <? echo $t_name; ?>
                                </td>
<?
        $i++;
    }
?>
                        </tr>
                </table>
                <br>
                <table width="80%" align="center" border="1">
                        <tr>
                                <td></td>
                                <td align="center"><b>Seed</b></td>
                                <td align="center"><b>Midwest</b></td>
                                <td align="center"><b>West</b></td>
                                <td align="center"><b>East</b></td>
                                <td align="center"><b>South</b></td>
                                <td align="center"><b>Picks Left</b></td>
                        </tr>
                        <tr>
                                <td align="center" rowspan="6"><b>Pick 4 Teams</b></td>
                                <td align="center">11</td>
<?
    $query = $mysqli->prepare("SELECT id, name FROM m_teams WHERE mid = ? AND seed = 11 ORDER BY lid ASC");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $query->bind_result($t_id, $t_name);
    $i = 1;
    while ($query->fetch()) {
?>
                                <td align="left" id="row_5_<? echo $i; ?>" onclick="activateTeam(5,<? echo $i; ?>);">
                                        <input id="row_5_<? echo $i; ?>c" type="checkbox" name="team_<? echo $t_id; ?>" value="1" onClick="activateTeam(5,<? echo $i; ?>);"> <? echo $t_name; ?>
                                </td>
<?
        $i++;
    }
?>
                                <td id="row_5" align="center" rowspan="6"></td>
                        </tr>
                        <tr>
                                <td align="center">12</td>
<?
    $query = $mysqli->prepare("SELECT id, name FROM m_teams WHERE mid = ? AND seed = 12 ORDER BY lid ASC");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $query->bind_result($t_id, $t_name);
    while ($query->fetch()) {
?>
                                <td align="left" id="row_5_<? echo $i; ?>" onclick="activateTeam(5,<? echo $i; ?>);">
                                        <input id="row_5_<? echo $i; ?>c" type="checkbox" name="team_<? echo $t_id; ?>" value="1" onClick="activateTeam(5,<? echo $i; ?>);"> <? echo $t_name; ?>
                                </td>
<?
        $i++;
    }
?>
                        </tr>
                </table>
                <br>
                <table width="80%" align="center" border="1">
                        <tr>
                                <td></td>
                                <td align="center"><b>Seed</b></td>
                                <td align="center"><b>Midwest</b></td>
                                <td align="center"><b>West</b></td>
                                <td align="center"><b>East</b></td>
                                <td align="center"><b>South</b></td>
                                <td align="center"><b>Picks Left</b></td>
                        </tr>
                        <tr>
                                <td align="center" rowspan="6"><b>Pick 4 Teams</b></td>
                                <td align="center">13</td>
<?
    $query = $mysqli->prepare("SELECT id, name FROM m_teams WHERE mid = ? AND seed = 13 ORDER BY lid ASC");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $query->bind_result($t_id, $t_name);
	$i = 1;
    while ($query->fetch()) {
?>
                                <td align="left" id="row_6_<? echo $i; ?>" onclick="activateTeam(6,<? echo $i; ?>);">
                                        <input id="row_6_<? echo $i; ?>c" type="checkbox" name="team_<? echo $t_id; ?>" value="1" onClick="activateTeam(6,<? echo $i; ?>);"> <? echo $t_name; ?>
                                </td>
<?
        $i++;
    }
?>
                                <td id="row_6" align="center" rowspan="6"></td>
                        </tr>
                        <tr>
                                <td align="center">14</td>
<?
    $query = $mysqli->prepare("SELECT id, name FROM m_teams WHERE mid = ? AND seed = 14 ORDER BY lid ASC");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $query->bind_result($t_id, $t_name);
    while ($query->fetch()) {
?>
                                <td align="left" id="row_6_<? echo $i; ?>" onclick="activateTeam(6,<? echo $i; ?>);">
                                        <input id="row_6_<? echo $i; ?>c" type="checkbox" name="team_<? echo $t_id; ?>" value="1" onClick="activateTeam(6,<? echo $i; ?>);"> <? echo $t_name; ?>
                                </td>
<?
        $i++;
    }
?>
                        </tr>
                        <tr>
                                <td align="center">15</td>
<?
    $query = $mysqli->prepare("SELECT id, name FROM m_teams WHERE mid = ? AND seed = 15 ORDER BY lid ASC");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $query->bind_result($t_id, $t_name);
    while ($query->fetch()) {
?>
                                <td align="left" id="row_6_<? echo $i; ?>" onclick="activateTeam(6,<? echo $i; ?>);">
                                        <input id="row_6_<? echo $i; ?>c" type="checkbox" name="team_<? echo $t_id; ?>" value="1" onClick="activateTeam(6,<? echo $i; ?>);"> <? echo $t_name; ?>
                                </td>
<?
        $i++;
    }
?>
                        </tr>
                        <tr>
                                <td align="center">16</td>
<?
    $query = $mysqli->prepare("SELECT id, name FROM m_teams WHERE mid = ? AND seed = 16 ORDER BY lid ASC");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $query->bind_result($t_id, $t_name);
    while ($query->fetch()) {
?>
                                <td align="left" id="row_6_<? echo $i; ?>" onclick="activateTeam(6,<? echo $i; ?>);">
                                        <input id="row_6_<? echo $i; ?>c" type="checkbox" name="team_<? echo $t_id; ?>" value="1" onClick="activateTeam(6,<? echo $i; ?>);"> <? echo $t_name; ?>
                                </td>
<?
        $i++;
    }
?>
                        </tr>
                </table>
<br>
    <center><input id="submit" type="submit" value="Finish Enrollment"></center>
        </form>
<?
        }
    }
?>