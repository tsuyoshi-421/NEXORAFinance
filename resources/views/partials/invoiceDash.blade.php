<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Invoice Dashboard</title>
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
      background-color: #0b1e3b;
      color: #fff;
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding: 20px;
    }
    .dashboard {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px;
    }
    .card {
      background-color: #132B52;
      padding: 20px;
      border-radius: 10px;
    }
    .card h3 {
      margin: 0;
      font-size: 1rem;
      color: #9bb0d1;
    }
    .card .amount {
      font-size: 1.5rem;
      margin-top: 10px;
    }
    .invoice-list {
      grid-column: span 3;
      background-color: #142b52;
      border-radius: 10px;
      padding: 20px;
      margin-top: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      color: #fff;
    }
    th, td {
      padding: 10px;
      text-align: left;
    }
    th {
      color: #9bb0d1;
    }
    .status {
      padding: 5px 10px;
      border-radius: 5px;
      width: 71px;
        height: 24px;
      font-weight: bold;
    }
    .paid { background-color: #2ecc71;
    
    }
    .pending { background-color: #f39c12; 
    
    }
    .draft { background-color: #7f8c8d; 
   
    }
    .overdue { background-color: #e74c3c; 
    
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

// Store invoices in memory
  let invoices = [
    { number: "INV-2077", client: "ABC Corporation", amount: "₱900000", status: "Paid" },
    { number: "INV-2078", client: "ABC Corporation", amount: "₱900000", status: "Pending" }
  ];

  // CREATE
  function createInvoice() {
    const num = document.getElementById("invoiceNumber").value.trim();
    const client = document.getElementById("clientName").value.trim();
    const amt = document.getElementById("amount").value.trim();

    if (num && client && amt) {
      invoices.push({ number: num, client: client, amount: amt, status: "Draft" });
      readInvoices();
    }
  }

  // READ
  function readInvoices() {
    const tbody = document.querySelector(".invoice-list tbody");
    tbody.innerHTML = "";
    invoices.forEach(inv => {
      const row = document.createElement("tr");
      row.innerHTML = `
        <td>${inv.number}</td>
        <td>${inv.client}</td>
        <td>-</td>
        <td>-</td>
        <td>${inv.amount}</td>
        <td><span class="status ${inv.status.toLowerCase()}">${inv.status}</span></td>
      `;
      tbody.appendChild(row);
    });
  }

  // UPDATE
  function updateInvoice() {
    const num = prompt("Enter invoice number to update:");
    const invoice = invoices.find(inv => inv.number === num);
    if (invoice) {
      const newClient = prompt("Enter new client name:", invoice.client);
      const newAmount = prompt("Enter new amount:", invoice.amount);
      invoice.client = newClient;
      invoice.amount = newAmount;
      readInvoices();
    }
  }

  // DELETE
  function deleteInvoice() {
    const num = prompt("Enter invoice number to delete:");
    invoices = invoices.filter(inv => inv.number !== num);
    readInvoices();
  }

  // Initialize table with current invoices
  window.onload = () => {
    readInvoices();
  };

</script>   
<body>
    <div id="splash"></div>
    <div class="main-wrapper">
  
  <div>
    
  
</div>

  <div class="dashboard">
    <div class="card">
      <h3>Total Invoices</h3>
      <div class="amount">₱3,782,651</div>
      <small>↑12% vs last month</small>
    </div>
    <div class="card">
      <h3>Paid Invoices</h3>
      <div class="amount">₱3,782,651</div>
      <small>↑12% vs last month</small>
    </div>
    <div class="card">
      <h3>Pending Payment</h3>
      <div class="amount">₱3,782,651</div>
      <small>↑12% vs last month</small>
    </div>
    <div class="card">
      <h3>Overdue Amount</h3>
      <div class="amount">₱3,782,651</div>
      <small>↓12% vs last month</small>
    </div>
  </div>

  <div class="invoice-list">
    <h3>Invoice List</h3>
    <input type="text" id="invoiceNumber" placeholder="Invoice #">
  <input type="text" id="clientName" placeholder="Client">
  <input type="text" id="amount" placeholder="Amount">
  <br><br>
  <button onclick="createInvoice()">Create</button>
  <button onclick="readInvoices()">Read</button>
  <button onclick="updateInvoice()">Update</button>
  <button onclick="deleteInvoice()">Delete</button>
    <table>
      <thead>
        <tr>
          <th>INVOICE #</th>
          <th>CLIENT</th>
          <th>ISSUE DATE</th>
          <th>DUE DATE</th>
          <th>AMOUNT</th>
          <th>STATUS</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>INV-2077</td>
          <td>ABC Corporation</td>
          <td>May 21, 2025</td>
          <td>July 1, 2026</td>
          <td>₱900000</td>
          <td><span class="status paid">Paid</span></td>
        </tr>
        <tr>
          <td>INV-2078</td>
          <td>ABC Corporation</td>
          <td>May 21, 2025</td>
          <td>July 1, 2026</td>
          <td>₱900000</td>
          <td><span class="status pending">Pending</span></td>
        </tr>
      </tbody>
    </table>
    
  </div>
  <div class="card">
</div>
  </div>
</body>
</html>
