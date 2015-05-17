<?php require("db_connect.php"); ?>

<div class="block-news">
    <div class="newsticker">
        <ul>
            <?php
            $sql = "SELECT posts.id, posts.parent_id, posts.text, posts.date_add, users.login FROM posts LEFT JOIN users ON posts.parent_id=users.id ORDER BY posts.id DESC LIMIT 20";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $row['date'] = date('d.m.Y', strtotime($row['date_add']));
                    ?>
                    <li>
                        <span><?php echo $row['date']; ?></span>
                        <a href="userpage.php?id=<?php echo $row['parent_id']; ?>"><?php echo $row['login']; ?></a>
                        <p><?php echo $row['text']; ?></p>
                    </li>

                <?php
                }

            }
            $conn->close();
            ?>
        </ul>
    </div>
</div>