<?php include 'session.php'; ?>
<!-- REGISTER START -->

<!-- MEMBERSHIP -->

<?php

if (isset($_POST["add_member"])) {

    error_reporting(0);

    $firstname = htmlspecialchars($_POST['firstname']);
    $surname = htmlspecialchars($_POST['surname']);
    $othername = htmlspecialchars($_POST['othername']);
    $dob = htmlspecialchars($_POST['dob']);
    $role = implode(",",$_POST['role']);
    $ministry = htmlspecialchars($_POST['ministry']);
    $residence = htmlspecialchars($_POST['residence']);
    $marital_status = htmlspecialchars($_POST['marital_status']);
    $gender = htmlspecialchars($_POST['gender']);
    $phone_number = htmlspecialchars($_POST['phone_number']);
    $occupation = htmlspecialchars($_POST['occupation']);

    $query = "SELECT * FROM members WHERE firstname =:firstname AND surname =:surname AND role =:role AND ministry =:ministry AND occupation =:occupation AND phone_number =:phone_number";
    $stmt = $db->prepare($query);
    $stmt->execute([':firstname' => $firstname, ':surname' => $surname, ':role' => $role, ':ministry' => $ministry, ':occupation' => $occupation, ':phone_number' => $phone_number]);
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $row_firstname = $row['firstname'];
        $row_surname = $row['surname'];
        $row_role = $row['role'];
        $row_ministry = $row['ministry'];
        $row_occupation = $row['occupation'];
        $row_phone_number = $row['phone_number'];

    }
    
    if ($marital_status === "Null") {
        
        echo '<script>alert("Marital Status is Invalid");</script>';
        echo '<script>window.location="membership.php";</script>';
    }
    elseif ($gender === "Null") {
        
        echo '<script>alert("Gender is Invalid");</script>';
        echo '<script>window.location="membership.php";</script>';
    }
    elseif ($row_firstname != $firstname && $row_surname != $surname && $row_role != $role && $row_ministry != $ministry && $row_occupation != $occupation && $row_phone_number != $phone_number){
        
            $query = "INSERT INTO members(firstname, surname, othername, dob, role, ministry, residence, marital_status, gender, phone_number, occupation) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $values = array($firstname, $surname, $othername, $dob, $role, $ministry, $residence, $marital_status, $gender, $phone_number, $occupation);
            $stmt = $db->prepare($query);
            $rows = $stmt->execute($values);

            echo '<script>alert("Successful Entry of Data");</script>';
            echo '<script>window.location="membership.php";</script>';
    }
    else {
        
        echo '<script>alert("Duplicate Entry of Data");</script>';
        echo '<script>window.location="membership.php";</script>';
    }
}

?>

<!-- END MEMBERSHIP -->

<!-- MINISTRY -->

<?php

if (isset($_POST["add_ministry"])) {

    error_reporting(0);

    $ministry = htmlspecialchars($_POST['ministry']);

    $query = "SELECT * FROM ministries WHERE ministry =:ministry";
    $stmt = $db->prepare($query);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $row_ministry = $row['ministry'];
    }
        
    if ($row_ministry != $ministry){
        
            $query = "INSERT INTO ministries(ministry) VALUES (?)";
            $values = array($ministry);
            $stmt = $db->prepare($query);
            $rows = $stmt->execute($values);

        echo '<script>alert("Successful Entry of Data");</script>';
        echo '<script>window.location="ministry.php";</script>';
    }
    else {
        
        echo '<script>alert("Duplicate Entry of Data");</script>';
        echo '<script>window.location="ministry.php";</script>';
    }
}

?>

<!-- END MINISTRY -->

<!-- ROLES -->

<?php

if (isset($_POST["add_role"])) {

    error_reporting(0);

    $role = htmlspecialchars($_POST['role']);

    $query = "SELECT * FROM roles WHERE role =:role";
    $stmt = $db->prepare($query);
    $stmt->execute([':role' => $role]);
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $row_role = $row['role'];
    }
       
    if ($row_role != $role){
        
            $query = "INSERT INTO roles(role) VALUES (?)";
            $values = array($role);
            $stmt = $db->prepare($query);
            $rows = $stmt->execute($values);

        echo '<script>alert("Successful Entry of Data");</script>';
        echo '<script>window.location="role.php";</script>';
    }
    else {
        
        echo '<script>alert("Duplicate Entry of Data");</script>';
        echo '<script>window.location="role.php";</script>';
    }
}

