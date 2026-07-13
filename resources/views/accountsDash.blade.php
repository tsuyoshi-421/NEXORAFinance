<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title></title>
  <style>
    .main-wrapper {
    opacity: 0;
    animation: showPage .8s ease forwards;
}
@keyframes showPage {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

    body {
      margin: 0;
      height: 100vh;
      background-color: #0B1E3D; 
    }
  </style>
</head>
<script>
window.onload = () => {
  const splash = document.getElementById("splash");
  const SPLASH_DURATION = 500;

  setTimeout(() => {
    splash.style.opacity = "0";
    splash.style.pointerEvents = "none";
  }, SPLASH_DURATION);
};
</script>
<body>
  <div id="splash"></div>
    <div class="main-wrapper">
  
  <div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = { theme: { extend: { colors: { navy: {900:'#0b1e3b',800:'#132b52',700:'#17325f',600:'#1c3a6e'}, muted:'#9bb0d1' } } } }
</script>
<head>
<meta charset="UTF-8">
<title>Charts of Account</title>
<style>
.main-wrapper { opacity: 0; animation: showPage .8s ease forwards; }
@keyframes showPage { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
.dd-menu { animation: ddIn .12s ease forwards; }
@keyframes ddIn { from { opacity: 0; transform: translateY(-4px); } to { opacity: 1; transform: translateY(0); } }
::-webkit-scrollbar { height: 8px; width: 8px; }
::-webkit-scrollbar-thumb { background: #1c3a6e; border-radius: 4px; }
</style>
</head>
<body class="bg-navy-900 text-white font-sans min-h-screen">

<div class="h-[3px] w-full bg-gradient-to-r from-blue-500/60 via-blue-400/20 to-transparent"></div>

<div class="main-wrapper max-w-[1400px] mx-auto p-6 space-y-4">

 
  <div class="flex flex-wrap items-center justify-between gap-3">
    <div>
      <h1 class="text-2xl font-semibold">Charts of Account</h1>
    </div>
    <div class="flex items-center gap-2">
      <button onclick="toggleMenu('feedbackModal', true)" class="flex items-center gap-2 border border-navy-600 hover:bg-navy-800 transition rounded-lg px-3 py-2 text-sm">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
        Feedback
      </button>
      <button onclick="runReport()" class="border border-navy-600 hover:bg-navy-800 transition rounded-lg px-3 py-2 text-sm">Run report</button>
      <div class="flex rounded-lg overflow-hidden">
        <button onclick="openAccountModal()" class="bg-blue-500 hover:bg-blue-600 transition px-4 py-2 text-sm font-medium">New account</button>
        <button onclick="event.stopPropagation(); toggleMenu('newAccountMenu')" class="dd-toggle bg-blue-500 hover:bg-blue-600 transition px-2 py-2 border-l border-blue-400/40">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
        </button>
      </div>
      <div class="relative">
        <div id="newAccountMenu" class="dd-menu hidden absolute right-0 mt-1 bg-navy-800 border border-navy-600 rounded-lg shadow-lg text-sm w-44 overflow-hidden z-20">
          <button onclick="openAccountModal()" class="w-full text-left px-3 py-2 hover:bg-navy-700">New account</button>
          <button onclick="openAccountModal(null, true)" class="w-full text-left px-3 py-2 hover:bg-navy-700">New category</button>
        </div>
      </div>
    </div>
  </div>

  <div class="text-sm text-muted border-b border-navy-700 pb-2">
    <span class="text-white border-b-2 border-blue-400 pb-2">All lists</span>
  </div>

  <div class="flex flex-wrap items-center justify-between gap-3">
    <div class="flex flex-wrap items-center gap-2">
      <div class="relative">
        <button onclick="event.stopPropagation(); toggleMenu('batchMenu')" class="dd-toggle flex items-center gap-1 bg-navy-800 border border-navy-600 rounded-lg px-3 py-2 text-sm hover:bg-navy-700">
          Batch actions
          <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
        </button>
        <div id="batchMenu" class="dd-menu hidden absolute left-0 mt-1 bg-navy-800 border border-navy-600 rounded-lg shadow-lg text-sm w-48 overflow-hidden z-20">
          <button onclick="batchAction('inactive')" class="w-full text-left px-3 py-2 hover:bg-navy-700">Make inactive</button>
          <button onclick="batchAction('report')" class="w-full text-left px-3 py-2 hover:bg-navy-700">Run report for selected</button>
          <button onclick="batchAction('delete')" class="w-full text-left px-3 py-2 hover:bg-navy-700 text-red-400">Delete</button>
        </div>
      </div>

      <div class="flex items-center gap-2 bg-navy-800 border border-navy-600 rounded-lg px-3 py-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-muted" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/></svg>
        <input id="searchInput" type="text" placeholder="Filter by name or number" oninput="onSearchInput(this.value)"
               class="bg-transparent outline-none text-sm placeholder-muted w-44 sm:w-56">
      </div>

      <select id="typeFilter" onchange="setFilterType(this.value)" class="bg-navy-800 border border-navy-600 text-sm rounded-lg px-3 py-2 outline-none">
        <option value="All">All</option>
      </select>
    </div>

    <div class="flex items-center gap-3">
      <button onclick="toggleCompact()" title="Toggle row density" class="text-blue-400 hover:text-blue-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.1 2.1 0 013 3L12 15l-4 1 1-4z"/></svg>
      </button>
      <button onclick="window.print()" title="Print" class="text-blue-400 hover:text-blue-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9V2h12v7"/><path d="M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2"/><path d="M6 14h12v8H6z"/></svg>
      </button>
      <div class="relative">
        <button onclick="event.stopPropagation(); toggleMenu('settingsMenu')" title="Settings" class="dd-toggle text-blue-400 hover:text-blue-300">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09a1.65 1.65 0 00-1-1.51 1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09a1.65 1.65 0 001.51-1 1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/></svg>
        </button>
        <div id="settingsMenu" class="dd-menu hidden absolute right-0 mt-1 bg-navy-800 border border-navy-600 rounded-lg shadow-lg text-sm w-56 p-3 space-y-3 z-20">
          <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" id="chkBankBalance" checked onchange="state.showBankBalance=this.checked; renderTable();" class="w-4 h-4 accent-blue-500">
            Show Bank Balance column
          </label>
          <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" id="chkIncludeInactive" onchange="state.includeInactive=this.checked; state.page=1; renderTable();" class="w-4 h-4 accent-blue-500">
            Include inactive accounts
          </label>
        </div>
      </div>
    </div>
  </div>

  
  <div class="flex justify-end items-center gap-3 text-sm text-muted">
    <button id="prevBtn" onclick="changePage(-1)" class="hover:text-white disabled:opacity-40 disabled:cursor-not-allowed" disabled>Previous</button>
    <span id="pageInfo" class="text-white">1 - 10</span>
    <button id="nextBtn" onclick="changePage(1)" class="hover:text-white disabled:opacity-40 disabled:cursor-not-allowed">Next</button>
  </div>

  <div class="bg-navy-800 rounded-xl overflow-hidden">
    <div class="overflow-x-auto">
      <table class="w-full text-sm">
        <thead>
          <tr class="text-muted text-left border-b border-navy-600 select-none">
            <th class="py-3 pl-4 pr-2 w-10">
              <input type="checkbox" id="selectAllChk" onchange="toggleSelectAllPage(this.checked)" class="w-4 h-4 accent-blue-500 cursor-pointer">
            </th>
            <th class="py-3 pr-2 cursor-pointer" onclick="setSort('name')">
              <span class="inline-flex items-center gap-1">NAME <span id="sort-name"></span></span>
            </th>
            <th class="py-3 pr-2 cursor-pointer" onclick="setSort('number')">
              <span class="inline-flex items-center gap-1">NUMBER <span id="sort-number"></span></span>
            </th>
            <th class="py-3 pr-2 cursor-pointer" onclick="setSort('type')">
              <span class="inline-flex items-center gap-1">ACCOUNT TYPE <span id="sort-type"></span></span>
            </th>
            <th class="py-3 pr-2 cursor-pointer" onclick="setSort('detail')">
              <span class="inline-flex items-center gap-1">DETAIL TYPE <span id="sort-detail"></span></span>
            </th>
            <th class="py-3 pr-2 cursor-pointer" onclick="setSort('balance')">
              <span class="inline-flex items-center gap-1">BALANCE <span id="sort-balance"></span></span>
            </th>
            <th id="th-bankBalance" class="py-3 pr-2 cursor-pointer" onclick="setSort('bankBalance')">
              <span class="inline-flex items-center gap-1">BANK BALANCE <span id="sort-bankBalance"></span></span>
            </th>
            <th class="py-3 pr-4">ACTION</th>
          </tr>
        </thead>
        <tbody id="tableBody"></tbody>
      </table>
    </div>
    <div id="emptyState" class="hidden text-center text-muted py-10 text-sm">No accounts match your filters.</div>
  </div>

</div>

<div id="accountModalWrap" class="hidden fixed inset-0 bg-black/60 flex items-center justify-center z-50 p-4">
  <div class="bg-navy-800 rounded-xl p-6 w-full max-w-md space-y-4">
    <div class="flex items-center justify-between">
      <h3 id="accountModalTitle" class="text-lg font-semibold">New account</h3>
      <button onclick="closeAccountModal()" class="text-muted hover:text-white">✕</button>
    </div>
    <div class="space-y-3 text-sm">
      <div>
        <label class="text-muted text-xs">Account name *</label>
        <input id="fName" type="text" class="w-full mt-1 bg-navy-700 rounded-lg px-3 py-2 outline-none">
      </div>
      <div>
        <label class="text-muted text-xs">Account number</label>
        <input id="fNumber" type="text" class="w-full mt-1 bg-navy-700 rounded-lg px-3 py-2 outline-none">
      </div>
      <div>
        <label class="text-muted text-xs">Account type *</label>
        <select id="fType" class="w-full mt-1 bg-navy-700 rounded-lg px-3 py-2 outline-none"></select>
      </div>
      <div>
        <label class="text-muted text-xs">Detail type</label>
        <input id="fDetail" type="text" class="w-full mt-1 bg-navy-700 rounded-lg px-3 py-2 outline-none">
      </div>
      <div>
        <label class="text-muted text-xs">Opening balance</label>
        <input id="fBalance" type="number" step="0.01" class="w-full mt-1 bg-navy-700 rounded-lg px-3 py-2 outline-none">
      </div>
    </div>
    <div class="flex justify-end gap-2 pt-2">
      <button onclick="closeAccountModal()" class="border border-navy-600 hover:bg-navy-700 transition rounded-lg px-4 py-2 text-sm">Cancel</button>
      <button onclick="saveAccount()" class="bg-blue-500 hover:bg-blue-600 transition rounded-lg px-4 py-2 text-sm font-medium">Save</button>
    </div>
  </div>
</div>
<div id="feedbackModal" class="hidden fixed inset-0 bg-black/60 flex items-center justify-center z-50 p-4">
  <div class="bg-navy-800 rounded-xl p-6 w-full max-w-md space-y-4">
    <div class="flex items-center justify-between">
      <h3 class="text-lg font-semibold">Send feedback</h3>
      <button onclick="closeFeedbackModal()" class="text-muted hover:text-white">✕</button>
    </div>
    <textarea id="feedbackText" rows="4" placeholder="What's on your mind?" class="w-full bg-navy-700 rounded-lg px-3 py-2 text-sm outline-none"></textarea>
    <div class="flex justify-end gap-2">
      <button onclick="closeFeedbackModal()" class="border border-navy-600 hover:bg-navy-700 transition rounded-lg px-4 py-2 text-sm">Cancel</button>
      <button onclick="submitFeedback()" class="bg-blue-500 hover:bg-blue-600 transition rounded-lg px-4 py-2 text-sm font-medium">Submit</button>
    </div>
  </div>
</div>

<script>
let accounts = [
  { name:"Cash", number:"1000", type:"Bank", detail:"Cash on Hand", balance:0, bankBalance:0, inactive:false },
  { name:"Checking", number:"1010", type:"Bank", detail:"Checking", balance:52340.12, bankBalance:52340.12, inactive:false },
  { name:"Savings", number:"1020", type:"Bank", detail:"Savings", balance:15000, bankBalance:15000, inactive:false },
  { name:"Inventory Asset", number:"1200", type:"Other Current Assets", detail:"Inventory", balance:0, bankBalance:12288.45, inactive:false },
  { name:"Payroll Refunds", number:"1210", type:"Other Current Assets", detail:"Other Current Assets", balance:0, bankBalance:0, inactive:false },
  { name:"Prepaid Expenses", number:"1220", type:"Other Current Assets", detail:"Other Current Assets", balance:0, bankBalance:0, inactive:false },
  { name:"Tax Holding Account", number:"1230", type:"Other Current Assets", detail:"Other Current Assets", balance:0, bankBalance:0, inactive:false },
  { name:"Uncategorized Asset", number:"1240", type:"Other Current Assets", detail:"Other Current Assets", balance:0, bankBalance:0, inactive:false },
  { name:"Undeposited Asset", number:"1250", type:"Other Current Assets", detail:"Undeposited Asset", balance:0, bankBalance:0, inactive:false },
  { name:"Office Equipment", number:"1500", type:"Fixed Assets", detail:"Machinery & Equipment", balance:8500, bankBalance:8500, inactive:false },
  { name:"Accumulated Depreciation", number:"1510", type:"Fixed Assets", detail:"Accumulated Depreciation", balance:-1200, bankBalance:-1200, inactive:false },
  { name:"Corporate AMEX", number:"2000", type:"Credit Card", detail:"Credit Card", balance:0, bankBalance:0, inactive:false },
  { name:"Business Visa", number:"2010", type:"Credit Card", detail:"Credit Card", balance:-450.32, bankBalance:-450.32, inactive:false },
  { name:"Accounts Payable", number:"2100", type:"Accounts Payable", detail:"Accounts Payable", balance:3200, bankBalance:3200, inactive:false },
  { name:"Payroll Liabilities", number:"2200", type:"Other Current Liabilities", detail:"Payroll Liabilities", balance:0, bankBalance:0, inactive:false },
  { name:"Sales Tax Payable", number:"2210", type:"Other Current Liabilities", detail:"Other Current Liabilities", balance:640.5, bankBalance:640.5, inactive:false },
  { name:"Loan Payable", number:"2500", type:"Long Term Liabilities", detail:"Notes Payable", balance:25000, bankBalance:25000, inactive:false },
  { name:"Owner's Equity", number:"3000", type:"Equity", detail:"Owner's Equity", balance:0, bankBalance:0, inactive:false },
  { name:"Retained Earnings", number:"3100", type:"Equity", detail:"Retained Earnings", balance:0, bankBalance:0, inactive:false },
  { name:"Sales Income", number:"4000", type:"Income", detail:"Sales of Product Income", balance:0, bankBalance:0, inactive:false },
  { name:"Service Income", number:"4010", type:"Income", detail:"Service/Fee Income", balance:0, bankBalance:0, inactive:false },
  { name:"Cost of Goods Sold", number:"5000", type:"Cost of Goods Sold", detail:"Supplies & Materials", balance:0, bankBalance:0, inactive:false },
  { name:"Advertising", number:"6000", type:"Expenses", detail:"Advertising/Promotional", balance:0, bankBalance:0, inactive:false },
  { name:"Office Supplies", number:"6010", type:"Expenses", detail:"Office/General Administrative Expenses", balance:0, bankBalance:0, inactive:false },
  { name:"Utilities", number:"6020", type:"Expenses", detail:"Utilities", balance:0, bankBalance:0, inactive:false },
  { name:"Rent Expense", number:"6030", type:"Expenses", detail:"Rent or Lease of Buildings", balance:0, bankBalance:0, inactive:false },
  { name:"Bank Charges", number:"7000", type:"Other Expense", detail:"Other Miscellaneous Expense", balance:0, bankBalance:0, inactive:false },
];

const ACCOUNT_TYPES = ["Bank","Other Current Assets","Fixed Assets","Accounts Payable","Credit Card","Other Current Liabilities","Long Term Liabilities","Equity","Income","Cost of Goods Sold","Expenses","Other Expense"];

let state = {
  search: "", filterType: "All", sortField: "name", sortDir: "asc",
  page: 1, pageSize: 10, selected: new Set(),
  showBankBalance: true, includeInactive: false, compact: false,
};
let editingNumber = null;

function fmtMoney(n){
  const neg = n < 0;
  const v = "₱" + Math.abs(n).toLocaleString(undefined, {minimumFractionDigits:2, maximumFractionDigits:2});
  return neg ? `-${v}` : v;
}

function getFiltered(){
  return accounts.filter(a => {
    if (!state.includeInactive && a.inactive) return false;
    if (state.filterType !== "All" && a.type !== state.filterType) return false;
    const q = state.search.toLowerCase();
    if (q && !(a.name.toLowerCase().includes(q) || a.number.toLowerCase().includes(q))) return false;
    return true;
  });
}

function getSorted(list){
  const dir = state.sortDir === "asc" ? 1 : -1;
  return [...list].sort((a,b) => {
    let va = a[state.sortField], vb = b[state.sortField];
    if (typeof va === "string") va = va.toLowerCase();
    if (typeof vb === "string") vb = vb.toLowerCase();
    if (va < vb) return -1 * dir;
    if (va > vb) return 1 * dir;
    return 0;
  });
}

function currentPageItems(){
  const filtered = getSorted(getFiltered());
  const start = (state.page - 1) * state.pageSize;
  return filtered.slice(start, start + state.pageSize);
}

function toggleMenu(id, isModal){
  if (isModal) { document.getElementById(id).classList.remove("hidden"); return; }
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
function populateTypeFilter(){
  const sel = document.getElementById("typeFilter");
  const current = sel.value || "All";
  sel.innerHTML = `<option value="All">All</option>` + ACCOUNT_TYPES.map(t => `<option value="${t}">${t}</option>`).join("");
  sel.value = current;
}

function populateTypeSelect(){
  document.getElementById("fType").innerHTML = ACCOUNT_TYPES.map(t => `<option value="${t}">${t}</option>`).join("");
}

function sortIndicator(field){
  if (state.sortField !== field) return `<span class="text-muted">⇅</span>`;
  return state.sortDir === "asc" ? `<span class="text-blue-400">↑</span>` : `<span class="text-blue-400">↓</span>`;
}

function renderTable(){
  const filtered = getSorted(getFiltered());
  const total = filtered.length;
  const totalPages = Math.max(1, Math.ceil(total / state.pageSize));
  if (state.page > totalPages) state.page = totalPages;
  const start = (state.page - 1) * state.pageSize;
  const pageItems = filtered.slice(start, start + state.pageSize);

  const tbody = document.getElementById("tableBody");
  tbody.innerHTML = pageItems.map(a => `
    <tr class="border-b border-navy-700/60 hover:bg-navy-700/30 transition ${a.inactive ? 'opacity-50' : ''}">
      <td class="${state.compact ? 'py-1.5' : 'py-3'} pl-4 pr-2">
        <input type="checkbox" onchange="toggleSelect('${a.number}')" ${state.selected.has(a.number) ? 'checked' : ''} class="w-4 h-4 accent-blue-500 cursor-pointer">
      </td>
      <td class="${state.compact ? 'py-1.5' : 'py-3'} pr-2 font-medium">${a.name}${a.inactive ? ' <span class=\"text-muted text-xs\">(inactive)</span>' : ''}</td>
      <td class="${state.compact ? 'py-1.5' : 'py-3'} pr-2 text-muted">${a.number || '—'}</td>
      <td class="${state.compact ? 'py-1.5' : 'py-3'} pr-2">${a.type}</td>
      <td class="${state.compact ? 'py-1.5' : 'py-3'} pr-2 text-muted">${a.detail || '—'}</td>
      <td class="${state.compact ? 'py-1.5' : 'py-3'} pr-2">${fmtMoney(a.balance)}</td>
      <td class="td-bankBalance ${state.compact ? 'py-1.5' : 'py-3'} pr-2 ${state.showBankBalance ? '' : 'hidden'}">${fmtMoney(a.bankBalance)}</td>
      <td class="${state.compact ? 'py-1.5' : 'py-3'} pr-4">
        <div class="relative inline-block">
          <button onclick="event.stopPropagation(); toggleMenu('rowMenu-${a.number}')" class="dd-toggle flex items-center gap-1 text-blue-400 hover:text-blue-300 text-sm">
            ${a.type === "Bank" ? "View register" : "Run report"}
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div id="rowMenu-${a.number}" class="dd-menu hidden absolute right-0 mt-1 bg-navy-800 border border-navy-600 rounded-lg shadow-lg text-sm w-40 overflow-hidden z-20">
            <button onclick="rowRunReport('${a.number}')" class="w-full text-left px-3 py-2 hover:bg-navy-700">Run report</button>
            <button onclick="openAccountModal('${a.number}')" class="w-full text-left px-3 py-2 hover:bg-navy-700">Edit</button>
            <button onclick="rowToggleInactive('${a.number}')" class="w-full text-left px-3 py-2 hover:bg-navy-700">${a.inactive ? 'Make active' : 'Make inactive'}</button>
            <button onclick="rowDelete('${a.number}')" class="w-full text-left px-3 py-2 hover:bg-navy-700 text-red-400">Delete</button>
          </div>
        </div>
      </td>
    </tr>`).join("");

  document.getElementById("emptyState").classList.toggle("hidden", total !== 0);
  document.getElementById("th-bankBalance").classList.toggle("hidden", !state.showBankBalance);
  document.querySelectorAll(".td-bankBalance").forEach(td => td.classList.toggle("hidden", !state.showBankBalance));

  document.getElementById("pageInfo").textContent = total === 0 ? "0 - 0" : `${start + 1} - ${Math.min(start + state.pageSize, total)} of ${total}`;
  document.getElementById("prevBtn").disabled = state.page <= 1;
  document.getElementById("nextBtn").disabled = state.page >= totalPages;

  const pageIds = pageItems.map(a => a.number);
  const allChecked = pageIds.length > 0 && pageIds.every(id => state.selected.has(id));
  document.getElementById("selectAllChk").checked = allChecked;

  ["name","number","type","detail","balance","bankBalance"].forEach(f => {
    const el = document.getElementById("sort-" + f);
    if (el) el.innerHTML = sortIndicator(f);
  });
}

function onSearchInput(v){ state.search = v; state.page = 1; renderTable(); }
function setFilterType(v){ state.filterType = v; state.page = 1; renderTable(); }
function setSort(field){
  if (state.sortField === field) state.sortDir = state.sortDir === "asc" ? "desc" : "asc";
  else { state.sortField = field; state.sortDir = "asc"; }
  renderTable();
}
function changePage(delta){
  const total = getFiltered().length;
  const totalPages = Math.max(1, Math.ceil(total / state.pageSize));
  state.page = Math.min(totalPages, Math.max(1, state.page + delta));
  renderTable();
}
function toggleSelect(id){
  if (state.selected.has(id)) state.selected.delete(id); else state.selected.add(id);
  renderTable();
}
function toggleSelectAllPage(checked){
  currentPageItems().forEach(a => { if (checked) state.selected.add(a.number); else state.selected.delete(a.number); });
  renderTable();
}
function toggleCompact(){ state.compact = !state.compact; renderTable(); }


function rowRunReport(number){
  const a = accounts.find(x => x.number === number);
  if (!a) return;
  exportCSV([a], `report_${a.name.replace(/\s+/g,'_')}`);
  closeAllMenus();
}
function rowToggleInactive(number){
  const a = accounts.find(x => x.number === number);
  if (!a) return;
  a.inactive = !a.inactive;
  closeAllMenus();
  renderTable();
}
function rowDelete(number){
  const a = accounts.find(x => x.number === number);
  if (!a) return;
  if (!confirm(`Delete "${a.name}"? This cannot be undone.`)) { closeAllMenus(); return; }
  accounts = accounts.filter(x => x.number !== number);
  state.selected.delete(number);
  closeAllMenus();
  renderTable();
}
function batchAction(action){
  if (state.selected.size === 0) { alert("Please select at least one account first."); closeAllMenus(); return; }
  if (action === "delete") {
    if (!confirm(`Delete ${state.selected.size} selected account(s)? This cannot be undone.`)) { closeAllMenus(); return; }
    accounts = accounts.filter(a => !state.selected.has(a.number));
    state.selected.clear();
  } else if (action === "inactive") {
    accounts.forEach(a => { if (state.selected.has(a.number)) a.inactive = true; });
    state.selected.clear();
  } else if (action === "report") {
    exportCSV(accounts.filter(a => state.selected.has(a.number)), "selected_accounts");
  }
  closeAllMenus();
  renderTable();
}

function exportCSV(list, filenamePrefix){
  if (list.length === 0) { alert("Nothing to export."); return; }
  const header = ["Name","Number","Account Type","Detail Type","Balance","Bank Balance"];
  const rows = [header.join(",")];
  list.forEach(a => {
    rows.push([`"${a.name}"`, a.number, `"${a.type}"`, `"${a.detail}"`, a.balance, a.bankBalance].join(","));
  });
  const blob = new Blob([rows.join("\n")], { type: "text/csv;charset=utf-8;" });
  const url = URL.createObjectURL(blob);
  const link = document.createElement("a");
  link.href = url;
  link.download = `${filenamePrefix}_${new Date().toISOString().slice(0,10)}.csv`;
  document.body.appendChild(link);
  link.click();
  link.remove();
  URL.revokeObjectURL(url);
}
function runReport(){
  exportCSV(getSorted(getFiltered()), "chart_of_accounts");
}

function openAccountModal(number, isCategory){
  populateTypeSelect();
  editingNumber = number || null;
  const modalTitle = document.getElementById("accountModalTitle");
  if (editingNumber) {
    const a = accounts.find(x => x.number === editingNumber);
    modalTitle.textContent = "Edit account";
    document.getElementById("fName").value = a.name;
    document.getElementById("fNumber").value = a.number;
    document.getElementById("fType").value = a.type;
    document.getElementById("fDetail").value = a.detail;
    document.getElementById("fBalance").value = a.balance;
  } else {
    modalTitle.textContent = isCategory ? "New category" : "New account";
    document.getElementById("fName").value = "";
    document.getElementById("fNumber").value = "";
    document.getElementById("fType").value = ACCOUNT_TYPES[0];
    document.getElementById("fDetail").value = "";
    document.getElementById("fBalance").value = "";
  }
  closeAllMenus();
  document.getElementById("accountModalWrap").classList.remove("hidden");
}
function closeAccountModal(){
  document.getElementById("accountModalWrap").classList.add("hidden");
  editingNumber = null;
}
function saveAccount(){
  const name = document.getElementById("fName").value.trim();
  const number = document.getElementById("fNumber").value.trim();
  const type = document.getElementById("fType").value;
  const detail = document.getElementById("fDetail").value.trim();
  const balance = parseFloat(document.getElementById("fBalance").value) || 0;

  if (!name) { alert("Account name is required."); return; }
  if (number && accounts.some(a => a.number === number && a.number !== editingNumber)) {
    alert("That account number is already in use."); return;
  }

  if (editingNumber) {
    const a = accounts.find(x => x.number === editingNumber);
    a.name = name; a.number = number || a.number; a.type = type; a.detail = detail; a.balance = balance;
  } else {
    accounts.push({ name, number: number || String(Date.now()).slice(-6), type, detail, balance, bankBalance: balance, inactive: false });
  }
  closeAccountModal();
  state.page = 1;
  renderTable();
}

function closeFeedbackModal(){
  document.getElementById("feedbackModal").classList.add("hidden");
  document.getElementById("feedbackText").value = "";
}
function submitFeedback(){
  const text = document.getElementById("feedbackText").value.trim();
  if (!text) { alert("Please enter some feedback first."); return; }
  closeFeedbackModal();
  alert("Thanks for your feedback!");
}

populateTypeFilter();
renderTable();
</script>

</body>
</html>