@extends('admin.template')

@section('main-containt')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->

        <!-- product SECTION -->
        <form action="{{route('admin.about_submit')}}" method="post" class="myform">
			@csrf
				<label for="about_us">about_us : </label>
				
                <textarea  class="mytextarea" type="text" id="username" placeholder="About Us" name="about"></textarea>

				
			
			
			<p>
				<input type="submit" value="SUBMIT" id="submit">
			</p>
		</form>
		<script src="https://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/app.js" type="text/javascript" charset="utf-8"></script>
        
    </div>
@endsection

@push('css')
<style>
body {
	background: #384047;
	font-family: sans-serif;
	font-size: 10px
}


.myform {
	background: #fff;
	padding: 4em 4em 2em;
	max-width: 400px;
	margin: 100px auto 0;
	box-shadow: 0 0 1em #222;
	border-radius: 5px;
}


.mytextarea {
    margin: -22px;
    font: inherit;
    color: inherit;
    margin-top:10px;
    margin-left:10px;
}


p {
	margin: 0 0 3em 0;
	position: relative;
}

label {
	display: block;
	font-size: 1em;
	margin: 0 0 .5em;
	color: #333;
}

input {
	display: block;
	box-sizing: border-box;
	width: 100%;
	outline: none
}

input[type="text"],
input[type="password"] {
	background: #f5f5f5;
	border: 1px solid #e5e5e5;
	font-size: 1.6em;
	padding: .1em .5em;
	border-radius: 5px;
}

input[type="text"]:focus,
input[type="password"]:focus {
	background: #fff
}

.left,
.right {
	border-radius: 5px;
	display: block;
	font-size: 1.3em;
	text-align: center;
	position: absolute;
	background: #2F558E;
	padding: 7px 10px;
	color: #fff;
}

.left {
	left: -60%;
	top: 18px;
	width: 200px;
}

.right {
	left: 105%;
	top: 25px;
	width: 160px;
}

.left:after,
.right:after {
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	top: 50%;
	pointer-events: none;
	border-color: rgba(136, 183, 213, 0);
	border-width: 8px;
	margin-top: -8px;
}

.right:after {
	right: 100%;
	border-right-color: #2F558E;
}

.left:after {
	left: 100%;
	border-left-color: #2F558E;
}

input[type="submit"] {
	background: #2F558E;
	box-shadow: 0 3px 0 0 #1D3C6A;
	border-radius: 5px;
	border: none;
	color: #fff;
	cursor: pointer;
	display: block;
	font-size: 2em;
	line-height: 1em;
	margin: 2em 0 0;
	outline: none;
	padding: .1em 0;
	text-shadow: 0 1px #68B25B;
}
</style>
