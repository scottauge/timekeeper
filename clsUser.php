<?php
//
// Generated by tools/TableClass.php
// on Saturday, 08-Jan-2022 20:34:37 EST// $Id: TableClass.php 16 2012-03-09 10:09:43Z scott_auge $
//

// This provides useful functions for the data such as RandonString
// and date format changers.

include_once ("clsUtil.php");

class clsuser extends clsUtil {

  // Database object (usually clsDB.php) (mysqli based object)

  public $DB;

  // Database fields

  public $UserRecID;
  public $FirstName;
  public $LastName;
  public $Password;
  public $UserID;

  // Available attribute if FindByID() gets something.

  private $_Available;

  //  If our find is ambiguous, set this flag

  private $_Ambiguous;

  // This is used for FindByQuery() which may have multiple record result set.
  // We need it to move to the next result set with the FetchByQuery() method.  We
  // cannot go backwards as of yet.  Clean up with CloseByQuery().

  private $_S;

  // Sometimes we just need to loop through the number of records available

  public $NumRows;

  // --------------------------------------------------------------------------
  // Constructor
  // --------------------------------------------------------------------------

  public function __construct ($DB) {

    $this->DB = $DB;

  } // Constructor

  // --------------------------------------------------------------------------
  // Create a record. Note this does not put data into the record, only
  // prepares a container for Update()
  // --------------------------------------------------------------------------

  public function Create () {


    $ID = self::RandomString(50);
    $SQL = "INSERT INTO user (UserRecID) VALUES (?)";
    $S = $this->DB->Connection->prepare($SQL);
    $S->bind_param("s", $ID);
    $S->execute();
    $S->close();
    $this->UserRecID = $ID;

    // Load up our database defaults into the "buffer"

    $this->FindByID($ID);

  } // Create ()

  // --------------------------------------------------------------------------
  // Delete a record by it's key field
  // --------------------------------------------------------------------------

  public function Delete () {

    $SQL = "DELETE FROM user WHERE UserRecID = ?";
    $S = $this->DB->Connection->prepare($SQL);
    $S->bind_param("s", $this->UserRecID);
    $S->execute();
    $S->close();

  } // Delete ()


  // --------------------------------------------------------------------------
  // This is what moves the data from the public properties into the database
  // --------------------------------------------------------------------------

  public function Update () {


    //
    // We are using parameterized SQL, there is no need for magic quotes on this stuff.
    // If any of it is on, then we want to remove slashes from the input because it comes
    // back out with the slashes.
    //



          $this->UserRecID = stripslashes($this->UserRecID);
      $this->FirstName = stripslashes($this->FirstName);
      $this->LastName = stripslashes($this->LastName);
      $this->Password = stripslashes($this->Password);
      $this->UserID = stripslashes($this->UserID);



    //
    //  Warning!  Generator doesn't handle blob fields very well.  You may need to do some
    //            hand coding with MySQLi's Stmt->send_long_data() to properly update.  If
    //            the blob exceeds MYSQLs packet size (the DB, not PHP) then corruption is
    //            guaranteed.
    //            Use
    //                mysql> SHOW VARIABLES LIKE 'max_allowed_packet';
    //            to determine the size of data you're set up for.
    //


    $SQL = "UPDATE user SET FirstName = ?, LastName = ?, Password = ?, UserID = ? WHERE UserRecID = ?";
    $S = $this->DB->Connection->prepare($SQL);
    $S->bind_param("sssss", $this->FirstName, $this->LastName, $this->Password, $this->UserID,$this->UserRecID);
    $S->execute();
    $S->close();

  } // Update ()


  // --------------------------------------------------------------------------
  // On returns from the web, often we have the key fields value or it is
  // stored in a session table.  Given the key field's value, find it and load
  // into the class.
  // --------------------------------------------------------------------------

  public function FindByID ($ID) {

    $SQL = "SELECT UserRecID, FirstName, LastName, Password, UserID FROM user WHERE UserRecID = ?";
    $S = $this->DB->Connection->prepare($SQL);
    $S->bind_param("s", $ID);

    // This order is very important for dealing with BLOBs and other large data types

    $S->execute();
    $S->store_result();
    $S->bind_result($this->UserRecID, $this->FirstName, $this->LastName, $this->Password, $this->UserID);

    // This order is very important, store_result() needs to be called before num_rows is set

    $this->SetAvailable ($S);
    $this->SetAmbiguous ($S);

    $S->fetch();
    $S->close();

  } // FindByID ()


