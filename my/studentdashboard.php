<?php
// Moodle Student Dashboard - SWAYAM Plus Style
// This would integrate with Moodle's database and user system

// Language detection and translation
$current_language = isset($_GET['lang']) ? $_GET['lang'] : 'english';

// Translation arrays
$translations = [
    'english' => [
        'site_name' => 'DigivisCom',
        'search_placeholder' => 'Search for Courses...',
        'dashboard' => 'Dashboard',
        'courses' => 'Courses',
        'messages' => 'Messages',
        'schedule' => 'Schedule',
        'settings' => 'Settings',
        'help' => 'Help',
        'progress' => 'Progress',
        'of_course_completed' => 'of course completed',
        'learning_plots_earned' => 'Learning Plots Earned',
        'vs_last_week' => 'vs last week',
        'total_hours_spent' => 'Total Hours Spent<br>on Platform',
        'courses_in_progress' => 'Courses<br>In Progress',
        'certificates_earned' => 'Certificates Earned',
        'courses_completed' => 'Courses Completed',
        'courses_in_progress_title' => 'Courses in Progress',
        'see_all' => 'See all',
        'completed' => 'Completed',
        'from_date' => 'From Jun-Jun 25, 2025'
    ],
    'tamil' => [
        'site_name' => 'டிஜிவிஸ்காம்',
        'search_placeholder' => 'பாடங்களை தேடுங்கள்...',
        'dashboard' => 'டாஷ்போர்டு',
        'courses' => 'பாடங்கள்',
        'messages' => 'செய்திகள்',
        'schedule' => 'அட்டவணை',
        'settings' => 'அமைப்புகள்',
        'help' => 'உதவி',
        'progress' => 'முன்னேற்றம்',
        'of_course_completed' => 'பாடம் முடிந்தது',
        'learning_plots_earned' => 'கற்றல் புள்ளிகள் பெற்றது',
        'vs_last_week' => 'கடந்த வாரத்துடன் ஒப்பிடுகையில்',
        'total_hours_spent' => 'மொத்த மணிநேரம் செலவிட்டது<br>இந்த தளத்தில்',
        'courses_in_progress' => 'தொடர்ந்து கொண்டிருக்கும்<br>பாடங்கள்',
        'certificates_earned' => 'சான்றிதழ்கள் பெற்றது',
        'courses_completed' => 'பாடங்கள் முடிந்தது',
        'courses_in_progress_title' => 'தொடர்ந்து கொண்டிருக்கும் பாடங்கள்',
        'see_all' => 'அனைத்தும் பார்க்க',
        'completed' => 'முடிந்தது',
        'from_date' => 'ஜூன் முதல் ஜூன் 25, 2025 வரை'
    ],
    'hindi' => [
        'site_name' => 'डिजिविसकॉम',
        'search_placeholder' => 'पाठ्यक्रम खोजें...',
        'dashboard' => 'डैशबोर्ड',
        'courses' => 'पाठ्यक्रम',
        'messages' => 'संदेश',
        'schedule' => 'अनुसूची',
        'settings' => 'सेटिंग्स',
        'help' => 'सहायता',
        'progress' => 'प्रगति',
        'of_course_completed' => 'पाठ्यक्रम पूर्ण',
        'learning_plots_earned' => 'सीखने के अंक अर्जित',
        'vs_last_week' => 'पिछले सप्ताह की तुलना में',
        'total_hours_spent' => 'कुल घंटे बिताए<br>प्लेटफॉर्म पर',
        'courses_in_progress' => 'चालू<br>पाठ्यक्रम',
        'certificates_earned' => 'प्रमाणपत्र अर्जित',
        'courses_completed' => 'पाठ्यक्रम पूर्ण',
        'courses_in_progress_title' => 'चालू पाठ्यक्रम',
        'see_all' => 'सभी देखें',
        'completed' => 'पूर्ण',
        'from_date' => 'जून से जून 25, 2025 तक'
    ]
];

// Get current language translations
$lang = $translations[$current_language];

// Sample data - In real implementation, fetch from Moodle database
$student_name = "Student_1 digiviscom";
$progress_percentage = 28.3;
$courses_completed = $lang['of_course_completed'];
$learning_plots_change = "0% " . $lang['vs_last_week'];
$total_hours = 12;
$courses_in_progress = 2;
$certificates_earned = 9;
$courses_completed_count = 0;

