<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="A resume, portfolio website where I can show off things that I've
		learned. I hope to expand the site to continually show what I'm learning and doing.">
	<meta name="keywords" content="Stephen Beaty Sbeatycode Sbeaty Code resume portfolio computer tech programming">
	<meta name="author" content="Stephen Beaty">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SBeaty Code - Blog</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <link href="/sbeatyStyle.css" rel="stylesheet">

	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <?php wp_head();?>
</head>
<body>
    <!------- HEADER -------->
    <header>
        <nav class="navbar navbar-inverse">
            <div clas="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="/homepage.html" class="navbar-brand">SBeaty Code</a>
                </div> <!-- /navbar header -->
                
                <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a class="menu_item_home" href="/homepage.html"><i class="material-icons">home</i></a></li>
                            <li><a class="menu_item" href="/homepage.html">Home</a></li>
                            <li><a class="menu_item" href="/portfolio.html">Portfolio</a><br></li>
                            <li><a class="menu_item" href="/about.html">About Me</a></li>
                            <li><a class="menu_item" href="/contact.html">Contact</a></li>							
                            <li><a class="menu_item_blog" href="http://sbeatycode.com/blog/wordpress">Blog</a></li>
                        </ul>
                </div> <!-- /navbar-collapse-->
            </div> <!-- /container fluid-->
        </nav> <!-- /Navbar-->
    </header> <!-- /Header -->
