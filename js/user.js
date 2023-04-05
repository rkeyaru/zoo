function showUsers() {
  $.ajax({
    type: "GET",
    url: "/zoo/user",

    dataType: "html",
    success: function (response) {
      $("#data").html(response);
      getUserCount();
    },
  });
}

function deleteUser(id) {
  let ok = confirm("Do you really want to delete this user?");
  if(ok) {
  $.ajax({
    type: "POST",
    url: "/zoo/user/delete",
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
    url: "/zoo/user/create",
    data: form.serialize(), // serializes the form's elements.
    success: function (data) {
      alert(data); // show response from the php script.
      $("#exampleModal").modal("hide");
      showUsers();
    },
  });
  
}

function showUserCreate() {
  $.ajax({
    type: "GET",
    url: "/zoo/user/create",
    dataType: "html",
    success: function (response) {
      $("#modalform").html(response);
    },
  });
}

function editUser(id) {
  $.ajax({
    type: "GET",
    data: {
      id: id.slice(4),
    },
    url: "/zoo/user/edit",
    dataType: "html",
    success: function (response) {
      $("#modalform").html(response);
      $("#exampleModal").modal("show");
    },
  });
}

function updateUser(id) {
  $("#useredit").submit(function (e) {
    e.preventDefault();
  });

  var form = $("#useredit");

  $.ajax({
    type: "POST",
    url: "/zoo/user/edit?id=" + id,
    data: form.serialize(), // serializes the form's elements.
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
    url: "/zoo/user/count",
    dataType: "html",
    success: function (response) {
      $("#userCount").html(response);
    },
  });
}
