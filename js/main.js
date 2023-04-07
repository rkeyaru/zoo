function signUp() {
  $("#signup").submit(function (e) {
    e.preventDefault();
  });

  values = $("#signup").serializeArray();

  for (i of values.slice(1)) {
    if (i.name != "contact-button") {
      console.log(i);
      if (i.value.trim() == "") {
        // alert(i.name + " can't be empty");
        return false;
      }
    }
  }

  if (!isEmail(values[3].value)) {
    return false;
  }
  $.ajax({
    type: "POST",
    url: "/Project/site/signup",
    data: values,
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
