function showUsers() {
    $.ajax({
        url: "/zoo/user/index",
        type: 'GET',
        dataType: 'html', // added data type
        success: function(res) {
           document.getElementById("data").innerHTML  =res;
        }
    });
  }
  function showZoos() {
    $.ajax({
        url: "/zoo/animal/index",
        type: 'GET',
        dataType: 'html', // added data type
        success: function(res) {
           document.getElementById("data").innerHTML  =res;
        }
    });
  }
  function showAnimals() {
    $.ajax({
        url: "/zoo/zoo/index",
        type: 'GET',
        dataType: 'html', // added data type
        success: function(res) {
           document.getElementById("data").innerHTML  =res;
        }
    });
  }
