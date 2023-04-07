function showAnimals() {
  $.ajax({
    type: "GET",
    url: "/Project/animal",
    dataType: "html",
    success: function (response) {
      $("#data").html(response);
      getAnimalCount();
    },
  });
}

function deleteAnimal(id) {
  let ok = confirm("Are you sure you want to delete this animal?");
  if(ok) {
  $.ajax({
    type: "POST",
    url: "/Project/animal/delete",
    data: {
      id: id.slice(6),
    },
    dataType: "html",
    success: function (response) {
      
      showAnimals();
    },
  });
}
}

function addAnimal() {
  $("#animaladd").submit(function (e) {
    e.preventDefault();
  });

  var form = $("#animaladd");

  $.ajax({
    type: "POST",
    url: "/Project/animal/create",
    data: form.serialize(), // serializes the form's elements.
    success: function (data) {
      $("#exampleModal").modal("hide");
      alert(data); // show response from the php script.
      showAnimals();
    },
  });
}
function showAnimalCreate() {
  $('.modal-title').html("Add Animal");
  $.ajax({
    type: "GET",
    url: "/Project/animal/create",
    dataType: "html",
    success: function (response) {
      $("#modalform").html(response);
    },
  });
}

function editAnimal(id) {
  $('.modal-title').html("Edit Animal");
  $.ajax({
    type: "GET",
    data: {
      id: id.slice(4),
    },
    url: "/Project/animal/edit",
    dataType: "html",
    success: function (response) {
      $("#modalform").html(response);
      $("#exampleModal").modal("show");
    },
  });
}

function updateAnimal(id) {
  $("#animaledit").submit(function (e) {
    e.preventDefault();
  });

  var form = $("#animaledit");

  $.ajax({
    type: "POST",
    url: "/Project/animal/edit?id=" + id,
    data: form.serialize(), // serializes the form's elements.
    success: function (data) {
      $("#exampleModal").modal("hide");
      alert(data); // show response from the php script.
      showAnimals();
    },
  });
  
}

function getAnimalCount() {
  $.ajax({
    type: "GET",
    url: "/Project/animal/count",
    dataType: "html",
    success: function (response) {
      $("#animalCount").html(response);
    },
  });
}
