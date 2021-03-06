<!DOCTYPE html>
<html lang="en">

{if isset($view.headjs)}
    {include file='headjs.tpl'}
{else}
    {include file='head.tpl'}
{/if}

  <body>
  {include file='navbar.tpl'}

    <div class="container">
      <div class="row">
        <div id="pageBodyProducts">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
              <h1>Edit product</h1>
              {foreach from=$view.results item=product}
              <form method="post" action="" enctype="multipart/form-data" id="formedit1">
                  <input type="hidden" name="id" value="{$product.id}" />
                  <input type="hidden" name="imageoriginal" value="{$product.image}" />
                  <label for="name">Name</label><br />
                  <input type="text" name="name" id="name" size="30" value="{$product.name}" /><br />
                  <label for="price">Price</label><br />
                  <input type="text" name="price" id="price" value="{$product.price}" /><br />
                  <label for="description">Description</label><br />
                  <input type="text" name="description" id="description" size="100" value="{$product.description}" /><br />
                  <label for="image">Image</label><br />
                  <input type="file" name="image" id="image" /><br />
                  <p>NOTE: If no file is selected, the current file will be kept.</p>
                  <button class="flex-no-shrink bg-blue hover:bg-blue-dark border-blue hover:border-blue-dark text-3xl border-4 text-white py-1 px-2 rounded" type="submit" form="formedit1">
                      Save
                  </button>
              </form>
              {/foreach}
              {if $view.saved == 1}
                  <div class="alert-success"><p>The product has been saved!</p></div>
              {/if}
              {if $view.error == 1}
                  <div class="alert-danger"><p>The product has not been saved! Please try again.</p></div>
              {/if}
              <p><br /><br /><a href="{$view.urlbaseaddr}products/index" class="mt-6 inline-block bg-white text-black no-underline px-4 py-3 shadow-lg">List products</a><br /><br /></p>
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

  {include file='footer.tpl'}

  {if $view.bodyjs == 1}
      {include file='bodyjs.tpl'}
  {/if}

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{$view.urlbaseaddr}js/ie10-viewport-bug-workaround.js"></script>
    
  </body>
</html>
