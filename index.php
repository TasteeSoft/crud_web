<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD Application Using PHP OOPS PDO MySQL & FETCH API of ES6</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <!-- Add New User Modal Start -->
  <div class="modal fade" tabindex="-1" id="addNewUserModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Neuen Patient hinzufügen</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="add-user-form" class="p-2" novalidate>
            <div class="row mb-3 gx-3">
              <div class="col">
                <input type="text" name="Vorname" class="form-control form-control-lg" placeholder="Vorname" required>
                <div class="invalid-feedback">Vorname erforderlich</div>
              </div>

              <div class="col">
                <input type="text" name="Nachname" class="form-control form-control-lg" placeholder="Nachname" required>
                <div class="invalid-feedback">Nachname erforderlich</div>
              </div>
            </div>

            <div class="mb-3">
              <input type="text" name="Geburtsdatum" class="form-control form-control-lg" placeholder="Geburtsdatum" required>
              <div class="invalid-feedback">Geburtsdatum erforderlich</div>
            </div>

            <div class="mb-3">
              <input type="text" name="Versicherungsnummer" class="form-control form-control-lg" placeholder="Versicherungsnummer" required>
              <div class="invalid-feedback">Versicherungsnummer erforderlich</div>
            </div>

            <div class="mb-3">
              <input type="number" name="Versicherungen_idVersicherungen" class="form-control form-control-lg" placeholder="VersicherungsID" required>
              <div class="invalid-feedback">VersicherungsID erforderlich</div>
            </div>

            <div class="mb-3">
              <input type="submit" value="Patient hinzufügen" class="btn btn-primary btn-block btn-lg" id="add-user-btn">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Add New User Modal End -->

  <!-- Edit User Modal Start -->
  <div class="modal fade" tabindex="-1" id="editUserModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit This User</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="edit-user-form" class="p-2" novalidate>
            <input type="hidden" name="idPatienten" id="idPatienten">
            <div class="row mb-3 gx-3">
              <div class="col">
                <input type="text" name="Vorname" id="Vorname" class="form-control form-control-lg" placeholder="Vorname" required>
                <div class="invalid-feedback">Vorname</div>
              </div>

              <div class="col">
                <input type="text" name="Nachname" id="Nachname" class="form-control form-control-lg" placeholder="Nachname" required>
                <div class="invalid-feedback">Nachname</div>
              </div>
            </div>

            <div class="mb-3">
              <input type="text" name="Geburtsdatum" id="Geburtsdatum" class="form-control form-control-lg" placeholder="Geburtsdatum" required>
              <div class="invalid-feedback">Geburtsdatum</div>
            </div>

            <div class="mb-3">
              <input type="text" name="Versicherungsnummer" class="form-control form-control-lg" placeholder="Versicherungsnummer" required>
              <div class="invalid-feedback">Versicherungsnummer erforderlich</div>
            </div>

            <div class="mb-3">
              <input type="text" name="Versicherungen_idVersicherungen" id="Versicherungen_idVersicherungen" class="form-control form-control-lg" placeholder="VersicherungsID" required>
              <div class="invalid-feedback">VersicherungsID</div>
            </div>

            <div class="mb-3">
              <input type="submit" value="Update User" class="btn btn-success btn-block btn-lg" id="edit-user-btn">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Edit User Modal End -->
  <div class="container">
    <div class="row mt-4">
      <div class="col-lg-12 d-flex justify-content-between align-items-center">
        <div>
          <h4 class="text-primary">Customer in the Database!</h4>
        </div>
        <div>
          <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addNewUserModal">Add New User</button>
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-lg-12">
        <div id="showAlert"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="table-responsive">
          <table class="table table-striped table-bordered text-center">
            <thead>
              <tr>
                <th>IDPatient</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>Geburtsdatum</th>
                <th>Versicherungsnummer</th>
                <th>VersicherungsID</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script src="main.js"></script>
</body>

</html>