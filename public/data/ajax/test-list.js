/*=========================================================================================
    File Name: app-invoice-list.js
    Description: app-invoice-list Javascripts
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
   Version: 1.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
  'use strict';
  function debounce(func, timeout = 300){
    let timer;
    return (...args) => {
      clearTimeout(timer);
      timer = setTimeout(() => { func.apply(this, args); }, timeout);
    };
  }
  var dtInvoiceTable = $('.invoice-list-table'),
    assetPath = '../../../app-assets/',
    invoicePreview = 'app-invoice-preview.html',
    invoiceAdd = 'app-invoice-add.html',
    invoiceEdit = 'app-invoice-edit.html';

    const buttonsTop=[]
    if(dtInvoiceTable[0]._user.roles[0].name ==="standard"){
      buttonsTop.push({
        text: 'Add Record',
        className: 'btn btn-primary btn-add-record ms-2',
        action: function (e, dt, button, config) {
          window.location = dtInvoiceTable[0]._addTestRecordUrl;
        }
      })
    }
    console.log({buttonsTop})

  if ($('body').attr('data-framework') === 'laravel') {
    assetPath = $('body').attr('data-asset-path');
    invoicePreview = assetPath + 'app/invoice/preview';
    invoiceAdd = assetPath + 'app/invoice/add';
    invoiceEdit = assetPath + 'app/invoice/edit';
  }

  // datatable
  if (dtInvoiceTable.length) {
    var dtInvoice = dtInvoiceTable.DataTable({
      // ajax: assetPath + 'data/invoice-list.json', // JSON file to add data
      ajax: route('test-list'), // JSON file to add data
      // ajax: 'data/ajax/invoice-list.json', // JSON file to add data
      autoWidth: false,
      columns: [      
        // columns according to JSON
        { data: 'id' },
        { data: 'full_name' },
        { data: 'date' },
        { data: 'location' },
        { data: 'grade' },
        { data: 'is_gradable' },
        { data: 'manager' },
        { data: 'user' },
        { data: 'criteria' },
      ],
      columnDefs: [
        {

        },
        {
        },
        {
     
        },
        {
          targets: 4,
          width: '26px',
          render: function (data, type, full, meta) {
            let grade = full['grade'];
            const  isGradable = full['is_gradable'],
             usr =  dtInvoiceTable[0]._user,
             role =usr .roles[0].name,
             email =usr .email;

           
             if(role==="manager"){
              
             if(isGradable&&email===full['manager']['email']){
              // console.log({role,email,email2:full['manager']['email']})
              grade=grade?grade:0

              return  `<div class="hstack"><div class="list-item-body flex-grow-1">
              <div class="cart-item-qty">
                <div class="input-group">
                  <input data-test-record-id="`+full['id']+`" data-test-record-on-input="grade" class="touchspin-cart" type="number" value="${grade}" />
                </div>
              </div>
            
            </div> </div>`

            }
             grade=(grade?grade:grade===0?0: 'pending')
             return '<div class="hstack"  style="justify-content: center;">'+grade+'</div>';
             
             }
             else{
             
              return '<div class="hstack" style="justify-content: center;cursor: pointer;">'+(grade?grade:grade===0?0: isGradable?'pending':'<span class="badge rounded-pill badge-light-secondary" text-capitalized="">Inactive</span>')+'</div>';
         
             }

           

            }
        },
        {
          targets: 5,
          width: '26px',
          render: function (data, type, full, meta) {
            const criteria = full['criteria']
            let tplCriteria
if(criteria&&criteria.val)
{
  tplCriteria = `<span class="ms-25 badge rounded-pill badge-light-success" text-capitalized=""> ${criteria.val} </span>`
}
else{
  tplCriteria = '<span class="ms-25 badge rounded-pill badge-light-danger" text-capitalized=""> unRate </span>'
}



            const grade = full['grade'],
           isGradable = full['is_gradable'],
            usr =  dtInvoiceTable[0]._user,
            role =usr .roles[0].name,
            onTpl = '<span class="badge rounded-pill badge-light-success" text-capitalized=""> on </span>'
            if(role==="manager"){
        
                return '<div class="hstack"  style="justify-content: center;">'+ (grade?onTpl:(grade===0&&isGradable)?onTpl: isGradable?'pending':'<span class="badge rounded-pill badge-light-danger" text-capitalized=""> off </span>')+tplCriteria+'</div>' ;
              
              }
              else{
               //console.log({role,email,email2:full['manager']['email']})
               return '<div class="hstack" data-test-record-id="'+full['id']+'" data-test-record-on="is_gradable" data-test-record-new-val="'+(isGradable?false:true)+'" style="justify-content: center;cursor: pointer;">'+ (grade?onTpl:(grade===0&&isGradable)?onTpl: isGradable?'pending':'<span class="badge rounded-pill badge-light-danger" text-capitalized=""> off </span>')+tplCriteria+'</div>' ;
              }


             
          }
        },
        {
          targets: 6,
          width: '26px',
          render: function (data, type, full, meta) {
              const user = full['user'],
              name = user.name,
              email = user.email,
              image = user.profile_photo_url,
              stateNum = Math.floor(Math.random() * 6),
              states = ['success', 'danger', 'warning', 'info', 'primary', 'secondary'],
              state = states[stateNum]

              // Creates full output for row
            var colorClass = image === '' ? ' bg-light-' + state + ' ' : ' ';

              var output =
                '<img  src="' + image + '" alt="Avatar" width="32" height="32">';

              var rowOutput =
                '<div class="d-flex justify-content-left align-items-center">' +
                '<div class="avatar-wrapper">' +
                '<div class="avatar' +
                colorClass +
                'me-50">' +
                output +
                '</div>' +
                '</div>' +
                '<div class="d-flex flex-column">' +
                '<h6 class="user-name text-truncate mb-0">' +
                name +
                '</h6>' +
                '<small class="text-truncate text-muted">' +
                email +
                '</small>' +
                '</div>' +
                '</div>';
return rowOutput

          }
        },
        {
          targets: 7,
          width: '26px',
          render: function (data, type, full, meta) {
              const user = full['manager'],
              name = user.name,
              email = user.email,
              image = user.profile_photo_url,
              stateNum = Math.floor(Math.random() * 6),
              states = ['success', 'danger', 'warning', 'info', 'primary', 'secondary'],
              state = states[stateNum]

              // Creates full output for row
            var colorClass = image === '' ? ' bg-light-' + state + ' ' : ' ';

              var output =
                '<img  src="' + image + '" alt="Avatar" width="32" height="32">';

              var rowOutput =
                '<div class="d-flex justify-content-left align-items-center">' +
                '<div class="avatar-wrapper">' +
                '<div class="avatar' +
                colorClass +
                'me-50">' +
                output +
                '</div>' +
                '</div>' +
                '<div class="d-flex flex-column">' +
                '<h6 class="user-name text-truncate mb-0">' +
                name +
                '</h6>' +
                '<small class="text-truncate text-muted">' +
                email +
                '</small>' +
                '</div>' +
                '</div>';
return rowOutput

          }
        },
        {

        // Actions
        targets: -1,
        title: 'Actions',
        width: '26px',
        orderable: false,
  
        render: function (data, type, full, meta) {
         
         const usr =  dtInvoiceTable[0]._user,
          role =usr .roles[0].name;
         let tpl='';

        
          if(role==="standard"){
            tpl='<a href="#" data-test-record-on-delete="'+full['id']+'" data-test-record-new-val class="dropdown-item">' +
          feather.icons['trash'].toSvg({ class: 'font-small-4 me-50' }) +
          '</a>';
          }

          return (
            '<div class="d-flex align-items-center col-actions">' +
          
            tpl +

            '</div>' +
            '</div>'
          );
        }

        },



      ],
      order: [[1, 'desc']],
      dom:
        '<"row d-flex justify-content-between align-items-center m-1"' +
        '<"col-lg-6 d-flex align-items-center"l<"dt-action-buttons text-xl-end text-lg-start text-lg-end text-start "B>>' +
        '<"col-lg-6 d-flex align-items-center justify-content-lg-end flex-lg-nowrap flex-wrap pe-lg-1 p-0"f<"invoice_status ms-sm-2">>' +
        '>t' +
        '<"d-flex justify-content-between mx-2 row"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6"p>' +
        '>',
      language: {
        sLengthMenu: 'Show _MENU_',
        search: 'Search',
        searchPlaceholder: 'Search Invoice',
        paginate: {
          // remove previous & next text from pagination
          previous: '&nbsp;',
          next: '&nbsp;'
        }
      },
      // Buttons with Dropdown
      buttons: buttonsTop,
      // For responsive popup
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details of ' + data['client_name'];
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {

            var data = $.map(columns, function (col, i) {
              return col.columnIndex !== 2 // ? Do not show row in modal popup if title is blank (for check box)
                ? '<tr data-dt-row="' +
                    col.rowIdx +
                    '" data-dt-column="' +
                    col.columnIndex +
                    '">' +
                    '<td>' +
                    col.title +
                    ':' +
                    '</td> ' +
                    '<td>' +
                    col.data +
                    '</td>' +
                    '</tr>'
                : '';
            }).join('');
            return data ? $('<table class="table"/>').append('<tbody>' + data + '</tbody>') : false;
          }
        }
      },
      initComplete: function () {
        $(document).find('[data-bs-toggle="tooltip"]').tooltip();
         // Adding role filter once table initialized
         // console.log({api:this.api(),tb:this})
         const tb= this;
         const _n=()=>{
         this.$('[data-test-record-on]').each((i,el)=>{

          $(el).on('click', function(ev){
                const id= this.getAttribute('data-test-record-id')
                const key= this.getAttribute('data-test-record-on')
                const val= this.getAttribute('data-test-record-new-val')
                const data={}
                data[key]=val==="true"?true:val==="false"?false:val
                  tb[0]._onTestRecordChange(id,
                    data,dtInvoice)
                })
          })
          this.$('[data-test-record-on-delete]').each((i,el)=>{

            $(el).on('click', function(ev){
                  const id= this.getAttribute('data-test-record-on-delete')
                    tb[0]._onTestRecordDelete(id,dtInvoice)
                  })
            })
         

          // Cart dropdown touchspin
          this.$('.touchspin-cart').each((i,el)=>{
            $(el).TouchSpin({
              buttondown_class: 'btn btn-primary',
              buttonup_class: 'btn btn-primary',
              buttondown_txt: feather.icons['minus'].toSvg(),
              buttonup_txt: feather.icons['plus'].toSvg()
            });
          });
    
          const fnNxt= debounce((id,key,val)=>{
           // console.log({id,key,val})
            const data={}
            data[key]=!val?0:val
            tb[0]._onTestRecordChange(id,
              data,dtInvoice)
          
          },350);
          this.$('[data-test-record-on-input]').each((i,el)=>{
            $(el).on('change', function(ev){
              const id= this.getAttribute('data-test-record-id')
              const key= this.getAttribute('data-test-record-on-input')
              const val= ev.target.value
              fnNxt(id,key,val)
            })
          })



        }
         dtInvoice.on( 'xhr',()=>{
          setTimeout(_n,300)
         });
         _n();
     
       
       /* dtInvoice.ajax .done( function(data) {
          console.log({ajaxdone:data})

        })*/

        this.api()
          .columns(8)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="UserRole" class="form-select ms-50 text-capitalize"><option value=""> Select Status </option></select>'
            )
              .appendTo('.invoice_status')
              .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                column.search(val ? '^' + val + '$' : '', true, false).draw();
              });

            column
              .data()
              .unique()
              .sort()
              .each(function (d, j) {
                select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
              });
          });
      },
      drawCallback: function () {
        $(document).find('[data-bs-toggle="tooltip"]').tooltip();
      }
    });
  }
});
