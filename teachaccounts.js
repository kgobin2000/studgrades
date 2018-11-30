
function showpass() {
    var x = document.getElementById("pwd");
    var y = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    if (y.type === "password") {
        y.type = "text";
    } else {
        y.type = "password";
    }
}


$(document).ready(function(){
 $('#changepass').on("submit", function(event){
  event.preventDefault();

  var formdata = $('#changepass').serialize();
  console.log(formdata);
    oldpass = $('#password').val();
    newpass=$('#pwd').val();
    console.log(oldpass,newpass);
   $.ajax({
    url:"changepass.php",
    type:"POST",
    data:{oldpass:oldpass,newpass:newpass},
    beforeSend:function(){
     $('#insert').val("Inserting");
    },
    success:function(data){
      if (data ==1 )
      {
        alert("Password Changed Successfully!")
        window.location.replace('/~khalidgobin/tablequickedit/teachwelcome.php');
      }
      else {
      alert("Current Password is Incorrect");
     $("form#changepass")[0].reset();
     console.log(data);
   }
    }
   });
 })
})
