<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $__env->make('layouts.partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo \Livewire\Livewire::styles(); ?>

    </head>
    <body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl" style="background-color: #F3F3F3">
        <?php echo $__env->make('layouts.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
           
        <?php echo $__env->make('layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
        <main id="content" role="main" class="main">
            <div class="content container-fluid">
                <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               
                  <?php echo $__env->yieldContent('content'); ?>
                              
            </div>

        </main>
            <?php echo $__env->make('layouts.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- container-scroller -->
        <?php echo $__env->make('layouts.partials.footer-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End custom js for this page-->
        <!-- JS Plugins Init. -->
        <script>
          $(document).on('ready', function () {
            // initialization of navbar vertical navigation
            var sidebar = $('.js-navbar-vertical-aside').hsSideNav();

            // initialization of tooltip in navbar vertical menu
            $('.js-nav-tooltip-link').tooltip({ boundary: 'window' })

            $(".js-nav-tooltip-link").on("show.bs.tooltip", function(e) {
              if (!$("body").hasClass("navbar-vertical-aside-mini-mode")) {
                return false;
              }
            });

            // initialization of unfold
            $('.js-hs-unfold-invoker').each(function () {
              var unfold = new HSUnfold($(this)).init();
            });
          });
        </script>

        <!-- IE Support -->
        <script>
          if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="../assets/vendor/babel-polyfill/polyfill.min.js"><\/script>');
        </script>
        <?php echo \Livewire\Livewire::scripts(); ?>

    </body>
</html>
<?php /**PATH E:\xampp1\htdocs\intimark_sia\resources\views/layouts/main.blade.php ENDPATH**/ ?>