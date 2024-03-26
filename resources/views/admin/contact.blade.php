@extends('admin.template')

@section('main-containt')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- <section class="content-header">

            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section> -->

        <!-- Main content -->

        <!-- CONTACT SECTION -->
        <section class="bg-white py-4 ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 myclass " >
                        <h4 class="h2 pb-2">Contact Us</h4>
                        <!-- FORM BY SUPER EASY FORMS -->
                        <form id="super-easy-form" alt="Form by Super Easy Forms" class="pb-3" action="#">
                            <label for="first_name" class="small mb-1 ">first name:</label>
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                placeholder="first name" required>
                            <label for="last_name" class="small mb-1">last name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                placeholder="last name" required>
                            <label for="email" class="small mb-0">email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="email"
                                required>
                            <label for="phone_number" class="small mb-1">phone number</label>
                            <input type="number" class="form-control" id="phone_number" name="phone_number"
                                placeholder="phone number" required>
                            <label for="message" class="small mb-1">message</label>
                            <textarea type="text" class="form-control mytext" id="message" name="message" placeholder="message"
                                required></textarea> 
                            <h5 id="contact-status" class="text-secondary" style="display:none;">Thanks for Contacting
                                Us
                            </h5>
                            <button class="btn btn-primary mt-3 mybtn" type="submit" id="super-easy-btn">Send</button>
                        </form>
                        <!-- it's bad etiquette to use free stuff without giving some cred to the creators :) -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('css')
<style>
    .myclass{
        border:1px solid black;
	    max-width: 400px;
	    max-height:500px;
        
        margin: 4em 0 4em 0;
        margin-left:20em;
        box-sizing:border-box;
         box-shadow: 0 0 1em #222;
        
    
    }
    .mytext,.mybtn{
        margin-bottom:10px;
    }

    
    
</style>
@endpush
@push('javascript')
<!--Javascript-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
    </script>
    <script>
    $(function() {
        $('#super-easy-form').submit(function(e) {
            e.preventDefault();
            var formdata = toJSONString(this);
            console.log(formdata);
            $.ajax({
                type: "POST",
                url: "https://warlx5icu6.execute-api.us-east-1.amazonaws.com/deployment2019-05-22T07-53-19-000Z/",
                dataType: "json",
                contentType: "application/json",
                data: JSON.stringify({
                    "id": "",
                    "first_name": $('#first_name').val(),
                    "last_name": $('#last_name').val(),
                    "email": $('#email').val(),
                    "phone_number": $('#phone_number').val(),
                    "message": $('#message').val()
                }),
                beforeSend: function(data) {
                    $('#super-easy-btn').prop('disabled', true);
                    $('#super-easy-form :input').prop('disabled', true);
                    $('#contact-status').html('Sending...').show();
                },
                success: function(data) {
                    console.log(data);
                    $('#contact-status').text("We'll get back to you soon").show();
                    $('#super-easy-form :input').removeProp('disabled');
                    $('#super-easy-btn').removeProp('disabled');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#contact-status').text('Error. Please try again soon.').show();
                    $('#super-easy-form :input').removeProp('disabled');
                    $('#super-easy-btn').removeProp('disabled');
                }
            });
        });

        function toJSONString(form) {
            var obj = {};
            var elements = form.querySelectorAll("input, select, textarea");
            for (var i = 0; i < elements.length; ++i) {
                var element = elements[i];
                var name = element.name;
                var value = element.value;
                if (name) {
                    obj[name] = value;
                }
            }
            return JSON.stringify(obj);
        }
    });
    </script>
@endpush