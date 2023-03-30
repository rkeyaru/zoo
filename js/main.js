function showUsers() {
    $.ajax({
        url: "userdata",
        type: 'GET',
        dataType: 'html', // added data type
        success: function(res) {
           document.getElementById("data").innerHTML  =res;
        }
    });
  }
