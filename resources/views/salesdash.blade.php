<!DOCTYPE html>
<html>
<style>
  .main-wrapper {
    opacity: 0;
    animation: showPage .8s ease forwards;
}
@keyframes showPage {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
  .nx-dash {
    --nx-bg: #0B1E3D;
    --nx-card: #121b3a;
    --nx-border: rgba(255,255,255,0.07);
    --nx-text: #f5f7fb;
    --nx-muted: #8891a8;
    --nx-blue: #3b82f6;
    --nx-green: #22c55e;
    --nx-red: #ef4444;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Inter, Roboto, Helvetica, Arial, sans-serif;
    color: var(--nx-text);
    background: var(--nx-bg);
   
  }
  .nx-dash *, .nx-dash *::before, .nx-dash *::after { box-sizing: border-box; }

 .nx-grid {
    display:grid;
    grid-template-columns:2.4fr 1fr;
    gap:20px;
    align-items: stretch;
  }

  .nx-card {
    background: var(--nx-card);
    border: 1px solid var(--nx-border);
    border-radius: 16px;
    padding: 20px;
  }
  .nx-sales-card { display: flex; flex-direction: column; }

  .nx-sales-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 14px;
  }

  .nx-sales-title {
    font-size: 15px;
    font-weight: 500;
    margin: 0;
  }

  .nx-dropdown { position: relative; }
  .nx-dropdown-btn {
    background: transparent;
    border: 1px solid rgba(255,255,255,0.2);
    color: var(--nx-text);
    font-size: 13px;
    font-family: inherit;
    padding: 7px 14px;
    border-radius: 999px;
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
  }
  .nx-dropdown-btn:hover { border-color: rgba(255,255,255,0.4); }
  .nx-dropdown-btn .nx-chevron {
    width: 7px; height: 7px;
    border-right: 1.5px solid var(--nx-muted);
    border-bottom: 1.5px solid var(--nx-muted);
    transform: rotate(45deg);
    transition: transform .15s ease;
  }
  .nx-dropdown.open .nx-dropdown-btn .nx-chevron { transform: rotate(225deg); }

  .nx-dropdown-menu {
    position: absolute;
    top: calc(100% + 8px);
    right: 0;
    background: #1a2648;
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 10px;
    min-width: 150px;
    padding: 6px;
    box-shadow: 0 12px 28px rgba(0,0,0,0.4);
    display: none;
    z-index: 10;
  }
  .nx-dropdown.open .nx-dropdown-menu { display: block; }

  .nx-dropdown-item {
    padding: 9px 12px;
    font-size: 13px;
    border-radius: 7px;
    cursor: pointer;
    color: var(--nx-text);
  }
  .nx-dropdown-item:hover { background: rgba(59,130,246,0.18); }
  .nx-dropdown-item.active { background: rgba(59,130,246,0.28); color: #9dc4ff; }

  .nx-sales-figure-row {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 4px;
  }
  .nx-sales-figure {
    font-size: 34px;
    font-weight: 700;
    letter-spacing: -0.5px;
    display: flex;
    align-items: baseline;
    gap: 2px;
  }
  .nx-sales-figure .nx-peso { font-size: 25px; font-weight: 600; }

  .nx-change-badge {
    background: rgba(34,197,94,0.16);
    color: var(--nx-green);
    font-size: 12px;
    font-weight: 600;
    padding: 3px 10px;
    border-radius: 999px;
    white-space: nowrap;
  }

  .nx-sales-sub {
    color: var(--nx-muted);
    font-size: 13px;
    margin: 0 0 12px 0;
  }

  .nx-chart-wrap {
    flex: 1;
    position: relative;
    min-height: 230px;
  }
  .nx-chart-wrap svg { width: 100%; height: 100%; display: block; overflow: visible; }

  .nx-chart-tooltip {
    position: absolute;
    background: #1c2748;
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 8px;
    padding: 8px 12px;
    font-size: 12px;
    line-height: 1.6;
    pointer-events: none;
    transform: translate(-50%, -110%);
    white-space: nowrap;
    display: none;
    z-index: 5;
  }
  .nx-chart-tooltip .nx-tt-row { display: flex; align-items: center; gap: 6px; }
  .nx-chart-tooltip .nx-tt-dot { width: 7px; height: 7px; border-radius: 50%; flex-shrink: 0; }

  .nx-stats-col { display: flex; flex-direction: column; gap: 12px; }
.nx-stats-col .nx-card{
    height:132px;
    display:flex;
    flex-direction:column;
    justify-content:flex-start;
    padding:18px 22px;
}
 .nx-stat-label{
    color:#98A5CC;
    font-size:12px;
    font-weight:500;
    line-height:1;
    margin:0 0 6px;
    text-transform:none;
}
  .nx-stat-value{
    display:flex;
    align-items:baseline;
    gap:2px;
    font-size:22px;
    font-weight:700;
    line-height:1;
}
 .nx-stat-value .nx-peso{
    font-size:19px;
    font-weight:700;
}
  .nx-stat-value.nx-red { color: var(--nx-red); }
  .nx-stat-value.nx-green { color: var(--nx-green); font-size: 24px; }

 .nx-bottom-grid{
    display:grid;
    grid-template-columns:minmax(0,1fr) 420px;
    gap:12px;
    margin-top:12px;
    align-items:stretch;
}

.nx-bottom-grid > .nx-card{
    height:100%;
}
  .nx-breakdown-title { font-size: 15px; font-weight: 600; margin: 0 0 2px 0; }
  .nx-breakdown-sub { color: var(--nx-muted); font-size: 13px; margin: 0 0 16px 0; }

  .nx-breakdown-list { display: flex; flex-direction: column; gap: 10px; }

  .nx-breakdown-item {
    border: 1px solid rgba(59,130,246,0.4);
    border-radius: 10px;
    padding: 12px 16px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 14px;
  }
  .nx-breakdown-item .nx-item-label { color: #7fa8ff; }
  .nx-breakdown-item .nx-item-amount { color: var(--nx-text); font-weight: 500; }

  .nx-breakdown-total {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 16px 0 16px;
    font-size: 14px;
  }
  .nx-breakdown-total .nx-item-label { color: #7fa8ff; }
  .nx-breakdown-total .nx-item-amount { font-weight: 600; }

 .nx-empty-card{
    width:100%;
    height:100%;
    min-height:0;
    flex:1;
}

  @media (max-width: 900px) {
    .nx-grid, .nx-bottom-grid { grid-template-columns: 1fr; }
  }
</style>
<div id="splash"></div>
    <div class="main-wrapper">
  
  <div>

<div class="nx-dash" id="nxDash">

  <div class="nx-grid">

    <div class="nx-card nx-sales-card">
      <div class="nx-sales-header">
        <p class="nx-sales-title" id="nxSalesTitle"></p>

        <div class="nx-dropdown" id="nxDropdown">
          <button type="button" class="nx-dropdown-btn" id="nxDropdownBtn">
            <span id="nxDropdownLabel"></span>
            <span class="nx-chevron"></span>
          </button>
          <div class="nx-dropdown-menu" id="nxDropdownMenu"></div>
        </div>
      </div>

      <div class="nx-sales-figure-row">
        <div class="nx-sales-figure"><span class="nx-peso">₱</span><span id="nxSalesFigure"></span></div>
        <span class="nx-change-badge" id="nxChangeBadge"></span>
      </div>
      <p class="nx-sales-sub" id="nxSalesSub"></p>

      <div class="nx-chart-wrap" id="nxChartWrap">
        <div class="nx-chart-tooltip" id="nxTooltip"></div>
      </div>
    </div>

    <div class="nx-stats-col">
      <div class="nx-card">
    <div class="nx-stat-label" id="nxStat1Label"></div>
    <div class="nx-stat-value">
        <span class="nx-peso">₱</span>
        <span id="nxStat1Value"></span>
    </div>
</div>

<div class="nx-card">
    <div class="nx-stat-label" id="nxStat2Label"></div>
    <div class="nx-stat-value nx-red">
        <span class="nx-peso">₱</span>
        <span id="nxStat2Value"></span>
    </div>
</div>

<div class="nx-card">
    <div class="nx-stat-label" id="nxStat3Label"></div>
    <div class="nx-stat-value nx-green">
        <span id="nxStat3Value"></span>
        <span>%</span>
    </div>
</div>

  </div>

  <div class="nx-bottom-grid">
    <div class="nx-card">
      <p class="nx-breakdown-title" id="nxBreakdownTitle"></p>
      <p class="nx-breakdown-sub" id="nxBreakdownSub"></p>
      <div class="nx-breakdown-list" id="nxBreakdownList"></div>
      <div class="nx-breakdown-total">
        <span class="nx-item-label" id="nxBreakdownTotalLabel"></span>
        <span class="nx-item-amount" id="nxBreakdownTotalAmount"></span>
      </div>
    </div>

    <div class="nx-card nx-empty-card">
    </div>
  </div>

</div>

<script>
  window.onload = () => {
  const splash = document.getElementById("splash");
  const SPLASH_DURATION = 500;

  setTimeout(() => {
    splash.style.opacity = "0";
    splash.style.pointerEvents = "none";
  }, SPLASH_DURATION);
};
(function () {
  "use strict";

  var dashboardDataByPeriod = {
    "Last Week": {
      total: 73000,
      changePercent: 34,
      changeAmount: 21478.03,
      changeSuffix: "more than last month",                             
      chart: {
        labels: ["Sunday", "Monday", "Tueday", "Wednesday", "Thursday", "Friday", "Saturday"],
        series: [
          { name: "Series A", color: "#ffffff", showPoints: true,  data: [40, 68, 20, 92, 62, 58, 88] },
          { name: "Series B", color: "#7c4dff", showPoints: false, data: [22, 46, 55, 48, 66, 70, 90] },
          { name: "Series C", color: "#ec4899", showPoints: false, data: [55, 72, 50, 55, 40, 46, 62] },
          { name: "Series D", color: "#f4c542", showPoints: false, data: [50, 80, 48, 68, 58, 68, 82] }
        ]
      },
      stats: {
        totalSales: 32478,
        unpaidCount: 2,
        unpaidAmount: 21065,
        yearlyTarget: 87
      },
      breakdown: {
        items: [
          { label: "Product Sales", amount: 18436 },
          { label: "Service Sales", amount: 11868 },
          { label: "Recurring Revenue", amount: 13094 }
        ],
        total: 43398
      }
    },
    "Last Month": {
      total: 268400,
      changePercent: 18,
      changeAmount: 40920.5,
      changeSuffix: "more than the previous month",
      chart: {
        labels: ["May 3", "May 12", "May 21", "May 29"],
        series: [
          { name: "Series A", color: "#ffffff", showPoints: true,  data: [45, 82, 38, 90] },
          { name: "Series B", color: "#7c4dff", showPoints: false, data: [30, 55, 60, 78] },
          { name: "Series C", color: "#ec4899", showPoints: false, data: [58, 66, 45, 60] },
          { name: "Series D", color: "#f4c542", showPoints: false, data: [52, 74, 50, 70] }
        ]
      },
      stats: {
        totalSales: 118250,
        unpaidCount: 5,
        unpaidAmount: 54210,
        yearlyTarget: 87
      },
      breakdown: {
        items: [
          { label: "Product Sales", amount: 72300 },
          { label: "Service Sales", amount: 46900 },
          { label: "Recurring Revenue", amount: 51200 }
        ],
        total: 170400
      }
    },
    "Last Year": {
      total: 3120000,
      changePercent: 12,
      changeAmount: 340120,
      changeSuffix: "more than the year before",
      chart: {
        labels: ["Jan", "Feb", "May", "Aug"],
        series: [
          { name: "Series A", color: "#ffffff", showPoints: true,  data: [50, 70, 55, 88] },
          { name: "Series B", color: "#7c4dff", showPoints: false, data: [35, 50, 62, 80] },
          { name: "Series C", color: "#ec4899", showPoints: false, data: [60, 65, 48, 58] },
          { name: "Series D", color: "#f4c542", showPoints: false, data: [55, 78, 60, 72] }
        ]
      },
      stats: {
        totalSales: 1482900,
        unpaidCount: 14,
        unpaidAmount: 210300,
        yearlyTarget: 87
      },
      breakdown: {
        items: [
          { label: "Product Sales", amount: 812000 },
          { label: "Service Sales", amount: 540000 },
          { label: "Recurring Revenue", amount: 610500 }
        ],
        total: 1962500
      }
    }
  };

  var staticText = {
    salesTitle: "Sales",
    stat1Label: "Total Sales",
    stat3Label: "YEARLY REVENUE TARGET",
    breakdownTitle: "Sales",
    breakdownSub: "This month, grouped by revenue stream",
    breakdownTotalLabel: "Total Sales:"
  };

  var periods = ["Last Week", "Last Month", "Last Year"];
  var currentPeriod = "Last Week";

  function formatMoney(n) {
    return Number(n).toLocaleString("en-PH", { maximumFractionDigits: 2, minimumFractionDigits: 0 });
  }

  function formatCompact(n) {
    if (n >= 1000000) return (n / 1000000).toFixed(n % 1000000 === 0 ? 0 : 1) + "M";
    if (n >= 1000) return Math.round(n / 1000) + "K";
    return formatMoney(n);
  }

  
  function renderDropdown() {
    document.getElementById("nxDropdownLabel").textContent = currentPeriod;

    var menu = document.getElementById("nxDropdownMenu");
    menu.innerHTML = "";
    periods.forEach(function (p) {
      var item = document.createElement("div");
      item.className = "nx-dropdown-item" + (p === currentPeriod ? " active" : "");
      item.textContent = p;
      item.addEventListener("click", function () {
        currentPeriod = p;
        document.getElementById("nxDropdown").classList.remove("open");
        renderAll();
      });
      menu.appendChild(item);
    });
  }

  document.addEventListener("click", function (e) {
    var dropdown = document.getElementById("nxDropdown");
    if (!dropdown) return;
    if (dropdown.contains(e.target)) {
      if (e.target.closest("#nxDropdownBtn")) {
        dropdown.classList.toggle("open");
      }
    } else {
      dropdown.classList.remove("open");
    }
  });


  function renderSalesHeader(data) {
    document.getElementById("nxSalesTitle").textContent = staticText.salesTitle;
    document.getElementById("nxSalesFigure").textContent = formatCompact(data.total);
    document.getElementById("nxChangeBadge").textContent = "↑ " + data.changePercent + "%";
    document.getElementById("nxSalesSub").textContent =
      "₱" + formatMoney(data.changeAmount) + " " + data.changeSuffix;
  }

  function catmullRomPath(points) {
    if (points.length < 2) return "";
    var d = "M " + points[0].x + " " + points[0].y;
    for (var i = 0; i < points.length - 1; i++) {
      var p0 = points[i === 0 ? i : i - 1];
      var p1 = points[i];
      var p2 = points[i + 1];
      var p3 = points[i + 2 < points.length ? i + 2 : i + 1];
      var cp1x = p1.x + (p2.x - p0.x) / 6;
      var cp1y = p1.y + (p2.y - p0.y) / 6;
      var cp2x = p2.x - (p3.x - p1.x) / 6;
      var cp2y = p2.y - (p3.y - p1.y) / 6;
      d += " C " + cp1x + " " + cp1y + ", " + cp2x + " " + cp2y + ", " + p2.x + " " + p2.y;
    }
    return d;
  }

  function renderChart(chartData) {
    var wrap = document.getElementById("nxChartWrap");
    var tooltip = document.getElementById("nxTooltip");

    // clear previous svg (keep tooltip div)
    var oldSvg = wrap.querySelector("svg");
    if (oldSvg) oldSvg.remove();

    var W = 760, H = 260;
    var padL = 10, padR = 10, padTop = 16, padBottom = 30;
    var plotW = W - padL - padR;
    var plotH = H - padTop - padBottom;

    var allValues = [];
    chartData.series.forEach(function (s) { allValues = allValues.concat(s.data); });
    var min = Math.min.apply(null, allValues);
    var max = Math.max.apply(null, allValues);
    var range = (max - min) || 1;
    min -= range * 0.15;
    max += range * 0.15;
    range = max - min;

    var n = chartData.labels.length;
    function xAt(i) { return padL + (n === 1 ? plotW / 2 : (plotW * i) / (n - 1)); }
    function yAt(v) { return padTop + plotH - ((v - min) / range) * plotH; }

    var svgNS = "http://www.w3.org/2000/svg";
    var svg = document.createElementNS(svgNS, "svg");
    svg.setAttribute("viewBox", "0 0 " + W + " " + H);
    svg.setAttribute("preserveAspectRatio", "none");

   
    var gridCount = 4;
    for (var g = 0; g <= gridCount; g++) {
      var gy = padTop + (plotH * g) / gridCount;
      var line = document.createElementNS(svgNS, "line");
      line.setAttribute("x1", padL);
      line.setAttribute("x2", W - padR);
      line.setAttribute("y1", gy);
      line.setAttribute("y2", gy);
      line.setAttribute("stroke", "rgba(255,255,255,0.06)");
      line.setAttribute("stroke-width", "1");
      svg.appendChild(line);
    }

    var seriesPoints = chartData.series.map(function (s) {
      return s.data.map(function (v, i) { return { x: xAt(i), y: yAt(v) }; });
    });

    chartData.series.forEach(function (s, si) {
      var path = document.createElementNS(svgNS, "path");
      path.setAttribute("d", catmullRomPath(seriesPoints[si]));
      path.setAttribute("fill", "none");
      path.setAttribute("stroke", s.color);
      path.setAttribute("stroke-width", "2.25");
      path.setAttribute("stroke-linecap", "round");
      svg.appendChild(path);

      if (s.showPoints) {
        seriesPoints[si].forEach(function (pt) {
          var c = document.createElementNS(svgNS, "circle");
          c.setAttribute("cx", pt.x);
          c.setAttribute("cy", pt.y);
          c.setAttribute("r", 4);
          c.setAttribute("fill", s.color);
          svg.appendChild(c);
        });
      }
    });
    var guide = document.createElementNS(svgNS, "line");
    guide.setAttribute("y1", padTop);
    guide.setAttribute("y2", padTop + plotH);
    guide.setAttribute("stroke", "rgba(255,255,255,0.25)");
    guide.setAttribute("stroke-width", "1");
    guide.setAttribute("stroke-dasharray", "3,3");
    guide.style.display = "none";
    svg.appendChild(guide);

    chartData.labels.forEach(function (label, i) {
      var text = document.createElementNS(svgNS, "text");
      text.setAttribute("x", xAt(i));
      text.setAttribute("y", H - 8);
      text.setAttribute("fill", "#8891a8");
      text.setAttribute("font-size", "12");
      text.setAttribute("text-anchor", i === 0 ? "start" : (i === n - 1 ? "end" : "middle"));
      text.textContent = label;
      svg.appendChild(text);
    });

    chartData.labels.forEach(function (label, i) {
      var rect = document.createElementNS(svgNS, "rect");
      var colW = plotW / n;
      rect.setAttribute("x", xAt(i) - colW / 2);
      rect.setAttribute("y", 0);
      rect.setAttribute("width", colW);
      rect.setAttribute("height", H);
      rect.setAttribute("fill", "transparent");
      rect.style.cursor = "pointer";
      rect.addEventListener("mouseenter", function () {
        guide.setAttribute("x1", xAt(i));
        guide.setAttribute("x2", xAt(i));
        guide.style.display = "block";

        var rows = chartData.series.map(function (s) {
          return '<div class="nx-tt-row"><span class="nx-tt-dot" style="background:' + s.color + '"></span>' +
                 s.name + ": " + s.data[i] + '</div>';
        }).join("");
        tooltip.innerHTML = "<strong>" + label + "</strong>" + rows;
        tooltip.style.display = "block";

        var wrapRect = wrap.getBoundingClientRect();
        var px = (xAt(i) / W) * wrapRect.width;
        var py = (yAt(chartData.series[0].data[i]) / H) * wrapRect.height;
        tooltip.style.left = px + "px";
        tooltip.style.top = py + "px";
      });
      rect.addEventListener("mouseleave", function () {
        guide.style.display = "none";
        tooltip.style.display = "none";
      });
      svg.appendChild(rect);
    });

    wrap.insertBefore(svg, tooltip);
  }


  function renderStats(data) {
    document.getElementById("nxStat1Label").textContent = staticText.stat1Label;
    document.getElementById("nxStat1Value").textContent = formatMoney(data.stats.totalSales);

    document.getElementById("nxStat2Label").textContent = data.stats.unpaidCount + " UNPAID INVOICES";
    document.getElementById("nxStat2Value").textContent = formatMoney(data.stats.unpaidAmount);

    document.getElementById("nxStat3Label").textContent = staticText.stat3Label;
    document.getElementById("nxStat3Value").textContent = data.stats.yearlyTarget;
  }


  function renderBreakdown(data) {
    document.getElementById("nxBreakdownTitle").textContent = staticText.breakdownTitle;
    document.getElementById("nxBreakdownSub").textContent = staticText.breakdownSub;

    var list = document.getElementById("nxBreakdownList");
    list.innerHTML = "";
    data.breakdown.items.forEach(function (item) {
      var row = document.createElement("div");
      row.className = "nx-breakdown-item";
      row.innerHTML =
        '<span class="nx-item-label">' + item.label + '</span>' +
        '<span class="nx-item-amount">₱' + formatMoney(item.amount) + '</span>';
      list.appendChild(row);
    });

    document.getElementById("nxBreakdownTotalLabel").textContent = staticText.breakdownTotalLabel;
    document.getElementById("nxBreakdownTotalAmount").textContent = "₱" + formatMoney(data.breakdown.total);
  }
  function renderAll() {
    var data = dashboardDataByPeriod[currentPeriod];
    renderDropdown();
    renderSalesHeader(data);
    renderChart(data.chart);
    renderStats(data);
    renderBreakdown(data);

    document.getElementById("nxDash").dispatchEvent(
      new CustomEvent("nx:period-changed", { detail: { period: currentPeriod } })
    );
  }

  renderAll();

})();
</script>


</html>
