<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Cards</title>
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
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 20px;
    }

    .card1 {
      background-color: #132a5e;
      border-radius: 10px;
      padding: 20px;
      height: 246px;
      width: 371.42px;
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
    <div class="card1">
      <h3>Cash Flow</h3>
      <p class="amount">₱18,291</p>
      <p class="subtitle">Current cash balance</p>
    </div>

    <div class="card1">
      <h3>Expenses</h3>
      <p class="amount">₱10,101</p>
      <p class="subtitle">Business spending</p>
    </div>

    <div class="card1">
      <h3>Profit and Loss</h3>
      <p class="amount">₱19,975</p>
      <p class="subtitle">Net income</p>
    </div>

    <div class="card1">
      <h3>Invoices</h3>
      <p>Paid: ₱34,005</p>
      <p>Outstanding: ₱982,120</p>
    </div>

    <div class="card monthly-revenue">
      <h3>Monthly Revenue</h3>
      <p class="amount">₱73K <span class="growth">▲ 3.14%</span></p>
      <p class="subtitle">₱21,473.03 more than last month</p>
    </div>

    <div class="card recent-activity">
      <h3>Recent Activity</h3>
      <p>Table placeholder</p>
    </div>

    <div class="card quick-actions">
      <h3>Quick Actions</h3>
      <div class="actions">
        <button>New Invoice</button>
        <button>Add Expenses</button>
        <button>Add Customer</button>
        <button>View Reports</button>
      </div>
    </div>
  </div>
</body>
</html>
