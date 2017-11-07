<!DOCTYPE html>
<?php
        include("world_data_parser.php");
?>
<html>
<head>
         <meta charset="UTF-8">
         <meta name="description" content="WME Aufgabe 2">
         <meta name="keywords" content="PHP, XML">
         <meta name="author" content="">
         <meta name="author" content="">

         <!-- Font Awesome über Ajax HTTP Request *** Internetverbindung & Apache erforderlich *** --> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		
        <!-- CSS-Reset -->
        <link rel="stylesheet" type="text/css" href="../../res/stylesheet/reset.css">
        
        <!-- Roboto Web Font über Ajax HTTP Request *** Internetverbindung & Apache erforderlich *** -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">

        <!-- main.css kommt nach dem CSS-Reset, damit sie durch reset.css nicht überschrieben werden. -->
        <link rel="stylesheet" type="text/css" href="../../res/stylesheet/main.css">

        <script src="../../res/script/main.js" type="text/javascript"></script>

         <title>Aufgabe 2 - Print</title>
</head>
<body>
         <header id="menu_kopf">
            <a id="logo" href="./main.html" title="home"> Home </a> 
			<a class="menu" onclick="showMenu()"><i class="fa fa-list-ul"></i></a> 
			<!-- horizontal navbar, versteckt sich, wenn screen zu klein ist -->
            <nav id="nav_horizontal">
                <ul>
                    <a href="main.html" class="header_href"> <li class="header_icon"><i class="fa fa-list-ul"></i>  A1 - Table </li> </a>
                    <a class="header_href" href="/wme/A2/php/parse/parse.php"> <li class="header_icon"><i class="fa fa-list-ul"></i>  A2 - Parse </li> </a>
                    <a class="header_href" href="/wme/A2/php/parse/save.php"> <li class="header_icon"><i class="fa fa-list-ul"></i>  A2 - Save  </li> </a>
                    <a class="header_href" href="/wme/A2/php/parse/print.php"> <li class="header_icon"><i class="fa fa-list-ul"></i>  A2 - Print </li> </a>
                    <a class="header_href"> <li class="header_icon"><i class="fa fa-list-ul"></i>  A3 - REST </li> </a>
                    <a class="header_href"> <li class="header_icon"><i class="fa fa-list-ul"></i>  A4 - Vis  </li> </a>
                </ul> 
            </nav>
        </header>
    
    <article id="overview_article">
            <header>
                <h1 class="main_ueberschrift"> World Data Overview </h1>
            </header>
            <section class="box">
                <!-- http://www.jongo-webagentur.de/blog/fun/lorem-ipsum-uebersetzung-auf-deutsch-4337029.html -->
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore
                et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
                consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
                sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                no sea takimata sanctus est Lorem ipsum dolor sit amet.
                Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat,
                vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit
                praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet,
                consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                Duis autem vel eum iriure dolor in hendrerit in vulputate <a href="./main.html"> velit esse </a>.
            </section>
        </article>

         <div class="data_table_container_2">
              <div class="show_hide_buttons">
              Show/Hide:
               <!--  <Button title="hide column" class="hide_column_button" onclick="toggle_column('data_table_col_1')">ID</Button>   |
                 <Button title="hide column" class="hide_column_button" onclick="toggle_column('data_table_col_2')">Country</Button>  |  -->
                 <Button title="hide column" class="hide_column_button" onclick="toggle_column('data_table_col_3')">birth rate /1000</Button>    |
                 <Button title="hide column" class="hide_column_button" onclick="toggle_column('data_table_col_4')">cellphones /100</Button>    |
                 <Button title="hide column" class="hide_column_button" onclick="toggle_column('data_table_col_5')">children / woman</Button>   |
                 <Button title="hide column" class="hide_column_button" onclick="toggle_column('data_table_col_6')">electric usage</Button>     |
                 <Button title="hide column" class="hide_column_button" onclick="toggle_column('data_table_col_7')">internet usage</Button>
              </div>

<?php
        //Inserts Data Table

        $parser = new Analyser();
        $parsed = $parser->parseCSV(WORLD_DATA_PATH);
        $save_result = $parser->saveXML($parsed);
        $print = $parser->printXML(XML_PATH, XSL_PATH);

        echo $print;

?>
         </div>

         <footer id="group_footer">
                 <div class="footer_left_container">
                         Copyright &copy; 2015 world_data <br>
                         Second course exercise PHP and XML of the lecture Web and Multimedia Engineering
                 </div>
                 <div class="footer_right_container">
                         The solution has been created by:<br>
                         Andr&eacute; K&uuml;hnert (s6510611) and Fabian Boltz (s3349388) - Team 45
                 </div>
         </footer>
</body>
</html>