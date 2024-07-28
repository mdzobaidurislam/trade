$(document).ready(function () {
  const $fileUpload = $("#file-upload");
  const $fileBrowser = $("#file-browser");
  const $dropArea = $("#drop-area");
  const $imagePreview = $("#imagePreview");

  $fileUpload.css("opacity", "0");

  $fileBrowser.on("click", function (e) {
    e.preventDefault();
    $fileUpload.trigger("click");
  });

  $fileUpload.on("change", function (event) {
    previewImage(event);
  });

  $dropArea.on("dragover", function (event) {
    event.preventDefault();
    event.stopPropagation();
    $dropArea.addClass("dragover");
  });

  $dropArea.on("dragleave", function (event) {
    event.preventDefault();
    event.stopPropagation();
    $dropArea.removeClass("dragover");
  });

  $dropArea.on("drop", function (event) {
    event.preventDefault();
    event.stopPropagation();
    $dropArea.removeClass("dragover");

    const files = event.originalEvent.dataTransfer.files;
    if (files.length > 0) {
      $fileUpload.prop("files", files);
      previewImage({ target: { files } });
    }
  });

  function previewImage(event) {
    const image = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function () {
      $imagePreview.attr("src", reader.result);
      $imagePreview.show();
    };

    if (image) {
      reader.readAsDataURL(image);
    }
  }

  // address
  //   $("#permanent_address_status").change(function () {
  //     var village = $("#village").val();
  //     var post_office = $("#post_office").val();
  //     var thana = $("#thana").val();
  //     var district = $("#district").val();

  //     var permanent_village = $("#permanent_village");
  //     var permanent_post_office = $("#permanent_post_office");
  //     var permanent_thana = $("#permanent_thana");
  //     var permanent_district = $("#permanent_district");

  //     if ($(this).is(":checked")) {
  //       permanent_village.val(village);
  //       permanent_post_office.val(post_office);
  //       permanent_thana.val(thana);
  //       permanent_district.val(district);
  //     } else {
  //       permanent_village.val("");
  //       permanent_post_office.val("");
  //       permanent_thana.val("");
  //       permanent_district.val("");
  //     }
  //   });

  $("#permanent_address_status").change(function () {
    var prefix = "";
    if ($("#en_village").length) {
      prefix = "en_";
      console.log("first");
    }

    var holding_no = $("#" + prefix + "holding_no").val();
    var village = $("#" + prefix + "village").val();
    var post_office = $("#" + prefix + "post_office").val();
    var thana = $("#" + prefix + "thana").val();
    var district = $("#" + prefix + "district").val();

    var permanent_holding_no = $("#" + prefix + "permanent_holding_no");
    var permanent_village = $("#" + prefix + "permanent_village");
    var permanent_post_office = $("#" + prefix + "permanent_post_office");
    var permanent_thana = $("#" + prefix + "permanent_thana");
    var permanent_district = $("#" + prefix + "permanent_district");

    if ($(this).is(":checked")) {
      permanent_holding_no.val(holding_no);
      permanent_village.val(village);
      permanent_post_office.val(post_office);
      permanent_thana.val(thana);
      permanent_district.val(district);
    } else {
      permanent_holding_no.val("");
      permanent_village.val("");
      permanent_post_office.val("");
      permanent_thana.val("");
      permanent_district.val("");
    }
  });
});

// Print start
// document.addEventListener("DOMContentLoaded", function () {
//     const printBtn = document.getElementById("print-btn");

//     printBtn.addEventListener("click", function () {
//         window.print();
//     });
// });

// Print end
