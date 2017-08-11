








    <!DOCTYPE html> <html lang="en"> <head>
    <meta charset="UTF-8" /> <!-- Metadata will not be
    displayed on the page, but will be machine parsable. Change the
    content to better describe your website--> <meta
    name="description" content="XYZLEAD Enter description of your
    website"> <meta name="keywords" content="xyzlead enter a
    few keywords, free website, website builder, "> <meta
    name="author" content="Your Name"> <meta name="viewport"
    content="width=device-width, initial-scale=1.0"> <!--
    Change title to your websites name --> <title>XYZLead
    - Made Website</title> <!-- Latest compiled and
    minified CSS --> <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library --> <!-- font awesome -->
    <link
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    rel="stylesheet"> <!-- core css--> <link
    rel="stylesheet" type="text/css" href="xyzcss/examples.css"
    /> <!-- core JavaScript --> <script
    src="xyzjs/jquery.min.js"></script> <script
    src="xyzjs/underscore-min.js"></script> <script
    src="xyzjs/backbone-min.js"></script> <script
    src="xyzjs/xyz.js"></script> <script
    src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css"
    href="xyzcss/xyztheme.css">
  


  
    
  
  
    <!-- add custom scripts and style bellow-->
  


  
    
  
  
    </head> <body>
  
<section><div class="row">
       <ul id="test">
  <li data-product-id="1" data-type="listitem1">item 1</li>
  <li data-product-id="1" data-type="car">item 2</li>
  <li data-product-id="1" data-type="dd">item 3</li>
</ul>

    
    <button id="myBtn">Try it</button>

<p id="demo" data-product-id="text" data-type="text"></p>
    
    
    </div>
        </section>
        
<!--<script>
  var test = document.getElementById("test");
  
  
  // this handler will be executed only once when the cursor moves over the unordered list
  test.addEventListener("mouseenter", function( event ) {   
    // highlight the mouseenter target
    event.target.style.color = "purple";

    // reset the color after a short delay
    setTimeout(function() {
      event.target.style.color = "";
    }, 500);
  }

, false);
  
  
  // this handler will be executed every time the cursor is moved over a different list item
  test.addEventListener("mouseover", function( event ) {   
    // highlight the mouseover target
    event.target.style.color = "orange";

    // reset the color after a short delay
    setTimeout(function() {
      event.target.style.color = "";
    }, 500);
  }, false);





</script>-->


<script>
var mouseover = 0;
var clicks = 0;
var mouseout = 0;
var e;
//var dog = $(e.target).attr('data-type');

document.addEventListener("mouseover", myFunction);
document.addEventListener("click", mySecondFunction);
document.addEventListener("mouseout", myThirdFunction);

function myFunction(e) {
    document.getElementById("demo").innerHTML += "Moused over!<br>";
   console.log($(e.target).attr('data-type'));
    console.log($(e.target).attr('data-product-id'));
    
    console.log(++clicks);
}

function mySecondFunction() {
    document.getElementById("demo").innerHTML += "Clicked!<br>";
}

function myThirdFunction() {
    document.getElementById("demo").innerHTML += "Moused out!<br>";
}
</script>




        
        
        
        
     </body> </html> 