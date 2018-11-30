//Teacher login


    $(document).ready(function(){
     $('#login-modal').on("submit", function(event){
      event.preventDefault();

      var formdata = $('#login-modal').serialize();
      console.log(formdata);
        stud_id = $('#stud_id').val();
        password=$('#password').val();
        console.log(stud_id,password);
       $.ajax({
        url:"studloginscript.php",
        type:"POST",
        data:{stud_id:stud_id,password:password},
        beforeSend:function(){
         $('#insert').val("Inserting");
        },
        success:function(data){
          if (data ==1 )
          {
            alert("Login successful!")
            window.location.replace('/~khalidgobin/tablequickedit/studwelcome.php');
          }
          else {
          alert("Login unsuccessful!");
         $("form#login-modal")[0].reset();
         console.log(data);
       }
        }
       });
     })
   })
