function signUp() {
  $("#signup").submit(function (e) {
    e.preventDefault();
  });

  var form = $("#signup");

  $.ajax({
    type: "POST",
    url: "/zoo/site/signup",
    data: form.serialize(),
    success: function (data) {
      alert(data);
      $("#signup")[0].reset();
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
    url: "/zoo/site/login",
    data: form.serialize(),
    success: function (data) {
      alert(data);
    },
  });
}
