function showZoos() {
  $.ajax({
    type: "GET",
    url: "/Project/zoo",

    dataType: "html",
    success: function (response) {
      $("#data").html(response);
      let table = new DataTable('#zoo-data');
      getZooCount();
    },
  });
}

function deleteZoo(id) {
  let ok = confirm("Are you sure you want to delete this zoo?"); 
  if(ok) {
  $.ajax({
    type: "POST",
    url: "/Project/zoo/delete",
    data: {
      id: id.slice(6),
    },
    dataType: "html",
    success: function (response) {
      $("#del").html(response);
      showZoos();
    },
  });
}
}

function addZoo() {
  $("#zooadd").submit(function (e) {
    e.preventDefault();
  });

  var form = $("#zooadd");

  $.ajax({
    type: "POST",
    url: "/Project/zoo/create",
    data: form.serialize(), // serializes the form's elements.
    success: function (data) {
      $("#exampleModal").modal("hide");
      alert(data); // show response from the php script.
      showZoos();
    },
  });
}

function showZooCreate() {

  $('.modal-title').html("Add Zoo");
  $.ajax({
    type: "GET",
    url: "/Project/zoo/create",
    dataType: "html",
    success: function (response) {
      $("#modalform").html(response);
    },
  });
}

function editZoo(id) {
  $('.modal-title').html("Edit Zoo");
  $.ajax({
    type: "GET",
    data: {
      id: id.slice(4),
    },
    url: "/Project/zoo/edit",
    dataType: "html",
    success: function (response) {
      $("#modalform").html(response);
      $("#exampleModal").modal("show");
    },
  });
}

function updateZoo(id) {
  $("#zooedit").submit(function (e) {
    e.preventDefault();
  });

  var form = $("#zooedit");

  $.ajax({
    type: "POST",
    url: "/Project/zoo/edit?id=" + id,
    data: form.serialize(), // serializes the form's elements.
    success: function (data) {
      $("#exampleModal").modal("hide");
      showZoos();
      alert(data); // show response from the php script.
     
    
    },
  });
  
}

function getZooCount() {
  $.ajax({
    type: "GET",
    url: "/Project/zoo/count",
    dataType: "html",
    success: function (response) {
      $("#zooCount").html(response);
    },
  });
}