?>

<!-- END ROLES -->

<!-- DEPARTMENT -->

<?php

if (isset($_POST["add_department"])) {
    
    error_reporting(0);

    $department = htmlspecialchars($_POST['department']);

    $query = "SELECT * FROM department WHERE department =:department";
    $stmt = $db->prepare($query);
    $stmt->execute([':department' => $department]);
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $row_department = $row['department'];
    }
    
    if ($row_department != $department){
        
            $query = "INSERT INTO department(department) VALUES (?)";
            $values = array($department);
            $stmt = $db->prepare($query);
            $rows = $stmt->execute($values);

        echo '<script>alert("Successful Entry of Data");</script>';
        echo '<script>window.location="department.php";</script>';
    }
    else {
        
        echo '<script>alert("Duplicate Entry of Data");</script>';
        echo '<script>window.location="department.php";</script>';
    }
}

?>

<!-- END DEPARTMENT -->

<!-- ITEMS BOUGHT -->

<?php

if (isset($_POST["add_items_bought"])) {

    error_reporting(0);

    $item = htmlspecialchars($_POST['item']);
    $amount = htmlspecialchars($_POST['amount']);
    $member = htmlspecialchars($_POST['member']);
    $department = htmlspecialchars($_POST['department']);
    $datetime = htmlspecialchars($_POST['date_time']);

    $query = "SELECT * FROM items WHERE item =:item AND amount =:amount AND member =:member AND department =:department";
    $stmt = $db->prepare($query);
    $stmt->execute([':item' => $item, ':amount' => $amount, ':member' => $member, ':department' => $department]);
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $row_item = $row['item'];
        $row_amount = $row['amount'];
        $row_member = $row['member'];
        $row_department = $row['department'];
    }
    
    if ($row_item != $item && $row_amount != $amount && $row_member != $member && $row_department != $department){
        
            $query = "INSERT INTO items(item, member, department, amount, date_time) VALUES (?, ?, ?, ?, ?)";
            $values = array($item, $member, $department, $amount, $datetime);
            $stmt = $db->prepare($query);
            $rows = $stmt->execute($values);

        echo '<script>alert("Successful Entry of Data");</script>';
        echo '<script>window.location="item_view.php";</script>';
    }
    else {
        
        echo '<script>alert("Duplicate Entry of Data");</script>';
        echo '<script>window.location="item_view.php";</script>';
    }
}

?>

<!-- END ITEMS BOUGHT -->

<!-- MONEY LEND -->

<?php

if (isset($_POST["add_money_lend"])) {

    error_reporting(0);

    $member = htmlspecialchars($_POST['member']);
    $amount = htmlspecialchars($_POST['amount']);
    $datetime = htmlspecialchars($_POST['datetime']);

    $query = "SELECT * FROM money_lend WHERE member =:member";
    $stmt = $db->prepare($query);
    $stmt->execute([':member' => $member]);
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $row_member = $row['member'];
        $row_amount = $row['amount'];
        $row_payment = $row['payment'];
    }
    
    if ($row_member && ($row_amount != $row_payment)){
        
        echo '<script>alert("Still Owing Funds");</script>';
        echo '<script>window.location="money_lend.php";</script>';
    }
    else {
        
        $query = "INSERT INTO money_lend(member, amount, datetime_lend) VALUES (?, ?, ?)";
        $values = array($member, $amount, $datetime);
        $stmt = $db->prepare($query);
        $rows = $stmt->execute($values);
    
    echo '<script>alert("Successful Entry of Data");</script>';
    echo '<script>window.location="money_lend.php";</script>';
    }
}

?>

<!-- END MONEY LEND -->

<!-- TITHE -->

<?php

