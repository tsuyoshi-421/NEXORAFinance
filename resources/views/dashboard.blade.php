<!DOCTYPE html>
<html lang="en">
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = { theme: { extend: { colors: { navy: {900:'#0b1e3b',800:'#132b52',700:'#17325f',600:'#1c3a6e'}, muted:'#9bb0d1' } } } }
</script>
<head>
<meta charset="UTF-8">
<title></title>
<style>
.main-wrapper { opacity: 0; animation: showPage .8s ease forwards; }
@keyframes showPage { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
.dd-menu { animation: ddIn .12s ease forwards; }
@keyframes ddIn { from { opacity: 0; transform: translateY(-4px); } to { opacity: 1; transform: translateY(0); } }
</style>
</head>
<body class="bg-navy-900 text-white font-sans min-h-screen">

<div class="main-wrapper max-w-[1400px] mx-auto p-6 space-y-5">
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

    {{-- Cash Flow --}}
    <div class="bg-navy-800 rounded-xl p-5 flex flex-col">
      <div class="flex items-center justify-between">
        <h3 class="text-sm font-semibold tracking-wide">CASH FLOW</h3>
        <div class="relative">
          <button onclick="event.stopPropagation(); toggleMenu('dd-cashflow')" class="dd-toggle flex items-center gap-1 text-muted text-xs hover:text-white">
            This month
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div id="dd-cashflow" class="dd-menu hidden absolute right-0 mt-1 bg-navy-700 border border-navy-600 rounded-lg shadow-lg text-xs w-32 overflow-hidden z-20">
            <button onclick="closeAllMenus()" class="w-full text-left px-3 py-2 hover:bg-navy-600">Today</button>
            <button onclick="closeAllMenus()" class="w-full text-left px-3 py-2 hover:bg-navy-600">This week</button>
            <button onclick="closeAllMenus()" class="w-full text-left px-3 py-2 hover:bg-navy-600">This month</button>
            <button onclick="closeAllMenus()" class="w-full text-left px-3 py-2 hover:bg-navy-600">This year</button>
          </div>
        </div>
      </div>
      <div class="text-2xl font-bold mt-2">₱18,291</div>
      <p class="text-muted text-xs mb-2">Current cash balance</p>
      <div class="flex gap-2 flex-1">
        <div class="flex flex-col justify-between text-[10px] text-muted py-1">
          <span>₱30k</span><span>₱15k</span><span>₱10k</span><span>₱5k</span><span>₱0</span>
        </div>
        <div class="flex-1">
          <svg id="cashFlowChart" viewBox="0 0 260 130" class="w-full h-28"></svg>
        </div>
      </div>
    </div>
    <div class="bg-navy-800 rounded-xl p-5 flex flex-col">
      <div class="flex items-center justify-between">
        <h3 class="text-sm font-semibold tracking-wide">EXPENSES</h3>
        <div class="relative">
          <button onclick="event.stopPropagation(); toggleMenu('dd-expenses')" class="dd-toggle flex items-center gap-1 text-muted text-xs hover:text-white">
            Last month
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div id="dd-expenses" class="dd-menu hidden absolute right-0 mt-1 bg-navy-700 border border-navy-600 rounded-lg shadow-lg text-xs w-32 overflow-hidden z-20">
            <button onclick="closeAllMenus()" class="w-full text-left px-3 py-2 hover:bg-navy-600">This month</button>
            <button onclick="closeAllMenus()" class="w-full text-left px-3 py-2 hover:bg-navy-600">Last month</button>
            <button onclick="closeAllMenus()" class="w-full text-left px-3 py-2 hover:bg-navy-600">This year</button>
          </div>
        </div>
      </div>
      <div class="text-2xl font-bold mt-2">₱10,101</div>
      <p class="text-muted text-xs mb-3">Business spending</p>
      <div class="flex items-center gap-4 flex-1">
        <svg viewBox="0 0 42 42" class="w-20 h-20 -rotate-90 shrink-0">
          <circle cx="21" cy="21" r="15.9155" fill="transparent" stroke="#1c3a6e" stroke-width="6"/>
          <circle cx="21" cy="21" r="15.9155" fill="transparent" stroke="#4ca6ff" stroke-width="6" stroke-dasharray="21 79" stroke-dashoffset="0"/>
          <circle cx="21" cy="21" r="15.9155" fill="transparent" stroke="#2ecc71" stroke-width="6" stroke-dasharray="35 65" stroke-dashoffset="-21"/>
          <circle cx="21" cy="21" r="15.9155" fill="transparent" stroke="#f2795c" stroke-width="6" stroke-dasharray="15 85" stroke-dashoffset="-56"/>
          <circle cx="21" cy="21" r="15.9155" fill="transparent" stroke="#8b5cf6" stroke-width="6" stroke-dasharray="29 71" stroke-dashoffset="-71"/>
        </svg>
        <div class="space-y-1.5 text-xs">
          <div class="flex items-center gap-2"><span class="w-2 h-2 rounded-full inline-block" style="background:#4ca6ff"></span><span class="font-medium">₱2,102</span><span class="text-muted">Rent & Dues</span></div>
          <div class="flex items-center gap-2"><span class="w-2 h-2 rounded-full inline-block" style="background:#2ecc71"></span><span class="font-medium">₱21,212</span><span class="text-muted">Supplies</span></div>
          <div class="flex items-center gap-2"><span class="w-2 h-2 rounded-full inline-block" style="background:#f2795c"></span><span class="font-medium">₱1,492</span><span class="text-muted">Utilities</span></div>
          <div class="flex items-center gap-2"><span class="w-2 h-2 rounded-full inline-block" style="background:#8b5cf6"></span><span class="font-medium">₱7,309</span><span class="text-muted">Others</span></div>
        </div>
      </div>
    </div>
    <div class="bg-navy-800 rounded-xl p-5 flex flex-col">
      <h3 class="text-sm font-semibold tracking-wide">PROFIT AND LOSS</h3>
      <div class="text-2xl font-bold mt-2">₱19,975</div>
      <p class="text-muted text-xs mb-4">Net income</p>
      <div class="space-y-4 flex-1">
        <div>
          <div class="flex items-center justify-between text-xs mb-1">
            <span>Income <span class="text-muted">₱19,975</span></span>
            <span class="text-muted">51%</span>
          </div>
          <div class="h-1.5 bg-navy-700 rounded-full overflow-hidden">
            <div class="h-full bg-blue-400 rounded-full" style="width:51%"></div>
          </div>
        </div>
        <div>
          <div class="flex items-center justify-between text-xs mb-1">
            <span>Expenses <span class="text-muted">₱561,897</span></span>
            <span class="text-muted">84%</span>
          </div>
          <div class="h-1.5 bg-navy-700 rounded-full overflow-hidden">
            <div class="h-full bg-blue-400 rounded-full" style="width:84%"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-navy-800 rounded-xl p-5 flex flex-col">
      <div class="flex items-center justify-between">
        <h3 class="text-sm font-semibold tracking-wide">INVOICES</h3>
        <span class="text-muted text-xs">₱12,178 unpaid</span>
      </div>
      <div class="mt-3">
        <div class="text-2xl font-bold">₱34,005</div>
        <p class="text-red-400 text-xs mb-1">Overdue</p>
        <div class="h-1 bg-navy-700 rounded-full overflow-hidden">
          <div class="h-full bg-red-500 rounded-full" style="width:55%"></div>
        </div>
      </div>
      <div class="mt-5">
        <p class="text-muted text-xs">₱32,122 paid</p>
        <div class="text-2xl font-bold">₱982,120</div>
        <p class="text-blue-400 text-xs mb-1">Deposited</p>
        <div class="h-1 bg-navy-700 rounded-full overflow-hidden">
          <div class="h-full bg-blue-500 rounded-full" style="width:88%"></div>
        </div>
      </div>
    </div>

  </div>
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

    <div class="bg-navy-800 rounded-xl p-5">
      <div class="flex items-center justify-between">
        <h3 class="text-lg font-semibold">Monthly Revenue</h3>
        <div class="relative">
          <button onclick="event.stopPropagation(); toggleMenu('dd-revenue')" class="dd-toggle flex items-center gap-1 text-muted text-xs hover:text-white">
            This week
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div id="dd-revenue" class="dd-menu hidden absolute right-0 mt-1 bg-navy-700 border border-navy-600 rounded-lg shadow-lg text-xs w-32 overflow-hidden z-20">
            <button onclick="closeAllMenus()" class="w-full text-left px-3 py-2 hover:bg-navy-600">Today</button>
            <button onclick="closeAllMenus()" class="w-full text-left px-3 py-2 hover:bg-navy-600">This week</button>
            <button onclick="closeAllMenus()" class="w-full text-left px-3 py-2 hover:bg-navy-600">This month</button>
            <button onclick="closeAllMenus()" class="w-full text-left px-3 py-2 hover:bg-navy-600">This year</button>
          </div>
        </div>
      </div>

      <div class="flex items-center gap-2 mt-2">
        <span class="text-3xl font-bold">₱73K</span>
        <span class="text-xs font-semibold rounded-full px-2 py-0.5 bg-emerald-500/20 text-emerald-400">↑ 34%</span>
      </div>
      <p class="text-muted text-xs mb-3">₱21,478.03 more than last month</p>

      <div class="flex gap-2">
        <div class="flex flex-col justify-between text-[10px] text-muted py-1">
          <span>₱29K</span><span>₱19K</span><span>₱7K</span><span>₱0</span>
        </div>
        <div class="flex-1">
          <svg id="revenueChart" viewBox="0 0 500 180" class="w-full h-44"></svg>
        </div>
      </div>
    </div>

    <div class="bg-navy-800 rounded-xl p-5"></div>
    <div class="bg-navy-800 rounded-xl p-5"></div>

  </div>

  <div class="bg-navy-800 rounded-xl p-5">
    <h3 class="text-lg font-semibold mb-4">Recent Activity</h3>
    <div class="overflow-x-auto">
      <table class="w-full text-sm">
        <thead>
          <tr class="text-muted text-left border-b border-navy-600">
            <th class="py-2 pr-4">Date</th>
            <th class="py-2 pr-4">Description</th>
            <th class="py-2 pr-4">Category</th>
            <th class="py-2 pr-4">Amount</th>
            <th class="py-2 pr-4">Status</th>
          </tr>
        </thead>
        <tbody id="activityBody"></tbody>
      </table>
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

function renderCashFlowChart(){
  const svg = document.getElementById("cashFlowChart");
  const rect = svg.getBoundingClientRect();
  const w = Math.round(Math.max(rect.width, 200));
  const h = Math.round(Math.max(rect.height, 90));
  svg.setAttribute("viewBox", `0 0 ${w} ${h}`);
  svg.innerHTML = "";

  const dates = ["May 4","May 7","May 11","May 20","May 25"];
  const seriesA = [10, 30, 17, 7, 12];
  const seriesB = [15, 10, 10, 22, 16];

  const padX = 6, padTop = 6, padBottom = 20;
  const maxVal = 30;
  const plotH = h - padTop - padBottom;
  const groupW = (w - padX * 2) / dates.length;
  const barW = groupW * 0.28;

  const yFor = (v) => padTop + (1 - v / maxVal) * plotH;

  dates.forEach((d, i) => {
    const groupX = padX + i * groupW + groupW / 2;

    const barA = document.createElementNS("http://www.w3.org/2000/svg","rect");
    barA.setAttribute("x", groupX - barW - 2);
    barA.setAttribute("y", yFor(seriesA[i]));
    barA.setAttribute("width", barW);
    barA.setAttribute("height", h - padBottom - yFor(seriesA[i]));
    barA.setAttribute("rx", "2");
    barA.setAttribute("fill", "#4ca6ff");
    svg.appendChild(barA);

    const barB = document.createElementNS("http://www.w3.org/2000/svg","rect");
    barB.setAttribute("x", groupX + 2);
    barB.setAttribute("y", yFor(seriesB[i]));
    barB.setAttribute("width", barW);
    barB.setAttribute("height", h - padBottom - yFor(seriesB[i]));
    barB.setAttribute("rx", "2");
    barB.setAttribute("fill", "#7ec8ff");
    svg.appendChild(barB);

    const label = document.createElementNS("http://www.w3.org/2000/svg","text");
    label.setAttribute("x", groupX); label.setAttribute("y", h - 4);
    label.setAttribute("fill", "#9bb0d1"); label.setAttribute("font-size", "10");
    label.setAttribute("text-anchor", "middle");
    label.textContent = d;
    svg.appendChild(label);
  });
}

function renderRevenueChart(){
  const svg = document.getElementById("revenueChart");
  const rect = svg.getBoundingClientRect();
  const w = Math.round(Math.max(rect.width, 200));
  const h = Math.round(Math.max(rect.height, 120));
  svg.setAttribute("viewBox", `0 0 ${w} ${h}`);
  svg.innerHTML = "";

  const months = ["January","February","March","April","May","June","July"];
  const values = [12000, 15500, 15800, 13200, 29000, 21000, 15000];
  const padX = 4, padTop = 10, padBottom = 22;
  const maxVal = Math.max(...values) * 1.1;

  const xFor = (i) => padX + (i * (w - padX * 2) / (values.length - 1));
  const yFor = (v) => padTop + (1 - v / maxVal) * (h - padTop - padBottom);

  const base = document.createElementNS("http://www.w3.org/2000/svg","line");
  base.setAttribute("x1", padX); base.setAttribute("x2", w - padX);
  base.setAttribute("y1", h - padBottom); base.setAttribute("y2", h - padBottom);
  base.setAttribute("stroke", "#1c3a6e"); base.setAttribute("stroke-width", "1");
  svg.appendChild(base);

  const points = values.map((v,i) => `${xFor(i)},${yFor(v)}`).join(" ");
  const poly = document.createElementNS("http://www.w3.org/2000/svg","polyline");
  poly.setAttribute("points", points);
  poly.setAttribute("fill", "none");
  poly.setAttribute("stroke", "#4ca6ff");
  poly.setAttribute("stroke-width", "2.5");
  poly.setAttribute("stroke-linecap", "round");
  poly.setAttribute("stroke-linejoin", "round");
  svg.appendChild(poly);

  values.forEach((v,i) => {
    const dot = document.createElementNS("http://www.w3.org/2000/svg","circle");
    dot.setAttribute("cx", xFor(i)); dot.setAttribute("cy", yFor(v)); dot.setAttribute("r", "3.5");
    dot.setAttribute("fill", "#4ca6ff");
    svg.appendChild(dot);
  });

  months.forEach((m,i) => {
    const anchor = i === 0 ? "start" : (i === months.length - 1 ? "end" : "middle");
    const label = document.createElementNS("http://www.w3.org/2000/svg","text");
    label.setAttribute("x", xFor(i)); label.setAttribute("y", h - 6);
    label.setAttribute("fill", "#9bb0d1"); label.setAttribute("font-size", "10");
    label.setAttribute("text-anchor", anchor);
    label.textContent = m;
    svg.appendChild(label);
  });
}

const activity = [
  { date:"May 24, 2026", desc:"Invoice #F0112", category:"Sales", amount:212121, status:"Success" },
  { date:"May 18, 2026", desc:"Invoice #F0112", category:"Expenses", amount:89761, status:"Pending" },
  { date:"May 9, 2026", desc:"Office Supplies", category:"Sales", amount:1121, status:"Success" },
  { date:"May 4, 2026", desc:"Invoice #F0112", category:"Sales", amount:22111, status:"Success" },
];
const statusStyles = {
  Success: "bg-emerald-500/90 text-white",
  Pending: "bg-amber-500/90 text-white",
};
function fmtPeso(n){ return "₱" + Number(n).toLocaleString(); }
function renderActivity(){
  document.getElementById("activityBody").innerHTML = activity.map(a => `
    <tr class="border-b border-navy-700/60">
      <td class="py-2 pr-4 text-muted">${a.date}</td>
      <td class="py-2 pr-4">${a.desc}</td>
      <td class="py-2 pr-4 text-muted">${a.category}</td>
      <td class="py-2 pr-4">${fmtPeso(a.amount)}</td>
      <td class="py-2 pr-4"><span class="inline-flex items-center justify-center text-xs font-semibold rounded-md px-2 py-1 ${statusStyles[a.status]}">${a.status}</span></td>
    </tr>`).join("");
}

requestAnimationFrame(() => { renderCashFlowChart(); renderRevenueChart(); });
renderActivity();
window.addEventListener("resize", () => { renderCashFlowChart(); renderRevenueChart(); });
</script>

</body>
</html>