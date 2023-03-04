<?php

  require_once 'db.php';
  require_once 'util.php';

  $db = new Database;
  $util = new Util;

  // Handle Add New User Ajax Request
  if (isset($_POST['add'])) {
    $Vorname = $util->testInput($_POST['Vorname']);
    $Nachname = $util->testInput($_POST['Nachname']);
    $Geburtsdatum = $util->testInput($_POST['Geburtsdatum']);
    $Versicherungsnummer = $util->testInput($_POST['Versicherungsnummer']);
    $Versicherungen_idVersicherungen = $util->testInput($_POST['Versicherungen_idVersicherungen']);

    if ($db->insert($Vorname, $Nachname, $Geburtsdatum, $Versicherungsnummer, $Versicherungen_idVersicherungen)) {
      echo $util->showMessage('success', 'User inserted successfully!');
    } else {
      echo $util->showMessage('danger', 'Something went wrong!');
    }
  }

  // Handle Fetch All Users Ajax Request
  if (isset($_GET['read'])) {
    $users = $db->read();
    $output = '';
    if ($users) {
      foreach ($users as $row) {
        $output .= '<tr>
                      <td>' . $row['idPatienten'] . '</td>
                      <td>' . $row['Vorname'] . '</td>
                      <td>' . $row['Nachname'] . '</td>
                      <td>' . $row['Geburtsdatum'] . '</td>
                      <td>' . $row['Versicherungsnummer'] . '</td>
                      <td>' . $row['Versicherungen_idVersicherungen'] . '</td>
                      <td>
                        <a href="#" idPatienten="' . $row['idPatienten'] . '" class="btn btn-success btn-sm rounded-pill py-0 editLink" data-toggle="modal" data-target="#editUserModal">Edit</a>

                        <a href="#" idPatienten="' . $row['idPatienten'] . '" class="btn btn-danger btn-sm rounded-pill py-0 deleteLink">Delete</a>
                      </td>
                    </tr>';
      }
      echo $output;
    } else {
      echo '<tr>
              <td colspan="6">No Users Found in the Database!</td>
            </tr>';
    }
  }

  // Handle Edit User Ajax Request
  if (isset($_GET['edit'])) {
    $idPatienten = $_GET['idPatienten'];

    $user = $db->readOne($idPatienten);
    echo json_encode($user);
  }

  // Handle Update User Ajax Request
  if (isset($_POST['update'])) {
    $idPatienten = $util->testInput($_POST['idPatienten']);
    $Vorname = $util->testInput($_POST['Vorname']);
    $Nachname = $util->testInput($_POST['Nachname']);
    $Geburtsdatum = $util->testInput($_POST['Geburtsdatum']);
    $Versicherungsnummer = $util->testInput($_POST['Versicherungsnummer']);
    $Versicherungen_idVersicherungen = $util->testInput($_POST['Versicherungen_idVersicherungen']);

    if ($db->update($idPatienten, $Vorname, $Nachname, $Geburtsdatum, $Versicherungsnummer, $Versicherungen_idVersicherungen)) {
      echo $util->showMessage('success', 'User updated successfully!');
    } else {
      echo $util->showMessage('danger', 'Something went wrong!');
    }
  }

  // Handle Delete User Ajax Request
  if (isset($_GET['delete'])) {
    $idPatienten = $_GET['idPatienten'];
    if ($db->delete($idPatienten)) {
      echo $util->showMessage('info', 'User deleted successfully!');
    } else {
      echo $util->showMessage('danger', 'Something went wrong!');
    }
  }

?>