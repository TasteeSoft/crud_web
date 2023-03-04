<?php

  require_once 'config.php';

  class Database extends Config {
    // Insert User Into Database
    public function insert($Vorname, $Nachname, $Geburtsdatum, $Versicherungen_idVersicherungen) {
      $sql = 'INSERT INTO patienten (Vorname, Nachname, Geburtsdatum, Versicherungsnummer, Versicherungen_idVersicherungen) VALUES (:Vorname, :Nachname, :Geburtsdatum, :Versicherungsnummer, :Versicherungen_idVersicherungen)';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        'Vorname' => $Vorname,
        'Nachname' => $Nachname,
        'Geburtsdatum' => $Geburtsdatum,
        'Versicherungsnummer' => $Versicherungsnummer,
        'Versicherungen_idVersicherungen' => $Versicherungen_idVersicherungen
      ]);
      return true;
    }

    // Fetch All Users From Database
    public function read() {
      $sql = 'SELECT * FROM patienten ORDER BY idPatienten DESC';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    }

    // Fetch Single User From Database
    public function readOne($idPatienten) {
      $sql = 'SELECT * FROM patienten WHERE idPatienten = :idPatienten';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['idPatienten' => $idPatienten]);
      $result = $stmt->fetch();
      return $result;
    }

    // Update Single User
    public function update($idPatienten, $Vorname, $Nachname, $Geburtsdatum, $Versicherungsnummer, $Versicherungen_idVersicherungen) {
      $sql = 'UPDATE patienten SET Vorname = :Vorname, Nachname = :Nachname, Geburtsdatum = :Geburtsdatum, Versicherungsnummer = :Versicherungsnummer, Versicherungen_idVersicherungen = :Versicherungen_idVersicherungen WHERE idPatienten = :idPatienten';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        'Vorname' => $Vorname,
        'Nachname' => $Nachname,
        'Geburtsdatum' => $Geburtsdatum,
        'Versicherungsnummer' => $Versicherungsnummer,
        'Versicherungen_idVersicherungen' => $Versicherungen_idVersicherungen,
        'idPatienten' => $idPatienten
      ]);

      return true;
    }

    // Delete User From Database
    public function delete($idPatienten) {
      $sql = 'DELETE FROM patienten WHERE idPatienten = :idPatienten';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['idPatienten' => $idPatienten]);
      return true;
    }
  }

?>