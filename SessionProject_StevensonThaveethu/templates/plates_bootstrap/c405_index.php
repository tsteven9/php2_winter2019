<!DOCTYPE html>
<html lang="en">

<?php if (isset($view['headjs'])): ?>
    <?=$this->section('headjs', $this->fetch('headjs', ['view' => $view]))?>
<?php else: ?>
    <?=$this->section('head', $this->fetch('head', ['view' => $view]))?>
<?php endif ?>

  <body>
  <?=$this->section('navbar', $this->fetch('navbar', ['view' => $view]))?>

    <div class="container">
      <div class="row">
        <div id="pageBody">
            <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 main">
                <h1>Method Not Allowed</h1>
                <p>Sorry, but this method is not allowed on this page.</p>
                <?php foreach($view['vars'] as $key => $value): ?>
                  <p>Allowed method: <?php echo $value ?></p>
                <?php endforeach; ?>
                <p>Let's go back <a href="<?php echo $view['urlbaseaddr'] ?>index">HOME</a>!</p>
            </div>
        </div> <!-- END pageBody -->
      </div>
    </div>

    <!-- feature -->
    <div class="w-full bg-yellow text-black">
      <div class="text-center">
          <p><br /></p>
          <h2 class="leading-normal mb-6 text-grey-darkest"></h2>
          <h3></h3>
          <p><br /></p>
      </div>
    </div>
    <!-- /feature -->

    <!-- content -->
    <div class="w-full px-6 py-12 bg-white">
      <div class="max-w-xl mx-auto flex flex-wrap">

          <div class="w-full md:w-1/2 flex flex-wrap">
          </div>

          <div class="w-full md:w-1/2 p-2 md:px-6">
              <h3>
              </h3>
              <p class="mb-5"></p>
              <p class="mb-8"></p>
              <p class="mb-8"></p>
          </div>

      </div>
    </div>
    <!-- /content -->

  <?=$this->section('footer', $this->fetch('footer', ['view' => $view]))?>

  <?php if ($view['bodyjs'] === 1): ?>
      <?=$this->section('bodyjs', $this->fetch('bodyjs', ['view' => $view]))?>
  <?php endif ?>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo $view['urlbaseaddr'] ?>js/ie10-viewport-bug-workaround.js"></script>
    
  </body>
</html>
