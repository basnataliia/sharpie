<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="main.js"></script>
    <title>Document</title>
</head>
<body>
<h1>Testing branch</h1>
<p>some chamges from testing branch</p>
<!--<div class="loading-div" style="display:none;"><img src="images/ajax-loader.gif"></div>-->
<form id="question">
    <label for="firstname">First Name:</label>
    <input id="firstname" name="firstname">
    <br/><br/>
    <label for="lastname">Last Name:</label>
    <input id="lastname" name="lastname">
    <br/><br/>
    <label for="lastname">Subscribe:</label>
    <input type="checkbox" id="subscribe" name="subscribe">
    <br/>
    <br/>
    <label for="lastname">Select fruits you like:</label>
    <br/>
    <!--    <fieldset id="checkArray">-->
    <label for="Apple">Apple:</label>
    <input type="checkbox" name="chk[]" id="Apple" value="Apples"/>
    <label for="Banana">Banana:</label>
    <input type="checkbox" name="chk[]" id="Banana" value="Bananas"/>
    <br/>
    <br/>
    <!--    </fieldset>-->

    <label for="lastname">Select your gender:</label>
    <br/>
    <label for="Male">Male:</label>
    <input type="radio" name="gender" id="Male" value="Male"/>
    <label for="Female">Female:</label>
    <input type="radio" name="gender" id="Female" value="Female"/>
    <br/>
    <br/>
    <label>Select Language</label>
    <br/>
    <select name="language" id="language">
        <option value="English">English</option>
        <option value="Spanish">Spanish</option>
        <option value="French">French</option>
    </select>
</form>
<img id="loader" src="http://tracuu.thuvientphcm.gov.vn:8081/Images/loader.gif" style="display: none"/>
<div id="results"></div>
<br/>
<br/>
<button class="load_more">Load more</button>

<!--some comment-->
<?php
//$post_data = array
//(
//    array('firtsname' => "Natalie", 'lastname' => "Basmanova"),
//    array('firtsname' => "Mina", 'lastname' => "Azer"),
//    array('firtsname' => "Terry", 'lastname' => "Bru"),
//    array('firtsname' => "Mini", 'lastname' => "Fugi"),
//    array('firtsname' => "Tori", 'lastname' => "Klark"),
//    array('firtsname' => "Merry", 'lastname' => "Cherry"),
//    array('firtsname' => "Fre", 'lastname' => "Fargi"),
//    array('firtsname' => "Metthew", 'lastname' => "Pyton")
//);
//
//$number = count($post_data);
//$total_pages = ceil($number / 2);


?>

<script>

    $(document).ready(function () {
        var loadMoreBtn = $('.load_more');

        //post data to the server upon btn is clicked
        loadMoreBtn.on('click', function () {
            //check if the subscription checkbox ic checked
            var subr = $('#subscribe').is(':checked');
            //select all fruits checkboxes
            var fruits = $('[name="chk[]"]');
            //create an empty fuites array to populate it with user data
            var fruits_array = [];

            //loop trough all fruits checkboxes
            for (var i = 0; i < fruits.length; i++) {
                //if fruits checkbox is checked, add checked value to the fruits_array
                if ($(fruits[i]).is(':checked')) {
                    fruits_array.push((fruits[i]).value);
                }
            }

//           console.log( "Gender: " + $('[name="gender"]:checked').val());
//
//            if($('.input1').val())
//
            var gender = $('[name="gender"]:checked').val();


//            $('input[name=name_of_your_radiobutton]:checked').val();


            //form data that will  be send to the server
            var form_data = {
                firstname: $('[name="firstname"]').val(),
                lastname: $('[name="lastname"]').val(),
                subscribe: subr,
                fruits: {fruits_array: fruits_array},
                gender: gender,
                language: $('[name="language"]').val(),
                ajax: "1"
            };

            function showLoadingImgFn(){
                $('#loader').show();
            }

            //ajax call to post data on the server
            $.ajax({
                type: "POST",
                url: "jsondata.php",
                beforeSend: showLoadingImgFn,
                async: true,
                data: form_data,
                success: function (data) {
                    $('#loader').fadeOut();
                    $('#results').html(data);
                },
                error: function () {
                    alert("some error occured");
                }
            });

//        showLoadingImgFn();

//            $.post("jsondata.php",
//                {
//                    firstname: $('[name="firstname"]').val(),
//                    lastname: $('[name="lastname"]').val(),
//                    subscribe: subr,
//                    fruits: {fruits_array: fruits_array},
//                    gender: gender,
//                    language: $('[name="language"]').val(),
//                    ajax: "1"
//                },
//                function(data,status){
//                    $('#results').html(data);
////                    alert("Data: " + data + "\nStatus: " + status);
//                });

        })
    });

</script>

</body>
</html>