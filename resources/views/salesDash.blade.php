<!DOCTYPE html>
<html lang="en">
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = { theme: { extend: { colors: { navy: {900:'#0b1e3b',800:'#132b52',700:'#17325f',600:'#1c3a6e'}, muted:'#9bb0d1' } } } }
</script>
<head>
<meta charset="UTF-8">
<title>Sales</title>
<style>
.main-wrapper { opacity: 0; animation: showPage .8s ease forwards; }
@keyframes showPage { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
.dd-menu { animation: ddIn .12s ease forwards; }
@keyframes ddIn { from { opacity: 0; transform: translateY(-4px); } to { opacity: 1; transform: translateY(0); } }
</style>
</head>
<body class="bg-navy-900 text-white font-sans min-h-screen">

<div class="main-wrapper max-w-[1400px] mx-auto p-6 space-y-5">

  <div class="grid grid-cols-1 lg:grid-cols-[1fr_300px] gap-5">

    <div class="bg-navy-800 rounded-xl p-6">
      <div class="flex items-start justify-between mb-1">
        <div>
          <p class="text-sm text-muted mb-1">Sales</p>
          <div class="flex items-center gap-2">
            <span class="text-3xl font-bold">₱73K</span>
            <span class="text-xs font-semibold rounded-full px-2 py-0.5 bg-emerald-500/20 text-emerald-400">↑34%</span>
          </div>
          <p class="text-muted text-xs mt-1">₱21,478.03 more than last month</p>
        </div>
        <div class="relative">
          <button onclick="event.stopPropagation(); toggleMenu('dd-salesRange')" class="dd-toggle flex items-center gap-2 text-xs bg-navy-800 border border-navy-600 rounded-full px-4 py-1.5 hover:bg-navy-700 transition">
            Last Week
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div id="dd-salesRange" class="dd-menu hidden absolute right-0 mt-1 bg-navy-700 border border-navy-600 rounded-lg shadow-lg text-xs w-32 overflow-hidden z-20">
            <button onclick="closeAllMenus()" class="w-full text-left px-3 py-2 hover:bg-navy-600">This week</button>
            <button onclick="closeAllMenus()" class="w-full text-left px-3 py-2 hover:bg-navy-600">Last week</button>
            <button onclick="closeAllMenus()" class="w-full text-left px-3 py-2 hover:bg-navy-600">This month</button>
            <button onclick="closeAllMenus()" class="w-full text-left px-3 py-2 hover:bg-navy-600">This year</button>
          </div>
        </div>
      </div>

      <svg id="salesChart" viewBox="0 0 640 260" class="w-full h-64 mt-3"></svg>
    </div>

    <div class="space-y-3">
      <div class="bg-navy-700 rounded-lg p-4 flex items-center justify-between">
        <span class="text-sm text-muted">Total Sales</span>
        <span class="text-lg font-bold">₱32,478</span>
      </div>
      <div class="bg-navy-700 rounded-lg p-4">
        <span class="text-sm">USB Cable</span>
      </div>
      <div class="bg-navy-700 rounded-lg p-4">
        <span class="text-sm">NVME SSD 1 tb X30</span>
      </div>
      <div class="bg-navy-700 rounded-lg p-4">
        <span class="text-sm">PSU 850W GOLD</span>
      </div>
      <div class="bg-navy-700 rounded-lg p-4">
        <span class="text-sm">ATX Motherboard</span>
      </div>
    </div>

  </div>

  <div class="bg-navy-800 rounded-xl p-6">
    <h3 class="text-lg font-semibold">Sales</h3>
    <p class="text-muted text-xs mb-4">This month, grouped by revenue stream</p>

    <div class="space-y-3">
      <div class="flex items-center justify-between bg-navy-700/40 border border-blue-400/30 rounded-lg px-4 py-3">
        <span class="text-blue-400 font-medium text-sm">Product Sales</span>
        <span class="text-sm font-semibold">₱18,436</span>
      </div>
      <div class="flex items-center justify-between bg-navy-700/40 border border-blue-400/30 rounded-lg px-4 py-3">
        <span class="text-blue-400 font-medium text-sm">Service Sales</span>
        <span class="text-sm font-semibold">₱11,868</span>
      </div>
      <div class="flex items-center justify-between bg-navy-700/40 border border-blue-400/30 rounded-lg px-4 py-3">
        <span class="text-blue-400 font-medium text-sm">Recurring Revenue</span>
        <span class="text-sm font-semibold">₱13,094</span>
      </div>
      <div class="flex items-center justify-between px-4 pt-2">
        <span class="text-sm text-muted">Total Sales:</span>
        <span class="text-sm font-semibold">₱43,398</span>
      </div>
    </div>
  </div>

</div>

<script>
function toggleMenu(id){
  const el = document.getElementById(id);
  const wasHidden = el.classList.contains("hidden");
  closeAllMenus();
  if (wasHidden) el.classList.remove("hidden");
}
function closeAllMenus(){
  document.querySelectorAll(".dd-menu").forEach(m => m.classList.add("hidden"));
}
document.addEventListener("click", (e) => {
  if (!e.target.closest(".dd-menu") && !e.target.closest(".dd-toggle")) closeAllMenus();
});

function renderSalesChart(){
  const svg = document.getElementById("salesChart");
  const rect = svg.getBoundingClientRect();
  const w = Math.round(Math.max(rect.width, 300));
  const h = Math.round(Math.max(rect.height, 160));
  svg.setAttribute("viewBox", `0 0 ${w} ${h}`);
  svg.innerHTML = "";

  const months = ["January","February","March","April","May","June","July"];
  const series = [
    { color:"#f5c542", values:[38,68,55,72,58,75,88] },
    { color:"#ffffff", values:[30,78,25,88,50,45,80] },
    { color:"#8b5cf6", values:[28,42,58,62,60,65,75] },
    { color:"#ec4899", values:[25,70,45,50,32,48,55] },
  ];

  const padX = 4, padTop = 10, padBottom = 26;
  const plotH = h - padTop - padBottom;
  const maxVal = 100;

  const xFor = (i) => padX + (i * (w - padX * 2) / (months.length - 1));
  const yFor = (v) => padTop + (1 - v / maxVal) * plotH;

  // horizontal gridlines
  [0, 0.33, 0.66, 1].forEach(f => {
    const y = padTop + f * plotH;
    const line = document.createElementNS("http://www.w3.org/2000/svg","line");
    line.setAttribute("x1", padX); line.setAttribute("x2", w - padX);
    line.setAttribute("y1", y); line.setAttribute("y2", y);
    line.setAttribute("stroke", "#1c3a6e"); line.setAttribute("stroke-width", "1");
    svg.appendChild(line);
  });

  series.forEach(s => {
    const points = s.values.map((v,i) => `${xFor(i)},${yFor(v)}`).join(" ");
    const poly = document.createElementNS("http://www.w3.org/2000/svg","polyline");
    poly.setAttribute("points", points);
    poly.setAttribute("fill", "none");
    poly.setAttribute("stroke", s.color);
    poly.setAttribute("stroke-width", "2.5");
    poly.setAttribute("stroke-linecap", "round");
    poly.setAttribute("stroke-linejoin", "round");
    svg.appendChild(poly);

    s.values.forEach((v,i) => {
      const dot = document.createElementNS("http://www.w3.org/2000/svg","circle");
      dot.setAttribute("cx", xFor(i)); dot.setAttribute("cy", yFor(v)); dot.setAttribute("r", "3.5");
      dot.setAttribute("fill", s.color);
      svg.appendChild(dot);
    });
  });

  months.forEach((m,i) => {
    const anchor = i === 0 ? "start" : (i === months.length - 1 ? "end" : "middle");
    const label = document.createElementNS("http://www.w3.org/2000/svg","text");
    label.setAttribute("x", xFor(i)); label.setAttribute("y", h - 6);
    label.setAttribute("fill", "#9bb0d1"); label.setAttribute("font-size", "11");
    label.setAttribute("text-anchor", anchor);
    label.textContent = m;
    svg.appendChild(label);
  });
}

requestAnimationFrame(renderSalesChart);
window.addEventListener("resize", () => renderSalesChart());
</script>

</body>
</html>