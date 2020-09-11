// $(document).ready(function (){
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     $('#search-transaction').on('click',function (){
//
//         let value = $(this).val();
//         console.log(value)
//         $.ajax({
//             url: origin + '/admin/transactions/search',
//             type: 'GET',
//             dataType: 'json',
//             data: {
//                 keyword: value
//             },
//             success: function (result){
//                 console.log(result)
//                 let html = '';
//
//                 $.each(result, function (index, item){
//
//                     html += '<tr id="transactions-'+item.id+'">';
//                     html += '<th scope="row">';
//                     html += index+1;
//                     html += '</th>';
//                     html += '<td>';
//                     html += item.money;
//                     html += '</td>';
//                     html += '<td>';
//                     html += item.date;
//                     html += '</td>';
//                     html += '<td>';
//                     html += item.category_id;
//                     html += '</td>';
//                     html += '<td>';
//                     html += item.description;
//                     html += '</td>';
//                     html += '<td>';
//                     html += '<a href="http://127.0.0.1:8000/admin/transactions/'+item.id+'/edit">Edit</a>';
//                     html += '</td>';
//                     html += '<td>';
//                     html += '<button class="delete-transaction" data-id="'+item.id+'">Delete</button>';
//                     html += '</td>';
//
//
//                 })
//                 $('#result').html(html)
//             }
//         })
//
//     })
// })
//
//
//
