<!doctype html>
<html lang="en">
    @include('includes.head')
  <body>
    @include('includes.navbar')

      <div class="container-fluid">
        <div class="container mt-5">
            <div class="row">

                @yield('content')

            </div>
        </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>