// Sample courses data
$courses = [
    [
        'title' => 'ADSE Bridge course ( Applied...',
        'progress' => 90.5,
        'image' => 'course1.jpg',
        'type' => 'technology'
    ],
    [
        'title' => 'AI in Physics',
        'progress' => 59.5,
        'image' => 'course2.jpg',
        'type' => 'science'
    ]
];

// Chart data for learning plots
$chart_data = [
    ['date' => 'Jun', 'value' => 5],
    ['date' => 'Jun 25, 2025', 'value' => 15],
    ['date' => 'Last Week', 'value' => 8],
    ['date' => 'Current', 'value' => 12]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang['site_name']; ?> - <?php echo $lang['dashboard']; ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <style>
  
  * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .header {
            background: white;
            padding: 15px 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo h1 {
            color: #3A454b;
            font-size: 24px;
            font-weight: bold;
        }

        .logo-plus {
            background: #ff6b35;
            color: white;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 12px;
            vertical-align: super;
        }

        .search-bar {
            flex: 1;
            max-width: 400px;
            margin: 0 30px;
            position: relative;
        }

        .search-bar input {
            width: 100%;
            padding: 10px 40px 10px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
        }

        .search-bar i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        .language-dropdown {
            position: relative;
            margin-right: 15px;
        }

        .language-btn {
            background: #f8f9fa;
            border: 1px solid #ddd;
            padding: 8px 12px;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: #333;
            transition: all 0.3s;
        }

        .language-btn:hover {
            background: #e9ecef;
            border-color: #3A454b;
        }

        .language-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            min-width: 150px;
            z-index: 1000;
            display: none;
        }

        .language-menu.show {
            display: block;
        }

        .language-option {
            padding: 10px 15px;
            cursor: pointer;
            transition: background 0.2s;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .language-option:last-child {
            border-bottom: none;
        }

        .language-option:hover {
            background: #f8f9fa;
        }

        .language-option.active {
            background: #e3f2fd;
            color: #3A454b;
            font-weight: 500;
        }

        .flag-icon {
            width: 20px;
            height: 15px;
            border-radius: 2px;
            display: inline-block;
        }

        .flag-en { background: linear-gradient(to bottom, #1e3a8a 33%, white 33%, white 66%, #dc2626 66%); }
        .flag-ta { background: linear-gradient(to bottom, #ff6b35 33%, white 33%, white 66%, #059669 66%); }
        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #3A454b;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        .container {
            display: flex;
            min-height: calc(100vh - 70px);
        }

        .sidebar {
            width: 250px;
            background: white;
            padding: 20px 0;
            box-shadow: 2px 0 4px rgba(0,0,0,0.1);
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin: 5px 0;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 25px;
            text-decoration: none;
            color: #666;
            transition: all 0.3s;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: #e3f2fd;
            color: #3A454b;
            border-right: 3px solid #3A454b;
        }

        .main-content {
            flex: 1;
            padding: 30px;
        }
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 40px;
        }

        .progress-section {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .progress-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #333;
        }

        .progress-circle {
            position: relative;
            width: 200px;
            height: 200px;
            margin: 0 auto 20px;
        }

        .progress-circle canvas {
            transform: rotate(-90deg);
        }

        .progress-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .progress-percentage {
            font-size: 32px;
            font-weight: bold;
            color: #3A454b;
            margin-bottom: 5px;
        }

        .progress-label {
            font-size: 12px;
            color: #666;
        }

        .learning-plots {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .plots-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .plots-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }

        .plots-change {
            font-size: 14px;
            color: #dc3545;
        }

        .plots-date {
            font-size: 12px;
            color: #666;
            margin-bottom: 20px;
        }

        .chart-container {
            height: 200px;
            position: relative;
        }

        .insights-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 40px;
        }

        .insight-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .insight-card.blue {
            background: linear-gradient(135deg, #1e88e5, #1565c0);
            color: white;
        }

        .insight-card.orange {
            background: linear-gradient(135deg, #ffb74d, #f9bf3b );
            color: white;
        }

        .insight-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .insight-number {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .insight-label {
            font-size: 12px;
            opacity: 0.9;
        }

        .courses-section {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 600;
            color: #333;
        }

        .see-all {
            color: #3A454b;
            text-decoration: none;
            font-size: 14px;
        }

        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 25px;
        }

        .course-card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .course-card:hover {
            transform: translateY(-5px);
        }

        .course-image {
            height: 200px;
            background: linear-gradient(45deg, #1a1a2e, #16213e);
            position: relative;
            overflow: hidden;
        }

        .course-image.science {
            background: linear-gradient(45deg, #0f3460, #16537e);
        }

        .course-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="30" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="60" cy="70" r="1.5" fill="rgba(255,255,255,0.1)"/></svg>');
        }

        .course-content {
            padding: 20px;
            background: white;
        }

        .course-title {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
        }

        .progress-bar {
            width: 100%;
            height: 6px;
            background: #f0f0f0;
            border-radius: 3px;
            overflow: hidden;
            margin-bottom: 10px;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #ffb74d, #ff9800);
            border-radius: 3px;
            transition: width 0.6s ease;
        }

        .progress-percentage-text {
            font-size: 14px;
            color: #666;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                height: auto;
            }
            
            .dashboard-grid,
            .insights-grid {
                grid-template-columns: 1fr;
            }
            
            .courses-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="logo">
            <h1><?php echo $lang['site_name']; ?></h1>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="<?php echo $lang['search_placeholder']; ?>">
            <i class="fas fa-search"></i>
        </div>
        <div class="user-profile">
            <!-- Language Dropdown -->
            <div class="language-dropdown">
                <div class="language-btn" onclick="toggleLanguageMenu()">
                    <span class="flag-icon <?php 
                        echo ($current_language == 'english') ? 'flag-en' : 
                             (($current_language == 'tamil') ? 'flag-ta' : 'flag-hi'); 
                    ?>"></span>
                    <span><?php echo ucfirst($current_language); ?></span>
                    <i class="fas fa-chevron-down" style="font-size: 10px;"></i>
                </div>
                <div class="language-menu" id="languageMenu">
                    <div class="language-option <?php echo ($current_language == 'english') ? 'active' : ''; ?>" 
                         onclick="changeLanguage('english')">
                        <span class="flag-icon flag-en"></span>
                        <span>English</span>
                    </div>
                    <div class="language-option <?php echo ($current_language == 'tamil') ? 'active' : ''; ?>" 
                         onclick="changeLanguage('tamil')">
                        <span class="flag-icon flag-ta"></span>
                        <span>தமிழ்</span>
                    </div>
                    <div class="language-option <?php echo ($current_language == 'hindi') ? 'active' : ''; ?>" 
                         onclick="changeLanguage('hindi')">
                        <span class="flag-icon flag-hi"></span>
                        <span>हिंदी</span>
                    </div>
                </div>
            </div>
            <i class="fas fa-bell" style="color: #666; font-size: 18px;"></i>
            <div class="user-avatar">D</div>
            <span><?php echo $student_name; ?></span>
            <i class="fas fa-chevron-down" style="color: #666; font-size: 12px;"></i>
        </div>
    </div>

    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <ul class="sidebar-menu">
                <li><a href="#" class="active"><i class="fas fa-tachometer-alt"></i> <?php echo $lang['dashboard']; ?></a></li>
                <li><a href="#"><i class="fas fa-book"></i> <?php echo $lang['courses']; ?></a></li>
                <li><a href="#"><i class="fas fa-envelope"></i> <?php echo $lang['messages']; ?></a></li>
                <li><a href="#"><i class="fas fa-calendar"></i> <?php echo $lang['schedule']; ?></a></li>
                <li><a href="#"><i class="fas fa-cog"></i> <?php echo $lang['settings']; ?></a></li>
                <li><a href="#"><i class="fas fa-question-circle"></i> <?php echo $lang['help']; ?></a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">

            <!-- Dashboard Grid -->
            <div class="dashboard-grid">
                <!-- Progress Section -->
                <div class="progress-section">
                    <div class="progress-title"><?php echo $lang['progress']; ?></div>
                    <div class="progress-circle">
                        <canvas id="progressChart" width="200" height="200"></canvas>
                        <div class="progress-text">
                            <div class="progress-percentage"><?php echo $progress_percentage; ?>%</div>
                            <div class="progress-label"><?php echo $courses_completed; ?></div>
                        </div>
                    </div>
                </div>

                <!-- Learning Plots -->
                <div class="learning-plots">
                    <div class="plots-header">
                        <div class="plots-title"><?php echo $lang['learning_plots_earned']; ?></div>
                        <div class="plots-change">▼ <?php echo $learning_plots_change; ?></div>
                    </div>
                    <div class="plots-date"><?php echo $lang['from_date']; ?></div>
                    <div class="chart-container">
                        <canvas id="learningChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Quick Insights -->
            <div class="insights-grid">
                <div class="insight-card blue">
                    <div class="insight-icon"><i class="fas fa-clock"></i></div>
                    <div class="insight-number"><?php echo $total_hours; ?></div>
                    <div class="insight-label"><?php echo $lang['total_hours_spent']; ?></div>
                </div>
                <div class="insight-card orange">
                    <div class="insight-icon"><i class="fas fa-book-open"></i></div>
                    <div class="insight-number"><?php echo $courses_in_progress; ?></div>
                    <div class="insight-label"><?php echo $lang['courses_in_progress']; ?></div>
                </div>
                <div class="insight-card orange">
                    <div class="insight-icon"><i class="fas fa-certificate"></i></div>
                    <div class="insight-number"><?php echo $certificates_earned; ?></div>
                    <div class="insight-label"><?php echo $lang['certificates_earned']; ?></div>
                </div>
                <div class="insight-card blue">
                    <div class="insight-icon"><i class="fas fa-check-circle"></i></div>
                    <div class="insight-number"><?php echo $courses_completed_count; ?></div>
                    <div class="insight-label"><?php echo $lang['courses_completed']; ?></div>
                </div>
            </div>

            <!-- Courses in Progress -->
            <div class="courses-section">
                <div class="section-header">
                    <div class="section-title"><?php echo $lang['courses_in_progress_title']; ?></div>
                    <a href="#" class="see-all"><?php echo $lang['see_all']; ?></a>
                </div>
                <div class="courses-grid">
                    <?php foreach ($courses as $course): ?>
                    <div class="course-card">
                        <div class="course-image <?php echo $course['type']; ?>">
                            <!-- Course background pattern -->
                        </div>
                        <div class="course-content">
                            <div class="course-title"><?php echo $course['title']; ?></div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: <?php echo $course['progress']; ?>%"></div>
                            </div>
                            <div class="progress-percentage-text"><?php echo $course['progress']; ?>% <?php echo $lang['completed']; ?></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Language functionality
        function toggleLanguageMenu() {
            const menu = document.getElementById('languageMenu');
            menu.classList.toggle('show');
        }

        function changeLanguage(lang) {
            const currentUrl = new URL(window.location);
            currentUrl.searchParams.set('lang', lang);
            window.location.href = currentUrl.toString();
        }

        // Close language menu when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.querySelector('.language-dropdown');
            const menu = document.getElementById('languageMenu');
            
            if (!dropdown.contains(event.target)) {
                menu.classList.remove('show');
            }
        });

        // Progress Circle Chart
        const progressCtx = document.getElementById('progressChart').getContext('2d');
        new Chart(progressCtx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [<?php echo $progress_percentage; ?>, <?php echo 100 - $progress_percentage; ?>],
                    backgroundColor: ['#1e88e5', '#e3f2fd'],
                    borderWidth: 0,
                    cutout: '75%'
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Learning Plots Chart
        const learningCtx = document.getElementById('learningChart').getContext('2d');
        new Chart(learningCtx, {
            type: 'line',
            data: {
                labels: ['Jun', 'Jun 7', 'Jun 14', 'Jun 21', 'Jun 25'],
                datasets: [{
                    data: [5, 8, 15, 12, 8],
                    borderColor: '#1e88e5',
                    backgroundColor: 'rgba(30, 136, 229, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#1e88e5',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        display: false
                    }
                }
            }
        });

        // Animate progress bars
        window.addEventListener('load', function() {
            const progressBars = document.querySelectorAll('.progress-fill');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0%';
                setTimeout(() => {
                    bar.style.width = width;
                }, 500);
            });
        });
    </script>
</body>
</html>