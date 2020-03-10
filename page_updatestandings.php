<?

    $bid = $_REQUEST['bid'];

    // zero out current player scores and such

    $query = $mysqli->prepare("UPDATE m_entries SET points = 0 WHERE mid = ?");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->close();

    // iterate through all entries and get joined table of player's selections with team results

    $query = $mysqli->prepare("SELECT id FROM m_entries WHERE mid = ?");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $query->bind_result($e_id);

    while ($query->fetch()) {

        $cur_points = 0;

        $query2 = $mysqli->prepare("SELECT t.wins FROM m_teams as t, m_entries_data as d WHERE d.eid = ? AND t.id = d.tid");
        $query2->bind_param('s',$e_id);
        $query2->execute();
        $query2->store_result();
        $query2->bind_result($t_wins);

        while ($query2->fetch()) {

            switch ($t_wins) {
                case 1:
                    $cur_points += 1;
                    break;
                case 2:
                    $cur_points += 4;
                    break;
                case 3:
                    $cur_points += 9;
                    break;
                case 4:
                    $cur_points += 16;
                    break;
                case 5:
                    $cur_points += 25;
                    break;
                case 6:
                    $cur_points += 37;
                    break;
            }

        }
        $query2->close();

        $query2 = $mysqli->prepare("UPDATE m_entries SET points = ? WHERE id = ?");
        $query2->bind_param('ss',$cur_points,$e_id);
        $query2->execute();
        $query2->close();

    }
    $query->close();

    // determine what round we're in at the moment

    $round = 0;

    $query = $mysqli->prepare("SELECT id FROM m_teams WHERE mid = ? AND wins >= 1");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $num_rows = $query->num_rows;
    $query->close();

    if ($num_rows == 32) { $round = 1; }

    $query = $mysqli->prepare("SELECT id FROM m_teams WHERE mid = ? AND wins >= 2");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $num_rows = $query->num_rows;
    $query->close();

    if ($num_rows == 16) { $round = 2; }

    $query = $mysqli->prepare("SELECT id FROM m_teams WHERE mid = ? AND wins >= 3");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $num_rows = $query->num_rows;
    $query->close();

    if ($num_rows == 8) { $round = 3; }

    $query = $mysqli->prepare("SELECT id FROM m_teams WHERE mid = ? AND wins >= 4");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $num_rows = $query->num_rows;
    $query->close();

    if ($num_rows == 4) { $round = 4; }

    $query = $mysqli->prepare("SELECT id FROM m_teams WHERE mid = ? AND wins >= 5");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $num_rows = $query->num_rows;
    $query->close();

    if ($num_rows == 2) { $round = 5; }

    $query = $mysqli->prepare("SELECT id FROM m_teams WHERE mid = ? AND wins >= 6");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $num_rows = $query->num_rows;
    $query->close();

    if ($num_rows == 1) { $round = 6; }

    // update last updated and current round

    $query = $mysqli->prepare("UPDATE m_events SET lastupdate = NOW(), round = ? WHERE id = ?");
    $query->bind_param('ss',$round, $bid);
    $query->execute();
    $query->close();

	// update the remaining teams!
	
    $query = $mysqli->prepare("SELECT id FROM m_entries WHERE mid = ?");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $query->bind_result($e_id);

    while ($query->fetch()) {
	
		// grab all teams left with the correct numbers of wins for the current round, already set as $round
		
		$query2 = $mysqli->prepare("SELECT t.id FROM m_entries_data as ed, m_teams as t WHERE ed.tid = t.id AND t.inactive = 0 AND ed.eid = ?");
		$query2->bind_param('s',$e_id);
		$query2->execute();
		$query2->store_result();
		$total_left = $query2->num_rows;
		$query2->close();
		
		$query2 = $mysqli->prepare("UPDATE m_entries SET remaining = ? WHERE id = ?");
		$query2->bind_param('ss',$total_left,$e_id);
		$query2->execute();
		$query2->close();
		
	}
	
	$query->close();

    header("Location: index.php?action=admin");
    die();

?>
