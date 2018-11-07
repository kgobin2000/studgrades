
//MODAL TABLE


   function viewData(a){
     console.log(a);
       $.ajax({
           url: 'recordsprocess.php?p=view',
           method: 'GET',
           data:{stud_id:a}
       }).done(function(data){
           $('#tablebodyrec').html(data)
           tableData();
       })
   }


       function tableData(){
           $('#tablerec').Tabledit({
               url: 'recordsprocess.php',
               eventType: 'dblclick',
               editButton: true,
               deleteButton: true,
               hideIdentifier: false,
               saveButton:true,//doesnt work
               restoreButton:false,
               buttons: {
                   edit: {
                       class: 'btn btn-sm btn-warning',
                       html: '<span class="glyphicon glyphicon-pencil"></span> Edit',
                       action: 'edit'
                   },
                   delete: {
                       class: 'btn btn-sm btn-danger',
                       html: '<span class="glyphicon glyphicon-trash"></span> Trash',
                       action: 'delete'
                   },
                   save: {
                       class: 'btn btn-sm btn-success',
                       html: 'Save',

                   },
                   restore: {
                       class: 'btn btn-sm btn-warning',
                       html: 'Restore',
                       action: 'restore'
                   },
                   confirm: {
                       class: 'btn btn-sm btn-default',
                       html: 'Confirm'
                   }
               },
               columns: {
                   identifier: [0, 'id'],
                   editable: [[2, 'course'],[3, 't1'],[4, 't2'],[5, 't3']]
               },
               onSuccess: function(data, textStatus, jqXHR) {
                   
               },
               onFail: function(jqXHR, textStatus, errorThrown) {
                   console.log('onFail(jqXHR, textStatus, errorThrown)');
                   console.log(jqXHR);
                   console.log(textStatus);
                   console.log(errorThrown);
               },
               onAjax: function(action, serialize) {
                   console.log('onAjax(action, serialize)');
                   console.log(action);
                   console.log(serialize);
               }
           });
       };
