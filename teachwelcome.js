//Student Information Table
$(document).ready(function() {
$("#toggle").click(function(){
    $("#divtable").toggle();
    if ( $('#ratings').css('visibility') == 'hidden' )
    $('#ratings').css('visibility','visible');
    else
    $('#ratings').css('visibility','hidden');
    if ( $('#grades').css('visibility') == 'hidden' )
    $('#grades').css('visibility','visible');
    else
    $('#grades').css('visibility','hidden');
});
});
$(document).ready(function() {
$("#toggle1").click(function(){
    $("#divtable").toggle();
    if ( $('#ratings').css('visibility') == 'hidden' )
    $('#ratings').css('visibility','visible');
    else
    $('#ratings').css('visibility','hidden');
    if ( $('#grades').css('visibility') == 'hidden' )
    $('#grades').css('visibility','visible');
    else
    $('#grades').css('visibility','hidden');
});
});

    function viewData(){
        $.ajax({
            url: 'teacherwelcomeprocess.php?p=view',
            method: 'GET'
        }).done(function(data){
            $('#tablebody').html(data)
            tableData();
        })
    }

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
    sortColumn($('#tabledit'));
});


    function tableData(){
        $('#tabledit').Tabledit({
            url: 'teacherwelcomeprocess.php',
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
                editable: [[6, 'coursework1'],[7, 'exam1'],[8, 'final1'],[9, 'coursework2'],[10, 'exam2'],[11, 'final2'],[12, 'coursework3'],[13, 'exam3'],[14, 'final3']],

                //[4, 'courseid','{"generalmath": "Mathematics", "integratedscie": "Integrated Science", "biology": "Biology","physics": "Physics", "chemistry": "Chemistry", "poa": "Principles of Accounts","pob": "Principles of Business", "pe": "Physical Education", "re": "Religious Education","moraled": "Moral Education", "language": "English A", "literature": "English B", "ALL":"ALL"}'],

            },
            onSuccess: function(data, textStatus, jqXHR) {

                viewData();
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
    //___________________________NEW TABLE____________________
    function viewresultsData(){
        $.ajax({
            url: 'tratingsprocess.php?p=view',
            method: 'GET'
        }).done(function(data){
            $('#resultsbody').html(data)
            resultsData();
        })
    }

    function resultsData(){
        $('#resultsedit').Tabledit({
            url: 'tratingsprocess.php',
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
                editable: [[6, 'ab1'],[7, 'ef1'],[8, 'res1'], [9, 'ab2'],[10, 'ef2'],[11, 'res2'],[12, 'ab3'],[13, 'ef3'],[14, 'res3']],

                //[4, 'courseid','{"generalmath": "Mathematics", "integratedscie": "Integrated Science", "biology": "Biology","physics": "Physics", "chemistry": "Chemistry", "poa": "Principles of Accounts","pob": "Principles of Business", "pe": "Physical Education", "re": "Religious Education","moraled": "Moral Education", "language": "English A", "literature": "English B", "ALL":"ALL"}'],

            },
            onSuccess: function(data, textStatus, jqXHR) {
                viewresultsData()
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
