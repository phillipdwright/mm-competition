<?

        $user_id = $_REQUEST['eid'];

        $query = $mysqli->prepare("SELECT mid, optout FROM m_entries WHERE id = ?");
        $query->bind_param('s',$user_id);
        $query->execute();
        $query->store_result();

        if ($query->num_rows > 0) {

                $query->bind_result($mid,$optout);
                $query->fetch();
                $query->close();
                        
                if ($optout == 0) { $optout = 1; } else { $optout = 0; }
                        
                $query2 = $mysqli->prepare("UPDATE m_entries SET optout = ? WHERE id = ?");
                $query2->bind_param('ss',$optout,$user_id);
                $query2->execute();
                $query2->close();

        }
        
        header("Location: index.php?action=donations&bid=" . $mid);
        die();

?>
