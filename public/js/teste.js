// $(document).ready(function () {
//     $('form').submit(function (event) { //Trigger on form submit
//         $('#name + .throw_error').empty(); //Clear the messages first
//         $('#success').empty();

//         //Validate fields if required using jQuery

//         // var postForm = { //Fetch form data
//         //     'name': $('input[name=name]').val() //Store name fields value
//         // };
//         var postForm = $('#postForm').serialize(),

//         $.ajax({ //Process the form using $.ajax()
//             type: 'POST', //Method type
//             url: 'teste.php', //Your form processing file URL
//             data: postForm, //Forms name
//             dataType: 'json',
//             success: function (data) {
//                 if (!data.success) { //If fails
//                     if (data.errors.name) { //Returned if any error from process.php
//                         $('.throw_error').fadeIn(1000).html(data.errors.name); //Throw relevant error
//                     }
//                 }
//                 else {
//                     $('#success').fadeIn(1000).append('<p>' + data.posted + '</p>'); //If successful, than throw a success message
//                 }
//             }
//         });
//         event.preventDefault(); //Prevent the default submit
//     });
// });

