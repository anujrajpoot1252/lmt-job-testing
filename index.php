<?php 
require_once 'data.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMT JOBS | Your All-in-One Job & Prep Hub</title>
    <meta name="description" content="Master your career with LMT JOBS. Find jobs, practice DSA, prepare for interviews, and learn about company hiring processes.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="cursor-glow"></div>
    
    <nav class="navbar" id="main-nav">
        <div class="nav-container">
            <a href="index.php" class="logo">LMT<span>JOBS</span></a>
            <ul class="nav-links">
                <li><a href="#dashboard" class="active">Dashboard</a></li>
                <li><a href="#jobs">Jobs</a></li>
                <li><a href="#prep">Preparation</a></li>
                <li><a href="#companies">Companies</a></li>
                <li><a href="#dsa">DSA Sheet</a></li>
            </ul>
            <div class="nav-actions">
                <button id="theme-toggle" class="theme-btn" aria-label="Toggle Theme">
                    <span class="icon-sun">☀️</span>
                    <span class="icon-moon">🌙</span>
                </button>
                <button class="btn-primary">Sign Up</button>
            </div>
            <button class="mobile-toggle" aria-label="Toggle Menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </nav>

    <main>
        <!-- Hero Section -->
        <section id="dashboard" class="hero-section">
            <div class="container">
                <div class="hero-content">
                    <h1 class="animate-up">Scale Your <span class="gradient-text">Career Height</span> with PHP.</h1>
                    <p class="animate-up delay-1">The ultimate platform for job hunting, DSA mastery, and interview preparation. Now powered by PHP.</p>
                    <div class="hero-btns animate-up delay-2">
                        <a href="#jobs" class="btn-primary lg">Explore Jobs</a>
                        <a href="#dsa" class="btn-secondary lg">Start DSA Prep</a>
                    </div>
                </div>
                <div class="hero-stats animate-fade delay-3">
                    <div class="stat-card">
                        <span class="stat-num"><?php echo count($jobs); ?>+</span>
                        <span class="stat-label">Active Jobs</span>
                    </div>
                    <div class="stat-card">
                        <span class="stat-num">200+</span>
                        <span class="stat-label">DSA Problems</span>
                    </div>
                    <div class="stat-card">
                        <span class="stat-num"><?php echo count($companies); ?>+</span>
                        <span class="stat-label">Companies</span>
                    </div>
                </div>
            </div>
            <div class="hero-bg-glow"></div>
        </section>

        <!-- Prep Section -->
        <section id="prep" class="section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Master the Fundamentals</h2>
                    <p class="section-subtitle">Comprehensive notes and practice problems for every round.</p>
                </div>
                <div class="prep-grid">
                    <div class="prep-card glass">
                        <div class="card-icon">🧮</div>
                        <h3>Aptitude</h3>
                        <ul class="card-list">
                            <li>Quantitative Mastery</li>
                            <li>Logical Reasoning</li>
                            <li>Verbal Ability</li>
                        </ul>
                        <a href="#" class="btn-text">Start Learning →</a>
                    </div>
                    <div class="prep-card glass">
                        <div class="card-icon">💻</div>
                        <h3>Technical Prep</h3>
                        <ul class="card-list">
                            <li>OS & DBMS</li>
                            <li>System Design</li>
                            <li>Computer Networks</li>
                        </ul>
                        <a href="#" class="btn-text">View Notes →</a>
                    </div>
                    <div class="prep-card glass">
                        <div class="card-icon">🤝</div>
                        <h3>HR Interview</h3>
                        <ul class="card-list">
                            <li>STAR Technique</li>
                            <li>Behavioral Questions</li>
                            <li>Cultural Fit</li>
                        </ul>
                        <a href="#" class="btn-text">Get Ready →</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- DSA Sheet Section -->
        <section id="dsa" class="section bg-alt">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">DSA Master Sheet</h2>
                    <p class="section-subtitle">Topic-wise curated problems from basic to advanced.</p>
                </div>
                <div class="dsa-container glass">
                    <div class="dsa-sidebar">
                        <ul class="dsa-topics">
                            <?php 
                            $first = true;
                            foreach ($dsaTopics as $topic => $probs): 
                            ?>
                                <li class="<?php echo $first ? 'active' : ''; ?>" data-topic="<?php echo $topic; ?>">
                                    <?php echo ucwords(str_replace('-', ' ', $topic)); ?>
                                </li>
                            <?php 
                                $first = false;
                            endforeach; 
                            ?>
                        </ul>
                    </div>
                    <div class="dsa-content">
                        <div class="topic-header">
                            <h3 id="current-topic-name">Arrays & Hashing</h3>
                            <div class="progress-bar-wrapper">
                                <div class="progress-info">
                                    <span>Progress</span>
                                    <span id="topic-progress-text">0/<?php echo count($dsaTopics['arrays']); ?> Completed</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" id="topic-progress-fill" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="problem-list" id="problem-list">
                            <?php foreach ($dsaTopics['arrays'] as $prob): ?>
                                <div class="problem-item">
                                    <div class="prob-left">
                                        <input type="checkbox" data-id="<?php echo $prob['id']; ?>" class="prob-checkbox">
                                        <span class="prob-title"><?php echo $prob['title']; ?></span>
                                        <span class="difficulty diff-<?php echo $prob['difficulty']; ?>"><?php echo $prob['difficulty']; ?></span>
                                    </div>
                                    <a href="<?php echo $prob['link']; ?>" class="btn-text">Solve ↗</a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Companies Section -->
        <section id="companies" class="section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Hiring Process & Insights</h2>
                </div>
                <div class="company-grid">
                    <?php foreach ($companies as $company): ?>
                        <div class="company-card glass animate-up">
                            <div class="company-logo-placeholder"><?php echo $company['name'][0]; ?></div>
                            <span class="company-tag"><?php echo $company['tag']; ?></span>
                            <h3><?php echo $company['name']; ?></h3>
                            <div class="company-info">
                                <p><strong>Process:</strong> <?php echo $company['process']; ?></p>
                                <p><strong>Focus:</strong> <?php echo $company['focus']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Jobs Section -->
        <section id="jobs" class="section bg-alt">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Latest Opportunities</h2>
                </div>
                <div class="filter-bar">
                    <input type="text" id="job-search" placeholder="Search roles, companies...">
                    <select id="job-type">
                        <option value="all">All Types</option>
                        <option value="full-time">Full-time</option>
                        <option value="internship">Internship</option>
                    </select>
                </div>
                <div class="job-list" id="job-list">
                    <?php foreach ($jobs as $job): ?>
                        <div class="job-card glass animate-up">
                            <div class="job-main">
                                <div class="job-company-logo"><?php echo $job['logo']; ?></div>
                                <div class="job-details">
                                    <h3><?php echo $job['title']; ?></h3>
                                    <div class="job-meta">
                                        <span>🏢 <?php echo $job['company']; ?></span>
                                        <span>📍 <?php echo $job['location']; ?></span>
                                        <span>💰 <?php echo $job['salary']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="job-actions">
                                <button class="btn-primary">Apply Now</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <a href="#" class="logo">LMT<span>JOBS</span></a>
                    <p>Powered by PHP. Designed for the future.</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> LMT JOBS. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Pass PHP data to JS for dynamic filtering if needed -->
    <script>
        const dsaData = <?php echo json_encode($dsaTopics); ?>;
        const jobsData = <?php echo json_encode($jobs); ?>;
    </script>
    <script src="script.js"></script>
</body>
</html>
