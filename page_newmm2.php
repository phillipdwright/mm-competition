<?

        $b_name = $_REQUEST['b_name'];
        $b_starttime = $_REQUEST['b_starttime'];
        $b_endtime = $_REQUEST['b_endtime'];

        $query = $mysqli->prepare("INSERT INTO m_events (name, starttime, endtime, lastupdate) VALUES (?, ?, ?, NOW())");
        $query->bind_param('sss',$b_name,$b_starttime,$b_endtime);
        $query->execute();
        $b_id = $query->insert_id;
        $query->close();

        // LID: 1 = MIDWEST, 2 = WEST, 3 = EAST, 4 = SOUTH

        for ($i = 1; $i <= 16; $i++) {

            $req_string = 'midwest_' . $i;
            $t_midwest = $_REQUEST[$req_string];
            $req_string = 'west_' . $i;
            $t_west = $_REQUEST[$req_string];
            $req_string = 'east_' . $i;
            $t_east = $_REQUEST[$req_string];
            $req_string = 'south_' . $i;
            $t_south = $_REQUEST[$req_string];
            if ($t_midwest == "") { $t_midwest = "Temp Value"; }
            if ($t_west == "") { $t_west = "Temp Value"; }
            if ($t_east == "") { $t_east = "Temp Value"; }
            if ($t_south == "") { $t_south = "Temp Value"; }

            $j = 1;
            echo "INSERT INTO m_teams (mid, seed, lid, name) VALUES (?, ?, ?, ?)<br>";
            echo $b_id . " " . $i . " " . $j . " " . $t_midwest . "<br>";

            $query = $mysqli->prepare("INSERT INTO m_teams (mid, seed, lid, name) VALUES (?, ?, ?, ?)");
            $query->bind_param('ssss', $b_id, $i, $j, $t_midwest);
            $query->execute();
            $query->close();
            $j++;
            $query = $mysqli->prepare("INSERT INTO m_teams (mid, seed, lid, name) VALUES (?, ?, ?, ?)");
            $query->bind_param('ssss', $b_id, $i, $j, $t_west);
            $query->execute();
            $query->close();
            $j++;
            $query = $mysqli->prepare("INSERT INTO m_teams (mid, seed, lid, name) VALUES (?, ?, ?, ?)");
            $query->bind_param('ssss', $b_id, $i, $j, $t_east);
            $query->execute();
            $query->close();
            $j++;
            $query = $mysqli->prepare("INSERT INTO m_teams (mid, seed, lid, name) VALUES (?, ?, ?, ?)");
            $query->bind_param('ssss', $b_id, $i, $j, $t_south);
            $query->execute();
            $query->close();

        }

        header("Location: index.php?action=admin");
        die();
?>