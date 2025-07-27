<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - BONJA BONTANG</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdn.lineicons.com/5.0/lineicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <header>
        <a href="#main" class="logo">Bonja Bontang</a>
        <div class="navigation">
            <a href="#datadiri"><i class="lni lni-user-4"></i>Data diri</a>
            <a href="#tentang"><i class="bi bi-info-circle"></i>Tentang Kita</a>
            <a href="#contact"><i class="bi bi-telephone"></i>Contact</a>
            <a href="#logout"><i class="bi bi-box-arrow-right"></i>Logout</a>
        </div>
    </header>

    <section class="main" id="main">
        <div class="info">
            <h1>Welcome</h1>
            <p>Pesan Tiket anti RIBET</p>
            <a href="#datadiri" class="btn">Pesan Sekarang</a>
        </div>
        <div class="choose-box">
            <div class="horizontal-line"></div>
            <div class="feature-box">
                <div class="boxfield">
                    <img src="assets/img/bus (4).png" alt="jadwal">
                    <p>Jadwal Lengkap</p>
                    <span>Semua rute dan Jam berangkat selalu update</span>
                </div>
                <div class="boxfield">
                    <img src="assets/img/car-seat.png" alt="kursi">
                    <p>Pilih Kursi Sendiri</p>
                    <span>Bebas pilih tempat duduk sesuai keinginan</span>
                </div>
                <div class="boxfield">
                    <img src="assets/img/credit-card.png" alt="pembayaran">
                    <p>Pembayaran Mudah</p>
                    <span class="span-cd">Transfer bank atau bayar di loket langsung</span>
                </div>
            </div>
        </div>
        <div class="rute-section">
            <div class="rute-label">Rute Populer</div>
            <div class="rute-items">
                <div class="rute-box">
                    <img src="assets/img/bus (4).png" alt="bus">
                    <div class="rute-box-text">
                        <h4>Bontang - Samarinda</h4>
                        <p>Rp.75,000</p>
                    </div>
                </div>
                <div class="rute-box">
                    <img src="assets/img/bus (4).png" alt="bus">
                    <div class="rute-box-text">
                        <h4>Bontang - Sangatta</h4>
                        <p>Diskon 10%</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-way">
            <div class="datadiri" id="datadiri">
                <h2 class="section-title">Data Diri</h2>
            </div>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <form action="{{ route('store.datadiri') }}" method="POST" class="content">
            @csrf
            <!-- input nama, hp, tujuan, tanggal -->
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" placeholder="Isi Nama di sini">
                </div>
                <div class="form-group">
                    <label for="hp">No. HP</label>
                    <input type="tel" id="hp" name="hp" placeholder="(+62) 000 0000 0000">
                </div>
                <div class="form-group">
                    <label for="tujuan">Tujuan</label>
                    <div class="custom-select">
                        <div class="select-display" onclick="toggleDropdown()">
                            <span id="selectedValue">Pilih Tujuan</span>
                            <div class="dropdown-arrow"></div>
                        </div>
                        <div class="dropdown-options" id="dropdownOptions">
                            <div class="dropdown-header">Pilih Tujuan</div>
                            <div class="dropdown-option" onclick="selectOption('Bontang - Samarinda')">Bontang - Samarinda</div>
                            <div class="dropdown-option" onclick="selectOption('Bontang - Balikpapan')">Bontang - Balikpapan</div>
                            <div class="dropdown-option" onclick="selectOption('Bontang - Sangatta')">Bontang - Sangatta</div>
                        </div>
                    </div>
                     <input type="hidden" id="tujuanInput" name="tujuan">
                </div>
                <div class="form-group">
                    <input type="hidden" id="tanggalInput" name="tanggal">

                    <label for="tanggal">Tanggal Berangkat</label>
                    <div class="date-picker">
                        <div class="date-display" onclick="toggleCalendar()">
                            <span id="selectedDate">dd/mm/yyyy</span>
                            <svg class="calendar-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                        </div>
                        <div class="calendar-popup" id="calendarPopup">
                            <div class="calendar-header">
                                <button class="calendar-nav" onclick="previousMonth()">‹</button>
                                <span class="calendar-month" id="currentMonth">Juli 2025</span>
                                <button class="calendar-nav" onclick="nextMonth()">›</button>
                            </div>
                            <div class="calendar-grid" id="calendarGrid">
                                <div class="calendar-day-header">SEN</div>
                                <div class="calendar-day-header">SEL</div>
                                <div class="calendar-day-header">RAB</div>
                                <div class="calendar-day-header">KAM</div>
                                <div class="calendar-day-header">JUM</div>
                                <div class="calendar-day-header">SAB</div>
                                <div class="calendar-day-header">MIN</div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="button-group">
                <button type="submit" class="btn btn-cancel" formaction="{{ route('batal') }}">Batal</button>
                <button type="submit" class="btn btn-submit" id="lanjutBtn">Lanjutkan</button>
            </div>
             </form>
        </div>
       

        <div class="section-way-second">
            <div class="tentang-kita" id="tentang">
                <h2 class="section-title">Tentang Kita</h2>
            </div>
            <div class="for-card">
                <div class="card reveal">
                    <div class="card-img">
                        <img src="assets/img/DEPAN TERMINAL.jpg" alt="">
                    </div>
                </div>
                <div class="card reveal">
                    <div class="card-img">
                        <img src="assets/img/DEPAN TERMINAL.jpg" alt="">
                    </div>
                </div>
                <div class="card reveal">
                    <div class="card-img">
                        <img src="assets/img/DEPAN TERMINAL.jpg" alt="">
                    </div>
                </div>
                <div class="card reveal">
                    <div class="card-img">
                        <img src="assets/img/DEPAN TERMINAL.jpg" alt="">
                    </div>
                </div>
                <div class="card reveal">
                    <div class="card-img">
                        <img src="assets/img/DEPAN TERMINAL.jpg" alt="">
                    </div>
                </div>
                <div class="card reveal">
                    <div class="card-img">
                        <img src="assets/img/DEPAN TERMINAL.jpg" alt="">
                    </div>
                </div>
                <div class="title reveal">
                    <a href="#" class="btn-tentang">See All</a>
                </div>
            </div>
        </div>

        <div class="section-way-contact">
            <div class="contact" id="contact">
                <h2 class="section-title">Contact Me</h2>
            </div>
            <div class="for-contact">
                <div class="row">
                    <div class="card reveal">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info">
                            <h3>Address</h3>
                            <span>Address, City, Country</span>
                        </div>
                    </div>
                    <div class="card reveal">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="info">
                            <h3>Phone</h3>
                            <span>+00 0000 000 000</span>
                        </div>
                    </div><div class="card reveal">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info">
                            <h3>Email Address</h3>
                            <span>contact@gmail.com</span>
                        </div>
                    </div><div class="card reveal">
                        <div class="contact-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div class="info">
                            <h3>Website</h3>
                            <span>mywebsite.com</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="contact-form reveal">
                        <h3>Send Message</h3>
                        <div class="input-box">
                            <input type="text" name="" value="" placeholder="Name">
                        </div>
                        <div class="input-box">
                            <input type="text" name="" value="" placeholder="Email">
                        </div>
                        <div class="input-box">
                            <textarea name="name" rows="8" cols="80" id="" placeholder="Message"></textarea>
                        </div>
                        <div class="input-box">
                            <input type="submit" class="send-btn" value="Send">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <span class="footer-title">Bonja Bontang</span>
            <p>Copyright @2025 <a href="#">Bonjabtg</a>. All Rights Reserved.</p>
        </footer>
    </section>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdownOptions');
            dropdown.classList.toggle('show');
        }
        
        function selectOption(value) {
            document.getElementById('selectedValue').textContent = value;
            document.getElementById('tujuanInput').value = value;
            document.getElementById('dropdownOptions').classList.remove('show');
        }
        
        
        let currentMonthIndex = 6; // Juli (0-based)
        let currentYear = 2025;
        let selectedDay = null;
        let selectedMonth = null;
        let selectedYear = null;
        let today = new Date();
        
        const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        
        // Fungsi untuk mendapatkan jumlah hari dalam bulan
        function getDaysInMonth(month, year) {
            return new Date(year, month + 1, 0).getDate();
        }
        
        // Fungsi untuk mendapatkan hari pertama dalam bulan (0 = Minggu, 1 = Senin, dst)
        function getFirstDayOfMonth(month, year) {
            return new Date(year, month, 1).getDay();
        }
        
        function toggleCalendar() {
            const calendar = document.getElementById('calendarPopup');
            calendar.classList.toggle('show');
            if (calendar.classList.contains('show')) {
                updateCalendar();
            }
        }
        
        function previousMonth() {
            currentMonthIndex--;
            if (currentMonthIndex < 0) {
                currentMonthIndex = 11;
                currentYear--;
            }
            updateCalendar();
        }
        
        function nextMonth() {
            currentMonthIndex++;
            if (currentMonthIndex > 11) {
                currentMonthIndex = 0;
                currentYear++;
            }
            updateCalendar();
        }

        function updateCalendar() {
            document.getElementById('currentMonth').textContent = `${months[currentMonthIndex]} ${currentYear}`;

            const calendarGrid = document.getElementById('calendarGrid');
            // Hapus semua hari kecuali header
            const existingDays = calendarGrid.querySelectorAll('.calendar-day');
            existingDays.forEach(day => day.remove());
            
            const daysInMonth = new Date(currentYear, currentMonthIndex + 1, 0).getDate();
            const firstDay = new Date(currentYear, currentMonthIndex, 1).getDay();
            
            // Konversi Sunday = 0 menjadi Monday = 0
            const adjustedFirstDay = firstDay === 0 ? 6 : firstDay - 1;
            
            // Tambahkan sel kosong untuk hari sebelum tanggal 1
            for (let i = 0; i < adjustedFirstDay; i++) {
                const emptyDay = document.createElement('div');
                emptyDay.className = 'calendar-day empty';
                calendarGrid.appendChild(emptyDay);
            }
            
            // Tambahkan semua hari dalam bulan
            for (let day = 1; day <= daysInMonth; day++) {
                const dayElement = document.createElement('div');
                dayElement.className = 'calendar-day';
                dayElement.textContent = day;
                dayElement.onclick = () => selectDate(day);
                
                // Highlight hari ini
                if (currentYear === today.getFullYear() && 
                    currentMonthIndex === today.getMonth() && 
                    day === today.getDate()) {
                    dayElement.classList.add('today');
                }
                
                // Highlight tanggal yang dipilih
                if (selectedDay === day && 
                    selectedMonth === currentMonthIndex && 
                    selectedYear === currentYear) {
                    dayElement.classList.add('selected');
                }
                
                calendarGrid.appendChild(dayElement);
            }
        }
        
        function selectDate(day) {
            // Simpan tanggal yang dipilih
            selectedDay = day;
            selectedMonth = currentMonthIndex;
            selectedYear = currentYear;
            
            // Update tampilan
            const formattedDate = `${day.toString().padStart(2, '0')}/${(currentMonthIndex + 1).toString().padStart(2, '0')}/${currentYear}`;
            document.getElementById('selectedDate').textContent = formattedDate;
            document.getElementById('tanggalInput').value = formattedDate;
            
            // Update visual selection
            updateCalendar();
            
            // Tutup kalender
            document.getElementById('calendarPopup').classList.remove('show');
        }
        
        document.addEventListener('click', function(event) {
            if (!document.querySelector('.custom-select').contains(event.target)) {
                document.getElementById('dropdownOptions').classList.remove('show');
            }
            if (!document.querySelector('.date-picker').contains(event.target)) {
                document.getElementById('calendarPopup').classList.remove('show');
            }
        });

    

        document.addEventListener('DOMContentLoaded', function() {
            updateCalendar();
        });
        document.getElementById('tanggal').addEventListener('change', function () {
        document.getElementById('tanggalInput').value = this.value;
        });
    </script>
</body>
</html>