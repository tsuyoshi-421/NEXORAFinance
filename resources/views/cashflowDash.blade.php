<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cash Flow Dashboard</title>
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
      background-color: #0b1b3f;
      font-family: 'Segoe UI', sans-serif;
      color: #fff;
      margin: 0;
      padding: 20px;
    }

    .dashboard {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
    }

    .card {
      background-color: #132a5e;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }

    .card h3 {
      margin-top: 0;
      font-size: 1.1rem;
      color: #9bbcff;
    }

    .amount {
      font-size: 1.8rem;
      font-weight: bold;
      margin: 10px 0;
    }

    .subtitle {
      font-size: 0.9rem;
      color: #b0c4ff;
    }

    .growth {
      color: #3fdc84;
      font-weight: bold;
    }

    .decline {
      color: #ff5c5c;
      font-weight: bold;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    th, td {
      text-align: left;
      padding: 8px;
      border-bottom: 1px solid #1e3b7b;
    }

    th {
      color: #9bbcff;
    }

    .actions {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-top: 10px;
    }

    .actions button {
      flex: 1;
      background-color: #1e3b7b;
      color: #fff;
      border: none;
      padding: 10px;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .actions button:hover {
      background-color: #2e5acb;
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
  <div class="dashboard">
    <div class="card">
      <h3>Cash On Hand</h3>
      <p class="amount">₱16,965</p>
      <p class="subtitle"><span class="growth">▲ 12.89%</span> vs. last month</p>
    </div>

    <div class="card">
      <h3>Cash Inflow</h3>
      <p class="amount">₱341,542</p>
      <p class="subtitle"><span class="growth">▲ 12.89%</span> vs. last month</p>
    </div>

    <div class="card">
      <h3>Cash Outflow</h3>
      <p class="amount">₱341,542</p>
      <p class="subtitle"><span class="decline">▼ 12.89%</span> vs. last month</p>
    </div>

    <div class="card">
      <h3>Net Cash Flow</h3>
      <p class="amount">₱341,542</p>
      <p class="subtitle"><span class="growth">▲ 12.89%</span> vs. last month</p>
    </div>

    <div class="card">
      <h3>Cash Flow Summary</h3>
      <p>Beginning Cash Balance: ₱341,542</p>
      <p>+ Cash Inflow: ₱2,892,277</p>
      <p>- Cash Outflow: ₱2,892,277</p>
      <p>Net Cash Flow: ₱2,892,277</p>
      <p>Ending Cash Balance: ₱341,542</p>
    </div>

    <div class="card">
      <h3>Cash Flow Statement</h3>
      <table>
        <tr><th>Activity Type</th><th>Inflow</th><th>Outflow</th></tr>
        <tr><td>Operating Activities</td><td>₱2,323,231,125</td><td>₱2,323,231,125</td></tr>
        <tr><td>Investing Activities</td><td>₱2,323,231,125</td><td>₱2,323,231,125</td></tr>
        <tr><td>Financing Activities</td><td>₱2,323,231,125</td><td>₱2,323,231,125</td></tr>
        <tr><td><strong>Total</strong></td><td><strong>₱29,388,777</strong></td><td><strong>₱223,231,125</strong></td></tr>
      </table>
    </div>

    <div class="card">
      <h3>Upcoming Cash Outflow</h3>
      <ul>
        <li>Rent Payment: ₱22,188,892 (Due in 2 days)</li>
        <li>Vendor Payment: ₱22,188,892 (Due in 2 days)</li>
        <li>Utilities Payment: ₱22,188,892 (Due in 2 days)</li>
        <li>Loan Repayment: ₱22,188,892 (Due in 2 days)</li>
      </ul>
    </div>

    <div class="card">
      <h3>Cash Position</h3>
      <p>Cash on Hand (start): ₱22,188,892</p>
      <p>Net Cash Flow: ₱22,188,892</p>
      <p>Cash on Hand (end): ₱22,188,892</p>
      <div class="actions">
        <button>View Cash Flow Report</button>
      </div>
    </div>
  </div>
</body>
</html>