  // --------------------------------------------------------------------------
  // MIGHT BE FASTER TO DO A QUERY OUTSIDE THIS CLASS FOR THE KeyField AND
  // THEN USE THIS CLASS WITH A FINDBYID() ON INDIVIDUAL RECORDS
  // --------------------------------------------------------------------------
  // ArrayArgs should be in the form and order needed for bind_param
  // SQL is {table} WHERE {find clause}, fields are automatically taken
  // care of.
  // For queries that may have more than one record, one will want to use
  // FetchByQuery() and CloseByQuery() to move around and clean up.
  // Example $T->FindByQuery ("Bin where Bin = ? and location = ?",
  //                          array("ss", "$T->bin,$T->location") ???
  // Note if you have multiple rows, you may want to keep the result set in
  // one class, and create a class for manipulating the records with FindById()
  // --------------------------------------------------------------------------

  public function FindByQuery ($SQL, $ArrayArgs) {

    $SQL = "SELECT UserRecID, FirstName, LastName, Password, UserID FROM " . $SQL;
    $this->_S = $this->DB->Connection->prepare($SQL);

    // Need to use a callback to bind unknown arts

    if (strpos($SQL, "?") != FALSE) {
      call_user_func_array(array($this->_S, "bind_param"), $ArrayArgs);
    }

    // This order is very important for dealing with BLOBs and other large data types

    $this->_S->execute();
    $this->_S->store_result();
    $this->_S->bind_result($this->UserRecID, $this->FirstName, $this->LastName, $this->Password, $this->UserID);

    // When doing this, auto load the first data set

    $this->_S->fetch();

    // This order is very important, store_result() needs to be called before num_rows is set

    $this->SetAvailable ($this->_S);
    $this->SetAmbiguous ($this->_S);

  } // FindByQuery ()

  // --------------------------------------------------------------------------
  // Close the query
  // --------------------------------------------------------------------------

  public function CloseByQuery () {

     $this->_S->close();

  } // CloseByQuery ()

  // --------------------------------------------------------------------------
  // Allow the query to pull up the next row
  // --------------------------------------------------------------------------

  public function FetchByQuery () {

    $this->_S->fetch();

  } // FetchByQuery ()

  // --------------------------------------------------------------------------
  // Determines if a record was available.
  // --------------------------------------------------------------------------

  public function Available() {

    return $this->_Available;

  } // Available()

  // --------------------------------------------------------------------------
  // Determine if the query found something
  // --------------------------------------------------------------------------

 private function SetAvailable ($S) {

    $this->_Available = ($S->num_rows > 0) ? 1 : 0;

  } // SetAvailable()

  // --------------------------------------------------------------------------
  // Determine if the FindBy*() was ambiguous.
  // --------------------------------------------------------------------------

  public function Ambiguous() {

    return $this->_Ambiguous;

  } // Available()

  // --------------------------------------------------------------------------
  // Tool to help set Ambiguous from what ever FindBy*() used.
  // --------------------------------------------------------------------------

  private function SetAmbiguous ($S) {

    if ($S->num_rows < 2)
      $this->_Ambiguous = 0;
    else
      $this->_Ambiguous = ($S->num_rows);

    $this->NumRows = $S->num_rows;

  } // SetAmbiguous ()


} // class

/****** Unit Test

----- Create ------

include_once ("clsDB.php");
include_once ("clsactivity.php");

$DB = new clsDB();

$T = new clsactivity ($DB);

$T->Create();

$T->Name = "1Test";

$T->Update();

print $T->RecID;

unset ($T);
unset ($DB);


------ Update -------

include_once ("clsDB.php");
include_once ("clsactivity.php");

$DB = new clsDB();

$T = new clsactivity ($DB);

$T->FindByID("1613232823tRz7dOcyH8otVX1NVP2vQlP2G6YAHVmdcj2JKMpD");

$T->Name = "2Test";

$T->Update();

unset ($T);
unset ($DB);

----- Delete ------

include_once ("clsDB.php");
include_once ("clsactivity.php");

$DB = new clsDB();

$T = new clsactivity ($DB);

$T->FindByID("1613232823tRz7dOcyH8otVX1NVP2vQlP2G6YAHVmdcj2JKMpD");

$T->Delete();

unset ($T);
unset ($DB);

*****/
?>
