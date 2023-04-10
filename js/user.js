function showUsers() {
  $.ajax({
    type: "GET",
    url: "/Project/user",

    dataType: "html",
    success: function (response) {
      $("#data").html(response);
      let table = new DataTable('#user-data');
      getUserCount();
    },
  });
}

function deleteUser(id) {
  let ok = confirm("Do you really want to delete this user?");
  if(ok) {
  $.ajax({
    type: "POST",
    url: "/Project/user/delete",
    data: {
      id: id.slice(6),
    },
    dataType: "html",
    success: function (response) {
    
      showUsers();
    },
  });
}
}

function addUser() {
  $("#useradd").submit(function (e) {
    e.preventDefault();
  });

  var form = $("#useradd");

  $.ajax({
    type: "POST",
    url: "/Project/user/create",
    data: form.serialize(), // serializes the form's elements.
    success: function (data) {
      alert(data); // show response from the php script.
      $("#exampleModal").modal("hide");
      showUsers();
    },
  });
  
}

function showUserCreate() {
  $(".modal-title").html("Add User");
  $.ajax({
    type: "GET",
    url: "/Project/user/create",
    dataType: "html",
    success: function (response) {
      $("#modalform").html(response);
    },
  });
}
// will show modal for editing user 
function editUser(id) {
  $(".modal-title").html("Edit User");
  $.ajax({
    type: "GET",
    data: {
      id: id.slice(4),
    },
    url: "/Project/user/edit",
    dataType: "html",
    success: function (response) {
      $("#modalform").html(response);
      $("#exampleModal").modal("show");
    },
  });
}
//will send updated value to database
function updateUser(id) {
  $("#useredit").submit(function (e) {
    e.preventDefault();
  });

  var values = $("#useredit").serializeArray();

  
  if($("#users-password").val().trim() == "") { 

    return false;
  } 

  for(val of values.slice(1,values.length)) { 
    if(val.value.trim() == "") { 
      return false;
    }
  }
  $.ajax({
    type: "POST",
    url: "/Project/user/edit?id=" + id,
    data: values, // serializes the form's elements.
    success: function (data) {
      alert(data); // show response from the php script.
      showUsers();
    },
  });
  $("#exampleModal").modal("hide");
}

function getUserCount() {
  $.ajax({
    type: "GET",
    url: "/Project/user/count",
    dataType: "html",
    success: function (response) {
      $("#userCount").html(response);
    },
  });
}
