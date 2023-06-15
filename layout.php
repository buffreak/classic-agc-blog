<?php
const TOP_HTML = <<<TOP_HTML_HEREDOC
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="{{ .SiteName }} - {{ .SiteDescription }}" />
  <link rel="canonical" href="{{ .DomainName }}/">
  <meta name="author" content="admin" />
  <title>{{ .SiteName }} - {{ .SiteDescription }}</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="/assets/ico/favicon.ico" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="/assets/css/styles.css" rel="stylesheet" />
  </head>
  <body>
  <!-- Responsive navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
  <a class="navbar-brand" href="/">{{ .SiteName }}</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
  <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
  <li class="nav-item"><a class="nav-link" href="disclaimer">Disclaimer</a></li>
  <li class="nav-item"><a class="nav-link" href="privacy-policy">Privacy Policy</a></li>
  <li class="nav-item"><a class="nav-link" href="dmca">DMCA</a></li>
  </ul>
  </div>
  </div>
  </nav>
  <!-- Page header with logo and tagline-->
  <header class="py-5 bg-light border-bottom mb-4">
  <div class="container">
  <div class="text-center my-5">
  <h1 class="fw-bolder">Welcome to {{ .SiteName }}</h1>
  <p class="lead mb-0">{{ .SiteDescription }}</p>
  </div>
  </div>
  </header>
  <!-- Page content-->
  <div class="container">
  <div class="row">
  <!-- Blog entries-->
  <div class="col-lg-8">
  <!-- Featured blog post-->
TOP_HTML_HEREDOC;

const SIDEBAR_WIDGET = <<<SIDEBAR_WIDGET_HEREDOC
  <!-- Side widgets-->
  <div class="col-lg-4">
  <div style="position: sticky; top: 20px; margin-bottom: 20px;">
  <!-- Search widget-->
  <div class="card mb-4">
  <div class="card-header">Search</div>
  <div class="card-body">
  <div class="input-group">
  <input class="form-control" id="input-search" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
  <button class="btn btn-primary" id="button-search" type="button">Go!</button>
  </div>
  </div>
  </div>
  <!-- Categories widget-->
  <div class="card mb-4">
  <div class="card-header">Popular Posts</div>
  <div class="card-body">
  <div class="list-group">
SIDEBAR_WIDGET_HEREDOC;

const FOOTER = <<<FOOTER_HEREDOC
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  <!-- Footer-->
  <footer class="py-3 bg-dark">
  <div class="container"><p class="m-0 text-center text-white">Copyright &copy; {{ .SiteName }} 2023</p></div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="/assets/js/scripts.js"></script>
  </body>
  </html>
FOOTER_HEREDOC;
?>