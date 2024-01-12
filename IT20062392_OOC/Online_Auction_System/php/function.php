<?php
function nic_exists($nic,$connection)
{
    $row =mysqli_query($connection, "SELECT fname from customer where NIC = '$nic'");
    {
        if(mysqli_num_rows($row)==1)
        {
            return true;
        }

        else
        {
            return false;
        }
    }
}

//function used to check wheather it is logged in while creating a cookie
function logged_in()
{
    if($_SESSION['id']=='' || $_COOKIE ['name'] == '')
    {
        return true;
    }

    else
    {
        return false;
    }
}


?>