if (isset($_POST["add_tithe"])) {

    error_reporting(0);

    $member = htmlspecialchars($_POST['member']);
    $amount = htmlspecialchars($_POST['amount']);
    $month = htmlspecialchars($_POST['month']);
    $datetime = new DateTime('now', new DateTimeZone('Europe/London'));
    $datetime->setTimezone(new DateTimeZone('Africa/Accra'));
    $date = $datetime->format('Y-m-d H:i:s');

    $query = "SELECT * FROM tithe WHERE member =:member AND amount =:amount AND month =:month";
    $stmt = $db->prepare($query);
    $stmt->execute([':member' => $member, ':amount' => $amount, ':month' => $month]);
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $row_member = $row['member'];
        $row_amount = $row['amount'];
        $row_month = $row['month'];
    }
    
    if ($row_member != $member && $row_amount != $amount && $row_month != $month){
        
            $query = "INSERT INTO tithe(member, amount, month, datetime) VALUES (?, ?, ?, ?)";
            $values = array($member, $amount, $month, $date);
            $stmt = $db->prepare($query);
            $rows = $stmt->execute($values);

        echo '<script>alert("Successful Entry of Data");</script>';
        echo '<script>window.location="tithe.php";</script>';
    }
    else {
        
        echo '<script>alert("Duplicate Entry of Data");</script>';
        echo '<script>window.location="tithe.php";</script>';
    }
}

?>

<!-- END TITHE -->

<!-- OFFERING -->

<?php

if (isset($_POST["add_offering"])) {

    error_reporting(0);

    $amount = htmlspecialchars($_POST['amount']);
    $datetime = htmlspecialchars($_POST['datetime']);

    $query = "SELECT * FROM offering WHERE amount =:amount AND datetime =:datetime";
    $stmt = $db->prepare($query);
    $stmt->execute([':amount' => $amount, ':datetime' => $datetime]);
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $row_amount = $row['amount'];
        $row_datetime = $row['datetime'];
    }
    
    if ($row_amount != $amount && $row_datetime != $datetime){
        
            $query = "INSERT INTO offering(amount, datetime) VALUES (?, ?)";
            $values = array($amount, $datetime);
            $stmt = $db->prepare($query);
            $rows = $stmt->execute($values);

        echo '<script>alert("Successful Entry of Data");</script>';
        echo '<script>window.location="offering.php";</script>';
    }
    else {
        
        echo '<script>alert("Duplicate Entry of Data");</script>';
        echo '<script>window.location="offering.php";</script>';
    }
}

?>

<!-- END OFFERING -->

<!-- ANNUAL HARVEST -->

<?php

if (isset($_POST["add_harvest"])) {

    // error_reporting(0);

    $member = htmlspecialchars($_POST['member']);
    $non_member = htmlspecialchars($_POST['non_member']);
    $pledge = htmlspecialchars($_POST['pledge']);
    $datetime = htmlspecialchars($_POST['datetime']);

    $query = "SELECT * FROM harvest";
    $stmt = $db->prepare($query);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $row_member = $row['member'];
        $row_non_member = $row['non_member'];
        $row_pledge = $row['pledge'];
        $row_payment = $row['payment'];
        $row_datetime = $row['date_pledge'];
    }
    
    if (($row_member == $member && $row_non_member == 'Null' && $row_pledge == $pledge && $row_datetime == $datetime) && ($row_pledge != $row_payment) || ($row_non_member == $non_member && $row_member == 'Null' && $row_pledge == $row_pledge && $row_datetime == $datetime) && ($row_pledge != $row_payment)){
        
        echo '<script>alert("Still Owing Pledge");</script>';
        echo '<script>window.location="harvest.php";</script>';
    }
    elseif($non_member == ''){
        $query = "INSERT INTO harvest(member, non_member, pledge, date_pledge) VALUES (?, ?, ?, ?)";
        $values = array($member, 'Null', $pledge, $datetime);
        $stmt = $db->prepare($query);
        $rows = $stmt->execute($values);
    
    echo '<script>alert("Successful Entry of Data");</script>';
    echo '<script>window.location="harvest.php";</script>';
    }
    elseif($member == 'Null'){
        $query = "INSERT INTO harvest(member, non_member, pledge, date_pledge) VALUES (?, ?, ?, ?)";
        $values = array('Null', $non_member, $pledge, $datetime);
        $stmt = $db->prepare($query);
        $rows = $stmt->execute($values);
    
    echo '<script>alert("Successful Entry of Data");</script>';
    echo '<script>window.location="harvest.php";</script>';
    }
}

?>

<!-- END ANNUAL HARVEST -->

<!-- END REGISTER -->