<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXORA Dashboard</title>
    <style>
    *{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    background:#091b3b;
    color:white;
}

.container{
    display:flex;
    height:100vh;
}

/* Sidebar */

.sidebar{
    width:250px;
    background:#102650;
    padding:20px;
}

.logo{
    display:flex;
    align-items:center;
    gap:15px;
    margin-bottom:40px;
}

.logo-box{
    width:55px;
    height:55px;
    border:2px solid #4ca6ff;
    display:flex;
    justify-content:center;
    align-items:center;
    border-radius:12px;
    color:#4ca6ff;
    font-size:28px;
}

.logo small{
    color:#7ea4d8;
}

.menu{
    list-style:none;
}

.menu li{
    padding:14px;
    margin:8px 0;
    border-radius:10px;
    cursor:pointer;
}

.menu li:hover{
    background:#18366f;
}

.active{
    background:#4ca6ff;
    color:white;
}

hr{
    margin:20px 0;
    border:1px solid #27477d;
}

/* Main */

.main{
    flex:1;
    padding:20px;
}

.topbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.profile{
    width:45px;
    height:45px;
    border-radius:50%;
    background:#d9d9d9;
}

/* Overview */

.overview{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px;
}

.overview-card{
    background:#17325f;
    border-radius:15px;
    padding:20px;
    min-height:280px;
}

/* Bottom Cards */

.cards{
    margin-top:20px;
    display:grid;
    grid-template-columns:repeat(5,1fr);
    gap:20px;
}

.card{
    background:#17325f;
    border-radius:15px;
    padding:20px;
}

/* Placeholders */

.placeholder{
    background:#2b4f88;
    border-radius:10px;
}

.large{
    width:100%;
    height:210px;
    margin-top:20px;
}

.circle{
    width:120px;
    height:120px;
    border-radius:50%;
    margin:30px auto;
}

.line{
    width:80%;
    height:15px;
    margin:20px auto;
}
    </style>
        
</head>
<body>

<div class="container">

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo">
            <div class="logo-box">N</div>
            <div>
                <h2>NEXORA</h2>
                <small>Enterprise Resource Planning</small>
            </div>
        </div>

        <ul class="menu">
            <li>Dashboard</li>
            <li>Transactions</li>
            <li class="active">Expenses</li>
            <li>Sales</li>
            <li>Cash Flow</li>
            <li>Projects</li>
            <li>Payroll</li>
            <li>Reports</li>
            <li>Taxes</li>

            <hr>

            <li>Apps</li>
            <li>Live Bookkeeping</li>

            <hr>

            <li>Accounts</li>
        </ul>
    </aside>

    <!-- Main -->
    <main class="main">

        <!-- Header -->
        <header class="topbar">
            <div></div>
            <div class="profile"></div>
        </header>

        <!-- Overview -->
        <section class="overview">

            <div class="overview-card">
                <h2>Overview</h2>
                <div class="placeholder large"></div>
            </div>

            <div class="overview-card">
                <div class="placeholder large"></div>
            </div>

        </section>

        <!-- Bottom Cards -->
        <section class="cards">

            <div class="card">
                <h3>Manufacturing</h3>
                <div class="placeholder circle"></div>
                <div class="placeholder line"></div>
            </div>

            <div class="card">
                <h3>Finance</h3>
                <div class="placeholder circle"></div>
                <div class="placeholder line"></div>
            </div>

            <div class="card">
                <h3>Sales</h3>
                <div class="placeholder circle"></div>
                <div class="placeholder line"></div>
            </div>

            <div class="card">
                <h3>Human Resources</h3>
                <div class="placeholder circle"></div>
                <div class="placeholder line"></div>
            </div>

            <div class="card">
                <h3>Marketing</h3>
                <div class="placeholder circle"></div>
                <div class="placeholder line"></div>
            </div>

        </section>

    </main>

</div>

</body>
</html>