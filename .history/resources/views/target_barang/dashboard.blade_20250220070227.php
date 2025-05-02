<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Keuangan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/dashboard_target_barang.css')}}">
</head>

<style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body {
  display: flex;
  min-height: 100vh;
  background-color: #f8f9fa;
}

a {
  text-decoration: none;
}

.sidebar {
  width: 84px;
  background: white;
  padding: 5.5rem 0;
  display: flex;
  flex-direction: column;
  gap: 2rem;
  position: fixed;
  height: 100vh;
  border-right: 1px solid #eee;
}

.sidebar-icon a:hover {
  color: #a6a6a6;
}

.sidebar-icon {
  width: 100%;
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #888;
  cursor: pointer;
  position: relative;
}

.sidebar-icon a {
  font-size: 1.3rem;
  color: #1d1d1d;
}

#active {
  color: #a6a6a6;
}

.sidebar .profile {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  margin-bottom: 4rem;
  margin-top: -2rem;
}

.sidebar div:hover {
  color: #00000085;
}

.main-content {
  flex: 1;
  padding: 1rem;
  margin-left: 84px;
}

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 1rem;
}

.header #date {
  padding: 0.5rem 1rem;
  border: 1px solid #ddd;
  border-radius: 8px;
  background: white;
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.sub-title{
  font-size: 2rem;
}

h1 {
font-size: 28px;
margin-bottom: 30px;
color: #333;
}

.target-card {
background-color: #fff;
border-radius: 10px;
padding: 20px;
margin-bottom: 15px;
position: relative;
overflow: hidden;
}

.target-card.gpu {
background-color: #e8f5e9;
}

.target-card.phone {
background-color: #e3f2fd;
}

.target-card.shoes {
background-color: #fce4ec;
}

.item-name {
font-size: 18px;
font-weight: bold;
margin-bottom: 10px;
color: #333;
}

.price-info {
font-size: 16px;
color: #666;
margin-bottom: 15px;
}

.persen {
position: absolute;
top: 20px;
right: 20px;
font-weight: bold;
padding: 5px 10px;
border-radius: 15px;
font-size: 14px;
}

.gpu .persen {
background-color: #c8e6c9;
color: #2e7d32;
}

.phone .persen {
background-color: #bbdefb;
color: #1976d2;
}

.shoes .persen {
background-color: #f8bbd0;
color: #c2185b;
}

#first-btn {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 60px;
  height: 60px;
  background-color: #1877f2;
  color: white;
  font-size: 24px;
  font-weight: bold;
  border: none;
  border-radius: 50%;
  position: fixed;
  bottom: 20px;
  right: 20px;
  cursor: pointer;
  transition: background 0.3s;
}

#first-btn:hover {
  background-color: #0d5bc0;
  box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.493);

}

</style>

<body>
    <nav class="sidebar">
        <div class="sidebar-icon">
            <a href="">
                <img src="{{asset('assets/img/avatar.png')}}" alt="" class="profile">
            </a>
        </div>
        <div class="sidebar-icon">
            <i>
                <a class="bi bi-cash-stack" href="{{route('dashboard')}}"></a>
            </i>
        </div>
        <div class="sidebar-icon">
            <i>
                <a class="bi bi-wallet2" href="{{route('manejemen.anggaran')}}"></a>
            </i>
        </div>
        <div class="sidebar-icon">
            <i>
                <a class="bi bi-bar-chart-line" href="{{route('rekap.realTime')}}"></a>
            </i>
        </div>
        <div class="sidebar-icon">
            <i>
                <a class="bi bi-journal" id="active" href="{{route('target.barang.page')}}"></a>
            </i>
        </div>

    <main class="main-content">
        <div class="header">
            <div class="sub-title">Target Keuangan</div>
            <div></div>
        </div>
        <div class="container">
            <a href="/Dashboard/4Target/Target/index.html">
                <div class="target-card gpu">
                    <div class="item-name">GPU RTX</div>
                    <div class="price-info">Rp. 17.000.000/Rp. 25.000.000</div>
                    <div class="persen">47%</div>
                </div>
            </a>

            <a href="#">
                <div class="target-card phone">
                    <div class="item-name">Samsung S24</div>
                    <div class="price-info">Rp. 18.500.000/Rp. 20.000.000</div>
                    <div class="persen">81%</div>
                </div>
            </a>

            <a href="#">
                <div class="target-card shoes">
                    <div class="item-name">Sepatu Loubotin</div>
                    <div class="price-info">Rp. 3.500.000/Rp. 6.720.000</div>
                    <div class="persen">92%</div>
                </div>
            </a>
        </div>




            <a href="/Dashboard/4Target/tambahTarget/index.html" class="bi bi-plus-lg" id="first-btn"></a>



    </main>
    <script src="{{asset('assets/js/dashboard_target_barang.js')}}"></script>
</body>
</html>
