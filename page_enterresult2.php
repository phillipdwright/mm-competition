<?

        $bid = $_REQUEST['bid'];

        $lid = $_REQUEST['lid'];
        $round = $_REQUEST['round'];
        $seed = $_REQUEST['seed'];

        $query = $mysqli->prepare("UPDATE m_teams SET wins = ? WHERE mid = ? AND lid = ? AND seed = ?");
        $query->bind_param('ssss',$round, $bid, $lid, $seed);
        $query->execute();
        $query->close();

        if ($round == 1) {

            $opp = 17 - $seed;

            $newround = $round - 1;
            $query = $mysqli->prepare("UPDATE m_teams SET wins = ? WHERE mid = ? AND lid = ? AND seed = ?");
            $query->bind_param('ssss',$newround, $bid, $lid, $opp);
            $query->execute();
            $query->close();

        } else if (($round > 1) && ($round < 4)) {

            $toFix = array();

            switch ($round) {
                case 2:
                    switch ($seed) {
                        case 1:
                            $toFix = array(16, 8, 9);
                            break;
                        case 2:
                            $toFix = array(7, 10, 15);
                            break;
                        case 3:
                            $toFix = array(14, 6, 11);
                            break;
                        case 4:
                            $toFix = array(5, 12, 13);
                            break;
                        case 5:
                            $toFix = array(4, 12, 13);
                            break;
                        case 6:
                            $toFix = array(3, 14, 11);
                            break;
                        case 7:
                            $toFix = array(10, 15, 2);
                            break;
                        case 8:
                            $toFix = array(16, 1, 9);
                            break;
                        case 9:
                            $toFix = array(16, 8, 1);
                            break;
                        case 10:
                            $toFix = array(2, 7, 15);
                            break;
                        case 11:
                            $toFix = array(3, 14, 6);
                            break;
                        case 12:
                            $toFix = array(5, 4, 13);
                            break;
                        case 13:
                            $toFix = array(5, 4, 12);
                            break;
                        case 14:
                            $toFix = array(3, 6, 11);
                            break;
                        case 15:
                            $toFix = array(10, 2, 7);
                            break;
                        case 16:
                            $toFix = array(1, 8, 9);
                            break;
                    }
                    break;
                case 3:
                    switch ($seed) {
                        case 1:
                            $toFix = array(16, 8, 9, 5, 12, 4, 13);
                            break;
                        case 2:
                            $toFix = array(7, 10, 15, 6, 11, 3, 14);
                            break;
                        case 3:
                            $toFix = array(7, 10, 15, 6, 11, 14, 2);
                            break;
                        case 4:
                            $toFix = array(16, 8, 9, 5, 12, 13, 1);
                            break;
                        case 5:
                            $toFix = array(16, 8, 9, 12, 4, 13, 1);
                            break;
                        case 6:
                            $toFix = array(7, 10, 15, 11, 3, 14, 2);
                            break;
                        case 7:
                            $toFix = array(10, 15, 6, 11, 3, 14, 2);
                            break;
                        case 8:
                            $toFix = array(16, 9, 5, 12, 4, 13, 1);
                            break;
                        case 9:
                            $toFix = array(16, 8, 5, 12, 4, 13, 1);
                            break;
                        case 10:
                            $toFix = array(7, 15, 6, 11, 3, 14, 2);
                            break;
                        case 11:
                            $toFix = array(7, 10, 15, 6, 3, 14, 2);
                            break;
                        case 12:
                            $toFix = array(16, 8, 9, 5, 4, 13, 1);
                            break;
                        case 13:
                            $toFix = array(16, 8, 9, 5, 12, 4, 1);
                            break;
                        case 14:
                            $toFix = array(7, 10, 15, 6, 11, 3, 2);
                            break;
                        case 15:
                            $toFix = array(7, 10, 6, 11, 3, 14, 2);
                            break;
                        case 16:
                            $toFix = array(8, 9, 5, 12, 4, 13, 1);
                            break;
                    }
                    break;
            }

            foreach ($toFix as $i) {

                $newround = $round - 1;
                $query = $mysqli->prepare("UPDATE m_teams SET wins = ? WHERE mid = ? AND lid = ? AND seed = ? AND wins >= ?");
                $query->bind_param('sssss',$newround, $bid, $lid, $i, $round);
                $query->execute();
                $query->close();


            }

        } else if ($round == 4) {

                $newround = $round - 1;
                $query = $mysqli->prepare("UPDATE m_teams SET wins = ? WHERE mid = ? AND lid = ? AND seed != ? AND wins >= ?");
                $query->bind_param('sssss',$newround, $bid, $lid, $seed, $round);
                $query->execute();
                $query->close();

        } else if ($round == 5) {

                $complid = ($lid + 2) % 4; if ($complid == 0) { $complid = 4; }

                $newround = $round - 1;
                $query = $mysqli->prepare("UPDATE m_teams SET wins = ? WHERE mid = ? AND lid = ? AND wins >= ? AND seed != ?");
                $query->bind_param('sssss',$newround, $bid, $complid, $round, $seed);
                $query->execute();
                $query->close();

        } else if ($round == 6) {

                $newround = $round - 1;
                $query = $mysqli->prepare("UPDATE m_teams SET wins = ? WHERE mid = ? AND wins >= ? AND seed != ?");
                $query->bind_param('ssss',$newround, $bid, $round, $seed);
                $query->execute();
                $query->close();

        }

        header("Location: index.php?action=enterresult1&bid=" . $bid);
        die();

?>
