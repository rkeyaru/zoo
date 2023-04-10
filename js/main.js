function signUp() {
  $("#signup").submit(function (e) {
    e.preventDefault();
  });

  form = document.getElementById("signup");
  var formData = new FormData(form);
  for(i of formData) {
    if(i[0] != "UploadForm[imageFile]" && i[0] != "contact-button") {
     if(i[1].trim() == "") {
      console.log(i[0] + "is empty");
           return false;
     }
    }
  }
 
  if ($("#uploadform-imagefile").get(0).files.length === 0) {
    console.log("Please select a file to upload");
    return false;
  }

  if (!isEmail(formData.get("Users[email]"))) {
    return false;
  }
  $.ajax({
    type: "POST",
    url: "/Project/site/signup",
    data: formData,
    processData: false,
    contentType: false,
    success: function (data) {
      alert(data);
      // $("#signup")[0].reset();
    },
  });
}
function authUser() {
  $("#login").submit(function (e) {
    e.preventDefault();
  });

  var form = $("#login");

  $.ajax({
    type: "POST",
    url: "/Project/site/login",
    data: form.serialize(),
    success: function (data) {
      alert(data);
    },
  });
}

function authStaff() {
  $("#login").submit(function (e) {
    e.preventDefault();
  });

  var form = $("#login");

  $.ajax({
    type: "POST",
    url: "/Project/site/staff-login",
    data: form.serialize(),
    success: function (data) {
      alert(data);
    },
  });
}

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
