//Teacher login


    $(document).ready(function(){
     $('#login-modal').on("submit", function(event){
      event.preventDefault();

      var formdata = $('#login-modal').serialize();
      console.log(formdata);
        teach_id = $('#teach_id').val();
        password=$('#password').val();
        console.log(teach_id,password);
       $.ajax({
        url:"tloginscript.php",
        type:"POST",
        data:{teach_id:teach_id,password:password},
        beforeSend:function(){
         $('#insert').val("Inserting");
        },
        success:function(data){
          if (data ==1 )
          {
            alert("Login successful!")
            window.location.replace('/~khalidgobin/tablequickedit/teachwelcome.php');
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
