const addForm = document.getElementById("add-user-form");
const updateForm = document.getElementById("edit-user-form");
const showAlert = document.getElementById("showAlert");
const addModal = new bootstrap.Modal(document.getElementById("addNewUserModal"));
const editModal = new bootstrap.Modal(document.getElementById("editUserModal"));
const tbody = document.querySelector("tbody");

// Add New User Ajax Request
addForm.addEventListener("submit", async (e) => {
  e.preventDefault();

  const formData = new FormData(addForm);
  formData.append("add", 1);

  if (addForm.checkValidity() === false) {
    e.preventDefault();
    e.stopPropagation();
    addForm.classList.add("was-validated");
    return false;
  } else {
    document.getElementById("add-user-btn").value = "Please Wait...";

    const data = await fetch("action.php", {
      method: "POST",
      body: formData,
    });
    const response = await data.text();
    showAlert.innerHTML = response;
    document.getElementById("add-user-btn").value = "Add User";
    addForm.reset();
    addForm.classList.remove("was-validated");
    addModal.hide();
    fetchAllUsers();
  }
});

// Fetch All Users Ajax Request
const fetchAllUsers = async () => {
  const data = await fetch("action.php?read=1", {
    method: "GET",
  });
  const response = await data.text();
  tbody.innerHTML = response;
};
fetchAllUsers();

// Edit User Ajax Request
tbody.addEventListener("click", (e) => {
  if (e.target && e.target.matches("a.editLink")) {
    e.preventDefault();
    let idPatienten = e.target.getAttribute("idPatienten");
    editUser(idPatienten);
  }
});

const editUser = async (idPatienten) => {
  const data = await fetch(`action.php?edit=1&idPatienten=${idPatienten}`, {
    method: "GET",
  });
  const response = await data.json();
  document.getElementById("idPatienten").value = response.idPatienten;
  document.getElementById("Vorname").value = response.Vorname;
  document.getElementById("Nachname").value = response.Nachname;
  document.getElementById("Geburtsdatum").value = response.Geburtsdatum;
  document.getElementById("Versicherungen_idVersicherungen").value = response.Versicherungen_idVersicherungen;
  document.getElementById("Versicherungsnummer").value = response.Versicherungsnummer;
};

// Update User Ajax Request
updateForm.addEventListener("submit", async (e) => {
  e.preventDefault();

  const formData = new FormData(updateForm);
  formData.append("update", 1);

  if (updateForm.checkValidity() === false) {
    e.preventDefault();
    e.stopPropagation();
    updateForm.classList.add("was-validated");
    return false;
  } else {
    document.getElementById("edit-user-btn").value = "Please Wait...";

    const data = await fetch("action.php", {
      method: "POST",
      body: formData,
    });
    const response = await data.text();

    showAlert.innerHTML = response;
    document.getElementById("edit-user-btn").value = "Add User";
    updateForm.reset();
    updateForm.classList.remove("was-validated");
    editModal.hide();
    fetchAllUsers();
  }
});

// Delete User Ajax Request
tbody.addEventListener("click", (e) => {
  if (e.target && e.target.matches("a.deleteLink")) {
    e.preventDefault();
    let idPatienten = e.target.getAttribute("idPatienten");
    deleteUser(idPatienten);
  }
});

const deleteUser = async (idPatienten) => {
  const data = await fetch(`action.php?delete=1&idPatienten=${idPatienten}`, {
    method: "GET",
  });
  const response = await data.text();
  showAlert.innerHTML = response;
  fetchAllUsers();
};