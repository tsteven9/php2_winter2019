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
            <h1>Products page</h1>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Description</th>
                      <th>Image</th>
                      <th>Options</th>
                  </tr>
                </thead>
                <tbody>
                {if isset($view.results.nodata)}
                <tr>
                    <td>{$view.results.nodata}</td>
                </tr>
                {else}
                  {foreach from=$view.results item=product}
                    <tr>
                        <td>{$product.id}</td>
                        <td>{$product.name}</td>
                        <td>{$product.price}</td>
                        <td>{$product.description}</td>
                        <td>{$product.image}</td>
                        <td>
                            <a href="{$view.urlbaseaddr}products/edit/{$product.id}">Modify</a>
                        </td>
                        <td>
                            <a href="{$view.urlbaseaddr}products/delete/{$product.id}">Delete</a>
                        </td>
                    </tr>
                  {/foreach}
                {/if}
                </tbody>
              </table>
            </div>
            <p><a href="{$view.urlbaseaddr}products/add" class="mt-6 inline-block bg-white text-black no-underline px-4 py-3 shadow-lg">Add new product</a></p>
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
