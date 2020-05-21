
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Registration System</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/carousel/carousel.css" rel="stylesheet">
  </head>
  <body>

    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Registration System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">ผู้จัดทำ</a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>

    <main role="main">

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="images/home/111.jpg" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                {{-- <h1>Example headline.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p> --}}
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="images/home/book.jpg" alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
                {{-- <h1>Another example headline.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p> --}}
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="images/home/exam_.png" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right">
                {{-- <h1>One more for good measure.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p> --}}
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
           <div class="col-lg-3">
                <center><a href="/public/subjects" ><img class="rounded-circle" src="images/icon-12.jpg"alt="Generic placeholder image" width="140" height="140"></a></center>
                <p></p>
                <center><p><a class="btn btn-success" href="public/subjects" role="button">วิชาที่เปิดสอบ </a></p></center>
           </div><!-- /.col-lg-4 -->

           <div class="col-lg-3">
                <center><a href="admin/userDetails"><img class="rounded-circle" src="images/icon-14.jpg" alt="Generic placeholder image" width="140" height="140"></a></center>
                <p></p>
                <center><p><a class="btn btn-primary" href="admin/userDetails" role="button">รายชื่อผู้ลงสอบ </a></p></center>
           </div><!-- /.col-lg-4 -->

            <div class="col-lg-3">
                <center><a href="admin/exams"><img class="rounded-circle" src="images/icon-13.jpg" alt="Generic placeholder image" width="140" height="140"></a></center>
                <p></p>
                <center><p><a class="btn btn-warning" href="admin/exams" role="button">สถานที่สอบ </a></p></center>
            </div><!-- /.col-lg-4 -->

            <div class="col-lg-3">
                <center><a href="{{ route('login') }}"><img class="rounded-circle" src="images/icon-15.jpg" alt="Generic placeholder image" width="140" height="140"></a></center>
                <p></p>
                <center><p><a class="btn btn-danger" href="{{ route('login') }}" role="button">เข้าสู่ระบบ </a></p></center>
            </div><!-- /.col-lg-4 -->

        </div><!-- /.row   -->


        <!-- START THE FEATURETTES -->



        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->


      <!-- FOOTER -->
      <footer class="container">
        <p></p>
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; Only @2019. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        <p>เว็บนี้จัดทำขึ้นเพื่อส่งงานรายวิชา Database.</p>
      </footer>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js"></script>
  </body>
</html>
