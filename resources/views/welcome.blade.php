<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Invoice Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = { theme: { extend: { colors: { navy: {900:'#0b1e3b',800:'#132b52',700:'#17325f',600:'#1c3a6e'}, muted:'#9bb0d1' } } } }
  </script>
  <style>
    .main-wrapper {
      opacity: 0;
      animation: showPage .8s ease forwards;
    }
    @keyframes showPage {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body class="bg-navy-900 text-white font-sans p-5">



<div class="main-wrapper max-w-[1400px] mx-auto space-y-5">
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
    <div class="bg-navy-800 rounded-xl p-5 flex flex-col gap-2">
      <div class="flex items-center justify-between">
        <h3 class="text-muted text-sm font-medium">Total Invoices</h3>
        <div class="w-9 h-9 rounded-lg border border-blue-400/40 flex items-center justify-center text-blue-400">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 3h7l5 5v13H7z"/><path d="M14 3v5h5"/></svg>
        </div>
      </div>
      <div class="text-2xl font-semibold" id="statTotal">₱0</div>
      <small class="text-emerald-400">↑12% vs last month</small>
    </div>

    <div class="bg-navy-800 rounded-xl p-5 flex flex-col gap-2">
      <div class="flex items-center justify-between">
        <h3 class="text-muted text-sm font-medium">Paid Invoices</h3>
        <div class="w-9 h-9 rounded-lg border border-emerald-400/40 flex items-center justify-center text-emerald-400">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/></svg>
        </div>
      </div>
      <div class="text-2xl font-semibold" id="statPaid">₱0</div>
      <small class="text-emerald-400">↑12% vs last month</small>
    </div>

    <div class="bg-navy-800 rounded-xl p-5 flex flex-col gap-2">
      <div class="flex items-center justify-between">
        <h3 class="text-muted text-sm font-medium">Pending Payment</h3>
        <div class="w-9 h-9 rounded-lg border border-amber-400/40 flex items-center justify-center text-amber-400">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/></svg>
        </div>
      </div>
      <div class="text-2xl font-semibold" id="statPending">₱0</div>
      <small class="text-emerald-400">↑12% vs last month</small>
    </div>

    <div class="bg-navy-800 rounded-xl p-5 flex flex-col gap-2">
      <div class="flex items-center justify-between">
        <h3 class="text-muted text-sm font-medium">Overdue Amount</h3>
        <div class="w-9 h-9 rounded-lg border border-red-400/40 flex items-center justify-center text-red-400">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/></svg>
        </div>
      </div>
      <div class="text-2xl font-semibold" id="statOverdue">₱0</div>
      <small class="text-red-400">↑12% vs last month</small>
    </div>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-4 gap-5 items-start">

    <div class="lg:col-span-3 bg-navy-800 rounded-xl p-5">
      <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
        <h3 class="text-lg font-semibold">Invoice List</h3>

        <div class="flex flex-wrap items-center gap-2">
          <div class="flex items-center gap-2 bg-navy-700 rounded-lg px-3 py-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-muted" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/></svg>
            <input id="searchInput" type="text" placeholder="Search Invoices..."
                   class="bg-transparent outline-none text-sm placeholder-muted w-36 sm:w-48"
                   oninput="currentPage = 1; renderInvoices();">
          </div>

          <select id="statusFilter" onchange="currentPage = 1; renderInvoices();"
                  class="bg-navy-700 text-sm rounded-lg px-3 py-2 outline-none">
            <option value="All">All Status</option>
            <option value="Paid">Paid</option>
            <option value="Pending">Pending</option>
            <option value="Overdue">Overdue</option>
            <option value="Draft">Draft</option>
          </select>

          <input id="dateRange" type="text" placeholder="Date Range"
                 class="bg-navy-700 text-sm rounded-lg px-3 py-2 outline-none w-28"
                 onchange="currentPage = 1; renderInvoices();">

          <button onclick="exportCSV()"
                  class="flex items-center gap-1 bg-blue-500 hover:bg-blue-600 transition text-sm rounded-lg px-3 py-2 font-medium">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 3v12"/><path d="M7 10l5 5 5-5"/><path d="M5 21h14"/></svg>
            Export
          </button>

          <button onclick="openInvoiceModal()"
                  class="flex items-center gap-1 bg-emerald-500 hover:bg-emerald-600 transition text-sm rounded-lg px-3 py-2 font-medium">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14"/><path d="M5 12h14"/></svg>
            Create
          </button>

          <div class="relative">
            <button onclick="document.getElementById('moreMenu').classList.toggle('hidden')"
                    class="bg-navy-700 rounded-lg px-3 py-2 text-sm">⋯</button>
            <div id="moreMenu" class="hidden absolute right-0 mt-1 bg-navy-700 rounded-lg shadow-lg text-sm w-40 overflow-hidden z-10">
              <button onclick="printTable()" class="w-full text-left px-3 py-2 hover:bg-navy-600">Print</button>
            </div>
          </div>
        </div>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full text-sm">
          <thead>
            <tr class="text-muted text-left border-b border-navy-600">
              <th class="py-2 pr-2">INVOICE #</th>
              <th class="py-2 pr-2">CLIENT</th>
              <th class="py-2 pr-2">ISSUE DATE</th>
              <th class="py-2 pr-2">DUE DATE</th>
              <th class="py-2 pr-2">AMOUNT</th>
              <th class="py-2 pr-2">STATUS</th>
              <th class="py-2 pr-2">ACTIONS</th>
            </tr>
          </thead>
          <tbody id="invoiceTableBody"></tbody>
        </table>
      </div>

      <div class="flex flex-wrap items-center justify-between mt-4 text-sm text-muted gap-2">
        <span id="pageInfo">Showing 0 of 0 invoices</span>
        <div class="flex items-center gap-2">
          <button onclick="changePage(-1)" class="px-2 py-1 bg-navy-700 rounded-md">‹</button>
          <span id="pageNumbers" class="flex gap-1 select-none touch-pan-y overflow-x-auto max-w-[220px]"></span>
          <button onclick="changePage(1)" class="px-2 py-1 bg-navy-700 rounded-md">›</button>
          <select id="perPage" onchange="currentPage = 1; renderInvoices();" class="bg-navy-700 rounded-md px-2 py-1 ml-2">
            <option value="10">10/page</option>
            <option value="20">20/page</option>
            <option value="50">50/page</option>
          </select>
        </div>
      </div>
    </div>

    <div class="space-y-5">

      <div class="bg-navy-800 rounded-xl p-5">
        <h3 class="text-lg font-semibold mb-4">Payment Summary</h3>
        <div class="flex items-center gap-4">
          <svg id="donutChart" viewBox="0 0 42 42" class="w-28 h-28 -rotate-90"></svg>
          <div class="space-y-2 text-sm" id="summaryLegend"></div>
        </div>
      </div>

      <div class="bg-navy-800 rounded-xl p-5">
        <div class="flex items-center justify-between mb-3">
          <h3 class="text-lg font-semibold">Recent Activity</h3>
          <button class="text-xs bg-navy-700 rounded-md px-2 py-1">View All</button>
        </div>
        <ul id="activityList" class="space-y-3 text-sm"></ul>
      </div>

    </div>
  </div>

  <div class="bg-navy-800 rounded-xl p-5">
    <div class="flex items-center justify-between mb-2">
      <h3 class="text-lg font-semibold">Monthly Invoice Trend</h3>
      <select class="bg-navy-700 text-sm rounded-lg px-3 py-1 outline-none">
        <option>This year</option>
        <option>Last year</option>
      </select>
    </div>
    <div class="flex items-center gap-4 text-xs text-muted mb-2">
      <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-blue-400 inline-block"></span> Invoice Amount</span>
      <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-emerald-400 inline-block"></span> Paid Amount</span>
    </div>
    <svg id="trendChart" viewBox="0 0 700 220" class="w-full h-56"></svg>
  </div>

</div>

<div id="invoiceModalWrap" class="hidden fixed inset-0 bg-black/60 flex items-center justify-center z-50 p-4">
  <div class="bg-navy-800 rounded-xl p-6 w-full max-w-md space-y-4">
    <div class="flex items-center justify-between">
      <h3 class="text-lg font-semibold">New Invoice</h3>
      <button onclick="closeInvoiceModal()" class="text-muted hover:text-white">✕</button>
    </div>
    <div class="space-y-3 text-sm">
      <div>
        <label class="text-muted text-xs">Invoice #</label>
        <input id="invoiceNumber" type="text" placeholder="Invoice #" class="w-full mt-1 bg-navy-700 rounded-lg px-3 py-2 outline-none">
      </div>
      <div>
        <label class="text-muted text-xs">Client</label>
        <input id="clientName" type="text" placeholder="Client" class="w-full mt-1 bg-navy-700 rounded-lg px-3 py-2 outline-none">
      </div>
      <div>
        <label class="text-muted text-xs">Amount</label>
        <input id="amount" type="number" placeholder="Amount" class="w-full mt-1 bg-navy-700 rounded-lg px-3 py-2 outline-none">
      </div>
    </div>
    <div class="flex justify-end gap-2 pt-2">
      <button onclick="closeInvoiceModal()" class="border border-navy-600 hover:bg-navy-700 transition rounded-lg px-4 py-2 text-sm">Cancel</button>
      <button onclick="createInvoice()" class="bg-emerald-500 hover:bg-emerald-600 transition rounded-lg px-4 py-2 text-sm font-medium">+ Create</button>
    </div>
  </div>
</div>

<script>

const clients = [
    "ABC Corporation",
    "Delta Traders",
    "Sunrise Logistics",
    "Metro Builders",
    "Pacific Foods"
];

let invoices = (() => {

  const clients = ["ABC Corporation", "Delta Traders", "Sunrise Logistics", "Metro Builders", "Pacific Foods"];
  const statuses = ["Paid", "Pending", "Overdue", "Draft"];
  const list = [];
  for (let i = 0; i < 24; i++) {
    list.push({
      number: INV-${2077 + i},
      client: clients[i % clients.length],
      issue: "2025-05-21",
      due: "2026-07-01",
      amount: 900000,
      status: statuses[i % statuses.length],
    });
  } 
  return list;
})(); 

console.log("Invoices loaded:", invoices);


let recentActivity = [
  { text: "Invoice #2891 has been paid", sub: "ABC Corporation", time: "2h ago", type: "paid" },
  { text: "Invoice #1234 has been sent", sub: "ABC Corporation", time: "2h ago", type: "sent" },
  { text: "Invoice #1234 is overdue", sub: "ABC Corporation", time: "2h ago", type: "overdue" },
  { text: "New Invoice #1234 created", sub: "ABC Corporation", time: "2h ago", type: "created" },
];

let currentPage = 1;

const statusStyles = {
  Paid:    "bg-emerald-500/90 text-white",
  Pending: "bg-amber-500/90 text-white",
  Overdue: "bg-red-500/90 text-white",
  Draft:   "bg-[#4A9EE8]/90 text-white",
};

function fmtPeso(n){ return "₱" + Number(n).toLocaleString(); }
function fmtDate(iso){
  const d = new Date(iso);
  return d.toLocaleDateString('en-US', { month:'long', day:'numeric', year:'numeric' });
}

function openInvoiceModal() {
  document.getElementById("invoiceNumber").value = "";
  document.getElementById("clientName").value = "";
  document.getElementById("amount").value = "";
  document.getElementById("invoiceModalWrap").classList.remove("hidden");
}
function closeInvoiceModal() {
  document.getElementById("invoiceModalWrap").classList.add("hidden");
}

function createInvoice() {
  const num = document.getElementById("invoiceNumber").value.trim();
  const client = document.getElementById("clientName").value.trim();
  const amt = parseFloat(document.getElementById("amount").value.trim());

  if (!num || !client || !amt) { alert("Please fill in invoice #, client, and amount."); return; }

  invoices.push({
    number: num, client: client,
    issue: new Date().toISOString().slice(0,10),
    due: new Date().toISOString().slice(0,10),
    amount: amt, status: "Draft"
  });

  closeInvoiceModal();
  renderInvoices();
}

function getFilteredInvoices() {
  const q = document.getElementById("searchInput").value.toLowerCase();
  const status = document.getElementById("statusFilter").value;

  return invoices.filter(inv => {
    const matchesQuery = inv.number.toLowerCase().includes(q) || inv.client.toLowerCase().includes(q);
    const matchesStatus = status === "All" || inv.status === status;
    return matchesQuery && matchesStatus;
  });
}
function renderInvoices() {
  const filtered = getFilteredInvoices();
  const perPage = parseInt(document.getElementById("perPage").value);
  const totalPages = Math.max(1, Math.ceil(filtered.length / perPage));
  if (currentPage > totalPages) currentPage = totalPages;

  const start = (currentPage - 1) * perPage;
  const pageItems = filtered.slice(start, start + perPage);

  const tbody = document.getElementById("invoiceTableBody");
  tbody.innerHTML = "";

  pageItems.forEach(inv => {
    const row = document.createElement("tr");
    row.className = "border-b border-navy-700/60 hover:bg-navy-700/40 transition";
    row.innerHTML = `
      <td class="py-2 pr-2 text-blue-400 font-medium">${inv.number}</td>
      <td class="py-2 pr-2">${inv.client}</td>
      <td class="py-2 pr-2 text-muted">${fmtDate(inv.issue)}</td>
      <td class="py-2 pr-2 text-muted">${fmtDate(inv.due)}</td>
      <td class="py-2 pr-2">${fmtPeso(inv.amount)}</td>
      <td class="py-2 pr-2">
        <span class="inline-flex items-center justify-center text-xs font-semibold rounded-md px-2 py-1 w-[70px] ${statusStyles[inv.status]}">${inv.status}</span>
      </td>
      <td class="py-2 pr-2">
        <div class="flex gap-2 text-muted">
          <button title="View" onclick="viewInvoice('${inv.number}')" class="hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/><circle cx="12" cy="12" r="3"/></svg>
          </button>
          <button title="Edit" onclick="updateInvoice('${inv.number}')" class="hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.1 2.1 0 013 3L12 15l-4 1 1-4z"/></svg>
          </button>
          <button title="Delete" onclick="deleteInvoice('${inv.number}')" class="hover:text-red-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"/><path d="M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2"/><path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/></svg>
          </button>
        </div>
      </td>`;
    tbody.appendChild(row);
  }); 

  document.getElementById("pageInfo").textContent =
    Showing ${filtered.length === 0 ? 0 : start+1} to ${Math.min(start+perPage, filtered.length)} of ${filtered.length} invoices;

  renderPageNumbers(totalPages);
  renderStats();
  renderSummary();
  renderActivity();
  renderTrendChart();
}

function renderPageNumbers(totalPages) {
  const wrap = document.getElementById("pageNumbers");
  wrap.innerHTML = "";
  for (let p = 1; p <= totalPages; p++) {
    const btn = document.createElement("button");
    btn.textContent = p;
    btn.className = "px-2 py-1 rounded-md " + (p === currentPage ? "bg-blue-500 text-white" : "bg-navy-700");
    btn.onclick = () => { currentPage = p; renderInvoices(); };
    wrap.appendChild(btn);
  }
}

function changePage(delta) {
  const perPage = parseInt(document.getElementById("perPage").value);
  const totalPages = Math.max(1, Math.ceil(getFilteredInvoices().length / perPage));
  currentPage = Math.min(totalPages, Math.max(1, currentPage + delta));
  renderInvoices();
}
(function enableSwipePagination() {
  let touchStartX = 0;
  const el = document.getElementById("pageNumbers");
  el.addEventListener("touchstart", (e) => {
    touchStartX = e.changedTouches[0].clientX;
  }, { passive: true });
  el.addEventListener("touchend", (e) => {
    const dx = e.changedTouches[0].clientX - touchStartX;
    const SWIPE_THRESHOLD = 40;
    if (dx <= -SWIPE_THRESHOLD) changePage(1);   
    else if (dx >= SWIPE_THRESHOLD) changePage(-1); 
  }, { passive: true });
})();

/* update */
function updateInvoice(num) {
  const invoice = invoices.find(inv => inv.number === num);
  if (!invoice) return;
  const newClient = prompt("Client name:", invoice.client);
  const newAmount = parseFloat(prompt("Amount:", invoice.amount));
  const newStatus = prompt("Status (Paid / Pending / Overdue / Draft):", invoice.status);
  if (newClient) invoice.client = newClient;
  if (!isNaN(newAmount)) invoice.amount = newAmount;
  if (newStatus && statusStyles[newStatus]) invoice.status = newStatus;
  renderInvoices();
}

/* delete */
function deleteInvoice(num) {
  if (!confirm(Delete invoice ${num}?)) return;
  invoices = invoices.filter(inv => inv.number !== num);
  renderInvoices();
}

function viewInvoice(num) {
  const inv = invoices.find(inv => inv.number === num);
  if (!inv) return;
  alert(Invoice ${inv.number}\nClient: ${inv.client}\nAmount: ${fmtPeso(inv.amount)}\nStatus: ${inv.status}\nIssue: ${fmtDate(inv.issue)}\nDue: ${fmtDate(inv.due)});
}

function exportCSV() {
  const rows = getFilteredInvoices();
  if (rows.length === 0) { alert("Nothing to export."); return; }

  const header = ["Invoice #","Client","Issue Date","Due Date","Amount","Status"];
  const csvRows = [header.join(",")];

  rows.forEach(inv => {
    csvRows.push([
      inv.number,
      "${inv.client}",
      fmtDate(inv.issue),
      fmtDate(inv.due),
      inv.amount,
      inv.status
    ].join(","));
  });

  const blob = new Blob([csvRows.join("\n")], { type: "text/csv;charset=utf-8;" });
  const url = URL.createObjectURL(blob);
  const a = document.createElement("a");
  a.href = url;
  a.download = invoices_${new Date().toISOString().slice(0,10)}.csv;
  document.body.appendChild(a);
  a.click();
  a.remove();
  URL.revokeObjectURL(url);
}

function printTable() {
  window.print();
}

function renderStats() {
  const total = invoices.reduce((s,i) => s + i.amount, 0);
  const paid = invoices.filter(i=>i.status==="Paid").reduce((s,i)=>s+i.amount,0);
  const pending = invoices.filter(i=>i.status==="Pending").reduce((s,i)=>s+i.amount,0);
  const overdue = invoices.filter(i=>i.status==="Overdue").reduce((s,i)=>s+i.amount,0);

  document.getElementById("statTotal").textContent = fmtPeso(total);
  document.getElementById("statPaid").textContent = fmtPeso(paid);
  document.getElementById("statPending").textContent = fmtPeso(pending);
  document.getElementById("statOverdue").textContent = fmtPeso(overdue);
}

function renderSummary() {
  const total = invoices.reduce((s,i)=>s+i.amount,0) || 1;
  const paid = invoices.filter(i=>i.status==="Paid").reduce((s,i)=>s+i.amount,0);
  const pending = invoices.filter(i=>i.status==="Pending").reduce((s,i)=>s+i.amount,0);
  const overdue = invoices.filter(i=>i.status==="Overdue").reduce((s,i)=>s+i.amount,0);

  const segments = [
    { label: "Paid", value: paid, color: "#2ecc71" },
    { label: "Pending", value: pending, color: "#f39c12" },
    { label: "Overdue", value: overdue, color: "#e74c3c" },
  ];

  const svg = document.getElementById("donutChart");
  svg.innerHTML = "";
  const r = 15.9155, cx = 21, cy = 21;
  let offset = 0;

  const bg = document.createElementNS("http://www.w3.org/2000/svg","circle");
  bg.setAttribute("cx", cx); bg.setAttribute("cy", cy); bg.setAttribute("r", r);
  bg.setAttribute("fill", "transparent"); bg.setAttribute("stroke", "#1c3a6e"); bg.setAttribute("stroke-width", "5");
  svg.appendChild(bg);

  segments.forEach(seg => {
    const pct = (seg.value / total) * 100;
    const circle = document.createElementNS("http://www.w3.org/2000/svg","circle");
    circle.setAttribute("cx", cx); circle.setAttribute("cy", cy); circle.setAttribute("r", r);
    circle.setAttribute("fill", "transparent");
    circle.setAttribute("stroke", seg.color);
    circle.setAttribute("stroke-width", "5");
    circle.setAttribute("stroke-dasharray", ${pct} ${100-pct});
    circle.setAttribute("stroke-dashoffset", -offset);
    svg.appendChild(circle);
    offset += pct;
  });

  const legend = document.getElementById("summaryLegend");
  legend.innerHTML = segments.map(seg => `
    <div class="flex items-center gap-2">
      <span class="w-2.5 h-2.5 rounded-full inline-block" style="background:${seg.color}"></span>
      <span class="text-muted">${seg.label}</span>
      <span class="ml-auto font-medium">${fmtPeso(seg.value)} (${total ? Math.round(seg.value/total*100) : 0}%)</span>
    </div>`).join("");
}

function renderActivity() {
  const icons = {
    paid: '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>',
    sent: '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 2L11 13"/><path d="M22 2l-7 20-4-9-9-4z"/></svg>',
    overdue: '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/></svg>',
    created: '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14"/><path d="M5 12h14"/></svg>',
  };
  const colors = { paid: "bg-emerald-500", sent: "bg-blue-500", overdue: "bg-amber-500", created: "bg-orange-500" };

  document.getElementById("activityList").innerHTML = recentActivity.map(a => `
    <li class="flex items-start gap-3">
      <span class="w-7 h-7 rounded-full ${colors[a.type]} flex items-center justify-center shrink-0">${icons[a.type]}</span>
      <div class="flex-1">
        <p>${a.text}</p>
        <p class="text-muted text-xs">${a.sub}</p>
      </div>
      <span class="text-muted text-xs whitespace-nowrap">${a.time}</span>
    </li>`).join("");
}

function renderTrendChart() {
  const months = ["Jan","Feb","Mar","Apr","May","June","July","Aug","Sep","Oct","Nov","Dec"];
  const invoiceAmt = [20,35,55,60,75,68,90,70,60,50,55,60];
  const paidAmt    = [15,30,45,50,60,55,80,60,50,40,45,50];

  const svg = document.getElementById("trendChart");
  svg.innerHTML = "";
  const w = 700, h = 220, padX = 30, padY = 20;
  const maxVal = Math.max(...invoiceAmt, ...paidAmt) * 1.1;

  const toPoints = (arr) => arr.map((v,i) => {
    const x = padX + (i * (w - padX*2) / (arr.length - 1));
    const y = h - padY - (v / maxVal) * (h - padY*2);
    return ${x},${y};
  }).join(" ");
  months.forEach((m,i) => {
    const x = padX + (i * (w - padX*2) / (months.length - 1));
    const label = document.createElementNS("http://www.w3.org/2000/svg","text");
    label.setAttribute("x", x); label.setAttribute("y", h - 2);
    label.setAttribute("fill", "#9bb0d1"); label.setAttribute("font-size", "10"); label.setAttribute("text-anchor","middle");
    label.textContent = m;
    svg.appendChild(label);
  });

  const makeLine = (points, color) => {
    const poly = document.createElementNS("http://www.w3.org/2000/svg","polyline");
    poly.setAttribute("points", points);
    poly.setAttribute("fill", "none");
    poly.setAttribute("stroke", color);
    poly.setAttribute("stroke-width", "2.5");
    poly.setAttribute("stroke-linecap", "round");
    poly.setAttribute("stroke-linejoin", "round");
    svg.appendChild(poly);

    points.split(" ").forEach(pt => {
      const [x,y] = pt.split(",");
      const dot = document.createElementNS("http://www.w3.org/2000/svg","circle");
      dot.setAttribute("cx", x); dot.setAttribute("cy", y); dot.setAttribute("r", "3");
      dot.setAttribute("fill", color);
      svg.appendChild(dot);
    });
  };

  makeLine(toPoints(invoiceAmt), "#4ca6ff");
  makeLine(toPoints(paidAmt), "#2ecc71");
}

document.addEventListener("DOMContentLoaded", renderInvoices);
</script>

</body>
</html>