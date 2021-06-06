$(document).ready(function () {
  $(".tadaicon").transition({
    animation: "tada",
    duration: "2s",
  });
  $(".animatedsquare").transition("hide");
  $(".animatedsquare").transition("swing right");
  $(window).scroll(function () {
    if (this.scrollY > 0) {
      $(".scroll-up-btn").addClass("show");
      $(".ui.stackable.menu").addClass("change-bg");
    } else {
      $(".scroll-up-btn").removeClass("show");
      $(".ui.stackable.menu").removeClass("change-bg");
    }
  });
  $(".scroll-up-btn").click(function () {
    $("html").animate({ scrollTop: 0 });
    $("html").css("scrollBehavior", "auto");
  });
});
$(document).ready(function () {
  $("#myTable").DataTable();
});

$(".menu").on("click", "a", function () {
  $(".menu a.active").removeClass("active");
  $(this).addClass("active");
});

const currentLocation = location.href;
const menuItem = document.querySelector("a");
const menuLength = menuItem.length;
for (let i = 0; i < menuLength; i++) {
  if (menuItem[i].href == currentLocation) {
    menuItem[i].className = "item active";
  }
}
$(".ui.modal.login")
  .modal({ centered: false, blurring: true, useFlex: false })
  .modal("attach events", ".login-button", "show");
$(".ui.modal.signup")
  .modal({ centered: false, blurring: true, useFlex: false })
  .modal("attach events", ".signup-button", "show");
$(".ui.modal.update-car")
  .modal({ centered: false, blurring: true, useFlex: false })
  .modal("show");
$(".ui.dropdown").dropdown();

$(document).ready(function () {
  // Create DataTable
  var table = $("#myAdminTableCategory").DataTable({
    dom: "Pfrtip",
  });

  // Create the chart with initial data
  var container = $("<div/>").insertBefore(table.table().container());

  var chart = Highcharts.chart(container[0], {
    chart: {
      type: "pie",
    },
    title: {
      text: "Brands Counts",
    },
    series: [
      {
        name: "Brands",
        colorByPoint: true,
        data: chartData(table),
      },
    ],
    xAxis: {
      title: {
        text: "Colors",
      },
    },
    yAxis: {
      title: {
        text: "Count",
      },
    },
  });

  // On each draw, update the data in the chart
  table.on("draw", function () {
    chart.series[1].setData(chartData(table));
  });
});

function chartData(table) {
  var counts = {};

  // Count the number of entries for each position
  table
    .column(1, { search: "applied" })
    .data()
    .each(function (val) {
      if (counts[val]) {
        counts[val] += 1;
      } else {
        counts[val] = 1;
      }
    });

  // And map it to the format highcharts uses
  return $.map(counts, function (val, key) {
    return {
      name: key,
      y: val,
    };
  });
}

$(document).ready(function () {
  // Create DataTable
  var table = $("#myAdminTable").DataTable({
    dom: "Pfrtip",
  });

  // Create the chart with initial data
  var container = $("<div/>").insertBefore(table.table().container());

  var chart = Highcharts.chart(container[0], {
    chart: {
      type: "column",
    },
    title: {
      text: "Colors Counts",
    },
    series: [
      {
        data: chartData(table),
      },
    ],
    xAxis: {
      title: {
        text: "Colors",
      },
    },
    yAxis: {
      title: {
        text: "Count",
      },
    },
  });

  // On each draw, update the data in the chart
  table.on("draw", function () {
    chart.series[1].setData(chartData(table));
  });
});

function chartData(table) {
  var counts = {};

  // Count the number of entries for each position
  table
    .column(1, { search: "applied" })
    .data()
    .each(function (val) {
      if (counts[val]) {
        counts[val] += 1;
      } else {
        counts[val] = 1;
      }
    });

  // And map it to the format highcharts uses
  return $.map(counts, function (val, key) {
    console.log(key, val);
    return {
      name: key,
      y: val,
    };
  });
}

$(document).ready(function () {
  // Create DataTable
  var table = $("#myAdminTablePrice").DataTable({
    dom: "Pfrtip",
  });

  // Create the chart with initial data
  var container = $("<div/>").insertBefore(table.table().container());

  var chart = Highcharts.chart(container[0], {
    title: {
      text: "Daily Price",
    },
    series: [
      {
        data: chartData(table),
      },
    ],
    xAxis: {
      tickInterval: 1,
      type: "logarithmic",
      accessibility: {
        rangeDescription: "Range: 2000 to 2021",
      },
    },

    yAxis: {
      type: "logarithmic",
      minorTickInterval: 0.1,
      accessibility: {
        rangeDescription: "Range: 0.1 to 500",
      },
    },
  });

  // On each draw, update the data in the chart
  table.on("draw", function () {
    chart.series[1].setData(chartData(table));
  });
});

function chartData(table) {
  var counts = {};

  // Count the number of entries for each position
  table
    .column(1, { search: "applied" })
    .data()
    .each(function (val) {
      if (counts[val]) {
        counts[val] += 1;
      } else {
        counts[val] = 1;
      }
    });

  // And map it to the format highcharts uses
  return $.map(counts, function (val, key) {
    console.log(key, val);
    return {
      name: key,
      y: val,
    };
  });
}

$(document).ready(function () {
  // Create DataTable
  var table = $("#myAdminTableModelYear").DataTable({
    dom: "Pfrtip",
  });

  // Create the chart with initial data
  var container = $("<div/>").insertBefore(table.table().container());

  var chart = Highcharts.chart(container[0], {
    chart: {
      type: "pie",
      options3d: {
        enabled: true,
        alpha: 45,
      },
    },
    title: {
      text: "Model Years",
    },
    plotOptions: {
      pie: {
        innerSize: 100,
        depth: 45,
      },
    },
    series: [
      {
        name: "Model Years",
        data: chartData(table),
      },
    ],
  });

  // On each draw, update the data in the chart
  table.on("draw", function () {
    chart.series[1].setData(chartData(table));
  });
});

function chartData(table) {
  var counts = {};

  // Count the number of entries for each position
  table
    .column(1, { search: "applied" })
    .data()
    .each(function (val) {
      if (counts[val]) {
        counts[val] += 1;
      } else {
        counts[val] = 1;
      }
    });

  // And map it to the format highcharts uses
  return $.map(counts, function (val, key) {
    return {
      name: key,
      y: val,
    };
  });
}
