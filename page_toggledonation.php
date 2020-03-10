<?

        $user_id = $_REQUEST['eid'];

        $query = $mysqli->prepare("SELECT mid, paid FROM m_entries WHERE id = ?");
        $query->bind_param('s',$user_id);
        $query->execute();
        $query->store_result();

        if ($query->num_rows > 0) {

                $query->bind_result($mid,$paid);
                $query->fetch();
                $query->close();
                        
                if ($paid == 0) { $paid = 1; } else { $paid = 0; }
                        
                $query2 = $mysqli->prepare("UPDATE m_entries SET paid = ? WHERE id = ?");
                $query2->bind_param('ss',$paid,$user_id);
                $query2->execute();
                $query2->close();

        }
        
        header("Location: index.php?action=donations&bid=" . $mid);
        die();

?>
