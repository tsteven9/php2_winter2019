 $(function(){

   defineEvents();
 });


 const defineEvents = () => {
  $("button").click(function(){
    $("p").css("color", "red");
    });
 }
