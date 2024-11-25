<?php
include "../actions/get_users.php";
$var_data = get_all();

foreach ($var_data as $var_row){
    echo '<tr>
            <td>' . $var_row['fName'] . ' ' . $var_row['lName'] . '</td>
            <td>' . $var_row['email'] . '</td>
            <td>' . $var_row['role'] . '</td>
            <td>
                <a href="#">
                <button href="edit_chore_view.php">Edit</button>
                </a>

                <a href="#">
                <button href="../actions/delete_chore_action.php">Delete</button>
                </a>
            </td>
        </tr>';
}
?>