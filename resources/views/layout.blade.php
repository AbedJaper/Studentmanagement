<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
        .sidebar {
            margin: 0;
            padding: 0;
            width: 200px;
            background-color: #f1f1f1;
            position: fixed;
            height: 100%;
            overflow: auto;
        }

        .sidebar a {
            display: block;
            color: black;
            padding: 16px;
            text-decoration: none;
        }

        .sidebar a.active {
            background-color: #04AA6D;
            color: white;
        }

        .sidebar a:hover:not(.active) {
            background-color: #555;
            color: white;
        }

        div.content {
            margin-left: 200px;
            padding: 1px 16px;
            height: 1000px;
        }

        @media screen and (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .sidebar a {
                float: left;
            }
            div.content {
                margin-left: 0;
            }
        }

        @media screen and (max-width: 400px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h1 class="h3 mb-0">Student Management Project</h1>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
        </div>
    </div>

    <div class="row">

        <div class="col-md-3">
            <div class="sidebar">
                <a class="{{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                <a class="{{ request()->is('students*') ? 'active' : '' }}" href="{{ url('/students') }}">Student</a>
                <a class="{{ request()->is('teachers*') ? 'active' : '' }}" href="{{ url('/teachers') }}">Teacher</a>
                <a class="{{ request()->is('courses*') ? 'active' : '' }}" href="{{ url('/courses') }}">Courses</a>
                <a class="{{ request()->is('batches*') ? 'active' : '' }}" href="{{ url('/batches') }}">Batches</a>
                <a class="{{ request()->is('enrollments*') ? 'active' : '' }}" href="{{ url('/enrollments') }}">Enrollment</a>
                <a class="{{ request()->is('payments*') ? 'active' : '' }}" href="{{ url('/payments') }}">Payment</a>
            </div>
        </div>

        <div class="col-md-9">
            @yield('content')
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
