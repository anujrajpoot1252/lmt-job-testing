// --- Initialization & Logic ---

const jobs = typeof jobsData !== 'undefined' ? jobsData : [];
const dsaTopics = typeof dsaData !== 'undefined' ? dsaData : {};

document.addEventListener('DOMContentLoaded', () => {
    initTheme();
    initCursorGlow();
    initNavbar();
    initScrollAnimations();
    // Pre-rendered by PHP, but listeners needed for interactivity
    setupDSAListeners();
    setupJobFilters();
});

// Theme Toggle Logic
function initTheme() {
    const toggle = document.getElementById('theme-toggle');
    const body = document.body;
    
    // Check for saved preference
    const currentTheme = localStorage.getItem('theme');
    if (currentTheme === 'light') {
        body.classList.add('light-mode');
    }
    
    toggle.addEventListener('click', () => {
        body.classList.toggle('light-mode');
        const theme = body.classList.contains('light-mode') ? 'light' : 'dark';
        localStorage.setItem('theme', theme);
    });
}

// Cursor Glow Effect
function initCursorGlow() {
    const glow = document.querySelector('.cursor-glow');
    document.addEventListener('mousemove', (e) => {
        glow.style.left = e.clientX + 'px';
        glow.style.top = e.clientY + 'px';
    });
}

// Navbar Logic
function initNavbar() {
    const nav = document.getElementById('main-nav');
    const links = document.querySelectorAll('.nav-links a');
    
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
        }
        
        // Active link based on scroll
        let current = '';
        const sections = document.querySelectorAll('section');
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            if (pageYOffset >= sectionTop - 100) {
                current = section.getAttribute('id');
            }
        });

        links.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href').substring(1) === current) {
                link.classList.add('active');
            }
        });
    });
}

// Scroll Animations
function initScrollAnimations() {
    const observerOptions = {
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('appear');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.animate-up, .animate-fade').forEach(el => observer.observe(el));
}

// Render Jobs
function renderJobs(jobsToRender) {
    const jobList = document.getElementById('job-list');
    jobList.innerHTML = '';
    
    jobsToRender.forEach(job => {
        const card = document.createElement('div');
        card.className = 'job-card glass animate-up';
        card.innerHTML = `
            <div class="job-main">
                <div class="job-company-logo">${job.logo}</div>
                <div class="job-details">
                    <h3>${job.title}</h3>
                    <div class="job-meta">
                        <span>🏢 ${job.company}</span>
                        <span>📍 ${job.location}</span>
                        <span>💰 ${job.salary}</span>
                    </div>
                </div>
            </div>
            <div class="job-actions">
                <button class="btn-secondary">View Details</button>
                <button class="btn-primary" style="margin-left: 0.5rem;">Apply Now</button>
            </div>
        `;
        jobList.appendChild(card);
    });
}

// Setup Job Filters
function setupJobFilters() {
    const search = document.getElementById('job-search');
    const type = document.getElementById('job-type');
    
    const filter = () => {
        const searchTerm = search.value.toLowerCase();
        const typeTerm = type.value;
        
        const filtered = jobs.filter(job => {
            const matchesSearch = job.title.toLowerCase().includes(searchTerm) || job.company.toLowerCase().includes(searchTerm);
            const matchesType = typeTerm === 'all' || job.type === typeTerm;
            return matchesSearch && matchesType;
        });
        
        renderJobs(filtered);
    };

    search.addEventListener('input', filter);
    type.addEventListener('change', filter);
}

// Render Companies
function renderCompanies() {
    const grid = document.getElementById('company-grid');
    companies.forEach(company => {
        const card = document.createElement('div');
        card.className = 'company-card glass animate-up';
        card.innerHTML = `
            <div class="company-logo-placeholder">${company.name[0]}</div>
            <span class="company-tag">${company.tag}</span>
            <h3>${company.name}</h3>
            <div class="company-info">
                <p><strong>Process:</strong> ${company.process}</p>
                <p><strong>Eligibility:</strong> ${company.eligibility}</p>
                <p><strong>Key Focus:</strong> ${company.focus}</p>
            </div>
        `;
        grid.appendChild(card);
    });
}

// DSA Logic
function renderDSATopic(topicKey) {
    const list = document.getElementById('problem-list');
    const problems = dsaTopics[topicKey] || [];
    const topicTitle = document.getElementById('current-topic-name');
    
    topicTitle.innerText = topicKey.split('-').map(w => w.charAt(0).toUpperCase() + w.slice(1)).join(' ');
    list.innerHTML = '';
    
    const solvedList = JSON.parse(localStorage.getItem('solved-dsa') || '[]');

    problems.forEach(prob => {
        const isSolved = solvedList.includes(prob.id);
        const item = document.createElement('div');
        item.className = 'problem-item';
        item.innerHTML = `
            <div class="prob-left">
                <input type="checkbox" ${isSolved ? 'checked' : ''} data-id="${prob.id}" class="prob-checkbox">
                <span class="prob-title">${prob.title}</span>
                <span class="difficulty diff-${prob.difficulty}">${prob.difficulty}</span>
            </div>
            <a href="${prob.link}" class="btn-text">Solve ↗</a>
        `;
        list.appendChild(item);
    });

    updateProgress(topicKey);
}

function setupDSAListeners() {
    const topics = document.querySelectorAll('.dsa-topics li');
    topics.forEach(li => {
        li.addEventListener('click', () => {
            topics.forEach(t => t.classList.remove('active'));
            li.classList.add('active');
            renderDSATopic(li.dataset.topic);
        });
    });

    document.getElementById('problem-list').addEventListener('change', (e) => {
        if (e.target.classList.contains('prob-checkbox')) {
            const probId = parseInt(e.target.dataset.id);
            let solvedList = JSON.parse(localStorage.getItem('solved-dsa') || '[]');
            
            if (e.target.checked) {
                if (!solvedList.includes(probId)) solvedList.push(probId);
            } else {
                solvedList = solvedList.filter(id => id !== probId);
            }
            
            localStorage.setItem('solved-dsa', JSON.stringify(solvedList));
            
            const activeTopic = document.querySelector('.dsa-topics li.active').dataset.topic;
            updateProgress(activeTopic);
        }
    });
}

function updateProgress(topicKey) {
    const problems = dsaTopics[topicKey] || [];
    const solvedList = JSON.parse(localStorage.getItem('solved-dsa') || '[]');
    const solvedInTopic = problems.filter(p => solvedList.includes(p.id)).length;
    
    const text = document.getElementById('topic-progress-text');
    const fill = document.getElementById('topic-progress-fill');
    
    text.innerText = `${solvedInTopic}/${problems.length} Completed`;
    const percent = problems.length ? (solvedInTopic / problems.length) * 100 : 0;
    fill.style.width = percent + '%';
}
