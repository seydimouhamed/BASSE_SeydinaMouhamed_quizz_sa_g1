<script src="http://code.jquery.com/jquery-1.7.2.js"></script>
<!-- <form method="post" name="postForm">
    <ul>
        <li>
            <label>Name</label>
            <input type="text" name="name" id="name" placeholder="Bruce Wayne">
            <span class="throw_error"></span>
            <span id="success"></span>
       </li>
   </ul>
   <input type="submit" value="Send" />
</form> -->
<ul>
   <li class="onglet"><a href="/quizzbd/index.php">Description</a></li>
   <li class="onglet"><a href="hebergement-photos.php">Photos</a></li>
</ul>
<div id="contenu"><!-- Insère le contenu ici --></div>
<script>

$(document).ready(function(){
   $('.onglet a').click(function(){
      var url = $(this).attr('href');
      $('#contenu').load(url);
      return false;
   });
});


//     $(document).ready(function() {
//     $('form').submit(function(event) { //Trigger on form submit
//         $('#name + .throw_error').empty(); //Clear the messages first
//         $('#success').empty();

//         //Validate fields if required using jQuery

//         var postForm = { //Fetch form data
//             'name'     : $('input[name=name]').val() //Store name fields value
//         };

//         $.ajax({ //Process the form using $.ajax()
//             type      : 'POST', //Method type
//             url       : '/quizzbd/controller/process.php', //Your form processing file URL
//             data      : postForm, //Forms name
//             dataType  : 'json',
//             success   : function(data) {
//                             if (!data.success) { //If fails
//                                 if (data.errors.name) { //Returned if any error from process.php
//                                     $('.throw_error').fadeIn(1000).html(data.errors.name); //Throw relevant error
//                                 }
//                             }
//                             else {
                                
//                                    // $('#success').html(data);
//                                     $('#success').fadeIn(1000).append('<p>' + data.posted + '</p>'); //If successful, than throw a success message
//                                 }
//                             }
//         });
//         event.preventDefault(); //Prevent the default submit
//     });
// });
</script>