<?php include 'database.php'; ?>
<!-- START MODALS -->

<!-- MEMBERSHIP MODAL -->

<div class="modal fade" id="member" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">REGISTER MEMBERS</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <div class="modal-body">
                    <form method="post" action="register.php" id="form" role="form">
                        
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" name="firstname" class="form-control" required>
                                    <label for="Firstname">Firstname</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" name="surname" class="form-control" required>
                                    <label for="Surname">Surname</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" name="othername" class="form-control">
                                    <label for="Othername">Othername</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="date" name="dob" class="form-control">
                                    <label for="Date of Birth">Date of Birth</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" name="residence" class="form-control">
                                    <label for="Residence">Residence</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="number" name="phone_number" class="form-control">
                                    <label for="Phone Number">Phone Number</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                        <div class="col-md-6">
                                <div class="form-label-group">
                                    <select class="form-control" name="ministry" required>
                                        <option value="Null"> -- Ministry -- </option>
                                        <?php
                                            $q1 = "SELECT * FROM ministries";
                                            $stmt = $db->prepare($q1);
                                            $stmt->execute();
                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                echo "<option value='" . $row['minid'] . "'>" . $row['ministry'] . "</option>";};
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" name="occupation" class="form-control">
                                    <label for="Occupation">Occupation</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <select class="form-control" name="marital_status" required>
                                        <option value="Null"> --- MARITAL STATUS --- </option>
                                        <option value="Single"> Single </option>
                                        <option value="Married"> Married </option>
                                        <option value="Divorced"> Divorced </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <select class="form-control" name="gender" required>
                                        <option value="Null"> --- GENDER --- </option>
                                        <option value="Male"> Male </option>
                                        <option value="Female"> Female </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                            <strong><span>Select Roles : </span></strong><br/><br/>
                                <?php

                                $checked_arr = array();

                                // Fetch checked values
                                $fetchRoles = "SELECT COUNT(*) FROM roles";
                                $stmt = $db->prepare($fetchRoles);
                                $stmt->execute();
                                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                                while ($row = $stmt->fetchColumn()) {
                                $checked_arr = explode(",",$row['role']);
                                }

                                $roles_arr = array("Pastor","Pastor's Wife","Deacon","Deaconess", "Usher", "Musician", "Singer", "Technician", "Church Worker", "Sunday School Teacher", "Children Teacher", "Interpreter");
                                foreach($roles_arr as $role){

                                $checked = "";
                                if(in_array($role,$checked_arr)){
                                    $checked = "checked";
                                }
                                echo '
                                <table>
                                    <tr>
                                        <td> <input type="checkbox" name="role[]" value="'.$role.'" > '.$checked.' '.$role.' </td> &nbsp
                                    </tr>
                                </table>
                                ';
                                
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    </div>
                        
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-success" id="submit" name="add_member" value="Save" />
                    </div>

            </form>
        </div>
    </div>
</div>

<!-- END MEMBERSHIP -->

<!-- MINISTRY MODAL -->

<div class="modal fade" id="ministry" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">REGISTER MINISTRIES</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="post" action="register.php" id="form" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" name="ministry" class="form-control">
                            <label for="Ministry">Ministry</label>
                        </div>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="add_ministry" class="btn btn-success"> Save </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- END MINISTRY -->

<!-- ROLE MODAL -->

<div class="modal fade" id="role" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">REGISTER ROLES</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                <form method="post" action="register.php" id="form" role="form">

                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" name="role" class="form-control" required>
                            <label for="Role"> Role </label>
                        </div>
                    </div>

                    <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-success" name="add_role" value="Save" />
                    </div>
                    </form>
                </div>
                </div>
    </div>
</div>

<!-- END ROLE -->

<!-- DEPARTMENT MODAL -->

<div class="modal fade" id="department" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">REGISTER DEPARTMENT</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="post" action="register.php" id="form" role="form">

                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" name="department" class="form-control" required>
                        <label for="Department"> Department </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-success" name="add_department" value="Save" />
                </div>
                </form>
                </div>
            </div>
    </div>
</div>

<!-- END DEPARTMENT -->

<!-- ITEMS BOUGHT MODAL -->

<div class="modal fade" id="items_bought" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">REGISTER ITEMS BOUGHT</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <div class="modal-body">
                    <form method="post" action="register.php" id="form" role="form">
                        
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" name="item" class="form-control" required>
                                    <label for="Item">Item</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" name="amount" class="form-control" required>
                                    <label for="Amount">Amount</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <select class="form-control" name="member" required>
                                        <option value="Null"> -- Member -- </option>
                                        <?php
                                            $q1 = "SELECT * FROM members";
                                            $stmt = $db->prepare($q1);
                                            $stmt->execute();
                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option value='" . $row['memberid'] . "'>" . $row['firstname'] . " " . $row['othername'] . " " . $row['surname'] . "</option>";};
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <select class="form-control" name="department" required>
                                        <option value="Null"> --- Department --- </option>
                                        <?php
                                            $q1 = "SELECT * FROM department";
                                            $stmt = $db->prepare($q1);
                                            $stmt->execute();
                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option value='" . $row['deptid'] . "'>" . $row['department'] . "</option>";};
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="datetime-local" name="date_time" class="form-control" required>
                                    <label for="Dateand Time">Date and Time</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                        
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-success" id="submit" name="add_items_bought" value="Save" />
                </div>

            </form>
        </div>
    </div>
</div>

<!-- END ITEMS BOUGHT -->

<!-- MONEY LEND MODAL -->

<div class="modal fade" id="money_lend" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">REGISTER MONEY LEND</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <div class="modal-body">
                    <form method="post" action="register.php" id="form" role="form">

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <select class="form-control" name="member" required>
                                        <option value="Null"> -- Member -- </option>
                                        <?php
                                            $q1 = "SELECT * FROM members";
                                            $stmt = $db->prepare($q1);
                                            $stmt->execute();
                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option value='" . $row['memberid'] . "'>" . $row['firstname'] . " " . $row['othername'] . " " . $row['surname'] . "</option>" ;}
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="number" step="any" name="amount" class="form-control" required>
                                    <label for="Amount">Amount</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="datetime-local" name="datetime" class="form-control" required>
                                    <label for="Date and Time">Date and Time</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                        
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-success" id="submit" name="add_money_lend" value="Save" />
                    </div>

            </form>
        </div>
    </div>
</div>

<!-- MONEY LEND -->

<!-- TITHE MODAL -->

<div class="modal fade" id="tithe" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">REGISTER TITHE</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <div class="modal-body">
                    <form method="post" action="register.php" id="form" role="form">

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <select class="form-control" name="member" required>
                                        <option value="Null"> -- Member -- </option>
                                        <?php
                                            $q1 = "SELECT * FROM members";
                                            $stmt = $db->prepare($q1);
                                            $stmt->execute();
                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option value='" . $row['memberid'] . "'>" . $row['firstname'] . " " . $row['othername'] . " " . $row['surname'] . "</option>" ;}
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="number" step="any" name="amount" class="form-control" required>
                                    <label for="Amount">Amount</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="month" name="month" class="form-control" required>
                                    <label for="Month">Month</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                        
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-success" id="submit" name="add_tithe" value="Save" />
                    </div>

            </form>
        </div>
    </div>
</div>

<!-- TITHE -->

<!-- OFFERING MODAL -->

<div class="modal fade" id="offering" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">REGISTER OFFERING</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <div class="modal-body">
                    <form method="post" action="register.php" id="form" role="form">

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="number" step="any" name="amount" class="form-control" required>
                                    <label for="Amount">Amount</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="datetime-local" name="datetime" class="form-control" required>
                                    <label for="Date and Time">Date and Time</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                        
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-success" id="submit" name="add_offering" value="Save" />
                    </div>

            </form>
        </div>
    </div>
</div>

<!-- END OFFERING -->

<!-- HARVEST MODAL -->

<div class="modal fade" id="harvest" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">REGISTER HARVEST</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <div class="modal-body">
                    <form method="post" action="register.php" id="form" role="form">

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <select class="form-control" name="member">
                                        <option value="Null"> -- Member (Choose this for Church Members) -- </option>
                                        <?php
                                            $q1 = "SELECT * FROM members";
                                            $stmt = $db->prepare($q1);
                                            $stmt->execute();
                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option value='" . $row['memberid'] . "'>" . $row['firstname'] . " " . $row['othername'] . " " . $row['surname'] . "</option>" ;}
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="text" name="non_member" class="form-control">
                                    <label for="Non Church Member">Non-Member (Choose this for Non Church Members)</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="number" step="any" name="pledge" class="form-control" required>
                                    <label for="Pledge">Pledge</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="datetime-local" name="datetime" class="form-control" required>
                                    <label for="Date and Time">Date and Time</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                        
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-success" id="submit" name="add_harvest" value="Save" />
                    </div>

            </form>
        </div>
    </div>
</div>

<!-- HARVEST -->

<!-- LOGOUT MODAL -->

<div class="modal fade" id="logout" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-footer text-white">
        <button class="btn btn-danger" type="button" data-dismiss="modal">No</button>
        <a class="btn btn-success" id="submit" href="logout.php">Yes</a>
      </div>
    </div>
  </div>
</div>

<!-- END LOGOUT -->

<!-- END MODALS -->