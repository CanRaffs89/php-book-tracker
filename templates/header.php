<head>
    <title>Book Tracker</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type="text/css">
        .brand {
            background: #5c6e91 !important;
        }
        .brand-text {
            color: #5c6e91 !important;
        }
        form {
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }
        input[type=text]:focus + label {
            color: #dd9866 !important;
        }
        input[type=text]:focus {
            border-bottom: 1px solid #dd9866 !important;
            box-shadow: 0 1px 0 0 #dd9866 !important;
        }
        .red-text {
            color: #8f384d !important; 
        }
    </style>
</head>
<body class="grey lighten-4">
    <nav class="white z-depth-0">
        <div class="container">
            <a href="index.php" class="brand-logo brand-text">Book Tracker</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li><a href="add.php" class="btn brand z-depth-0">Add Book</a></li>
            </ul>
        </div>
    </nav>