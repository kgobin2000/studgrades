
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
               deleteButton: false,
               hideIdentifier: true,
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
                   editable: [[3, 'coursework1'],[4, 'exam1'],[5, 'final1'],[6, 'coursework2'],[7, 'exam2'],[8, 'final2'],[9, 'coursework3'],[10, 'exam3'],[11, 'final3']]
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


          sortColumn = function(obj) {
           var table = obj;
           var arrowDown = 'fa-angle-down';
           var arrowUp = 'fa-angle-up';
           var oldIndex = 0;
           obj
             .find('thead > tr:first-child th')
             .wrapInner('<span class="sort-element"/>')
             .append($('<span/>').addClass('sort-icon fa'))
             .css({cursor: 'pointer'})
             .each(function () {
               var th = $(this);
               var thIndex = th.index();
               var inverse = false;
               var addOrRemove = true;
               th.click(function () {
                 if(!$(this).hasClass('disable-sorting')) {
                   if($(this).find('.sort-icon').hasClass(arrowDown)) {
                     $(this)
                       .find('.sort-icon')
                       .removeClass( arrowDown )
                       .addClass(arrowUp);
                   } else {
                     $(this)
                       .find('.sort-icon')
                       .removeClass( arrowUp )
                       .addClass(arrowDown);
                   }
                   if(oldIndex != thIndex) {
                     obj.find('.sort-icon').removeClass(arrowDown);
                     obj.find('.sort-icon').removeClass(arrowUp);
                     $(this)
                       .find('.sort-icon')
                       .toggleClass( arrowDown, addOrRemove );
                   }
                   table.find('td').filter(function () {
                     return $(this).index() === thIndex;
                   }).sortElements(function (a, b) {
                     return $.text([a]) > $.text([b]) ?
                       inverse ? -1 : 1
                       : inverse ? 1 : -1;
                   }, function () {
                     return this.parentNode;
                   });
                   inverse = !inverse;
                   oldIndex = thIndex;
                 }
               });
             });
          }
          $(document).ready(function() {
             sortColumn($('#overview'));
          });
