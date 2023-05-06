$(document).ready(function() {
    var name = localStorage.getItem('name');
    var email = localStorage.getItem('email');
    var token = localStorage.getItem('token');
    $.ajax({
      url: 'php/profile.php',
      type: 'POST',
      data: {name: name, email: email, token: token},
      dataType: 'json',
      success: function(data) {
        $('#user-data').html('Name: ' + data.name + '<br>Email: ' + data.email + '<br>Age:' + data.age + '<br>Address:' + data.address + '<br>Phone Number:' + data.phonenumber);
      },
      error: function() {
        $('#user-data').html('Error retrieving user data.');
      }
    });
  });