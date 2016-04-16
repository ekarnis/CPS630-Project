<?php include("header.php");?>

    <main class="container" id="link_1">
        <article class="col-xs-12">
      <!--  Changes by Isaac !-->
			<input type="textbox" id="item-name-field" class="formattedTextBox" placeholder="Name"></input>

      <br>

      <input type="textbox" id="item-description-field" class="formattedTextBox" placeholder="Description"></input>

			<br>

      <input type="number" step="0.01" id="item-price-field" class="formattedTextBox" placeholder="Price"></input>

      <br>

      <div class="container" id="dropZone">
			     <input type="file" id="item-image-field"></input>
      </div>

      <!--  Changes by Isaac !-->
			<br>

      <input type="date" id="item-date-field" class="formattedTextBox" placeholder="Expire Date"></input>

      <br>

        </article>

		<div class="col-xs-12">
				<button type="button" id="done-button" class="btn btn-xl btn-warning centeredButton">Done</textarea>
        </div>
    </main>

<?php include("footer.php");?>

<script>

$(document).on("click", "#done-button", function(){
  $.ajax({
    type: 'POST',
    url: 'ajax/ajax_newitem.php',
    data: {
            itemname: $("#item-name-field").val(),
            itemdescription: $("#item-description-field").val(),
            itemprice: $("#item-price-field").val(),
            itemdate:  $("#item-date-field").val(),
			itemimage: $("#item-image-field").serialize()
          },
    dataType: 'json',
    success: function (data) {
      console.log(data);
    }
  });
});
</script>
